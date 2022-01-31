<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}


/** 
 * link the css files 
 * @param array $array
 * @return print css links
 */
if (!function_exists('load_css')) { //checked
    function load_css(array $array) {
        foreach ($array as $uri) {
            if (strpos($uri, 'http') !== false) {
                echo "<link rel='stylesheet' type='text/css' href='" . $uri . "?i=". time()."' />\n";
            } else {
                echo "<link rel='stylesheet' type='text/css' href='" . base_url($uri) . "?i=" . time() . "' />\n";
            }
        }
    }
}

/**
 * link the javascript files 
 * 
 * @param array $array
 * @return print js links
 */
if (!function_exists('load_js')) {
    function load_js(array $array) {
        foreach ($array as $uri) {
            if (strpos($uri, 'http') !== false) {
                echo "<script type='text/javascript'  src='" . $uri . "?i=" . time() . "'></script>\n";
            }else{
                echo "<script type='text/javascript'  src='" . base_url($uri) . "?i=". time()."'></script>\n";
            }
        }
    }
}

if (!function_exists('is_exists')) {
    function is_exists($where, $table_name, $id = 0, $fldname = "id")
    {
        $ci = &get_instance();
        $ci->load->database();
        $ci->db->select($fldname);
        $ci->db->from($table_name);
        $ci->db->where($where);
        if ($id > 0) {
            $ci->db->where($fldname.' !=', $id);
        }
        $queryone    = $ci->db->get();
        $rows       = $queryone->num_rows();
        return $rows;
    }
}
if (!function_exists('getData')) {
    function getData($table_name, $restaurant_id = 0, $fldname = "id", $id = -1)
    {
        $result = array();
        $ci = &get_instance();
        $ci->load->database();
        $ci->db->select('*');
        $ci->db->from($table_name);
        $ci->db->where('is_deleted', 0);
        if($restaurant_id > 0){
            $ci->db->where('restaurant_id', $restaurant_id);
        }
        if ($id != -1) {
            $ci->db->where($fldname, $id);
        }
        $queryone   = $ci->db->get();
        if ($id > 0) {
            $result    = $queryone->row_array();
        }else{
            $result    = $queryone->result_array();
        }
        return $result;
    }
}


if (!function_exists('getRestaurant')){
    function getRestaurant(){
        $ci=& get_instance();
        $ci->load->database();
        $return = array();
        $query = $ci->db->query("SELECT * FROM restaurant WHERE is_deleted =0");
        $query = $query->result_array();
        if( is_array( $query ) && count( $query ) > 0 ){
            $return[''] = '--Select Restaurant--';
            foreach($query as $row){
                $return[$row['restaurant_id']] = $row['restaurant_name'].' - '.$row['restaurant_address'];
            }
        }
        return $return;
    }
}

if (!function_exists('getCategory')){
    function getCategory($rid=''){
        $ci=& get_instance();
        $ci->load->database();
        $return = array();
        $query = $ci->db->query("SELECT * FROM category WHERE is_deleted = 0 AND restaurant_id=".$rid);
        $query = $query->result_array();
        if( is_array( $query ) && count( $query ) > 0 ){
            $return[''] = '--Select category--';
            foreach($query as $row){
                $return[$row['category_id']] = $row['category'];
            }
        }
        return $return;
    }
}

if (!function_exists('getUnit')){
    function getUnit(){
        $ci=& get_instance();
        $ci->load->database();
        $return = array();
        $query = $ci->db->query("SELECT * FROM master_unit");
        $query = $query->result_array();
        if( is_array( $query ) && count( $query ) > 0 ){
            $return[''] = '--Select Unit--';
            foreach($query as $row){
                $return[$row['id']] = $row['units'];
            }
        }
        return $return;
    }
}

if (!function_exists('getRawmaterial')){
    function getRawmaterial($restaurant_id){
        $ci=& get_instance();
        $ci->load->database();
        $return = array();
        $query = $ci->db->query("SELECT rm.rawmaterial_id, rm.rawmaterial, u.units FROM rawmaterial rm left join master_unit u on u.id = rm.unit WHERE rm.is_deleted = 0 AND rm.restaurant_id=".$restaurant_id);
        $query = $query->result_array();
        if( is_array( $query ) && count( $query ) > 0 ){
            $return[''] = array('' =>'--Select Raw Material --');
            foreach($query as $row){
                $return[$row['rawmaterial_id']] = array($row['units'] => $row['rawmaterial']);
            }
        }
        return $return;
    }
}

