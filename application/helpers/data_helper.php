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
    function is_exists($where, $table_name, $id = 0,$fldname = "id")
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
        $query = $ci->db->query("SELECT * FROM rawmaterial WHERE is_deleted = 0 AND restaurant_id=".$restaurant_id);
        $query = $query->result_array();
        if( is_array( $query ) && count( $query ) > 0 ){
            $return[''] = '--Select Rawmaterial--';
            foreach($query as $row){
                $return[$row['rawmaterial_id']] = $row['rawmaterial'];
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