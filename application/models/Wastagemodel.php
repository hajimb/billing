<?php

class Wastagemodel extends CI_Model
{
    public function __construct()
    {
        $this->table = 'stock';
        $this->current_stock= 'current_stock';
        $this->created_by   = $this->session->userdata('user_session')['user_id'];
        $this->created_date = date('Y-m-d H:i:s');
    }

    public function getData($id, $restaurant_id, $type='W'){

        $this->db->select("s.stock_id, s.invoice_date, s.restaurant_id, s.rawmaterial_id, s.stock, r.unit, s.modified_date, mu.units, r.rawmaterial");
        $this->db->from($this->table.' s');
        $this->db->join('rawmaterial r','s.rawmaterial_id = r.rawmaterial_id AND r.restaurant_id = '.$restaurant_id, 'left');
        $this->db->join('master_unit mu','r.unit = mu.id', 'left');
        if($id){
            $this->db->where('s.stock_id', $id);
        }
        $this->db->where('s.restaurant_id', $restaurant_id);
        $this->db->where('s.is_deleted', 0);
        $this->db->where('r.is_deleted', 0);
        $this->db->where('s.entry_type', $type);
        $this->db->group_by('s.stock_id');
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
    
    public function save($postData,$id)
    {   
        $this->db->trans_begin();
        // $oldstock = $data['oldstock'];
        // unset($data['oldstock']);
        if($id == 0) {
            // print_r($postData);
            $insData = array();
            foreach($postData['test'] as $key => $val){
                $insData[] = array(
                    "created_by"     => $this->created_by,
                    "entry_type"     => $postData['entry_type'],
                    "created_date"   => $this->created_date,
                    "modified_date"  => $this->created_date,
                    "rawmaterial_id" => $postData['test'][$key]['rawmaterial_id'],
                    "restaurant_id"  => $postData['restaurant_id'],
                    "stock"          => $postData['test'][$key]['stock'],
                    "invoice_date"   => $postData['invoice_date'],
                );
            }
            $this->db->insert_batch($this->table, $insData);
        }else{
            $data["modify_by"]      = $this->created_by;
            $data["modified_date"]  = $this->created_date;
            $this->db->where('stock_id', $id);
            $this->db->update($this->table, $data);
        }
        
        foreach($postData['test'] as $key => $val){
            $data['restaurant_id'] = $postData['restaurant_id'];
            $data['rawmaterial_id']= $postData['test'][$key]['rawmaterial_id'];
            $oldstock = $postData['test'][$key]['oldstock'];
            if($oldstock == ''){
                $oldstock = 0;
            }
            $current_stock_id = getId($data);
            if( $current_stock_id == 0){
                $currentStock = array(
                    'created_by'        => $this->created_by, 
                    'created_date'      => $this->created_date, 
                    'restaurant_id'     => $postData['restaurant_id'], 
                    'rawmaterial_id'    => $postData['test'][$key]['rawmaterial_id'], 
                    'current_stock'     => $postData['test'][$key]['stock'], 
                );
                $this->db->insert($this->current_stock, $currentStock);
            }else{
                $newStock = $postData['test'][$key]['stock'];
                $newStock = $oldstock - $newStock ;
                $where = array(
                    'restaurant_id'  => $postData['restaurant_id'], 
                    'rawmaterial_id' => $postData['test'][$key]['rawmaterial_id'], 
                    'id'             => $current_stock_id
                );
                if($newStock >= 0){
                    $this->db->set('current_stock', 'current_stock + '.$newStock, false);        
                }else{
                    $this->db->set('current_stock', 'current_stock '.$newStock, false);        
                }
                $this->db->set('modified_date', 'NOW()', false);        
                $this->db->set('modified_by', $this->created_by);        
                $this->db->where($where);
                $this->db->update($this->current_stock);
            }
        }

        if ($this->db->trans_status() === false) {
            $this->db->trans_rollback();
            $result = array('msg' => 'Error While Updating Details','status' => false);
        } else {
            $this->db->trans_commit();
            $result = array('msg' => 'Details Updated successfully','status' => true);
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
            $result = array('msg' => 'Error While Deleting Item','status' => false);
        } else {
            $this->db->trans_commit();
            $result = array('msg' => 'Item Deleted Successfully','status' => true);
        }
        return $result;
    }
}