<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');
require APPPATH . './libraries/REST_Controller.php';

class Upload extends REST_Controller {
    private $last_query= null;
    private $total;
    function __construct() {
        parent::__construct();
        $this->last_query = false;
        $this->total = 0;
    }

    public function importData($path, $restaurant_id){
		$this->load->library('excel');
		$file = "./uploads/".$path;
		$objPHPExcel 	 = PHPExcel_IOFactory::load($file);
		$cell_collection = $objPHPExcel->getActiveSheet()->getCellCollection();
		foreach ($cell_collection as $cell) {
			$column		= $objPHPExcel->getActiveSheet()->getCell($cell)->getColumn();
			$row        = $objPHPExcel->getActiveSheet()->getCell($cell)->getRow();
			$data_value = $objPHPExcel->getActiveSheet()->getCell($cell)->getValue();
			$arr_data[$row][$column] = $data_value;
		}
		$data['values'] = $arr_data;
		$insdata 		= array();
        $this->total    = count($arr_data) - 1;
		// print_r($arr_data);exit();
        $count=0;
		foreach ($data['values'] as $key => $value){
            // echo 'Key '.$key;
			if($key > 1){
                if($data['values'][$key]['A'] != ''){
                    $category  		= addslashes($data['values'][$key]['A']);
                   $where = array('category'=> $category,'restaurant_id'=> $restaurant_id,'is_deleted'=> 0);
                    if(is_exists($where, 'category', 0,'category_id') > 0 ){
                       $count++;
                    }else{
                        $insdata = array(
                            'category' 	   => $category,
                            'restaurant_id'=> $restaurant_id,
                            'created_date' => date('Y-m-d H:i:s')
                        );
                        $this->db->insert('category', $insdata);
                    }
                    // Check IF categgory already exists
                }
            }
		}
        return $count;
		// return $this->db->insert_batch('category', $insdata);
	}

    public function category_post(){  
        $upload_path 			 = $this->config->item('upload_path');
        is_dir($upload_path);
        $config['upload_path']   =  $upload_path;
	    $config['allowed_types'] = 'xlsx|xls';
	    $config['max_size']      = '1000';
	    $config['overwrite']	 = FALSE;
		$config['encrypt_name']	 = TRUE;
		$config['remove_spaces'] = TRUE;
	    $this->load->library('upload', $config);
	    $this->upload->initialize($config);
	    if(!$this->upload->do_upload('category')){
            $this->response([
                'validate' => TRUE,
                'status' => FALSE,
                'msg' => $this->upload->display_errors()
            ], REST_Controller::HTTP_OK);
	    }else{
	        $data     = array('upload_data' => $this->upload->data());
	  	    $success  = $this->importData($data['upload_data']['file_name'], $this->post('restaurant_id'));
              if($success==0){
                    $msg = 'Category Successfully Added';
                }else{
                    $msg = 'Category Successfully Added<br />Total Records <b>'.$this->total. '</b> Duplicate Records found '.$success;
                    // $msg = 'Total Records Successfully Upload But '.$success. ' Duplicate Records found';
              }
            $this->response([
                'validate'  => TRUE,
                'status'    => TRUE,
                'msg'       => $msg
            ], REST_Controller::HTTP_OK);
		}
    }

    public function items_post(){  
        $upload_path 			 = $this->config->item('upload_path');
        is_dir($upload_path);
        $config['upload_path']   =  $upload_path;
	    $config['allowed_types'] = 'xlsx|xls';
	    $config['max_size']      = '1000';
	    $config['overwrite']	 = FALSE;
		$config['encrypt_name']	 = TRUE;
		$config['remove_spaces'] = TRUE;
	    $this->load->library('upload', $config);
	    $this->upload->initialize($config);
	    if(!$this->upload->do_upload('items')){
            $this->response([
                'validate' => TRUE,
                'status' => FALSE,
                'msg' => $this->upload->display_errors()
            ], REST_Controller::HTTP_OK);
	    }else{
	        $data     = array('upload_data' => $this->upload->data());
	  	    $success  = $this->importItemsData($data['upload_data']['file_name'], $this->post('restaurant_id'));
            if($success==0){
                $msg = 'Items Successfully Added';
            }else{
                $msg = 'Items Successfully Added<br />Total Records <b>'.$this->total. '</b> Duplicate Records found '.$success;
            }
            $this->response([
                'validate'  => TRUE,
                'status'    => TRUE,
                'msg'       => $msg
            ], REST_Controller::HTTP_OK);
		}
    }

