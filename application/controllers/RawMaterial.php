<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RawMaterial extends CI_Controller {
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

        $this->load->model('RawMaterialmodel');        
    }

	public function index() {
        $this->data['title'] = 'RawMaterial List'; 
        $this->data['rawmaterial'] = $this->RawMaterialmodel->getRawMaterialdata();
		$this->load->view('common/header',$this->data);
        $this->load->view('common/sidebar',$this->data);
		$this->load->view('inventory/raw_material/raw_material');
		$this->load->view('common/footer');
	}

    public function add_RawMaterial() {
        $this->data['title'] = 'Add New Raw Material'; 
		$this->load->view('common/header',$this->data);
        $this->load->view('common/sidebar',$this->data);
		$this->load->view('inventory/raw_material/add');
		$this->load->view('common/footer');
	}

    public function add()
	{		
		$this->data["page_head"]  = "Add Raw Material";
		$this->data["page_title"] = "Add Raw Material";
		$this->data["page_view"]  = "Add Raw Material";
        $RawMaterialData['RawMaterial'] = $this->input->post("raw_material");        
		$datareq = $this->RawMaterialmodel->addRawMaterialRequest($RawMaterialData);
        if($datareq == 1){
            $return['status'] = 1;
            $return['msg'] = 'Raw Material added successfully';
        }else{
            $return['status'] = 0;
            $return['msg'] = 'error in storing data';
        }
        echo json_encode($return);
        redirect('RawMaterial');
	}

    public function edit($id)
	{	
		$this->data['title'] = 'Edit Raw Material'; 
		$this->data["page_head"]  = "Edit Raw Material";
		$this->data["page_title"] = "Edit Raw Material";
		$this->data["page_view"]  = "Edit Raw Material";
		$this->data["formdata"]   = $this->RawMaterialmodel->getRawMaterial($id);		
		$this->load->view('common/header',$this->data);
        $this->load->view('common/sidebar',$this->data);		
		$this->load->view("inventory/raw_material/edit",$this->data);
		$this->load->view('common/footer');
	}
    public function update($id='')
	{
		$data = array(
            'rawmaterial_id' => $this->input->post("id"),
            'RawMaterial' => $this->input->post("raw_material")
        );
            $datareq = $this->RawMaterialmodel->updaterecord($data);
            if($datareq == 1){
                $return['status'] = 1;
                $return['msg'] = 'Raw Material edit successfully';
            }else{
                $return['status'] = 0;
                $return['msg'] = 'error in storing data';
            }  
        redirect('RawMaterial');
		
	}

    public function RawMaterial_delete($id)
    {        
        $this->RawMaterialmodel->delete_RawMaterial($id);
        redirect('RawMaterial');
    }
    
}
