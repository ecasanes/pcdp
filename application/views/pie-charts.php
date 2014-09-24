<div id="pie-chart-options-container" class="row">
	<div class="col-xs-12 col-sm-10">
		<div class="widget-box <?php echo $widget_status; ?>">
			<div class="widget-header header-color-blue">
				<h4>
					<i class="icon-info-sign"></i>
					Pie Chart Options
				</h4>

				<div class="widget-toolbar">
					<a href="#" data-action="collapse">
						<i class="1 bigger-125 icon-chevron-<?php echo $widget_arrow; ?>"></i>
					</a>
				</div>
			</div>

			<div class="widget-body">
				<div class="widget-main no-padding">



		<form name='stat_bar_chart_options' id="stat-pie-chart-options" action='<?php echo base_url('reports/pie-charts'); ?>' method='POST'>
			<fieldset>
				<div class="row">
					<div class="form-group col-sm-3">
						<label class="col-sm-12 col-xs-12 bolder">Age Bracket</label>
						<div class="col-sm-12 col-xs-12">
							<div class="radio">
								<label>
									<input name="age_bracket" type="radio" class="ace" value="15-25" <?php echo verify_checkbox_active($age_bracket, '15-25'); ?> />
									<span class="lbl"> 15 - 25</span>
								</label>
							</div>
							<div class="radio">
								<label>
									<input name="age_bracket" type="radio" class="ace" value="26-35" <?php echo verify_checkbox_active($age_bracket, '26-35'); ?> />
									<span class="lbl"> 26 - 35</span>
								</label>
							</div>
							<div class="radio">
								<label>
									<input name="age_bracket" type="radio" class="ace" value="36-45" <?php echo verify_checkbox_active($age_bracket, '36-45'); ?> />
									<span class="lbl"> 36 - 45</span>
								</label>
							</div>
							<div class="radio">
								<label>
									<input name="age_bracket" type="radio" class="ace" value="46-55" <?php echo verify_checkbox_active($age_bracket, '46-55'); ?>  />
									<span class="lbl"> 46 - 55</span>
								</label>
							</div>
							<div class="radio">
								<label>
									<input name="age_bracket" type="radio" class="ace" value="56-65" <?php echo verify_checkbox_active($age_bracket, '56-65'); ?> />
									<span class="lbl"> 56 - 65</span>
								</label>
							</div>
							<div class="radio">
								<label>
									<input name="age_bracket" type="radio" class="ace" value="66-75" <?php echo verify_checkbox_active($age_bracket, '66-75'); ?> />
									<span class="lbl"> 66 - 75</span>
								</label>
							</div>
							<div class="radio">
								<label>
									<input name="age_bracket" type="radio" class="ace" value="all" <?php echo verify_checkbox_active($age_bracket, 'all'); ?> />
									<span class="lbl"> All</span>
								</label>
							</div>
							
						</div>
					</div>


					<div class="form-group col-sm-3">
						<label class="col-sm-12 col-xs-12 bolder">Gender</label>
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
						<label class="col-sm-12 col-xs-12 bolder">Status</label>
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
						<label class="col-sm-12 col-xs-12 bolder">Occupation</label>
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
					<div class="form-group col-sm-6">
						<label class="col-sm-12 col-xs-12 bolder">Pie Chart Type</label>
						<div class="col-sm-12 col-xs-12">
							<div class="radio">
								<label>
									<input name="pie_chart_type" type="radio" class="ace" value="damage to property" <?php echo verify_checkbox_active($pie_chart_type, 'damage to property'); ?> />
									<span class="lbl"> Damage to Property</span>
								</label>
							</div>
							<div class="radio">
								<label>
									<input name="pie_chart_type" type="radio" class="ace" value="tragedy" <?php echo verify_checkbox_active($pie_chart_type, 'tragedy'); ?> />
									<span class="lbl"> Tragedy</span>
								</label>
							</div>
						</div>
					</div>


					<!--<div class="form-group col-sm-4">
						<button class="btn btn-info col-xs-12" type="submit">
							<i class="icon-ok bigger-110"></i>
							Submit
						</button>
					</div>-->
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
		<?php if(isset($stat_pie_chart_array)){ ?>
		<pre>
		<?php var_dump($stat_pie_chart_array); ?>
		</pre>
	</div>

	<table id="stats-table" class="hidden">
		<thead>
			<tr>
				<th>Damage Type</th>
				<th>No. of People</th>
			</th>
		</thead>
		<tbody>
			
				<?php 
				foreach($stat_pie_chart_array as $stat_pie_chart_values){
					$result = $stat_pie_chart_values['result'];
					$term = $stat_pie_chart_values['term'];
					echo '<tr>';
						echo '<td>';
						echo $term;
						echo '</td>';
						echo '<td>';
						echo $result;
						echo '</td>';
					echo '</tr>';
					
				}
				?>
		</tbody>
	</table>
	
<div class="widget-box">
	<div class="widget-header header-color-green">
		<h4>
			<i class="icon-check"></i>
			Pie Chart Result
		</h4>

		<div class="widget-toolbar">
			<a href="#" data-action="collapse">
				<i class="1 bigger-125 icon-chevron-up"></i>
			</a>
		</div>
	</div>

	<div class="widget-body">
		<div class="widget-main no-padding" id="pie_chart_div">





		</div>
	</div>

</div>

<div class="clearfix no-print">
	<a href="#" onclick="window.print();" class="pull-right btn btn-sm btn-info">
		PRINT
		<i class="icon-print icon-on-right bigger-110"></i>
	</a>
</div>


</div>

	<?php } ?>
</div>
