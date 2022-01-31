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
        $this->last_query   = false;
        $this->load->library('image_lib');
        $this->path         = FCPATH.'assets/images/';
    }
    
    public function save_post(){ 
        // print_r($_FILES);
        // exit;
        // 
        $id = $this->input->post("main_id");
        // echo "ID: ".$id;
        // exit;
        $data   = array('status' => false,'validate' => false, 'message' => array());
       
        $this->form_validation->set_rules('main_id', 'ID', 'required|numeric|trim');
        $this->form_validation->set_rules('company_name', 'Company Name', 'required|trim');
        $this->form_validation->set_rules('restaurant_name', 'Restaurant Name', 'required|trim');
        $this->form_validation->set_rules('contact_no', 'Contact Number', 'required|trim');
        if($this->input->post("email") != '')
            $this->form_validation->set_rules('email', 'Email Id', 'valid_email');
        $this->form_validation->set_rules('restaurant_address', 'Address', 'required|trim');
        $this->form_validation->set_error_delimiters('', '');
        $this->form_validation->set_message('required', 'Enter %s');
        if ($this->form_validation->run()) {
            
            $updatedata['restaurant_name']      = $this->input->post("restaurant_name") ;
            $updatedata['contact_no']           = $this->input->post("contact_no") ;
            $updatedata['restaurant_address']   = $this->input->post("restaurant_address") ;
            $updatedata['company_name']         = $this->input->post("company_name") ;
            $updatedata['email']                = $this->input->post("email") ;
            $updatedata['fssai_no']             = $this->input->post("fssai_no") ;
            $updatedata['gstin_no']             = $this->input->post("gstin_no") ;
            
            // print_r($updatedata);
            // exit;
            if (isset($_FILES['photo_file']) && is_uploaded_file($_FILES['photo_file']['tmp_name'])) {
                $this->load->library('upload');
                $photo_name         = uniqid();
                $photo_name         = slugify(trim($updatedata['restaurant_name'])).'_'.$photo_name;
                $temp_folder        = $this->path;
                $config['upload_path']          = $temp_folder;
                $config['overwrite']            = true; 
                $config['allowed_types']        = 'gif|jpg|png|jpeg';
                try{
                    $this->upload->initialize($config);
                    if ( !$this->upload->do_upload('photo_file'))
                    {
                        $data['message']  = 'Photo File : '.$this->upload->display_errors();
                        $data['validate'] = true;
                        echo json_encode($data);
                        exit;
                    }else{
                        $filedata   = $this->upload->data();
                        $file_name  = $filedata['full_path'];
                        $photo_name = $photo_name.$filedata['file_ext'];
                        copy($file_name, $this->path."logo/".$photo_name);
                        unlink($file_name);
    
                        $updatedata['photo_file']    = $photo_name ;
                        
                        $img_name   = $this->input->post('img_name');
                        if($img_name != ''){
                            $img_name = $this->path."logo/".$img_name;
                            unlink($img_name);
                        }   
                    }
    
                }catch(Exception $e){
                    print_r($e);
                }
            }
            if (isset($_FILES['qr_code']) && is_uploaded_file($_FILES['qr_code']['tmp_name'])) {
                $this->load->library('upload');
                $photo_name         = uniqid();
                $photo_name         = slugify(trim($updatedata['restaurant_name'])).'_'.$photo_name;
                $temp_folder        = $this->path;
                $config['upload_path']          = $temp_folder;
                $config['overwrite']            = true; 
                $config['allowed_types']        = 'gif|jpg|png|jpeg';
                try{
                    $this->upload->initialize($config);
                    if ( !$this->upload->do_upload('qr_code'))
                    {
                        $data['message']  = 'Photo File : '.$this->upload->display_errors();
                        $data['validate'] = true;
                        echo json_encode($data);
                        exit;
                    }else{
                        $filedata   = $this->upload->data();
                        $file_name  = $filedata['full_path'];
                        $photo_name = $photo_name.$filedata['file_ext'];
                        copy($file_name, $this->path."qr/".$photo_name);
                        unlink($file_name);
    
                        $updatedata['qr_code']    = $photo_name ;
                        
                        $qr_name   = $this->input->post('qr_name');
                        if($qr_name != ''){
                            $qr_name = $this->path."qr/".$qr_name;
                            unlink($qr_name);
                        }   
                    }
    
                }catch(Exception $e){
                    print_r($e);
                }
            }
            // print_r($updatedata);
            // exit;
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