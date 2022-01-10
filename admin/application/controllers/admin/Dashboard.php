<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	public function __construct(){
        parent::__construct();

		$session_data = $this->session->userdata('user_session');
        if (!isset($session_data) || empty($session_data)) {
            redirect('admin/login');
        }

        // $this->load->model('admin/commonmodel');
        
    }

	public function index() {
        $this->data['title'] = 'Dashboard'; 
		$this->load->view('admin/common/header',$this->data);
		$this->load->view('admin/dashboard');
		$this->load->view('admin/common/footer');
	}
}
