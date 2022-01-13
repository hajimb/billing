<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tax extends CI_Controller {
	public function __construct(){
        parent::__construct();

        $this->data['session_data'] = @$this->session->userdata('user_session');
        $this->data['user_permission'] = @$this->session->userdata('user_permission');
        $this->load->model('Taxmodel');        
    }

    public function index()
	{
        $restaurant_id = $this->data['session_data']['restaurant_id'];
        $this->data['tax'] = $this->Taxmodel->getTaxdata($restaurant_id);

        $this->data['js']     = array(
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
		$this->data["pagename"]  = "tax-list";
		$this->data['page_title'] = "Manage Tax";
		$this->data['breadcrumb'][0] = "Tax";
		// $this->data['breadcrumb'][1] = "";
		$this->load->view('common/header',$this->data);
        $this->load->view('common/sidebar',$this->data);
        $this->load->view('common/breadcrumb',$this->data);
		$this->load->view('tax/index');
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

        $restaurant_id = $this->data['session_data']['restaurant_id'];
		$this->data['title']        = $todo." Tax"; 
        $this->data['pagename']     = 'tax-edit'; 
		$this->data['page_title']   = "Manage Tax";
		$this->data['breadcrumb'][0] = "Tax";
		$this->data['breadcrumb'][1] = $todo;
        $this->data["main_id"]      = $id;
		$this->data["todo"]         = $todo;
		$this->data["userdata"]     =$this->Taxmodel->gettax($id,$restaurant_id);		
		$this->load->view('common/header',$this->data);
        $this->load->view('common/sidebar',$this->data);		
        $this->load->view('common/breadcrumb',$this->data);		
		$this->load->view("tax/edit",$this->data);
		$this->load->view('common/footer');
    }
    
}
