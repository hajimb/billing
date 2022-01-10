<?php

class Logmodel extends CI_Model
{
    public function __construct()
    {
        $this->log_table = 'log';
         $this->load->database();
    }

    function getlogdata()
    {
        $query = $this->db->query("SELECT * FROM $this->log_table ");
        $result = $query->result_array();
        return $result;
    }
}