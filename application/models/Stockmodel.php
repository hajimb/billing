<?php

class Stockmodel extends CI_Model
{
    public function __construct()
    {
        $this->stock_table = 'stock';
         $this->load->database();
    }

    public function addStockRequest($data)
    {
        $data["created_date"] = date('Y-m-d H:i:s');
        $data["modified_date"] = date('Y-m-d H:i:s');
        $data['purchase_date'] = date('Y-m-d H:i:s'); 
        
        if($this->session->userdata('user_session')){

        $user_session = $this->session->userdata('user_session');
        $data["created_by"] = $user_session['user_id'];
        $data["modify_by"] = $user_session['user_id'];
        }
        
        $this->db->insert($this->stock_table,$data);

        return 1;

    }    
    
    function getpurchaselisting()
    {
        $id = 0;
        $query = $this->db->join('rawmaterial r', 'r.rawmaterial_id = s.rawmaterial_id')->get_where('stock s', array('s.is_deleted' => $id));
        $result = $query->result_array();
        return $result;
    }
    
    function getCurrentStockdata()
    {
        $id = 0;
        $query = $this->db->query("SELECT SUM( s.stock ) AS currentstock,r.rawmaterial,s.unit,s.modified_date,s.rawmaterial_id, (SELECT SUM(w.wastage) as currentwastage FROM wastage w LEFT JOIN rawmaterial r ON r.rawmaterial_id = w.rawmaterial_id WHERE w.is_deleted = 0 and w.rawmaterial_id = s.rawmaterial_id) totalwastage FROM stock s INNER JOIN rawmaterial r ON r.rawmaterial_id = s.rawmaterial_id WHERE s.is_deleted = 0 GROUP BY s.rawmaterial_id ORDER BY currentstock ASC LIMIT 25");
        $result = $query->result_array();
        return $result;
    }

    function getCurrentwastagedata()
    {
        $id = 0;
        $query = $this->db->query("SELECT SUM(w.wastage) as currentwastage, w.rawmaterial_id FROM wastage w LEFT JOIN rawmaterial r ON r.rawmaterial_id = w.rawmaterial_id WHERE w.is_deleted = 0 GROUP BY w.rawmaterial_id ORDER BY currentwastage ASC LIMIT 25");
        $result = $query->result_array();
        return $result;
    }
    

    public function getcurrentstock($id)
	{
		$query = $this->db->get_where($this->stock_table,array('stock_id'=>$id));
		$result['data'] = $query->row_array();		
		return $result;
	}

    public function updaterecord($data)
    {   
        $this->db->where('stock_id', $data['stock_id']);
        $this->db->update($this->stock_table, $data);     
        return 1;
    }

    function delete_Stock($id)
    {
        $data = array(
            'is_deleted ' => 1,
        );
        $this->db->where('stock_id', $id);
        $this->db->update($this->stock_table, $data);
        return 1;
    }
}