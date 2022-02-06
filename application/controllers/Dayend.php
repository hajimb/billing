<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dayend extends CI_Controller {
	public function __construct(){
        parent::__construct();
		$this->data['session_data'] = @$this->session->userdata('user_session');
        $this->data['user_permission'] = @$this->session->userdata('user_permission');
        $this->restaurant_id = $this->data['session_data']['restaurant_id'];  
		$this->load->model('Ordermodel');
        
    }

	public function index() {
        $this->data['title'] = 'Day End'; 
		$this->data['dayend'] = $this->Ordermodel->dayenddata($this->restaurant_id);
		$this->data['page_title'] = "Day End Summary";
		$this->data['breadcrumb'][] = "Day End";
		$this->data["pagename"]  = "day-end";
		$this->load->view('common/header',$this->data);
        $this->load->view('common/sidebar',$this->data);
        $this->load->view('common/breadcrumb',$this->data);
		$this->load->view('day_end',$this->data);
		$this->load->view('common/footer');
	}
    
}
