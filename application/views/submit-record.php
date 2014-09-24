<!--

col-xs = < 768px
col-sm = > 768px
col-md = > 992px
col-lg = > 1200px

-->
<?php
$toolbar_text_prefix = '<span class="label label-xlg label-yellow arrowed-in-right arrowed-in">';
$toolbar_text_suffix = '</span>';

if(is_array($record)){
	$id = $record['id'];
	$firstname = $record['f_name'];
	$middlename = $record['m_name'];
	$lastname = $record['l_name']; 
	$age = $record['age'];
	$age_label = $age;
	$gender = $record['gender']; 
	$no_of_dependents = $record['no_of_dpndts']; 
	$no_of_dependents_label = $no_of_dependents;
	$cel_no = $record['cel_no'];
	$civil_status = $record['status'];
	$employment = $record['occupation'];
	$monthly_income = $record['money_income']; 
	$property = $record['property'];
	$admin = $record['admin'];
	//$points = $record['points'];
	$points_label = $points>0?'Points: '.$toolbar_text_prefix.$points.$toolbar_text_suffix:'Current Record Count: '.$toolbar_text_prefix.$current_records.$toolbar_text_suffix;
	
	$death = $record['death'];
	$injury = $record['injury'];
	$missing = $record['missing'];
	$sick = $record['sick'];
	$disable = $record['disable'];
	$none = $record['none'];
	
	$death_label = $death;
	$injury_label = $injury;
	$missing_label = $missing;
	$sick_label = $sick;
	$disable_label = $disable;
	$none_label = $none;
	
	$household = $record['household'];
	$date_entry = $record['date_entry'];
	$before_region = $record['before_region'];
	$before_province = $record['before_province'];
	$before_city = $record['before_city'];
	$before_barangay = $record['before_barangay'];
	$before_street = $record['before_street'];
	$current_region = $record['current_region'];
	$current_province = $record['current_province'];
	$current_city = $record['current_city'];
	$current_barangay = $record['current_barangay'];
	$current_street = $record['current_street'];
	$working_husband = $record['working_husband'];

	$current_region_name = $record['current_region_name'];
	$current_province_name = $record['current_province_name'];
	$current_city_name = $record['current_city_name'];
	$current_barangay_name = $record['current_barangay_name'];
	$before_region_name = $record['before_region_name'];
	$before_province_name = $record['before_province_name'];
	$before_city_name = $record['before_city_name'];
	$before_barangay_name = $record['before_barangay_name'];

	$birthdate_array = explode('/',$record['birthdate']);
	$birthdate_month = $birthdate_array[0];
	$birthdate_month_label = $birthdate_month;
	$birthdate_day = $birthdate_array[1];
	$birthdate_day_label = $birthdate_day;
	$birthdate_year = $birthdate_array[2];
	$birthdate_year_label = $birthdate_year;

	$disability_adhd = $record['disability_adhd'];
	$disability_blindness = $record['disability_blindness']; 
	$disability_brain_injuries = $record['disability_brain_injuries']; 
	$disability_deaf = $record['disability_deaf'];
	$disability_learning = $record['disability_learning'];
	$disability_medical = $record['disability_medical'];
	$disability_physical = $record['disability_physical'];
	$disability_psychiatric = $record['disability_psychiatric'];
	$disability_speech = $record['disability_speech'];

	$disability_adhd_label = $record['disability_adhd'];
	$disability_blindness_label = $record['disability_blindness']; 
	$disability_brain_injuries_label = $record['disability_brain_injuries']; 
	$disability_deaf_label = $record['disability_deaf'];
	$disability_learning_label = $record['disability_learning'];
	$disability_medical_label = $record['disability_medical'];
	$disability_physical_label = $record['disability_physical'];
	$disability_psychiatric_label = $record['disability_psychiatric'];
	$disability_speech_label = $record['disability_speech'];
}else{

	$post_firstname = $this->input->post('firstname');

	if($post_firstname){
		$id = '';
		$firstname = $post_firstname;
		$middlename = $this->input->post('firstname');
		$lastname = $this->input->post('lastname'); 
		$age = $this->input->post('age');
		$age_label = $this->input->post('age');
		$gender = $this->input->post('gender');
		$no_of_dependents = $this->input->post('no_of_dependents');
		$no_of_dependents_label = $this->input->post('no_of_dependents');
		$cel_no = $this->input->post('cel_no');
		$civil_status = $this->input->post('civil_status');
		$employment = $this->input->post('occupation');
		$monthly_income = $this->input->post('monthly_income');
		$property = $this->input->post('property');
		$admin = '';
		$points = '';
		
		$points_label = $points>0?'Points: '.$toolbar_text_prefix.$points.$toolbar_text_suffix:'Current Record Count: '.$toolbar_text_prefix.$current_records.$toolbar_text_suffix;
		
		$death = $this->input->post('death');
		$injury = $this->input->post('injury');
		$missing = $this->input->post('missing');
		$sick = $this->input->post('sick');
		$disable = $this->input->post('disable');
		$none = $this->input->post('none');
		
		$death_label = $this->input->post('death');
		$injury_label = $this->input->post('injury');
		$missing_label = $this->input->post('missing');
		$sick_label = $this->input->post('sick');
		$disable_label = $this->input->post('disable');
		$none_label = $this->input->post('none');
		
		$household = '';
		$date_entry = '';
		$before_region = '';
		$before_province = '';
		$before_city = '';
		$before_barangay = '';
		$before_street = '';
		$current_region = '';
		$current_province = '';
		$current_city = '';
		$current_barangay = '';
		$current_street = '';
		$working_husband = '';

		$current_region_name = '';
		$current_province_name = '';
		$current_city_name = '';
		$current_barangay_name = '';
		$before_region_name = '';
		$before_province_name = '';
		$before_city_name = '';
		$before_barangay_name = '';
		
		$birthdate_month = '';
		$birthdate_month_label = 'Month';
		$birthdate_day = '';
		$birthdate_day_label = 'Day';
		$birthdate_year = '';
		$birthdate_year_label = 'Year';

		$disability_adhd = $this->input->post('disability_adhd');
		$disability_blindness = $this->input->post('disability_blindness'); 
		$disability_brain_injuries = $this->input->post('disability_brain_injuries'); 
		$disability_deaf = $this->input->post('disability_deaf');
		$disability_learning = $this->input->post('disability_learning');
		$disability_medical = $this->input->post('disability_medical');
		$disability_physical = $this->input->post('disability_physical');
		$disability_psychiatric = $this->input->post('disability_psychiatric');
		$disability_speech = $this->input->post('disability_speech');

		$disability_adhd_label = $this->input->post('disability_adhd');
		$disability_blindness_label = $this->input->post('disability_blindness'); 
		$disability_brain_injuries_label = $this->input->post('disability_brain_injuries'); 
		$disability_deaf_label = $this->input->post('disability_deaf');
		$disability_learning_label = $this->input->post('disability_learning');
		$disability_medical_label = $this->input->post('disability_medical');
		$disability_physical_label = $this->input->post('disability_physical');
		$disability_psychiatric_label = $this->input->post('disability_psychiatric');
		$disability_speech_label = $this->input->post('disability_speech');
	}else{
		$id = '';
		$firstname = '';
		$middlename = '';
		$lastname = ''; 
		$age = '';
		$age_label = '---';
		$gender = ''; 
		$no_of_dependents = ''; 
		$no_of_dependents_label = '---';
		$cel_no = '';
		$civil_status = '';
		$employment = '';
		$monthly_income = ''; 
		$property = '';
		$admin = '';
		$points = '';
		
		$points_label = $points>0?'Points: '.$toolbar_text_prefix.$points.$toolbar_text_suffix:'Current Record Count: '.$toolbar_text_prefix.$current_records.$toolbar_text_suffix;
		
		$death = '';
		$injury = '';
		$missing = '';
		$sick = '';
		$disable = '';
		$none = '';
		
		$death_label = '---';
		$injury_label = '---';
		$missing_label = '---';
		$sick_label = '---';
		$disable_label = '---';
		$none_label = '---';
		
		$household = '';
		$date_entry = '';
		$before_region = '';
		$before_province = '';
		$before_city = '';
		$before_barangay = '';
		$before_street = '';
		$current_region = '';
		$current_province = '';
		$current_city = '';
		$current_barangay = '';
		$current_street = '';
		$working_husband = '';

		$current_region_name = '';
		$current_province_name = '';
		$current_city_name = '';
		$current_barangay_name = '';
		$before_region_name = '';
		$before_province_name = '';
		$before_city_name = '';
		$before_barangay_name = '';
		
		$birthdate_month = '';
		$birthdate_month_label = 'Month';
		$birthdate_day = '';
		$birthdate_day_label = 'Day';
		$birthdate_year = '';
		$birthdate_year_label = 'Year';

		$disability_adhd = '';
		$disability_blindness = '';
		$disability_brain_injuries = '';
		$disability_deaf = '';
		$disability_learning = '';
		$disability_medical = '';
		$disability_physical = '';
		$disability_psychiatric = '';
		$disability_speech = '';

		$disability_adhd_label = '---';
		$disability_blindness_label = '---';
		$disability_brain_injuries_label = '---';
		$disability_deaf_label = '---';
		$disability_learning_label = '---';
		$disability_medical_label = '---';
		$disability_physical_label = '---';
		$disability_psychiatric_label = '---';
		$disability_speech_label = '---';
	}

	
}



