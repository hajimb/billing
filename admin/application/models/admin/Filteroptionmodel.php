<?php

class Filteroptionmodel extends CI_Model
{
    public function __construct()
    {
        $this->option_table = 'filteroption';
         $this->load->database();
    }

    function getfilterdata()
    {
        $query = $this->db->query("SELECT * FROM $this->option_table ");
        $result = $query->result_array();
        return $result;
    }
}