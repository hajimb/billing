<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class WastageListing extends CI_Controller {
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
         $this->load->model('Wastagemodel'); 
         $this->load->model('RawMaterialmodel');
        
    }

	public function index() {
        $this->data['title'] = 'Wastage Listing'; 
         $this->data['wastag'] = $this->Wastagemodel->getWastagekdata();
		$this->load->view('common/header',$this->data);
        $this->load->view('common/sidebar',$this->data);
		$this->load->view('inventory/wastage/wastage_listing');
		$this->load->view('common/footer');
	}

    public function add_Wastage() {
        $this->data['title'] = 'Add Wastage'; 
        $this->data['restaurant'] = getData('restaurant', 0, "restaurant_id");
        $this->data['category'] = $this->Categorymodel->getCategorydata();
        $this->data['stock'] = $this->Stockmodel->getCurrentStockdata();
        $this->data['rawmaterial'] = $this->RawMaterialmodel->getRawMaterialdata();
		$this->load->view('common/header',$this->data);
        $this->load->view('common/sidebar',$this->data);
		$this->load->view('inventory/wastage/add');
		$this->load->view('common/footer');
	}

    public function add()
	{		
		$this->data["page_head"]  = "Add Wastage";
		$this->data["page_title"] = "Add Wastage";
		$this->data["page_view"]  = "Add Wastage";
        $stockData['restaurant_id'] = $this->input->post("restaurant_id");
        //$stockData['cat_id'] = $this->input->post("cat_id");
        $stockData['rawmaterial_id'] = $this->input->post("rawmaterial_id");        
        $stockData['wastage'] = $this->input->post("wastage");               
        $stockData['unit'] = $this->input->post("unit");                     
        
		$datareq = $this->Wastagemodel->addWastageRequest($stockData);
        if($datareq == 1){
            $return['status'] = 1;
            $return['msg'] = 'Stock added successfully';
        }else{
            $return['status'] = 0;
            $return['msg'] = 'error in storing data';
        }
        echo json_encode($return);
        redirect('WastageListing');
	}

    public function edit($id)
	{	
		$this->data['title'] = 'Edit Stock'; 
		$this->data["page_head"]  = "Edit Stock";
		$this->data["page_title"] = "Edit Stock";
		$this->data["page_view"]  = "Edit Stock";
        $this->data['restaurant'] = getData('restaurant', 0, "restaurant_id");
        $this->data['stock'] = $this->Stockmodel->getCurrentStockdata();
        $this->data['rawmaterial'] = $this->RawMaterialmodel->getRawMaterialdata();
		$this->data["formdata"] = $this->Wastagemodel->getWastage($id);		
		$this->load->view('common/header',$this->data);
        $this->load->view('common/sidebar',$this->data);		
		$this->load->view("inventory/wastage/edit",$this->data);
		$this->load->view('common/footer');
	}

    public function update($id='')
	{
        $data = array(
            'wastage_id' => $this->input->post("id"),
            'restaurant_id' => $this->input->post("restaurant_id"),
            'rawmaterial_id' => $this->input->post("rawmaterial_id"),
            'wastage' => $this->input->post("wastage"),
            'unit' => $this->input->post("unit")           
        );
            $datareq = $this->Wastagemodel->updaterecord($data);
            if($datareq == 1){
                $return['status'] = 1;
                $return['msg'] = 'Wastage edit successfully';
            }else{
                $return['status'] = 0;
                $return['msg'] = 'error in storing data';
            }  
    redirect('WastageListing');
		
	}

    public function Wastage_delete($id)
    {        
        $this->Wastagemodel->delete_Wastage($id);
        redirect('WastageListing');
    }
    
}
