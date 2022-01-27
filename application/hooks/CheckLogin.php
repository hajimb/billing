<?php

class CheckLogin
{
    public function initialize()
    {
        $ci = &get_instance();
        $class_name         = $ci->router->fetch_class();
		// echo "ClassName:[$class_name]";
        $session_data       = $ci->session->userdata('user_session');
        if(strtolower($class_name) != "dashboard" && strtolower($class_name) != 'login' && strtolower($class_name) != 'order' && strtolower($class_name) != 'tableorder'&& strtolower($class_name) != 'receipt' ){
            $group_data         = getUserGroupByUserId($session_data['user_id']);
            $user_permission    = explode(',',$group_data['permission']);
            $ci->session->set_userdata('user_permission', $user_permission);
            if (!isset($session_data) || empty($session_data)) {
                redirect('login');
            }else{
                if(!in_array(strtolower($class_name), $user_permission)){
                    redirect('dashboard');
                }
            }
        }else{
            if ((!isset($session_data) || empty($session_data)) && strtolower($class_name) != 'login') {
                redirect('login');
            }
        }
        $ci->db->query("SET sql_mode=(SELECT REPLACE(@@sql_mode, 'ONLY_FULL_GROUP_BY', ''));");
    }
}