<?php

	if($point_system_array){

		$id = $point_system_array['id'];
		$male_point = $point_system_array['male'];
		$female_point = $point_system_array['female'];
		$single_point = $point_system_array['single'];
		$married_point = $point_system_array['married'];
		$widow_point = $point_system_array['widow'];
		$household_yes_point = $point_system_array['household_yes'];
		$household_no_point = $point_system_array['household_no'];

		$skill_with_point = $point_system_array['skill_with'];
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

		$working_husband = $point_system_array['working_husband'];


	}

	$update_point_system = base_url('admin/point-system');

	$terms = "";
	$terms .= "<h3>Terms</h3>";
	$terms .= "<p><strong>Minimum</strong> - Minimum value that the designated point is counted. It usually starts at 0</p>";
	$terms .= "<p><strong>Threshold</strong> - Maximum value that the designated point is counted. When this point is reached and it is higher than the threshold, it will stop adding more values to it."
	
?>

<!--

col-xs = < 768px
col-sm = > 768px
col-md = > 992px
col-lg = > 1200px

-->

<div class="row">
	<div class="col-xs-12 col-sm-7">
		<div class="widget-box">
			<div class="widget-header header-color-blue">
				<h4>
					<i class="icon-pencil"></i>
					Edit Point System
				</h4>

				<a class="badge badge-danger tooltip-top" data-rel="popover" title="" data-content="<?php echo $terms; ?>" data-original-title="">
					<i class="icon-question"></i>
				</a>
			</div>

			<div class="widget-body">
				<div class="widget-main no-padding">

					<?php if($success): ?>

						<div class="alert alert-success">
							<button type="button" class="close" data-dismiss="alert">
								<i class="icon-remove"></i>
							</button>
							<strong>Point System Update Successfull</strong>
						</div>

					<?php endif; ?>

					<div class="alert alert-info">
						<button type="button" class="close" data-dismiss="alert">
							<i class="icon-remove"></i>
						</button>
						<strong>Note:</strong>
						Changing the point system will be significant on ranking each record.
						<br>
					</div>



					<form name='update_admin_form' action="<?php echo $update_point_system; ?>" method='POST'>
						<fieldset>

							<label class="col-xs-12 bolder text-success"><h3><h3>GENDER</h3></label>

							<div class="form-group col-sm-12 col-xs-12">
								<label class="col-xs-8 bolder">Male</label>
								<select class="form-control input-mini col-xs-4" id="male_point" name="male_point">
									<option value="<?php echo $male_point; ?>"><?php echo $male_point; ?></option>
									<?php echo select_number(0,11); ?>
								</select>
								<input type="hidden" name="id" value="<?php echo $id; ?>">
							</div>

							<div class="form-group col-sm-12 col-xs-12">
								<label class="col-xs-8 bolder">Female</label>
								<select class="form-control input-mini col-xs-4" id="female_point" name="female_point">
									<option value="<?php echo $female_point; ?>"><?php echo $female_point; ?></option>
									<?php echo select_number(0,11); ?>
								</select>
							</div>



							<label class="col-xs-12 bolder text-success"><h3>CIVIL STATUS</h3></label>

							<div class="form-group col-sm-12 col-xs-12">
								<label class="col-xs-8 bolder">Single</label>
								<select class="form-control input-mini col-xs-4" id="single_point" name="single_point">
									<option value="<?php echo $single_point; ?>"><?php echo $single_point; ?></option>
									<?php echo select_number(0,11); ?>
								</select>
							</div>

							<div class="form-group col-sm-12 col-xs-12">
								<label class="col-xs-8 bolder">Married</label>
								<select class="form-control input-mini col-xs-4" id="married_point" name="married_point">
									<option value="<?php echo $married_point; ?>"><?php echo $married_point; ?></option>
									<?php echo select_number(0,11); ?>
								</select>
							</div>

							<div class="form-group col-sm-12 col-xs-12">
								<label class="col-xs-8 bolder">Widow</label>
								<select class="form-control input-mini col-xs-4" id="widow_point" name="widow_point">
									<option value="<?php echo $widow_point; ?>"><?php echo $widow_point; ?></option>
									<?php echo select_number(0,11); ?>
								</select>
							</div>




							<label class="col-xs-12 bolder text-success"><h3>EMPLOYMENT</h3></label>

							<div class="form-group col-sm-12 col-xs-12">
								<label class="col-xs-8 bolder">Employed</label>
								<select class="form-control input-mini col-xs-4" id="employed_point" name="employed_point">
									<option value="<?php echo $employed_point; ?>"><?php echo $employed_point; ?></option>
									<?php echo select_number(0,11); ?>
								</select>
							</div>

							<div class="form-group col-sm-12 col-xs-12">
								<label class="col-xs-8 bolder">Self-Employed</label>
								<select class="form-control input-mini col-xs-4" id="self_employed_point" name="self_employed_point">
									<option value="<?php echo $self_employed_point; ?>"><?php echo $self_employed_point; ?></option>
									<?php echo select_number(0,11); ?>
								</select>
							</div>

							<div class="form-group col-sm-12 col-xs-12">
								<label class="col-xs-8 bolder">Unemployed</label>
								<select class="form-control input-mini col-xs-4" id="unemployed_point" name="unemployed_point">
									<option value="<?php echo $unemployed_point; ?>"><?php echo $unemployed_point; ?></option>
									<?php echo select_number(0,11); ?>
								</select>
							</div>



							<label class="col-xs-12 bolder text-success"><h3>PROPERTY</h3></label>

							<div class="form-group col-sm-12 col-xs-12">
								<label class="col-xs-8 bolder">Totally Damaged</label>
								<select class="form-control input-mini col-xs-4" id="property_totally_damaged_point" name="property_totally_damaged_point">
									<option value="<?php echo $property_totally_damaged_point; ?>"><?php echo $property_totally_damaged_point; ?></option>
									<?php echo select_number(0,11); ?>
								</select>
							</div>

							<div class="form-group col-sm-12 col-xs-12">
								<label class="col-xs-8 bolder">Partially Damaged</label>
								<select class="form-control input-mini col-xs-4" id="property_partially_damaged_point" name="property_partially_damaged_point">
									<option value="<?php echo $property_partially_damaged_point; ?>"><?php echo $property_partially_damaged_point; ?></option>
									<?php echo select_number(0,11); ?>
								</select>
							</div>

							<div class="form-group col-sm-12 col-xs-12">
								<label class="col-xs-8 bolder">Flooded</label>
								<select class="form-control input-mini col-xs-4" id="property_flooded_point" name="property_flooded_point">
									<option value="<?php echo $property_not_available_point; ?>"><?php echo $property_flooded_point; ?></option>
									<?php echo select_number(0,11); ?>
								</select>
							</div>

							<div class="form-group col-sm-12 col-xs-12">
								<label class="col-xs-8 bolder">
									Not Available
									<span class="badge badge-info tooltip-top" data-rel="tooltip" title="" 
									data-original-title="Point given when a person declared property as not available">
										<i class="icon-question"></i>
									</span>
								</label>
								<select class="form-control input-mini col-xs-4" id="property_not_available_point" name="property_not_available_point">
									<option value="<?php echo $property_not_available_point; ?>"><?php echo $property_not_available_point; ?></option>
									<?php echo select_number(0,11); ?>
								</select>
							</div>



							<label class="col-xs-12 bolder text-success"><h3>DAMAGE TO LIFE</h3></label>

							<div class="form-group col-sm-12 col-xs-12">
								<label class="col-xs-8 bolder">
									Point per Death
									
								</label>
								<select class="form-control input-mini col-xs-4" id="death_point" name="death_point">
									<option value="<?php echo $death_point; ?>"><?php echo $death_point; ?></option>
									<?php echo select_number(0,11); ?>
								</select>
							</div>
							
							<div class="form-group col-sm-12 col-xs-12">
								<label class="col-xs-8 bolder">
									Death Point Minimum
									
								</label>
								<select class="form-control input-mini col-xs-4" id="death_min" name="death_min">
									<option value="<?php echo $death_min; ?>"><?php echo $death_min; ?></option>
									<?php echo select_number(0,11); ?>
								</select>
							</div>

							<div class="form-group col-sm-12 col-xs-12">
								<label class="col-xs-8 bolder">Death Point Threshold</label>
								<select class="form-control input-mini col-xs-4" id="death_max" name="death_max">
									<option value="<?php echo $death_max; ?>"><?php echo $death_max; ?></option>
									<?php echo select_number(0,11); ?>
								</select>
							</div>
							
							<div class="col-sm-12 col-xs-12 hr hr-dotted"></div>

							<div class="form-group col-sm-12 col-xs-12">
								<label class="col-xs-8 bolder">Point per Injury</label>
								<select class="form-control input-mini col-xs-4" id="injury_point" name="injury_point">
									<option value="<?php echo $injury_point; ?>"><?php echo $injury_point; ?></option>
									<?php echo select_number(0,11); ?>
								</select>
							</div>
							
							<div class="form-group col-sm-12 col-xs-12">
								<label class="col-xs-8 bolder">Injury Point Minimum</label>
								<select class="form-control input-mini col-xs-4" id="injury_min" name="injury_min">
									<option value="<?php echo $injury_min; ?>"><?php echo $injury_min; ?></option>
									<?php echo select_number(0,11); ?>
								</select>
							</div>

							<div class="form-group col-sm-12 col-xs-12">
								<label class="col-xs-8 bolder">Injury Threshold</label>
								<select class="form-control input-mini col-xs-4" id="injury_max" name="injury_max">
									<option value="<?php echo $injury_max; ?>"><?php echo $injury_max; ?></option>
									<?php echo select_number(0,11); ?>
								</select>
							</div>
							
							<div class="col-sm-12 col-xs-12 hr hr-dotted"></div>

							<div class="form-group col-sm-12 col-xs-12">
								<label class="col-xs-8 bolder">Point per Missing</label>
								<select class="form-control input-mini col-xs-4" id="missing_point" name="missing_point">
									<option value="<?php echo $missing_point; ?>"><?php echo $missing_point; ?></option>
									<?php echo select_number(0,11); ?>
								</select>
							</div>
							
							<div class="form-group col-sm-12 col-xs-12">
								<label class="col-xs-8 bolder">Missing Point Minimum</label>
								<select class="form-control input-mini col-xs-4" id="missing_min" name="missing_min">
									<option value="<?php echo $missing_min; ?>"><?php echo $missing_min; ?></option>
									<?php echo select_number(0,11); ?>
								</select>
							</div>

							<div class="form-group col-sm-12 col-xs-12">
								<label class="col-xs-8 bolder">Missing Threshold</label>
								<select class="form-control input-mini col-xs-4" id="missing_max" name="missing_max">
									<option value="<?php echo $missing_max; ?>"><?php echo $missing_max; ?></option>
									<?php echo select_number(0,11); ?>
								</select>
							</div>
							
							<div class="col-sm-12 col-xs-12 hr hr-dotted"></div>

							<div class="form-group col-sm-12 col-xs-12">
								<label class="col-xs-8 bolder">Point per Sick</label>
								<select class="form-control input-mini col-xs-4" id="sick_point" name="sick_point">
									<option value="<?php echo $sick_point; ?>"><?php echo $sick_point; ?></option>
									<?php echo select_number(0,11); ?>
								</select>
							</div>
							
							<div class="form-group col-sm-12 col-xs-12">
								<label class="col-xs-8 bolder">Sick Point Minimum</label>
								<select class="form-control input-mini col-xs-4" id="sick_min" name="sick_min">
									<option value="<?php echo $sick_min; ?>"><?php echo $sick_min; ?></option>
									<?php echo select_number(0,11); ?>
								</select>
							</div>

							<div class="form-group col-sm-12 col-xs-12">
								<label class="col-xs-8 bolder">Sick Threshold</label>
								<select class="form-control input-mini col-xs-4" id="sick_max" name="sick_max">
									<option value="<?php echo $sick_max; ?>"><?php echo $sick_max; ?></option>
									<?php echo select_number(0,11); ?>
								</select>
							</div>
							
							<div class="col-sm-12 col-xs-12 hr hr-dotted"></div>

							<div class="form-group col-sm-12 col-xs-12">
								<label class="col-xs-8 bolder">Point per Disabled</label>
								<select class="form-control input-mini col-xs-4" id="disable_point" name="disable_point">
									<option value="<?php echo $disable_point; ?>"><?php echo $disable_point; ?></option>
									<?php echo select_number(0,11); ?>
								</select>
							</div>
							
							<div class="form-group col-sm-12 col-xs-12">
								<label class="col-xs-8 bolder">Disable Point Minimum</label>
								<select class="form-control input-mini col-xs-4" id="disable_min" name="disable_min">
									<option value="<?php echo $disable_min; ?>"><?php echo $disable_min; ?></option>
									<?php echo select_number(0,11); ?>
								</select>
							</div>

							<div class="form-group col-sm-12 col-xs-12">
								<label class="col-xs-8 bolder">Sick Threshold</label>
								<select class="form-control input-mini col-xs-4" id="disable_max" name="disable_max">
									<option value="<?php echo $disable_max; ?>"><?php echo $disable_max; ?></option>
									<?php echo select_number(0,11); ?>
								</select>
							</div>
							
							<div class="col-sm-12 col-xs-12 hr hr-dotted"></div>

							<div class="form-group col-sm-12 col-xs-12">
								<label class="col-xs-8 bolder">Point per Not Affected</label>
								<select class="form-control input-mini col-xs-4" id="person_none_point" name="person_none_point">
									<option value="<?php echo $person_none_point; ?>"><?php echo $person_none_point; ?></option>
									<?php echo select_number(0,11); ?>
								</select>
							</div>
							
							<div class="form-group col-sm-12 col-xs-12">
								<label class="col-xs-8 bolder">Not Affected Point Minimum</label>
								<select class="form-control input-mini col-xs-4" id="person_none_min" name="person_none_min">
									<option value="<?php echo $person_none_min; ?>"><?php echo $person_none_min; ?></option>
									<?php echo select_number(0,11); ?>
								</select>
							</div>

							<div class="form-group col-sm-12 col-xs-12">
								<label class="col-xs-8 bolder">Not Affected Threshold</label>
								<select class="form-control input-mini col-xs-4" id="person_none_max" name="person_none_max">
									<option value="<?php echo $person_none_max; ?>"><?php echo $person_none_max; ?></option>
									<?php echo select_number(0,11); ?>
								</select>
							</div>

							<div class="col-sm-12 col-xs-12 hr hr-dotted"></div>



							<label class="col-xs-12 bolder text-success"><h3>HEAD OF FAMILY</h3></label>

							<div class="form-group col-sm-12 col-xs-12">
								<label class="col-xs-8 bolder">Points for Yes</label>
								<select class="form-control input-mini col-xs-4" id="household_yes_point" name="household_yes_point">
									<option value="<?php echo $household_yes_point; ?>"><?php echo $household_yes_point; ?></option>
									<?php echo select_number(0,11); ?>
								</select>
							</div>

							<div class="form-group col-sm-12 col-xs-12">
								<label class="col-xs-8 bolder">Points for No</label>
								<select class="form-control input-mini col-xs-4" id="household_no_point" name="household_no_point">
									<option value="<?php echo $household_no_point; ?>"><?php echo $household_no_point; ?></option>
									<?php echo select_number(0,11); ?>
								</select>
							</div>



							<label class="col-xs-12 bolder text-success"><h3>FOR MARRIED ONLY</h3></label>

							<div class="form-group col-sm-12 col-xs-12">
								<label class="col-xs-8 bolder">Working Husband</label>
								<select class="form-control input-mini col-xs-4" id="working_husband" name="working_husband">
									<option value="<?php echo $working_husband; ?>"><?php echo $working_husband; ?></option>
									<?php echo select_number(0,11); ?>
								</select>
							</div>




							<label class="col-xs-12 bolder text-success"><h3>SKILL</h3></label>

							<div class="form-group col-sm-12 col-xs-12">
								<label class="col-xs-8 bolder">With Skill</label>
								<select class="form-control input-mini col-xs-4" id="skill_with_point" name="skill_with_point">
									<option value="<?php echo $skill_with_point; ?>"><?php echo $skill_with_point; ?></option>
									<?php echo select_number(0,11); ?>
								</select>
							</div>

							<div class="form-group col-sm-12 col-xs-12">
								<label class="col-xs-8 bolder">Without Skill</label>
								<select class="form-control input-mini col-xs-4" id="skill_none_point" name="skill_none_point">
									<option value="<?php echo $skill_none_point; ?>"><?php echo $skill_none_point; ?></option>
									<?php echo select_number(0,11); ?>
								</select>
							</div>




							<label class="col-xs-12 bolder text-success"><h3>DEPENDENTS</h3></label>

							<div class="form-group col-sm-12 col-xs-12">
								<label class="col-xs-8 bolder">Point per Dependent</label>
								<select class="form-control input-mini col-xs-4" id="no_of_dependents_points" name="no_of_dependents_points">
									<option value="<?php echo $no_of_dependents_points; ?>"><?php echo $no_of_dependents_points; ?></option>
									<?php echo select_number(0,11); ?>
								</select>
							</div>
							
							
							<div class="form-group col-sm-12 col-xs-12">
								<label class="col-xs-8 bolder">Dependents Minimum</label>
								<select class="form-control input-mini col-xs-4" id="no_of_dependents_min" name="no_of_dependents_min">
									<option value="<?php echo $no_of_dependents_min; ?>"><?php echo $no_of_dependents_min; ?></option>
									<?php echo select_number(0,11); ?>
								</select>
							</div>


							<div class="form-group col-sm-12 col-xs-12">
								<label class="col-xs-8 bolder">Dependents Threshold</label>
								<select class="form-control input-mini col-xs-4" id="no_of_dependents_max" name="no_of_dependents_max">
									<option value="<?php echo $no_of_dependents_max; ?>"><?php echo $no_of_dependents_max; ?></option>
									<?php echo select_number(0,11); ?>
								</select>
							</div>

						</fieldset>


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

						

						<div class="form-actions center">
							<button type="submit" class="btn btn-sm btn-success" name="update_admin">
								Update
								<i class="icon-arrow-right icon-on-right bigger-110"></i>
							</button>
						</div>
					</form>
				</div>
			</div>

		</div>
	</div>
</div>