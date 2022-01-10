<?php

class Expensemodel extends CI_Model
{
    public function __construct()
    {
        $this->Expense_table = 'expense';
        $this->load->database();
    }

    public function addExpenseRequest($data)
    {
        $data["created_date"] = date('Y-m-d H:i:s');
        $data["modified_date"] = date('Y-m-d H:i:s');
        if($this->session->userdata('user_session')){

        $user_session = $this->session->userdata('user_session');
        $data["created_by"] = $user_session['user_id'];
        $data["modify_by"] = $user_session['user_id'];
        }       

        $this->db->insert($this->Expense_table,$data);
        return 1;

    }    
    
    function getExpensedata()
    {
        $id = 0;
        $query = $this->db->join('admin_users a', 'a.id = e.user_id')->get_where('expense e', array('e.is_deleted' => $id));
        $result = $query->result_array();
        return $result;
    }    

    public function getExpense($id)
	{
		$query = $this->db->get_where($this->Expense_table,array('expense_id'=>$id));
		$result['data'] = $query->row_array();		
		return $result;
	}
    public function updaterecord($data)
    {   
        $this->db->where('expense_id', $data['expense_id']);
        $this->db->update($this->Expense_table, $data);     
        return 1;
    }

    function delete($id)
    {
        $data = array(
            'is_deleted ' => 1,
        );
        $this->db->where('expense_id', $id);
        $this->db->update($this->Expense_table, $data);
        return 1;
    }
}