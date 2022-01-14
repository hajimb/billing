<?php

class Restaurantmodel extends CI_Model
{
    public function __construct()
    {
        $this->restaurant_table = 'restaurant';
    }
    
    public function save($data,$id)
    {   
        $this->db->trans_begin();
        $where = array('restaurant_name'=> $data['restaurant_name'],'is_deleted'=> 0);
        if(is_exists($where, $this->restaurant_table, $id,'restaurant_id') > 0 ){
            $result = array('msg' => 'Restaurant Name already Exist','status' => false);
            return $result;
        }
        if($id == 0) {
            $data["created_date"] = date('Y-m-d H:i:s');
            $this->db->insert($this->restaurant_table,$data);
        }else{
            $data["modified_date"] = date('Y-m-d H:i:s');
            $this->db->where('restaurant_id', $id);
            $this->db->update($this->restaurant_table, $data);
        }

        if ($this->db->trans_status() === false) {
            $this->db->trans_rollback();
            $result = array('msg' => 'Error While Updating Restaurant Detail','status' => false);
        } else {
            $this->db->trans_commit();
            $result = array('msg' => 'Restaurant Detail Updated successfully','status' => true);
        }
        return $result;
    }

    function delete($id)
    {
        $this->db->trans_begin();
        $data = array('is_deleted ' => 1);
        $this->db->where('restaurant_id', $id);
        $this->db->update($this->restaurant_table, $data);
        if ($this->db->trans_status() === false) {
            $this->db->trans_rollback();
            $result = array('msg' => 'Error While Deleting Restaurant','status' => false);
        } else {
            $this->db->trans_commit();
            $result = array('msg' => 'Restaurant Deleted Successfully','status' => true);
        }
        return $result;
    }


}