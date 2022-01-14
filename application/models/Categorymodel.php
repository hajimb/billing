<?php

class Categorymodel extends CI_Model
{
    public function __construct()
    {
        $this->table = 'category';
    }

    public function save($data,$id)
    {   
        $this->db->trans_begin();
        $where = array('category'=> $data['category'],'restaurant_id'=> $data['restaurant_id'],'is_deleted'=> 0);
        if(is_exists($where, $this->table, $id,'category_id') > 0 ){
            $result = array('msg' => 'Category Name already Exist','status' => false);
            return $result;
        }
        if($id == 0) {
            $data["created_date"] = date('Y-m-d H:i:s');
            $this->db->insert($this->table,$data);
            $id = $this->db->insert_id();

        }else{
            $data["modified_date"] = date('Y-m-d H:i:s');
            $this->db->where('category_id', $id);
            $this->db->update($this->table, $data);
        }

        if ($this->db->trans_status() === false) {
            $this->db->trans_rollback();
            $result = array('msg' => 'Error While Updating Category Details','status' => false);
        } else {
            $this->db->trans_commit();
            $result = array('msg' => 'Category Details Updated successfully','status' => true);
        }
        return $result;
    }

    function delete($id)
    { 
        $this->db->trans_begin();
        $data = array('is_deleted ' => 1);
        $this->db->where('category_id', $id);
        $this->db->update($this->table, $data);
        if ($this->db->trans_status() === false) {
            $this->db->trans_rollback();
            $result = array('msg' => 'Error While Deleting Category','status' => false);
        } else {
            $this->db->trans_commit();
            $result = array('msg' => 'Category Deleted Successfully','status' => true);
        }
        return $result;
    }


    function getCategorydata()
    {
        $id = 0;
        $query = $this->db->get_where($this->table, array('is_deleted' => $id));
        $result = $query->result_array();
        return $result;
    }
}