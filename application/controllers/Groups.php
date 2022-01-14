<?php 

class Groups extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->data['session_data'] = @$this->session->userdata('user_session');
		$this->data['user_permission'] = @$this->session->userdata('user_permission');
        $this->restaurant_id = $this->data['session_data']['restaurant_id'];
		$this->load->model('model_groups');
	}

	public function index()
	{
		
		$this->data['data'] = getGroupData(0);
		$this->data['js']     = array(
			"assets/plugins/datatables/jquery.dataTables.min.js",
			"assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js",
			"assets/plugins/datatables-responsive/js/dataTables.responsive.min.js",
			"assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js",
		);
		$this->data['css']     = array(
			"assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css",
			"assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css",
			"assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css",
		);
		$this->data["pagename"]  = "group-list";
		$this->data['page_title'] = "Manage Groups";
		$this->data['breadcrumb'][0] = "Groups";
		// $this->data['breadcrumb'][1] = "";
		$this->load->view('common/header',$this->data);
        $this->load->view('common/sidebar',$this->data);
        $this->load->view('common/breadcrumb',$this->data);
		$this->load->view('groups/index');
		$this->load->view('common/footer');
		//$this->render_template('groups/index', $this->data);
	}	

	public function edit()
	{
		$id = $this->input->post('main_id');
		if($id) {
			$this->create($id, 'Edit');
		}else{
			redirect('groups');
		}
	}

	public function create($id = 0,$todo = "Add")
	{

		$data  = array('group_name'=>'', 'permission' => '');
		if($id > 0){
			$group_data = getGroupData($id);
			if(isset($group_data[0])) $data = $group_data[0];
		}
		$this->data['modules'] = getModules();
		$this->data['data'] = $data;
		$this->data["pagename"]  = "group-edit";
		$this->data['page_title'] = "Manage Groups";
		$this->data['breadcrumb'][0] = "Groups";
		$this->data['breadcrumb'][1] = $todo;
		$this->data["main_id"]  = $id;
		$this->data["todo"]  = $todo;
		$this->load->view('common/header',$this->data);
		$this->load->view('common/sidebar',$this->data);
		$this->load->view('common/breadcrumb',$this->data);
		$this->load->view('groups/edit');
		$this->load->view('common/footer');
	}

}