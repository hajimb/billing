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
		$ci->db->order_by('name', 'ASC');
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

/* Get User Groups of Particular User */
if (!function_exists('getOrders')) {
    function getOrders($restaurant_id = 0, $type = '')
    {
        $result = array();
        $ci = &get_instance();
        $ci->load->database();
        $query = $this->db->query("
        SELECT h.*, t.tablename  FROM bill_head h, tables t  where t.table_id = h.table_id and (h.status = 'Done' OR h.status = 'BillPaid' OR h.status = 'BillRaised')");
        

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