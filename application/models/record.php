<?php

class Record extends MY_Model {

    const DB_TABLE = 'name_database';
    const DB_TABLE_PK = 'id';

    public $publication_id;
    public $publication_name;
	
	public function get_current_provinces($id = ''){
	
		if($id != ''){
			$sql="SELECT distinct(Text3), ID3 FROM addid3 WHERE okay = 1 AND ID2='$id' AND Text3 != '' AND Text3 = UPPER(Text3)";
		}else{
			$sql="SELECT distinct(Text3), ID3 FROM addid3 WHERE okay = 1 AND Text3 != '' AND Text3 = UPPER(Text3)";
		}
		
		$query = $this->db->query($sql);
		
		$result = $query->result();
		
		return $result;
	
	}
	
	public function get_current_cities($id){
		
		$sql="SELECT distinct(Text4), ID4 FROM addid4 WHERE okay = 1 AND ID3='$id' AND Text4 != '' AND Text4 = UPPER(Text4)";
		$query = $this->db->query($sql);
		
		$result = $query->result();
		
		return $result;
		
	}
	
	public function get_current_barangays($id){
	
		$result = array();
		$result_counter = 0;
	
		$select_all_sub_district_sql = "SELECT distinct(Text4b), ID4b FROM addid4b WHERE okay = 1 AND ID4 = '$id'";
		$select_all_sub_district_query = $this->db->query($select_all_sub_district_sql);
		$select_all_sub_district_result = $select_all_sub_district_query->result();
		
		foreach($select_all_sub_district_result as $district_info){
			$sub_id = $district_info->ID4b;
			$sub_data = $district_info->Text4b;

			$sql="SELECT distinct(Text5), ID5 FROM addid5 WHERE okay = 1 AND ID4b ='$sub_id' AND Text5 != ''";
			$query = $this->db->query($sql);
			
			$result[$result_counter] = $query->result();
			$result_counter++;
		}
		
		return $result;
	
	}
	
	public function get_regions(){
	
		$sql = "SELECT distinct(Text2), ID2 FROM addid2 WHERE Okay = 1";
		$query = $this->db->query($sql);
		
		$result = $query->result();
		
		return $result;

	}

