<?php

class RawMaterialmodel extends CI_Model
{
    public function __construct()
    {
        $this->rawmaterial_table = 'rawmaterial';
         $this->load->database();
    }

    public function addRawMaterialRequest($data)
    {
        $data["created_date"] = date('Y-m-d H:i:s');
        //if($this->session->userdata('user_session')){

        //$user_session = $this->session->userdata('user_session');
        //$data["userid"] = $user_session['user_id'];
        //}
        
        $this->db->insert($this->rawmaterial_table,$data);

        return 1;

    }  
    
    function getRawMaterialdata()
    {
        $id = 0;
        $query = $this->db->get_where($this->rawmaterial_table, array('is_deleted' => $id));
        $result = $query->result_array();
        return $result;
    }

    public function getRawMaterial($id)
	{
		$query = $this->db->get_where($this->rawmaterial_table,array('rawmaterial_id'=>$id));
		$result['data'] = $query->row_array();		
		return $result;
	}

    public function updaterecord($data)
    {   
        $this->db->where('rawmaterial_id', $data['rawmaterial_id']);
        $this->db->update($this->rawmaterial_table, $data);     
        return 1;
    }
    
    function delete_RawMaterial($id)
    {
        $data = array(
            'is_deleted ' => 1,
        );
        $this->db->where('rawmaterial_id', $id);
        $this->db->update($this->rawmaterial_table, $data);
        return 1;
    }
}