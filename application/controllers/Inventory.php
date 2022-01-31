<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inventory extends CI_Controller {
	public function __construct(){
        parent::__construct();

        $this->data['session_data'] = @$this->session->userdata('user_session');
        $this->data['user_permission'] = @$this->session->userdata('user_permission');
        $this->restaurant_id = $this->data['session_data']['restaurant_id'];  

		$this->load->model('Stockmodel');
		$this->load->model('Rawmaterialmodel');
		$this->load->model('Wastagemodel');
        
    }

	
	// Show Inventory Main Page baseurl/inventory
	public function index() {
        $this->data['title'] = 'Inventory Management'; 
		$this->data['page_title']   = "Inventory Management";
		$this->data['breadcrumb'][] = 'Inventory Management';
		$this->load->view('common/header',$this->data);
        $this->load->view('common/sidebar',$this->data);
        $this->load->view('common/breadcrumb',$this->data);		
		$this->load->view('inventory/inventory');
		$this->load->view('common/footer');
	}

	// Show Current Stock List baseurl/currentstock
	public function currentstock(){
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

    // Show Stock Report baseurl/stockreport
	public function stockreport() {
        $this->data['title'] = 'Stock Report'; 
		$this->load->view('common/header',$this->data);
        $this->load->view('common/sidebar',$this->data);
		$this->load->view('stock_report');
		$this->load->view('common/footer');
	}
    


	// Show Raw Material List baseurl/rawmaterial
	public function rawmaterial(){
        $this->data['data'] = $this->Rawmaterialmodel->getData(0, $this->restaurant_id);
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
		$this->data["pagename"]  = "raw-material-list";
		$this->data["rurl"]  	 = "rawmaterial";
		$this->data['page_title'] = "Raw Material List";
		$this->data['breadcrumb'][] = '<a href="'.base_url().'inventory">Inventory</a>';
		$this->data['breadcrumb'][] = "Raw Material";
		$this->load->view('common/header',$this->data);
        $this->load->view('common/sidebar',$this->data);
        $this->load->view('common/breadcrumb',$this->data);
		$this->load->view('inventory/raw_material/index');
		$this->load->view('common/footer');
	}
	
	// Show Raw Material Edit baseurl/rawmaterial/edit
    public function rawmaterial_edit(){	
        $todo = "Edit";
        $id = $this->input->post('main_id');
        $this->rawmaterial_create($id, $todo);
	}

	// Show Raw Material Add baseurl/rawmaterial/create
    public function rawmaterial_create($id = 0,$todo = "Add"){
		$this->data['title']        = $todo." Raw Material"; 
        $this->data['pagename']     = 'raw-material-edit'; 
		$this->data["rurl"]  	 = "rawmaterial";
		$this->data['page_title']   = "Manage Raw Material";
		$this->data['breadcrumb'][] = '<a href="'.base_url().'inventory">Inventory</a>';
		$this->data['breadcrumb'][] = '<a href="'.base_url().'rawmaterial">Raw Material</a>';
		$this->data['breadcrumb'][] = $todo;
        $this->data["main_id"]      = $id;
		$this->data["todo"]         = $todo;
		$this->data["units"]        = getUnit();
        $this->data["data"]         = getData('rawmaterial', $this->restaurant_id,"rawmaterial_id", $id);	
		$this->load->view('common/header',$this->data);
        $this->load->view('common/sidebar',$this->data);		
        $this->load->view('common/breadcrumb',$this->data);		
		$this->load->view("inventory/raw_material/edit",$this->data);
		$this->load->view('common/footer');
    }

	// Show Purchase List baseurl/purchase
    public function purchase(){
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
		$this->data["rurl"]  	= "purchase";
		$this->data['page_title'] = "Purchase List";
		$this->data['breadcrumb'][] = '<a href="'.base_url().'inventory">Inventory</a>';
		$this->data['breadcrumb'][] = "Purchase List";
		$this->data['restaurant_id'] = $this->restaurant_id;
		$this->load->view('common/header',$this->data);
        $this->load->view('common/sidebar',$this->data);
        $this->load->view('common/breadcrumb',$this->data);
		$this->load->view('inventory/purchase/index');
		$this->load->view('common/footer');
		//$this->render_template('groups/index', $this->data);
	}

	// Show Pruchase Edit baseurl/purchase/edit
    public function purchase_edit(){	
        $todo = "Edit";
        $id = $this->input->post('main_id');
        $this->purchase_create($id, $todo);
	}

	// Show Pruchase Add baseurl/purchase/edit
    public function purchase_create($id = 0,$todo = "Add"){
		$this->data['title']        = $todo." Stock"; 
        $this->data['pagename']     = 'stock-edit'; 
		$this->data["rurl"]  		= "purchase";
		$this->data['page_title']   = "Manage Purchase";
		$this->data['breadcrumb'][] = '<a href="'.base_url().'inventory">Inventory</a>';
		$this->data['breadcrumb'][] = '<a href="'.base_url().'purchase">Purchase</a>';
		$this->data['breadcrumb'][] = $todo;
        $this->data["main_id"]      = $id;
		$this->data["todo"]         = $todo;
        $this->data['restaurant']   = getRestaurant();
        $this->data["data"]         = $this->Stockmodel->getData($id, $this->restaurant_id);
        $this->data["units"]        = getUnit();
        $this->data["ptype"]        = getPaymentType();
		$this->data["rawmaterial"]  = getRawmaterial($this->restaurant_id);
		$this->load->view('common/header',$this->data);
        $this->load->view('common/sidebar',$this->data);		
        $this->load->view('common/breadcrumb',$this->data);		
		$this->load->view("inventory/purchase/edit",$this->data);
		$this->load->view('common/footer');
    }


	// Show Raw Material Used baseurl/rawmaterial-used
	public function rawmaterialused(){
        $this->data['data'] = $this->Wastagemodel->getData(0, $this->restaurant_id, 'U');
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
		$this->data["pagename"]  = "wastage-list";
		$this->data['rurl']     	= 'rawmaterialused'; 
		$this->data['page_title'] = "Raw Material Used";
		$this->data['breadcrumb'][] = '<a href="'.base_url().'inventory">Inventory</a>';
		$this->data['breadcrumb'][] = "Raw Material Used";
		$this->load->view('common/header',$this->data);
        $this->load->view('common/sidebar',$this->data);
        $this->load->view('common/breadcrumb',$this->data);
		$this->load->view('inventory/raw_material/usedlist');
		$this->load->view('common/footer');
	}

	// Show Raw Material Edit baseurl/rawmaterial/used-edit
	public function rawmaterialused_edit(){	
        $todo = "Edit";
        $id = $this->input->post('main_id');
        $this->rawmaterialused_create($id, $todo);
	}

	// Show Raw Material Add baseurl/rawmaterial/used-create
    public function rawmaterialused_create($id = 0,$todo = "Add"){
		$this->data['title']        = $todo." Used Raw Material"; 
        $this->data['rurl']     	= 'rawmaterialused'; 
        $this->data['pagename']     = 'wastage-edit'; 
		$this->data['page_title']   = "Raw Material Used";
		$this->data['breadcrumb'][] = '<a href="'.base_url().'inventory">Inventory</a>';
		$this->data['breadcrumb'][] = '<a href="'.base_url().'rawmaterial-used">Raw Material Used</a>';
		$this->data['breadcrumb'][] = $todo;
        $this->data["main_id"]      = $id;
		$this->data["todo"]         = $todo;
		$this->data["rawmaterial"]  = getRawmaterial($this->restaurant_id);

        $this->data["data"]         = $this->Wastagemodel->getData($id,$this->restaurant_id, 'U');	
        // $this->data["data"]         = getData('rawmaterial', $this->restaurant_id, "rawmaterial_id", $id);	
		$this->load->view('common/header',$this->data);
        $this->load->view('common/sidebar',$this->data);		
        $this->load->view('common/breadcrumb',$this->data);		
		$this->load->view("inventory/raw_material/used",$this->data);
		$this->load->view('common/footer');
    }


	// Show Wastage List baseurl/purchase
	public function wastage()
	{
        // $this->data['data'] = getData('wastage', $this->restaurant_id,"wastage_id ");
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
		$this->data["pagename"]  	= "wastage-list";
		$this->data['rurl']    		= 'wastage'; 
		$this->data['page_title'] 	= "Wastage List";
		$this->data['breadcrumb'][] = '<a href="'.base_url().'inventory">Inventory</a>';
		$this->data['breadcrumb'][] = "Wastage";
        $this->data["data"]         = $this->Wastagemodel->getData(0, $this->restaurant_id);	
		// $this->data['breadcrumb'][1] = "";
		$this->load->view('common/header',$this->data);
        $this->load->view('common/sidebar',$this->data);
        $this->load->view('common/breadcrumb',$this->data);
		$this->load->view('inventory/wastage/index');
		$this->load->view('common/footer');
	}

    public function wastage_edit()
	{	
        $todo = "Edit";
        $id = $this->input->post('main_id');
        $this->wastage_create($id, $todo);
	}

    public function wastage_create($id = 0, $todo = "Add", $type='Wastage'){
		$this->data['title']        = $todo." Wastage"; 
        $this->data['rurl']     	= 'wastage'; 
        $this->data['pagename']     = 'wastage-edit'; 
		$this->data['page_title']   = "Manage wastage";
		$this->data['breadcrumb'][] = '<a href="'.base_url().'inventory">Inventory</a>';
		$this->data['breadcrumb'][] = '<a href="'.base_url().'wastagelisting">Wastage</a>';
		$this->data['breadcrumb'][] = $todo;
        $this->data["main_id"]      = $id;
		$this->data["todo"]         = $todo;
		$this->data["units"]        = getUnit();
		$this->data["rawmaterial"]  = getRawmaterial($this->restaurant_id);
        $this->data["data"]         = $this->Wastagemodel->getData($id,$this->restaurant_id);
		$this->load->view('common/header',$this->data);
        $this->load->view('common/sidebar',$this->data);		
        $this->load->view('common/breadcrumb',$this->data);		
		$this->load->view("inventory/wastage/edit",$this->data);
		$this->load->view('common/footer');
    }

	// Indent Management
	public function indent()
	{
        $this->data['data'] = $this->Stockmodel->getIndent(0, $this->restaurant_id);
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
		$this->data["pagename"]  = "indent-material-list";
		$this->data['page_title'] = "Indent";
		$this->data['breadcrumb'][] = '<a href="'.base_url().'inventory">Inventory</a>';
		$this->data['breadcrumb'][] = "Indent";
		$this->load->view('common/header',$this->data);
        $this->load->view('common/sidebar',$this->data);
        $this->load->view('common/breadcrumb',$this->data);
		$this->load->view('inventory/indent/index');
		$this->load->view('common/footer');
	}
}
