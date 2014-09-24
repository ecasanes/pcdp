<div id="bar-chart-options-container" class="row">
	<div class="col-xs-12 col-sm-10">
		<div class="widget-box <?php echo $widget_status; ?>">
			<div class="widget-header header-color-blue">
				<h4>
					<i class="icon-bar-chart"></i>
					Bar Chart Options
				</h4>

				<div class="widget-toolbar">
					<a href="#" data-action="collapse">
						<i class="1 bigger-125 icon-chevron-<?php echo $widget_arrow; ?>"></i>
					</a>
				</div>
			</div>

			<div class="widget-body">
				<div class="widget-main no-padding">



		<form name='stat_bar_chart_options' id="stat-bar-chart-options" action='<?php echo base_url('reports/bar-charts'); ?>' method='POST'>
			<fieldset>
				<div id="summary" class="row">
				</div>
				<div class="row">
					<div class="form-group col-sm-3">
						<label class="col-sm-12 col-xs-12 bolder control-label">Gender</label>
						<div class="col-sm-12 col-xs-12">
							<div class="radio">
								<label>
									<input name="gender" type="radio" class="ace" value="male" <?php echo verify_checkbox_active($gender, 'male'); ?> />
									<span class="lbl"> Male</span>
								</label>
							</div>
							<div class="radio">
								<label>
									<input name="gender" type="radio" class="ace" value="female" <?php echo verify_checkbox_active($gender, 'female'); ?> />
									<span class="lbl"> Female</span>
								</label>
							</div>
							<div class="radio">
								<label>
									<input name="gender" type="radio" class="ace" value="all" <?php echo verify_checkbox_active($gender, 'all'); ?> />
									<span class="lbl"> All</span>
								</label>
							</div>
							
						</div>
					</div>

					<div class="form-group col-sm-3">
						<label class="col-sm-12 col-xs-12 bolder control-label">Status</label>
						<div class="col-sm-12 col-xs-12">
							<div class="radio">
								<label>
									<input name="status" type="radio" class="ace" value="single" <?php echo verify_checkbox_active($status, 'single'); ?> />
									<span class="lbl"> Single</span>
								</label>
							</div>
							<div class="radio">
								<label>
									<input name="status" type="radio" class="ace" value="married" <?php echo verify_checkbox_active($status, 'married'); ?> />
									<span class="lbl"> Married</span>
								</label>
							</div>
							<div class="radio">
								<label>
									<input name="status" type="radio" class="ace" value="widow" <?php echo verify_checkbox_active($status, 'widow'); ?> />
									<span class="lbl"> Widowed</span>
								</label>
							</div>
							<div class="radio">
								<label>
									<input name="status" type="radio" class="ace" value="all" <?php echo verify_checkbox_active($status, 'all'); ?> />
									<span class="lbl"> All</span>
								</label>
							</div>
						</div>
					</div>

					<div class="form-group col-sm-3">
						<label class="col-sm-12 col-xs-12 bolder control-label">Occupation</label>
						<div class="col-sm-12 col-xs-12">
							<div class="radio">
								<label>
									<input name="employment" type="radio" class="ace" value="employed" <?php echo verify_checkbox_active($occupation, 'employed'); ?> />
									<span class="lbl"> Employed</span>
								</label>
							</div>
							<div class="radio">
								<label>
									<input name="employment" type="radio" class="ace" value="self-employed" <?php echo verify_checkbox_active($occupation, 'self-employed'); ?> />
									<span class="lbl"> Self Employed</span>
								</label>
							</div>
							<div class="radio">
								<label>
									<input name="employment" type="radio" class="ace" value="un-employed" <?php echo verify_checkbox_active($occupation, 'un-employed'); ?> />
									<span class="lbl"> Unemployed</span>
								</label>
							</div>
							<div class="radio">
								<label>
									<input name="employment" type="radio" class="ace" value="all" <?php echo verify_checkbox_active($occupation, 'all'); ?> />
									<span class="lbl"> All</span>
								</label>
							</div>
						</div>
					</div>
				</div>

				<hr/>

				<div class="row">
					<div class="form-group col-sm-4">
						<label class="col-sm-12 col-xs-12 bolder control-label">Damage to Property</label>
						<div class="col-sm-12 col-xs-12">
							<div class="radio">
								<label>
									<input name="damage" type="radio" class="ace" value="totally damage" <?php echo verify_checkbox_active($property, 'totally damage'); ?> />
									<span class="lbl"> Totally Damaged</span>
								</label>
							</div>
							<div class="radio">
								<label>
									<input name="damage" type="radio" class="ace" value="partially damage" <?php echo verify_checkbox_active($property, 'partially damage'); ?> />
									<span class="lbl"> Partially Damaged</span>
								</label>
							</div>
							<div class="radio">
								<label>
									<input name="damage" type="radio" class="ace" value="flooded" <?php echo verify_checkbox_active($property, 'flooded'); ?> />
									<span class="lbl"> Flooded</span>
								</label>
							</div>
							<div class="radio">
								<label>
									<input name="damage" type="radio" class="ace" value="N/A" <?php echo verify_checkbox_active($property, 'N/A'); ?> />
									<span class="lbl"> Not Available</span>
								</label>
							</div>
							<div class="radio">
								<label>
									<input name="damage" type="radio" class="ace" value="all" <?php echo verify_checkbox_active($property, 'all'); ?> />
									<span class="lbl text-warning"> Don't Include This Criteria</span>
									<span class="badge badge-info tooltip-top" data-rel="tooltip" title="" 
									data-original-title="You can select this option if you don't want to include damage to property as a criteria in generating the bar chart.">
										<i class="icon-question"></i>
									</span>
								</label>
							</div>
						</div>
					</div>

					<div class="form-group col-sm-4">
						<label class="col-sm-12 col-xs-12 bolder control-label">Type of Tragedy</label>
						<div class="col-sm-12 col-xs-12">
							<div class="radio">
								<label>
									<input name="tragedy" type="radio" class="ace" value="death" <?php echo verify_checkbox_active($tragedy, 'death'); ?> />
									<span class="lbl"> Death</span>
								</label>
							</div>
							<div class="radio">
								<label>
									<input name="tragedy" type="radio" class="ace" value="injury" <?php echo verify_checkbox_active($tragedy, 'injury'); ?> />
									<span class="lbl"> Injured</span>
								</label>
							</div>
							<div class="radio">
								<label>
									<input name="tragedy" type="radio" class="ace" value="missing" <?php echo verify_checkbox_active($tragedy, 'missing'); ?> />
									<span class="lbl"> Missing</span>
								</label>
							</div>
							<div class="radio">
								<label>
									<input name="tragedy" type="radio" class="ace" value="sick" <?php echo verify_checkbox_active($tragedy, 'sick'); ?>  />
									<span class="lbl"> Sick</span>
								</label>
							</div>
							<div class="radio">
								<label>
									<input name="tragedy" type="radio" class="ace" value="disable" <?php echo verify_checkbox_active($tragedy, 'disable'); ?> />
									<span class="lbl"> Disabled</span>
								</label>
							</div>
							<div class="radio">
								<label>
									<input name="tragedy" type="radio" class="ace" value="none" <?php echo verify_checkbox_active($tragedy, 'none'); ?> />
									<span class="lbl"> Not Affected</span>
								</label>
							</div>
							<div class="radio">
								<label>
									<input name="tragedy" type="radio" class="ace" value="not affected" <?php echo verify_checkbox_active($tragedy, 'not affected'); ?> />
									<span class="lbl text-warning"> Don't Include This Criteria</span>
									<span class="badge badge-info tooltip-top" data-rel="tooltip" title="" 
									data-original-title="You can select this option if you don't want to include (type of tragedy / damage to life) as a criteria in generating the bar chart.">
										<i class="icon-question"></i>
									</span>
								</label>
							</div>
						</div>
					</div>


					<div class="form-group col-sm-4">
						<label class="col-sm-12 col-xs-12 bolder control-label">Bar Chart Type</label>
						<div class="col-sm-12 col-xs-12">
							<div class="radio">
								<label>
									<input name="bar_chart_type" type="radio" class="ace" value="one_column" <?php echo verify_checkbox_active($bar_chart_type, 'one_column'); ?> />
									<span class="lbl"> One Column per Age Bracket</span>
								</label>
							</div>
							<div class="radio">
								<label>
									<input name="bar_chart_type" type="radio" class="ace" value="multiple_column_gender" <?php echo verify_checkbox_active($bar_chart_type, 'multiple_column_gender'); ?> />
									<span class="lbl"> Multiple Columns based on Gender</span>
								</label>
							</div>
							<div class="radio">
								<label>
									<input name="bar_chart_type" type="radio" class="ace" value="multiple_column_status" <?php echo verify_checkbox_active($bar_chart_type, 'multiple_column_status'); ?>  />
									<span class="lbl"> Multiple Columns based on Civil Status</span>
								</label>
							</div>
							<div class="radio">
								<label>
									<input name="bar_chart_type" type="radio" class="ace" value="multiple_column_occupation" <?php echo verify_checkbox_active($bar_chart_type, 'multiple_column_occupation'); ?> />
									<span class="lbl"> Multiple Columns based on Employment Status</span>
								</label>
							</div>
							<!--<button class="btn btn-info col-xs-12" type="submit">
								<i class="icon-ok bigger-110"></i>
									Submit
							</button>-->
						</div>
					</div>

				</div>
			</fieldset>

			<div class="form-actions center">
							
							<button type="submit" class="btn btn-sm btn-success" name="update_admin">
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

