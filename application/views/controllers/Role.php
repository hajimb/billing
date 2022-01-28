<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Role extends CI_Controller {
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

        $this->load->model('Rolemodel');        
    }

	public function index() {
        $this->data['title'] = 'User List'; 
        $this->data['user'] = $this->Usermodel->getuserdata();
		$this->load->view('common/header',$this->data);
        $this->load->view('common/sidebar',$this->data);
		$this->load->view('user/user');
		$this->load->view('common/footer');
	}

    public function add_user() {
        $this->data['title'] = 'Add New User'; 
		$this->load->view('common/header',$this->data);
        $this->load->view('common/sidebar',$this->data);
		$this->load->view('user/add');
		$this->load->view('common/footer');
	}

    public function add()
	{		
		$this->data["page_head"]  = "Add User";
		$this->data["page_title"] = "Add User";
		$this->data["page_view"]  = "Add User";
        $UserData['username'] = $this->input->post("username"); 
        $UserData['firstname'] = $this->input->post("firstname"); 
        $UserData['lastname'] = $this->input->post("lastname"); 
        $UserData['email'] = $this->input->post("email"); 
        $UserData['password'] = md5($this->input->post("password")); 
        $UserData['r_password'] = $this->input->post("password"); 
        $UserData['status'] = $this->input->post("status");
        $UserData['role'] = $this->input->post("role");
                    
		$datareq = $this->Usermodel->addUserRequest($UserData);
        if($datareq == 1){
            $return['status'] = 1;
            $return['msg'] = 'User added successfully';
        }else{
            $return['status'] = 0;
            $return['msg'] = 'error in storing data';
        }
        echo json_encode($return);
        redirect('User');
	}

    public function edit($id)
	{	
		$this->data['title'] = 'Edit User'; 
		$this->data["page_head"]  = "Edit User";
		$this->data["page_title"] = "Edit User";
		$this->data["page_view"]  = "Edit User";
		$this->data["formdata"]   = $this->Usermodel->getUser($id);		
		$this->load->view('common/header',$this->data);
        $this->load->view('common/sidebar',$this->data);		
		$this->load->view("user/edit",$this->data);
		$this->load->view('common/footer');
	}
    public function update($id='')
	{
		$data = array(
            'id' => $this->input->post("id"),
            'username' => $this->input->post("username"),
            'firstname' => $this->input->post("firstname"),
            'lastname' => $this->input->post("lastname"),
            'email' => $this->input->post("email"),
            'password' => md5($this->input->post("password")), 
            'r_password' => $this->input->post("password"),
            'status' => $this->input->post("status"),
            'role' => $this->input->post("role")
        );
            $datareq = $this->Usermodel->updaterecord($data);
            if($datareq == 1){
                $return['status'] = 1;
                $return['msg'] = 'User edit successfully';
            }else{
                $return['status'] = 0;
                $return['msg'] = 'error in storing data';
            }  
        redirect('User');		
	}

    public function user_delete($id)
    {        
        $this->Usermodel->delete_user($id);
        redirect('User');
    }
    
}
