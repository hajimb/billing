<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends CI_Controller {
	public function __construct(){
        parent::__construct();

		 $session_data = $this->session->userdata('user_session');
         if (!isset($session_data) || empty($session_data)) {
             redirect('login');
             
         }else{
            $this->data['session_data'] = @$this->session->userdata('user_session');
			$this->data['user_permission'] = @$this->session->userdata('user_permission');

            // $group_data = array();
			// $user_id = $session_data['user_id'];
			// $this->load->model('model_groups');
			// $group_data = $this->model_groups->getUserGroupByUserId($user_id);
			// $this->data['user_permission'] = unserialize($group_data['permission']);
			// $this->permission = unserialize($group_data['permission']);
        }

        $this->load->model('Categorymodel');        
    }

	public function index() {
        $this->data['title'] = 'Category List'; 
        $this->data['category'] = $this->Categorymodel->getCategorydata();
		$this->load->view('common/header',$this->data);
        $this->load->view('common/sidebar',$this->data);
		$this->load->view('category/category');
		$this->load->view('common/footer');
	}

    public function add_category() {
        $this->data['title'] = 'Add New Category'; 
		$this->load->view('common/header',$this->data);
        $this->load->view('common/sidebar',$this->data);
		$this->load->view('category/add_category');
		$this->load->view('common/footer');
	}

    public function add()
	{		
		$this->data["page_head"]  = "Add Category";
		$this->data["page_title"] = "Add Category";
		$this->data["page_view"]  = "Add Category";
        $categoryData['category'] = $this->input->post("category");        
		$datareq = $this->Categorymodel->addCategoryRequest($categoryData);
        if($datareq == 1){
            $return['status'] = 1;
            $return['msg'] = 'Category added successfully';
        }else{
            $return['status'] = 0;
            $return['msg'] = 'error in storing data';
        }
        echo json_encode($return);
        redirect('category');
	}

    public function edit($id)
	{	
		$this->data['title'] = 'Edit Category'; 
		$this->data["page_head"]  = "Edit Category";
		$this->data["page_title"] = "Edit Category";
		$this->data["page_view"]  = "Edit Category";
		$this->data["formdata"]   = $this->Categorymodel->getcategory($id);		
		$this->load->view('common/header',$this->data);
        $this->load->view('common/sidebar',$this->data);		
		$this->load->view("category/edit_category",$this->data);
		$this->load->view('common/footer');
	}
    public function update($id='')
	{
		$data = array(
            'category_id' => $this->input->post("id"),
            'category' => $this->input->post("category")
        );
            $datareq = $this->Categorymodel->updaterecord($data);
            if($datareq == 1){
                $return['status'] = 1;
                $return['msg'] = 'category edit successfully';
            }else{
                $return['status'] = 0;
                $return['msg'] = 'error in storing data';
            }  
    redirect('category');
		
	}

    public function cat_delete($id)
    {        
        $this->Categorymodel->delete_category($id);
        redirect('category');
    }
    
}
