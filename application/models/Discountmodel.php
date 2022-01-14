<?php

class Discountmodel extends CI_Model
{
    public function __construct()
    {
        $this->table = 'discount';
    }

    public function save($data,$id)
    {   
        $this->db->trans_begin();
        $where = array('discount_name'=> $data['discount_name'],'restaurant_id'=> $data['restaurant_id'],'is_deleted'=> 0);
        if(is_exists($where, $this->table, $id,'discount_id') > 0 ){
            $result = array('msg' => 'Discount Name already Exist','status' => false);
            return $result;
        }
        if($id == 0) {
            $data["created_date"] = date('Y-m-d H:i:s');
            $this->db->insert($this->table,$data);
            $id = $this->db->insert_id();

        }else{
            $data["modified_date"] = date('Y-m-d H:i:s');
            $this->db->where('discount_id', $id);
            $this->db->update($this->table, $data);
        }

        if ($this->db->trans_status() === false) {
            $this->db->trans_rollback();
            $result = array('msg' => 'Error While Updating Discount Details','status' => false);
        } else {
            $this->db->trans_commit();
            $result = array('msg' => 'Discount Details Updated successfully','status' => true);
        }
        return $result;
    }

    function delete($id)
    { 
        $this->db->trans_begin();
        $data = array('is_deleted ' => 1);
        $this->db->where('discount_id', $id);
        $this->db->update($this->table, $data);
        if ($this->db->trans_status() === false) {
            $this->db->trans_rollback();
            $result = array('msg' => 'Error While Deleting Discount','status' => false);
        } else {
            $this->db->trans_commit();
            $result = array('msg' => 'Discount Deleted Successfully','status' => true);
        }
        return $result;
    }
}