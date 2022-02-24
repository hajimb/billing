<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
require APPPATH . './libraries/REST_Controller.php';

class Order extends REST_Controller {
    private $last_query= null;
    function __construct() {
        parent::__construct();
        $this->load->model('Ordermodel');   
        $this->last_query = false;
    }


    public function search_post(){
        $verror = array();
        // print_r($_POST);
        // exit;
        $this->form_validation->set_rules('search_text', 'Search Text', 'required|trim');
        $this->form_validation->set_error_delimiters('', '');
        $this->form_validation->set_message('required', 'Enter %s');
        if ($this->form_validation->run()) {
            $search     = $this->input->post('search_text');
            $result             = $this->Ordermodel->search($search);
            $this->response([
                'validate'  => TRUE,
                'status'    => $result['status'],
                'data'      => $result['data'],
                'message'   => $result['msg']
            ], REST_Controller::HTTP_OK);
        } else {
            foreach ($this->input->post() as $key => $value) {
                $verror[$key] = form_error($key);
            }
            $this->response([
                'validate'  => FALSE,
                'status'    => FALSE,
                'message'   => $verror
            ], REST_Controller::HTTP_OK);
        }
    }

    public function add_post(){
        // print_r($_POST);
        // exit;
        $verror = array();
        $this->form_validation->set_rules('table_id', 'Table', 'required|trim');
        $this->form_validation->set_error_delimiters('', '');
        $this->form_validation->set_message('required', 'Enter %s');
        if ($this->form_validation->run()) {
            $result = $this->Ordermodel->addOrderRequest($_POST);
            $this->response([
                'validate' => TRUE,
                'status' => $result['status'],
                'data' => $result['data'],
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

    public function update_bill_post(){
        // print_r($_POST);
        // exit;
        $verror = array();
        $this->form_validation->set_rules('table_id', 'Table', 'required|trim');
        $this->form_validation->set_rules('ord_id', 'Order', 'required|trim');
        $this->form_validation->set_error_delimiters('', '');
        $this->form_validation->set_message('required', 'Enter %s');
        if ($this->form_validation->run()) {
            $result = $this->Ordermodel->UpdateBill($_POST);
            $this->response([
                'validate' => TRUE,
                'status' => $result['status'],
                'data' => $result['data'],
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
    public function get_bill_post(){
        // print_r($_POST);
        // exit;
        $verror = array();
        $this->form_validation->set_rules('bill_id', 'Bill ID', 'required|trim');
        $this->form_validation->set_error_delimiters('', '');
        $this->form_validation->set_message('required', 'Enter %s');
        if ($this->form_validation->run()) {
            $result = $this->Ordermodel->GetBill($_POST);
            $html = '';
            if($result['status'] == true){
                $html       = $this->load->view('bill',$result['data'],true);
            }
            $this->response([
                'validate'  => TRUE,
                'status'    => $result['status'],
                'data'      => $html,
                'message'   => $result['msg']
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
    public function gettabledetails_post(){
        $verror = array();
        $this->form_validation->set_rules('restaurant_id', 'Restautant ID', 'required|trim');
        $this->form_validation->set_error_delimiters('', '');
        $this->form_validation->set_message('required', 'Enter %s');
        if ($this->form_validation->run()) {
            $result = getTableData($this->input->post('restaurant_id'),0);
            $this->response([
                'validate'  => TRUE,
                'status'    => true,
                'data'   => $result
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

    public function getkotdetails_post(){
        $verror = array();
        $this->form_validation->set_rules('restaurant_id', 'Restautant ID', 'required|trim');
        $this->form_validation->set_error_delimiters('', '');
        $this->form_validation->set_message('required', 'Enter %s');
        if ($this->form_validation->run()) {
            $result = GetKOTItems($this->input->post('restaurant_id'),0);
            $this->response([
                'validate'  => TRUE,
                'status'    => true,
                'data'   => $result
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

}