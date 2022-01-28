<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
require APPPATH . './libraries/REST_Controller.php';

class Wastagelisting extends REST_Controller {
    private $last_query= null;
    function __construct() {
        parent::__construct();
        $this->load->model('Wastagemodel');   
        $this->last_query = false;
    }

    public function save_post(){
        // print_r($_POST);
        $Return = array('status' => false,'validate' => false, 'message' => array());
        $this->form_validation->set_rules('rawmaterial_id', 'Raw Material', 'required|numeric|trim');
        $this->form_validation->set_rules('stock', 'Wastage', 'required|trim');
        $this->form_validation->set_error_delimiters('', '');
        $this->form_validation->set_message('required', 'Enter %s');
        if ($this->form_validation->run()) {
            $main_id = $this->post('main_id');
            $data['restaurant_id']  = $this->post("restaurant_id") ;
            $data['rawmaterial_id'] = $this->input->post("rawmaterial_id");
            $data['stock']          = $this->input->post("stock");
            $data['oldstock']       = $this->input->post('oldstock') ?? 0;
            $data['entry_type']     = $this->input->post('entry_type');
            $data['invoice_date']   = $this->input->post('invoice_date');
            $result                 = $this->Wastagemodel->save($data, $main_id);
            $this->response([
                'validate' => TRUE,
                'status' => $result['status'],
                'message' => $result['msg']
            ], REST_Controller::HTTP_OK);
            
        } else {
            foreach ($this->input->post() as $key => $value) {
                $verror[$key] = form_error($key);
            }
            $verror['t'] = validation_errors();
            $this->response([
                'validate'   => FALSE,
                'status' => FALSE,
                'message' => $verror
            ], REST_Controller::HTTP_OK);
        }
    }

    //load the role add/edit modal
    public function delete_post(){ 
        $this->form_validation->set_rules('main_id', 'Group ID', 'required|numeric|trim');
        $this->form_validation->set_error_delimiters('', '');
        $this->form_validation->set_message('required', 'Enter %s');
        if ($this->form_validation->run()) {
            $id     = $this->post('main_id');
            $delete = $this->Wastagemodel->delete($id);
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
}