	public function get_statistics_data($get_region, $get_province, $get_city, $get_barangay, $age_bracket_array){
		
		$this->session->unset_userdata('statistics_session');
		
		$statistics_session = array(
			'region' => $get_region,
			'province' => $get_province,
			'city' => $get_city,
			'barangay' => $get_barangay,
			'age_bracket_array' => $age_bracket_array
		);
		$this->session->set_userdata(array('statistics_session' => $statistics_session));


		$additional_query = '';

		if($get_region == 'all'){
			$additional_query .= '';
			//$start_additional_query = 'no';
		}else if($get_region != 'all' && !empty($get_region) && $get_region != ''){
			$additional_query .= " AND current_region = '$get_region' ";
			//$start_additional_query = 'yes';
		}else{
			$additional_query .= '';
			//$start_additional_query = 'no';
		}

		//if($get_region == 'null' || empty($get_region) || $get_region == ''){
			
		//}else{
			//if($start_additional_query == 'yes'){
				//$additional_query .= " AND current_region = '$get_region' ";
			//}else{
			//	$additional_query .= " current_province = '$get_province' ";
			//	$start_additional_query = 'yes';
			//}
			
		//}

		if($get_province == 'null' || empty($get_province) || $get_province == ''){
			
		}else{
			//if($start_additional_query == 'yes'){
				$additional_query .= " AND current_province = '$get_province' ";
			//}else{
			//	$additional_query .= " current_province = '$get_province' ";
			//	$start_additional_query = 'yes';
			//}
			
		}

		if($get_city  == 'null' || empty($get_city) || $get_city == ''){
			
		}else{
			//if($start_additional_query == 'yes'){
				$additional_query .= " AND current_city = '$get_city' ";
			//}else{
			//	$additional_query .= " current_city = '$get_city' ";
			//	$start_additional_query = 'yes';
			//}
			
		}

		if($get_barangay  == 'null' || empty($get_barangay) || $get_barangay == ''){
			
		}else{
			//if($start_additional_query == 'yes'){
				$additional_query .= " AND current_barangay = '$get_barangay' ";
			//}else{
			//	$additional_query .= " current_barangay = '$get_barangay' ";
			//	$start_additional_query = 'yes';
			//}
			
		}





		/*
		$search_barangay 	= $view_barangay;

		if(isset($get_town)){
			$search_town = $get_town;
		}else{
			$search_town = $view_town;
		}

		if((empty($search_town) || $search_town == '') && (empty($search_barangay) || $search_barangay == '')){

			$additional_query = '';
			$additional_query_no_and = '';

		}else if((!empty($search_town) || $search_town != '') && (empty($search_barangay) || $search_barangay == '')){

			$additional_query = "AND current_city_name = '$search_town'";
			$additional_query_no_and = "WHERE current_city_name = '$search_town'";

		}else{

			$additional_query = "AND current_city_name = '$search_town' AND current_barangay_name = '$search_barangay'";
			$additional_query_no_and = "WHERE current_city_name = '$search_town' AND current_barangay_name = '$search_barangay'";

		}
		*/
	
	
	
		$statistics_data_array = array();
		$statistics_row_data_array = array();
		$row_data_counter = 0;
		
		$row_gender_male_total = 0;
		$row_gender_female_total = 0;
		$row_status_single_total = 0;
		$row_status_married_total = 0;
		$row_status_widow_total = 0;
		//$row_skill_skilled_total = 0;
		//$row_skill_unskilled_total = 0;
		$row_property_totally_damaged_total = 0;
		$row_property_partially_damaged_total = 0;
		$row_property_flooded_total = 0;
		$row_property_not_available_total = 0;
		$row_occupation_self_employed_total = 0;
		$row_occupation_employed_total = 0;
		$row_occupation_unemployed_total = 0;
		$row_tragedy_death_total = 0;
		$row_tragedy_injury_total = 0;
		$row_tragedy_missing_total = 0;
		$row_tragedy_sick_total = 0;
		$row_tragedy_disable_total = 0;
		$row_tragedy_none_total = 0;
			
		
		foreach($age_bracket_array as $age_range){
		
			$select_gender_male 				= "SELECT count(gender) as gender FROM name_database WHERE gender = 'male' AND (age >= '$age_range[0]' AND age <= '$age_range[1]')";
			$select_gender_female 				= "SELECT count(gender) as gender FROM name_database WHERE gender = 'female' AND (age >= '$age_range[0]' AND age <= '$age_range[1]')";
			$select_status_single 				= "SELECT count(status) as status FROM name_database WHERE status = 'single' AND (age >= '$age_range[0]' AND age <= '$age_range[1]')";
			$select_status_married	 			= "SELECT count(status) as status FROM name_database WHERE status = 'married' AND (age >= '$age_range[0]' AND age <= '$age_range[1]')";
			$select_status_widow 				= "SELECT count(status) as status FROM name_database WHERE status = 'widow' AND (age >= '$age_range[0]' AND age <= '$age_range[1]')";
			$select_skill_skilled 				= "SELECT count(skills) as skills FROM name_database WHERE skills != 'unskilled' AND (age >= '$age_range[0]' AND age <= '$age_range[1]')";
			$select_skill_unskilled 			= "SELECT count(skills) as skills FROM name_database WHERE skills = 'unskilled' AND (age >= '$age_range[0]' AND age <= '$age_range[1]')";
			$select_property_totally_damaged 	= "SELECT count(property) as property FROM name_database WHERE property = 'totally damage' AND (age >= '$age_range[0]' AND age <= '$age_range[1]')";
			$select_property_partially_damaged	= "SELECT count(property) as property FROM name_database WHERE property = 'partially damage' AND (age >= '$age_range[0]' AND age <= '$age_range[1]')";
			$select_property_flooded 			= "SELECT count(property) as property FROM name_database WHERE property = 'flooded' AND (age >= '$age_range[0]' AND age <= '$age_range[1]')";
			$select_property_not_available 		= "SELECT count(property) as property FROM name_database WHERE property = 'n/a' AND (age >= '$age_range[0]' AND age <= '$age_range[1]')";
			$select_occupation_self_employed 	= "SELECT count(occupation) as occupation FROM name_database WHERE occupation = 'self-employed' AND (age >= '$age_range[0]' AND age <= '$age_range[1]')";
			$select_occupation_employed 		= "SELECT count(occupation) as occupation FROM name_database WHERE occupation = 'employed' AND (age >= '$age_range[0]' AND age <= '$age_range[1]')";
			$select_occupation_unemployed 		= "SELECT count(occupation) as occupation FROM name_database WHERE occupation = 'un-employed' AND (age >= '$age_range[0]' AND age <= '$age_range[1]')";
			$select_tragedy_death 				= "SELECT IFNULL(sum(death),0) as death FROM name_database WHERE (age >= '$age_range[0]' AND age <= '$age_range[1]')";
			$select_tragedy_injury 				= "SELECT IFNULL(sum(injury),0) as injury FROM name_database WHERE (age >= '$age_range[0]' AND age <= '$age_range[1]')";
			$select_tragedy_missing 			= "SELECT IFNULL(sum(missing),0) as missing FROM name_database WHERE (age >= '$age_range[0]' AND age <= '$age_range[1]')";
			$select_tragedy_sick 				= "SELECT IFNULL(sum(sick),0) as sick FROM name_database WHERE (age >= '$age_range[0]' AND age <= '$age_range[1]')";
			$select_tragedy_disable 			= "SELECT IFNULL(sum(disable),0) as disable FROM name_database WHERE (age >= '$age_range[0]' AND age <= '$age_range[1]')";
			$select_tragedy_none 				= "SELECT IFNULL(sum(none),0) as none FROM name_database WHERE (age >= '$age_range[0]' AND age <= '$age_range[1]')";

			$select_gender_male 				.= $additional_query;
			$select_gender_female 				.= $additional_query;
			$select_status_single 				.= $additional_query;
			$select_status_married	 			.= $additional_query;
			$select_status_widow 				.= $additional_query;
			$select_skill_skilled 				.= $additional_query;
			$select_skill_unskilled 			.= $additional_query;
			$select_property_totally_damaged 	.= $additional_query;
			$select_property_partially_damaged	.= $additional_query;
			$select_property_flooded 			.= $additional_query;
			$select_property_not_available 		.= $additional_query;
			$select_occupation_self_employed 	.= $additional_query;
			$select_occupation_employed 		.= $additional_query;
			$select_occupation_unemployed 		.= $additional_query;
			$select_tragedy_death 				.= $additional_query; 
			$select_tragedy_injury 				.= $additional_query;
			$select_tragedy_missing 			.= $additional_query;
			$select_tragedy_sick 				.= $additional_query;
			$select_tragedy_disable 			.= $additional_query;
			$select_tragedy_none 				.= $additional_query;

			$select_gender_male_query 					= $this->db->query($select_gender_male)->result();
			$select_gender_female_query 				= $this->db->query($select_gender_female)->result();
			$select_status_single_query 				= $this->db->query($select_status_single)->result();
			$select_status_married_query	 			= $this->db->query($select_status_married)->result();
			$select_status_widow_query 					= $this->db->query($select_status_widow)->result();
			//$select_skill_skilled_query 				= $this->db->query($select_gender_male)->result();
			//$select_skill_unskilled_query 			= $this->db->query($select_gender_male)->result();
			$select_property_totally_damaged_query 		= $this->db->query($select_property_totally_damaged)->result();
			$select_property_partially_damaged_query	= $this->db->query($select_property_partially_damaged)->result();
			$select_property_flooded_query 				= $this->db->query($select_property_flooded)->result();
			$select_property_not_available_query 		= $this->db->query($select_property_not_available)->result();
			$select_occupation_self_employed_query 		= $this->db->query($select_occupation_self_employed)->result();
			$select_occupation_employed_query 			= $this->db->query($select_occupation_employed)->result();
			$select_occupation_unemployed_query 		= $this->db->query($select_occupation_unemployed)->result();
			$select_tragedy_death_query 				= $this->db->query($select_tragedy_death)->result();
			$select_tragedy_injury_query 				= $this->db->query($select_tragedy_injury)->result();
			$select_tragedy_missing_query 				= $this->db->query($select_tragedy_missing)->result();
			$select_tragedy_sick_query 					= $this->db->query($select_tragedy_sick)->result();
			$select_tragedy_disable_query 				= $this->db->query($select_tragedy_disable)->result();
			$select_tragedy_none_query 					= $this->db->query($select_tragedy_none)->result();
		
		
			$row_age_range = $age_range[0] .' - '. $age_range[1];
			$row_gender_male = $select_gender_male_query[0]->gender;
			$row_gender_female = $select_gender_female_query[0]->gender;
			$row_status_single = $select_status_single_query[0]->status;
			$row_status_married = $select_status_married_query[0]->status;
			$row_status_widow = $select_status_widow_query[0]->status;
			//$row_skill_skilled = $select_skill_skilled_query[0]->skills;
			//$row_skill_unskilled = $select_skill_unskilled_query[0]->skills;
			$row_property_totally_damaged = $select_property_totally_damaged_query[0]->property;
			$row_property_partially_damaged = $select_property_partially_damaged_query[0]->property;
			$row_property_flooded = $select_property_flooded_query[0]->property;
			$row_property_not_available = $select_property_not_available_query[0]->property;
			$row_occupation_self_employed = $select_occupation_self_employed_query[0]->occupation;
			$row_occupation_employed = $select_occupation_employed_query[0]->occupation;
			$row_occupation_unemployed = $select_occupation_unemployed_query[0]->occupation;
			$row_tragedy_death = $select_tragedy_death_query[0]->death;
			$row_tragedy_injury = $select_tragedy_injury_query[0]->injury;
			$row_tragedy_missing = $select_tragedy_missing_query[0]->missing;
			$row_tragedy_sick = $select_tragedy_sick_query[0]->sick;
			$row_tragedy_disable = $select_tragedy_disable_query[0]->disable;
			$row_tragedy_none = $select_tragedy_none_query[0]->none;
			
			
			$row_gender_male_total += $row_gender_male;
			$row_gender_female_total += $row_gender_female;
			$row_status_single_total += $row_status_single;
			$row_status_married_total += $row_status_married;
			$row_status_widow_total += $row_status_widow;
			//$row_skill_skilled_total += $row_skill_skilled;
			//$row_skill_unskilled_total += $row_skill_unskilled;
			$row_property_totally_damaged_total += $row_property_totally_damaged;
			$row_property_partially_damaged_total += $row_property_partially_damaged;
			$row_property_flooded_total += $row_property_flooded;
			$row_property_not_available_total += $row_property_not_available;
			$row_occupation_self_employed_total += $row_occupation_self_employed;
			$row_occupation_employed_total += $row_occupation_employed;
			$row_occupation_unemployed_total += $row_occupation_unemployed;
			$row_tragedy_death_total += $row_tragedy_death;
			$row_tragedy_injury_total += $row_tragedy_injury;
			$row_tragedy_missing_total += $row_tragedy_missing;
			$row_tragedy_sick_total += $row_tragedy_sick;
			$row_tragedy_disable_total += $row_tragedy_disable;
			$row_tragedy_none_total += $row_tragedy_none;


			
			$statistics_row_data_array['row_age_range'] = $row_age_range;
			$statistics_row_data_array['row_gender_male'] = $row_gender_male;
			$statistics_row_data_array['row_gender_female'] = $row_gender_female;
			$statistics_row_data_array['row_status_single'] = $row_status_single;
			$statistics_row_data_array['row_status_married'] = $row_status_married;
			$statistics_row_data_array['row_status_widow'] = $row_status_widow;
			//$statistics_row_data_array['row_skill_skilled'] = $row_skill_skilled;
			//$statistics_row_data_array['row_skill_unskilled'] = $row_skill_unskilled;
			$statistics_row_data_array['row_property_totally_damaged'] = $row_property_totally_damaged;
			$statistics_row_data_array['row_property_partially_damaged'] = $row_property_partially_damaged;
			$statistics_row_data_array['row_property_flooded'] = $row_property_flooded;
			$statistics_row_data_array['row_property_not_available'] = $row_property_not_available;
			$statistics_row_data_array['row_occupation_self_employed'] = $row_occupation_self_employed;
			$statistics_row_data_array['row_occupation_employed'] = $row_occupation_employed;
			$statistics_row_data_array['row_occupation_unemployed'] = $row_occupation_unemployed;
			$statistics_row_data_array['row_tragedy_death'] = $row_tragedy_death;
			$statistics_row_data_array['row_tragedy_injury'] = $row_tragedy_injury;
			$statistics_row_data_array['row_tragedy_missing'] = $row_tragedy_missing;
			$statistics_row_data_array['row_tragedy_sick'] = $row_tragedy_sick;
			$statistics_row_data_array['row_tragedy_disable'] = $row_tragedy_disable;
			$statistics_row_data_array['row_tragedy_none'] = $row_tragedy_none;
			
			
			$statistics_data_array[$row_data_counter] = $statistics_row_data_array;
			$row_data_counter++;
			
		}
		
		$statistics_row_data_array['row_age_range'] =   'Total'; // $additional_query;
		$statistics_row_data_array['row_gender_male'] = $row_gender_male_total;
		$statistics_row_data_array['row_gender_female'] = $row_gender_female_total;
		$statistics_row_data_array['row_status_single'] = $row_status_single_total;
		$statistics_row_data_array['row_status_married'] = $row_status_married_total;
		$statistics_row_data_array['row_status_widow'] = $row_status_widow_total;
		//$statistics_row_data_array['row_skill_skilled'] = $row_skill_skilled_total;
		//$statistics_row_data_array['row_skill_unskilled'] = $row_skill_unskilled_total;
		$statistics_row_data_array['row_property_totally_damaged'] = $row_property_totally_damaged_total;
		$statistics_row_data_array['row_property_partially_damaged'] = $row_property_partially_damaged_total;
		$statistics_row_data_array['row_property_flooded'] = $row_property_flooded_total;
		$statistics_row_data_array['row_property_not_available'] = $row_property_not_available_total;
		$statistics_row_data_array['row_occupation_self_employed'] = $row_occupation_self_employed_total;
		$statistics_row_data_array['row_occupation_employed'] = $row_occupation_employed_total;
		$statistics_row_data_array['row_occupation_unemployed'] = $row_occupation_unemployed_total;
		$statistics_row_data_array['row_tragedy_death'] = $row_tragedy_death_total;
		$statistics_row_data_array['row_tragedy_injury'] = $row_tragedy_injury_total;
		$statistics_row_data_array['row_tragedy_missing'] = $row_tragedy_missing_total;
		$statistics_row_data_array['row_tragedy_sick'] = $row_tragedy_sick_total;
		$statistics_row_data_array['row_tragedy_disable'] = $row_tragedy_disable_total;
		$statistics_row_data_array['row_tragedy_none'] = $row_tragedy_none_total;
		
		$statistics_data_array[$row_data_counter] = $statistics_row_data_array;
		
		
		return $statistics_data_array;
		
	}
	
	
	public function get_stat_bar_chart_info($gender, $status, $occupation, $property, $tragedy, $bar_chart_type, $age_bracket_array){
		
		
		if($gender == 'all'){
			$gender_sql = '';
		}else{
			$gender_sql = "AND gender = '".$gender."' ";
		}
		
		if($status == 'all'){
			$status_sql = '';
		}else{
			$status_sql = "AND status = '".$status."' ";
		}
		
		if($occupation == 'all'){
			$occupation_sql = '';
		}else{
			$occupation_sql = "AND occupation = '".$occupation."' ";
		}
		
		if($property == 'all'){
			$property_sql = '';
		}else{
			$property_sql = "AND property = '".$property."' ";
		}
		
		if($tragedy == 'not affected'){
			$tragedy_sql = '';
		}else{
			$tragedy_sql = "AND ".$tragedy." > 0";
		}
		
		
		
		$statistics_data_array = array();
		$statistics_row_data_array = array();
		$row_data_counter = 0;
		
		$row_gender_male_total = 0;
			
		
		foreach($age_bracket_array as $age_range){
		
			if($bar_chart_type == 'one_column'){

				$column_array = array();
				$column_name = '';

				$sql = "SELECT count(id) as records FROM name_database WHERE (age >= $age_range[0] AND age <= $age_range[1]) {$property_sql} {$tragedy_sql} {$gender_sql} {$status_sql} {$occupation_sql}";

				$query 	= $this->db->query($sql);
				$result = $query->row()->records;

				$statistics_data_array[$row_data_counter]['sql'] = $sql;
				$statistics_data_array[$row_data_counter]['results'] = $result;

			}else{

				$column_counter = 0;

				if($bar_chart_type == 'multiple_column_gender'){
					$column_array = array('male','female','');
					$column_name = 'gender';
				}else if($bar_chart_type == 'multiple_column_status'){
					$column_array = array('single', 'married','widow','');
					$column_name = 'status';
				}else if($bar_chart_type == 'multiple_column_occupation'){
					$column_array = array('employed','self-employed','un-employed', '');
					$column_name = 'occupation';
				}
				
				foreach($column_array as $column_value){

					if($column_value != ''){
						$column_sql = "AND $column_name = '".$column_value."' ";
					}else{
						$column_sql = '';
					}

					if($bar_chart_type == 'multiple_column_gender'){
						$gender_sql = $column_sql;
					}else if($bar_chart_type == 'multiple_column_status'){
						$status_sql = $column_sql;
					}else if($bar_chart_type == 'multiple_column_occupation'){
						$occupation_sql = $column_sql;
					}


					$sql = "SELECT count(id) as records FROM name_database WHERE (age >= $age_range[0] AND age <= $age_range[1]) {$property_sql} {$tragedy_sql} {$gender_sql} {$status_sql} {$occupation_sql}";

					$query 	= $this->db->query($sql);
					$result = $query->row()->records;

					$statistics_data_array[$row_data_counter]['sql'][$column_counter] = $sql;
					$statistics_data_array[$row_data_counter]['results'][$column_counter] = $result;

					$column_counter++;
				}

			}
			
			
			$statistics_data_array[$row_data_counter]['age_bracket'] = $age_range[0].' - '.$age_range[1];

			$row_data_counter++;

			$statistics_data_array[0]['columns'] = $column_array;
			$statistics_data_array[0]['bar_chart_type'] = $bar_chart_type;
			$statistics_data_array[0]['column_name'] = $column_name;

		}
		
	
		return $statistics_data_array;
		
	}
	
	
	public function get_pie_chart_info($age_bracket, $gender, $status, $occupation, $pie_chart_type){
	
		$tragedy_array = array();
		$damage_array = array();
		$chart_type_array = array();
		
	
		if($age_bracket == 'all'){
			$age_bracket_sql = '';
		}else{
			$age_bracket_array = explode('-',$age_bracket);
			$age_bracket_sql = "AND (age >= $age_bracket_array[0] AND age <= $age_bracket_array[1])";
		}
	
		if($gender == 'all'){
			$gender_sql = '';
		}else{
			$gender_sql = "AND gender = '".$gender."' ";
		}
		
		if($status == 'all'){
			$status_sql = '';
		}else{
			$status_sql = "AND status = '".$status."' ";
		}
		
		if($occupation == 'all'){
			$occupation_sql = '';
		}else{
			$occupation_sql = "AND occupation = '".$occupation."' ";
		}


		
		/* if($property == 'all'){
			$property_sql = '';
		}else{
			$property_sql = "AND property = '".$property."' ";
		}
		
		if($tragedy == 'not affected'){
			$tragedy_sql = '';
		}else{
			$tragedy_sql = "AND ".$tragedy." > 0";
		} */
		
		
		if($pie_chart_type == 'damage to property'){
		
			$chart_type_array[] = 'totally damage';
			$chart_type_array[] = 'partially damage';
			$chart_type_array[] = 'flooded';
			$chart_type_array[] = 'N/A';
			
		}else{
		
			$chart_type_array[] = 'death';
			$chart_type_array[] = 'injury';
			$chart_type_array[] = 'missing';
			$chart_type_array[] = 'sick';
			$chart_type_array[] = 'disable';
			$chart_type_array[] = 'none';
			
		}
		
		
		$statistics_data_array = array();
		$statistics_row_data_array = array();
		$row_data_counter = 0;
			
		
		foreach($chart_type_array as $chart_type_query_value){
		
			if($pie_chart_type == 'damage to property'){
				$pie_chart_type_sql = "property = '$chart_type_query_value'";
				$sql = "SELECT count(property) as records FROM name_database WHERE {$pie_chart_type_sql} {$age_bracket_sql} {$gender_sql} {$status_sql} {$occupation_sql} ";
			}else{
				$pie_chart_type_sql = "$chart_type_query_value > 0 ";
				$sql = "SELECT count({$chart_type_query_value}) as records FROM name_database WHERE {$pie_chart_type_sql} {$age_bracket_sql} {$gender_sql} {$status_sql} {$occupation_sql} ";
			}
			
			
			
			$query 	= $this->db->query($sql);
			
			$result = $query->row()->records;

			$statistics_data_array[$row_data_counter]['sql'] = $sql;
			$statistics_data_array[$row_data_counter]['result'] = $result;
			$statistics_data_array[$row_data_counter]['term'] = $chart_type_query_value;
			$row_data_counter++;
			
		}
		
	
		return $statistics_data_array;
	
	}

