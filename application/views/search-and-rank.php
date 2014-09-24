<?php
	if(isset($records)){
		$widget_state = 'collapsed';
		$arrow_state = 'down';
	}else{
		$widget_state = '';
		$arrow_state = 'up';
	}
?>
<div class="row">
	<div class="col-xs-12 col-sm-6">
		<div class="widget-box <?php echo $widget_state; ?>">
			<div class="widget-header header-color-blue">
				<h5>Select Desired Criteria</h5>

				<div class="widget-toolbar">
					<a href="#" data-action="collapse">
						<i class="1 bigger-125 icon-chevron-<?php echo $arrow_state; ?>"></i>
					</a>
				</div>
			</div>

			<div class="widget-body">
				<div class="widget-body-inner" style="display: block;">
					<form name="search_and_rank_form" method="POST" action="<?php echo base_url('records/search-and-rank-results'); ?>">
						<div class="widget-main">

							<div class="row">

								<div class="form-group col-sm-12 col-xs-12">
									<label class="col-sm-2 col-xs-12">Search By</label>
									<div class="col-sm-3 col-xs-12">
										<select name="search_by" class=" form-control">
											<option value='f_name'>First Name</option>
											<option value='l_name'>Last Name</option>
											<option value='m_name'>Middle Name</option>
										</select>
									</div>

									<div class="col-sm-6 col-xs-12 col-sm-offset-1">
										<input class=" form-control" type="text" name="key" value="" placeholder="Input Search Name..." />
									</div>
									
								</div>
							</div>



							<div class="row">
								<label class="col-sm-12 col-xs-12 text-primary bolder">You can also select from the following options:</label>
							</div>


							<div class="row">
								<div class="form-group col-sm-12 col-xs-12">
									
									<label class="col-sm-2 col-xs-12">Gender</label>
									<div class="col-sm-3 col-xs-12">
										<select class="form-control" name="gender"><?php echo select_gender(); ?></select>
									</div>

									<hr class="hr-dotted visible-xs hidden col-xs-12"></hr>

									<label class="col-sm-2 col-xs-3">Age From</label>
									<div class="col-sm-2 col-xs-4">
										<select class="form-control" name="age_from"><?php echo select_age_from(); ?></select>
									</div>
									<label class="col-sm-1 col-xs-1">to</label>
									<div class="col-sm-2 col-xs-4">
										<select class="form-control" name="age_to"><?php echo select_age_to(); ?></select>
									</div>
									
								</div>
							</div>

							<div class="row">
								<div class="form-group col-sm-12 col-xs-12">
									<label class="col-sm-2 col-xs-12">Status</label>
										<div class="col-sm-3 col-xs-12">
											<select class="form-control" name="status"><?php echo select_status(); ?></select>
										</div>
									<label class="col-sm-2 col-xs-12">Occupation</label>
									<div class="col-sm-5 col-xs-12">
										<select class="form-control"  name="occupation"><?php echo select_occupation(); ?></select>
									</div>
									
								</div>
							</div>

							<div class="row">
								<div class="form-group col-sm-12 col-xs-12">

									<label class="col-sm-2 col-xs-12">Head of Family?</label>

									<div class="col-sm-3 col-xs-12">
										<select class="form-control" name='household'>
											<option value='all'>all</option>
											<option value='yes'>Yes</option>
											<option value='no'>No</option>
										</select>
									</div>

									<label class="col-sm-2 col-xs-12">Property</label>
										<div class="col-sm-5 col-xs-12">
											<select class="form-control" name="property"><?php echo select_property(); ?></select>
										</div>
									
									
								</div>
							</div>

							<div class="row">
								<div class="form-group col-sm-12 col-xs-12">
									<label class="col-sm-2 col-xs-12">Limit</label>
										<div class="col-sm-3 col-xs-12">
											<select class="form-control" name="limit">
												<?php echo select_number(1,100,100); ?>
											</select>
										</div>

									<label class="col-sm-2 col-xs-12">Award Status</label>
										<div class="col-sm-5 col-xs-12">
											<select class="form-control" name="award_status"><?php echo select_award_status('all'); ?></select>
										</div>
										
									
								</div>
							</div>

							<div class="row">
								<div class="form-group col-sm-12 col-xs-12">

									<label class="col-sm-2 col-xs-12">Disability</label>
										<div class="col-sm-10 col-xs-12">
											<select class="form-control" name="disability"><?php echo select_disability('all'); ?></select>
										</div>
								</div>
							</div>

							<div class="row">
								<div class="form-group col-sm-12 col-xs-12">

									<label class="col-sm-2 col-xs-12">Search Skill</label>
										<div class="col-sm-10 col-xs-12">
											<input class="form-control" type="text" name="skill" value="" placeholder="Input Only One Skill..." data-rel="tooltip" title="" data-original-title="input only one specific skill to search for (ex. webdeveloper)" />
										</div>
								</div>
							</div>

							<div class="row">
								<label class="col-sm-12 col-xs-12 text-primary bolder">You can also select by location: (Select Region First)</label>
							</div>

							<div class="row">
								<div class="form-group col-sm-12 col-xs-12">
									<label class="col-sm-2 col-xs-12">Region</label>
										<div class="col-sm-4 col-xs-12">
											<select class="form-control" id="current_region_select" name="region">
												<?php echo $regions_select; ?>
											</select>
										</div>
									<label class="col-sm-2 col-xs-12">Province</label>
									<div class="col-sm-4 col-xs-12">
										<select class="form-control"  id="current_province_select" name="province"></select>
									</div>
									
								</div>
							</div>

							<div class="row">
								<div class="form-group col-sm-12 col-xs-12">
									<label class="col-sm-2 col-xs-12">City/Town</label>

										<div class="col-sm-4 col-xs-12">
											<select class="form-control" id="current_city_select" name="city"></select>
										</div>

									<label class="col-sm-2 col-xs-12">Barangay</label>
									<div class="col-sm-4 col-xs-12">
										<select class="form-control"  id="current_barangay_select" name="barangay"></select>
									</div>
								</div>
							</div>

						</div>

						<div class="widget-toolbox padding-8 clearfix">

							<button type="submit" name="search_submit" class="btn btn-sm btn-success pull-right">
								<i class="icon-search"></i>
								<span class="bigger-110">Search</span>
							</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>