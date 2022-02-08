<?php

class Kotmodel extends CI_Model
{
    public function __construct()
    {
        $this->item_table = 'items';
        $this->bill_head = 'bill_head';
        $this->bill_item = 'bill_item';
        $this->kot_head = 'kot_head';
        $this->kot_item = 'kot_item';
         $this->load->database();
    }

    public function addOrderRequest($data)
    {
        $data["created_date"] = date('Y-m-d H:i:s');
        if($this->session->userdata('user_session')){
           // echo $data["table_id"];
            $user_session = $this->session->userdata('user_session');
            $query = $this->db->query("SELECT max(Id) as max  FROM bill_head ");
            $result = $query->row_array();
            $totalitem = count($data["item_id"]);
            $bill_data["restaurant_id"] = $user_session["restaurant_id"];
            $bill_data["table_id"] = $data["table_id"];
            $bill_data["bill_amt"] = $data["total_amount"];
            $bill_data["total"] = $data["total_amount"];;
            $bill_data["status"] = "RunningKOT";
            $bill_data["invoice_no"] = date("ymd").($result["max"]+1);
            $bill_data["created_date"] = date('Y-m-d H:i:s');
            $bill_data["modified_date"] = date('Y-m-d H:i:s');
            $bill_data["created_by"] = $user_session['user_id'];
            $bill_data["modify_by"] = $user_session['user_id'];
            $bill_data["bill_type"] = $data['order_type'];
            $bill_data["items"] = $totalitem;
            
            $bill = $this->db->insert($this->bill_head,$bill_data);
            $BillId = $this->db->insert_id();
            
            for($i=0;$i<$totalitem;$i++){
                $bill_item["bill_id"] = $BillId;
                $bill_item["item_id"] = $data["item_id"][$i];
                $bill_item["price"] = $data["price"][$i];
                $bill_item["qty"] = $data["qty"][$i];
                $bill_item["amount"] = $data["amount"][$i];
                $this->db->insert($this->bill_item,$bill_item);
            }
            $query = $this->db->query("UPDATE  tables set ord_status = 'RunningKOT' where table_id = '".$this->getTableidofbill($BillId)."'");
            return 1;
        }else{
            return 0;
        }
        

    }    
    
    public function updateOrderRequest($data)
    {
        $data["created_date"] = date('Y-m-d H:i:s');
        if($this->session->userdata('user_session')){
           // echo $data["table_id"];
            $user_session = $this->session->userdata('user_session');
            $query = $this->db->query("SELECT max(Id) as max  FROM bill_head ");
            $result = $query->row_array();
            $totalitem = count($data["item_id"]);
            //$bill_data["restaurant_id"] = $user_session["restaurant_id"];
            //$bill_data["table_id"] = $data["table_id"];
            $bill_data["bill_amt"] = $data["total_amount"];
            $bill_data["total"] = $data["total_amount"];;
            $bill_data["status"] = "RunningKOT";
            //$bill_data["invoice_no"] = date("ymd").$result["max"]+1;
            //$bill_data["created_date"] = date('Y-m-d H:i:s');
            $bill_data["modified_date"] = date('Y-m-d H:i:s');
            //$bill_data["created_by"] = $user_session['user_id'];
            $bill_data["modify_by"] = $user_session['user_id'];
            $bill_data["bill_type"] = $data['order_type'];
            $bill_data["items"] = $totalitem;
            $this->db->where('Id' , $data["ord_id"]);
            $bill = $this->db->update($this->bill_head,$bill_data);
            $this->db->delete($this->bill_item,array('bill_id'=>$data["ord_id"]));
            $BillId = $this->db->insert_id();
            
            
            for($i=0;$i<$totalitem;$i++){
                $bill_item["bill_id"] = $data["ord_id"];
                $bill_item["item_id"] = $data["item_id"][$i];
                $bill_item["price"] = $data["price"][$i];
                $bill_item["qty"] = $data["qty"][$i];
                $bill_item["amount"] = $data["amount"][$i];
                $this->db->insert($this->bill_item,$bill_item);
            }
            $query = $this->db->query("UPDATE  tables set ord_status = 'RunningKOT' where table_id = '".$this->getTableidofbill($data["ord_id"])."'");
            return 1;
        }else{
            return 0;
        }
        

    }  