	public function get_skills($id, $type = 'array'){

		$sql = "SELECT skill FROM skills_log WHERE owner_id = $id";
		$query 	= $this->db->query($sql);
		$skills = $query->result();

		if($type == 'array'){
			return $skills;
		}else{
			$skill_string = '';
			foreach($skills as $skill){
				$specific_skill = $skill->skill;

				$specific_skill = ltrim($specific_skill, ' ');
				$specific_skill = rtrim($specific_skill, ' ');

				$skill_string .= $specific_skill.', ';
			}
			$skill_string = rtrim($skill_string,", ");

			//$new_string = str_replace(' ', '', $skill_string);
			//$new_string = str_replace(',', ', ', $new_string);

			return $skill_string;
		}

	}
	
	public function update_award_status($id, $status){
	
		$sql = "UPDATE name_database SET employment_award_status = '$status' WHERE id = $id";
		$query = $this->db->query($sql);
	
	}
	
	public function search_and_rank_row_count($seach_data_array){
		
		$search_by = $seach_data_array['search_by'];
		$key = $seach_data_array['key'];
		$age_from = $seach_data_array['age_from'];
		$age_to = $seach_data_array['age_to'];
		$gender = $seach_data_array['gender'];
		$status = $seach_data_array['status'];
		$occupation = $seach_data_array['occupation'];
		$property = $seach_data_array['property'];
		$household = $seach_data_array['household'];
		$current_region = $seach_data_array['current_region'];
		$current_province = $seach_data_array['current_province'];
		$current_city = $seach_data_array['current_city'];
		$current_barangay = $seach_data_array['current_barangay'];
		$award_status = $seach_data_array['award_status'];
		$disability = $seach_data_array['disability'];
		$skill = $seach_data_array['skill'];
		$employment_award_status = '';

		if($skill == ''){
			$skill = '';
		}else{
			$skill = " AND b.skill LIKE '%{$skill}%' AND b.owner_id = a.id ";
		}

		if($disability == 'all'){
			$disability = '';
		}else{
			if($skill == ''){
				$disability = " AND {$disability} > 0 ";
			}else{
				$disability = " AND a.{$disability} > 0 ";
			}
			
		}
	
		if($gender == 'all'){
			$gender = '';
		}else{
			if($skill == ''){
				$gender = " AND gender = '".$gender."'  ";
			}else{
				$gender = " AND a.gender = '".$gender."'  ";
			}
			
		}

		if($status == 'all'){
			$status = '';
		}else{
			if($skill == ''){
				$status = " AND status = '".$status."'  ";
			}else{
				$status = " AND a.status = '".$status."'  ";
			}
			
		}

		if($occupation == 'all'){
			$occupation = '';
		}else{
			if($skill == ''){
				$occupation = " AND occupation = '".$occupation."'  ";
			}else{
				$occupation = " AND a.occupation = '".$occupation."'  ";
			}
			
		}

		if($household == 'all'){
			$household = '';
		}else{
			if($skill == ''){
				$household = " AND household = '".$household."'  ";
			}else{
				$household = " AND a.household = '".$household."'  ";
			}
			
		}

		if($property == 'all'){
			$property = '';
		}else{
			if($skill == ''){
				$property = " AND property = '".$property."'  ";
			}else{
				$property = " AND a.property = '".$property."'  ";
			}
			
		}

		//echo $current_region . '<br/>';
		if($current_region == 'all' || $current_region == ''){
			$region = '';
		}else{
			if($skill == ''){
				$region = " AND current_region = '".$current_region."' ";
			}else{
				$region = " AND a.current_region = '".$current_region."' ";
			}
			
		}

		if($current_province == ''){
			$province = '';
		}else{
			if($skill == ''){
				$province = " AND current_province = '".$current_province."' ";
			}else{
				$province = " AND a.current_province = '".$current_province."' ";
			}
			
		}

		if($current_city == ''){
			$city = '';
		}else{
			if($skill == ''){
				$city = " AND current_city= '".$current_city."' ";
			}else{
				$city = " AND a.current_city= '".$current_city."' ";
			}
			
		}

		if($current_barangay == ''){
			$barangay = '';
		}else{
			if($skill == ''){
				$barangay = "AND current_barangay = '".$current_barangay."' ";
			}else{
				$barangay = "AND a.current_barangay = '".$current_barangay."' ";
			}
			
		}

		if($award_status == 'all'){
			$employment_award_status = '';
		}else{
			if($skill == ''){
				$employment_award_status = "AND employment_award_status = '".$award_status."' ";
			}else{
				$employment_award_status = "AND a.employment_award_status = '".$award_status."' ";
			}
			
		}

		if($key){

			
			//echo $sqls;
			if($skill == ''){
				$sql = "SELECT id FROM name_database WHERE {$search_by} LIKE '%$key%' AND (age >= $age_from AND age <= $age_to) {$gender} {$status} {$occupation} {$household} {$property} {$region} {$province} {$city} {$barangay} {$employment_award_status} {$disability}";
			}else{
				$sql = "SELECT a.id FROM name_database a, skills_log b WHERE a.{$search_by} LIKE '%$key%' AND (a.age >= $age_from AND a.age <= $age_to) {$gender} {$status} {$occupation} {$household} {$property} {$region} {$province} {$city} {$barangay} {$employment_award_status} {$disability}  {$skill}";
			}
			
			
		}else{

			if($skill == ''){
				$sql = "SELECT id FROM name_database WHERE (age >= $age_from AND age <= $age_to) {$gender} {$status} {$occupation} {$household} {$property} {$region} {$province} {$city} {$barangay}  {$employment_award_status} {$disability}";
			}else{
				$sql = "SELECT a.id FROM name_database a, skills_log b WHERE (a.age >= $age_from AND a.age <= $age_to) {$gender} {$status} {$occupation} {$household} {$property} {$region} {$province} {$city} {$barangay}  {$employment_award_status} {$disability} {$skill}";
			}
			
			//echo $sqls;
		}
		
		$query = $this->db->query($sql);
		$result = $query->num_rows();

		return $result;
	
	}