<div class="row">
	<div class="col-xs-12 col-sm-10">
	<div class="hidden">
		<?php if(isset($stat_bar_chart_array)){ ?>
		<pre>
		<?php var_dump($stat_bar_chart_array); ?>
		</pre>
	</div>


	<table id="stats-table" class="hidden">
		<thead>
			<tr>
				<th>Age Bracket</th>
				<?php

					
					$columns = $stat_bar_chart_array[0]['columns'];
					$column_count = count($columns);

					if($column_count > 0){


						$column_name = $stat_bar_chart_array[0]['column_name'];

						foreach($columns as $column){
							if($column == ''){
								$column = 'all '.$column_name;
							}
							echo '<th>';
								echo $column;
							echo '</th>';
						}

					}else{

						echo '<th>';
							echo 'No. Of People';
						echo '</th>';

					}

					
				?>
			</tr>
		</thead>
		<tbody>
			
				<?php 
				foreach($stat_bar_chart_array as $stat_bar_chart_values){
					$results = $stat_bar_chart_values['results'];
					$age_bracket = $stat_bar_chart_values['age_bracket'];

					echo '<tr>';
						echo '<td>';
						echo $age_bracket;
						echo '</td>';

					if(is_array($results)){

						foreach($results as $result){
							echo '<td>';
							echo $result;
							echo '</td>';
						}

					}else{
						echo '<td>';
						echo $results;
						echo '</td>';
					}

					echo '</tr>';
					
					
				}
				?>
		</tbody>
	</table>
	

	<div class="widget-box">
		<div class="widget-header header-color-green">
			<h4>
				<i class="icon-check"></i>
				Bar Chart Result
			</h4>

			<div class="widget-toolbar">
				<a href="#" data-action="collapse">
					<i class="1 bigger-125 icon-chevron-up"></i>
				</a>
			</div>
		</div>

		<div class="widget-body">
			<div class="widget-main no-padding" id="bar_chart_div">

			</div>
		</div>

	</div>

	<div id="canvas"></div>
	<div id="canvas-image"></div>

	<div class="clearfix no-print">
		<a href="#" onclick="window.print();" class="pull-right btn btn-sm btn-info">
			PRINT
			<i class="icon-print icon-on-right bigger-110"></i>
		</a>
	</div>


	</div>
	<?php } ?>
</div>