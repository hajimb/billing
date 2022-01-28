<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	public function __construct(){
        parent::__construct();

        $this->load->model('Usermodel');  
    }


	public function index() {
		$session_data = $this->session->userdata('user_session');
        if (isset($session_data) && !empty($session_data)) {
            redirect('dashboard');
        }
		$this->load->view('login');
	}

	public function authenticate()
    { 
		$username = $this->input->post('username');  
		$password = $this->input->post('password');  
		
		$res_arr = array();

		if(isset($username) && isset($password) && $username !='' && $password!=''){
			$res_arr = $this->Usermodel->authenticate($username, $password);
		}else{
			$res_arr['msg'] = 'Please enter Username / Password.';
			$res_arr['status'] = 0;
		}

		echo json_encode($res_arr);   
    }

	public function check_username_exist(){
		$username = $this->input->post('username');  
		$res_arr = $this->Usermodel->check_username_exist($username);
		echo $res_arr;
	}

	public function logout(){
		$userdata = $this->session->userdata('user_session');
		$insertlog = array(
			'log_msg' => ucfirst($userdata['username']).' sign-out successfully.',
			'createddate' => date('Y-m-d H:i:s'),
			'controller' => 'Logout'
		);
		$this->db->insert('log',$insertlog);

        $this->session->sess_destroy();
        redirect('login', 'refresh');
    }

}
