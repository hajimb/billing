<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tableorder extends CI_Controller {
	public function __construct(){
        parent::__construct();
        $this->data['session_data'] = @$this->session->userdata('user_session');
        $this->data['user_permission'] = @$this->session->userdata('user_permission');
        $this->restaurant_id = $this->data['session_data']['restaurant_id'];  
        $this->load->model('Ordermodel');
    }

	public function index() {
        $this->data['title'] = 'Table Order'; 
        $this->data['table']    = getTableData($this->restaurant_id,0);
        $this->data['session']  = $this->session->userdata('user_session');
        $this->data["pagename"]  = "tableorder-list";
        $this->data['page_title'] = "Table Order";
        $this->data['breadcrumb'][0] = "Table Order";
        // $this->data['breadcrumb'][1] = "";
        $this->load->view('common/header',$this->data);
        $this->load->view('common/sidebar',$this->data);
        $this->load->view('common/breadcrumb',$this->data);
        $this->load->view('tables/table');
        $this->load->view('common/footer');
	}
    
    public function create() {
        $table_id = $this->input->post('main_id');
        $this->data['table_id'] = $table_id; 
        $this->data['title']    = 'Create Order'; 
        $this->data["pagename"]  = "order-create";
        $this->data['page_title'] = "Table Order";
        $this->data['breadcrumb'][] = '<a href="'.base_url().'tableorder">Order</a>';
        $this->data['breadcrumb'][] = "Create";
        $this->data['category'] = getData('category', $this->restaurant_id,"category_id");        
        $this->data['table']    = getTableData($this->restaurant_id,0);
        // $this->data['item']     = getData('items', $this->restaurant_id,"item_id");
        $this->data['discount'] = getData('discount', $this->restaurant_id,"discount_id");   
        if(isset($table_id)){
            $this->data['order'] = $this->Ordermodel->getorderdata($table_id,0);
            
        }
        $this->data['tax']      = $this->Ordermodel->getactivetax();
        // $this->data['customer'] = getData('customer', $this->restaurant_id,"customer_id");
        $this->load->view('common/header',$this->data);
        $this->load->view('common/sidebar',$this->data);
        $this->load->view('common/breadcrumb',$this->data);
        $this->load->view('tables/order-create');
        $this->load->view('common/footer');
    }   
    
    public function view() {
        $table_id   = $this->input->post('table_id');
        $bill_id    = $this->input->post('bill_id');
        $this->data['table_id']     = $table_id; 
        $this->data['bill_id']      = $bill_id; 
        $this->data['title']        = 'View Order'; 
        $this->data["pagename"]     = "order-view";
        $this->data['page_title']   = "Table Order";
        $this->data['breadcrumb'][] = '<a href="'.base_url().'tableorder">Order</a>';
        $this->data['breadcrumb'][] = "View";
        $this->data['category']     = getData('category', $this->restaurant_id,"category_id");        
        $this->data['table']        = getTableData($this->restaurant_id,$table_id);
        $type = 0 ;
        if($this->data['table'][0]['ord_status']=='BillPaid'){
            $type = 1 ;
        }
        // $this->data['item']     = getData('items', $this->restaurant_id,"item_id");
        $this->data['discount'] = getData('discount', $this->restaurant_id,"discount_id");   
        if(isset($table_id)){
            $this->data['order'] = $this->Ordermodel->getorderdata($table_id,$type);
            // $this->data['order'] = getTableOrderData($bill_id);
            
        }
        $this->data['tax']      = $this->Ordermodel->getactivetax();
        // $this->data['customer'] = getData('customer', $this->restaurant_id,"customer_id");
        $this->load->view('common/header',$this->data);
        $this->load->view('common/sidebar',$this->data);
        $this->load->view('common/breadcrumb',$this->data);
        $this->load->view('tables/order-view');
        $this->load->view('common/footer');
   }   
}
