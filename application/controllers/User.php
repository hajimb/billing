<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
	public function __construct(){
        parent::__construct();

        $this->data['session_data'] = @$this->session->userdata('user_session');
        $this->data['user_permission'] = @$this->session->userdata('user_permission');

        $this->load->model('Restaurantmodel');
        $this->load->model('Usermodel');  
        $this->load->model('model_groups');      
    }

	public function index() {
        //echo $this->data['user_permission'];
        $this->data['user'] = $this->Usermodel->getuserdata();
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
		$this->data["pagename"]  = "users-list";
		$this->data['page_title'] = "Manage User";
		$this->data['breadcrumb'][0] = "Users";
        $this->load->view('common/header',$this->data);
        $this->load->view('common/sidebar',$this->data);
        $this->load->view('common/breadcrumb',$this->data);
        $this->load->view('user/index');
		$this->load->view('common/footer');
	}

    public function edit()
	{	
        $todo = "Edit";
        $id = $this->input->post('main_id');
        $this->create($id, $todo);
	}

    public function create($id = 0,$todo = "Add"){

        $group_data = $this->model_groups->getGroupData();
        $this->data['group_data'] = $group_data;
        $restaurants = $this->Restaurantmodel->getrestaurantsdata();
        $this->data['restaurants']  = $restaurants;
		$this->data['title']        = $todo." User"; 
        $this->data['pagename']     = 'user-edit'; 
		$this->data['page_title']   = "Manage Users";
		$this->data['breadcrumb'][0] = "User";
		$this->data['breadcrumb'][1] = $todo;
        $this->data["main_id"]      = $id;
		$this->data["todo"]         = $todo;
		$this->data["userdata"]     = $this->Usermodel->getUser($id);		
		$this->load->view('common/header',$this->data);
        $this->load->view('common/sidebar',$this->data);		
        $this->load->view('common/breadcrumb',$this->data);		
		$this->load->view("user/edit",$this->data);
		$this->load->view('common/footer');
    }
    
}
