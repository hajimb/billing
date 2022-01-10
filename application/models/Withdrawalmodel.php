<?php

class Withdrawalmodel extends CI_Model
{
    public function __construct()
    {
        $this->withdrawal_table = 'withdrawal';
        $this->load->database();
    }

    public function addWithdrawalRequest($data)
    {
        $data["created_date"] = date('Y-m-d H:i:s');
        $data["modified_date"] = date('Y-m-d H:i:s');
        if($this->session->userdata('user_session')){

        $user_session = $this->session->userdata('user_session');
        $data["created_by"] = $user_session['user_id'];
        $data["modify_by"] = $user_session['user_id'];
        }       

        $this->db->insert($this->withdrawal_table,$data);
        return 1;

    }    
    
    function getwithdrawaldata()
    {
        $id = 0;
        $query = $this->db->join('admin_users a', 'a.id = w.user_id')->get_where('withdrawal w', array('w.is_deleted' => $id));
        $result = $query->result_array();
        return $result;
    }    

    public function getwithdrawal($id)
	{
		$query = $this->db->get_where($this->withdrawal_table,array('withdrawal_id'=>$id));
		$result['data'] = $query->row_array();		
		return $result;
	}
    public function updaterecord($data)
    {   
        $this->db->where('withdrawal_id', $data['withdrawal_id']);
        $this->db->update($this->withdrawal_table, $data);     
        return 1;
    }

    function delete($id)
    {
        $data = array(
            'is_deleted ' => 1,
        );
        $this->db->where('withdrawal_id', $id);
        $this->db->update($this->withdrawal_table, $data);
        return 1;
    }
}