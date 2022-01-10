<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Item extends CI_Controller {
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
        $this->load->model('Itemmodel');
        $this->load->model('Restaurantmodel');
        $this->load->model('Categorymodel');        
    }

	public function index() {
        $this->data['title'] = 'Item List'; 
        $this->data['category'] = $this->Categorymodel->getCategorydata();
        $this->data['items'] = $this->Itemmodel->getitemsdata();
		$this->load->view('common/header',$this->data);
        $this->load->view('common/sidebar',$this->data);
		$this->load->view('Item/item');
		$this->load->view('common/footer');
	}

    public function add_item() {
        $this->data['title'] = 'Add New Item'; 
        $this->data['restaurant'] = $this->Restaurantmodel->getrestaurantsdata();
        $this->data['category'] = $this->Categorymodel->getCategorydata();
		$this->load->view('common/header',$this->data);
        $this->load->view('common/sidebar',$this->data);
		$this->load->view('Item/add_item');
		$this->load->view('common/footer');
	}

    public function add()
	{		
		$this->data["page_head"]  = "Add Item";
		$this->data["page_title"] = "Add Item";
		$this->data["page_view"]  = "Add Item";
        $itemData['restaurant_id'] = $this->input->post("restaurant_id");
        $itemData['cat_id'] = $this->input->post("cat_id");
        $itemData['item_name'] = $this->input->post("item_name");
        $itemData['short_code'] = $this->input->post("short_code");
        $itemData['price'] = $this->input->post("price");
        if($this->input->post("favorite") > 0)
        {$itemData['favorite'] = $this->input->post("favorite");}        
        $itemData['stock_status'] = $this->input->post("stock_status");               
        
		$datareq = $this->Itemmodel->addItemRequest($itemData);
        if($datareq == 1){
            $return['status'] = 1;
            $return['msg'] = 'Item added successfully';
        }else{
            $return['status'] = 0;
            $return['msg'] = 'error in storing data';
        }
        echo json_encode($return);
        redirect('item');
	}

    public function edit($id)
	{	
		$this->data['title'] = 'Edit Item'; 
		$this->data["page_head"]  = "Edit Item";
		$this->data["page_title"] = "Edit Item";
		$this->data["page_view"]  = "Edit Item";
        $this->data['restaurant'] = $this->Restaurantmodel->getrestaurantsdata();
        $this->data['category'] = $this->Categorymodel->getCategorydata();
		$this->data["formdata"]   = $this->Itemmodel->getitem($id);		
		$this->load->view('common/header',$this->data);
        $this->load->view('common/sidebar',$this->data);		
		$this->load->view("Item/edit_item",$this->data);
		$this->load->view('common/footer');
	}
    public function update($id='')
	{
       $data = array(
            'item_id' => $this->input->post("id"),
            'restaurant_id' => $this->input->post("restaurant_id"),
            'cat_id' => $this->input->post("cat_id"),
            'item_name' => $this->input->post("item_name"),
            'short_code' => $this->input->post("short_code"),        
            'price' => $this->input->post("price"),            
            'stock_status' => $this->input->post("stock_status")
        );
            $datareq = $this->Itemmodel->updaterecord($data);
            if($datareq == 1){
                $return['status'] = 1;
                $return['msg'] = 'item edit successfully';
            }else{
                $return['status'] = 0;
                $return['msg'] = 'error in storing data';
            }  
        redirect('item');
		
	}

    public function item_delete($id)
    {        
        $this->Itemmodel->delete_item($id);
        redirect('item');
    }
    
}
