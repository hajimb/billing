<?php

class Itemmodel extends CI_Model
{
    public function __construct()
    {
        $this->item_table = 'items';
         $this->load->database();
    }

    public function addItemRequest($data)
    {
        $data["created_date"] = date('Y-m-d H:i:s');
        if($this->session->userdata('user_session')){

        $user_session = $this->session->userdata('user_session');
        $data["created_by"] = $user_session['user_id'];
        $data["modify_by"] = $user_session['user_id'];
        }
        
        $this->db->insert($this->item_table,$data);

        return 1;

    }    
    
    function getitemsdata()
    {
        $id = 0;
        $query = $this->db->get_where($this->item_table, array('is_deleted' => $id));
        $result = $query->result_array();
        return $result;
    }

    public function getitem($id)
	{
		$query = $this->db->get_where($this->item_table,array('item_id'=>$id));
		$result['data'] = $query->row_array();		
		return $result;
	}
    
    public function updaterecord($data)
    {   
        $this->db->where('item_id', $data['item_id']);
        $this->db->update($this->item_table, $data);     
        return 1;
    }

    function delete_item($id)
    {
        $data = array(
            'is_deleted ' => 1,
        );
        $this->db->where('item_id', $id);
        $this->db->update($this->item_table, $data);
        return 1;
    }
}