<?php

class Customer_model extends CI_Model
{
    private $table;
    public function __construct()
    {
        $this->table = 'customer';
    }

    public function get($last_query) {
        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->where('is_deleted', 0);
        $query = $this->db->get();
        if($last_query){
            print $this->db->last_query();
            exit;
        }
        return $query->result_array();
    }

    public function getcustomer($last_query=false,$id=0)
    {
        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->where('customer_id', $id);
        $query = $this->db->get();
        if($last_query){
            print $this->db->last_query();
            exit;
        }
        return $query->row();
    }
    
    
    function delete($id)
    {
        $data = array('is_deleted ' => 1);
        $this->db->where('customer_id', $id);
        $this->db->update($this->table, $data);
        if ($this->db->trans_status() === false) {
            $this->db->trans_rollback();
            $result = array('msg' => 'Error While Deleting Customer','status' => false);
        } else {
            $this->db->trans_commit();
            $result = array('msg' => 'Customer Deleted Successfully','status' => true);
        }
        return $result;
    }



    public function save($data, $id = 0){
        if($id == 0){
            $data["created_date"] = date('Y-m-d H:i:s');
            $this->db->insert($this->table, $data);
        }else{
            $data["modified_date"] = date('Y-m-d H:i:s');
            $this->db->where('customer_id', $id);
            $this->db->update($this->table, $data);
        }
        $error = $this->db->error();
        if ($error['code'] == 0) {
            $result = array('msg' => 'Customer Successfully Added','status' => true);
        } else {
            $result = array('msg' => 'Error While Creating Customer','status' => false);
        }
        return $result;
    }
}