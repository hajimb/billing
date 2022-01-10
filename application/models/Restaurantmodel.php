<?php

class Restaurantmodel extends CI_Model
{
    public function __construct()
    {
        $this->restaurant_table = 'restaurant';
         $this->load->database();
    }

    public function addRestaurantRequest($data)
    {
        $data["created_date"] = date('Y-m-d H:i:s');
        //if($this->session->userdata('user_session')){

        //$user_session = $this->session->userdata('user_session');
        //$data["userid"] = $user_session['user_id'];
        //}
        
        $this->db->insert($this->restaurant_table,$data);

        return 1;

    }    
    
    function getrestaurantsdata()
    {
        $id = 0;
        $query = $this->db->get_where($this->restaurant_table, array('is_deleted' => $id));
        $result = $query->result_array();
        return $result;
    }
    public function getrestaurant($id)
	{
		$query = $this->db->get_where($this->restaurant_table,array('restaurant_id'=>$id));
		$result['data'] = $query->row_array();		
		return $result;
	}

    public function updaterecord($data)
    {   
        $this->db->where('restaurant_id', $data['restaurant_id']);
        $this->db->update($this->restaurant_table, $data);     
        return 1;
    }

    function delete_restaurant($id)
    {
        $data = array(
            'is_deleted ' => 1,
        );
        $this->db->where('restaurant_id', $id);
        $this->db->update($this->restaurant_table, $data);
        return 1;
    }
}