	public function update_point_system($id, $male_point, $female_point, $single_point, $married_point, $widow_point, $household_yes_point, $household_no_point, $skill_with_point, $skill_none_point, $employed_point, $self_employed_point, $unemployed_point, $property_totally_damaged_point, $property_partially_damaged_point, $property_flooded_point, $property_not_available_point, $death_point, $death_min, $death_max, $injury_point, $injury_min, $injury_max, $missing_point, $missing_min, $missing_max, $sick_point, $sick_min, $sick_max, $disable_point, $disable_min, $disable_max, $person_none_point, $person_none_min, $person_none_max, $no_of_dependents_points, $no_of_dependents_min, $no_of_dependents_max, $working_husband){

		$sql = "UPDATE ilo_point_system SET male = $male_point, female = $female_point, no_of_dependents = $no_of_dependents_points, single = $single_point, property_not_available = $property_not_available_point, property_flooded = $property_flooded_point, property_partially_damaged = $property_partially_damaged_point, property_tottally_damaged = $property_totally_damaged_point, person_deaths = $death_point, person_injury = $injury_point, person_missing = $missing_point, person_sick = $sick_point, person_disable = $disable_point, person_none = $person_none_point, married = $married_point, widow = $widow_point, household_yes = $household_yes_point, household_no = $household_no_point, skill_with = $skill_with_point, skill_none = $skill_none_point, self_employed = $self_employed_point, employed = $employed_point, unemployed = $unemployed_point, no_of_dependents_min = $no_of_dependents_min, no_of_dependents_max = $no_of_dependents_max, person_deaths_min = $death_min, person_deaths_max = $death_max, person_injury_min = $injury_min, person_injury_max = $injury_max, person_missing_min = $missing_min, person_missing_max = $missing_max, person_disable_min = $disable_min, person_disable_max = $disable_max, person_none_min = $person_none_min, person_none_max = $person_none_max, person_sick_min = $sick_min, person_sick_max = $sick_max, working_husband = $working_husband WHERE id = $id";

		$query = $this->db->query($sql);

		//$sql = $this->update_record_points();

		return $sql;

	}


