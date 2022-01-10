<?php

class Categorymodel extends CI_Model
{
    public function __construct()
    {
        $this->category_table = 'category';
         $this->load->database();
    }

    public function addCategoryRequest($data)
    {
        $data["created_date"] = date('Y-m-d H:i:s');
        //if($this->session->userdata('user_session')){

        //$user_session = $this->session->userdata('user_session');
        //$data["userid"] = $user_session['user_id'];
        //}
        
        $this->db->insert($this->category_table,$data);

        return 1;

    }  
    
    function getCategorydata()
    {
        $id = 0;
        $query = $this->db->get_where($this->category_table, array('is_deleted' => $id));
        $result = $query->result_array();
        return $result;
    }

    public function getcategory($id)
	{
		$query = $this->db->get_where($this->category_table,array('category_id'=>$id));
		$result['data'] = $query->row_array();		
		return $result;
	}

    public function updaterecord($data)
    {   
        $this->db->where('category_id', $data['category_id']);
        $this->db->update($this->category_table, $data);     
        return 1;
    }
    
    function delete_category($id)
    {
        $data = array(
            'is_deleted ' => 1,
        );
        $this->db->where('category_id', $id);
        $this->db->update($this->category_table, $data);
        return 1;
    }
}