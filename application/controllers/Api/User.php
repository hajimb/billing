<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
ini_set("memory_limit","512M");
require APPPATH . './libraries/REST_Controller.php';

class User extends REST_Controller {
    private $last_query = null;

    function __construct() {
        parent::__construct();
        $this->load->model('Usermodel');
        $this->last_query = false;
    }
    
    public function save_post(){ 
        // print_r($_POST);
        $restaurant_id    = 0 ;
        $id = $this->post("main_id");
        $groups = $this->post("groups");
        $data   = array('status' => false,'validate' => false, 'message' => array());
        $this->form_validation->set_rules('main_id', 'User ID', 'required|numeric|trim');
        $this->form_validation->set_rules('username', 'Username', 'required|callback_whitespace|trim');
        $this->form_validation->set_rules('firstname', 'First Name', 'required|trim');
        $this->form_validation->set_rules('lastname', 'Last Name', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|trim');
        if($id == 0){
            $this->form_validation->set_rules('password', 'Password', 'required|trim');
            // $this->form_validation->set_rules('repassword', 'Invalid Confirm Password', 'trim|required|matches[password]');
        }
        $this->form_validation->set_rules('status', 'Status', 'required|trim');
        $this->form_validation->set_rules('groups', 'Groups', 'required|trim');
        if($groups != 1){
            $this->form_validation->set_rules('restaurant_id', 'Rrestaurant', 'required|trim');
            $restaurant_id    = $this->post("restaurant_id") ;
        }
        $this->form_validation->set_error_delimiters('', '');
        $this->form_validation->set_message('required', 'Enter %s');
        if ($this->form_validation->run()) {
            $updatedata['restaurant_id']    = $restaurant_id ;
            $updatedata['username']         = $this->post("username") ;
            $updatedata['firstname']        = $this->post("firstname") ;
            $updatedata['lastname']         = $this->post("lastname") ;
            $updatedata['email']            = $this->post("email") ;
            $updatedata['status']           = $this->post("status") ;
            $updatedata['groups']           = $this->post("groups") ;
            if($this->post("password") != ""){
                $updatedata['password']     = md5($this->post("password")) ;
                $updatedata['r_password']   = $this->post("password") ;
            }
            $datareq = $this->Usermodel->save($updatedata,$id);
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

    public function whitespace($username){
        if ( preg_match('/\s/',$username) ){
            $this->form_validation->set_message('whitespace', 'Username Not contain space');
            return FALSE;
        }else{
            return TRUE;
        }
    }

     public function delete_post(){ 
        $this->form_validation->set_rules('main_id', 'userId', 'required|numeric|trim');
        $this->form_validation->set_error_delimiters('', '');
        $this->form_validation->set_message('required', 'Enter %s');
        if ($this->form_validation->run()) {
            $id     = $this->post('main_id');
            $delete = $this->Usermodel->delete($id);
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