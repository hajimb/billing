<?php

class Wastagemodel extends CI_Model
{
    public function __construct()
    {
        $this->table = 'wastage';
    }

    public function getData($id, $restaurant_id){
        $this->db->select("w.wastage_id, w.restaurant_id, w.rawmaterial_id, w.wastage, w.unit, w.modified_date, mu.units, r.rawmaterial");
        $this->db->from($this->table.' w');
        $this->db->join('rawmaterial r','w.restaurant_id = r.restaurant_id AND r.is_deleted = 0 AND r.restaurant_id = '.$restaurant_id, 'left');
        $this->db->join('master_unit mu','w.unit = mu.id', 'left');
        if($id){
            $this->db->where('w.wastage_id', $id);
        }
        $this->db->where('w.restaurant_id', $restaurant_id);
        $this->db->where('w.is_deleted', 0);
        $this->db->group_by('w.wastage_id');
        $query = $this->db->get();
        $rows  = $query->num_rows();
        // echo $this->db->last_query();

        if($rows > 0){
            if($id){
                $data= $query->row_array();
                return $data;
            }else{
                return $query->result_array();
            }
        }else{
            return array();
        }
    }
    
    public function save($data,$id)
    {   
        $this->db->trans_begin();
       
        if($id == 0) {
            $data["created_by"]   = $this->session->userdata('user_session')['user_id'];
            $data["created_date"] = date('Y-m-d H:i:s');
            $data["modified_date"] = date('Y-m-d H:i:s');
            $this->db->insert($this->table,$data);
            $id = $this->db->insert_id();
        }else{
            $data["modify_by"]   = $this->session->userdata('user_session')['user_id'];
            $data["modified_date"] = date('Y-m-d H:i:s');
            $this->db->where('wastage_id', $id);
            $this->db->update($this->table, $data);
        }

        if ($this->db->trans_status() === false) {
            $this->db->trans_rollback();
            $result = array('msg' => 'Error While Updating Wastage Details','status' => false);
        } else {
            $this->db->trans_commit();
            $result = array('msg' => 'Wastage Details Updated successfully','status' => true);
        }
        return $result;
    }

    function delete($id)
    { 
        $this->db->trans_begin();
        $data = array('is_deleted ' => 1);
        $this->db->where('wastage_id', $id);
        $this->db->update($this->table, $data);
        if ($this->db->trans_status() === false) {
            $this->db->trans_rollback();
            $result = array('msg' => 'Error While Deleting Wastage','status' => false);
        } else {
            $this->db->trans_commit();
            $result = array('msg' => 'Wastage Deleted Successfully','status' => true);
        }
        return $result;
    }
}