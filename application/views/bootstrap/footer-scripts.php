
		<!-- basic scripts -->


		<script src="<?php echo base_url('js/bootstrap.min.js'); ?>"></script>
		<script src="<?php echo base_url('js/typeahead-bs2.min.js'); ?>"></script>
		<script src="<?php echo base_url('js/jquery.validate.min.js'); ?>"></script>

		<!-- page specific plugin scripts -->

		<!-- ace scripts -->

		<script src="<?php echo base_url('js/ace-elements.min.js'); ?>"></script>
		<script src="<?php echo base_url('js/ace.min.js'); ?>"></script>

		<!-- inline scripts related to this page -->
		
		<script type="text/javascript">

			base_url = "<?php echo base_url(); ?>";

			
		
			jQuery(document).ready(function () {
				
				//please comment out console.log after testing
				$('[data-rel=tooltip]').tooltip();
				$('[data-rel=popover]').popover({html:true});
				award_status();
				statistics_page();
				statistics_change_address_options();
				validate_record_form();
				validate_bar_chart();
				validate_pie_chart();
				select_address_part("current_region_select", "records/get-current-provinces-select", "current_province_select");
				select_address_part("current_province_select", "records/get-current-cities-select", "current_city_select");
				select_address_part("current_city_select", "records/get-current-barangays-select", "current_barangay_select");
				select_address_part("before_region_select", "records/get-current-provinces-select", "before_province_select");
				select_address_part("before_province_select", "records/get-current-cities-select", "before_city_select");
				select_address_part("before_city_select", "records/get-current-barangays-select", "before_barangay_select");
				back_button();
				validate_add_admin_form();
				validate_edit_admin_form();
				loading_button();
				  
			});

			function back_button(){
				$('#back-history').click(function(){
			        parent.history.back();
			        return false;
			    });
			}

			function award_status(){

				if($('input.award-status-display').length){

					$( "input.award-status-display" ).on( "click", function() {
					  	var id = $(this).attr('id');
						if($("#"+id).attr('checked') == 'checked'){
							$("#"+id).removeAttr('checked');
							change_award_status('uncheck', id);
							//console.log('uncheck');
						}else{
							$("#"+id).attr('checked','checked');
							change_award_status('check', id);
							//console.log('uncheck');
						}
					});

				}
			}

			function change_award_status(status, checkbox_id){

				ajax_url = base_url+"records/update-award-status";
				checkbox_id_array = checkbox_id.split("-");
				id = checkbox_id_array.pop();

				if(status == 'check'){
					ajax_data = 'status=awarded&id='+id;
				}else{
					ajax_data = 'status=""&id='+id;
				}

				//alert(ajax_data);


				$.ajax({
					type: "POST",
					url: ajax_url,
					data: ajax_data,
					dataType: "html",
					success: function(data)
					{
						//alert(data)
					} 
				});
			}

			function statistics_change_address_options(){

				if($('#statistics-address-options').length){

					$('#address-options-submit').click(function(){
		
						region = $('#current_region_select').val();
						province = $('#current_province_select').val();
						city = $('#current_city_select').val();
						barangay = $('#current_barangay_select').val();

						data = "region="+region+"&province="+province+"&city="+city+"&barangay="+barangay;
						alert(data);
						//console.log(data);

						statistics_page(data);

					});

				}
			}

			function statistics_page(ajaxData, ajaxURL) {

				ajaxData = ajaxData || "";
				ajaxURL = ajaxURL || "records/statistics-ajax";

				if(jQuery('#statistics-progress').length){

					$('#statistics-ajax-result').hide();
					
					jQuery.ajax({
					  url: base_url+ajaxURL,
					  type: "POST",
					  data: ajaxData,
					  dataType: "html",
					  beforeSend: function()
						{
							$('#statistics-progress').show();
						},
					  success: function(data) {
					  	$('#statistics-progress').hide();
					  	$('#statistics-ajax-result').show();
						$('#statistics-table').html(data);
					  }
					});
			   
				}
			}

			function select_address_part(change_id, function_url, output_id){

				if(jQuery("#"+change_id).length){

					jQuery("#"+change_id).change(function(){
					
						var id=jQuery(this).val();
						var dataString = 'id='+ id;
						var ajax_url = base_url+function_url;


						jQuery.ajax({
							type: "POST",
							url: ajax_url,
							data: dataString,
							dataType: "html",
							success: function(data)
							{
								$("#"+output_id).html(data);
							} 
						});

					});
				}
			}

			function validate_record_form(){

				$('#add-new-record').validate(
				 {
				  rules: {
				    firstname: {
				      minlength: 2,
				      required: true
				    },
				    lastname: {
				      minlength: 2,
				      required: true
				    },
				    gender: {
				      required: true
				    },
				    age: {
				      required: true
				    },
				    no_of_dependents: {
				      required: true
				    },
				    month: {
				      required: true
				    },
				    day: {
				      required: true
				    },
				    year: {
				      required: true
				    },
				    current_region: {
				      required: true
				    },
				    current_province: {
				      required: true
				    },
				    current_city: {
				      required: true
				    },
				    current_barangay: {
				      required: true
				    },
				    civil_status: {
				      required: true
				    },
				    property: {
				      required: true
				    },
				    occupation: {
				      required: true
				    },
				    monthly_income: {
				      required: true,
				      number:true
				    },
				    death: {
				      required: true
				    },
				    injury: {
				      required: true
				    },
				    missing: {
				      required: true
				    },
				    sick: {
				      required: true
				    },
				    disable: {
				      required: true
				    },
				    none: {
				      required: true
				    }
				  },
				  messages:{
				  	month:{
				  		required: "Please specify month."
				  	},
				  	day:{
				  		required: "Please specify day."
				  	},
				  	year:{
				  		required: "Please specify year."
				  	}
				  },
				  highlight: function(element) { //function(element, errorClass, validClass)
				    $(element).closest('.form-group').removeClass('has-success').addClass('has-error');
				  },
				  unhighlight: function (element, errorClass, validClass) {
					    $(element).closest('.form-group').removeClass('has-error').addClass('has-success');
				  },
				  success: function(element) {
					element
					.text('OK!').removeClass('label-danger').addClass('label-success')
					.prepend('<i class="icon-check bigger-110 white"></i> ')
					.closest('.form-group').removeClass('has-error').addClass('has-success');
				    
				  },
				  errorPlacement: function(error, element) {
				  	//console.log(error);
				  	//error.appendTo( element.closest('.control-label') );
				  	//new_error = "this is error sample";
				  	//if (element.attr("name") == "month" || element.attr("name") == "day" ||  element.attr("name") == "year") {
				    //  error
				    //  	.addClass('label label-danger arrowed-in-right arrowed-in')
				    //  	.prepend('<i class="icon-bolt bigger-110 white"></i> ')
				    //  	.insertAfter("#year");
				    //} else {
				      $(element).closest('.form-group').append(error);
				  		error.addClass('label label-danger arrowed-in-right arrowed-in');
				  		error.prepend('<i class="icon-bolt bigger-110 white"></i> ');
				    //}
				  	
				  }
				 });
			}

			function validate_add_admin_form(){
				$('#add-admin').validate(
				 {
				  rules: {
				    username: {
				      minlength: 2,
				      required: true
				    },
				    password: {
				      minlength: 2,
				      required: true
				    },
				    confirm_password: {
				      minlength: 2,
				      required: true,
				      equalTo: "#password"
				    },
				    firstname: {
				      required: true
				    },
				    role: {
				      required: true
				    }
				  },
				  messages:{
				  	confirm_password:{
				  		equalTo: "Please enter the same value as the password."
				  	}
				  },
				  highlight: function(element) { //function(element, errorClass, validClass)
				    $(element).closest('.form-group').removeClass('has-success').addClass('has-error');
				  },
				  unhighlight: function (element, errorClass, validClass) {
					    $(element).closest('.form-group').removeClass('has-error').addClass('has-success');
				  },
				  success: function(element) {
					element
					.text('OK!').removeClass('label-danger').addClass('label-success')
					.prepend('<i class="icon-check bigger-110 white"></i> ')
					.closest('.form-group').removeClass('has-error').addClass('has-success');
				    
				  },
				  errorPlacement: function(error, element) {
				      $(element).closest('.form-group').append(error);
				  		error.addClass('label label-danger arrowed-in-right arrowed-in');
				  }
				 });
			}

			function validate_edit_admin_form(){

				username_val = $('#username').val();

				check_username_duplicate_url = base_url+"admin/check-duplicate/account/"+username_val+"/false";
				//alert(check_username_duplicate_url);

				$('#edit-admin').validate(
				 {
				  rules: {
				    username: {
				      minlength: 2,
				      required: true
					},
				    password: {
				      minlength: 2
				    },
				    confirm_password: {
				      minlength: 2,
				      equalTo: "#password"
				    },
				    firstname: {
				      required: true
				    },
				    role: {
				      required: true
				    }
				  },
				  messages:{
				  	confirm_password:{
				  		equalTo: "Please enter the same value as the password."
				  	}
				  },
				  highlight: function(element) { //function(element, errorClass, validClass)
				    $(element).closest('.form-group').removeClass('has-success').addClass('has-error');
				  },
				  unhighlight: function (element, errorClass, validClass) {
					    $(element).closest('.form-group').removeClass('has-error').addClass('has-success');
				  },
				  success: function(element) {
					element
					.text('OK!').removeClass('label-danger').addClass('label-success')
					.prepend('<i class="icon-check bigger-110 white"></i> ')
					.closest('.form-group').removeClass('has-error').addClass('has-success');
				    
				  },
				  errorPlacement: function(error, element) {
				      $(element).closest('.form-group').append(error);
				  		error.addClass('label label-danger arrowed-in-right arrowed-in');
				  }
				 });
			}

			function validate_bar_chart(){

				$('#stat-bar-chart-options').validate(
				 {
				  rules: {
				    gender: {
				      required: true
				    },
				    status: {
				      required: true
				      //email: true
				    },
				    employment: {
				      required: true
				    },
				    damage: {
				      required: true
				    },
				    tragedy: {
				      required: true
				    },
				    bar_chart_type: {
				      required: true
				    }
				  },
				  highlight: function(element) {
				    $(element).closest('.form-group').removeClass('has-success').addClass('has-error');
				  },
				  success: function(element) {
				    element
				    .text('OK!').removeClass('label-danger').addClass('label-success')
				    .prepend('<i class="icon-check bigger-110 white"></i> ')
				    .closest('.form-group').removeClass('has-error').addClass('has-success');
				  },
				  errorPlacement: function(error, element) {
				  	//console.log(error);
				  	//error.appendTo( element.closest('.control-label') );
				  	//new_error = "this is error sample";
				  	$(element).closest('.form-group').append(error);
				  	error.addClass('label label-danger label-xlg arrowed-in-right arrowed-in');
				  	error.prepend('<i class="icon-bolt bigger-110 white"></i> ');
				  }
				 });
			}

			function validate_pie_chart(){

				$('#stat-pie-chart-options').validate(
				 {
				  rules: {
				    age_bracket: {
				      required: true
				    },
				    gender: {
				      required: true
				    },
				    status: {
				      required: true
				    },
				    employment: {
				      required: true
				    },
				    pie_chart_type: {
				      required: true
				    }
				  },
				  highlight: function(element) {
				    $(element).closest('.form-group').removeClass('has-success').addClass('has-error');
				  },
				  success: function(element) {
				    element
				    .text('OK!').removeClass('label-danger').addClass('label-success')
				    .prepend('<i class="icon-check bigger-110 white"></i> ')
				    .closest('.form-group').removeClass('has-error').addClass('has-success');
				  },
				  errorPlacement: function(error, element) {
				  	//console.log(error);
				  	//error.appendTo( element.closest('.control-label') );
				  	//new_error = "this is error sample";
				  	$(element).closest('.form-group').append(error);
				  	error.addClass('label label-danger label-xlg arrowed-in-right arrowed-in');
				  	error.prepend('<i class="icon-bolt bigger-110 white"></i> ');
				  }
				 });
			}

			function loading_button(){
				$('#loading-btn, #address-options-submit').on(ace.click_event, function () {
					var btn = $(this);
					btn.button('loading')
					setTimeout(function () {
						btn.button('reset')
					}, 4000)
				});
			}
			
		</script>


		

		

		

