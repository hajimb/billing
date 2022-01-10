<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Log extends CI_Controller {
	public function __construct(){
        parent::__construct();

		$session_data = $this->session->userdata('user_session');
        if (!isset($session_data) || empty($session_data)) {
            redirect('admin/login');
        }

         $this->load->model('admin/logmodel');
        
    }

	public function index() {
        $this->data['title'] = 'Log'; 
        $this->data['log'] = $this->logmodel->getlogdata();
		$this->load->view('admin/common/header',$this->data);
		$this->load->view('admin/log',$this->data);
		$this->load->view('admin/common/footer');
	}
}
