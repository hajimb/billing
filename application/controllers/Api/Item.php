<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
require APPPATH . './libraries/REST_Controller.php';

class Item extends REST_Controller {
    private $last_query= null;
    function __construct() {
        parent::__construct();
        $this->load->model('Itemmodel');   
        $this->last_query = false;
    }

    public function save_post(){
        $Return = array('status' => false,'validate' => false, 'message' => array());
        $this->form_validation->set_rules('cat_id', 'Select Category', 'required|numeric|trim');
        $this->form_validation->set_rules('item_name', 'Item Name', 'required|trim');
        $this->form_validation->set_rules('short_code', 'Short Code', 'required|trim');
        $this->form_validation->set_rules('price', 'Price', 'required|trim');
        $this->form_validation->set_rules('stock_status', 'Stock Status', 'required|numeric|trim');
        $this->form_validation->set_error_delimiters('', '');
        $this->form_validation->set_message('required', 'Enter %s');
        if ($this->form_validation->run()) {
            $main_id                    = $this->post('main_id');
            $data['restaurant_id']      = $this->post("restaurant_id") ;
            $data['cat_id']             = $this->post("cat_id") ;
            $data['item_name']          = $this->post("item_name") ;
            $data['short_code']         = $this->post("short_code") ;
            $data['price']              = $this->input->post("price");
            $data['stock_status']       = $this->input->post("stock_status");
            $data['favorite']           = $this->input->post("favorite") ?? 0;
            if($main_id > 0){
                $postData = $_POST['rawmaterial'];
            }else{
                $postData = array();
            }
            $result                     = $this->Itemmodel->save($data, $postData, $main_id);
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
            $delete = $this->Itemmodel->delete($id);
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

    public function take_post(){
        $rawmaterial    = $this->post('rawmaterial');
        $stock          = $this->post('stock');
        $unit           = $this->post('unit');
        $html  = '<style>
                    @media print {
                        @page {
                            size: 80mm auto;
                        }
                    }
                    body.receipt { 
                        width: 80mm ;
                        height:100%;
                        margin: 5mm;
                    }
                    body.receipt .sheet { width: 80mm; height:100%}  
                    @media print { body.receipt { width: 80mm; height:100% } }
                </style>
                <body class="receipt">
                <section class="sheet">';
        $html .= '<table style="width: 100%; border-collapse:collapse; font-family:verdana" border=1 cellpadding="5" cellspacing="5">
                  <thead>
                    <tr>
                      <th align="left">Sr No</th>
                      <th align="left">Raw Material</th>
                      <th align="left">Stock</th>
                      <th align="left">Unit</th>
                    </tr>
                  </thead>
                  <tbody>';
            $i=1;
            foreach($rawmaterial as $key => $val){
                if($stock[$key]!='0.00' && $stock[$key] != ''){
                    $html .= '<tr><td align="left">'.$i.'</td><td align="left">'.$val.'</td><td align="left">'.$stock[$key].'</td><td align="left">'.$unit[$key].'</td></tr>';
                    $i++;
                }
            }
            $html .='</tbody></table></section></body>';
            echo $html;
    }
    
}