	/*
	* This is a very critical function pls inform admins and users when executing.
	*/
	public function update_record_points(){

		$sql = "SELECT id, no_of_dpndts, gender, status, occupation, property, death, injury, missing, sick, disable, none, working_husband, points, household FROM name_database";

		$query = $this->db->query($sql);

		$records = $query->result_array();

		$sql = $this->update_record_evaluated_points($records);

		return $sql;

	}


	public function update_record_evaluated_points($records){

		$record_count = 1;
		$record_length = count($records);

		$update_sql = " UPDATE name_database SET points = CASE id ";
		$where_id = "";


		foreach($records as $record){

			$id = $record['id'];
			$no_of_dependents = $record['no_of_dpndts'];
			$gender = $record['gender'];
			$status = $record['status'];
			$occupation = $record['occupation'];
			$household = $record['household'];
			$property = $record['property'];
			$death = $record['death'];
			$injury = $record['injury'];
			$missing = $record['missing'];
			$sick = $record['sick'];
			$disable = $record['disable'];
			$none = $record['none'];
			$working_husband = $record['working_husband'];

			$points = $record['points'];

			$evaluated_points = $this->evaluate_points($no_of_dependents, $gender, $status, $household, $occupation, $property, $death, $injury, $missing, $sick, $disable, $none, $working_husband);

			$update_sql .= " WHEN $id THEN $evaluated_points ";

			if($record_count < $record_length){
				$where_id .= " $id, ";
			}else if($record_count == $record_length){
				$where_id .= " $id ";
			}
			

			$record_count++;
		}

		$update_sql .= " END WHERE id IN ({$where_id})";

		//$sql = "UPDATE name_database SET points = $evaluated_points WHERE id = $id";
		$query = $this->db->query($update_sql);

		//return $query;
		return $update_sql;

	}


