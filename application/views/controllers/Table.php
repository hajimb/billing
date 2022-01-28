<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Table extends CI_Controller {
	public function __construct(){
        parent::__construct();
        $this->data['session_data'] = @$this->session->userdata('user_session');
        $this->data['user_permission'] = @$this->session->userdata('user_permission');
        $this->restaurant_id = $this->data['session_data']['restaurant_id'];  

        $this->load->model('Tablemodel');
        $this->load->model('Restaurantmodel');
        
    }

    public function index()
	{
        // $this->data['data'] = getData('category', $this->restaurant_id,"category_id");
        $this->data['data'] = getData('tables', $this->restaurant_id,"table_id");
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
        // $this->data['table']    = $this->Tablemodel->gettablesdata();
		$this->data["pagename"]  = "table-list";
		$this->data['page_title'] = "Manage Table";
		$this->data['breadcrumb'][] = "Table";
		// $this->data['breadcrumb'][1] = "";
		$this->load->view('common/header',$this->data);
        $this->load->view('common/sidebar',$this->data);
        $this->load->view('common/breadcrumb',$this->data);
		$this->load->view('tables/index');
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

		$this->data['title']        = $todo." Table"; 
        $this->data['pagename']     = 'table-edit'; 
		$this->data['page_title']   = "Manage Table";
		$this->data['breadcrumb'][] = '<a href="'.base_url().'table">Table</a>';
		$this->data['breadcrumb'][] = $todo;
        $this->data["main_id"]      = $id;
		$this->data["todo"]         = $todo;
        $this->data["data"]         = getData('tables', $this->restaurant_id,"table_id", $id);	
		$this->load->view('common/header',$this->data);
        $this->load->view('common/sidebar',$this->data);		
        $this->load->view('common/breadcrumb',$this->data);		
		$this->load->view("tables/edit",$this->data);
		$this->load->view('common/footer');
    }

	public function index1() {
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

    public function edit1($id)
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
