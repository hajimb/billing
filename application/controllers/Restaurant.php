<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Restaurant extends CI_Controller {
	public function __construct(){
        parent::__construct();
        echo 'in constructor:['. $this->config->item('test').']';
        // exit;
		//  $session_data = $this->session->userdata('user_session');
        // $this->data['session_data']     = @$this->session->userdata('user_session');
        // $this->data['user_permission']  = @$this->session->userdata('user_permission');
        // if (!isset($this->data['session_data']) || empty($this->data['session_data'])) {
        //     redirect('login');
        // }else{
        //     if(!in_array('Restaurants', $this->data['user_permission'])){
        //         redirect('dashboard');
        //     }
        // }
        $this->load->model('Restaurantmodel');
    }

	public function index() {
        // echo 'in index:['. $this->config->item('test').']';
        // exit;
        $this->data['title'] = 'Restaurant List'; 
        $this->data['restaurant'] = $this->Restaurantmodel->getrestaurantsdata();
		$this->load->view('common/header',$this->data);
        $this->load->view('common/sidebar',$this->data);
		$this->load->view('restaurant/restaurant');
		$this->load->view('common/footer');
	}

    public function add_restaurant() {
        $this->data['title'] = 'Add New Restaurant'; 
		$this->load->view('common/header',$this->data);
        $this->load->view('common/sidebar',$this->data);
		$this->load->view('restaurant/add');
		$this->load->view('common/footer');
	}

    public function add()
	{		
		$this->data["page_head"]  = "Add Restaurant";
		$this->data["page_title"] = "Add Restaurant";
		$this->data["page_view"]  = "Add Restaurant";
        $restaurantData['restaurant_name'] = $this->input->post("name");        
        $restaurantData['contact_no'] = $this->input->post("mobile");
        $restaurantData['restaurant_address'] = $this->input->post("address");
		$datareq = $this->Restaurantmodel->addRestaurantRequest($restaurantData);
        if($datareq == 1){
            $return['status'] = 1;
            $return['msg'] = 'Restaurant added successfully';
        }else{
            $return['status'] = 0;
            $return['msg'] = 'error in storing data';
        }
        echo json_encode($return);
        redirect('restaurant');
	}

    public function edit($id)
	{	
		$this->data['title'] = 'Edit Restaurant'; 
		$this->data["page_head"]  = "Edit Restaurant";
		$this->data["page_title"] = "Edit Restaurant";
		$this->data["page_view"]  = "Edit Restaurant";
		$this->data["formdata"]   = $this->Restaurantmodel->getrestaurant($id);		
		$this->load->view('common/header',$this->data);
        $this->load->view('common/sidebar',$this->data);		
		$this->load->view("restaurant/edit",$this->data);
		$this->load->view('common/footer');
	}

    public function update($id='')
	{
		$data = array(
            'restaurant_name' => $this->input->post("name"),
            'restaurant_id' => $this->input->post("id"),
            'contact_no' => $this->input->post("mobile"),
            'restaurant_address' => $this->input->post("address")            
        );
            $datareq = $this->Restaurantmodel->updaterecord($data);
            if($datareq == 1){
                $return['status'] = 1;
                $return['msg'] = 'Restaurant edit successfully';
            }else{
                $return['status'] = 0;
                $return['msg'] = 'error in storing data';
            }  
        redirect('restaurant');
		
	}

    public function restaur_delete($id)
    {        
        $this->Restaurantmodel->delete_restaurant($id);
        redirect('restaurant');
    }
    
}
