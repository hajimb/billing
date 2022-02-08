<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kot extends CI_Controller {
	public function __construct(){
        parent::__construct();

		$session_data = $this->session->userdata('user_session');
        if (!isset($session_data) || empty($session_data)) {
            redirect('login');
        }else{
            $this->data['session_data'] = @$this->session->userdata('user_session');
			$this->data['user_permission'] = @$this->session->userdata('user_permission');

        }
        $this->restaurant_id = $session_data['restaurant_id'];
        $this->load->model('Ordermodel');
        $this->load->model('Kotmodel');
        // $this->load->model('admin/commonmodel');
        
    }

	public function index() {
        $this->data['title'] = 'KOT List'; 
		$this->load->view('common/header',$this->data);
        $this->load->view('common/sidebar',$this->data);
        
        $this->data['order'] = $this->Kotmodel->getkotdata($this->restaurant_id);
        $this->data['order_new'] = $this->Kotmodel->getkotdataTaken($this->restaurant_id);
		$this->load->view('kot',$this->data);
		$this->load->view('common/footer');
	}
    
}
