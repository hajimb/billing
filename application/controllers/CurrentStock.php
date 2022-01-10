<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CurrentStock extends CI_Controller {
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

        $this->load->model('Stockmodel');
        $this->load->model('Restaurantmodel');
        $this->load->model('Categorymodel'); 
        
    }

	public function index() {
        $this->data['title'] = 'Current Stock'; 
         $this->data['stock'] = $this->Stockmodel->getCurrentStockdata();
         $this->data['wastage'] = $this->Stockmodel->getCurrentwastagedata();
		$this->load->view('common/header',$this->data);
        $this->load->view('common/sidebar',$this->data);
		$this->load->view('inventory/stock/current_stock');
		$this->load->view('common/footer');
	}
    
    
}
