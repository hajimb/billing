<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tax extends CI_Controller {
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

        $this->load->model('Taxmodel');        
    }

	public function index() {
        $this->data['title'] = 'Tax List'; 
        $this->data['tax'] = $this->Taxmodel->getTaxdata();
		$this->load->view('common/header',$this->data);
        $this->load->view('common/sidebar',$this->data);
		$this->load->view('tax/tax');
		$this->load->view('common/footer');
	}

    public function add_Tax() {
        $this->data['title'] = 'Add New Tax'; 
		$this->load->view('common/header',$this->data);
        $this->load->view('common/sidebar',$this->data);
		$this->load->view('tax/add_tax');
		$this->load->view('common/footer');
	}

    public function add()
	{		
		$this->data["page_head"]  = "Add Tax";
		$this->data["page_title"] = "Add Tax";
		$this->data["page_view"]  = "Add Tax";
        $TaxData['tax_name'] = $this->input->post("tax_name");
        $TaxData['vat'] = $this->input->post("vat");
        $TaxData['sgst'] = $this->input->post("sgst");
        $TaxData['cgst'] = $this->input->post("cgst");
        if($this->input->post("is_default") > 0)
        {
            $TaxData['is_default'] = $this->input->post("is_default");  
        }
        else
        {
            $TaxData['is_default'] = 0;  
        }
                     
		$datareq = $this->Taxmodel->addTaxRequest($TaxData);
        if($datareq == 1){
            $return['status'] = 1;
            $return['msg'] = 'Tax added successfully';
        }else{
            $return['status'] = 0;
            $return['msg'] = 'error in storing data';
        }
        echo json_encode($return);
        redirect('tax');
	}

    public function edit($id)
	{	
		$this->data['title'] = 'Edit Tax'; 
		$this->data["page_head"]  = "Edit Tax";
		$this->data["page_title"] = "Edit Tax";
		$this->data["page_view"]  = "Edit Tax";
		$this->data["formdata"]   = $this->Taxmodel->gettax($id);		
		$this->load->view('common/header',$this->data);
        $this->load->view('common/sidebar',$this->data);		
		$this->load->view("tax/edit_tax",$this->data);
		$this->load->view('common/footer');
	}
    public function update($id='')
	{
        if($this->input->post("is_default") > 0)
        {
            $is_default = $this->input->post("is_default");  
        }
        else
        {
            $is_default = 0;  
        }

		$data = array(
            'tax_id' => $this->input->post("id"),
            'tax_name' => $this->input->post("tax_name"),
            'vat' => $this->input->post("vat"),
            'sgst' => $this->input->post("sgst"),
            'cgst' => $this->input->post("cgst"),        
           'is_default' => $is_default 
        );
            $datareq = $this->Taxmodel->updaterecord($data);
            if($datareq == 1){
                $return['status'] = 1;
                $return['msg'] = 'tax edit successfully';
            }else{
                $return['status'] = 0;
                $return['msg'] = 'error in storing data';
            }  
    redirect('tax');
		
	}

    public function tax_delete($id)
    {        
        $this->Taxmodel->delete_tax($id);
        redirect('tax');
    }
    
}