if (!function_exists('convertDate')){
    function convertDate($date, $to='mysql'){
        
        if($date){
            if($to=='mysql'){
                // $format = 'd-m-Y';
                // $date = DateTime::createFromFormat($format, $date)->format('Y-m-d');
                $date=$date;
            }if($to=='user'){
                $format = 'Y-m-d';
                $date = DateTime::createFromFormat($format, $date)->format('d-m-Y');
            }
        }
        return $date;
    }
}


/* Get list of Modules */
if (!function_exists('getModules')) {
    function getModules()
    {
        $result = array();
        $ci = &get_instance();
        $ci->load->database();

        $ci->db->select('*');
        $ci->db->from('master_modules');
        $ci->db->where('to_show',1);
        $ci->db->where('is_deleted',0);
        $ci->db->where('parent_id',0);
        $ci->db->order_by('sort_id', 'ASC');
        $query      = $ci->db->get();
        $result = $query->result_array();
        return $result;
    }
}

/* Get User Groups of Particular User */
if (!function_exists('getUserGroupByUserId')) {
    function getUserGroupByUserId($user_id)
    {

        // SELECT GROUP_CONCAT(mm.classname) as cls FROM user_group ug left join groups g on g.id = ug.group_id left join master_modules mm on FIND_IN_SET(mm.id,g.permission) where ug.user_id = 2
        //SELECT GROUP_CONCAT(mm.classname) as classname FROM master_modules mm where FIND_IN_SET(id,'1,2,3')
        $result = array();
        $ci = &get_instance();
        $ci->load->database();
        $ci->db->select('GROUP_CONCAT(mm.classname) as permission');
        $ci->db->from('user_group ug');
        $ci->db->join('groups g','g.id = ug.group_id', 'left');
        $ci->db->join('master_modules mm','FIND_IN_SET(mm.id, g.permission)',"left",false);
        $ci->db->where('ug.user_id',$user_id);
        $query  = $ci->db->get();
        // echo $ci->db->last_query();
        $result = $query->row_array();
        return $result;
    }
}

/* Get User Groups of Particular User */
if (!function_exists('getExpenseData')) {
    function getExpenseData($table_name,$restaurant_id)
    {
        $result = array();
        $ci = &get_instance();
        $ci->load->database();

        $ci->db->select('e.*, au.username ');
        $ci->db->from($table_name.' e');
        $ci->db->join('admin_users au','au.id = e.user_id', 'left');
        $ci->db->where('e.is_deleted',0);
        $ci->db->where('e.restaurant_id',$restaurant_id);
        $query  = $ci->db->get();
        $result = $query->result_array();
        return $result;
    }
}

/* Get User Groups of Particular User */
if (!function_exists('getGroupData')) {
    function getGroupData($groupId = null)
    {
        $result = array();
        $ci = &get_instance();
        $ci->load->database();
        
        $ci->db->select('*');
        $ci->db->from('groups');

        if(! is_null($groupId)) {
            if($groupId == 0){
                $groupId = 1;
                $where = "id != 1";
            }else{
                $where = "id = $groupId";
            }
            $ci->db->where($where);
        }
        $query  = $ci->db->get();
        $result = $query->result_array();
        return $result;
    }
}

if (!function_exists('getPaymentType')){
    function getPaymentType(){
        $ci=& get_instance();
        $ci->load->database();
        $return = array();
        $query = $ci->db->query("SELECT * FROM master_payment_type");
        $query = $query->result_array();
        if( is_array( $query ) && count( $query ) > 0 ){
            $return[''] = '--Select Payment Type--';
            foreach($query as $row){
                $return[$row['id']] = $row['ptype'];
            }
        }
        return $return;
    }
}



