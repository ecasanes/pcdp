<?php 

	$home_uri = '';
	$about_us_uri = 'page/about-us';
	$records_uri = 'records';
	$add_record_uri = 'records/add';
	$search_and_rank_uri = 'records/search-and-rank';
	$search_and_rank_results_uri = 'records/search-and-rank-results';
	$statistics_uri = 'records/statistics';
	$admin_panel_uri = 'admin';
	$add_new_admin_uri = 'admin/add';
	$view_all_admin_uri = 'admin/view-all-admin';
	$edit_account_uri = 'admin/edit-account';
	$request_inbox_uri = 'admin/inbox';
	$logout_uri = 'login/logout';
	$reports_dashboard_uri = 'reports/dashboard';
	$bar_charts_uri = 'reports/bar-charts';
	$pie_charts_uri = 'reports/pie-charts';
	$line_charts_uri = 'reports/line-charts';
	$point_system_settings_uri = 'admin/point-system';


	$home = base_url($home_uri);
	$about_us = base_url($about_us_uri);
	$records = base_url($records_uri);
	$add_record = base_url($add_record_uri);
	$search_and_rank = base_url($search_and_rank_uri);
	$search_and_rank_results = base_url($search_and_rank_results_uri);
	$statistics = base_url($statistics_uri);
	$admin_panel = base_url($admin_panel_uri);
	$add_new_admin = base_url($add_new_admin_uri);
	$view_all_admin = base_url($view_all_admin_uri);
	$edit_account = base_url($edit_account_uri);
	$request_inbox = base_url($request_inbox_uri);
	$logout = base_url($logout_uri);
	$reports_dashboard = base_url($reports_dashboard_uri);
	$bar_charts = base_url($bar_charts_uri);
	$pie_charts = base_url($pie_charts_uri);
	$line_charts = base_url($line_charts_uri);
	$point_system_settings = base_url($point_system_settings_uri);

	$current_url = current_url();

	$home_active = $current_url == $home?'active':'';
	$about_us_active = $current_url == $about_us?'active':'';

	$records_active = $current_url == $records?'active':'';
	$add_record_active = $current_url == $add_record?'active':'';
	$search_and_rank_active = $current_url == $search_and_rank?'active':'';

	$search_and_rank_results_session = $this->session->userdata('search_and_rank_session');
	if($search_and_rank_results_session){
		$search_and_rank_results_active = $current_url == $search_and_rank_results?'active':'';
	}else{
		$search_and_rank_results_active = '';
	}
	
	
	$bar_charts_active = $current_url == $bar_charts?'active':'';
	$pie_charts_active = $current_url == $pie_charts?'active':'';
	$line_charts_active = $current_url == $line_charts?'active':'';


	$statistics_active = $current_url == $statistics?'active':'';
	$admin_panel_active = $current_url == $admin_panel?'active':'';
	$add_new_admin_active = $current_url == $add_new_admin?'active':'';
	$view_all_admin_active = $current_url == $view_all_admin?'active':'';
	$edit_account_active = $current_url == $edit_account?'active':'';
	$request_inbox_active = $current_url == $request_inbox?'active':'';
	$point_system_settings_active = $current_url == $point_system_settings?'active':'';


	$records_menu_active = ($current_url == $records || $current_url == $add_record || $current_url == $search_and_rank || $current_url == $search_and_rank_results)?'active open':'';
	$admin_panel_menu_active = ($current_url == $add_new_admin || $current_url == $view_all_admin || $current_url == $edit_account || $current_url == $admin_panel || $current_url == $point_system_settings)?'active open':'';
	$reports_menu_active = ($current_url == $bar_charts || $current_url == $pie_charts || $current_url == $line_charts)?'active open':'';

?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<title><?php echo $title; ?> - Post Calamity Database Project</title>
		<link rel="shortcut icon" href="<?php echo $home; ?>/favicon.ico"/>
		<?php include('header-scripts.php'); ?>
	</head>

	<body class="navbar-fixed breadcrumbs-fixed">

		<div class="navbar navbar-fixed-top" id="navbar">
			<!--<script type="text/javascript">
				try{ace.settings.check('navbar' , 'fixed')}catch(e){}
			</script>-->

			<div class="navbar-container" id="navbar-container">
				<div class="navbar-header pull-left">
					<a href="<?php echo $home; ?>" class="navbar-brand">
						<small class="hidden-xs visible-sm visible-md visible-lg">
							<i class="icon-bar-chart"></i>
							Philippines Post Calamity Database Project
						</small>
						<small class="visible-xs hidden-sm hidden-md hidden-lg">
							<i class="icon-bar-chart"></i>
							PPCDP
						</small>
					</a><!-- /.brand -->
				</div><!-- /.navbar-header -->

				<?php include('top_navigation.php'); ?>
			</div><!-- /.container -->
		</div>

		<div class="main-container" id="main-container">
			<script type="text/javascript">
				try{ace.settings.check('main-container' , 'fixed')}catch(e){}
			</script>

			<div class="main-container-inner">
				<a class="menu-toggler" id="menu-toggler" href="#">
					<span class="menu-text"></span>
				</a>

				<?php include('sidebar_navigation.php'); ?>
					
				<div class="main-content">

					<div class="breadcrumbs breadcrumbs-fixed" id="breadcrumbs">
						<script type="text/javascript">
							try{ace.settings.check('breadcrumbs' , 'fixed')}catch(e){}
						</script>

						<ul class="breadcrumb">
							<li>
								<i class="icon-home home-icon"></i>
								<a href="<?php echo base_url(); ?>">Home</a>
							</li>

							<?php if($main_group != ''){ ?>
							<li class="active"><a href="<?php echo $base_url; ?>"><?php echo $main_group; ?></a></li>
							<?php } ?>

							<?php if($title != ''){ ?>
							<li class="active"><?php echo $title; ?></li>
							<?php } ?>

						</ul><!-- .breadcrumb -->

						<!--<div class="nav-search" id="nav-search">
							<form class="form-search" action="">
								<span class="input-icon">
									<input type="text" placeholder="Search ..." class="nav-search-input" id="nav-search-input" autocomplete="off" />
									<i class="icon-search nav-search-icon"></i>
								</span>
							</form>
						</div>--><!-- #nav-search -->
					</div>

					<div class="page-content">
						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->

								<div class="page-header">
									<h1 class="bolder">
										<?php echo $title; ?>
										<small>
											<?php 
											if($description != '' || $description != null){
											?>
											<i class="icon-double-angle-right"></i>
											<?php
												echo $description;
											}
											?>
										</small>
									</h1>
								</div>
					

	
	