<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Withdrawal extends CI_Controller {
	public function __construct(){
        parent::__construct();

        $this->data['session_data'] = @$this->session->userdata('user_session');
        $this->data['user_permission'] = @$this->session->userdata('user_permission');
        $this->restaurant_id = $this->data['session_data']['restaurant_id'];  
        
    }


    public function index()
	{
        $this->data['data'] = getExpenseData('withdrawal',$this->restaurant_id);
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
		$this->data["pagename"]  = "withdrawal-list";
		$this->data['page_title'] = "Manage Withdrawal";
		$this->data['breadcrumb'][0] = "Withdrawal";
		// $this->data['breadcrumb'][1] = "";
		$this->load->view('common/header',$this->data);
        $this->load->view('common/sidebar',$this->data);
        $this->load->view('common/breadcrumb',$this->data);
		$this->load->view('withdrawal/index');
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

		$this->data['title']        = $todo." Withdrawal"; 
        $this->data['pagename']     = 'withdrawal-edit'; 
		$this->data['page_title']   = "Manage Withdrawal";
		$this->data['breadcrumb'][0] = "Withdrawal";
		$this->data['breadcrumb'][1] = $todo;
        $this->data["main_id"]      = $id;
		$this->data["todo"]         = $todo;
        $this->data["users"]        = getData('admin_users', $this->restaurant_id,"id");	
        $this->data["data"]         = getData('withdrawal', $this->restaurant_id,"withdrawal_id", $id);	
		$this->load->view('common/header',$this->data);
        $this->load->view('common/sidebar',$this->data);		
        $this->load->view('common/breadcrumb',$this->data);		
		$this->load->view("withdrawal/edit",$this->data);
		$this->load->view('common/footer');
    }
    
    /*
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
    */
}
