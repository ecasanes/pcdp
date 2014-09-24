<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Records extends MY_Controller {

	public $publication_id;
    public $publication_name;
	public $age_bracket_array = array();
	
	public function __construct()
	    {
	        parent::__construct(); 
			
	    }

	public function index(){
		
		$this->view_all();	
	}


	public function create_csv($limit = 10, $offset = 0, $page = ''){

		$this->load->helper('csv');
		$this->load->model('Record');

		$record_model = new Record();

		if($page == 'search'){

			$search_and_rank_session_array = $this->session->userdata('search_and_rank_session');

			$search_array = $record_model->search_and_rank($search_and_rank_session_array);
			$records = $record_model->rank_results($search_array);

			$csv_filename = 'search_data_';

		}else if($page == 'statistics'){

			$statistics_session_array = $this->session->userdata('statistics_session');

			$get_region = $statistics_session_array['region'];
			$get_province = $statistics_session_array['region'];
			$get_city = $statistics_session_array['province'];
			$get_barangay = $statistics_session_array['barangay'];
			$age_bracket_array = $statistics_session_array['age_bracket_array'];

			$statistics_data_array = $record_model->get_statistics_data($get_region, $get_province, $get_city, $get_barangay, $age_bracket_array);

			if($get_region == ''){
				$data_region = 'all';
			}

			if($get_province == ''){
				$data_province = 'all';
			}

			if($get_city == ''){
				$data_city = 'all';
			}

			if($get_barangay == ''){
				$data_barangay = 'all';
			}

			$csv_filename = 'statistics_data_';

		}else{
			$records = $record_model->get($limit, $offset);
			$csv_filename = 'record_data_';
		}


		$new_record_data = array();



		if($page == 'statistics'){

			$new_record_data[] = array(

					'AGE',
					'GENDER',
					'STATUS',
					'OCCUPATION',
					'DAMAGE TO PROPERTY',
					'TRAGEDY / DAMAGE TO LIFE'

				);


			$new_record_data[] = array(

					'',
					'M',
					'F',
					'SINGLE',
					'MARRIED',
					'WIDOW',
					'EMPLOYED',
					'SELF EMPLOYED',
					'UNEMPLOYED',
					'TOTALLY',
					'PARTIALLY',
					'FLOODED',
					'N/A',
					'DEATHS',
					'INJURIES',
					'MISSING',
					'SICK',
					'DISABLE',
					'NONE'

				);


			foreach($statistics_data_array as $record){

				$new_record_data[] = array(

					$record['row_age_range'],
					$record['row_gender_male'],
					$record['row_gender_female'],
					$record['row_status_single'],
					$record['row_status_married'],
					$record['row_status_widow'],
					$record['row_occupation_employed'],
					$record['row_occupation_self_employed'],
					$record['row_occupation_unemployed'],
					$record['row_property_totally_damaged'],
					$record['row_property_partially_damaged'],
					$record['row_property_flooded'],
					$record['row_property_not_available'],
					$record['row_tragedy_death'],
					$record['row_tragedy_injury'],
					$record['row_tragedy_missing'],
					$record['row_tragedy_sick'],
					$record['row_tragedy_disable'],
					$record['row_tragedy_none']

				);
			}

			$new_record_data[] = array('');
			$new_record_data[] = array('Region:', $data_region);
			$new_record_data[] = array('Province:', $data_province);
			$new_record_data[] = array('City:', $data_city);
			$new_record_data[] = array('Barangay:', $data_barangay);


		}else if($page == 'search'){

			$new_record_data[] = array(

					'ID',
					'FIRSTNAME',
					'MIDDLENAME',
					'LASTNAME',
					'AGE',
					'BIRTHDATE',
					'GENDER',
					'CIVIL STATUS',
					'EMPLOYMENT STATUS',
					'NO OF DEPENDENTS',
					'CELLPHONE #',
					'MONTHLY INCOME',
					'PROPERTY DAMAGE',
					'NO OF DEATHS',
					'NO OF INJURED',
					'NO OF MISSING',
					'NO OF SICK',
					'NO OF DISABLED',
					'NO OF NOT AFFECTED',
					'WORKING HUSBAND',
					'HEAD OF FAMILY',
					'SKILLS',
					'ADDRESS BEFORE CALAMITY',
					'ADDRESS AFTER CALAMITY',
					'EMPLOYMENT AWARD STATUS'

				);


			foreach($records as $record){

				$skills = $record_model->get_skills($record['id'], 'string');

				$before_address = $record['before_region_name'] .', '. $record['before_province_name'] .', '. $record['before_city_name'] .', '. $record['before_barangay_name'] .', '. $record['before_street'];

				$current_address = $record['current_region_name'] .', '. $record['current_province_name'] .', '. $record['current_city_name'] .', '. $record['current_barangay_name'] .', '. $record['current_street'];

				$before_address = rtrim($before_address,",");
				$before_address = ltrim($before_address,",");

				$current_address = rtrim($current_address,",");
				$current_address = ltrim($current_address,",");

				$new_record_data[] = array(

					$record['id'],
					$record['f_name'],
					$record['m_name'],
					$record['l_name'],
					$record['age'],
					$record['birthdate'],
					$record['gender'],
					$record['status'],
					$record['occupation'],
					$record['no_of_dpndts'],
					$record['cel_no'],
					$record['money_income'],
					$record['property'],
					$record['death'],
					$record['injury'],
					$record['missing'],
					$record['sick'],
					$record['disable'],
					$record['none'],
					$record['working_husband'],
					$record['household'],

					$skills,
					
					$before_address,
					$current_address,

					$record['employment_award_status']
				);
			}

		}else{

			$new_record_data[] = array(

					'ID',
					'FIRSTNAME',
					'MIDDLENAME',
					'LASTNAME',
					'AGE',
					'BIRTHDATE',
					'GENDER',
					'CIVIL STATUS',
					'EMPLOYMENT STATUS',
					'NO OF DEPENDENTS',
					'CELLPHONE #',
					'MONTHLY INCOME',
					'PROPERTY DAMAGE',
					'NO OF DEATHS',
					'NO OF INJURED',
					'NO OF MISSING',
					'NO OF SICK',
					'NO OF DISABLED',
					'NO OF NOT AFFECTED',
					'WORKING HUSBAND',
					'HEAD OF FAMILY',
					'SKILLS',
					'ADDRESS BEFORE CALAMITY',
					'ADDRESS AFTER CALAMITY',
					'EMPLOYMENT AWARD STATUS'

				);


			foreach($records as $record){

				$skills = $record_model->get_skills($record->id, 'string');

				$before_address = $record->before_region_name .', '. $record->before_province_name .', '. $record->before_city_name .', '. $record->before_barangay_name .', '. $record->before_street;

				$current_address = $record->current_region_name .', '. $record->current_province_name .', '. $record->current_city_name .', '. $record->current_barangay_name .', '. $record->current_street;

				$before_address = rtrim($before_address,",");
				$before_address = ltrim($before_address,",");

				$current_address = rtrim($current_address,",");
				$current_address = ltrim($current_address,",");

				$new_record_data[] = array(

					$record->id,
					$record->f_name,
					$record->m_name,
					$record->l_name,
					$record->age,
					$record->birthdate,
					$record->gender,
					$record->status,
					$record->occupation,
					$record->no_of_dpndts,
					$record->cel_no,
					$record->money_income,
					$record->property,
					$record->death,
					$record->injury,
					$record->missing,
					$record->sick,
					$record->disable,
					$record->none,
					$record->working_husband,
					$record->household,

					$skills,
					
					$before_address,
					$current_address,

					$record->employment_award_status
				);
			}

		}

		
		array_to_csv($new_record_data, $csv_filename.date('M_d_y').'.csv');
	}


	public function view_all(){
		$this->load->library('table');
		$this->load->library("pagination");
		$this->load->model('Record');

		$data = array(
			'title' => 'View All Records',
          	'main_group' => '',
          	'description' => ''
        );


		$config = array();
        $config["base_url"] = base_url('records/view-all');
        $config["total_rows"] = $this->Record->row_count();
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

        $query_records = array();
		$records = $this->Record->get($config["per_page"], $page);
		foreach($records as $record){
			$skills = $this->Record->get_skills($record->id, 'string');
			$query_records[] = array(
				'id' => $record->id,
				'firstname' => $record->f_name,
				'middlename' => $record->m_name,
				'lastname' => $record->l_name,
				'age' => $record->age,
				'gender' => $record->gender,
				'no_of_dependents' => $record->no_of_dpndts,
				'cel_no' => $record->cel_no,
				'current_city' => $record->current_address,
				'civil_status' => $record->status,
				'employment' => $record->occupation,
				'income' => $record->money_income,
				'property_damage' => $record->property,
				'admin' => $record->admin,
				'points' => $record->points,
				'death' => $record->death,
				'injury' => $record->injury,
				'missing' => $record->missing,
				'sick' => $record->sick,
				'disable' => $record->disable,
				'none' => $record->none,
				'date_entry' => $record->date_entry,
				'comment' => $record->comment,
				'head_of_family' => $record->household,
				'employment_award_status' => $record->employment_award_status,
				'birthdate' => $record->birthdate,
				'working_husband' => $record->working_husband,
				'name_of_enumerator' => $record->name_of_enumerator,
				'current_region_code' => $record->current_region,
				'current_province_code' => $record->current_province,
				'current_city_code' => $record->current_city,
				'current_barangay_code' => $record->current_barangay,
				'current_street' => $record->current_street,
				'before_region_code' => $record->before_region,
				'before_province_code' => $record->before_province,
				'before_city_code' => $record->before_city,
				'before_barangay_code' => $record->before_barangay,
				'before_street' => $record->before_street,
				'current_region_name' => $record->current_region_name,
				'current_province_name' => $record->current_province_name,
				'current_city_name' => $record->current_city_name,
				'current_barangay_name' => $record->current_barangay_name,
				'before_region_name' => $record->before_region_name,
				'before_province_name' => $record->before_province_name,
				'before_city_name' => $record->before_city_name,
				'before_barangay_name' => $record->before_barangay_name,
				'skills' => $skills
			);
		}

		//$markup_delete = $this->has_permission(true, 'records/delete');

		$model_data = array(
        	'records' => $query_records,
        	'limit' => $config["per_page"],
        	'offset' => $page 
        	//'markup_delete' => $markup_delete
        );

        $model_data["results"] = $records;
        $model_data["links"] = $this->pagination->create_links();
        
        //$config['anchor_class'] = '';

		
		$this->load->view('bootstrap/header', $data);
		$this->load->view('records', $model_data);
		$this->load->view('bootstrap/footer');
	}

	public function statistics(){
	
		$regions_select = $this->get_regions_select();
		//$provinces_select = $this->get_current_provinces_select(false,false,'','all');
		
		$data = array(
			'title' => 'Statistics',
          	'main_group' => '',
          	'description' => '',
        );

        $model_data = array(
			'regions_select' => $regions_select,
			//'provinces_select' => $provinces_select
		);
		
		$this->load->view('bootstrap/header', $data);
		$this->load->view('statistics', $model_data);
		$this->load->view('bootstrap/footer');
	}

	public function statistics_ajax(){
		$this->load->model('Record');
		
		$region = $this->input->post('region');
		$province = $this->input->post('province');
		$city = $this->input->post('city');
		$barangay = $this->input->post('barangay');
		
		$statistics_data = array();
		
		$age_bracket_array[0] = array(66,75);
		$age_bracket_array[1] = array(56,65);
		$age_bracket_array[2] = array(46,55);
		$age_bracket_array[3] = array(36,45);
		$age_bracket_array[4] = array(26,35);
		$age_bracket_array[5] = array(15,25);
		

		$record = new Record();
		$statistics_data_array = $record->get_statistics_data($region, $province, $city, $barangay, $age_bracket_array);
		
		$data = array(
			'title' => 'Statistics',
          	'main_group' => '',
          	'description' => ''
        );
		
		$statistics_data = array(
			'statistics_data_array' => $statistics_data_array,
			'ajax_req' => TRUE
		);
		
		//echo 'test';
		$this->load->view('ajax_statistics', $statistics_data);
	}
	
	public function update_award_status(){
	
		$this->load->model('Record');
		$record = new Record();
	
		$id = $this->input->post('id');
		$status = $this->input->post('status');
		
		$record->update_award_status($id, $status);	
		
		//echo 'success';	
	}
	
	public function search_and_rank(){
		

		$regions_select = $this->get_regions_select(true);
	
		$data = array(
			'title' => 'Search and Rank',
          	'main_group' => '',
          	'description' => ''
        );
		
		$model_data = array(
			'regions_select' => $regions_select
		);
		
		
		
		$this->load->view('bootstrap/header', $data);
		$this->load->view('search-and-rank', $model_data);
		$this->load->view('bootstrap/footer');
	}
	
	
	public function search_and_rank_results(){
		
		$this->load->library('table');
		$this->load->library("pagination");
		$this->load->model('Record');
		
		$data = array(
			'title' => 'Search and Rank Results',
          	'main_group' => '',
          	'description' => ''
        );
		
		$model_data = array();
		
		
		$search_by = $this->input->post('search_by');
		$key = $this->input->post('key');
		$age_from = $this->input->post('age_from');
		$age_to = $this->input->post('age_to');
		$gender = $this->input->post('gender');
		$status = $this->input->post('status');
		$occupation = $this->input->post('occupation');
		$property = $this->input->post('property');
		$household = $this->input->post('household');
		$current_region_select = $this->input->post('region');
		$current_province_select = $this->input->post('province');
		$current_city_select = $this->input->post('city');
		$current_barangay_select = $this->input->post('barangay');
		$limit = $this->input->post('limit');
		$award_status = $this->input->post('award_status');
		$disability = $this->input->post('disability');
		$skill = $this->input->post('skill');
		
		if($search_by){
			$this->session->unset_userdata('search_and_rank_session');
			$session_data = array(
				'search_by' => $search_by,
				'key' => $key,
				'age_from' => $age_from,
				'age_to' => $age_to,
				'gender' => $gender,
				'status' => $status,
				'occupation' => $occupation,
				'property' => $property,
				'household' => $household,
				'current_region' => $current_region_select,
				'current_province' => $current_province_select,
				'current_city' => $current_city_select,
				'current_barangay' => $current_barangay_select,
				'limit' => $limit,
				'award_status' => $award_status,
				'disability' => $disability,
				'skill' => $skill
			);
			$this->session->set_userdata(array('search_and_rank_session' => $session_data));
			$search_row_count = $this->Record->search_and_rank_row_count($session_data);
		}else{
			$search_and_rank_session_array = $this->session->userdata('search_and_rank_session');
			$search_row_count = $this->Record->search_and_rank_row_count($search_and_rank_session_array);
		}
		
		
		
		
	
		//if($key){
			/*
			$config = array();
			$config["base_url"] = base_url('records/search-and-rank-results');
			$config["total_rows"] = $search_row_count;
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

			*/
			
			//$records = $this->Record->get($config["per_page"], $page);
			if($search_row_count > 0){

				$query_records = array();

				if($search_by){
					//$search_array = $this->Record->search_and_rank($search_by, $key, $age_from, $age_to, $gender, $status, $occupation, $property, $household, $current_region_select, $current_province_select, $current_city_select, $current_barangay_select, $config["per_page"], $page);
					$search_array = $this->Record->search_and_rank($session_data, $limit);
					//$config["per_page"], $page
					$ranked_search_array = $this->Record->rank_results($search_array);
				}else{
					//$search_array = $this->Record->search_and_rank($search_by, $key, $age_from, $age_to, $gender, $status, $occupation, $property, $household, $current_region_select, $current_province_select, $current_city_select, $current_barangay_select, $config["per_page"], $page);
					$search_array = $this->Record->search_and_rank($search_and_rank_session_array);
					$ranked_search_array = $this->Record->rank_results($search_array);
				}
				
				//get rank
				//if($page > 1){
				//	$rank = $page+1;
				//}else{
				//	$rank=1;
				//}
				/*
				foreach($ranked_search_array as $record){

					$skills = $this->Record->get_skills($record->id, 'string');
					$query_records[] = array(
						'id' => $record->id,
						'firstname' => $record->f_name,
						'middlename' => $record->m_name,
						'lastname' => $record->l_name,
						'age' => $record->age,
						'gender' => $record->gender,
						'no_of_dependents' => $record->no_of_dpndts,
						'cel_no' => $record->cel_no,
						'current_city' => $record->current_address,
						'civil_status' => $record->status,
						'employment' => $record->occupation,
						'income' => $record->money_income,
						'property_damage' => $record->property,
						'admin' => $record->admin,
						//'points' => $record->points,
						'death' => $record->death,
						'injury' => $record->injury,
						'missing' => $record->missing,
						'sick' => $record->sick,
						'disable' => $record->disable,
						'none' => $record->none,
						'date_entry' => $record->date_entry,
						'comment' => $record->comment,
						'head_of_family' => $record->household,
						'employment_award_status' => $record->employment_award_status,
						'birthdate' => $record->birthdate,
						'working_husband' => $record->working_husband,
						'name_of_enumerator' => $record->name_of_enumerator,
						'current_region_code' => $record->current_region,
						'current_province_code' => $record->current_province,
						'current_city_code' => $record->current_city,
						'current_barangay_code' => $record->current_barangay,
						'current_street' => $record->current_street,
						'before_region_code' => $record->before_region,
						'before_province_code' => $record->before_province,
						'before_city_code' => $record->before_city,
						'before_barangay_code' => $record->before_barangay,
						'before_street' => $record->before_street,
						'current_region_name' => $record->current_region_name,
						'current_province_name' => $record->current_province_name,
						'current_city_name' => $record->current_city_name,
						'current_barangay_name' => $record->current_barangay_name,
						'before_region_name' => $record->before_region_name,
						'before_province_name' => $record->before_province_name,
						'before_city_name' => $record->before_city_name,
						'before_barangay_name' => $record->before_barangay_name,
						'skills' => $skills,
						'rank' => $rank
					);
					$rank++;
					
				}*/
			}else{
				$ranked_search_array = 0;
			}
			
			
			$model_data['records'] = $ranked_search_array;
			//$model_data["links"] = $this->pagination->create_links();
		//}
		
		$this->load->view('bootstrap/header', $data);
		$this->load->view('search-and-rank-results', $model_data);
		$this->load->view('bootstrap/footer');
	}

	public function save($action = 'add', $id = false){

		$this->load->library('form_validation');
		$this->load->model('Record');
		$record = new Record();


		$this->form_validation->set_rules('firstname', 'Firstname', 'required');
		$this->form_validation->set_rules('lastname', 'Lastname', 'required');
		$this->form_validation->set_rules('age', 'Age', 'required');
		$this->form_validation->set_rules('no_of_dependents', 'No of Dependents', 'required');
		$this->form_validation->set_rules('month', 'Month', 'required');
		$this->form_validation->set_rules('day', 'Day', 'required');
		$this->form_validation->set_rules('year', 'Year', 'required');
		$this->form_validation->set_rules('current_region', 'Current Region', 'required');
		$this->form_validation->set_rules('current_province', 'Current Province', 'required');
		$this->form_validation->set_rules('current_city', 'Current City', 'required');
		$this->form_validation->set_rules('current_barangay', 'Current Barangay', 'required');
		$this->form_validation->set_rules('property', 'Damage to Property', 'required');
		$this->form_validation->set_rules('monthly_income', 'Monthly Income', 'required');
		$this->form_validation->set_rules('death', 'Death', 'required');
		$this->form_validation->set_rules('injury', 'Injury', 'required');
		$this->form_validation->set_rules('missing', 'Missing', 'required');
		$this->form_validation->set_rules('sick', 'Sick', 'required');
		$this->form_validation->set_rules('disable', 'Disable', 'required');
		$this->form_validation->set_rules('none', 'None', 'required');

		if($this->form_validation->run())
		{
		
			$firstname = $this->input->post('firstname');
			$middlename = $this->input->post('middlename');
			$lastname = $this->input->post('lastname');
			$age = $this->input->post('age');
			$gender = $this->input->post('gender');
			$no_of_dependents = $this->input->post('no_of_dependents');
			$month = $this->input->post('month');
			$day = $this->input->post('day');
			$year = $this->input->post('year');
			$cel_no = $this->input->post('cel_no');
			$before_region = $this->input->post('before_region');
			$before_province = $this->input->post('before_province');
			$before_city = $this->input->post('before_city');
			$before_barangay = $this->input->post('before_barangay');
			$before_street = $this->input->post('before_street');
			$current_region = $this->input->post('current_region');
			$current_province = $this->input->post('current_province');
			$current_city = $this->input->post('current_city');
			$current_barangay = $this->input->post('current_barangay');
			$current_street = $this->input->post('current_street');
			$civil_status = $this->input->post('civil_status');
			$property = $this->input->post('property');
			$working_husband = $this->input->post('working_husband');
			$occupation = $this->input->post('occupation');

			$skills = $this->input->post('skills');


			$monthly_income = $this->input->post('monthly_income');
			$head_of_family = $this->input->post('head_of_family');
			$death = $this->input->post('death');
			$injury = $this->input->post('injury');
			$missing = $this->input->post('missing');
			$sick = $this->input->post('sick');
			$disable = $this->input->post('disable');
			$none = $this->input->post('none');
			$admin = $this->session->userdata('ilo_session_id');
			$birthdate = $month.'/'.$day.'/'.$year;

			$disability_adhd = $this->input->post('adhd');
			$disability_blindness = $this->input->post('blindness');
			$disability_brain_injuries = $this->input->post('brain_injury'); 
			$disability_deaf = $this->input->post('deaf_hearing'); 
			$disability_learning = $this->input->post('learning_disability'); 
			$disability_medical = $this->input->post('medical_disability'); 
			$disability_physical = $this->input->post('physical_disability');
			$disability_psychiatric = $this->input->post('psychiatric_disability'); 
			$disability_speech = $this->input->post('speech_disability');
			
			//if($firstname){
				if($action == 'add'){
					$last_insert_id = $record->add($firstname, $middlename, $lastname, $age, $gender, $no_of_dependents, $month, $day, $year, $cel_no, $before_region, $before_province, $before_city, $before_barangay, $before_street, $current_region, $current_province, $current_city, $current_barangay, $current_street, $civil_status, $property, $working_husband, $occupation, $skills, $monthly_income, $head_of_family, $death, $injury, $missing, $sick, $disable, $none, $admin, $birthdate, $disability_adhd, $disability_blindness, $disability_brain_injuries, $disability_deaf, $disability_learning, $disability_medical, $disability_physical, $disability_psychiatric, $disability_speech);
					redirect('records/add/success_add/'.$last_insert_id);
				}else{
					$record->update($id, $firstname, $middlename, $lastname, $age, $gender, $no_of_dependents, $month, $day, $year, $cel_no, $before_region, $before_province, $before_city, $before_barangay, $before_street, $current_region, $current_province, $current_city, $current_barangay, $current_street, $civil_status, $property, $working_husband, $occupation, $skills, $monthly_income, $head_of_family, $death, $injury, $missing, $sick, $disable, $none, $admin, $birthdate, $disability_adhd, $disability_blindness, $disability_brain_injuries, $disability_deaf, $disability_learning, $disability_medical, $disability_physical, $disability_psychiatric, $disability_speech);
					redirect('records/edit/'.$id.'/success_edit');
				}
			//}
		}else{
			if($action == 'add'){
				$this->add();
			}else{
				$this->edit($id);
			}
		}
	}



	public function add($outcome = '', $last_insert_id = ''){
		
		$regions_select = $this->get_regions_select(false);
	
		$data = array(
			'title' => 'Add New Record',
          	'main_group' => '',
          	'description' => ''
        );
		
		$model_data = array(
			'regions_select' => $regions_select,
			'before_provinces_select' => '',
			'before_cities_select' => '',
			'before_barangays_select' => '',
			'current_provinces_select' => '',
			'current_cities_select' => '',
			'current_barangays_select' => '',
			'skills' => '',
			'record' => '',
			'action' => base_url('records/save/add'),
			'current_records' => $this->Record->row_count()
		);

		if($outcome == 'success_add'){
			$model_data['success_add'] = true;
			$model_data['last_insert_id'] = $last_insert_id;
			$model_data['success_edit'] = false;
		}else{
			$model_data['success_add'] = false;
			$model_data['success_edit'] = false;
			$model_data['last_insert_id'] = $last_insert_id;
		}
		
		$this->load->view('bootstrap/header', $data);
		$this->load->view('submit-record', $model_data);
		$this->load->view('bootstrap/footer');
	}

	public function edit($id, $outcome = ''){

		$this->load->model('Record');
		$record = new Record();

		$record_info = $record->get_record($id);
		$skills = $record->get_skills($id, 'string');
		$regions_select = $this->get_regions_select(false);

		$before_region = $record_info['before_region'];
		$before_province = $record_info['before_province'];
		$before_city = $record_info['before_city'];
		$before_barangay = $record_info['before_barangay'];

		$before_province_name = $record_info['before_province_name'];
		$before_city_name = $record_info['before_city_name'];
		$before_barangay_name = $record_info['before_barangay_name'];

		$current_region = $record_info['current_region'];
		$current_province = $record_info['current_province'];
		$current_city = $record_info['current_city'];
		$current_barangay = $record_info['current_barangay'];

		$current_province_name = $record_info['current_province_name'];
		$current_city_name = $record_info['current_city_name'];
		$current_barangay_name = $record_info['current_barangay_name'];

		$before_provinces_select = $this->get_current_provinces_select($before_region, $before_province, $before_province_name);
		$before_cities_select = $this->get_current_cities_select($before_province, $before_city, $before_city_name );
		$before_barangays_select = $this->get_current_barangays_select($before_city, $before_barangay, $before_barangay_name );

		$current_provinces_select = $this->get_current_provinces_select($current_region, $current_province, $current_province_name);
		$current_cities_select = $this->get_current_cities_select($current_province, $current_city, $current_city_name);
		$current_barangays_select = $this->get_current_barangays_select($current_city, $current_barangay, $current_barangay_name);



		$data = array(
			'title' => 'Edit Record',
          	'main_group' => '',
          	'description' => ''
        );
		
		$model_data = array(
			'regions_select' => $regions_select,
			'before_provinces_select' => $before_provinces_select,
			'before_cities_select' => $before_cities_select,
			'before_barangays_select' => $before_barangays_select,
			'current_provinces_select' => $current_provinces_select,
			'current_cities_select' => $current_cities_select,
			'current_barangays_select' => $current_barangays_select,
			'skills' => $skills,
			'record' => $record_info,
			'action' => base_url('records/save/edit/'.$id),
			'current_records' => $this->Record->row_count(),
			'points' => $this->Record->evaluate_points($record_info['no_of_dpndts'], $record_info['gender'], $record_info['status'], $record_info['household'], $record_info['occupation'], $record_info['property'], $record_info['death'], $record_info['injury'], $record_info['missing'], $record_info['sick'], $record_info['disable'], $record_info['none'], $record_info['working_husband'])
		);

		if($outcome == 'success_edit'){
			$model_data['success_edit'] = true;
		}else{
			$model_data['success_add'] = false;
			$model_data['success_edit'] = false;
		}

		
		$model_data['success_add'] = false;
		$model_data['last_insert_id'] = '';
		
		$this->load->view('bootstrap/header', $data);
		$this->load->view('submit-record', $model_data);
		$this->load->view('bootstrap/footer');
	}

	public function delete($id, $redirect = ''){
		
		$this->load->model('Record');
		$record = new Record();
		
		$record->delete($id);	

		$redirect_base = 'records';

		redirect($redirect_base.'/'.$redirect);		
	}
	
	public function get_current_provinces_select($region_id = false, $province_id = false, $province_name = '', $select_range = ''){
		
		$this->load->model('Record');
		$record = new Record();
	
		if($province_id){
			$id = $region_id;
			$result = '<option value="'.$province_id.'">'.$province_name.'</option>';
		}else if($select_range == 'all'){
			$id = false;
			$result = '<option value="">-SELECT PROVINCE-</option>';
		}else{
			$id = $this->input->post('id');
			$result = '<option value="">-SELECT PROVINCE-</option>';
		}

		
		$current_province_array = $record->get_current_provinces($id);

		
		foreach($current_province_array as $current_province_info){
			$id=$current_province_info->ID3;
			$data=$current_province_info->Text3;
			$result .= '<option value="'.$id.'">'.$data.'</option>';
		}
		
		if($province_id){
			return $result;
		}else if($select_range == 'all'){
			return $result;
		}else{
			echo $result;
		}
	}
	
	
	public function get_current_cities_select($province_id = false, $city_id = false, $city_name = ''){
	
		$this->load->model('Record');
		$record = new Record();

		if($city_id){
			$id = $province_id;
			$result = '<option value="'.$city_id.'">'.$city_name.'</option>';
		}else{
			$id = $this->input->post('id');
			$result = '<option value="">-SELECT CITY-</option>';
		}
	
		
		$current_city_array = $record->get_current_cities($id);

		
		foreach($current_city_array as $current_city_info){
			$id=$current_city_info->ID4;
			$data=$current_city_info->Text4;
			$result .= '<option value="'.$id.'">'.$data.'</option>';
		}
		
		if($city_id){
			return $result;
		}else{
			echo $result;
		}	
	}
	
	public function get_current_barangays_select($city_id = false, $barangay_id = false, $barangay_name = ''){
	
		$this->load->model('Record');
		$record = new Record();

		if($barangay_id){
			$id = $city_id;
			$result = '<option value="'.$barangay_id.'">'.$barangay_name.'</option>';
		}else{
			$id = $this->input->post('id');
			$result = '<option value="">-SELECT BARANGAY-</option>';
		}
		
		$result_counter = 0;
		
		$current_barangay_array = $record->get_current_barangays($id);

		
		foreach($current_barangay_array as $current_barangay_sub_array){
			foreach($current_barangay_sub_array as $current_barangay_info){
				$data_id=$current_barangay_info->ID5;
				$sub_data=$current_barangay_info->Text5;
				$result .= '<option value="'.$data_id.'">'.$sub_data.'</option>';
			}
			$result_counter++;
		}
		
		if($barangay_id){
			return $result;
		}else{
			echo $result;
		}	
	}
	
	
	public function get_regions_select($search = false){
		
		$this->load->model('Record');
		$record = new Record();
		
		$region_array = $record->get_regions();
		$result = '';
		
		if($search){
			$result .= "<option value='all'>ALL REGIONS</option>";
		}else{
			$result .= "<option value=''>SELECT REGION</option>";
		}

		foreach($region_array as $region_info){
			$region = $region_info->Text2;
			$id = $region_info->ID2;
			if($region != null && $region != ''){
				$result .= "<option value='{$id}'>{$region}</option>";
			}
		}
		
		return $result;
	}
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */