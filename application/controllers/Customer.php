<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customer extends CI_Controller {
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

        $this->load->model('Customermodel');
        
    }

	public function index() {
        $this->data['title'] = 'Customer List'; 
        $this->data['customer'] = $this->Customermodel->getcustomerdata();
		$this->load->view('common/header',$this->data);
        $this->load->view('common/sidebar',$this->data);
		$this->load->view('customer/customer');
		$this->load->view('common/footer');
	}


    public function getcustomerdata() {
        $this->data['title'] = 'Customer List'; 
        $return = $this->Customermodel->getcustomerdata1();
        echo json_encode($return);
	}
    public function add_customer() {
        $this->data['title'] = 'Add New Customer'; 
		$this->load->view('common/header',$this->data);
        $this->load->view('common/sidebar',$this->data);
		$this->load->view('customer/add');
		$this->load->view('common/footer');
	}

    public function add()
	{		
		$this->data["page_head"]  = "Add Customer";
		$this->data["page_title"] = "Add Customer";
		$this->data["page_view"]  = "Add Customer";
        $customerData['c_name'] = $this->input->post("name");
        $customerData['email'] = $this->input->post("email");
        $customerData['mobile'] = $this->input->post("mobile");
        $customerData['address'] = $this->input->post("address");
		$datareq = $this->Customermodel->addCustomerRequest($customerData);
        if($datareq == 1){
            $return['status'] = 1;
            $return['msg'] = 'Customer added successfully';
        }else{
            $return['status'] = 0;
            $return['msg'] = 'error in storing data';
        }
        echo json_encode($return);
        redirect('customer');
	}

    public function edit($id)
	{	
		$this->data['title'] = 'Edit Category'; 
		$this->data["page_head"]  = "Edit Category";
		$this->data["page_title"] = "Edit Category";
		$this->data["page_view"]  = "Edit Category";
		$this->data["formdata"]   = $this->Customermodel->getcustomer($id);		
		$this->load->view('common/header',$this->data);
        $this->load->view('common/sidebar',$this->data);		
		$this->load->view("customer/edit",$this->data);
		$this->load->view('common/footer');
	}

    public function update($id='')
	{
		$data = array(
            'customer_id' => $this->input->post("id"),
            'c_name' => $this->input->post("name"),
            'email' => $this->input->post("email"),
            'mobile' => $this->input->post("mobile"),
            'address' => $this->input->post("address")          
        );
            $datareq = $this->Customermodel->updaterecord($data);
            if($datareq == 1){
                $return['status'] = 1;
                $return['msg'] = 'customer edit successfully';
            }else{
                $return['status'] = 0;
                $return['msg'] = 'error in storing data';
            }  
        redirect('customer');		
	}


    public function customer_delete($id)
    {        
        $this->Customermodel->delete_customer($id);
        redirect('customer');
    }

    public function customerdetailbyid($id)
	{
        //$post_data = $this->input->post();
       // print_r($post_data);      

        $datareq = $this->Customermodel->getcustomerbyid($id);
        if(count($datareq) >= 0){
           
            $return['data'] = $datareq;
        }else{           
            $return['msg'] = 'error in data fatch';
        }
        echo json_encode($return);
    }
    
}
