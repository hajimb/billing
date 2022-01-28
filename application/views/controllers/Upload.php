<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Upload extends CI_Controller {
	public function __construct(){
        parent::__construct();
        $this->data['session_data'] = @$this->session->userdata('user_session');
        $this->data['user_permission'] = @$this->session->userdata('user_permission');
        $this->restaurant_id = $this->data['session_data']['restaurant_id'];  
    }


    public function index(){
		$this->data['title']            = "Upload Multiple Data"; 
        $this->data['pagename']         = 'upload-excel'; 
		$this->data['page_title']       = "Upoload Excel";
		$this->data['breadcrumb'][0]    = "Category";
		$this->load->view('common/header',$this->data);
        $this->load->view('common/sidebar',$this->data);		
        $this->load->view('common/breadcrumb',$this->data);		
		$this->load->view("upload/index",$this->data);
		$this->load->view('common/footer');
    }
}
