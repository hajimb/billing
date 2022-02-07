<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Order extends CI_Controller {
	public function __construct(){
        parent::__construct();
        $this->data['session_data'] = @$this->session->userdata('user_session');
        $this->data['user_permission'] = @$this->session->userdata('user_permission');
        $this->restaurant_id = $this->data['session_data']['restaurant_id'];
        $this->load->model('Ordermodel');
        $this->load->model('Categorymodel');   
        $this->load->model('Itemmodel');
        $this->load->model('Tablemodel');
        $this->load->model('Discountmodel'); 
        $this->load->model('Customermodel');

    }

    public function index()
    {
        // $this->data['data'] = getOrders($this->restaurant_id);
        $this->data['data'] =$this->Ordermodel->getComplateordersdata();
        $this->data['js']     = array(
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
        $this->data["pagename"]  = "order-list";
        $this->data['page_title'] = "Order List";
        $this->data['breadcrumb'][0] = "Order";
        // $this->data['breadcrumb'][1] = "";
        $this->load->view('common/header',$this->data);
        $this->load->view('common/sidebar',$this->data);
        $this->load->view('common/breadcrumb',$this->data);
        $this->load->view('order/index');
        $this->load->view('common/footer');
        //$this->render_template('groups/index', $this->data);
    }	

	public function index1() {
         $get_data = $this->input->get();
         $this->data['title'] = 'Nre order'; 
         $this->data['category'] = getData('category', $this->restaurant_id,"category_id");        
         $this->data['table'] = $this->Tablemodel->gettablesdata($get_data['table_id']);
         $this->data['item'] = $this->Itemmodel->getitemsdata();
         $this->data['discount'] = getData('discount', $this->restaurant_id,"discount_id");   
         if(isset($get_data['table_id'])){
            $this->data['order'] = $this->Ordermodel->getorderdata($get_data['table_id']);
            
         }
         $this->data['tax'] = $this->Ordermodel->getactivetax($this->restaurant_id);
         $this->data['customer'] = getData('customer', $this->restaurant_id,"customer_id");
		$this->load->view('common/header',$this->data);
        $this->load->view('common/sidebar',$this->data);
		$this->load->view('order/order');
		$this->load->view('common/footer');
	}    

    public function list1() {
        $this->data['title'] = 'Order List'; 
		$this->load->view('common/header',$this->data);
        $this->load->view('common/sidebar',$this->data);
        $this->data['order'] = $this->Ordermodel->getComplateordersdata();
		$this->load->view('order/list',$this->data);
		$this->load->view('common/footer');
	}

    public function table($table_id) {
        echo $table_id;
        $this->data['title'] = 'Nre order'; 
        $this->data['category'] = getData('category', $this->restaurant_id,"category_id");        
        $this->data['table'] = $this->Tablemodel->gettablesdata();
        $this->data['item'] = $table_id;
        $this->data['table_id'] = $this->Itemmodel->getitemsdata();
        $this->data['tax'] = $this->Ordermodel->getactivetax($this->restaurant_id);
		$this->load->view('common/header',$this->data);
        $this->load->view('common/sidebar',$this->data);
		$this->load->view('order/order');
		$this->load->view('common/footer');
	}
    
    public function getordertable()
	{
        $post_data = $this->input->post();
       // print_r($post_data);
        $datareq = $this->Ordermodel->getordertable($post_data);

        if(count($datareq) >= 0){
            $return['status'] = 1;
            $return['msg'] = 'Oredr Created successfully';
            $return['data'] = $datareq;
        }else{
            $return['status'] = 0;
            $return['msg'] = 'error in data fatch';
        }
        echo json_encode($return);
    }
    public function orderstatusupdate()
	{
        $post_data = $this->input->post();
       // print_r($post_data);
        $datareq = $this->Ordermodel->orderstatusupdate($post_data);

        if($datareq == 1){
            $return['status'] = 1;
            $return['msg'] = 'Oredr Status Updated successfully';
        }else{
            $return['status'] = 0;
            $return['msg'] = 'error in data Updated';
        }
        echo json_encode($return);
    }
    public function orderstatusupdatenew()
	{
        $post_data = $this->input->post();
       // print_r($post_data);
        $datareq = $this->Ordermodel->orderstatusupdatenew($post_data);

        if($datareq == 1){
            $return['status'] = 1;
            $return['msg'] = 'Oredr Status Updated successfully';
        }else{
            $return['status'] = 0;
            $return['msg'] = 'error in data Updated';
        }
        echo json_encode($return);
    }
    public function billstatusupdate()
	{
        $post_data = $this->input->post();
       // print_r($post_data);
        $datareq = $this->Ordermodel->billstatusupdate($post_data);

        if($datareq == 1){
            $return['status'] = 1;
            $return['msg'] = 'Bill "'.$post_data['status'].'" successfully';
        }else{
            $return['status'] = 0;
            $return['msg'] = 'error in data Updated';
        }
        echo json_encode($return);
    }
    public function billdiscountupdate()
	{
        $post_data = $this->input->post();
       // print_r($post_data);
        $datareq = $this->Ordermodel->billdiscountupdate($post_data);

        if($datareq == 1){
            $return['status'] = 1;
            $return['msg'] = 'Bill Discount successfully';
        }else{
            $return['status'] = 0;
            $return['msg'] = 'error in data Updated';
        }
        echo json_encode($return);
    }
    public function billpaiedupdate()
	{
        $post_data = $this->input->post();
       // print_r($post_data);
        $datareq = $this->Ordermodel->billpaiedupdate($post_data);

        if($datareq == 1){
            $return['status'] = 1;
            $return['msg'] = 'Bill paid successfully';
        }else{
            $return['status'] = 0;
            $return['msg'] = 'error in data Updated';
        }
        echo json_encode($return);
    }
    
    public function orderstatusupdateTable()
	{
        $post_data = $this->input->post();
       // print_r($post_data);
        $datareq = $this->Ordermodel->orderstatusupdateTable($post_data);

        if($datareq == 1){
            $return['status'] = 1;
            $return['msg'] = 'Oredr Status Updated successfully';
        }else{
            $return['status'] = 0;
            $return['msg'] = 'error in data Updated';
        }
        echo json_encode($return);
    }
    public function tableEmpty()
	{
        $post_data = $this->input->post();
       // print_r($post_data);
        $datareq = $this->Ordermodel->tableEmpty($post_data);

        if($datareq == 1){
            $return['status'] = 1;
            $return['msg'] = 'Oredr Status Updated successfully';
        }else{
            $return['status'] = 0;
            $return['msg'] = 'error in data Updated';
        }
        echo json_encode($return);
    }
    public function add()
	{		
        $post_data = $this->input->post();
        if(isset($post_data['item_id'])){
            $datareq = $this->Ordermodel->addOrderRequest($post_data);
            if($datareq != 0){
                $return['status'] = 1;
                $return['msg'] = 'Oredr Created successfully';
                $return['data'] = $datareq;
            }else{
                $return['status'] = 0;
                $return['msg'] = 'No Order Saved due to Error, Try Again';
            }
        }else{
            $return['status'] = 0;
            $return['msg'] = 'No Item Selected';
        }
        echo json_encode($return);
        //redirect('item');
	}


    public function update()
	{		
        $post_data = $this->input->post();
        $datareq = $this->Ordermodel->updateOrderRequest($post_data);
        if($datareq == 1){
            $return['status'] = 1;
            $return['msg'] = 'Oredr Updated successfully';
        }else{
            $return['status'] = 0;
            $return['msg'] = 'error in storing data';
        }
        echo json_encode($return);
        //redirect('item');
	}

    public function getItemsbycategory($id)
    {        
        $this->data["items"] = $this->Ordermodel->getItemsbycategory($id);

        echo json_encode($this->data);
        //redirect('order');
    }
    public function getItemsbysearch()
    {        
        echo $this->input->post('search');
        exit;
        $this->data["items"] = $this->Ordermodel->getItemsbysearch($_REQUEST['search']);

        echo json_encode($this->data);
        //redirect('order');
    }
    public function getorderBilltable()
	{
        $post_data = $this->input->post();
       // print_r($post_data);
        $datareq = $this->Ordermodel->getorderBilltable($post_data);

        if(count($datareq) >= 0){
            $return['status'] = 1;
            $return['msg'] = 'Oredr Created successfully';
            $return['data'] = $datareq;
        }else{
            $return['status'] = 0;
            $return['msg'] = 'error in data fatch';
        }
        echo json_encode($return);
    }
    
    
}
