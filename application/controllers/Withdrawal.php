<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Withdrawal extends CI_Controller {
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

        $this->load->model('Withdrawalmodel');
        $this->load->model('Usermodel');
        
    }

	public function index() {
        $this->data['title'] = 'Withdrawal'; 
        $this->data['Withdrawal'] = $this->Withdrawalmodel->getwithdrawaldata();
		$this->load->view('common/header',$this->data);
        $this->load->view('common/sidebar',$this->data);
		$this->load->view('withdrawal/withdrawal');
		$this->load->view('common/footer');
	}

    public function add_withdrawal() {
        $this->data['title'] = 'Add Withdrawal'; 
        $this->data['user'] = $this->Usermodel->getuserdata();        
		$this->load->view('common/header',$this->data);
        $this->load->view('common/sidebar',$this->data);
		$this->load->view('withdrawal/add');
		$this->load->view('common/footer');
	}

    public function add()
	{		
		$this->data["page_head"]  = "Add Withdrawal";
		$this->data["page_title"] = "Add Withdrawal";
		$this->data["page_view"]  = "Add Withdrawal";
        $WithdrawalData['user_id'] = $this->input->post("user_id");
        $WithdrawalData['amount'] = $this->input->post("amount");                      
        
		$datareq = $this->Withdrawalmodel->addWithdrawalRequest($WithdrawalData);
        if($datareq == 1){
            $return['status'] = 1;
            $return['msg'] = 'Withdrawal added successfully';
        }else{
            $return['status'] = 0;
            $return['msg'] = 'error in storing data';
        }
        echo json_encode($return);
        redirect('Withdrawal');
	}

    public function edit($id)
	{	
		$this->data['title'] = 'Edit Withdrawal'; 
		$this->data["page_head"]  = "Edit Withdrawal";
		$this->data["page_title"] = "Edit Withdrawal";
		$this->data["page_view"]  = "Edit Withdrawal";
        $this->data['user'] = $this->Usermodel->getuserdata();
        $this->data["formdata"] = $this->Withdrawalmodel->getwithdrawal($id);		
		$this->load->view('common/header',$this->data);
        $this->load->view('common/sidebar',$this->data);		
		$this->load->view("withdrawal/edit",$this->data);
		$this->load->view('common/footer');
	}

    public function update($id='')
	{
        $WithdrawalData['user_id'] = $this->input->post("user_id");
        $WithdrawalData['amount'] = $this->input->post("amount");

		$data = array(
            'withdrawal_id' => $this->input->post("id"),
            'user_id' => $this->input->post("user_id"),
            'amount' => $this->input->post("amount")            
        );
            $datareq = $this->Withdrawalmodel->updaterecord($data);
            if($datareq == 1){
                $return['status'] = 1;
                $return['msg'] = 'Withdrawal edit successfully';
            }else{
                $return['status'] = 0;
                $return['msg'] = 'error in storing data';
            }  
    redirect('Withdrawal');
		
	}
    public function Withdrawal_delete($id)
    {        
        $this->Withdrawalmodel->delete($id);
        redirect('Withdrawal');
    }
    
}