	public function evaluate_points($no_of_dependents, $gender, $status, $household, $occupation, $property, $death, $injury, $missing, $sick, $disable, $none, $working_husband){
	
		$point_system_array = $this->get_point_system();
		
		$male_point = $point_system_array['male'];
		$female_point = $point_system_array['female'];
		$single_point = $point_system_array['single'];
		$married_point = $point_system_array['married'];
		$widow_point = $point_system_array['widow'];
		$household_yes_point = $point_system_array['household_yes'];
		$household_no_point = $point_system_array['household_no'];
		$skill_others_point = $point_system_array['skill_with'];
		$skill_none_point = $point_system_array['skill_none'];
		$employed_point = $point_system_array['employed'];
		$self_employed_point = $point_system_array['self_employed'];
		$unemployed_point = $point_system_array['unemployed'];
		$property_not_available_point = $point_system_array['property_not_available'];
		$property_flooded_point = $point_system_array['property_flooded'];
		$property_partially_damaged_point = $point_system_array['property_partially_damaged'];
		$property_totally_damaged_point = $point_system_array['property_tottally_damaged'];
		$death_point = $point_system_array['person_deaths'];
		$injury_point = $point_system_array['person_injury'];
		$missing_point = $point_system_array['person_missing'];
		$sick_point = $point_system_array['person_sick'];
		$disable_point = $point_system_array['person_disable'];
		$person_none_point = $point_system_array['person_none'];
		$no_of_dependents_points = $point_system_array['no_of_dependents'];
		$no_of_dependents_min = $point_system_array['no_of_dependents_min'];
		$no_of_dependents_max = $point_system_array['no_of_dependents_max'];
		
		$death_min = $point_system_array['person_deaths_min'];
		$death_max = $point_system_array['person_deaths_max'];
		$injury_min = $point_system_array['person_injury_min'];
		$injury_max = $point_system_array['person_injury_max'];
		$missing_min = $point_system_array['person_missing_min'];
		$missing_max = $point_system_array['person_missing_max'];
		$sick_min = $point_system_array['person_sick_min'];
		$sick_max = $point_system_array['person_sick_max'];
		$disable_min = $point_system_array['person_disable_min'];
		$disable_max = $point_system_array['person_disable_max'];
		$person_none_min = $point_system_array['person_none_min'];
		$person_none_max = $point_system_array['person_none_max'];

		$working_husband_point = $point_system_array['working_husband'];
		
		
		$points = 0;
		//no_of_dependents
		if($no_of_dependents <= $no_of_dependents_max && $no_of_dependents >= $no_of_dependents_min){
			$points += $no_of_dependents * $no_of_dependents_points;
		}else{
			$points += $no_of_dependents_max * $no_of_dependents_points;
		}
					
		if ($gender == "male") {
			$points += $male_point;
		} else if ($gender == "female") {
			$points += $female_point;
		}
		
		//Status
		if ($status == "single") {
			$points += $single_point;
		} else if ($status == "married") {
			$points += $married_point;
		} else if ($status == "widow") {
			$points += $widow_point;
		}
		//household
		if ($household == "yes") {
			$points += $household_yes_point;
		} else if ($household == "no") {
			$points += $household_no_point;
		}


		if ($working_husband == "yes"){
			$points += $working_husband_point;
		}
		
		//occupation
		if ($occupation == "employed") {
			$points += $employed_point;
		} else if ($occupation == "self-employed") {
			$points += $self_employed_point;
		} else if ($occupation == "un-employed") {
			$points += $unemployed_point;
		}
		
		//property
		if ($property == "n/a") {
			$points += $property_not_available_point;
		} else if ($property == "flooded") {
			$points += $property_flooded_point;
		} else if ($property == "partially damage") {
			$points += $property_partially_damaged_point;
		} else if ($property == "totally damage") {
			$points += $property_totally_damaged_point;
		}


		//death
		if($death <= $death_max && $death >= $death_min){
			$points += $death * $death_point;
		}else{
			$points += $death * $death_max;
		}
		
		//injury
		if($injury <= $injury_max && $injury >= $injury_min){
			$points += $injury * $injury_point;
		}else{
			$points += $injury * $injury_max;
		}
		
		//missing
		if($missing <= $missing_max && $missing >= $missing_min){
			$points += $missing * $missing_point;
		}else{
			$points += $missing * $missing_max;
		}
		
		//sick
		if($sick <= $sick_max && $sick >= $sick_min){
			$points += $sick * $sick_point;
		}else{
			$points += $sick * $sick_max;
		}
		
		//disable
		if($disable <= $disable_max && $disable >= $disable_min){
			$points += $disable * $disable_point;
		}else{
			$points += $disable * $disable_max;
		}
		
		//none
		if($none <= $person_none_max && $none >= $person_none_min){
			$points += $none * $person_none_point;
		}else{
			$points += $none * $person_none_max;
		}
		
		return $points;
	
	}

