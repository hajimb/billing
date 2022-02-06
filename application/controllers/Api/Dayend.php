<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
require APPPATH . './libraries/REST_Controller.php';

class Dayend extends REST_Controller {
    private $last_query= null;
    function __construct() {
        parent::__construct();
        $this->load->model('Ordermodel');   
        $this->last_query = false;
    }


    public function generate_post(){
        $verror = array();
        // print_r($_POST);
        // exit;
        $this->form_validation->set_rules('restaurant_id', 'Restaurant ID', 'required|trim');
        $this->form_validation->set_error_delimiters('', '');
        $this->form_validation->set_message('required', 'Enter %s');
        if ($this->form_validation->run()) {
            $data['restaurant_id']  = $this->input->post('restaurant_id');
            $data['dayendtime']     = $this->input->post('dayendtime');
            $result                 = $this->Ordermodel->generateDayEnd($data);
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

}