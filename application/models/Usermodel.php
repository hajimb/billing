<?php

class Usermodel extends CI_Model
{
    public function __construct()
    {
        $this->table = 'admin_users';
    }

    function getuserdata()
    {
        $restaurant_id = 0;
        if($this->session->userdata('user_session')){
            $user_session = $this->session->userdata('user_session');
            if($user_session['groups'] != 1)
                $restaurant_id = $user_session["restaurant_id"];
        }
        $this->db->select("au.*, gp.group_name, IFNULL(res.restaurant_name,'--') as restaurant_name");
        $this->db->from('admin_users au');
        $this->db->join('restaurant res', 'res.restaurant_id = au.restaurant_id  AND res.is_deleted = 0','left');
        $this->db->join('groups gp', 'gp.id = au.groups','left');
        $this->db->where('au.is_deleted', '0');
        if($restaurant_id > 0){
            $this->db->where(' au.restaurant_id', $restaurant_id);
        }
        $query = $this->db->get();
        // echo $this->db->last_query();
        $result = $query->result_array();
        return $result;
    }

    public function authenticate($username, $password)
    {
        $res_arr = array();

        // $this->db->select('au.*, r.restaurant_name');
        // $this->db->from('admin_users au');
        // $this->db->join('restaurant r' , 'r.restaurant_id = au.restaurant_id');
        // $this->db->where('au.is_deleted', '0');
        // $this->db->where('r.is_deleted', '0');
        $this->db->select('*');
        $this->db->from('admin_users');
        $this->db->where('is_deleted', '0');
        $this->db->where('username', $username);
        $query = $this->db->get();
        $row = $query->row_array();
        if(isset($row)){
            
            if($row['password'] == md5($password)){
                
            $user_session = array('user_id' => $row['id'], 'firstname' => $row['firstname'], 'lastname' => $row['lastname'], 'email' => $row['email'], 'username' => $row['username'], 'restaurant_id' => $row['restaurant_id'], 'groups' => $row['groups']);
            $this->session->set_userdata('user_session', $user_session); 
        
            $group_data = getUserGroupByUserId($row['id']);
            // print_r($group_data); //['permission'];
            // exit;
            $this->session->set_userdata('user_permission', explode(',',$group_data['permission']));

            $res_arr['msg'] = 'You have succesfully logged in.';
            $res_arr['status'] = 1;
        }else{
                $res_arr['msg'] = 'Invalid Password. Please try again..';
                $res_arr['status'] = 0;
            }    
        }else{
            $res_arr['msg'] = 'Username not found. Please try again..';
            $res_arr['status'] = 0;

        }
        return $res_arr;
    }

    public function check_username_exist($username)
    {
        $this->db->select('*');
        $this->db->from('admin_users');
        $this->db->where('is_deleted', '0');
        $this->db->where('username', $username);
        $query = $this->db->get();
        $row = $query->num_rows();
        if($row > 0){
            return 'true';
        }else{
            return 'false';
        }
    }
    
    public function getUser($id)
    {
        $result = array();
        $query  = $this->db->get_where($this->admie,array('id' => $id));
        $row = $query->num_rows();		
        if($row> 0 )
            $result = $query->row_array();		
        
        return $result;
    }
    
    public function save($data,$id)
    {   
        $this->db->trans_begin();
        $where = array('username'=> $data['username'],'is_deleted'=> 0);
        if(is_exists($where, $this->table, $id) > 0 ){
            $result = array('msg' => 'User Name already Exist','status' => false);
            return $result;
        }
        if($id == 0) {
            $data["created_date"] = date('Y-m-d H:i:s');
            $this->db->insert($this->table,$data);
            $user_id = $this->db->insert_id();

            $group_data = array(
                'user_id' => $user_id,
                'group_id' => $data['groups']
            );
            $group_data = $this->db->insert('user_group', $group_data);

        }else{
            $data["modified_date"] = date('Y-m-d H:i:s');
            $this->db->where('id', $id);
            $this->db->update($this->table, $data);

            $update_user_group = array('group_id' => $data['groups']);
            $this->db->where('user_id', $id);
            $this->db->update('user_group', $update_user_group);

        }

        if ($this->db->trans_status() === false) {
            $this->db->trans_rollback();
            $result = array('msg' => 'Error While Updating User Detail','status' => false);
        } else {
            $this->db->trans_commit();
            $result = array('msg' => 'User Detail Updated successfully','status' => true);
        }
        return $result;
    }

    function delete($id)
    { 
        $this->db->trans_begin();
        $data = array('is_deleted ' => 1);
        $this->db->where('id', $id);
        $this->db->update($this->table, $data);
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