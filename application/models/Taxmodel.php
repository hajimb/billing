<?php

class Taxmodel extends CI_Model
{
    public function __construct()
    {
        $this->tax_table = 'tax';
         $this->load->database();
    }

    public function addTaxRequest($data)
    {
        $data["created_date"] = date('Y-m-d H:i:s');
        //if($this->session->userdata('user_session')){

        //$user_session = $this->session->userdata('user_session');
        //$data["userid"] = $user_session['user_id'];
        //}
        
        $this->db->insert($this->tax_table,$data);

        return 1;

    }  
    
    function getTaxdata()
    {
        $id = 0;
        $query = $this->db->get_where($this->tax_table, array('is_deleted' => $id));
        $result = $query->result_array();
        return $result;
    }

    public function gettax($id)
	{
		$query = $this->db->get_where($this->tax_table,array('tax_id'=>$id));
		$result['data'] = $query->row_array();		
		return $result;
	}
    
    public function updaterecord($data)
    {   
        $this->db->where('tax_id', $data['tax_id']);
        $this->db->update($this->tax_table, $data);     
        return 1;
    }

    function delete_tax($id)
    {
        $data = array(
            'is_deleted ' => 1,
        );
        $this->db->where('tax_id', $id);
        $this->db->update($this->tax_table, $data);
        return 1;
    }
}