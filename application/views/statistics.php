<div id="statistics-address-options" class="widget-box">
	<div class="widget-header header-color-blue">
		<h4>
			<i class="icon-search"></i>
			Address Options
		</h4>

	</div>

	<div class="widget-body">
		<div class="widget-main">
			<form class="form-inline" name="statistics_address_options" method="POST" action="">
				<select class="form-control input-medium" id="current_region_select" name="current_region">
					<?php echo $regions_select; ?>
				</select>

				<select class="form-control input-large" id="current_province_select" name="current_province">
					<?php //echo $provinces_select; ?>
				</select>

				<select class="form-control input-large" id="current_city_select" name="current_city">
				</select>

				<select class="form-control input-large" id="current_barangay_select" name="current_barangay">
				</select>

				<button type="button" class="btn btn-success btn-sm" id="address-options-submit" data-loading-text="Please wait while Statistics Data is loading...">
					<i class="icon-search bigger-110"></i>
					Search
				</button>
			</form>
		</div>
	</div>
</div>

<div id="statistics-ajax-result" class="widget-box">
	<div class="widget-header header-color-green">

		<h4>
			<i class="icon-check"></i>
			Result
		</h4>
		
	</div>

	<div class="widget-body">
		<div class="widget-main">

			<div id="statistics-table" class="table-responsive">
				
			</div>
			
		</div>
	</div>
</div>

<div id="statistics-progress" class="col-xs-2">
	<h4>Loading...</h4>
	<div  class="progress progress-medium progress-striped active">
		<div class="progress-bar progress-bar-warning" style="width: 100%;"></div>
	</div>
</div>