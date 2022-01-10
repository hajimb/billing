<?php 

class Groups extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();

		$this->data['session_data'] = @$this->session->userdata('user_session');
		$this->data['user_permission'] = @$this->session->userdata('user_permission');
		// $session_data = $this->session->userdata('user_session');
        //  if (!isset($session_data) || empty($session_data)) {
        //      redirect('login');
        //  }else{

        //     // $group_data = array();
		// 	// $user_id = $session_data['user_id'];
		// 	// $this->load->model('model_groups');
		// 	// $group_data = $this->model_groups->getUserGroupByUserId($user_id);
		// 	// $this->data['user_permission'] = unserialize($group_data['permission']);
		// 	// $this->permission = unserialize($group_data['permission']);
        // }
		$this->data['page_title'] = 'Groups';
		$this->load->model('model_groups');
	}

	/* 
	* It redirects to the manage group page
	* As well as the group data is also been passed to display on the view page
	*/
	public function index()
	{

		$groups_data = $this->model_groups->getGroupData();
		$this->data['groups_data'] = $groups_data;
		$this->load->view('common/header',$this->data);
        $this->load->view('common/sidebar',$this->data);
		$this->load->view('groups/index');
		$this->load->view('common/footer');
		//$this->render_template('groups/index', $this->data);
	}	

	/*
	* If the validation is not valid, then it redirects to the create page.
	* If the validation is for each input field is valid then it inserts the data into the database 
	* and it stores the operation message into the session flashdata and display on the manage group page
	*/
	public function create()
	{

		// if(!in_array('UsersGroups', $this->permission)) {
		// 	redirect('dashboard', 'refresh');
		// }

		$this->form_validation->set_rules('group_name', 'Group name', 'required');

        if ($this->form_validation->run() == TRUE) {
            // true case
            $permission = serialize($this->input->post('permission'));
            
        	$data = array(
        		'group_name' => $this->input->post('group_name'),
        		'permission' => $permission
        	);

        	$create = $this->model_groups->create($data);
        	if($create == true) {
        		$this->session->set_flashdata('success', 'Successfully created');
        		redirect('groups/', 'refresh');
        	}
        	else {
        		$this->session->set_flashdata('errors', 'Error occurred!!');
        		redirect('groups/create', 'refresh');
        	}
        }
        else {
            // false case
			$this->load->view('common/header',$this->data);
			$this->load->view('common/sidebar',$this->data);
			$this->load->view('groups/create');
			$this->load->view('common/footer');
        }	
	}

	/*
	* If the validation is not valid, then it redirects to the edit group page 
	* If the validation is successfully then it updates the data into the database 
	* and it stores the operation message into the session flashdata and display on the manage group page
	*/
	public function edit()
	{
		$id = $this->input->post('groupid');
		if($id) {
			$this->form_validation->set_rules('group_name', 'Group name', 'required');
			if ($this->form_validation->run() == TRUE) {
	            // true case
	            $permission = serialize($this->input->post('permission'));
	        	$data = array(
	        		'group_name' => $this->input->post('group_name'),
	        		'permission' => $permission
	        	);

	        	$update = $this->model_groups->edit($data, $id);
	        	if($update == true) {
	        		$this->session->set_flashdata('success', 'Successfully updated');
	        		redirect('groups/', 'refresh');
	        	}
	        	else {
	        		$this->session->set_flashdata('errors', 'Error occurred!!');
	        		redirect('groups/edit/'.$id, 'refresh');
	        	}
	        }
	        else {
	            // false case
	            $group_data = $this->model_groups->getGroupData($id);
	            $this->data['modules'] = $this->model_groups->getModules();
				$this->data['group_data'] = $group_data[0];
				$this->data["pagename"]  = "edit-group";
				$this->data["group_id"]  = $id;
				$this->load->view('common/header',$this->data);
			$this->load->view('common/sidebar',$this->data);
			$this->load->view('groups/edit');
			$this->load->view('common/footer');
	        }	
		}else{
			redirect('groups');
		}
	}
	
	public function update()
	{
		$id = $this->input->post('groupid');
		if($id) {
			$this->form_validation->set_rules('group_name', 'Group name', 'required');
			if ($this->form_validation->run() == TRUE) {
	            // true case
	            $permission = serialize($this->input->post('permission'));
	        	$data = array(
	        		'group_name' => $this->input->post('group_name'),
	        		'permission' => $permission
	        	);

	        	$update = $this->model_groups->edit($data, $id);
	        	if($update == true) {
	        		$this->session->set_flashdata('success', 'Successfully updated');
	        		redirect('groups/', 'refresh');
	        	}
	        	else {
	        		$this->session->set_flashdata('errors', 'Error occurred!!');
	        		redirect('groups/edit/'.$id, 'refresh');
	        	}
	        }
	        else {
	            // false case
	            $group_data = $this->model_groups->getGroupData($id);
				$this->data['group_data'] = $group_data[0];

				$this->load->view('common/header',$this->data);
			$this->load->view('common/sidebar',$this->data);
			$this->load->view('groups/edit');
			$this->load->view('common/footer');
	        }	
		}else{
			redirect('groups');
		}
	}

	/*
	* It removes the removes information from the database 
	* and it stores the operation message into the session flashdata and display on the manage group page
	*/
	public function delete($id)
	{

		// if(!in_array('deleteGroup', $this->permission)) {
		// 	redirect('dashboard', 'refresh');
		// }
		// if(!in_array('UsersGroups', $this->permission)) {
		// 	redirect('dashboard', 'refresh');
		// }
		if($id) {
			if($this->input->post('confirm')) {

				$check = $this->model_groups->existInUserGroup($id);
				if($check == true) {
					$this->session->set_flashdata('error', 'Group exists in the users');
	        		redirect('groups/', 'refresh');
				}
				else {
					$delete = $this->model_groups->delete($id);
					if($delete == true) {
		        		$this->session->set_flashdata('success', 'Successfully removed');
		        		redirect('groups/', 'refresh');
		        	}
		        	else {
		        		$this->session->set_flashdata('error', 'Error occurred!!');
		        		redirect('groups/delete/'.$id, 'refresh');
		        	}
				}	
			}	
			else {
				$this->data['id'] = $id;
				$this->load->view('common/header',$this->data);
			$this->load->view('common/sidebar',$this->data);
			$this->load->view('groups/delete');
			$this->load->view('common/footer');
			}	
		}
	}


}