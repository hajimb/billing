<?php

class Cashflowmodel extends CI_Model
{
    public function __construct()
    {
        $this->table = 'cash_flow';
        $this->created_by   = $this->session->userdata('user_session')['user_id'];
        $this->created_date = date('Y-m-d H:i:s');
    }

    public function save($data,$id)
    {   
        $this->db->trans_begin();
        if($id == 0) {
            $data["created_by"]    = $this->created_by;
            $data["created_date"]  = $this->created_date;
            $this->db->insert($this->table,$data);
            $id = $this->db->insert_id();
        }else{
            $data["modify_by"]      = $this->created_by;
            $data["modified_date"]  = $this->created_date;
            $this->db->where('expense_id', $id);
            $this->db->update($this->table, $data);
        }

        if ($this->db->trans_status() === false) {
            $this->db->trans_rollback();
            $result = array('msg' => 'Error While Updating Cash Details','status' => false);
        } else {
            $this->db->trans_commit();
            $result = array('msg' => 'Cash Details Updated successfully','status' => true);
        }
        return $result;
    }

    function delete($id)
    { 
        $this->db->trans_begin();
        $data = array('is_deleted ' => 1);
        $this->db->where('expense_id', $id);
        $this->db->update($this->table, $data);
        if ($this->db->trans_status() === false) {
            $this->db->trans_rollback();
            $result = array('msg' => 'Error While Deleting Cash','status' => false);
        } else {
            $this->db->trans_commit();
            $result = array('msg' => 'Cash Deleted Successfully','status' => true);
        }
        return $result;
    }

}