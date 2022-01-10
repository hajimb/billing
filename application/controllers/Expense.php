<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Expense extends CI_Controller {
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

        $this->load->model('Expensemodel');
        $this->load->model('Usermodel');
        
    }

	public function index() {
        $this->data['title'] = 'Expense'; 
        $this->data['expense'] = $this->Expensemodel->getExpensedata();
		$this->load->view('common/header',$this->data);
        $this->load->view('common/sidebar',$this->data);
		$this->load->view('expense/expense');
		$this->load->view('common/footer');
	}

    public function add_Expense() {
        $this->data['title'] = 'Add Expense'; 
        $this->data['user'] = $this->Usermodel->getuserdata();        
		$this->load->view('common/header',$this->data);
        $this->load->view('common/sidebar',$this->data);
		$this->load->view('expense/add');
		$this->load->view('common/footer');
	}

    public function add()
	{		
		$this->data["page_head"]  = "Add Expense";
		$this->data["page_title"] = "Add Expense";
		$this->data["page_view"]  = "Add Expense";
        $ExpenseData['user_id'] = $this->input->post("user_id");
        $ExpenseData['amount'] = $this->input->post("amount");
        $ExpenseData['expense'] = $this->input->post("expense");                      
        
		$datareq = $this->Expensemodel->addExpenseRequest($ExpenseData);
        if($datareq == 1){
            $return['status'] = 1;
            $return['msg'] = 'Expense added successfully';
        }else{
            $return['status'] = 0;
            $return['msg'] = 'error in storing data';
        }
        echo json_encode($return);
        redirect('Expense');
	}

    public function edit($id)
	{	
		$this->data['title'] = 'Edit Expense'; 
		$this->data["page_head"]  = "Edit Expense";
		$this->data["page_title"] = "Edit Expense";
		$this->data["page_view"]  = "Edit Expense";
        $this->data['user'] = $this->Usermodel->getuserdata();
        $this->data["formdata"] = $this->Expensemodel->getExpense($id);		
		$this->load->view('common/header',$this->data);
        $this->load->view('common/sidebar',$this->data);		
		$this->load->view("expense/edit",$this->data);
		$this->load->view('common/footer');
	}

    public function update($id='')
	{
        $data = array(
            'expense_id' => $this->input->post("id"),
            'user_id' => $this->input->post("user_id"),
            'amount' => $this->input->post("amount"),
            'expense' => $this->input->post("expense")            
        );
            $datareq = $this->Expensemodel->updaterecord($data);
            if($datareq == 1){
                $return['status'] = 1;
                $return['msg'] = 'Expense edit successfully';
            }else{
                $return['status'] = 0;
                $return['msg'] = 'error in storing data';
            }  
    redirect('Expense');
		
	}
    public function Expense_delete($id)
    {        
        $this->Expensemodel->delete($id);
        redirect('Expense');
    }
    
}
