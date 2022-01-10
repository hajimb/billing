<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
require APPPATH . './libraries/REST_Controller.php';

class Groups extends REST_Controller {
    private $last_query= null;
    function __construct() {
        parent::__construct();
        $this->load->model('model_groups');
        $this->load->model('Customer_model');
        $this->last_query = false;
    }

    public function save_post(){
        $Return = array('status' => false,'validate' => false, 'message' => array());
        $this->form_validation->set_rules('group_name', 'Group Name', 'required|trim');
        $this->form_validation->set_error_delimiters('', '');
        $this->form_validation->set_message('required', 'Enter %s');
        if ($this->form_validation->run()) {

            $group_id = $this->post('group_id');
            $data['permission']     = serialize($this->input->post('permission'));
            $data['group_name']     = trim($this->input->post('group_name'));
            $result                 = $this->model_groups->save($data, $group_id);
            $this->response([
                'validate' => TRUE,
                'status' => $result['status'],
                'message' => $result['msg']
            ], REST_Controller::HTTP_OK);
            
        } else {
            foreach ($this->input->post() as $key => $value) {
                $verror[$key] = form_error($key);
            }
            $this->response([
                'validate'   => FALSE,
                'status' => FALSE,
                'message' => $verror
            ], REST_Controller::HTTP_OK);
        }
    }

    //load the role add/edit modal
    public function delete_post(){ 
        $this->form_validation->set_rules('id', 'Customer Id', 'required|numeric|trim');
        $this->form_validation->set_error_delimiters('', '');
        $this->form_validation->set_message('required', 'Enter %s');
        if ($this->form_validation->run()) {
            $id     = $this->post('id');
            $delete = $this->Customer_model->delete($id);
            $this->response([
                'status'    => $delete['status'],
                'validate'  => TRUE,
                'message'   => $delete['msg']
            ], REST_Controller::HTTP_OK);
        }else{
            foreach ($this->post() as $key => $value) {
                $verror[$key] = form_error($key);
            }
            $this->response([
                'status'    => FALSE,
                'validate'  => FALSE,
                'message'   => $verror,
            ], REST_Controller::HTTP_OK);
        }
    }

    public function index_post(){ 
        $data  = array('status' => false, 'message' => array());
        $result = $this->Customer_model->get($this->last_query);
        // print_r($result);
        $resultData    = array();
        if(!empty($result)){
            $no = 0;
            $button = '';
            foreach ($result  as $r) {
                $id = $r['customer_id'];
                $no++;
                $row    = array();
                $row[]  = $no;
                $row[]  = $r['mobile'];
                $row[]  = $r['c_name'];
                $row[]  = $r['dob'];
                $row[]  = $r['doa'];
                $row[]  = $r['address'];
                $row[]  = $r['email'];
                $row[]  = ' <span class="dflex">
                 <a href ="'.base_url().'customer/view/'.$id.'"><i class="icon ion-eye view" data-id="'.$id.'"></i></a>
                <a href ="'.base_url().'customer/edit/'.$id.'"> <i class="icon ion-edit" data-id="'.$id.'"></i></a>
                <i class="icon ion-trash-a delete" data-id="'.$id.'"></i></span>
                ';
                $resultData[]   = $row;
            }
            $this->response([
                'data'   => $resultData,
                'status' => TRUE,
                'message' => "Data Found"
            ], REST_Controller::HTTP_OK);
        }else{
            //set the response and exit
            $this->response([
                'data'   => $result,
                'status' => FALSE,
                'message' => 'No Record Found.'
            ], REST_Controller::HTTP_OK);
        }
    }

    public function get_post(){
        // print_r($_POST);exit;
        $Return      = array('status' => false,'validate' => false, 'message' => array());
        $this->form_validation->set_rules('id', 'ID', 'required|numeric|trim');
        $this->form_validation->set_error_delimiters('', '');
        $this->form_validation->set_message('required', 'Enter %s');
        if ($this->form_validation->run()) {
            $userId     = $this->post('userId');
            $is_allow   = init_apipermission_checker($userId, 'staff', '', 'edit');
            // print $this->db->last_query();
            if($is_allow){
                $id      = trim($this->post('id'));
                $result  = $this->staff->get_one($id);
                $this->response([
                    'validate' => TRUE,
                    'data'   => $result,
                    'status' => TRUE,
                    'message' => ""
                ], REST_Controller::HTTP_OK);
                
            }else{
                $this->response([
                    'validate'   => TRUE,
                    'data'   => '',
                    'status' => FALSE,
                    'message' => "You don't have Permission"
                ], REST_Controller::HTTP_OK);
                
            }
        } else {
            foreach ($this->input->post() as $key => $value) {
                $verror[$key] = form_error($key);
            }
            $this->response([
                'validate'   => FALSE,
                'data'   => '',
                'status' => FALSE,
                'message' => $verror
            ], REST_Controller::HTTP_OK);
        }        
    }
    
}