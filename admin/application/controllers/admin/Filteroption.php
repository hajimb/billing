<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Filteroption extends CI_Controller {
	public function __construct(){
        parent::__construct();

		$session_data = $this->session->userdata('user_session');
        if (!isset($session_data) || empty($session_data)) {
            redirect('admin/login');
        }

        $this->load->model('admin/Filteroptionmodel');
        
    }

	public function index() 
    {
        $this->data['title'] = 'Filter Option'; 
        $this->data['filterdata'] = $this->Filteroptionmodel->getfilterdata();
		$this->load->view('admin/common/header',$this->data);
		$this->load->view('admin/filteroption/filteroption');
		$this->load->view('admin/common/footer');
	}

    public function updatestatus()
    {
        if(isset($_GET['id']) && !empty($_GET['id'])) 
        {
            $data = array();
            $id = $_GET['id'];
            $status_val = $_GET['status'];
            if($status_val == 1)
            {
                $insertlog = array(
                    'log_msg' => '#'.$id.' - filter option has been updated Active to Inctive by admin.',
                    'createddate' => date('Y-m-d H:i:s'),
                    'controller' => 'Filteroption'
                );
                $this->db->query("UPDATE `filteroption` SET `status`= 0 WHERE id = '".$id."' ");

                $data['update'] = array(
                                'msg' => 'Successfully status Updated.',
                                'status' => 0
                            );
            }
            else
            {
                $insertlog = array(
                    'log_msg' => '#'.$id.' - filter option has been updated Inactive to Active by admin.',
                    'createddate' => date('Y-m-d H:i:s'),
                    'controller' => 'Filteroption'
                );
                $this->db->query("UPDATE `filteroption` SET `status`= 1 WHERE id = '".$id."' ");
                $data['update'] = array(
                    'msg' => 'Successfully status Updated.',
                    'status' => 1
                );
            } 

            $this->db->insert('log',$insertlog);
            echo json_encode($data);
        }
    }
}
