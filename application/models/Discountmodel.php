<?php

class Discountmodel extends CI_Model
{
    public function __construct()
    {
        $this->discount_table = 'discount';
         $this->load->database();
    }

    public function adddiscountRequest($data)
    {
        $data["created_date"] = date('Y-m-d H:i:s');
        //if($this->session->userdata('user_session')){

        //$user_session = $this->session->userdata('user_session');
        //$data["userid"] = $user_session['user_id'];
        //}
        
        $this->db->insert($this->discount_table,$data);

        return 1;

    }  

    public function updaterecord($data)
    {   
        $this->db->where('discount_id', $data['discount_id']);
        $this->db->update($this->discount_table, $data);     
        return 1;
    }

    
    function getdiscountdata()
    {
        $id = 0;
        $query = $this->db->get_where($this->discount_table, array('is_deleted' => $id));
        $result = $query->result_array();
        // print_r($result);
        return $result;
    }

    public function getdiscount($id)
	{
		$query = $this->db->get_where($this->discount_table,array('discount_id'=>$id));
		$result['data'] = $query->row_array();		
		return $result;
	}
    
    function delete_discount($id)
    {
        $data = array(
            'is_deleted ' => 1,
        );
        $this->db->where('discount_id', $id);
        $this->db->update($this->discount_table, $data);
        return 1;
    }
}