<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

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
			$query = $this->db->query("SELECT * from admin_users where username='".$username."' AND password='".md5($password)."' AND is_deleted = 0");
			if ($query->num_rows() > 0) {
				$row = $query->row_array();
				//SET SESSION
				$user_session = array('user_id' => $row['id'], 'firstname' => $row['firstname'], 'lastname' => $row['lastname'], 'email' => $row['email'], 'username' => $row['username'], 'restaurant_id' => $row['restaurant_id'], 'groups' => $row['groups']);
				$this->session->set_userdata('user_session', $user_session); 
			
				$this->load->model('model_groups');
				$group_data = $this->model_groups->getUserGroupByUserId($row['id']);
				$this->session->set_userdata('user_permission', unserialize($group_data['permission']));
				
				$res_arr['msg'] = 'You have succesfully logged in.';
				$res_arr['status'] = 1;

				//add log into log table
				$insertlog = array(
                    'log_msg' => ucfirst($username).' sign-in successfully.',
                    'createddate' => date('Y-m-d H:i:s'),
                    'controller' => 'Login'
                );
				$this->db->insert('log',$insertlog);

			} else {
				$res_arr['msg'] = 'Invalid username or password. Please try again.';
				$res_arr['status'] = 0;
			}
		}else{
			$res_arr['msg'] = 'Please enter username or password.';
			$res_arr['status'] = 0;
		}

		echo json_encode($res_arr);   
    }

	public function check_username_exist(){
		$username = $this->input->post('username');  
		$query = $this->db->query("SELECT * from admin_users where username='".$username."'");
        if ($query->num_rows() > 0) { 
			echo 'true';
		}else{
			echo 'false';
		}        
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
