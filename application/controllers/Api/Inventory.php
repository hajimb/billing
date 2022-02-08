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
        // echo "<pre>";
        // print_r($_POST);exit;
        $Return = array('status' => false,'validate' => false, 'message' => array());
        // $this->form_validation->set_rules('rawmaterial_id', 'Select Raw Material', 'required|numeric|trim');
        // $this->form_validation->set_rules('stock', 'Stock', 'required|trim');
        $this->form_validation->set_rules('supplier_name', 'Supplier Name', 'required|trim');
        $this->form_validation->set_rules('invoice_no', 'Invoice Number', 'required|trim');
        $this->form_validation->set_rules('invoice_date', 'Invoice Date', 'required|trim');
        $this->form_validation->set_rules('total_amount', 'Total Amount', 'required|trim');
        $this->form_validation->set_rules('paid_amount', 'Paid Amount', 'required|trim');
        $this->form_validation->set_rules('payment_type', 'Payment Type', 'required|numeric|trim');
        $main_id = $this->post('main_id');
        if($main_id ==0){
            $purchase = $this->post('purchase');
            foreach($purchase as $key => $value){
                $this->form_validation->set_rules("purchase[$key][rawmaterial_id]", 'Raw Material', 'required|numeric|trim');
                $this->form_validation->set_rules("purchase[$key][stock]", 'Stock', 'required|trim');
            }
        }
        
        $this->form_validation->set_error_delimiters('', '');
        $this->form_validation->set_message('required', 'Enter %s');
        if ($this->form_validation->run()) {
            if($this->input->post('total_amount') < $this->input->post('paid_amount')){
                $verror['paid_amount'] = 'Paid Amount cannot be more then '.$this->input->post('total_amount');
                $this->response([
                    'validate'   => FALSE,
                    'status' => FALSE,
                    'message' => $verror
                ], REST_Controller::HTTP_OK);
            }
/*            if($data['total_amount'] == $data['paid_amount']){
                $data['payment_type'] = 1;
            }else else{
                $data['payment_type'] = 2;
            }
*/
            $ip                     = $this->input->ip_address();
            $result                 = $this->Stockmodel->save($_POST, $main_id, $ip);
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
        $Return = array('status' => false,'validate' => false, 'message' => array());
        $this->form_validation->set_rules('entry_type', 'Select Type', 'required|trim');
        $this->form_validation->set_rules('invoice_date', 'Date', 'required|trim');
        $main_id = $this->post('main_id');
        if($main_id == 0){
            $purchase = $this->post('test');
            foreach($purchase as $key => $value){
                $this->form_validation->set_rules("test[$key][rawmaterial_id]", 'Raw Material', 'required|numeric|trim');
                $this->form_validation->set_rules("test[$key][stock]", 'Stock', 'required|trim');
            }
        }
        $this->form_validation->set_error_delimiters('', '');
        $this->form_validation->set_message('required', 'Enter %s');
        if ($this->form_validation->run()) {
            
            $result                 = $this->Wastagemodel->save($_POST, $main_id);
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

    public function getdetail_post() {
        $id = $this->post('id');
        $result = $this->Stockmodel->getDuepayment($id);
        // $total = $this->Stockmodel->gettotal($id);
        if(!empty($result)){
            $data['status'] = TRUE;
            $data['amount'] = $result->amount;
            $data['total']  = $result->total_amount;
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
        $this->form_validation->set_rules('stock_master_id', 'Stock Id Missing', 'required|numeric|trim');
        $this->form_validation->set_rules('restaurant_id', 'Restaurant Id Missing', 'required|numeric|trim');
        $this->form_validation->set_rules('paid_amount', 'Paid Amount', 'required|trim');
        $this->form_validation->set_error_delimiters('', '');
        $this->form_validation->set_message('required', 'Enter %s');
        if ($this->form_validation->run()) {
            $main_id = $this->post('stock_master_id');
            $data['paid_amount']    = $this->post('paid_amount');
            $data['restaurant_id']  = $this->post('restaurant_id');
            $ramount                = $this->post('ramount');
            $ip                     = $this->input->ip_address();
            if($ramount == $data['paid_amount']){
                $data['payment_type'] = 1;
            }else{
                $data['payment_type'] = 2;
            }
            $result = $this->Stockmodel->paydueamount($data, $main_id, $ip);
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