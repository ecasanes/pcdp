<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends MY_Controller {

	public function index()
	{
		$this->admin_panel();
	}


	public function create_csv(){

		$this->load->helper('csv');
		$this->load->model('Account');

		$account = new Account();

		$admin_data_results = $account->get_accounts();

		$new_admin_data = array();

		$new_admin_data[] = array(
				'ID',
				'USERNAME',
				'FIRSTNAME',
				//'MIDDLENAME',
				'LASTNAME',
				'ROLE',
				'NO OF ENCODED'
			);


		foreach($admin_data_results as $admin_info){

			$no_of_encoded = $account->get_no_of_encoded_records($admin_info['ID']);

			$new_admin_data[] = array(
				$admin_info['ID'],
				$admin_info['USERNAME'],
				$admin_info['FIRSTNAME'],
				//$admin_info['MIDDLENAME'],
				$admin_info['LASTNAME'],
				$admin_info['ROLE'],
				$no_of_encoded
			);
		}

		
		array_to_csv($new_admin_data, 'admin_data_'.date('M_d_y').'.csv');
	}

	public function point_system(){

		$this->load->model('Record');
		$record = new Record();

		$data = array(
			'title' => 'Point System Settings',
          	'main_group' => '',
          	'base_url' => base_url('admin'),
          	'description' => ''
        );

        $points = $record->get_point_system();

        $model_data = array(
        		'point_system_array' => $points,
        		'sql' => '',
        		'success' => false
        	);


		$id = $this->input->post('id');
		$male_point = $this->input->post('male_point');
		$female_point = $this->input->post('female_point');
		$single_point = $this->input->post('single_point');
		$married_point = $this->input->post('married_point');
		$widow_point = $this->input->post('widow_point');
		$household_yes_point = $this->input->post('household_yes_point');
		$household_no_point = $this->input->post('household_no_point');
		$skill_with_point = $this->input->post('skill_with_point');
		$skill_none_point = $this->input->post('skill_none_point');
		$employed_point = $this->input->post('employed_point');
		$self_employed_point = $this->input->post('self_employed_point');
		$unemployed_point = $this->input->post('unemployed_point');
		$property_not_available_point = $this->input->post('property_not_available_point');
		$property_flooded_point = $this->input->post('property_flooded_point');
		$property_partially_damaged_point = $this->input->post('property_partially_damaged_point');
		$property_totally_damaged_point = $this->input->post('property_totally_damaged_point');
		$death_point = $this->input->post('death_point');
		$injury_point = $this->input->post('injury_point');
		$missing_point = $this->input->post('missing_point');
		$sick_point = $this->input->post('sick_point');
		$disable_point = $this->input->post('disable_point');
		$person_none_point = $this->input->post('person_none_point');
		$no_of_dependents_points = $this->input->post('no_of_dependents_points');
		$no_of_dependents_min = $this->input->post('no_of_dependents_min');
		$no_of_dependents_max = $this->input->post('no_of_dependents_max');
		$death_min = $this->input->post('death_min');
		$death_max = $this->input->post('death_max');
		$injury_min = $this->input->post('injury_min');
		$injury_max = $this->input->post('injury_max');
		$missing_min = $this->input->post('missing_min');
		$missing_max = $this->input->post('missing_max');
		$sick_min = $this->input->post('sick_min');
		$sick_max = $this->input->post('sick_max');
		$disable_min = $this->input->post('disable_min');
		$disable_max = $this->input->post('disable_max');
		$person_none_min = $this->input->post('person_none_min');
		$person_none_max = $this->input->post('person_none_max');

		$working_husband = $this->input->post('working_husband');

		if($id){
			$query_boolean = $record->update_point_system($id, $male_point, $female_point, $single_point, $married_point, $widow_point, $household_yes_point, $household_no_point, $skill_with_point, $skill_none_point, $employed_point, $self_employed_point, $unemployed_point, $property_totally_damaged_point, $property_partially_damaged_point, $property_flooded_point, $property_not_available_point, $death_point, $death_min, $death_max, $injury_point, $injury_min, $injury_max, $missing_point, $missing_min, $missing_max, $sick_point, $sick_min, $sick_max, $disable_point, $disable_min, $disable_max, $person_none_point, $person_none_min, $person_none_max, $no_of_dependents_points, $no_of_dependents_min, $no_of_dependents_max, $working_husband);

			$model_data['sql'] = $query_boolean;

			$points = $record->get_point_system();

			$model_data['point_system_array'] = $points;
			$model_data['success'] = true;
		}

		

		$this->load->view('bootstrap/header', $data);
		$this->load->view('point-system-settings', $model_data);
		$this->load->view('bootstrap/footer');

	}


	public function edit($id, $success_flag = ''){
		$this->load->model('Account');

		$data = array(
			'title' => 'Edit Admin Information',
          	'main_group' => '',
          	'base_url' => base_url('admin'),
          	'description' => '',
          	'success_edit' => false,
          	'success_add' => false
        );

        if($success_flag == 'success'){
			$data['success_edit'] = true;
		}

        $model_data = array();

        $account = new Account();
        $account->load($id);

		$model_data['account'] = $account;

		$this->load->view('bootstrap/header', $data);
		$this->load->view('submit-admin', $model_data);
		$this->load->view('bootstrap/footer');
	}

	public function edit_account(){

		$id = $this->session->userdata('ilo_session_id');

		$this->edit($id);
	}


	public function check_duplicate_admin($value, $action = 'add'){

		$this->load->model('Account');
		$account = new Account();

		$column_name = 'account';
		$id = $this->input->post('id');

		if($action == 'add'){
			$result = $this->check_duplicate($column_name, $value);
		}else if($action == 'edit'){
			$result = $account->verify_duplicate($id, $value);
		}
		

		if($result){
			$this->form_validation->set_message('check_duplicate_admin', $value . ' is already registered. Please input another one.');
			return false;
		}else{
			return true;
		}
	}


	public function save($action = 'add', $id = false){

		$this->load->library('form_validation');
		$this->load->model('Account');
		$account = new Account();
		
		
		if($action == 'add'){
			$this->form_validation->set_rules('username', 'Username', 'required|trim|xss_clean|callback_check_duplicate_admin[add]');
			$this->form_validation->set_rules('password', 'Password', 'required|md5|trim');
			$this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required|md5|trim');
			$this->form_validation->set_rules('firstname', 'First Name', 'required|trim');
			$this->form_validation->set_rules('lastname', 'Last Name', 'required|trim');
		}else{
			
			$this->form_validation->set_rules('username', 'Username', 'trim|xss_clean|callback_check_duplicate_admin[edit]');
			$this->form_validation->set_rules('password', 'Password', 'md5|trim');
			$this->form_validation->set_rules('confirm_password', 'Confirm Password', 'md5|trim');
			$this->form_validation->set_rules('firstname', 'First Name', 'trim');
			$this->form_validation->set_rules('lastname', 'Last Name', 'trim');
		}
		
		

		if($this->form_validation->run())
		{

			$id = $this->input->post('id');
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			$firstname = $this->input->post('firstname');
			$lastname = $this->input->post('lastname');
			$role = $this->input->post('role');

			
			//$id = $this->account->verify_duplicate($id, $username);
			//$role = $this->account->get_current_role($id);

			
			if($action == 'add'){
				$account->add($username, $password, $firstname, $lastname, $role);
				redirect('admin/add/success');
			}else{
				$account->update($id, $username, $password, $firstname, $lastname, $role);
				redirect('admin/edit/'.$id.'/success');
			}
			
		}else{
			if($action == 'add'){
				$this->add();
			}else{
				$this->edit($id);
			}
			
		}
		
		

	}


	public function update(){

		
	}

	public function delete($id){

	}


	public function view_all_admin(){
		$this->load->library('table');
		$this->load->library("pagination");
		$this->load->model('Account');

		$data = array(
			'title' => 'View All Admin',
          	'main_group' => '',
          	'base_url' => base_url('admin'),
          	'description' => ''
        );


		$config = array();
        $config["base_url"] = base_url('admin/view-all-admin');
        $config["total_rows"] = $this->Account->row_count();
        $config["per_page"] = 10;
        $config["uri_segment"] = 3;
        $config['first_link'] = 'First';
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['last_link'] = 'Last';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['next_link'] = '<i class="icon-double-angle-right"></i>';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['prev_link'] = '<i class="icon-double-angle-left"></i>';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
 
        $this->pagination->initialize($config);
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

        $query_accounts = array();
		$accounts = $this->Account->get($config["per_page"], $page);
		foreach($accounts as $account){
			$query_accounts[] = array(
				'id' => $account->id,
				'username' => $account->account,
				'firstname' => $account->name,
				'lastname' => $account->lastname,
				'status' => $account->status,
				'role' => $account->role,
				'no_of_encoded' => $this->Account->get_no_of_encoded_records($account->id)
			);
		}

		$model_data = array(
        	'accounts' => $query_accounts
        );

        $model_data["results"] = $accounts;
        $model_data["links"] = $this->pagination->create_links();
        
        //$config['anchor_class'] = '';

		
		$this->load->view('bootstrap/header', $data);
		$this->load->view('view-all-admin', $model_data);
		$this->load->view('bootstrap/footer');
	}

	public function add($success_flag = ''){

		

		$data = array(
			'title' => 'Add New Admin',
          	'main_group' => '',
          	'base_url' => base_url('admin'),
          	'description' => '',
          	'account' => '',
          	'success_add' => false,
          	'success_edit' => false
        );

        if($success_flag == 'success'){
			$data['success_add'] = true;
		}

		$this->load->view('bootstrap/header', $data);
		$this->load->view('submit-admin');
		$this->load->view('bootstrap/footer');
	}

	public function admin_panel(){
		$data = array(
			'title' => 'Admin Panel',
          	'main_group' => '',
          	'base_url' => base_url('admin'),
          	'description' => ''
        );
		$this->load->view('bootstrap/header', $data);
		$this->load->view('admin-panel');
		$this->load->view('bootstrap/footer');
	}

	

	

	public function inbox(){
		$data = array(
			'title' => 'Request Inbox',
          	'main_group' => '',
          	'base_url' => base_url('admin'),
          	'description' => ''
        );
		$this->load->view('bootstrap/header', $data);
		$this->load->view('bootstrap/footer');
	}


	

	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */