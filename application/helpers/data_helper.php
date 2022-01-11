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
    function is_exists($where, $table_name, $id = 0,$fidlname = "id")
    {
        $ci = &get_instance();
        $ci->load->database();
        $ci->db->select($fidlname);
        $ci->db->from($table_name);
        $ci->db->where($where);
        if ($id > 0) {
            $ci->db->where($fidlname.' !=', $id);
        }
        $queryone    = $ci->db->get();
        $rows       = $queryone->num_rows();
        return $rows;
    }
}