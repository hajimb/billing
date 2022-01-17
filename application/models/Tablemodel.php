<?php

class Tablemodel extends CI_Model
{
    public function __construct()
    {
        $this->table = 'tables';
    }

    public function save($data,$id)
    {   
        $this->db->trans_begin();
        $where = array('tablename'=> $data['tablename'],'restaurant_id'=> $data['restaurant_id'],'is_deleted'=> 0);
        if(is_exists($where, $this->table, $id,'table_id') > 0 ){
            $result = array('msg' => 'Table Name already Exist','status' => false);
            return $result;
        }
        if($id == 0) {
            $data["created_by"]   = $this->session->userdata('user_session')['user_id'];
            $data["created_date"] = date('Y-m-d H:i:s');
            $data["modified_date"] = date('Y-m-d H:i:s');
            $this->db->insert($this->table,$data);
            $id = $this->db->insert_id();

        }else{
            $data["modify_by"]   = $this->session->userdata('user_session')['user_id'];
            $data["modified_date"] = date('Y-m-d H:i:s');
            $this->db->where('table_id', $id);
            $this->db->update($this->table, $data);
        }

        if ($this->db->trans_status() === false) {
            $this->db->trans_rollback();
            $result = array('msg' => 'Error While Updating Table Details','status' => false);
        } else {
            $this->db->trans_commit();
            $result = array('msg' => 'Table Details Updated successfully','status' => true);
        }
        return $result;
    }

    function delete($id)
    { 
        $this->db->trans_begin();
        $data = array('is_deleted ' => 1);
        $this->db->where('table_id', $id);
        $this->db->update($this->table, $data);
        if ($this->db->trans_status() === false) {
            $this->db->trans_rollback();
            $result = array('msg' => 'Error While Deleting Table','status' => false);
        } else {
            $this->db->trans_commit();
            $result = array('msg' => 'Table Deleted Successfully','status' => true);
        }
        return $result;
    }


    public function addtableRequest($data)
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
       
    function gettablesdata1($data = '')
    {
        $id = 0;
        $filter = '';
        if(is_array($data)){
            if(isset($data['table_id'])){
                $filter = "and (ord_status = '' OR table_id = ".$data['table_id'].")";
            }else{
                $filter = "and ord_status = ''";
            }
            
        }else{

        }

        $sql  = "SELECT * FROM ".$this->table." where is_deleted = 0 $filter";
        $query = $this->db->query($sql);
        // $query = $this->db->get_where($this->table, array('is_deleted' => $id));
        $result['tables'] = $query->result_array();
        foreach($result['tables'] as $res){
            if($res['ord_status'] != ''){
                $query1 = $this->db->query("select * from bill_head b where b.table_id = '".$res['table_id']."' and b.is_active = 1 order by Id DESC limit 1");
                $result1 = $query1->result_array();
                if(count($result1) >0 ){
                    
                    $diff = strtotime(date('Y-m-d H:i:s')) - strtotime($result1[0]['created_date'])  ;

                    $res['table_tot'] = $result1[0]['total'];
                    $res['table_stime'] = $diff;
                    
                }else{

                    $res['table_tot'] = '';
                    $res['table_stime'] = 0;
                }
            }
            $data[] = $res;
        }
        return $result;
    }    

    function gettablesdata($data = '')
    {
        $id = 0;
        $query = $this->db->get_where($this->table, array('is_deleted' => $id));
        $result = $query->result_array();
        $data = array();
        foreach($result as $res){
            if($res['ord_status'] != ''){
                $query1 = $this->db->query("select * from bill_head b where b.table_id = '".$res['table_id']."' and b.is_active = 1 order by Id DESC limit 1");
                $result1 = $query1->result_array();
                if(count($result1) >0 ){
                    
                    $diff = strtotime(date('Y-m-d H:i:s')) - strtotime($result1[0]['created_date'])  ;

                    $res['table_tot'] = $result1[0]['total'];
                    $res['table_stime'] = $diff;
                    
                }else{

                    $res['table_tot'] = '';
                    $res['table_stime'] = 0;
                }
            }
            $data[] = $res;

            // echo date('Y-m-d H:i:s')-date('Y-m-d H:i:s',strtotime($result1[0]['created_date']));
            // $result['diff'] = date_diff(date('Y-m-d H:i:s'), date('Y-m-d H:i:s',strtotime($result1[0]['created_date'])));
        }
        // echo "<pre>";
        // print_r($data);
        return $data;
    }    

    public function gettable($id)
	{
		$query = $this->db->get_where($this->table,array('table_id'=>$id));
		$result['data'] = $query->row_array();		
		return $result;
	}
    public function updaterecord($data)
    {   
        $this->db->where('table_id', $data['table_id']);
        $this->db->update($this->table, $data);     
        return 1;
    }

}