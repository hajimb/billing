<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Discount extends CI_Controller {
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
        $this->load->model('Discountmodel');        
    }

	public function index() {
        $this->data['title'] = 'Discount List'; 
        $this->data['discount'] = $this->Discountmodel->getdiscountdata();
		$this->load->view('common/header',$this->data);
        $this->load->view('common/sidebar',$this->data);
		$this->load->view('discount/discount');
		$this->load->view('common/footer');
	}

    public function add_discount() {
        $this->data['title'] = 'Add New Discount'; 
		$this->load->view('common/header',$this->data);
        $this->load->view('common/sidebar',$this->data);
		$this->load->view('discount/add_discount');
		$this->load->view('common/footer');
	}

    public function add()
	{		
		$this->data["page_head"]  = "Add discount";
		$this->data["page_title"] = "Add discount";
		$this->data["page_view"]  = "Add discount";
        $discountData['discount_name'] = $this->input->post("discount_name");
        $discountData['discount'] = $this->input->post("discount");                     
		$datareq = $this->Discountmodel->adddiscountRequest($discountData);
        if($datareq == 1){
            $return['status'] = 1;
            $return['msg'] = 'discount added successfully';
        }else{
            $return['status'] = 0;
            $return['msg'] = 'error in storing data';
        }
        echo json_encode($return);
        redirect('discount');
	}

    public function edit($id)
	{	
		$this->data['title'] = 'Edit discount'; 
		$this->data["page_head"]  = "Edit discount";
		$this->data["page_title"] = "Edit discount";
		$this->data["page_view"]  = "Edit discount";
		$this->data["formdata"]   = $this->Discountmodel->getdiscount($id);		
		$this->load->view('common/header',$this->data);
        $this->load->view('common/sidebar',$this->data);		
		$this->load->view("discount/edit_discount",$this->data);
		$this->load->view('common/footer');
	}
    public function update($id='')
	{					
            $data = array(
                'discount_id' => $this->input->post('id'),
                'discount_name' => $this->input->post('discount_name'),
                'discount' => $this->input->post('discount') );
                $datareq = $this->Discountmodel->updaterecord($data);
                if($datareq == 1){
                    $return['status'] = 1;
                    $return['msg'] = 'discount edit successfully';
                }else{
                    $return['status'] = 0;
                    $return['msg'] = 'error in storing data';
                }  
		redirect('discount');
		
	}

    public function getdiscount(){
        $post_data = $this->input->post();
        $return = $this->Discountmodel->getdiscount($post_data['id']);
        echo json_encode($return);
    }
    public function discount_delete($id)
    {        
        $this->Discountmodel->delete_discount($id);
        redirect('discount');
    }
    
}