	public function search_and_rank($seach_data_array, $page_limit = 0, $page_offset = 0){
	
		$search_by = $seach_data_array['search_by'];
		$key = $seach_data_array['key'];
		$age_from = $seach_data_array['age_from'];
		$age_to = $seach_data_array['age_to'];
		$gender = $seach_data_array['gender'];
		$status = $seach_data_array['status'];
		$occupation = $seach_data_array['occupation'];
		$property = $seach_data_array['property'];
		$household = $seach_data_array['household'];
		$current_region = $seach_data_array['current_region'];
		$current_province = $seach_data_array['current_province'];
		$current_city = $seach_data_array['current_city'];
		$current_barangay = $seach_data_array['current_barangay'];
		$skill = $seach_data_array['skill'];

		$award_status = $seach_data_array['award_status'];
		$disability = $seach_data_array['disability'];
		$employment_award_status = '';

		if($page_limit == 0){
			$page_limit = $seach_data_array['limit'];
		}

		if($skill == ''){
			$skill = '';
		}else{
			$skill = " AND b.skill LIKE '%{$skill}%' AND b.owner_id = a.id ";
		}
		
		if($disability == 'all'){
			$disability = '';
		}else{
			if($skill == ''){
				$disability = " AND {$disability} > 0 ";
			}else{
				$disability = " AND a.{$disability} > 0 ";
			}
			
		}

		if($gender == 'all'){
			$gender = '';
		}else{
			if($skill == ''){
				$gender = "AND gender = '".$gender."' ";
			}else{
				$gender = "AND a.gender = '".$gender."' ";
			}
			
		}

		if($status == 'all'){
			$status = '';
		}else{
			if($skill == ''){
				$status = "AND status = '".$status."' ";
			}else{
				$status = "AND a.status = '".$status."' ";
			}
			
		}

		if($occupation == 'all'){
			$occupation = '';
		}else{
			if($skill == ''){
				$occupation = "AND occupation = '".$occupation."' ";
			}else{
				$occupation = "AND a.occupation = '".$occupation."' ";
			}
			
		}

		if($household == 'all'){
			$household = '';
		}else{
			if($skill == ''){
				$household = "AND household = '".$household."' ";
			}else{
				$household = "AND a.household = '".$household."' ";
			}
			
		}

		if($property == 'all'){
			$property = '';
		}else{
			if($skill == ''){
				$property = "AND property = '".$property."' ";
			}else{
				$property = "AND a.property = '".$property."' ";
			}
			
		}

		//echo $current_region . '<br/>';
		if($current_region == 'all' || $current_region == ''){
			$region = '';
		}else{
			if($skill == ''){
				$region = "AND current_region = '".$current_region."' ";
			}else{
				$region = "AND a.current_region = '".$current_region."' ";
			}
			
		}

		if($current_province == ''){
			$province = '';
		}else{
			if($skill == ''){
				$province = "AND current_province = '".$current_province."' ";
			}else{
				$province = "AND a.current_province = '".$current_province."' ";
			}
			
		}

		if($current_city == ''){
			$city = '';
		}else{
			if($skill == ''){
				$city = "AND current_city= '".$current_city."' ";
			}else{
				$city = "AND a.current_city= '".$current_city."' ";
			}
			
		}

		if($current_barangay == ''){
			$barangay = '';
		}else{
			if($skill == ''){
				$barangay = "AND current_barangay = '".$current_barangay."' ";
			}else{
				$barangay = "AND a.current_barangay = '".$current_barangay."' ";
			}
			
		}

		if($award_status == 'all'){
			$employment_award_status = '';
		}else{
			if($skill == ''){
				$employment_award_status = "AND employment_award_status = '".$award_status."' ";
			}else{
				$employment_award_status = "AND a.employment_award_status = '".$award_status."' ";
			}
			
		}

		if($key){

			
			//echo $sqls;

			if($skill == ''){
				$sql = "SELECT DISTINCT(id), f_name, m_name, l_name, age, gender, no_of_dpndts, cel_no, current_address, status, occupation, money_income, property, admin, points, death, injury, missing, sick, disable, none, date_entry, comment, household, employment_award_status, birthdate, working_husband, name_of_enumerator, current_region, current_province, current_city, current_barangay, current_street, before_region, before_province, before_city, before_barangay, before_street, current_region_name, current_province_name, current_city_name, current_barangay_name, before_region_name, before_province_name, before_city_name, before_barangay_name  FROM name_database WHERE {$search_by} LIKE '%$key%' AND (age >= $age_from AND age <= $age_to) {$gender} {$status} {$occupation} {$household} {$property} {$region} {$province} {$city} {$barangay} {$employment_award_status} {$disability}  LIMIT  $page_limit";
			}else{
				$sql = "SELECT DISTINCT(a.id), a.f_name, a.m_name, a.l_name, a.age, a.gender, a.no_of_dpndts, a.cel_no, a.current_address, a.status, a.occupation, a.money_income, a.property, a.admin, a.points, a.death, a.injury, a.missing, a.sick, a.disable, a.none, a.date_entry, a.comment, a.household, a.employment_award_status, a.birthdate, a.working_husband, a.name_of_enumerator, a.current_region, a.current_province, a.current_city, a.current_barangay, a.current_street, a.before_region, a.before_province, a.before_city, a.before_barangay, a.before_street, a.current_region_name, a.current_province_name, a.current_city_name, a.current_barangay_name, a.before_region_name, a.before_province_name, a.before_city_name, a.before_barangay_name  FROM name_database a, skills_log b WHERE a.{$search_by} LIKE '%$key%' AND (a.age >= $age_from AND a.age <= $age_to) {$gender} {$status} {$occupation} {$household} {$property} {$region} {$province} {$city} {$barangay} {$employment_award_status} {$disability} {$skill}  LIMIT  $page_limit";
			}
			
			
				//ORDER BY points DESC
				//$page_offset,
		}else{

			if($skill == ''){
				$sql = "SELECT DISTINCT(id), f_name, m_name, l_name, age, gender, no_of_dpndts, cel_no, current_address, status, occupation, money_income, property, admin, points, death, injury, missing, sick, disable, none, date_entry, comment, household, employment_award_status, birthdate, working_husband, name_of_enumerator, current_region, current_province, current_city, current_barangay, current_street, before_region, before_province, before_city, before_barangay, before_street, current_region_name, current_province_name, current_city_name, current_barangay_name, before_region_name, before_province_name, before_city_name, before_barangay_name FROM name_database WHERE (age >= $age_from AND age <= $age_to) {$gender} {$status} {$occupation} {$household} {$property} {$region} {$province} {$city} {$barangay}  {$employment_award_status} {$disability} LIMIT $page_limit";
			}else{
				$sql = "SELECT DISTINCT(a.id), a.f_name, a.m_name, a.l_name, a.age, a.gender, a.no_of_dpndts, a.cel_no, a.current_address, a.status, a.occupation, a.money_income, a.property, a.admin, a.points, a.death, a.injury, a.missing, a.sick, a.disable, a.none, a.date_entry, a.comment, a.household, a.employment_award_status, a.birthdate, a.working_husband, a.name_of_enumerator, a.current_region, a.current_province, a.current_city, a.current_barangay, a.current_street, a.before_region, a.before_province, a.before_city, a.before_barangay, a.before_street, a.current_region_name, a.current_province_name, a.current_city_name, a.current_barangay_name, a.before_region_name, a.before_province_name, a.before_city_name, a.before_barangay_name FROM name_database a, skills_log b WHERE (a.age >= $age_from AND a.age <= $age_to) {$gender} {$status} {$occupation} {$household} {$property} {$region} {$province} {$city} {$barangay}  {$employment_award_status} {$disability} {$skill} LIMIT $page_limit";
			}
			
			//echo $sqls;
		}
		
		$query = $this->db->query($sql);
		$result = $query->result();
		
		return $result;
	
	}
	
	public function add($firstname, $middlename, $lastname, $age, $gender, $no_of_dependents, $month, $day, $year, $cel_no, $before_region, $before_province, $before_city, $before_barangay, $before_street, $current_region, $current_province, $current_city, $current_barangay, $current_street, $status, $property, $working_husband, $occupation, $skills, $monthly_income, $household, $death, $injury, $missing, $sick, $disable, $none, $admin, $birthdate, $disability_adhd, $disability_blindness, $disability_brain_injuries, $disability_deaf, $disability_learning, $disability_medical, $disability_physical, $disability_psychiatric, $disability_speech){

		$skills_array = explode("," , $skills);
		
		$current_region_name_query = $this->db->query("SELECT Text2 FROM addid2 WHERE ID2 = '$current_region'");
		$current_province_name_query = $this->db->query("SELECT Text3 FROM addid3 WHERE ID3 = '$current_province'");
		$current_city_name_query = $this->db->query("SELECT Text4 FROM addid4 WHERE ID4 = '$current_city'");
		$current_barangay_name_query = $this->db->query("SELECT Text5 FROM addid5 WHERE ID5 = '$current_barangay'");

		$before_region_name_query = $this->db->query("SELECT Text2 FROM addid2 WHERE ID2 = '$before_region'");
		$before_province_name_query = $this->db->query("SELECT Text3 FROM addid3 WHERE ID3 = '$before_province'");
		$before_city_name_query = $this->db->query("SELECT Text4 FROM addid4 WHERE ID4 = '$before_city'");
		$before_barangay_name_query = $this->db->query("SELECT Text5 FROM addid5 WHERE ID5 = '$before_barangay'");
		
		$current_region_name = $current_region_name_query->row()->Text2;
		$current_province_name = $current_province_name_query->row()->Text3;
		$current_city_name = $current_city_name_query->row()->Text4;
		$current_barangay_name = $current_barangay_name_query->row()->Text5;
		
		$before_region_name = $before_region_name_query->row()->Text2;
		$before_province_name = $before_province_name_query->row()->Text3;
		$before_city_name = $before_city_name_query->row()->Text4;
		$before_barangay_name = $before_barangay_name_query->row()->Text5;
		
		$points = $this->evaluate_points($no_of_dependents, $gender, $status, $household, $occupation, $property, $death, $injury, $missing, $sick, $disable, $none, $working_husband);

		if($monthly_income == '' || empty($monthly_income)){
			$monthly_income = 0;
		}
		
		$sql = "INSERT INTO name_database (id, 
											f_name, 
											m_name, 
											l_name, 
											age, 
											gender, 
											no_of_dpndts, 
											cel_no, 
											status, 
											occupation,
											money_income, 
											property,
											admin,
											points,
											death,
											injury,
											missing,
											sick,
											disable,
											none,
											household,
											date_entry,
											before_region,
											before_province,
											before_city,
											before_barangay,
											before_street,
											current_region,
											current_province,
											current_city,
											current_barangay,
											current_street,
											working_husband,
											birthdate,
											current_region_name,
											current_province_name,
											current_city_name,
											current_barangay_name,
											before_region_name,
											before_province_name,
											before_city_name,
											before_barangay_name,
											disability_adhd,
											disability_blindness,
											disability_brain_injuries,
											disability_deaf,
											disability_learning,
											disability_medical,
											disability_physical,
											disability_psychiatric,
											disability_speech
											) 
											VALUES ('', 
											'$firstname',
											'$middlename',
											'$lastname',
											'$age',
											'$gender',
											'$no_of_dependents',
											'$cel_no',
											'$status',
											'$occupation',
											'$monthly_income',
											'$property',
											'$admin',
											'$points',
											'$death',
											'$injury',
											'$missing',
											'$sick',
											'$disable',
											'$none',
											'$household', 
											now(),
											'$before_region',
											'$before_province',
											'$before_city',
											'$before_barangay',
											'$before_street',
											'$current_region',
											'$current_province',
											'$current_city',
											'$current_barangay',
											'$current_street',
											'$working_husband',
											'$birthdate',
											'$current_region_name',
											'$current_province_name',
											'$current_city_name',
											'$current_barangay_name',
											'$before_region_name',
											'$before_province_name',
											'$before_city_name',
											'$before_barangay_name',
											$disability_adhd,
											$disability_blindness,
											$disability_brain_injuries,
											$disability_deaf,
											$disability_learning,
											$disability_medical,
											$disability_physical,
											$disability_psychiatric,
											$disability_speech
											)";
											
