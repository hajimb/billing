<?php

class Itemmodel extends CI_Model
{
    public function __construct()
    {
        $this->table = 'items';
        $this->created_by   = $this->session->userdata('user_session')['user_id'];
        $this->created_date = date('Y-m-d H:i:s');
    }

    public function save($data, $postData, $id)
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
            $data["created_by"]   = $this->created_by;
            $data["created_date"] = date('Y-m-d H:i:s');
            $this->db->insert($this->table,$data);
            $id = $this->db->insert_id();
        }else{
            $data["modify_by"]     = $this->created_by;
            $data["modified_date"] = date('Y-m-d H:i:s');
            $this->db->where('item_id', $id);
            $this->db->update($this->table, $data);

            $insData = array();
            foreach($postData as $key => $val){
                $insData[] = array(
                    'restaurant_id'  => $data['restaurant_id'],
                    'rawmaterial_id' => $postData[$key]['rawmaterial_id'],
                    "item_id"        => $id,
                    'quantity'       => $postData[$key]['quantity'],
                    "created_by"     => $this->created_by,
                    "modified_by"    => $this->created_by,
                    "created_date"   => $this->created_date,
                    "modified_date"  => $this->created_date,
                    "ip"             => $this->input->ip_address(),
                );
            }
            $this->db->insert_batch('item_rawmaterial', $insData);

            // 1st get Old Value
            $old_value = $this->getitemRaw($data['restaurant_id'], $id);
            $count     = count($old_value);
            // print $this->db->last_query();exit();
            if($count > 0){
                $this->db->delete('item_rawmaterial', array('item_id' => $id));
                $logData['old_value'] = serialize($old_value);
                $logData['new_value'] = serialize($insData);
                $logData['msg']       = "Update raw material";
                $logData['operation'] = "U";
                $this->db->insert('item_rawmaterial_logs', $logData);
            }else{
                $logData['new_value'] = serialize($insData);
                $logData['msg']       = "Insert new raw material";
                $logData['operation'] = "I";
                $this->db->insert('item_rawmaterial_logs', $logData);
            }
            // print $this->db->last_query();exit();
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

    public function getitemRaw($restaurant_id, $item_id){

        $this->db->select('*');
        $this->db->from('item_rawmaterial');
        $this->db->where('is_deleted', 0);
        if($restaurant_id > 0){
            $this->db->where('restaurant_id', $restaurant_id);
        }
        if($item_id > 0){
            $this->db->where('item_id', $item_id);
        }
        $queryone = $this->db->get();
        $result   = $queryone->result_array();
        return $result;
    }   
}