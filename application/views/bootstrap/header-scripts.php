
		

		<meta name="description" content="" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />

		<!-- basic styles -->

		<link href="<?php echo base_url('css/bootstrap.min.css'); ?>" rel="stylesheet" />
		<link rel="stylesheet" href="<?php echo base_url('css/font-awesome.min.css'); ?>" />

		<!--[if IE 7]>
		  <link rel="stylesheet" href="<?php echo base_url('css/font-awesome-ie7.min.css'); ?>" />
		<![endif]-->

		<!-- page specific plugin styles -->

		<!-- fonts -->

		<link rel="stylesheet" href="<?php echo base_url('css/ace-fonts.css'); ?>" />

		<!-- ace styles -->

		<link rel="stylesheet" href="<?php echo base_url('css/ace.min.css'); ?>" />
		<link rel="stylesheet" href="<?php echo base_url('css/ace-rtl.min.css'); ?>" />
		<link rel="stylesheet" href="<?php echo base_url('css/ace-skins.min.css'); ?>" />

		<!--[if lte IE 8]>
		  <link rel="stylesheet" href="<?php echo base_url('css/ace-ie.min.css'); ?>" />
		<![endif]-->

		<!-- inline styles related to this page -->

		<link rel="stylesheet" href="<?php echo base_url('css/custom.css'); ?>" />

		<!-- ace settings handler -->

		<script src="<?php echo base_url('js/ace-extra.min.js'); ?>"></script>

		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->

		<!--[if lt IE 9]>
		<script src="<?php echo base_url('js/html5shiv.js'); ?>"></script>
		<script src="<?php echo base_url('js/respond.min.js'); ?>"></script>
		<![endif]-->



		<!--[if !IE]> -->

		<script type="text/javascript">
			window.jQuery || document.write("<script src='<?php echo base_url('js/jquery-2.0.3.min.js'); ?>'>"+"<"+"/script>");
		</script>

		<!-- <![endif]-->

		<!--[if IE]>
		
		<script type="text/javascript">
			window.jQuery || document.write("<script src='<?php echo base_url('js/jquery-1.10.2.min.js'); ?>'>"+"<"+"/script>");
		</script>

		<![endif]-->

		<script type="text/javascript">
			if("ontouchend" in document) document.write("<script src='<?php echo base_url('js/jquery.mobile.custom.min.js'); ?>'>"+"<"+"/script>");
		</script>


		<script src="<?php echo base_url('js/html2canvas.js'); ?>"></script>


		<!--Load the AJAX API-->
    	<script type="text/javascript" src="https://www.google.com/jsapi"></script>
    	<script type="text/javascript">

    		do_visualization();

    		function do_visualization(){

    			// Load the Visualization API and the piechart package.
    			google.load('visualization', '1', {'packages':['corechart']});
		    
				$(document).ready(
					function(){
						
						if($('#bar_chart_div').length){
							//console.log('test bar');
							google.setOnLoadCallback(drawStatBarChart);
							//do_bar_chart_canvas();
						}else if($('#pie_chart_div').length){
							//console.log('test pie');
							// Set a callback to run when the Google Visualization API is loaded.
							google.setOnLoadCallback(drawStatPieChart);
						}
					}
				);
    		}
     
		    function drawStatBarChart() {

		 		var table_columns = [];
		 		var row_values = new Array();
				var dataArray = new Array();

			 	$('#stats-table>thead>tr>th').each( function(){
					//add item to array
				   	table_columns.push( $(this).text() );    
				});

				var table_column_count = table_columns.length;
				var table_column_counter = 0;
				var table_row_counter = 0;

				$('#stats-table>tbody>tr>td').each( function(){
					//add item to array
					if(table_column_counter == 0){
						row_values[table_row_counter] = [];
					}

					if(table_column_counter==table_column_count){
						table_column_counter = 0;
						table_row_counter++;
						row_values[table_row_counter] = [];
					}
				   
				   	if(table_column_counter == 0){
						row_values[table_row_counter][table_column_counter] = $(this).text();
					}else{
						row_values[table_row_counter][table_column_counter] = parseInt($(this).text());
					}
					table_column_counter++;
				   	
				         
				});
					
				var data = new google.visualization.DataTable();

				$.each(table_columns, function( index, value ) {
					//alert( index + ": " + value );
					if(value == 'Age Bracket'){
						data.addColumn('string', value);
					}else{
						data.addColumn('number', value);
					}
				});


				data.addRows(row_values);

		        var options = {
		          title: 'No. of People Affected',
		          hAxis: {title: 'Age Bracket', titleTextStyle: {color: 'red'}},
				  //width: 800,
				  //height: 800,
				  //colors: ['#e0440e', '#e6693e', '#ec8f6e', '#f3b49f', '#f6c7b6']
		        };

		        var chart = new google.visualization.ColumnChart(document.getElementById('bar_chart_div'));
		        chart.draw(data, options);
		    }

			function drawStatPieChart() {

				var table_columns = [];
				var row_values = new Array();
				var dataArray = new Array();

				$('#stats-table>thead>tr>th').each( function(){
				   table_columns.push( $(this).text() );  
				});

				var table_column_count = table_columns.length;
				var table_column_counter = 0;
				var table_row_counter = 0;

				$('#stats-table>tbody>tr>td').each( function(){
					
					if(table_column_counter == 0){
						row_values[table_row_counter] = [];
					}

					if(table_column_counter==table_column_count){
						table_column_counter = 0;
						table_row_counter++;
						row_values[table_row_counter] = [];
					}
				   
					if(table_column_counter == 0){
						row_values[table_row_counter][table_column_counter] = $(this).text();
					}else{
						row_values[table_row_counter][table_column_counter] = parseInt($(this).text());
					}
					table_column_counter++;
					
						 
				});
				
				var data = new google.visualization.DataTable();
				data.addColumn('string', 'Damage Type --');
				data.addColumn('number', 'No. of People --');
				
				data.addRows(row_values);

		        var options = {
		          title: 'No. of People Affected',
		          //hAxis: {title: 'Age Bracket', titleTextStyle: {color: 'red'}},
				  //width: 800,
				  height: 300
		        };

		        var chart = new google.visualization.PieChart(document.getElementById('pie_chart_div'));
		        chart.draw(data, options);
			}

			function do_bar_chart_canvas(){
				html2canvas([document.getElementById('bar_chart_div')], {
				    onrendered: function (canvas) {
				        document.getElementById('canvas').appendChild(canvas);
				        var data = canvas.toDataURL('image/png');
				        // AJAX call to send `data` to a PHP file that creates an image from the dataURI string and saves it to a directory on the server

				        var image = new Image();
				        image.src = data;
				        document.getElementById('canvas-image').appendChild(image);
				    }
				});
			}
	
    	</script>