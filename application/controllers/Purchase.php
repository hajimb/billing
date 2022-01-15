<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Purchase extends CI_Controller {
	public function __construct(){
        parent::__construct();
        $this->data['session_data'] = @$this->session->userdata('user_session');
        $this->data['user_permission'] = @$this->session->userdata('user_permission');
        $this->restaurant_id = $this->data['session_data']['restaurant_id'];
        $this->load->model('Stockmodel');
    }


    public function index()
	{
        $this->data['data'] = $this->Stockmodel->getData(0, $this->restaurant_id);
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
		$this->data["pagename"]  = "stock-list";
		$this->data['page_title'] = "Stock List";
		$this->data['breadcrumb'][0] = "Stock";
		// $this->data['breadcrumb'][1] = "";
		$this->load->view('common/header',$this->data);
        $this->load->view('common/sidebar',$this->data);
        $this->load->view('common/breadcrumb',$this->data);
		$this->load->view('inventory/purchase/index');
		$this->load->view('common/footer');
		//$this->render_template('groups/index', $this->data);
	}

    public function edit()
	{	
        $todo = "Edit";
        $id = $this->input->post('main_id');
        $this->create($id, $todo);
	}

    public function create($id = 0,$todo = "Add"){
		$this->data['title']        = $todo." stock"; 
        $this->data['pagename']     = 'stock-edit'; 
		$this->data['page_title']   = "Manage stock";
		$this->data['breadcrumb'][0] = "stock";
		$this->data['breadcrumb'][1] = $todo;
        $this->data["main_id"]      = $id;
		$this->data["todo"]         = $todo;
        $this->data['restaurant']   = getRestaurant();
        // $this->data['category']     = getCategory($this->restaurant_id);
        $this->data["data"]         = getData('stock', $this->restaurant_id,"stock_id", $id);
        $this->data["units"]        = getUnit();
        $this->data["ptype"]        = getPaymentType();
		$this->data["rawmaterial"]  = getRawmaterial($this->restaurant_id);
		$this->load->view('common/header',$this->data);
        $this->load->view('common/sidebar',$this->data);		
        $this->load->view('common/breadcrumb',$this->data);		
		$this->load->view("inventory/purchase/edit",$this->data);
		$this->load->view('common/footer');
    }


	// public function index() {
    //     $this->data['title'] = 'Purchase Stock'; 
    //     $this->data['stock'] = $this->Stockmodel->getpurchaselisting();
	// 	$this->load->view('common/header',$this->data);
    //     $this->load->view('common/sidebar',$this->data);
	// 	$this->load->view('inventory/purchase/purchase_listing');
	// 	$this->load->view('common/footer');
	// }

    // public function add_stock() {
    //     // echo 'dasd';exit;
    //     $this->data['title'] = 'Add Stock'; 
    //     $this->data['restaurant'] = getData('restaurant', 0, "restaurant_id");
    //     $this->data['category'] = $this->Categorymodel->getCategorydata();
    //     // $this->data['rawmaterial'] = $this->RawMaterialmodel->getRawMaterialdata();
	// 	$this->load->view('common/header',$this->data);
    //     $this->load->view('common/sidebar',$this->data);
	// 	$this->load->view('inventory/purchase/add_stock');
	// 	$this->load->view('common/footer');
	// }

    // public function add()
	// {		
	// 	$this->data["page_head"]  = "Add Stock";
	// 	$this->data["page_title"] = "Add Stock";
	// 	$this->data["page_view"]  = "Add Stock";
    //     $stockData['restaurant_id'] = $this->input->post("restaurant_id");
    //     //$stockData['cat_id'] = $this->input->post("cat_id");
    //     $stockData['rawmaterial_id'] = $this->input->post("rawmaterial_id");        
    //     $stockData['stock'] = $this->input->post("stock");               
    //     $stockData['unit'] = $this->input->post("unit");
    //     $stockData['supplier_name'] = $this->input->post("supplier_name");
    //     $stockData['invoice_no'] = $this->input->post("invoice_no");
    //     $stockData['total_amount'] = $this->input->post("total_amount");
    //     $stockData['paid_amount'] = $this->input->post("paid_amount");
    //     $stockData['payment_type'] = $this->input->post("payment_type");
                      
        
	// 	$datareq = $this->Stockmodel->addStockRequest($stockData);
    //     if($datareq == 1){
    //         $return['status'] = 1;
    //         $return['msg'] = 'Stock added successfully';
    //     }else{
    //         $return['status'] = 0;
    //         $return['msg'] = 'error in storing data';
    //     }
    //     echo json_encode($return);
    //     redirect('purchase');
	// }

    // public function edit($id)
	// {	
	// 	$this->data['title'] = 'Edit Stock'; 
	// 	$this->data["page_head"]  = "Edit Stock";
	// 	$this->data["page_title"] = "Edit Stock";
	// 	$this->data["page_view"]  = "Edit Stock";
    //     $this->data['restaurant'] = getData('restaurant', 0, "restaurant_id");
	// 	$this->data["formdata"] = $this->Stockmodel->getcurrentstock($id);
    //     $this->data['rawmaterial'] = $this->RawMaterialmodel->getRawMaterialdata();		
	// 	$this->load->view('common/header',$this->data);
    //     $this->load->view('common/sidebar',$this->data);		
	// 	$this->load->view("inventory/purchase/edit_stock",$this->data);
	// 	$this->load->view('common/footer');
	// }

    // public function update($id='')
	// {
    //     $stockData['restaurant_id'] = $this->input->post("restaurant_id");
    //     //$stockData['cat_id'] = $this->input->post("cat_id");
    //     $stockData['rawmaterial_id'] = $this->input->post("rawmaterial_id");        
    //     $stockData['stock'] = $this->input->post("stock");               
    //     $stockData['unit'] = $this->input->post("unit");
    //     $stockData['supplier_name'] = $this->input->post("supplier_name");
    //     $stockData['invoice_no'] = $this->input->post("invoice_no");
    //     $stockData['total_amount'] = $this->input->post("total_amount");
    //     $stockData['paid_amount'] = $this->input->post("paid_amount");
    //     $stockData['payment_type'] = $this->input->post("payment_type");

	// 	$data = array(
    //         'stock_id' => $this->input->post("id"),
    //         'restaurant_id' => $this->input->post("restaurant_id"),
    //         'rawmaterial_id' => $this->input->post("rawmaterial_id"),
    //         'stock' => $this->input->post("stock"),
    //         'unit' => $this->input->post("unit"),        
    //         'supplier_name' => $this->input->post("supplier_name"),
    //         'invoice_no' => $this->input->post("invoice_no"),
    //         'total_amount' => $this->input->post("total_amount"),
    //         'paid_amount' => $this->input->post("paid_amount"),
    //         'payment_type' => $this->input->post("payment_type")
    //     );
    //         $datareq = $this->Stockmodel->updaterecord($data);
    //         if($datareq == 1){
    //             $return['status'] = 1;
    //             $return['msg'] = 'tax edit successfully';
    //         }else{
    //             $return['status'] = 0;
    //             $return['msg'] = 'error in storing data';
    //         }  
    //     redirect('purchase');
		
	// }

    // public function Stock_delete($id)
    // {        
    //     $this->Stockmodel->delete_Stock($id);
    //     redirect('purchase');
    // }
    
}
