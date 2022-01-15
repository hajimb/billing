<?php

class Stockmodel extends CI_Model
{
    public function __construct()
    {
        $this->table = 'stock';
    }

    public function getData($id, $restaurant_id){
        $this->db->select("s.stock_id, s.invoice_no, s.restaurant_id, s.cat_id, s.rawmaterial_id, s.stock, s.unit, s.supplier_name, s.purchase_date, re.restaurant_name, s.total_amount, s.paid_amount,  mu.units, r.rawmaterial, mp.ptype");
        $this->db->from($this->table.' s');
        $this->db->join('rawmaterial r','s.restaurant_id = r.restaurant_id AND r.is_deleted = 0 AND r.restaurant_id = '.$restaurant_id, 'left');
        $this->db->join('master_unit mu','s.unit = mu.id', 'left');
        $this->db->join('restaurant re','s.restaurant_id = re.restaurant_id AND re.restaurant_id = '.$restaurant_id, 'left');
        // $this->db->join('category c','s.restaurant_id = c.restaurant_id AND c.restaurant_id = '.$restaurant_id, 'left');
        $this->db->join('master_payment_type mp','s.payment_type = mp.id', 'left');
        if($id){
            $this->db->where('s.stock_id', $id);
        }
        $this->db->where('s.restaurant_id', $restaurant_id);
        $this->db->where('s.is_deleted', 0);
        $this->db->group_by('s.stock_id');
        $query = $this->db->get();
        // print $this->db->last_query();
        $rows  = $query->num_rows();
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
            $data["purchase_date"] = date('Y-m-d H:i:s');
            $this->db->insert($this->table,$data);
            $id = $this->db->insert_id();
        }else{
            $data["modify_by"]   = $this->session->userdata('user_session')['user_id'];
            $data["purchase_date"] = date('Y-m-d H:i:s');
            $data["modified_date"] = date('Y-m-d H:i:s');
            $this->db->where('stock_id', $id);
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

    public function delete($id)
    { 
        $this->db->trans_begin();
        $data = array('is_deleted ' => 1);
        $this->db->where('stock_id', $id);
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

    public function getCurrentStockdata($restaurant_id)
    {
        $id = 0;
        $query = $this->db->query("SELECT SUM( s.stock ) AS currentstock,r.rawmaterial,s.unit,s.modified_date,s.rawmaterial_id, (SELECT SUM(w.wastage) as currentwastage FROM wastage w LEFT JOIN rawmaterial r ON r.rawmaterial_id = w.rawmaterial_id WHERE w.is_deleted = 0 and w.rawmaterial_id = s.rawmaterial_id) totalwastage, (SELECT units FROM master_unit mu WHERE mu.id= s.unit) AS units FROM stock s INNER JOIN rawmaterial r ON r.rawmaterial_id = s.rawmaterial_id WHERE s.is_deleted = 0 AND s.restaurant_id ='$restaurant_id' GROUP BY s.rawmaterial_id ORDER BY currentstock ASC");
        $result = $query->result_array();
        return $result;
    }
    
}