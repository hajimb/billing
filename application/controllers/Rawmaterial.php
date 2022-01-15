<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rawmaterial extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->data['session_data'] = @$this->session->userdata('user_session');
        $this->data['user_permission'] = @$this->session->userdata('user_permission');
        $this->restaurant_id = $this->data['session_data']['restaurant_id'];
    }
	
    public function index()
	{

        $this->data['data'] = getData('rawmaterial', $this->restaurant_id,"rawmaterial_id ");
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
		$this->data["pagename"]  = "raw-material-list";
		$this->data['page_title'] = "Raw Material List";
		$this->data['breadcrumb'][] = '<a href="'.base_url().'inventory">Inventory</a>';
		$this->data['breadcrumb'][] = "Raw Material";
		$this->load->view('common/header',$this->data);
        $this->load->view('common/sidebar',$this->data);
        $this->load->view('common/breadcrumb',$this->data);
		$this->load->view('inventory/raw_material/index');
		$this->load->view('common/footer');
	}

    public function edit()
	{	
        $todo = "Edit";
        $id = $this->input->post('main_id');
        $this->create($id, $todo);
	}

    public function create($id = 0,$todo = "Add"){
		$this->data['title']        = $todo." Raw Material"; 
        $this->data['pagename']     = 'raw-item-edit'; 
		$this->data['page_title']   = "Manage Raw Material";
		$this->data['breadcrumb'][] = '<a href="'.base_url().'inventory">Inventory</a>';
		$this->data['breadcrumb'][] = '<a href="'.base_url().'rawmaterial">Raw Material</a>';
		$this->data['breadcrumb'][] = $todo;
        $this->data["main_id"]      = $id;
		$this->data["todo"]         = $todo;
        $this->data["data"]         = getData('rawmaterial', $this->restaurant_id,"rawmaterial_id", $id);	
		$this->load->view('common/header',$this->data);
        $this->load->view('common/sidebar',$this->data);		
        $this->load->view('common/breadcrumb',$this->data);		
		$this->load->view("inventory/raw_material/edit",$this->data);
		$this->load->view('common/footer');
    }
    
}
