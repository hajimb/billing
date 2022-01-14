<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Table extends CI_Controller {
	public function __construct(){
        parent::__construct();

		 $session_data = $this->session->userdata('user_session');
         if (!isset($session_data) || empty($session_data)) {
             redirect('login');
         }else{
            $this->data['session_data'] = @$this->session->userdata('user_session');
			$this->data['user_permission'] = @$this->session->userdata('user_permission');
            //     $group_data = array();
		// 	$user_id = $session_data['user_id'];
		// 	$this->load->model('model_groups');
		// 	$group_data = $this->model_groups->getUserGroupByUserId($user_id);
		// 	$this->data['user_permission'] = unserialize($group_data['permission']);
		// 	$this->permission = unserialize($group_data['permission']);
        }
        $this->restaurant_id = $session_data['restaurant_id'];
        $this->load->model('Tablemodel');
        $this->load->model('Restaurantmodel');
        
    }

	public function index() {
        $this->data['title'] = 'Table View'; 
        $this->data['table']    = $this->Tablemodel->gettablesdata();
        $this->data['session']  = $this->session->userdata('user_session');
		$this->load->view('common/header',$this->data);
        $this->load->view('common/sidebar',$this->data);
		$this->load->view('tables/table');
		$this->load->view('common/footer');
	}

    public function add_table() {
        $this->data['title'] = 'Add New Item'; 
        $this->data['restaurant'] = getData('restaurant', 0, "restaurant_id");
        $this->load->view('common/header',$this->data);
        $this->load->view('common/sidebar',$this->data);
		$this->load->view('tables/add');
		$this->load->view('common/footer');
	}

    public function add()
	{		
		$this->data["page_head"]  = "Add Table";
		$this->data["page_title"] = "Add Table";
		$this->data["page_view"]  = "Add Table";
        $itemData['restaurant_id'] = $this->input->post("restaurant_id");
        $itemData['tablename'] = $this->input->post("tablename");
        $itemData['capacity'] = $this->input->post("capacity");
        $itemData['status'] = $this->input->post("status");
        
		$datareq = $this->Tablemodel->addtableRequest($itemData);
        if($datareq == 1){
            $return['status'] = 1;
            $return['msg'] = 'Item added successfully';
        }else{
            $return['status'] = 0;
            $return['msg'] = 'error in storing data';
        }
        echo json_encode($return);
        redirect('table');
	}

    public function edit($id)
	{	
		$this->data['title'] = 'Edit Stock'; 
		$this->data["page_head"]  = "Edit Stock";
		$this->data["page_title"] = "Edit Stock";
		$this->data["page_view"]  = "Edit Stock";
        $this->data['restaurant'] = getData('restaurant', 0, "restaurant_id");
		$this->data["formdata"] = $this->Tablemodel->gettable($id);        	
		$this->load->view('common/header',$this->data);
        $this->load->view('common/sidebar',$this->data);		
		$this->load->view("tables/edit");
		$this->load->view('common/footer');
	}    

    public function update($id='')
	{
       $data = array(
            'table_id' => $this->input->post("id"),
            'restaurant_id' => $this->input->post("restaurant_id"),
            'tablename' => $this->input->post("tablename"),
            'capacity' => $this->input->post("capacity"),
            'status' => $this->input->post("status")
        );
            $datareq = $this->Tablemodel->updaterecord($data);
            if($datareq == 1){
                $return['status'] = 1;
                $return['msg'] = 'tax edit successfully';
            }else{
                $return['status'] = 0;
                $return['msg'] = 'error in storing data';
            }  
        redirect('table');
		
	}

    public function table_delete($id)
    {        
        $this->Tablemodel->delete_table($id);
        redirect('table');
    }

    public function tableorder(){

    }

    
    
}
