<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	public function __construct(){
        parent::__construct();

		$session_data = $this->session->userdata('user_session');
         if (!isset($session_data) || empty($session_data)) {
             redirect('login');
         }else{
            // $group_data = array();
			// $user_id = $session_data['user_id'];
			// $this->load->model('model_groups');
			// $group_data = $this->model_groups->getUserGroupByUserId($user_id);
			$this->data['session_data'] = @$this->session->userdata('user_session');
			$this->data['user_permission'] = @$this->session->userdata('user_permission');
			// $this->session->set_userdata('user_permission', unserialize($group_data['permission'])); 
			// $this->permission = unserialize($group_data['permission']);
        }

        // $this->load->model('admin/commonmodel');
        
    }

	public function index() {
        $this->data['title'] = 'Dashboard'; 
		$this->data['page_title']   = "Dashboard";
		$this->data['breadcrumb'][] = 'Dashboard';
		$this->load->view('common/header',$this->data);
        $this->load->view('common/sidebar',$this->data);
        $this->load->view('common/breadcrumb',$this->data);		
		$this->load->view('dashboard');
		$this->load->view('common/footer');
	}
    
}
