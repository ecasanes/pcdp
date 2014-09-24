<?php
	$edit_record = base_url('records/edit');
	$delete_record = base_url('records/delete');
	$delete_redirect = 'view-all';
	$create_csv = base_url('records/create-csv/'.$limit.'/'.$offset);
?>
<div class="table-responsive">
	<table id="records-table" class="table table-striped table-bordered table-hover">
		<thead>
			<tr>
				<th>Name</th>
				<th>Age</th>
				<th>Gender</th>
				<th class="hidden-480">No. of Dependents</th>
				<th>Cel/Tel No.</th>
				<th class="hidden-480">
					Address Before
				</th>
				<th>Current Address</th>
				<th>Status</th>
				<th class="hidden-480">Employment</th>
				<th class="hidden-480">Skills</th>
				<th class="hidden-480">Monthly Income</th>
				<th class="hidden-480">Tragedy</th>
				<th class="hidden-480">Damage to Property</th>
				<th></th>
			</tr>
		</thead>

		<tbody>
			<?php
				foreach($records as $record){
					$id = $record['id'];
					$firstname = $record['firstname'];
					$middlename = $record['middlename'];
					$lastname = $record['lastname'];
					$fullname = $lastname.', '.$firstname.' '.$middlename;
					$age = $record['age'];
					$gender = $record['gender'];
					$no_of_dependents = $record['no_of_dependents'];
					$cel_no = $record['cel_no'];
					$address_before = $record['before_street'].', '.$record['before_barangay_name'].', '.$record['before_province_name'].', '.$record['before_region_name'];
					$current_address = $record['current_street'].', '.$record['current_barangay_name'].', '.$record['current_province_name'].', '.$record['current_region_name'];
					
					$address_before = rtrim($address_before,",");
					$address_before = ltrim($address_before,",");

					$current_address = rtrim($current_address,",");
					$current_address = ltrim($current_address,",");

					$civil_status = $record['civil_status'];
					$employment = $record['employment'];


					$skills = '';
					$skills_array = explode(', ',$record['skills']);
					foreach($skills_array as $skill){
						$skills .= "<btn class='btn btn-sm btn-primary'>";
						$skills .= $skill;
						$skills .= "</btn><br/>";
					}
					

					$money_income = $record['income'];
					$deaths = $record['death'];
					$injuries = $record['injury'];
					$missing = $record['missing'];
					$sick = $record['sick'];
					$disable = $record['disable'];
					$none = $record['none'];

					$tragedy = '<ul>';
					$tragedy .= '<li> Deaths: '.$deaths.'</li>';
					$tragedy .= '<li> Injuries: '.$injuries.'</li>';
					$tragedy .= '<li> Missing: '.$missing.'</li>';
					$tragedy .= '<li> Sick: '.$sick.'</li>';
					$tragedy .= '<li> Disable: '.$disable.'</li>';
					$tragedy .= '<li> No Accident: '.$none.'</li>';
					$tragedy .= '</ul>';

					$property_damage = $record['property_damage'];
			?>
			<tr>
				<td><?php echo $fullname; ?></td>
				<td><?php echo $age; ?></td>
				<td><?php echo $gender; ?></td>
				<td class="hidden-480"><?php echo $no_of_dependents; ?></td>
				<td><?php echo $cel_no; ?></td>
				<td class="hidden-480"><?php echo $address_before; ?></td>
				<td><?php echo $current_address; ?></td>
				<td><?php echo $civil_status; ?></td>
				<td class="hidden-480"><?php echo $employment; ?></td>
				<td class="hidden-480 center">
					<a class="badge badge-info tooltip-top" data-rel="popover" title="" data-content="<?php echo $skills; ?>" data-original-title="Skills">
						<i class="icon-question"></i>
					</a>
				</td>
				<td class="hidden-480"><?php echo $money_income; ?></td>
				<td class="hidden-480 center">
					<a class="badge badge-success tooltip-top" data-rel="popover" title="" data-content="<?php echo $tragedy; ?>" data-original-title="Damages to Life">
						<i class="icon-question"></i>
					</a>
				</td>
				<td class="hidden-480"><?php echo $property_damage; ?></td>
				<td>
					<div class="visible-md visible-lg hidden-sm hidden-xs btn-group">
						
						<!--<a href="<?php echo $view_admin.'/'.$id; ?>" class="btn btn-xs btn-success">
							<i class="icon-zoom-in bigger-120"></i>
							VIEW
						</a>-->

						<a href="<?php echo $edit_record.'/'.$id; ?>" class="btn btn-xs btn-info <?php echo markup_hidden('records/edit'); ?>">
							<i class="icon-edit bigger-120"></i>
							EDIT
						</a>

						<a href="<?php echo $delete_record.'/'.$id.'/'.$delete_redirect; ?>" class="btn btn-xs btn-danger <?php echo markup_hidden('records/delete'); ?>">
							<i class="icon-trash bigger-120"></i>
							DELETE
						</a>
					</div>

					<div class="visible-xs visible-sm hidden-md hidden-lg">
						<div class="inline position-relative">
							<button class="btn btn-minier btn-primary dropdown-toggle <?php echo markup_hidden('records/edit'); ?>" data-toggle="dropdown">
								<i class="icon-cog icon-only bigger-110"></i>
							</button>

							<ul class="dropdown-menu dropdown-only-icon dropdown-yellow pull-right dropdown-caret dropdown-close">

								<li>
									<a href="<?php echo $edit_record.'/'.$id; ?>" class="tooltip-success <?php echo markup_hidden('records/edit'); ?>" data-rel="tooltip" title="Edit">
										<span class="green">
											<i class="icon-edit bigger-120"></i>
										</span>
									</a>
								</li>

								<li>
									<a href="<?php echo $delete_record.'/'.$id.'/'.$delete_redirect; ?>" class="tooltip-error <?php echo markup_hidden('records/delete'); ?>" data-rel="tooltip" title="Delete">
										<span class="red">
											<i class="icon-trash bigger-120"></i>
										</span>
									</a>
								</li>
							</ul>
						</div>
					</div>
				</td>
			</tr>
			<?php } ?>
		</tbody>
	</table>
</div><!-- /.table-responsive -->

<div class="clearfix">
	<a id="loading-btn" href="<?php echo $create_csv; ?>" class="pull-left btn btn-sm btn-info" data-loading-text="Please wait while CSV is downloading...">
		Download CSV
		<i class="icon-save icon-on-right bigger-110"></i>
	</a>

	<ul class="pagination pull-right no-padding no-margin">
		<?php echo $links; ?>
	</ul>
</div>