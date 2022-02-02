<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
require APPPATH . './libraries/REST_Controller.php';

class Inventory extends REST_Controller {
    private $last_query= null;
    function __construct() {
        parent::__construct();
        $this->load->model('Rawmaterialmodel');   
        $this->load->model('Stockmodel');   
        $this->load->model('Wastagemodel');   
        $this->last_query = false;
    }

    public function rawmaterial_save_post(){
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

    //load the role add/edit modal
    public function rawmaterial_delete_post(){ 
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

    public function purchase_save_post(){
        $Return = array('status' => false,'validate' => false, 'message' => array());
        $this->form_validation->set_rules('rawmaterial_id', 'Select Raw Material', 'required|numeric|trim');
        $this->form_validation->set_rules('stock', 'Stock', 'required|trim');
        $this->form_validation->set_rules('supplier_name', 'Supplier Name', 'required|trim');
        $this->form_validation->set_rules('invoice_no', 'Invoice Number', 'required|trim');
        $this->form_validation->set_rules('invoice_date', 'Invoice Date', 'required|trim');
        $this->form_validation->set_rules('total_amount', 'Total Amount', 'required|trim');
        $this->form_validation->set_rules('paid_amount', 'Paid Amount', 'required|trim');
        $this->form_validation->set_rules('payment_type', 'Payment Type', 'required|numeric|trim');
        $this->form_validation->set_error_delimiters('', '');
        $this->form_validation->set_message('required', 'Enter %s');
        if ($this->form_validation->run()) {
            $main_id = $this->post('main_id');
            $data['rawmaterial_id'] = trim($this->input->post('rawmaterial_id'));
            $data['stock']          = trim($this->input->post('stock'));
            $data['invoice_date']   = trim($this->input->post('invoice_date'));
            $data['supplier_name']  = $this->input->post('supplier_name');
            $data['invoice_no']     = $this->input->post('invoice_no');
            $data['total_amount']   = trim($this->input->post('total_amount'));
            $data['paid_amount']    = trim($this->input->post('paid_amount'));
            $data['payment_type']   = trim($this->input->post('payment_type'));
            if($data['total_amount'] == $data['paid_amount']){
                $data['payment_type'] = 1;
            }else if($data['total_amount'] < $data['paid_amount']){
                $verror['paid_amount'] = 'Paid Amount cannot be more then '.$data['total_amount'];
                $this->response([
                    'validate'   => FALSE,
                    'status' => FALSE,
                    'message' => $verror
                ], REST_Controller::HTTP_OK);
            }else{
                $data['payment_type'] = 2;
            }
            $data['restaurant_id']  = trim($this->input->post('restaurant_id'));
            $data['entry_type']     = trim($this->input->post('entry_type'));
            $data['oldstock']       = $this->input->post('oldstock') ?? 0;
            $ip                     = $this->input->ip_address();
            $result                 = $this->Stockmodel->save($data, $main_id, $ip);
            $this->response([
                'validate' => TRUE,
                'status' => $result['status'],
                'message' => $result['msg']
            ], REST_Controller::HTTP_OK);
            
        } else {
            foreach ($this->input->post() as $key => $value) {
                $verror[$key] = form_error($key);
            }
            $verror['y'] = validation_errors();
            $this->response([
                'validate'   => FALSE,
                'status' => FALSE,
                'message' => $verror
            ], REST_Controller::HTTP_OK);
        }
    }

    //load the role add/edit modal
    public function purchase_delete_post(){ 
        $this->form_validation->set_rules('main_id', 'Group ID', 'required|numeric|trim');
        $this->form_validation->set_error_delimiters('', '');
        $this->form_validation->set_message('required', 'Enter %s');
        if ($this->form_validation->run()) {
            $id     = $this->post('main_id');
            $delete = $this->Stockmodel->delete($id);
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

    public function wastage_used_save_post(){
        // print_r($_POST);
        
        $Return = array('status' => false,'validate' => false, 'message' => array());
        // $this->form_validation->set_rules('rawmaterial_id', 'Raw Material', 'required|numeric|trim');
        // $this->form_validation->set_rules('stock', 'Quantity', 'required|trim');
        // $this->form_validation->set_rules('invoice_date', 'Date', 'required|trim');
        // $this->form_validation->set_error_delimiters('', '');
        // $this->form_validation->set_message('required', 'Enter %s');
        // if ($this->form_validation->run()) {
            $main_id = $this->post('main_id');
            $data['restaurant_id']  = $this->post("restaurant_id") ;
            // $data['rawmaterial_id'] = $this->input->post("rawmaterial_id");
            // $data['stock']          = $this->input->post("stock");
            // $data['oldstock']       = $this->input->post('oldstock') ?? 0;
            $data['entry_type']     = $this->input->post('entry_type');
            $data['invoice_date']   = $this->input->post('invoice_date');
            $result                 = $this->Wastagemodel->save($_POST, $main_id);
            $this->response([
                'validate' => TRUE,
                'status' => $result['status'],
                'message' => $result['msg']
            ], REST_Controller::HTTP_OK);
            
       /* } else {
            foreach ($this->input->post() as $key => $value) {
                $verror[$key] = form_error($key);
            }
            $verror['t'] = validation_errors();
            $this->response([
                'validate'   => FALSE,
                'status' => FALSE,
                'message' => $verror
            ], REST_Controller::HTTP_OK);
        }*/
    }

    public function getdetail_post() {
        $id = $this->post('id');
        $result = $this->Stockmodel->getDuepayment($id);
        $total = $this->Stockmodel->gettotal($id);

        if(!empty($result)){
            $data['status'] = TRUE;
            $data['amount'] = $result->amount;
            $data['total']  = $total->total_amount;
            $this->response($data, REST_Controller::HTTP_OK);
        }else{
            //set the response and exit
            $this->response([
                'status' => FALSE,
                'amount' => 0,
                'total' => 0,
                'message' => 'No Record Found.'
            ], REST_Controller::HTTP_OK);
        }
    }

    public function paydueamount_post(){
        // print_r($_POST);exit;
        $Return = array('status' => false,'validate' => false, 'message' => array());
        $this->form_validation->set_rules('stock_id', 'Stock Id Missing', 'required|numeric|trim');
        $this->form_validation->set_rules('restaurant_id', 'Restaurant Id Missing', 'required|numeric|trim');
        $this->form_validation->set_rules('paid_amount', 'Paid Amount', 'required|trim');
        $this->form_validation->set_error_delimiters('', '');
        $this->form_validation->set_message('required', 'Enter %s');
        if ($this->form_validation->run()) {
           
            $main_id = $this->post('stock_id');
            $data['paid_amount']    = $this->post('paid_amount');
            $data['restaurant_id']  = $this->post('restaurant_id');
            $ramount                = $this->post('ramount');
            $ip                     = $this->input->ip_address();
            if($ramount == $data['paid_amount']){
                $data['payment_type'] = 1;
            }
            $result                 = $this->Stockmodel->paydueamount($data, $main_id, $ip);
            $this->response([
                'validate' => TRUE,
                'status' => $result['status'],
                'message' => $result['msg']
            ], REST_Controller::HTTP_OK);
            
        } else {
            foreach ($this->input->post() as $key => $value) {
                $verror[$key] = form_error($key);
            }
            $verror['y'] = validation_errors();
            $this->response([
                'validate'   => FALSE,
                'status' => FALSE,
                'message' => $verror
            ], REST_Controller::HTTP_OK);
        }
    }
}