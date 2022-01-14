<?php

class Taxmodel extends CI_Model
{
    public function __construct()
    {
        $this->table = 'tax';
    }

    public function save($data,$id)
    {   
        $this->db->trans_begin();
        $where = array('tax_name'=> $data['tax_name'],'restaurant_id'=> $data['restaurant_id'],'is_deleted'=> 0);
        if(is_exists($where, $this->table, $id,'tax_id') > 0 ){
            $result = array('msg' => 'Tax Name already Exist','status' => false);
            return $result;
        }
        if($id == 0) {
            $data["created_date"] = date('Y-m-d H:i:s');
            $this->db->insert($this->table,$data);
            $id = $this->db->insert_id();

        }else{
            $data["modified_date"] = date('Y-m-d H:i:s');
            $this->db->where('tax_id', $id);
            $this->db->update($this->table, $data);
        }
        if($data['is_default']==1){
            $update_data['is_default'] = 0;
            $this->db->where('restaurant_id',$data['restaurant_id']);
            $this->db->where('tax_id != '.$id);
            $this->db->update($this->table,$update_data);
        }
        if ($this->db->trans_status() === false) {
            $this->db->trans_rollback();
            $result = array('msg' => 'Error While Updating Tax Details','status' => false);
        } else {
            $this->db->trans_commit();
            $result = array('msg' => 'Tax Details Updated successfully','status' => true);
        }
        return $result;
    }

    function delete($id)
    { 
        $this->db->trans_begin();
        $data = array('is_deleted ' => 1);
        $this->db->where('tax_id', $id);
        $this->db->update($this->table, $data);
        if ($this->db->trans_status() === false) {
            $this->db->trans_rollback();
            $result = array('msg' => 'Error While Deleting Tax','status' => false);
        } else {
            $this->db->trans_commit();
            $result = array('msg' => 'Tax Deleted Successfully','status' => true);
        }
        return $result;
    }

}