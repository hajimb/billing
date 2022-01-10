<?php

class Wastagemodel extends CI_Model
{
    public function __construct()
    {
        $this->wastage_table = 'wastage';
        $this->load->database();
    }

    public function addWastageRequest($data)
    {
        $data["created_date"] = date('Y-m-d H:i:s');
        $data["modified_date"] = date('Y-m-d H:i:s');
        if($this->session->userdata('user_session')){

        $user_session = $this->session->userdata('user_session');
        $data["created_by"] = $user_session['user_id'];
        $data["modify_by"] = $user_session['user_id'];
        }       

        $this->db->insert($this->wastage_table,$data);
        return 1;

    }    
    
    function getWastagekdata()
    {
        $id = 0;
        $query = $this->db->join('rawmaterial r', 'r.rawmaterial_id = w.rawmaterial_id')->get_where('wastage w', array('w.is_deleted' => $id));
        $result = $query->result_array();
        return $result;
    }
    

    public function getWastage($id)
	{
		$query = $this->db->get_where($this->wastage_table,array('wastage_id'=>$id));
		$result['data'] = $query->row_array();		
		return $result;
	}

    public function updaterecord($data)
    {   
        $this->db->where('wastage_id', $data['wastage_id']);
        $this->db->update($this->wastage_table, $data);     
        return 1;
    }

    function delete_Wastage($id)
    {
        $data = array(
            'is_deleted ' => 1,
        );
        $this->db->where('wastage_id', $id);
        $this->db->update($this->wastage_table, $data);
        return 1;
    }
}