<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cashflow extends CI_Controller {
	public function __construct(){
        parent::__construct();
        $this->data['session_data'] = @$this->session->userdata('user_session');
        $this->data['user_permission'] = @$this->session->userdata('user_permission');
    }

	public function index() {
        $this->data['title'] = 'Cash Flow'; 
		$this->load->view('common/header',$this->data);
        $this->load->view('common/sidebar',$this->data);
		$this->load->view('cash_flow');
		$this->load->view('common/footer');
	}
    
}
