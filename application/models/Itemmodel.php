<?php

class Itemmodel extends CI_Model
{
    public function __construct()
    {
        $this->table = 'items';
    }

    public function save($data,$id)
    {   
        $this->db->trans_begin();
        $where = array('item_name'=> $data['item_name'], 'restaurant_id'=> $data['restaurant_id'], 'is_deleted'=> 0);
        if(is_exists($where, $this->table, $id,'item_id') > 0 ){
            $result = array('msg' => 'Item Name already Exist', 'status' => false);
            return $result;
        }
        $isExists = array('short_code'=> $data['short_code'], 'restaurant_id'=> $data['restaurant_id'], 'is_deleted'=> 0);
        if(is_exists($isExists, $this->table, $id,'item_id') > 0 ){
            $result = array('msg' => 'Short Code already Exist', 'status' => false);
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
            $this->db->where('item_id', $id);
            $this->db->update($this->table, $data);
        }

        if ($this->db->trans_status() === false) {
            $this->db->trans_rollback();
            $result = array('msg' => 'Error While Updating Item Details','status' => false);
        } else {
            $this->db->trans_commit();
            $result = array('msg' => 'item Details Updated successfully','status' => true);
        }
        return $result;
    }

    function delete($id)
    { 
        $this->db->trans_begin();
        $data = array('is_deleted ' => 1);
        $this->db->where('item_id', $id);
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


    function getitemsdata()
    {
        $id = 0;
        $query = $this->db->get_where($this->table, array('is_deleted' => $id));
        $result = $query->result_array();
        return $result;
    }

    public function getitem($id)
	{
		$query = $this->db->get_where($this->table,array('item_id'=>$id));
		$result['data'] = $query->row_array();		
		return $result;
	}
}