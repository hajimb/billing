<?php

class Ordermodel extends CI_Model
{
    public function __construct()
    {
        $this->item_table = 'items';
        $this->bill_head = 'bill_head';
        $this->bill_item = 'bill_item';
        $this->kot_head = 'kot_head';
        $this->kot_item = 'kot_item';
        $this->order_status_log = 'order_status_log';
        $this->tax = 'tax';
        $this->load->database();
    }


    function search($searchText)
    {        
        $result = array('msg' => 'No Record Found','status' => false, 'data' => array());
        if($this->session->userdata('user_session')){
            $user_session = $this->session->userdata('user_session');
            $restaurant_id = $user_session["restaurant_id"];
            $this->db->select("*");
            $this->db->from('items');
            $this->db->where("(item_name like '%".$searchText."%' OR short_code like '%".$searchText."%')");
            $this->db->where("restaurant_id", $restaurant_id);
            $query      = $this->db->get();
            $rows       = $query->num_rows(); 
            // echo $this->db->last_query();
            if($rows > 0){
                $result['data']['items']     = $query->result_array();
                $result['msg']      = $rows . ' Record(s) found';
                $result['status']   = TRUE;
            }
        }
        return $result;


        $query = $this->db->query("SELECT *  FROM items WHERE cat_name like '%".$searchText."%'");
        $result = $query->result_array();
        return $result;
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
            $bill_data["status"] = "OrderTaken";
            $bill_data["invoice_no"] = date("ymd").($result["max"]+1);
            $bill_data["created_date"] = date('Y-m-d H:i:s');
            $bill_data["modified_date"] = date('Y-m-d H:i:s');
            $bill_data["created_by"] = $user_session['user_id'];
            $bill_data["modify_by"] = $user_session['user_id'];
             $bill_data["bill_type"] = $data['order_type'];
            // $bill_data["mobile"] = $data['mobile'];
            // $bill_data["name"] = $data['name'];
            $bill_data["items"] = $totalitem;
            
            // $query11 = $this->db->query("SELECT * FROM bill_head where table_id = '".$data["table_id"]."' and status != 'BillPaid' order by Id DESC limit 1");
            // $result11 = $query11->row_array();

            if($data["ord_id"] != ''){
                $BillId = $data["ord_id"];
                $bill_i["bill_id"] = $data["ord_id"];
                $bill_data["bill_id"] = $data["ord_id"];
            }else{
                $bill = $this->db->insert($this->bill_head,$bill_data);
                $BillId = $this->db->insert_id();
                $bill_i["bill_id"] = $BillId;
                $bill_data["bill_id"] = $BillId;
                $this->orderstatuslog($BillId,'OrderTaken');
            }
            $bill_data['kot'] = $this->getnewKot();
            $kot = $this->db->insert($this->kot_head,$bill_data);
            $KOTId = $this->db->insert_id();
            
            $bill_i["kot_id"] = $KOTId;

            $bill_ii = $this->db->insert($this->bill_item,$bill_i);
            for($i=0;$i<$totalitem;$i++){
                $bill_item["kot_id"] = $KOTId;
                $bill_item["item_id"] = $data["item_id"][$i];
                $bill_item["price"] = $data["price"][$i];
                $bill_item["qty"] = $data["qty"][$i];
                $bill_item["amount"] = $data["amount"][$i];
                $this->db->insert($this->kot_item,$bill_item);
            }
            $query = $this->db->query("UPDATE  tables set ord_status = 'OrderTaken' where table_id = '".$this->getTableidofbill($BillId)."'");
            return $KOTId;
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
            $bill_data["status"] = "OrderTaken";
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
            //$query = $this->db->query("UPDATE  tables set ord_status = 'RunningKOT' where table_id = '".$this->getTableidofbill($data["ord_id"])."'");
            return 1;
        }else{
            return 0;
        }
        

    }  

    function getordersdata()
    {   
        $data = array();
        if($this->session->userdata('user_session')){
            $user_session = $this->session->userdata('user_session');
            $restaurant_id = $user_session["restaurant_id"];
            $this->db->select("h.*, t.tablename");
            $this->db->from('bill_head h');
            $this->db->join("tables t", "t.table_id = h.table_id", "left");
            $this->db->where("h.status != 'BillPaid'");
            $this->db->where("h.status != 'OrderTaken'");
            $this->db->where("h.restaurant_id", $restaurant_id);
            $query      = $this->db->get();
            // $query = $this->db->query("SELECT h.*, t.tablename  FROM bill_head h, tables t  where t.table_id = h.table_id and h.status != 'BillPaid' and h.status != 'OrderTaken'");
            $result = $query->result_array();
            foreach($result as $res){
                $query1 = $this->db->query("SELECT   i.*, n.item_name  FROM bill_item i, items n where n.item_id = i.item_id and i.bill_id = '".$res['Id']."'");
                $result1 = $query1->result_array();
                $res['ord'] = $result1;
                $data[] = $res;
            }
        }
        return $data;
    }
    function getordersdataTaken()
    {        
        $query = $this->db->query("SELECT h.*, t.tablename  FROM bill_head h, tables t  where t.table_id = h.table_id and h.status = 'OrderTaken'  ");
        $result = $query->result_array();
        //print_r($result);
        $data = array();
        foreach($result as $res){
            $query1 = $this->db->query("SELECT   i.*, n.item_name  FROM bill_item i, items n where n.item_id = i.item_id and i.bill_id = '".$res['Id']."'");
            $result1 = $query1->result_array();
            $res['ord'] = $result1;
            $data[] = $res;
        }
        return $data;
    }

    function getComplateordersdata()
    {        
        $query = $this->db->query("SELECT h.*, t.tablename  FROM bill_head h, tables t  where t.table_id = h.table_id and (h.status = 'Done' OR h.status = 'BillPaid' OR h.status = 'BillRaised')");
        $result = $query->result_array();
        return $result;
    }
    function getnewKot(){
        $query = $this->db->query("SELECT max(kot) as kot FROM `kot_head` WHERE DATE(created_date) = CURDATE()");
        $result = $query->row_array();
        //print_r($result);
        return $result['kot']+1;
        
    }

    function getkottable($data)
    {   

        $this->db->select("h.kot,h.created_date, i.item_id, i.qty, n.item_name, t.tablename, t.capacity, au.username");
        $this->db->from('kot_item i');
        $this->db->join("kot_head h", "h.Id = i.kot_id", "left");
        $this->db->join("items n", "n.item_id = i.item_id", "left");
        $this->db->join("tables t", "t.table_id = h.table_id", "left");
        $this->db->join("admin_users au", "au.id = h.created_by", "left");
        $this->db->where("h.Id", $data['id']);
        $query      = $this->db->get();
        $result = $query->result_array();

        // //print_r($data);
        // //echo "SELECT h.*, i.*  FROM bill_head h, bill_item i where h.Id = i.bill_id and h.Id = '".$data['id']."'";
        // // $query = $this->db->query("SELECT h.*, i.*, n.item_name, t.tablename  FROM bill_head h, bill_item i, items n, tables t where h.Id = i.bill_id and n.item_id = i.item_id and t.table_id = h.table_id and h.Id = '".$data['id']."' ");
        // $sql = "SELECT h.*,i.item_id ,i.qty, n.item_name, t.tablename,t.capacity, h.* FROM kot_item i, kot_head h, items n, tables t  WHERE h.Id = i.kot_id and n.item_id = i.item_id and t.table_id = h.table_id and h.Id = '".$data['id']."' ";
        // $query = $this->db->query($sql);
        // echo $sql;
        // $result = $query->result_array();
        //print_r($result);
        return $result;
    }

    function getordertable($data)
    {        
        //$this->db->query("SET sql_mode=(SELECT REPLACE(@@sql_mode, 'ONLY_FULL_GROUP_BY', ''));");
        //print_r($data);
        //echo "SELECT h.*, i.*  FROM bill_head h, bill_item i where h.Id = i.bill_id and h.Id = '".$data['id']."'";
        // $query = $this->db->query("SELECT h.*, i.*, n.item_name, t.tablename  FROM bill_head h, bill_item i, items n, tables t where h.Id = i.bill_id and n.item_id = i.item_id and t.table_id = h.table_id and h.Id = '".$data['id']."' ");
        $query = $this->db->query("SELECT i.item_id ,sum(i.qty) as qty, i.amount as amount, sum(i.price) as price,n.item_name, t.tablename, h.* FROM kot_item i, kot_head h, items n, tables t  WHERE h.Id = i.kot_id and n.item_id = i.item_id and t.table_id = h.table_id and h.bill_id = '".$data['id']."' GROUP BY i.item_id, h.bill_id ");
        $result = $query->result_array();
        $this->db->select('t.vat, t.sgst, t.cgst, bh.*');
        $this->db->from('bill_head bh');
        $this->db->join('tax t', 't.restaurant_id = bh.restaurant_id AND t.is_default = 1', 'left');
        $this->db->where('id',$data['id']);
        $query1 = $this->db->get();
        // $query1 = $this->db->query("SELECT * FROM bill_head WHERE Id = '".$data['id']."' ");
        $result1 = $query1->row_array();
        $result['bill'] = $result1;
        //print_r($result);
        return $result;
    }

    function getorderBilltable($data)
    {        
        //print_r($data);
        //echo "SELECT h.*, i.*  FROM bill_head h, bill_item i where h.Id = i.bill_id and h.Id = '".$data['id']."'";
        // $query = $this->db->query("SELECT h.*, i.*, n.item_name, t.tablename  FROM bill_head h, bill_item i, items n, tables t where h.Id = i.bill_id and n.item_id = i.item_id and t.table_id = h.table_id and h.Id = '".$data['id']."' ");
        $query = $this->db->query("SELECT i.item_id ,sum(i.qty) as qty, i.amount as amount, sum(i.price) as price,n.item_name, t.tablename, h.* FROM kot_item i, kot_head h, items n, tables t  WHERE h.Id = i.kot_id and n.item_id = i.item_id and t.table_id = h.table_id and h.bill_id = '".$this->getBillId($data['id'])."' GROUP BY i.item_id,h.bill_id ");
        $result = $query->result_array();
        //print_r($result);
        return $result;
    }
    function getBillHead($bill_id){
        $query = $this->db->query("SELECT * FROM bill_head where Id = '".$bill_id."'");
        $result = $query->result_array();
        return $result;
    }
    function getBillHeadActiveTable($table_id,$type){
        $filter = '';
        if($type == 0) $filter = "and status != 'BillPaid'";
        $query = $this->db->query("SELECT * FROM bill_head where table_id = '".$table_id."'".$filter." and is_active = 1 order by Id DESC limit 1");
        $result = $query->result_array();
        return $result;
    }
    function getBillItem($bill_id){
        $sql = "SELECT * FROM bill_item where bill_id = '".$bill_id."'";
        // echo $sql;
        $query = $this->db->query($sql);
        $result = $query->result_array();
        return $result;
    }
    function getKotHead($kot_id){
        $query = $this->db->query("SELECT * FROM kot_head where Id = '".$kot_id."' AND status !='KitchenReject'");
        $result = $query->result_array();
        return $result;
    }
    function getKotItem($kot_id){
        $query = $this->db->query("SELECT * FROM kot_item where kot_id = '".$kot_id."'");
        $result = $query->result_array();
        return $result;
    }
    function getItem($item_id){
        $query = $this->db->query("SELECT * FROM items where item_id = '".$item_id."'");
        $result = $query->result_array();
        return $result;
    }

    function getorderdata($val,$type = 0)
    {        
        //print_r($data);
        //echo "SELECT h.*, i.*  FROM bill_head h, bill_item i where h.Id = i.bill_id and h.Id = '".$data['id']."'";
        // $data = array();
        // $query = $this->db->query("SELECT i.*  FROM bill_head h, bill_item i where h.Id = i.bill_id and h.table_id = '".$val['table_id']."' and h.status != 'BillPaid' and h.is_active = 1");
        // $result = $query->result_array();
        
        // foreach($result as $res){
        //     $data['bill'] = $res;
        //     $query1 = $this->db->query("SELECT h.*, t.tablename FROM kot_head h, tables t where t.table_id = h.table_id and  h.Id = '".$res['kot_id']."' and h.status != 'BillPaid' and h.is_active = 1");
        //     $result1 = $query1->result_array();
        //     foreach($result1 as $res1){
        //         $query2 = $this->db->query("SELECT i.*, n.item_name FROM kot_item i, items n where i.kot_id = '".$res['Id']."' and n.item_id = i.item_id ");
        //         $result2 = $query2->result_array();
               
        //         $res1['kot_detail'] = $result2;
        //         $data['bill']['kot'][] = $res1;
        //         $res['kot'][] = $res1;
        //             // foreach($result2 as $res2){
        //             //     $data['bill']['kot']['kot_detail'] = $res2;
        //             // }
        //     }
        // }

        $bill_head = $this->getBillHeadActiveTable($val,$type);
        // print_r($bill_head);
        // echo "<hr>";
        $d = array();
        foreach($bill_head as $bill_h){
            $bill_item = $this->getBillItem($bill_h["Id"]);
            // print_r($bill_item);
            // echo "<hr>";
            $d1 = array();
            foreach($bill_item as $bill_i){
                $kot_head = $this->getKotHead($bill_i['kot_id']);
                // print_r($kot_head);
                // echo "<hr>";
                $d2 = array();
                foreach($kot_head as $kot_h){
                    $kot_item = $this->getKotItem($kot_h['Id']);
                    // print_r($kot_item);
                    // echo "<hr>";
                    $d3 = array();
                    foreach($kot_item as $kot_i){
                        $item = $this->getItem($kot_i['item_id']);
                        $kot_i['item'] = $item[0];
                        $d3[] = $kot_i;
                    }
                    $kot_h['kot_item'] = $d3;
                    $d2[] = $kot_h;
                }
                
                $bill_i['kot'] = $d2;
                $d1[] = $bill_i;
            }
            $bill_h['bill_item'] = $d1;
            
            
            $d = $bill_h;
            //$d['kk'] = $d1;
        }
        // echo "<pre>";
        // print_r($d);


        // $query = $this->db->query("SELECT h.*, i.*, n.item_name, t.tablename  FROM kot_head h, kot_item i, items n, tables t where h.Id = i.kot_id and n.item_id = i.item_id and t.table_id = h.table_id and h.table_id = '".$data['table_id']."' and h.status != 'BillPaid' and h.is_active = 1");
        // $result = $query->result_array();
        //print_r($result);
        // echo "<pre>";
        // print_r($data);
        return $d;
    }
    

    function orderstatusupdate($data)
    {        
        //print_r($data);
        //echo "SELECT h.*, i.*  FROM bill_head h, bill_item i where h.Id = i.bill_id and h.Id = '".$data['id']."'";
        
        
        if($data['status'] == 'BillPaid'){
            $query = $this->db->query("UPDATE  bill_head set status = '".$data['status']."' , payment_type = '".$data['Payment_type']."', is_active = 0 where Id = '".$data['id']."'");
            $query = $this->db->query("UPDATE  tables set ord_status = '' where table_id = '".$this->getTableidofbill($data['id'])."'");
            $this->orderstatuslog($data['id'],$data['status']);
        }else{
            $query = $this->db->query("UPDATE  bill_head set status = '".$data['status']."' where Id = '".$data['id']."'");
            $query = $this->db->query("UPDATE  tables set ord_status = '".$data['status']."' where table_id = '".$this->getTableidofbill($data['id'])."'");
            $this->orderstatuslog($data['id'],$data['status']);
        }
        
        //print_r($result);
        return $query;
    }

    function orderstatusupdatenew($data)
    {        
        //print_r($data);
        //echo "SELECT h.*, i.*  FROM bill_head h, bill_item i where h.Id = i.bill_id and h.Id = '".$data['id']."'";
        
        
        if($data['status'] == 'BillPaid'){
            $query = $this->db->query("UPDATE  bill_head set status = '".$data['status']."' , payment_type = '".$data['Payment_type']."', is_active = 0 where Id = '".$data['id']."'");
            $query = $this->db->query("UPDATE  tables set ord_status = '', status = '' where table_id = '".$this->getTableidofbill($data['id'])."'");
            // $query = $this->db->query("UPDATE  tables set status = '' where table_id = '".$this->getTableidofbill($data['id'])."'");
            $this->orderstatuslog($data['id'],$data['status']);
        }else{
            $query = $this->db->query("UPDATE  bill_head set status = '".$data['status']."' where Id = '".$data['id']."'");
            $query = $this->db->query("UPDATE  tables set ord_status = '".$data['status']."' where table_id = '".$data['table_id']."'");
            $query = $this->db->query("UPDATE  kot_head set status = '".$data['status']."' where Id = '".$data['kot_id']."'");
            $this->orderstatuslog($data['id'],$data['status']);
        }
        
        //print_r($result);
        return $query;
    }

    function getactivetax(){
        $this->db->select("*");
        $this->db->from('tax');
        $this->db->where("is_default",1);
        $this->db->limit(1);
        $query      = $this->db->get();
        $result = $query->row_array();
        return $result;
        // $query1 = $this->db->query("SELECT * from tax where is_default = 1 limit 1");
        // $result1 = $query1->row_array();
        // return $result1;
    }
    
    function billdiscountupdate($data)
    {        
        // $tot = $data['dis'] + $data['g_total'];
        // $query1 = $this->db->query("SELECT * from tax where is_default = 1 limit 1");
        // $result1 = $query1->row_array();
        // $vat = $result1['vat']/100*$tot;
        // $sgst = $result1['sgst']/100*$tot;
        // $cgst = $result1['cgst']/100*$tot;

        // $tax = $vat + $sgst + $cgst;
            $query = $this->db->query("UPDATE  bill_head set discount_amt = '".$data['dis']."', total='".$data['g_total']."', tax_amt = '".$data['tax']."' where Id = '".$data['id']."'");
        
        return $query;
    }
    function billstatusupdate($data)
    {        
        //print_r($data);
        //echo "SELECT h.*, i.*  FROM bill_head h, bill_item i where h.Id = i.bill_id and h.Id = '".$data['id']."'";
        
            $query = $this->db->query("UPDATE  bill_head set status = '".$data['status']."' where Id = '".$data['id']."'");
            $query = $this->db->query("UPDATE  tables set ord_status = '".$data['status']."' where table_id = '".$data['table_id']."'");
            $query = $this->db->query("UPDATE  kot_head set status = '".$data['status']."' where bill_id = '".$data['id']."' AND status != 'KitchenReject'");
            $this->orderstatuslog($data['id'],$data['status']);
        
        //print_r($result);
        return $query;
    }

    function billpaiedupdate($data)
    {    
            $query = $this->db->query("UPDATE  bill_head set status = 'BillPaid', payment_type = '".$data['type']."' where Id = '".$data['id']."'");
            $query = $this->db->query("UPDATE  tables set ord_status = 'BillPaid' where table_id = '".$data['table_id']."'");
            $query = $this->db->query("UPDATE  kot_head set status = 'BillPaid', payment_type = '".$data['type']."' where bill_id = '".$data['id']."'");
            $this->orderstatuslog($data['id'],'BillPaid');
        
        //print_r($result);
        return $query;
    }
    
    function orderstatusupdateTable($data)
    {   
        if($data["status"] == 'OrderOnTable'){
            $query1 = $this->db->query("SELECT *  FROM kot_head WHERE table_id = '".$data['table_id']."' and status = 'PickedUpByWaiter' order by Id DESC limit 1");
            $result1 = $query1->result_array();
            $res_data = $result1[0];

            $query = $this->db->query("UPDATE  bill_head set status = '".$data['status']."' where Id = '".$res_data['bill_id']."'");
            $query = $this->db->query("UPDATE  tables set ord_status = '".$data['status']."' where table_id = '".$res_data['table_id']."'");
            $query = $this->db->query("UPDATE  kot_head set status = '".$data['status']."' where Id = '".$res_data['Id']."'");
            $this->orderstatuslog($res_data['bill_id'],$data['status']);
        }     
        
        
        
        //print_r($result);
        return $query;
    }
    function tableEmpty($data)
    {   
        // $query = $this->db->query("UPDATE  bill_head set status = '' where Id = '".$this->getBillId($data['table_id'])."'");
        $query = $this->db->query("UPDATE  tables set ord_status = '' where table_id = '".$data['table_id']."'");
        // $query = $this->db->query("UPDATE  kot_head set status = '' where bill_id = '".$this->getBillId($data['table_id'])."'");
        //print_r($result);
        return $query;
    }
    function getTableidofbill($id){
        $query = $this->db->query("SELECT table_id  FROM bill_head WHERE Id = '".$id."'");
        $result = $query->result_array();
        return $result[0]['table_id'];
    }

    function getBillId($table_id){
        $query = $this->db->query("SELECT Id  FROM bill_head WHERE table_id = '".$table_id."'  order by Id DESC limit 1");
        $result = $query->result_array();
        return $result[0]['Id'];
    }

    function orderstatuslog($order_id,$status){
        $data["order_id"] = $order_id;
        $data["status"] = $status;
        $this->db->insert($this->order_status_log,$data);
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
        $query = $this->db->query("SELECT count(id) as totalorders, sum(bill_amt) as totalamount, sum(discount_amt) as totaldiscount, sum(tax_amt) as totaltax FROM `bill_head` WHERE STATUS ='BillPaid'");
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