<?php
	$create_csv = base_url('records/create-csv/10/0/statistics');
?>

<table class="table table-striped table-bordered table-hover">
	<thead>
		<tr class="bold">
			<th class="center">Age</th>
			<th class="center" colspan="2">Gender</th>
			<th class="center" colspan="3">Status</th>
			<th class="center" colspan="3">Occupation</th>
			<th class="center" colspan="4">Damage to Property</th>
			<th class="center" colspan="6">Tragedy/Damage to Life</th>
		</tr>
		<tr class="subheading bold">
				<th class="center" ></th>
				<th class="center" >M</th>
				<th class="center" >F</th>
				<th class="center" >Single</th>
				<th class="center" >Married</th>
				<th class="center" >Widow</th>	
				<th class="center" >Employed</th>
				<th class="center" >Self-Empl.</th>
				<th class="center" >Un-Empl.</th>
				<th class="center" >Totally</th>
				<th class="center" >Partially</th>
				<th class="center" >Flooded</th>
				<th class="center" >N/A</th>
				<th class="center" >Deaths</th>
				<th class="center" >Injuries</th>
				<th class="center" >Missing</th>
				<th class="center" >Sick</th>
				<th class="center" >Disable</th>
				<th class="center" >None</th>
			</tr>
		</thead>
		<tbody id="statistics-tbody">
		<?php
		//if (!isset($ajax_req)):
		$data_row_counter = 0;
		$statistics_data_array_length = count($statistics_data_array);
		foreach($statistics_data_array as $statistics_row_data_array){
			if ($data_row_counter == 0) {
				// first
			} else if ($data_row_counter == $statistics_data_array_length - 1) {
				echo '<tr class="total">';
			} else{
				echo '<tr>';
			}
		
			echo '<td>';
			echo $statistics_row_data_array['row_age_range'];
			echo '</td>';
			echo '<td>';
			echo $statistics_row_data_array['row_gender_male'];
			echo '</td>';
			echo '<td>';
			echo $statistics_row_data_array['row_gender_female'];
			echo '</td>';
			echo '<td>';
			echo $statistics_row_data_array['row_status_single'];
			echo '</td>';
			echo '<td>';
			echo $statistics_row_data_array['row_status_married'];
			echo '</td>';
			echo '<td>';
			echo $statistics_row_data_array['row_status_widow'];
			echo '</td>';
			echo '<td>';
			echo $statistics_row_data_array['row_occupation_employed'];
			echo '</td>';
			echo '<td>';
			echo $statistics_row_data_array['row_occupation_self_employed'];
			echo '</td>';
			echo '<td>';
			echo $statistics_row_data_array['row_occupation_unemployed'];
			echo '</td>';
			echo '<td>';
			echo $statistics_row_data_array['row_property_totally_damaged'];
			echo '</td>';
			echo '<td>';
			echo $statistics_row_data_array['row_property_partially_damaged'];
			echo '</td>';
			echo '<td>';
			echo $statistics_row_data_array['row_property_flooded'];
			echo '</td>';
			echo '<td>';
			echo $statistics_row_data_array['row_property_not_available'];
			echo '</td>';
			echo '<td>';
			echo $statistics_row_data_array['row_tragedy_death'];
			echo '</td>';
			echo '<td>';
			echo $statistics_row_data_array['row_tragedy_injury'];
			echo '</td>';
			echo '<td>';
			echo $statistics_row_data_array['row_tragedy_missing'];
			echo '</td>';
			echo '<td>';
			echo $statistics_row_data_array['row_tragedy_sick'];
			echo '</td>';
			echo '<td>';
			echo $statistics_row_data_array['row_tragedy_disable'];
			echo '</td>';
			echo '<td>';
			echo $statistics_row_data_array['row_tragedy_none'];
			echo '</td>';
		echo '</tr>';
		$data_row_counter++;
		}
		//endif;
		
		?>
		
	</tbody>
</table>

<div class="clearfix">
	<a id="loading-btn" href="<?php echo $create_csv; ?>" class="pull-left btn btn-sm btn-info" data-loading-text="Please wait while CSV is downloading...">
		Download CSV
		<i class="icon-save icon-on-right bigger-110"></i>
	</a>

	<ul class="pagination pull-right no-padding no-margin">
		<?php //echo $links; ?>
	</ul>
</div>


	