<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DayEnd extends CI_Controller {
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
		$this->load->model('Ordermodel');
        // $this->load->model('admin/commonmodel');
        
    }

	public function index() {
        $this->data['title'] = 'Day End'; 
		$this->load->view('common/header',$this->data);
        $this->load->view('common/sidebar',$this->data);
		$this->data['dayend'] = $this->Ordermodel->dayenddata();
		$this->load->view('day_end',$this->data);
		$this->load->view('common/footer');
	}
    
}