if (!function_exists('getTableData')){
    function getTableData($restaurant_id = 0,$table_id = 0)
    {
        $ci=& get_instance();
        $ci->load->database();
        $data = array();
        $ci->db->select('*');
        $ci->db->from('tables');
        $ci->db->where('is_deleted',0);
        if($restaurant_id > 0 ) $ci->db->where('restaurant_id',$restaurant_id);
        if($table_id > 0 ) $ci->db->where('table_id',$table_id);
        $query  = $ci->db->get();
        $result = $query->result_array();
        foreach($result as $res){
            if($res['ord_status'] != ''){
                $ci->db->select('*');
                $ci->db->from('bill_head');
                $ci->db->where('table_id',$res['table_id']);
                $ci->db->where('is_active',1);
                $ci->db->order_by('Id','DESC');
                $ci->db->limit(1);
                $query1  = $ci->db->get();
                $result1 = $query1->result_array();
                if(count($result1) > 0 ){
                    $diff = strtotime(date('Y-m-d H:i:s')) - strtotime($result1[0]['created_date'])  ;
                    $res['table_tot']   = $result1[0]['total'];
                    $res['table_stime'] = $diff;
                    $res['bill_id']     = $result1[0]['Id'];
                }else{
                    $res['table_tot'] = '';
                    $res['table_stime'] = 0;
                    $res['bill_id']     = 0;
                }
            }else{
                $res['bill_id']     = 0;
            }
            $data[] = $res;
        }
        return $data;
    }    
}


if (!function_exists('slugify')) { //checked
    setlocale(LC_ALL, 'en_US.UTF8');
    function slugify($text){
        $text = preg_replace('/[^A-Za-z0-9\s\-]/', '', $text); // Removes special chars.
        $text = preg_replace('~[^\\pL\d]+~u', '-', $text);
        // trim
        $text = trim($text, '-');
        // transliterate
        //$text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);
        // lowercase
        $text = strtolower($text);
        // remove unwanted characters
        $text = preg_replace('~[^-\w]+~', '', $text);
        if (empty($text)){
            return 'n-a';
        }else{
            $text = preg_replace('/-+/', '-', $text); // Replaces multiple hyphens with single one.
            return $text;
        }
    }
}



if (!function_exists('getTableOrderData')){
    function getTableOrderData($bill_id = 0)
    {
        $ci=& get_instance();
        $ci->load->database();
        $data = array();
        
        $ci->db->select('*');
        $ci->db->from('tables');
        $ci->db->where('is_deleted',0);
        if($restaurant_id > 0 ) $ci->db->where('restaurant_id',$restaurant_id);
        if($table_id > 0 ) $ci->db->where('table_id',$table_id);
        $query  = $ci->db->get();
        $result = $query->result_array();
        foreach($result as $res){
            if($res['ord_status'] != ''){
                $ci->db->select('*');
                $ci->db->from('bill_head');
                $ci->db->where('table_id',$res['table_id']);
                $ci->db->where('is_active',1);
                $ci->db->order_by('Id','DESC');
                $ci->db->limit(1);
                $query1  = $ci->db->get();
                $result1 = $query1->result_array();
                if(count($result1) > 0 ){
                    $diff = strtotime(date('Y-m-d H:i:s')) - strtotime($result1[0]['created_date'])  ;
                    $res['table_tot']   = $result1[0]['total'];
                    $res['table_stime'] = $diff;
                    $res['bill_id']     = $result1[0]['Id'];
                }else{
                    $res['table_tot'] = '';
                    $res['table_stime'] = 0;
                    $res['bill_id']     = 0;
                }
            }else{
                $res['bill_id']     = 0;
            }
            $data[] = $res;
        }
        return $data;
    }    
}

if (!function_exists('getId')) {
    function getId($data){
        $ci = &get_instance();
        $ci->load->database();
        $ci->db->select('id');
        $ci->db->from('current_stock');
        $ci->db->where('restaurant_id', $data['restaurant_id']);
        $ci->db->where('rawmaterial_id', $data['rawmaterial_id']);
        $query = $ci->db->get();
        $rows = $query->num_rows();
        if($rows > 0){
            $result = $query->row();
            $id     = $result->id;
        }else{
            $id = 0;
        }
        return $id;        
    }
}


if (!function_exists('GetUserRoles')) {
    function GetUserRoles($groupId){
        $ci = &get_instance();
        $ci->load->database();
        // SELECT mm.* FROM master_modules mm left join groups g on find_in_set( mm.id,g.permission) WHERE g.id = 1
        $ci->db->select('mm.*');
        $ci->db->from('master_modules mm');
        $ci->db->join('groups g','find_in_set(mm.id,g.permission)<>0','left');
        $ci->db->where('g.id',$groupId);
        // $ci->db->where('mm.parent_id',0);
        $ci->db->order_by('mm.parent_id','ASC');
        $ci->db->order_by('mm.sort_id','ASC');
        // $ci->db->where('FIND_IN_SET(classname,'.$data.')');
        $query = $ci->db->get();
        $result = $query->result_array();
        return $result;       
    }
}

