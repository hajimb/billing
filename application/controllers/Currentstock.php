<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Currentstock extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->data['session_data'] = @$this->session->userdata('user_session');
        $this->data['user_permission'] = @$this->session->userdata('user_permission');
        $this->restaurant_id = $this->data['session_data']['restaurant_id'];
        $this->load->model('Stockmodel');
    }


    
    public function index()
	{
        $this->data['data'] = $this->Stockmodel->getCurrentStockdata($this->restaurant_id);
        $this->data['js']   = array(
			"assets/plugins/datatables/jquery.dataTables.min.js",
			"assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js",
			"assets/plugins/datatables-responsive/js/dataTables.responsive.min.js",
			"assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js",
		);
		$this->data['css']     = array(
			"assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css",
			"assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css",
			"assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css",
		);
		$this->data["pagename"]  = "current-stock-list";
		$this->data['page_title'] = "Current Stock List";
		$this->data['breadcrumb'][] = '<a href="'.base_url().'inventory">Inventory</a>';
		$this->data['breadcrumb'][] = "Current Stock";
		$this->load->view('common/header',$this->data);
        $this->load->view('common/sidebar',$this->data);
        $this->load->view('common/breadcrumb',$this->data);
		$this->load->view('inventory/stock/index');
		$this->load->view('common/footer');
	}
    
}
