<?php 

class Model_groups extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function getGroupData($groupId = null) 
	{
		if($groupId) {
			$sql = "SELECT * FROM groups WHERE id = ?";
		}else{
			$groupId = '1';
			$sql = "SELECT * FROM groups WHERE id != ?";
		}
		$query = $this->db->query($sql, array($groupId));
		return $query->result_array();
	}

	public function save($data, $id)
	{
		
		$where = array('group_name'=> $data['group_name'], 'is_deleted'=> 0);
        if(is_exists($where, 'groups', $id) > 0 ){
            $result = array('msg' => 'Group Name already Exist','status' => false);
            return $result;
        }
		if($id == 0){
			$data["created_date"] = date('Y-m-d H:i:s');
            $this->db->insert('groups', $data);
        }else{
			$data["modified_date"] = date('Y-m-d H:i:s');
            $this->db->where('id', $id);
            $this->db->update('groups', $data);
        }
        $error = $this->db->error();
        if ($error['code'] == 0) {
            $result = array('msg' => 'Group Successfully Updated','status' => true);
        } else {
            $result = array('msg' => 'Error While Updating Group','status' => false);
        }
        return $result;
	}

	public function delete($id)
	{
		$this->db->where('id', $id);
		$delete = $this->db->delete('groups');
		$error = $this->db->error();
        if ($error['code'] == 0) {
            $result = array('msg' => 'Group Successfully Delete','status' => true);
        } else {
            $result = array('msg' => 'Error While Deleting Group','status' => false);
        }
        return $result;
	}

	public function getModules(){
		$this->db->select('*');
		$this->db->from('master_modules');
		$this->db->where('to_show',1);
		$this->db->where('is_deleted',0);
		$this->db->order_by('name', 'ASC');
		$query      = $this->db->get();
		$result = $query->result_array();
		return $result;
	}

	// need to check if used

	public function existInUserGroup($id)
	{
		$sql = "SELECT * FROM user_group WHERE group_id = ?";
		$query = $this->db->query($sql, array($id));
		return ($query->num_rows() == 1) ? true : false;
	}

	public function getUserGroupByUserId($user_id) 
	{
		$sql = "SELECT * FROM user_group 
		INNER JOIN groups ON groups.id = user_group.group_id 
		WHERE user_group.user_id = ?";
		$query = $this->db->query($sql, array($user_id));
		$result = $query->row_array();

		return $result;

	}
}