    function getkotdata($restaurant_id)
    {        
        $query = $this->db->query("SELECT h.*, t.tablename  FROM kot_head h, tables t  where t.table_id = h.table_id and h.status != 'Paid' and h.status != 'OrderTaken' AND t.restaurant_id = ".$restaurant_id );
        $result = $query->result_array();
        $data = array();
        foreach($result as $res){
            $query1 = $this->db->query("SELECT   i.*, n.item_name  FROM kot_item i, items n where n.item_id = i.item_id and i.kot_id = '".$res['Id']."'");
            $result1 = $query1->result_array();
            $res['ord'] = $result1;
            $data[] = $res;
        }
        // echo "<pre>";
        // print_r($data);
        return $data;
    }
    function getkotdataTaken($restaurant_id)
    {        
        $query = $this->db->query("SELECT h.*, t.tablename  FROM kot_head h, tables t  where t.table_id = h.table_id and h.status = 'OrderTaken' AND t.restaurant_id = ".$restaurant_id);
        $result = $query->result_array();
        //print_r($result);
        $data = array();
        foreach($result as $res){
            $query1 = $this->db->query("SELECT   i.*, n.item_name  FROM kot_item i, items n where n.item_id = i.item_id and i.kot_id = '".$res['Id']."'");
            $result1 = $query1->result_array();
            $res['ord'] = $result1;
            $data[] = $res;
        }
        
        return $data;
    }

    function getComplateordersdata()
    {        
        $query = $this->db->query("SELECT h.*, t.tablename  FROM bill_head h, tables t  where t.table_id = h.table_id and (h.status = 'Done' OR h.status = 'Paid')");
        $result = $query->result_array();
        return $result;
    }

    function getordertable($data)
    {        
        //print_r($data);
        //echo "SELECT h.*, i.*  FROM bill_head h, bill_item i where h.Id = i.bill_id and h.Id = '".$data['id']."'";
        $query = $this->db->query("SELECT h.*, i.*, n.item_name, t.tablename  FROM bill_head h, bill_item i, items n, tables t where h.Id = i.bill_id and n.item_id = i.item_id and t.table_id = h.table_id and h.Id = '".$data['id']."' ");
        $result = $query->result_array();
        //print_r($result);
        return $result;
    }

    function getorderdata($data)
    {        
        //print_r($data);
        //echo "SELECT h.*, i.*  FROM bill_head h, bill_item i where h.Id = i.bill_id and h.Id = '".$data['id']."'";
        $query = $this->db->query("SELECT h.*, i.*, n.item_name, t.tablename  FROM bill_head h, bill_item i, items n, tables t where h.Id = i.bill_id and n.item_id = i.item_id and t.table_id = h.table_id and h.table_id = '".$data['table_id']."' and h.status != 'Paid' and h.is_active = 1");
        $result = $query->result_array();
        //print_r($result);
        return $result;
    }
    

    function orderstatusupdate($data)
    {        
        //print_r($data);
        //echo "SELECT h.*, i.*  FROM bill_head h, bill_item i where h.Id = i.bill_id and h.Id = '".$data['id']."'";
        
        
        if($data['status'] == 'Paid'){
            $query = $this->db->query("UPDATE  bill_head set status = '".$data['status']."' , payment_type = '".$data['Payment_type']."', is_active = 0 where Id = '".$data['id']."'");
            $query = $this->db->query("UPDATE  tables set ord_status = '' where table_id = '".$this->getTableidofbill($data['id'])."'");
        }else{
            $query = $this->db->query("UPDATE  bill_head set status = '".$data['status']."' where Id = '".$data['id']."'");
            $query = $this->db->query("UPDATE  tables set ord_status = '".$data['status']."' where table_id = '".$this->getTableidofbill($data['id'])."'");
        }
        
        //print_r($result);
        return $query;
    }

    function getTableidofbill($id){
        $query = $this->db->query("SELECT table_id  FROM bill_head WHERE Id = '".$id."'");
        $result = $query->result_array();
        return $result[0]['table_id'];
    }

    function getItemsbysearch($id)
    {        
        $query = $this->db->query("SELECT *  FROM items WHERE cat_name like '%".$id."%'");
        $result = $query->result_array();
        return $result;
    }
    function getItemsbycategory($id)
    {        
        $query = $this->db->query("SELECT *  FROM items WHERE cat_id = '".$id."'");
        $result = $query->result_array();
        return $result;
    }
    
    function dayenddata()
    {        
        $query = $this->db->query("SELECT count(id) as totalorders, sum(bill_amt) as totalamount, sum(discount_amt) as totaldiscount, sum(tax_amt) as totaltax FROM `bill_head` WHERE STATUS ='Paid'");
        $result = $query->result_array();
        return $result;
    }

    function delete_item($id)
    {
        $data = array(
            'is_deleted ' => 1,
        );
        $this->db->where('item_id', $id);
        $this->db->update($this->item_table, $data);
        return 1;
    }
}