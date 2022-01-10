<?php

class Customermodel extends CI_Model
{
    public function __construct()
    {
        $this->customer_table = 'customer';
         $this->load->database();
    }

    public function addCustomerRequest($data)
    {
        $data["created_date"] = date('Y-m-d H:i:s');
        //if($this->session->userdata('user_session')){

        //$user_session = $this->session->userdata('user_session');
        //$data["userid"] = $user_session['user_id'];
        //}
        
        $this->db->insert($this->customer_table,$data);

        return 1;

    }    
    
    function getcustomerdata()
    {
        $id = 0;
        $query = $this->db->get_where($this->customer_table, array('is_deleted' => $id));
        $result = $query->result_array();
        return $result;
    }
    function getcustomerdata1()
    {
        $id = 0;
        $this->db->select('customer_id');
        $this->db->select('mobile');
        $query = $this->db->get_where($this->customer_table, array('is_deleted' => $id));
        $result = $query->result_array();
        return $result;
    }
    public function getcustomer($id)
	{
		$query = $this->db->get_where($this->customer_table,array('customer_id'=>$id));
		$result['data'] = $query->row_array();		
		return $result;
	}

    public function getcustomerbyid($id)
	{
		$query = $this->db->get_where($this->customer_table,array('customer_id'=>$id));
		$result = $query->result_array();		
		return $result;
	}

    public function updaterecord($data)
    {   
        $this->db->where('customer_id', $data['customer_id']);
        $this->db->update($this->customer_table, $data);     
        return 1;
    }

    function delete_customer($id)
    {
        $data = array(
            'is_deleted ' => 1,
        );
        $this->db->where('customer_id', $id);
        $this->db->update($this->customer_table, $data);
        return 1;
    }
}