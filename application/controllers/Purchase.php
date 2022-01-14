<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Purchase extends CI_Controller {
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
        $this->load->model('RawMaterialmodel'); 
        
    }

	public function index() {
        $this->data['title'] = 'Purchase Stock'; 
         $this->data['stock'] = $this->Stockmodel->getpurchaselisting();
		$this->load->view('common/header',$this->data);
        $this->load->view('common/sidebar',$this->data);
		$this->load->view('inventory/purchase/purchase_listing');
		$this->load->view('common/footer');
	}

    public function add_stock() {
        $this->data['title'] = 'Add Stock'; 
        $this->data['restaurant'] = getData('restaurant', 0, "restaurant_id");
        $this->data['category'] = $this->Categorymodel->getCategorydata();
        $this->data['rawmaterial'] = $this->RawMaterialmodel->getRawMaterialdata();
		$this->load->view('common/header',$this->data);
        $this->load->view('common/sidebar',$this->data);
		$this->load->view('inventory/purchase/add_stock');
		$this->load->view('common/footer');
	}

    public function add()
	{		
		$this->data["page_head"]  = "Add Stock";
		$this->data["page_title"] = "Add Stock";
		$this->data["page_view"]  = "Add Stock";
        $stockData['restaurant_id'] = $this->input->post("restaurant_id");
        //$stockData['cat_id'] = $this->input->post("cat_id");
        $stockData['rawmaterial_id'] = $this->input->post("rawmaterial_id");        
        $stockData['stock'] = $this->input->post("stock");               
        $stockData['unit'] = $this->input->post("unit");
        $stockData['supplier_name'] = $this->input->post("supplier_name");
        $stockData['invoice_no'] = $this->input->post("invoice_no");
        $stockData['total_amount'] = $this->input->post("total_amount");
        $stockData['paid_amount'] = $this->input->post("paid_amount");
        $stockData['payment_type'] = $this->input->post("payment_type");
                      
        
		$datareq = $this->Stockmodel->addStockRequest($stockData);
        if($datareq == 1){
            $return['status'] = 1;
            $return['msg'] = 'Stock added successfully';
        }else{
            $return['status'] = 0;
            $return['msg'] = 'error in storing data';
        }
        echo json_encode($return);
        redirect('purchase');
	}

    public function edit($id)
	{	
		$this->data['title'] = 'Edit Stock'; 
		$this->data["page_head"]  = "Edit Stock";
		$this->data["page_title"] = "Edit Stock";
		$this->data["page_view"]  = "Edit Stock";
        $this->data['restaurant'] = getData('restaurant', 0, "restaurant_id");
		$this->data["formdata"] = $this->Stockmodel->getcurrentstock($id);
        $this->data['rawmaterial'] = $this->RawMaterialmodel->getRawMaterialdata();		
		$this->load->view('common/header',$this->data);
        $this->load->view('common/sidebar',$this->data);		
		$this->load->view("inventory/purchase/edit_stock",$this->data);
		$this->load->view('common/footer');
	}

    public function update($id='')
	{
        $stockData['restaurant_id'] = $this->input->post("restaurant_id");
        //$stockData['cat_id'] = $this->input->post("cat_id");
        $stockData['rawmaterial_id'] = $this->input->post("rawmaterial_id");        
        $stockData['stock'] = $this->input->post("stock");               
        $stockData['unit'] = $this->input->post("unit");
        $stockData['supplier_name'] = $this->input->post("supplier_name");
        $stockData['invoice_no'] = $this->input->post("invoice_no");
        $stockData['total_amount'] = $this->input->post("total_amount");
        $stockData['paid_amount'] = $this->input->post("paid_amount");
        $stockData['payment_type'] = $this->input->post("payment_type");

		$data = array(
            'stock_id' => $this->input->post("id"),
            'restaurant_id' => $this->input->post("restaurant_id"),
            'rawmaterial_id' => $this->input->post("rawmaterial_id"),
            'stock' => $this->input->post("stock"),
            'unit' => $this->input->post("unit"),        
            'supplier_name' => $this->input->post("supplier_name"),
            'invoice_no' => $this->input->post("invoice_no"),
            'total_amount' => $this->input->post("total_amount"),
            'paid_amount' => $this->input->post("paid_amount"),
            'payment_type' => $this->input->post("payment_type")
        );
            $datareq = $this->Stockmodel->updaterecord($data);
            if($datareq == 1){
                $return['status'] = 1;
                $return['msg'] = 'tax edit successfully';
            }else{
                $return['status'] = 0;
                $return['msg'] = 'error in storing data';
            }  
        redirect('purchase');
		
	}

    public function Stock_delete($id)
    {        
        $this->Stockmodel->delete_Stock($id);
        redirect('purchase');
    }
    
}
