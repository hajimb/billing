<?php 

class Model_groups extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->table = 'groups';
	}

	public function save($data, $id)
	{
		$where = array('group_name'=> $data['group_name'], 'is_deleted'=> 0);
        if(is_exists($where, $this->table, $id) > 0 ){
            $result = array('msg' => 'Group Name already Exist','status' => false);
            return $result;
        }
		if($id == 0){
			$data["created_date"] = date('Y-m-d H:i:s');
            $this->db->insert($this->table, $data);
        }else{
			$data["modified_date"] = date('Y-m-d H:i:s');
            $this->db->where('id', $id);
            $this->db->update($this->table, $data);
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
		$delete = $this->db->delete($this->table);
		$error = $this->db->error();
        if ($error['code'] == 0) {
            $result = array('msg' => 'Group Successfully Delete','status' => true);
        } else {
            $result = array('msg' => 'Error While Deleting Group','status' => false);
        }
        return $result;
	}
}