    public function importItemsData($path, $restaurant_id){
		$this->load->library('excel');
		$file = "./uploads/".$path;
		$objPHPExcel 	 = PHPExcel_IOFactory::load($file);
		$cell_collection = $objPHPExcel->getActiveSheet()->getCellCollection();
		foreach ($cell_collection as $cell) {
			$column		= $objPHPExcel->getActiveSheet()->getCell($cell)->getColumn();
			$row        = $objPHPExcel->getActiveSheet()->getCell($cell)->getRow();
			$data_value = $objPHPExcel->getActiveSheet()->getCell($cell)->getValue();
			$arr_data[$row][$column] = $data_value;
		}
		$data['values'] = $arr_data;
        // print_r($data);
		$insdata 		= array();
        $this->total    = count($arr_data) - 1;
        $count=0;
		foreach ($data['values'] as $key => $value){
			if($key > 1){
                if($data['values'][$key]['A'] != ''){
                    $category       = addslashes($data['values'][$key]['A']);
                    $cat_id         = $this->getCatid($category, $restaurant_id);
                    $item_name	    = addslashes($data['values'][$key]['B']);
                    $short_code     = addslashes($data['values'][$key]['C']);
                    $price          = addslashes($data['values'][$key]['D']);
                    $favorite       = addslashes($data['values'][$key]['E']);
                    $stock_status   = addslashes($data['values'][$key]['F']);
                    if($favorite == 'Y'){
                        $favorite = 1;
                    }else{
                        $favorite = 0;
                    }
                    if($stock_status == 'Y'){
                        $stock_status = 1;
                    }else{
                        $stock_status = 0;
                    }
                    // $stock_status   = addslashes($data['values'][$key]['F']);
                    $where          = array('item_name'=> $item_name, 'short_code' => $short_code, 'restaurant_id'=> $restaurant_id, 'is_deleted'=> 0);
                    if(is_exists($where, 'items', 0, 'item_id') > 0 ){
                        $count++;
                    }else{
                        $insdata = array(
                            'cat_id' 	    => $cat_id,
                            'item_name'     => $item_name,
                            'short_code'    => $short_code,
                            'price' 	    => $price,
                            'favorite' 	    => $favorite,
                            'stock_status'  => $stock_status,
                            'restaurant_id' => $restaurant_id,
                            'created_by'    => $this->session->userdata('user_session')['user_id'],
                            'created_date'  => date('Y-m-d H:i:s')
                        );
                        $this->db->insert('items', $insdata);
                    }
                }
            }
		}
        return $count;
	}

    private function getCatid($category,$restaurant_id){
        $this->db->select('*');
        $this->db->from('category');
        $this->db->where('category',$category);
        $this->db->where('restaurant_id',$restaurant_id);
        $this->db->where('is_deleted',0);
        $query = $this->db->get();
        $rows = $query->num_rows(); 
        if($rows == 0){
            $data['category'] = $category;
            $data['restaurant_id'] = $restaurant_id;
            $this->db->insert('category',$data);
            return $this->db->insert_id();
        }else{
            $result = $query->row();
            return $result->category_id;
        }
    } 

    private function getUnitid($unit){
        $this->db->select('*');
        $this->db->from('master_unit');
        $this->db->where('units',$unit);
        $query = $this->db->get();
        $rows = $query->num_rows(); 
        if($rows == 0){
            $data['units'] = $unit;
            $this->db->insert('master_unit', $data);
            return $this->db->insert_id();
        }else{
            $result = $query->row();
            return $result->id;
        }
    } 


    public function rawmaterial_post(){  
        $upload_path 			 = $this->config->item('upload_path');
        is_dir($upload_path);
        $config['upload_path']   =  $upload_path;
	    $config['allowed_types'] = 'xlsx|xls';
	    $config['max_size']      = '1000';
	    $config['overwrite']	 = FALSE;
		$config['encrypt_name']	 = TRUE;
		$config['remove_spaces'] = TRUE;
	    $this->load->library('upload', $config);
	    $this->upload->initialize($config);
	    if(!$this->upload->do_upload('rawmaterials')){
            $this->response([
                'validate' => TRUE,
                'status' => FALSE,
                'msg' => $this->upload->display_errors()
            ], REST_Controller::HTTP_OK);
	    }else{
	        $data     = array('upload_data' => $this->upload->data());
	  	    $success  = $this->importRawmaterialData($data['upload_data']['file_name'], $this->post('restaurant_id'));
            if($success==0){
                $msg = 'Items Successfully Added';
            }else{
                $msg = 'Items Successfully Added<br />Total Records <b>'.$this->total. '</b> Duplicate Records found '.$success;
            }
            $this->response([
                'validate'  => TRUE,
                'status'    => TRUE,
                'msg'       => $msg
            ], REST_Controller::HTTP_OK);
		}
    }

    public function importRawmaterialData($path, $restaurant_id){
		$this->load->library('excel');
		$file = "./uploads/".$path;
		$objPHPExcel 	 = PHPExcel_IOFactory::load($file);
		$cell_collection = $objPHPExcel->getActiveSheet()->getCellCollection();
		foreach ($cell_collection as $cell) {
			$column		= $objPHPExcel->getActiveSheet()->getCell($cell)->getColumn();
			$row        = $objPHPExcel->getActiveSheet()->getCell($cell)->getRow();
			$data_value = $objPHPExcel->getActiveSheet()->getCell($cell)->getValue();
			$arr_data[$row][$column] = $data_value;
		}
		$data['values'] = $arr_data;
        // print_r($data);
		$insdata 		= array();
        $this->total    = count($arr_data) - 1;
        $count=0;
		foreach ($data['values'] as $key => $value){
			if($key > 1){
                if($data['values'][$key]['A'] != ''){
                    $rawmaterial    = addslashes($data['values'][$key]['A']);
                    $unit	        = addslashes($data['values'][$key]['B']);
                    $cat_id         = $this->getUnitid($unit);
                    $where          = array('rawmaterial'=> $rawmaterial, 'restaurant_id'=> $restaurant_id, 'is_deleted'=> 0);
                    if(is_exists($where, 'rawmaterial', 0, 'rawmaterial_id') > 0 ){
                        $count++;
                    }else{
                        $insdata = array(
                            'rawmaterial'   => $rawmaterial,
                            'unit'          => $cat_id,
                            'is_deleted'    => 0,
                            'restaurant_id' => $restaurant_id,
                            'created_by'    => $this->session->userdata('user_session')['user_id'],
                            'created_date'  => date('Y-m-d H:i:s')
                        );
                        $this->db->insert('rawmaterial', $insdata);
                    }
                }
            }
		}
        return $count;
	}
}