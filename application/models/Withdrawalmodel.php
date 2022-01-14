<?php

class Withdrawalmodel extends CI_Model
{
    public function __construct()
    {
        $this->table = 'withdrawal';
    }

    public function save($data,$id)
    {   
        $this->db->trans_begin();
        // $where = array('withdrawal'=> $data['withdrawal'],'restaurant_id'=> $data['restaurant_id'],'is_deleted'=> 0);
        // if(is_exists($where, $this->table, $id,'withdrawal_id') > 0 ){
        //     $result = array('msg' => 'Withdrawal Name already Exist','status' => false);
        //     return $result;
        // }
        if($id == 0) {
            $data["created_date"] = date('Y-m-d H:i:s');
            $this->db->insert($this->table,$data);
            $id = $this->db->insert_id();

        }else{
            $data["modified_date"] = date('Y-m-d H:i:s');
            $this->db->where('withdrawal_id', $id);
            $this->db->update($this->table, $data);
        }

        if ($this->db->trans_status() === false) {
            $this->db->trans_rollback();
            $result = array('msg' => 'Error While Updating Withdrawal Details','status' => false);
        } else {
            $this->db->trans_commit();
            $result = array('msg' => 'Withdrawal Details Updated successfully','status' => true);
        }
        return $result;
    }

    function delete($id)
    { 
        $this->db->trans_begin();
        $data = array('is_deleted ' => 1);
        $this->db->where('withdrawal_id', $id);
        $this->db->update($this->table, $data);
        if ($this->db->trans_status() === false) {
            $this->db->trans_rollback();
            $result = array('msg' => 'Error While Deleting Withdrawal','status' => false);
        } else {
            $this->db->trans_commit();
            $result = array('msg' => 'Withdrawal Deleted Successfully','status' => true);
        }
        return $result;
    }
    /*

    public function addWithdrawalRequest($data)
    {
        $data["created_date"] = date('Y-m-d H:i:s');
        $data["modified_date"] = date('Y-m-d H:i:s');
        if($this->session->userdata('user_session')){

        $user_session = $this->session->userdata('user_session');
        $data["created_by"] = $user_session['user_id'];
        $data["modify_by"] = $user_session['user_id'];
        }       

        $this->db->insert($this->table,$data);
        return 1;

    }    
    
    function getwithdrawaldata()
    {
        $id = 0;
        $query = $this->db->join('admin_users a', 'a.id = w.user_id')->get_where('Withdrawal w', array('w.is_deleted' => $id));
        $result = $query->result_array();
        return $result;
    }    

    public function getwithdrawal($id)
	{
		$query = $this->db->get_where($this->table,array('withdrawal_id'=>$id));
		$result['data'] = $query->row_array();		
		return $result;
	}
    public function updaterecord($data)
    {   
        $this->db->where('withdrawal_id', $data['withdrawal_id']);
        $this->db->update($this->table, $data);     
        return 1;
    }

    function delete($id)
    {
        $data = array(
            'is_deleted ' => 1,
        );
        $this->db->where('withdrawal_id', $id);
        $this->db->update($this->table, $data);
        return 1;
    }*/
}