<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
require APPPATH . './libraries/REST_Controller.php';

class Rawmaterial extends REST_Controller {
    private $last_query= null;
    function __construct() {
        parent::__construct();
        $this->load->model('Rawmaterialmodel');   
        $this->last_query = false;
    }

    public function save_post(){
        $this->form_validation->set_rules('rawmaterial', 'Raw Material', 'required|trim');
        $this->form_validation->set_rules('unit', 'Unit', 'required|numeric|trim');
        $this->form_validation->set_error_delimiters('', '');
        $this->form_validation->set_message('required', 'Enter %s');
        if ($this->form_validation->run()) {
            $main_id = $this->post('main_id');
            $data['restaurant_id']  = $this->post("restaurant_id") ;
            $data['rawmaterial']    = $this->input->post("rawmaterial");
            $data['unit']           = $this->input->post("unit");
            $result                 = $this->Rawmaterialmodel->save($data, $main_id);
            $this->response([
                'validate' => TRUE,
                'status' => $result['status'],
                'message' => $result['msg']
            ], REST_Controller::HTTP_OK);
            
        } else {
            foreach ($this->input->post() as $key => $value) {
                $verror[$key] = form_error($key);
            }
            $verror['extra'] = validation_errors();
            $this->response([
                'validate'   => FALSE,
                'status' => FALSE,
                'message' => $verror
            ], REST_Controller::HTTP_OK);
        }
    }

    public function saveused_post(){
        $this->form_validation->set_rules('rawmaterial_id', 'Raw Material', 'required|trim');
        $this->form_validation->set_rules('quantity', 'Quantity', 'required|trim');
        $this->form_validation->set_error_delimiters('', '');
        $this->form_validation->set_message('required', 'Enter %s');
        if ($this->form_validation->run()) {
            $main_id = $this->post('main_id');
            $data['restaurant_id']  = $this->post("restaurant_id") ;
            $data['rawmaterial']    = $this->input->post("rawmaterial");
            $data['quantity']       = $this->input->post("quantity");
            $data['oldquantity']    = $this->input->post("oldquantity");
            $result                 = $this->Rawmaterialmodel->saveused($data, $main_id);
            $this->response([
                'validate' => TRUE,
                'status' => $result['status'],
                'message' => $result['msg']
            ], REST_Controller::HTTP_OK);
            
        } else {
            foreach ($this->input->post() as $key => $value) {
                $verror[$key] = form_error($key);
            }
            $verror['extra'] = validation_errors();
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
            $delete = $this->Rawmaterialmodel->delete($id);
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