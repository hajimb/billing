<?php

class CheckLogin
{
    public function initialize()
    {
        $ci = &get_instance();
        $class_name         = $ci->router->fetch_class();
		// echo "ClassName:[$class_name]";
        // exit;
        $session_data       = $ci->session->userdata('user_session');
        $user_permission    = $ci->session->userdata('user_permission');
        // print_r($user_permission);
        if(strtolower($class_name) != "dashboard" && strtolower($class_name) != 'login' ){
            if (!isset($session_data) || empty($session_data)) {
                redirect('login');
            }else{
                if(!in_array($class_name, $user_permission)){
                    redirect('dashboard');
                }
            }
        }
    }
}