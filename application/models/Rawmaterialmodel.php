<?php

class Rawmaterialmodel extends CI_Model
{
    public function __construct()
    {
        $this->table = 'rawmaterial';
    }

    public function save($data,$id)
    {   
        $this->db->trans_begin();
        $where = array('rawmaterial'=> $data['rawmaterial'], 'restaurant_id'=> $data['restaurant_id'], 'is_deleted'=> 0);
        if(is_exists($where, $this->table, $id,'rawmaterial_id') > 0 ){
            $result = array('msg' => 'Item Name already Exist', 'status' => false);
            return $result;
        }
       
        if($id == 0) {
            $data["created_by"]   = $this->session->userdata('user_session')['user_id'];
            $data["created_date"] = date('Y-m-d H:i:s');
            $this->db->insert($this->table,$data);
            $id = $this->db->insert_id();
        }else{
           
            $data["modify_by"]   = $this->session->userdata('user_session')['user_id'];
            $data["modified_date"] = date('Y-m-d H:i:s');
            $this->db->where('rawmaterial_id', $id);
            $this->db->update($this->table, $data);
        }

        if ($this->db->trans_status() === false) {
            $this->db->trans_rollback();
            $result = array('msg' => 'Error While Updating Raw Material Details','status' => false);
        } else {
            $this->db->trans_commit();
            $result = array('msg' => 'Raw Material Details Updated successfully','status' => true);
        }
        return $result;
    }

    function delete($id)
    { 
        $this->db->trans_begin();
        $data = array('is_deleted ' => 1);
        $this->db->where('rawmaterial_id', $id);
        $this->db->update($this->table, $data);
        if ($this->db->trans_status() === false) {
            $this->db->trans_rollback();
            $result = array('msg' => 'Error While Deleting item','status' => false);
        } else {
            $this->db->trans_commit();
            $result = array('msg' => 'item Deleted Successfully','status' => true);
        }
        return $result;
    }
}