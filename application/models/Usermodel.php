<?php

class Usermodel extends CI_Model
{
    public function __construct()
    {
        $this->admin_table = 'admin_users';
    }

    public function addUserRequest($data)
    {
        $data["created_date"] = date('Y-m-d H:i:s');
        //if($this->session->userdata('user_session')){

        //$user_session = $this->session->userdata('user_session');
        //$data["userid"] = $user_session['user_id'];
        //}
        
        $this->db->insert($this->admin_table,$data);
        $user_id = $this->db->insert_id();

        $group_data = array(
            'user_id' => $user_id,
            'group_id' => $data['groups']
        );

        $group_data = $this->db->insert('user_group', $group_data);
        return 1;

    }    
    
    function getuserdata()
    {
        $id = 0;
        // $query = $this->db->select("SELECT u.username, g.group_name FROM admin_users u, groups g where g.id = u.groups and is_delete = '".$id."'");
        // //$query = $this->db->get_where($this->admin_table, array('is_deleted' => $id));

        // $query = $this->db->select("SELECT u.username, g.group_name FROM admin_users u, groups g where g.id = u.groups and is_delete = '".$id."'");
        $this->db->select('admin_users.*, groups.group_name');
        $this->db->from('admin_users');
        $this->db->join('groups', 'groups.id = admin_users.groups');
        $this->db->where('is_deleted', '0');
        $query = $this->db->get();
        $result = $query->result_array();
        //foreach($result as $res){}
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
        /*$this->db->where('id', $data['id']);
        $this->db->update($this->admin_table, $data);     
        $update_user_group = array('group_id' => $data['groups']);
        $this->db->where('user_id', $data['id']);
        $user_group = $this->db->update('user_group', $update_user_group);
        return 1;*/


        $this->db->trans_begin();

        $this->db->where('id', $data['id']);
        $this->db->update($this->admin_table, $data);

        $update_user_group = array('group_id' => $data['groups']);
        $this->db->where('user_id', $data['id']);
        $this->db->update('user_group', $update_user_group);
        if ($this->db->trans_status() === false) {
            $this->db->trans_rollback();
            $result = array('msg' => 'Error While Update User Detail','status' => false);
        } else {
            $this->db->trans_commit();
            $result = array('msg' => 'User edit successfully','status' => true);
        }
        return $result;
    }

    function delete_user($id)
    {
        $data = array('is_deleted ' => 1);
        // $this->db->where('id', $id);
        // $this->db->update($this->admin_table, $data);
        // return 1;
        $this->db->where('id', $id);
        $this->db->update($this->admin_table, $data);
        if ($this->db->trans_status() === false) {
            $this->db->trans_rollback();
            $result = array('msg' => 'Error While Deleting User','status' => false);
        } else {
            $this->db->trans_commit();
            $result = array('msg' => 'User Deleted Successfully','status' => true);
        }
        return $result;
    }
}