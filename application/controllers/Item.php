<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Item extends CI_Controller {
	public function __construct(){
        parent::__construct();
        $this->data['session_data'] = @$this->session->userdata('user_session');
        $this->data['user_permission'] = @$this->session->userdata('user_permission');
        $this->restaurant_id = $this->data['session_data']['restaurant_id'];
        $this->load->model('Itemmodel');
        $this->load->model('Restaurantmodel');
    }


    public function index()
	{
        $this->data['data'] = getData('items', $this->restaurant_id, "item_id");
        $this->data['js']   = array(
			"assets/plugins/datatables/jquery.dataTables.min.js",
			"assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js",
			"assets/plugins/datatables-responsive/js/dataTables.responsive.min.js",
			"assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js",
		);
		$this->data['css']     = array(
			"assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css",
			"assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css",
			"assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css",
		);
		$this->data["pagename"]  = "item-list";
		$this->data['page_title'] = "Item List";
		$this->data['breadcrumb'][0] = "Item";
		// $this->data['breadcrumb'][1] = "";
		$this->load->view('common/header',$this->data);
        $this->load->view('common/sidebar',$this->data);
        $this->load->view('common/breadcrumb',$this->data);
		$this->load->view('item/index');
		$this->load->view('common/footer');
		//$this->render_template('groups/index', $this->data);
	}

    public function edit()
	{	
        $todo = "Edit";
        $id = $this->input->post('main_id');
        $this->create($id, $todo);
	}

    public function create($id = 0,$todo = "Add"){
		$this->data['title']        = $todo." item"; 
        $this->data['pagename']     = 'item-edit'; 
		$this->data['page_title']   = "Manage item";
		$this->data['breadcrumb'][0] = "item";
		$this->data['breadcrumb'][1] = $todo;
        $this->data["main_id"]      = $id;
		$this->data["todo"]         = $todo;
        $this->data['restaurant']   = getRestaurant();
		$this->data["rawmaterial"]  = getRawmaterial($this->restaurant_id);
        $this->data['category']     = getCategory($this->restaurant_id);
        $this->data["data"]         = getData('items', $this->restaurant_id, "item_id", $id);
        $this->data["item_rawm"]    = $this->Itemmodel->getitemRaw($this->restaurant_id, $id);
		$this->load->view('common/header',$this->data);
        $this->load->view('common/sidebar',$this->data);		
        $this->load->view('common/breadcrumb',$this->data);		
		$this->load->view("item/edit",$this->data);
		$this->load->view('common/footer');
    }
    
}
