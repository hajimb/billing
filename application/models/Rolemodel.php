<?php

class Rolemodel extends CI_Model
{
    public function __construct()
    {
        $this->admin_table = 'admin_users';
         $this->load->database();
    }

    public function addUserRequest($data)
    {
        $data["created_date"] = date('Y-m-d H:i:s');
        //if($this->session->userdata('user_session')){

        //$user_session = $this->session->userdata('user_session');
        //$data["userid"] = $user_session['user_id'];
        //}
        
        $this->db->insert($this->admin_table,$data);

        return 1;

    }    
    
    function getuserdata()
    {
        $id = 0;
        $query = $this->db->get_where($this->admin_table, array('is_deleted' => $id));
        $result = $query->result_array();
        return $result;
    }
    public function getUser($id)
	{
		$query = $this->db->get_where($this->admin_table,array('id'=>$id));
		$result['data'] = $query->row_array();		
		return $result;
	}

    public function updaterecord($data)
    {   
        $this->db->where('id', $data['id']);
        $this->db->update($this->admin_table, $data);     
        return 1;
    }

    function delete_user($id)
    {
        $data = array(
            'is_deleted ' => 1,
        );
        $this->db->where('id', $id);
        $this->db->update($this->admin_table, $data);
        return 1;
    }
}