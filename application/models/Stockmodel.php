<?php

class Stockmodel extends CI_Model
{
    private $created_by;
    private $created_date;
    public function __construct()
    {
        $this->table        = 'stock';
        $this->current_stock= 'current_stock';
        $this->created_by   = $this->session->userdata('user_session')['user_id'];
        $this->created_date = date('Y-m-d H:i:s');
    }

    public function getData($id, $restaurant_id, $payment_type=''){
        $this->db->select("s.stock_id, s.invoice_no, s.restaurant_id, s.rawmaterial_id, s.stock, s.supplier_name, s.invoice_date, re.restaurant_name, s.total_amount, s.paid_amount, s.payment_type, r.rawmaterial, mp.ptype, mu.units");
        $this->db->from($this->table.' s');
        $this->db->join('rawmaterial r','s.rawmaterial_id = r.rawmaterial_id AND r.restaurant_id = '.$restaurant_id, 'left');
        $this->db->join('master_unit mu','r.unit = mu.id', 'left');
        $this->db->join('restaurant re','s.restaurant_id = re.restaurant_id AND re.restaurant_id = '.$restaurant_id, 'left');
        // $this->db->join('category c','s.restaurant_id = c.restaurant_id AND c.restaurant_id = '.$restaurant_id, 'left');
        $this->db->join('master_payment_type mp','s.payment_type = mp.id', 'left');
        if($id){
            $this->db->where('s.stock_id', $id);
        }
        $this->db->where('s.restaurant_id', $restaurant_id);
        $this->db->where('s.is_deleted', 0);
        $this->db->where('r.is_deleted', 0);
        $this->db->where('s.entry_type', 'P');
        if($payment_type){
            $this->db->where('s.payment_type', $payment_type);
        }
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
    
    public function save($data, $id, $ip)
    {   
        $this->db->trans_begin();
        $oldstock = $data['oldstock'];
        unset($data['oldstock']);
        if($id == 0) {
            $data["created_by"]     = $this->created_by;
            $data["modify_by"]      = $this->created_by;
            $data["created_date"]   = $this->created_date;
            $data["modified_date"]  = $this->created_date;
            $this->db->insert($this->table, $data);
            $id = $this->db->insert_id();

            $cashflow['reason']         = "Raw Material Purchase";
            $cashflow['restaurant_id']  = "Raw Material Purchase";
            $cashflow['cash_type ']     = "O";
            $cashflow["created_by"]     = $this->created_by;
            $cashflow["created_date"]   = $this->created_date;
            $cashflow["cash_date"]      = $data['invoice_date'];
            $cashflow["amount"]         = $data['paid_amount'];
            $cashflow["user_id"]        = $this->created_by;
            $cashflow["pid"]            = $id;
            $this->db->insert('cash_flow', $cashflow);

        }else{
            $data["modify_by"]      = $this->created_by;
            $data["modified_date"]  = $this->created_date;
            $this->db->where('stock_id', $id);
            $this->db->update($this->table, $data);

            $cashflow["modify_by"]      = $this->created_by;
            $cashflow["modified_date"]  = $this->created_date;
            $cashflow["amount"]         = $data['paid_amount'];
            $cashflow["user_id"]        = $this->created_by;
            $cashflow["cash_date"]      = $data['invoice_date'];

            $this->db->where('pid', $id);
            $this->db->update('cash_flow', $cashflow);
        }   
        $current_stock_id = getId($data);

        if( $current_stock_id == 0){
            $currentStock = array(
                'created_by'        => $this->created_by, 
                'created_date'      => $this->created_date, 
                'modified_by'       => $this->created_by, 
                'modified_date'     => $this->created_date, 
                'restaurant_id'     => $data['restaurant_id'], 
                'rawmaterial_id'    => $data['rawmaterial_id'], 
                'current_stock'     => $data['stock'], 
                'ip'                => $ip, 
            );
            $this->db->insert($this->current_stock, $currentStock);
        }else{
            $newStock = $data['stock'];
            if($oldstock > 0){
                $newStock =  $newStock - $oldstock ;
            }
            $where = array(
                'restaurant_id'  => $data['restaurant_id'], 
                'rawmaterial_id' => $data['rawmaterial_id'], 
                'id'             => $current_stock_id
            );
            if($newStock >= 0){
                $this->db->set('current_stock', 'current_stock + '.$newStock, false);        
            }else{
                $this->db->set('current_stock', 'current_stock '.$newStock, false);
            }
            $this->db->set('modified_date', 'NOW()', false);        
            $this->db->set('modified_by', $this->created_by);        
            $this->db->set('ip', $ip);        
            $this->db->where($where);
            $this->db->update($this->current_stock);
        }

        if ($this->db->trans_status() === false) {
            $this->db->trans_rollback();
            $result = array('msg' => 'Error While Updating Purchase Details','status' => false);
        } else {
            $this->db->trans_commit();
            $result = array('msg' => 'Purchase Details Updated successfully','status' => true);
        }
        return $result;
    }

    public function delete($id)
    { 
        $this->db->trans_begin();
        $data = array('is_deleted ' => 1);
        $this->db->where('stock_id', $id);
        $this->db->update($this->table, $data);

        $this->db->where('pid', $id);
        $this->db->update('cash_flow', $data);

        if ($this->db->trans_status() === false) {
            $this->db->trans_rollback();
            $result = array('msg' => 'Error While Deleting Purchase','status' => false);
        } else {
            $this->db->trans_commit();
            $result = array('msg' => 'Purchase Deleted Successfully','status' => true);
        }
        return $result;
    }

    public function getCurrentStockdata($restaurant_id)
    {
        $id = 0;
        $this->db->select("r.rawmaterial, cs.current_stock, mu.units, cs.modified_date");
        $this->db->from($this->current_stock.' cs');
        $this->db->join('rawmaterial r','cs.rawmaterial_id = r.rawmaterial_id AND r.is_deleted = 0', 'left');
        $this->db->join('master_unit mu','r.unit = mu.id', 'left');
        $this->db->where('cs.restaurant_id', $restaurant_id);
        $this->db->where('r.is_deleted', 0);
        // $this->db->group_by('s.stock_id');
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
        // select r.rawmaterial, cs.current_stock, mu.units, cs.modified_date from current_stock cs left join rawmaterial r on r.rawmaterial_id  = cs.rawmaterial_id left join master_unit mu on mu.id = r.unit WHERE cs.restaurant_id = 5

        // $query = $this->db->query("SELECT SUM( s.stock ) AS currentstock,r.rawmaterial, r.unit, s.modified_date,s.rawmaterial_id, (SELECT SUM(w.wastage) as currentwastage FROM wastage w LEFT JOIN rawmaterial r ON r.rawmaterial_id = w.rawmaterial_id WHERE w.is_deleted = 0 and w.rawmaterial_id = s.rawmaterial_id) totalwastage, (SELECT units FROM master_unit mu WHERE mu.id= r.unit) AS units FROM stock s INNER JOIN rawmaterial r ON r.rawmaterial_id = s.rawmaterial_id WHERE s.is_deleted = 0 AND s.restaurant_id ='$restaurant_id' GROUP BY s.rawmaterial_id ORDER BY currentstock ASC");
        // $result = $query->result_array();
        // return $result;
    }

    public function getIndent($id, $restaurant_id){
        $this->db->select("raw.rawmaterial_id, raw.rawmaterial, IFNULL(cs.current_stock, 0) AS stock, mu.units");
        $this->db->from('rawmaterial raw');
        $this->db->join('master_unit mu', 'raw.unit = mu.id', 'left');
        $this->db->join('current_stock cs', 'raw.rawmaterial_id = cs.rawmaterial_id', 'left');
        if($id){
            $this->db->where('raw.rawmaterial_id', $id);
        }
        $this->db->where('raw.restaurant_id', $restaurant_id);
        $this->db->where('raw.is_deleted', 0);
        $this->db->order_by('rawmaterial');
        $query = $this->db->get();
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

    public function getDuepayment($pid){
        $this->db->select('SUM(amount) As amount');
        $this->db->from('cash_flow');
        $this->db->where('pid', $pid);
        $query = $this->db->get();
        return $query->row();
    }
    
    public function gettotal($pid){
        $this->db->select('total_amount');
        $this->db->from('stock');
        $this->db->where('stock_id', $pid);
        $query = $this->db->get();
        return $query->row();
    }

    public function paydueamount($data, $main_id, $ip){
        $this->db->trans_begin();
        $cashflow['reason']         = "Raw Material Purchase";
        $cashflow['restaurant_id']  = "Raw Material Purchase";
        $cashflow['cash_type ']     = "O";
        $cashflow["created_by"]     = $this->created_by;
        $cashflow["created_date"]   = $this->created_date;
        $cashflow["cash_date"]      = $this->created_date;
        $cashflow["amount"]         = $data['paid_amount'];
        $cashflow["user_id"]        = $this->created_by;
        $cashflow["pid"]            = $main_id;
        $this->db->insert('cash_flow', $cashflow);

        $where = array(
            'restaurant_id'  => $data['restaurant_id'], 
            'stock_id'       => $main_id
        );

        $data["modify_by"]      = $this->created_by;
        $data["modified_date"]  = $this->created_date;
        $this->db->where($where);
        $this->db->set('paid_amount', 'paid_amount + '.$data["paid_amount"], false);    
        $this->db->set('modified_date', 'NOW()', false);        
        $this->db->set('modify_by', $this->created_by);
        if($data['payment_type']){
            $this->db->set('payment_type', $data['payment_type']);
        }
        $this->db->update($this->table);

        if ($this->db->trans_status() === false) {
            $this->db->trans_rollback();
            $result = array('msg' => 'Error While Deleting Purchase','status' => false);
        } else {
            $this->db->trans_commit();
            $result = array('msg' => 'Purchase Deleted Successfully','status' => true);
        }
        return $result;
    }
}