?>

<!-- success message -->
<?php if($success_add): ?>
	<div class="row">
		<div class="alert alert-success alert-block">
				<button type="button" class="close" data-dismiss="alert">
					<i class="icon-remove"></i>
				</button>

				<p>
					<strong>
						<i class="icon-check"></i>
						Record was successfully added.
					</strong>
				</p>
				<p>
					If you want to edit the previously added record, just click <a class="btn btn-sm btn-success" href="<?php echo base_url('records/edit/'.$last_insert_id); ?>">Edit Previous Record</a>
				</p>
			</div>
	</div>
<?php endif; ?>


<?php if($success_edit): ?>
	<div class="row">
		<div class="alert alert-success alert-block">
				<button type="button" class="close" data-dismiss="alert">
					<i class="icon-remove"></i>
				</button>

				<p>
					<strong>
						<i class="icon-check"></i>
						Record was successfully updated.
					</strong>
				</p>
			</div>
	</div>
<?php endif; ?>


<div class="row">
	<div class="col-xs-12 col-sm-12">
		<!-- the form -->
		<div class="widget-box">
			<div class="widget-header header-color-blue">
				<h4>
					<i class="icon-pencil"></i>
					Record
					<div class="widget-toolbar">
						<?php echo $points_label; ?>
					</div>
				</h4>
			</div>

			<div class="widget-body">
				<div class="widget-main no-padding">
					<form name="add_new_record" id="add-new-record" action='<?php echo $action; ?>' method='POST'>
						<fieldset>
							<div class="row">
								<div class="col-sm-8">
									<div class="row">
										<div class="form-group col-sm-4">
											<label class="col-sm-12 col-xs-12 bolder">First Name <span class="text-danger">*</span></label>
											<input class="col-sm-12 col-xs-12" type="text" placeholder="Input Firstname" name="firstname" id="firstname" value="<?php echo $firstname; ?>">
										</div>

										<div class="form-group col-sm-4">
											<label class="col-sm-12 col-xs-12 bolder">
												Middle Name
												<span class="badge badge-info tooltip-top" data-rel="tooltip" title="" 
												data-original-title="ex. C. or Calderon">
													<i class="icon-question"></i>
												</span>
											</label>
											<input class="col-sm-12 col-xs-12" type="text" placeholder="Input Middlename" name="middlename" id="middlename" value="<?php echo $middlename; ?>">
										</div>

										<div class="form-group col-sm-4">
											<label class="col-sm-12 col-xs-12 bolder">Last Name <span class="text-danger">*</span></label>
											<input class="col-sm-12 col-xs-12" type="text" placeholder="Input Lastname" name="lastname" id="lastname" value="<?php echo $lastname; ?>">
										</div>
									</div>

									<div class="row">
										<div class="form-group col-sm-7 col-xs-12">
											<label class="col-sm-3 col-xs-3 bolder">Gender <span class="text-danger">*</span></label>
											<div class="col-sm-8 col-xs-7">
												<div class="radio">
													<label>
														<input name="gender" id="gender-male" value="male" type="radio" class="ace" <?php echo verify_checkbox_active($gender, 'male'); ?> />
														<span class="lbl"> Male</span>
													</label>
												</div>

												<div class="radio">
													<label>
														<input name="gender" id="gender-female" value="female" type="radio" class="ace" <?php echo verify_checkbox_active($gender, 'female'); ?> />
														<span class="lbl"> Female</span>
													</label>
												</div>
												
												
											</div>
										</div>
									</div>

									<div class="row">
										<div class="form-group col-sm-12 col-xs-12">
											<label class="col-sm-2 col-xs-4 bolder">Birthdate <span class="text-danger">*</span></label>
											<select name="month" id="month">
												<?php echo select_month(true, $birthdate_month); ?>
												<?php echo select_month(); ?>
											</select>

											<select name="day" id="day">
												<option value="<?php echo $birthdate_day; ?>"><?php echo $birthdate_day_label; ?></option>
												<?php echo select_day(); ?>
											</select>

											<select name="year" id="year">
												<option value="<?php echo $birthdate_year; ?>"><?php echo $birthdate_year_label; ?></option>
												<?php echo select_year(); ?>
											</select>
										</div>
									</div>
								</div>

								<div class="col-sm-4">
									<div class="row">
										<div class="form-group col-sm-12 col-xs-12">
											<div class="row">&nbsp;</div>
											<label class="col-sm-6 col-xs-7 bolder">Age <span class="text-danger">*</span></label>
											<select class="form-control input-small col-sm-6" id="age" name="age">
												<option value="<?php echo $age; ?>"><?php echo $age_label; ?></option>
												<?php echo select_number(15, 99) ?>
											</select>
										</div>
									</div>

									<div class="row">
										<div class="form-group col-sm-12 col-xs-12">
											<label class="col-sm-6 col-xs-7 bolder">No. of Dependents <span class="text-danger">*</span></label>
											<select class="form-control input-small col-sm-6 col-xs-5" id="no_of_dependents" name="no_of_dependents">
												<option value="<?php echo $no_of_dependents; ?>"><?php echo $no_of_dependents_label; ?></option>
												<?php echo select_number(0, 99) ?>
											</select>
										</div>
									</div>



								
									<div class="row">
										<div class="form-group col-sm-12 col-xs-12">
											<label class="col-sm-6 col-xs-12 bolder">Cel/Tel No.</label>
											<input class="col-sm-6 col-xs-12" type="text" placeholder="Input Cell or Tel. No." name="cel_no" id="cel_no" value="<?php echo $cel_no; ?>">
										</div>
									</div>
								</div>

							</div>



							<div class="row">
								<label class="col-sm-12 col-xs-12 text-primary bolder">
									ADDRESS BEFORE
									<span class="badge badge-info tooltip-top" data-rel="tooltip" title="" 
										data-original-title="Address before the calamity happened.">
										<i class="icon-question"></i>
									</span>
								</label>

								<div class="form-group col-sm-3">
									<label class="col-sm-12 col-xs-12 bolder">Region</label>
									<select class="form-control col-sm-12 col-xs-12" id="before_region_select" name="before_region">
										<?php if($before_region_name != ''): ?>
											<option value="<?php echo $before_region; ?>"><?php echo $before_region_name; ?></option>
										<?php endif; ?>
										<?php echo $regions_select; ?>
									</select>
								</div>

								<div class="form-group col-sm-3">
									<label class="col-sm-12 col-xs-12 bolder">Province</label>
									<select class="form-control col-sm-12 col-xs-12" id="before_province_select" name="before_province">
										<?php echo $before_provinces_select; ?>
									</select>
								</div>

								<div class="form-group col-sm-3">
									<label class="col-sm-12 col-xs-12 bolder">City</label>
									<select class="form-control col-sm-12 col-xs-12" id="before_city_select" name="before_city">
										<?php echo $before_cities_select; ?>
									</select>
								</div>
							</div>

							<div class="row">
								<div class="form-group col-sm-3">
									<label class="col-sm-12 col-xs-12 bolder">Barangay</label>
									<select class="form-control col-sm-12 col-xs-12" id="before_barangay_select" name="before_barangay">
										<?php echo $before_barangays_select; ?>
									</select>
								</div>

								<div class="form-group col-sm-6">
									<label class="col-sm-12 col-xs-12 bolder">
										Street
										<span class="badge badge-info tooltip-top" data-rel="tooltip" title="" 
											data-original-title="ex. Blk.6, Lot 2, Apple Street.">
											<i class="icon-question"></i>
										</span>
									</label>
									<input class="col-sm-12 col-xs-12" type="text" placeholder="Input Street" name="before_street" id="before_street" value="<?php echo $before_street; ?>">
								</div>
							</div>


							<div class="row">
								<label class="col-sm-12 col-xs-12 text-primary bolder">
									CURRENT ADDRESS
									<span class="badge badge-info tooltip-top" data-rel="tooltip" title="" 
										data-original-title="Address after the calamity happened.">
										<i class="icon-question"></i>
									</span>
								</label>

								<div class="form-group col-sm-3">
									<label class="col-sm-12 col-xs-12 bolder">Region <span class="text-danger">*</span></label>
									<select class="form-control col-sm-12 col-xs-12" id="current_region_select" name="current_region">
										<?php if($current_region_name != ''): ?>
											<option value="<?php echo $current_region; ?>"><?php echo $current_region_name; ?></option>
										<?php endif; ?>
										<?php echo $regions_select; ?>
									</select>
								</div>

								<div class="form-group col-sm-3">
									<label class="col-sm-12 col-xs-12 bolder">Province <span class="text-danger">*</span></label>
									<select class="form-control col-sm-12 col-xs-12" id="current_province_select" name="current_province">
										<?php echo $current_provinces_select; ?>
									</select>
								</div>

								<div class="form-group col-sm-3">
									<label class="col-sm-12 col-xs-12 bolder">City <span class="text-danger">*</span></label>
									<select class="form-control col-sm-12 col-xs-12" id="current_city_select" name="current_city">
										<?php echo $current_cities_select; ?>
									</select>
								</div>
							</div>

							<div class="row">
								<div class="form-group col-sm-3">
									<label class="col-sm-12 col-xs-12 bolder">Barangay <span class="text-danger">*</span></label>
									<select class="form-control col-sm-12 col-xs-12" id="current_barangay_select" name="current_barangay">
										<?php echo $current_barangays_select; ?>
									</select>
								</div>

								<div class="form-group col-sm-6">
									<label class="col-sm-12 col-xs-12 bolder">
										Street
										<span class="badge badge-info tooltip-top" data-rel="tooltip" title="" 
											data-original-title="ex. Blk.6, Lot 2, Apple Street.">
											<i class="icon-question"></i>
										</span>
									</label>
									<input class="col-sm-12 col-xs-12" type="text" placeholder="Input Street" name="current_street" id="current_street" value="<?php echo $current_street; ?>">
								</div>
							</div>

							<div class="row">
								<div class="form-group col-sm-3 col-xs-12">
									<label class="col-sm-5 col-xs-3 bolder">Civil Status <span class="text-danger">*</span></label>
									<div class="col-sm-7 col-xs-7">
										<div class="radio">
											<label>
												<input name="civil_status" id="civil-status-single" type="radio" class="ace" value="single" <?php echo verify_checkbox_active($civil_status, 'single'); ?> />
												<span class="lbl"> Single</span>
											</label>
										</div>
										<div class="radio">
											<label>
												<input name="civil_status" id="civil-status-married" type="radio" class="ace" value="married" <?php echo verify_checkbox_active($civil_status, 'married'); ?>  />
												<span class="lbl"> Married</span>
											</label>
										</div>
										<div class="radio">
											<label>
												<input name="civil_status" id="civil-status-widowed" type="radio" class="ace" value="widow" <?php echo verify_checkbox_active($civil_status, 'widow'); ?> />
												<span class="lbl"> Widowed</span>
											</label>
										</div>
									</div>
								</div>

								<div class="form-group col-sm-4 col-xs-12 col-sm-offset-5">
									<label class="col-sm-4 col-xs-3 bolder">
										Damages to Property <span class="text-danger">*</span>
										<span class="badge badge-info tooltip-top" data-rel="tooltip" title="" 
											data-original-title="Damage to previous property or home.">
											<i class="icon-question"></i>
										</span>
									</label>
									<div class="col-sm-8 col-xs-7">
										<div class="radio">
											<label>
												<input name="property" id="property-partially" type="radio" class="ace" value="partially damage" <?php echo verify_checkbox_active($property, 'partially damage'); ?> />
												<span class="lbl"> Partially Damaged</span>
											</label>
										</div>
										<div class="radio">
											<label>
												<input name="property" id="property-totally" type="radio" class="ace" value="totally damage" <?php echo verify_checkbox_active($property, 'totally damage'); ?> />
												<span class="lbl"> Totally Damaged</span>
											</label>
										</div>
										<div class="radio">
											<label>
												<input name="property" id="property-flooded" type="radio" class="ace" value="flooded" <?php echo verify_checkbox_active($property, 'flooded'); ?> />
												<span class="lbl"> Flooded</span>
											</label>
										</div>
										<div class="radio">
											<label>
												<input name="property" id="property-na" type="radio" class="ace" value="N/A" <?php echo verify_checkbox_active($property, 'N/A'); ?> />
												<span class="lbl"> N/A</span>
											</label>
										</div>
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-sm-12 col-xs-12">
									<div class="widget-box">
										<div class="widget-header">
											<label class="bolder text-primary">For Married Only</label>
										</div>


										<div class="widget-body">
											<div class="widget-main">
													<div class="row">
														<label class="col-sm-2 col-xs-6 bolder">Working Husband?</label>
														<label class=" col-sm-3 col-xs-3">
															<!--<label>-->
																<input name="working_husband" id="working_husband" class="ace ace-switch ace-switch-2" type="checkbox" value="yes" <?php echo verify_checkbox_active($working_husband, 'yes'); ?>  >
																<span class="lbl"></span>
															<!--</label>-->
														</label>
													</div>
													
											</div>
										</div>
									</div>
								</div>	
							</div>
							
							<div class="row">&nbsp;</div>

							<div class="row">
								<div class="form-group col-sm-4 col-xs-12">
									<div class="row">
										<div class="form-group col-sm-12 col-xs-12">
											<label class="col-sm-4 col-xs-3 bolder">Occupation <span class="text-danger">*</span></label>
											<div class="col-sm-8 col-xs-7">
												<div class="radio">
													<label>
														<input name="occupation" id="occupation-employed" type="radio" class="ace" value="employed" <?php echo verify_checkbox_active($employment, 'employed'); ?> />
														<span class="lbl"> Employed</span>
													</label>
												</div>
												<div class="radio">
													<label>
														<input name="occupation" id="occupation-self-employed" type="radio" class="ace" value="self-employed" <?php echo verify_checkbox_active($employment, 'self-employed'); ?> />
														<span class="lbl"> Self Employed</span>
													</label>
												</div>
												<div class="radio">
													<label>
														<input name="occupation" id="occupation-un-employed" type="radio" class="ace" value="un-employed" <?php echo verify_checkbox_active($employment, 'un-employed'); ?> />
														<span class="lbl"> Unemployed</span>
													</label>
												</div>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="form-group col-sm-12 col-xs-12">
											<label class="col-sm-5 col-xs-12 bolder" for="form-field-tags">
												Skills
												<span class="badge badge-info tooltip-top" data-rel="tooltip" title="" 
													data-original-title="ex. Cooking, Household Cleaning.">
													<i class="icon-question"></i>
												</span>
											</label>
											<input class="col-sm-7 col-xs-12" type="text" name="skills" id="skills" value="<?php echo $skills; ?>" placeholder="Input Skills" data-rel="tooltip" title="" data-original-title="Skills must be separated with commas (  ,  )" >
										</div>
									</div>
									<div class="row">
										<div class="form-group col-sm-12 col-xs-12">
											<label class="col-sm-5 col-xs-12 bolder">
												Monthly Income <span class="text-danger">*</span>
												<span class="badge badge-info tooltip-top" data-rel="tooltip" title="" 
													data-original-title="ex. 1000.00 or 2,000.00 or 3,000 or 4000">
													<i class="icon-question"></i>
												</span>
											</label>
											<input class="col-sm-7 col-xs-12" type="text" placeholder="Input Monthly Income" name="monthly_income" id="monthly_income" value="<?php echo $monthly_income; ?>">
										</div>
									</div>
									<div class="row">
										<div class="form-group col-sm-12 col-xs-12">
											<label class="col-sm-5 col-xs-6 bolder">Head of Family?</label>
											<div class="col-xs-3">
												<label>
													<input name="head_of_family" id="head_of_family" class="ace ace-switch ace-switch-2" type="checkbox" value="yes" <?php echo verify_checkbox_active($household, 'yes'); ?> >
													<span class="lbl"></span>
												</label>
											</div>
										</div>
									</div>
								</div>

								<div class="form-group col-sm-4 col-xs-12">
									<label class="col-sm-12 col-xs-12 bolder text-primary">
										DAMAGE TO LIFE
										<span class="badge badge-info tooltip-top" data-rel="tooltip" title="" 
											data-original-title="Please select current no. of person involved in the following tragedy. If none, select no. of person who were not involved on the none select box.">
											<i class="icon-question"></i>
										</span>
									</label>
									<div class="col-sm-12">
										<div class="row">
											<div class="form-group col-sm-12 col-xs-12">
												<label class="col-sm-8 col-xs-6 bolder">Death <span class="text-danger">*</span></label>
												<select class="form-control input-mini col-sm-4" id="death" name="death">
													<option value="<?php echo $death; ?>"><?php echo $death_label; ?></option>
													<?php echo select_number(0,99); ?>
												</select>
											</div>
										</div>
										<div class="row">
											<div class="form-group col-sm-12 col-xs-12">
												<label class="col-sm-8 col-xs-6 bolder">Injury <span class="text-danger">*</span></label>
												<select class="form-control input-mini col-sm-4" id="injury" name="injury">
													<option value="<?php echo $injury; ?>"><?php echo $injury_label; ?></option>
													<?php echo select_number(0,99); ?>
												</select>
											</div>
										</div>
										<div class="row">
											<div class="form-group col-sm-12 col-xs-12">
												<label class="col-sm-8 col-xs-6 bolder">Missing <span class="text-danger">*</span></label>
												<select class="form-control input-mini col-sm-4" id="missing" name="missing">
													<option value="<?php echo $missing; ?>"><?php echo $missing_label; ?></option>
													<?php echo select_number(0,99); ?>
												</select>
											</div>
										</div>
										<div class="row">
											<div class="form-group col-sm-12 col-xs-12">
												<label class="col-sm-8 col-xs-6 bolder">Sick <span class="text-danger">*</span></label>
												<select class="form-control input-mini col-sm-4" id="sick" name="sick">
													<option value="<?php echo $sick; ?>"><?php echo $sick_label; ?></option>
													<?php echo select_number(0,99); ?>
												</select>
											</div>
										</div>
										<div class="row">
											<div class="form-group col-sm-12 col-xs-12">
												<label class="col-sm-8 col-xs-6 bolder">Disable <span class="text-danger">*</span></label>
												<select class="form-control input-mini col-sm-4" id="disable" name="disable">
													<option value="<?php echo $disable; ?>"><?php echo $disable_label; ?></option>
													<?php echo select_number(0,99); ?>
												</select>
											</div>
										</div>
										<div class="row">
											<div class="form-group col-sm-12 col-xs-12">
												<label class="col-sm-8 col-xs-6 bolder">none <span class="text-danger">*</span></label>
												<select class="form-control input-mini col-sm-4" id="none" name="none">
													<option value="<?php echo $none; ?>"><?php echo $none_label; ?></option>
													<?php echo select_number(0,99); ?>
												</select>
											</div>
										</div>
									</div>
								</div>

								<div class="form-group col-sm-4 col-xs-12">
									<label class="col-sm-12 col-xs-12 bolder text-primary">
										DISABILITIES
										<span class="badge badge-info tooltip-top" data-rel="tooltip" title="" 
											data-original-title="Specific number of disabilities found in the family.">
											<i class="icon-question"></i>
										</span>
									</label>
									<div class="col-sm-12">
										<div class="row">
											<div class="form-group col-sm-12 col-xs-12">
												<label class="col-sm-8 col-xs-6 bolder">Attention-Deficit/Hyperactivity Disorders </label>
												<select class="form-control input-mini col-sm-4" id="adhd" name="adhd">
													<option value="<?php echo $disability_adhd; ?>"><?php echo $disability_adhd_label; ?></option>
													<?php echo select_number(0,99); ?>
												</select>
											</div>
										</div>
										<div class="row">
											<div class="form-group col-sm-12 col-xs-12">
												<label class="col-sm-8 col-xs-6 bolder">Blindness or Low Vision </label>
												<select class="form-control input-mini col-sm-4" id="blindness" name="blindness">
													<option value="<?php echo $disability_blindness; ?>"><?php echo $disability_blindness_label; ?></option>
													<?php echo select_number(0,99); ?>
												</select>
											</div>
										</div>
										<div class="row">
											<div class="form-group col-sm-12 col-xs-12">
												<label class="col-sm-8 col-xs-6 bolder">Brain Injuries </label>
												<select class="form-control input-mini col-sm-4" id="brain_injury" name="brain_injury">
													<option value="<?php echo $disability_brain_injuries; ?>"><?php echo $disability_brain_injuries_label; ?></option>
													<?php echo select_number(0,99); ?>
												</select>
											</div>
										</div>
										<div class="row">
											<div class="form-group col-sm-12 col-xs-12">
												<label class="col-sm-8 col-xs-6 bolder">Deaf/Hard-of-Hearing </label>
												<select class="form-control input-mini col-sm-4" id="deaf_hearing" name="deaf_hearing">
													<option value="<?php echo $disability_deaf; ?>"><?php echo $disability_deaf_label; ?></option>
													<?php echo select_number(0,99); ?>
												</select>
											</div>
										</div>
										<div class="row">
											<div class="form-group col-sm-12 col-xs-12">
												<label class="col-sm-8 col-xs-6 bolder">Learning Disabilities </label>
												<select class="form-control input-mini col-sm-4" id="learning_disability" name="learning_disability">
													<option value="<?php echo $disability_learning; ?>"><?php echo $disability_learning_label; ?></option>
													<?php echo select_number(0,99); ?>
												</select>
											</div>
										</div>
										<div class="row">
											<div class="form-group col-sm-12 col-xs-12">
												<label class="col-sm-8 col-xs-6 bolder">Medical Disabilities </label>
												<select class="form-control input-mini col-sm-4" id="medical_disability" name="medical_disability">
													<option value="<?php echo $disability_medical; ?>"><?php echo $disability_medical_label; ?></option>
													<?php echo select_number(0,99); ?>
												</select>
											</div>
										</div>
										<div class="row">
											<div class="form-group col-sm-12 col-xs-12">
												<label class="col-sm-8 col-xs-6 bolder">Physical Disabilities </label>
												<select class="form-control input-mini col-sm-4" id="physical_disability" name="physical_disability">
													<option value="<?php echo $disability_physical; ?>"><?php echo $disability_physical_label; ?></option>
													<?php echo select_number(0,99); ?>
												</select>
											</div>
										</div>
										<div class="row">
											<div class="form-group col-sm-12 col-xs-12">
												<label class="col-sm-8 col-xs-6 bolder">Psychiatric Disabilities </label>
												<select class="form-control input-mini col-sm-4" id="psychiatric_disability" name="psychiatric_disability">
													<option value="<?php echo $disability_psychiatric; ?>"><?php echo $disability_psychiatric_label; ?></option>
													<?php echo select_number(0,99); ?>
												</select>
											</div>
										</div>
										<div class="row">
											<div class="form-group col-sm-12 col-xs-12">
												<label class="col-sm-8 col-xs-6 bolder">Speech and Language Disabilities </label>
												<select class="form-control input-mini col-sm-4" id="speech_disability" name="speech_disability">
													<option value="<?php echo $disability_speech; ?>"><?php echo $disability_speech_label; ?></option>
													<?php echo select_number(0,99); ?>
												</select>
											</div>
										</div>
									</div>
								</div>
							</div>

								
							<div class="row">
								<div class="col-sm-4 col-xs-12">
									<label class="col-sm-4 col-xs-5 bolder">Date Today:</label>
									<label class="col-sm-8 col-xs-7"><?php echo Date('F d, Y'); ?></label>
								</div>
							</div>




							<?php
							echo validation_errors('<div class="alert alert-danger">
							<button type="button" class="close" data-dismiss="alert">
								<i class="icon-remove"></i>
							</button>

							<strong>
								<i class="icon-remove"></i>
									Update Failed
							</strong>', '<br>
							</div>'); 
							?>

						</fieldset>

						<div class="form-actions center">
							<button id="back-history" type="button" class="btn btn-sm btn-info" name="back_history">
								Back
								<i class="icon-arrow-left icon-on-left bigger-110"></i>
							</button>
							<button type="submit" class="btn btn-sm btn-success" name="submit_record">
								Submit
								<i class="icon-arrow-right icon-on-right bigger-110"></i>
							</button>
						</div>
					</form>
				</div>
			</div>

		</div>
	</div>
</div>