		$query = $this->db->query($sql);

		$last_insert_id = $this->db->insert_id();

		foreach($skills_array as $skill_value){
			$skills_sql = "REPLACE INTO skills_log (id, owner_id, skill, points) VALUES ('', '{$last_insert_id}', '{$skill_value}', '')";
			$skills_query = $this->db->query($skills_sql);
		}

		return $last_insert_id;
		
	}
	
	public function update($id, $firstname, $middlename, $lastname, $age, $gender, $no_of_dependents, $month, $day, $year, $cel_no, $before_region, $before_province, $before_city, $before_barangay, $before_street, $current_region, $current_province, $current_city, $current_barangay, $current_street, $status, $property, $working_husband, $occupation, $skills, $monthly_income, $household, $death, $injury, $missing, $sick, $disable, $none, $admin, $birthdate, $disability_adhd, $disability_blindness, $disability_brain_injuries, $disability_deaf, $disability_learning, $disability_medical, $disability_physical, $disability_psychiatric, $disability_speech){

		$skills_array = explode("," , $skills);
		
		$current_region_name_query = $this->db->query("SELECT Text2 FROM addid2 WHERE ID2 = '$current_region'");
		$current_province_name_query = $this->db->query("SELECT Text3 FROM addid3 WHERE ID3 = '$current_province'");
		$current_city_name_query = $this->db->query("SELECT Text4 FROM addid4 WHERE ID4 = '$current_city'");
		$current_barangay_name_query = $this->db->query("SELECT Text5 FROM addid5 WHERE ID5 = '$current_barangay'");

		$before_region_name_query = $this->db->query("SELECT Text2 FROM addid2 WHERE ID2 = '$before_region'");
		$before_province_name_query = $this->db->query("SELECT Text3 FROM addid3 WHERE ID3 = '$before_province'");
		$before_city_name_query = $this->db->query("SELECT Text4 FROM addid4 WHERE ID4 = '$before_city'");
		$before_barangay_name_query = $this->db->query("SELECT Text5 FROM addid5 WHERE ID5 = '$before_barangay'");
		
		$current_region_name = $current_region_name_query->row()->Text2;
		$current_province_name = $current_province_name_query->row()->Text3;
		$current_city_name = $current_city_name_query->row()->Text4;
		$current_barangay_name = $current_barangay_name_query->row()->Text5;
		
		$before_region_name = $before_region_name_query->row()->Text2;
		$before_province_name = $before_province_name_query->row()->Text3;
		$before_city_name = $before_city_name_query->row()->Text4;
		$before_barangay_name = $before_barangay_name_query->row()->Text5;
		
		$points = $this->evaluate_points($no_of_dependents, $gender, $status, $household, $occupation, $property, $death, $injury, $missing, $sick, $disable, $none, $working_husband);

		if($monthly_income == '' || empty($monthly_income)){
			$monthly_income = 0;
		}
		
		$sql = "UPDATE name_database SET
											f_name = '$firstname', 
											m_name = '$middlename', 
											l_name = '$lastname', 
											age = '$age', 
											gender = '$gender', 
											no_of_dpndts = '$no_of_dependents', 
											cel_no = '$cel_no', 
											status = '$status', 
											occupation = '$occupation',
											money_income = '$monthly_income', 
											property = '$property',
											points = '$points',
											death = '$death',
											injury = '$injury',
											missing = '$missing',
											sick = '$sick',
											disable = '$disable',
											none = '$none',
											household = '$household',
											before_region = '$before_region',
											before_province = '$before_province',
											before_city = '$before_city',
											before_barangay = '$before_barangay',
											before_street = '$before_street',
											current_region = '$current_region',
											current_province = '$current_province',
											current_city = '$current_city',
											current_barangay = '$current_barangay',
											current_street = '$current_street',
											working_husband = '$working_husband',
											birthdate = '$birthdate',
											current_region_name = '$current_region_name',
											current_province_name = '$current_province_name',
											current_city_name = '$current_city_name',
											current_barangay_name = '$current_barangay_name',
											before_region_name = '$before_region_name',
											before_province_name = '$before_province_name',
											before_city_name = '$before_city_name',
											before_barangay_name = '$before_barangay_name',
											disability_adhd = $disability_adhd,
											disability_blindness = $disability_blindness,
											disability_brain_injuries = $disability_brain_injuries,
											disability_deaf = $disability_deaf,
											disability_learning = $disability_learning,
											disability_medical = $disability_medical,
											disability_physical = $disability_physical,
											disability_psychiatric = $disability_psychiatric,
											disability_speech = $disability_speech
											WHERE
											id = $id";
		
		$delete_skill_log_sql = "DELETE FROM skills_log WHERE owner_id = {$id}";
		
		$query = $this->db->query($sql);
		$delete_skill_log_query = $this->db->query($delete_skill_log_sql);

		//$last_insert_id = $this->db->insert_id();

		foreach($skills_array as $skill_value){
			$skills_sql = "REPLACE INTO skills_log (id, owner_id, skill, points) VALUES ('', '{$id}', '{$skill_value}', '')";
			$skills_query = $this->db->query($skills_sql);
		}
		
	}
	
	public function get_point_system($status = 'primary'){
		$sql = "SELECT * FROM ilo_point_system WHERE status = '$status' LIMIT 1";
		$query = $this->db->query($sql);
		
		$result = $query->row_array();
		
		return $result;
	}

	public function delete($id){
		$this->db->delete(Record::DB_TABLE, array(Record::DB_TABLE_PK => $id)); 
	}

	public function get_record($id){

		$sql = "SELECT * FROM name_database WHERE id = $id";
		$query = $this->db->query($sql);

		$record = $query->row_array();

		return $record;

	}

	public function rank_results($search_array){

		foreach($search_array as $record){

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
						'points' => $this->evaluate_points($record->no_of_dpndts, $record->gender, $record->status, $record->household, $record->occupation, $record->property, $record->death, $record->injury, $record->missing, $record->sick, $record->disable, $record->none, $record->working_husband),
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

				$rank_result = array();
				foreach($query_records as $key => $row){
					$rank_result[$key] = $row['points'];
				}

				$array_result = array_multisort($rank_result, SORT_DESC, $query_records);

				return $query_records;

				// use asort


	}
}

?>