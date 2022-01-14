<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
ini_set("memory_limit","512M");
require APPPATH . './libraries/REST_Controller.php';

class Restaurant extends REST_Controller {
    private $last_query = null;

    function __construct() {
        parent::__construct();
        $this->load->model('Restaurantmodel');
        $this->last_query = false;
    }
    
    public function save_post(){ 
        // print_r($_POST);
        $id = $this->post("main_id");
        $data   = array('status' => false,'validate' => false, 'message' => array());
       
        $this->form_validation->set_rules('main_id', 'ID', 'required|numeric|trim');
        $this->form_validation->set_rules('restaurant_name', 'Name', 'required|trim');
        $this->form_validation->set_rules('contact_no', 'Contact Number', 'required|trim');
        $this->form_validation->set_rules('restaurant_address', 'Address', 'required|trim');
        $this->form_validation->set_error_delimiters('', '');
        $this->form_validation->set_message('required', 'Enter %s');
        if ($this->form_validation->run()) {

            $updatedata['restaurant_name']         = $this->post("restaurant_name") ;
            $updatedata['contact_no']        = $this->post("contact_no") ;
            $updatedata['restaurant_address']         = $this->post("restaurant_address") ;
            $datareq = $this->Restaurantmodel->save($updatedata,$id);
            $this->response([
                'status'    => $datareq['status'],
                'validate'  => TRUE,
                'message'   => $datareq['msg']
            ], REST_Controller::HTTP_OK);
        }else{
            foreach ($this->input->post() as $key => $value) {
                $verror[$key] = form_error($key);
            }
            $this->response([
                'status'    => FALSE,
                'validate'  => FALSE,
                'message'   => $verror,
            ], REST_Controller::HTTP_OK);
        }
    }

     public function delete_post(){ 
        $this->form_validation->set_rules('main_id', 'userId', 'required|numeric|trim');
        $this->form_validation->set_error_delimiters('', '');
        $this->form_validation->set_message('required', 'Enter %s');
        if ($this->form_validation->run()) {
            $id     = $this->post('main_id');
            $delete = $this->Restaurantmodel->delete($id);
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

     public function view_post(){ 
        $this->form_validation->set_rules('main_id', 'userId', 'required|numeric|trim');
        $this->form_validation->set_error_delimiters('', '');
        $this->form_validation->set_message('required', 'Enter %s');
        if ($this->form_validation->run()) {
            $id     = $this->post('main_id');
            $result = getData('restaurant', 0, "restaurant_id",$id);
            $this->response([
                'status'    => true,
                'validate'  => TRUE,
                'message'   => $result
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
}