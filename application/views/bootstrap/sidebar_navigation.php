
<div class="sidebar sidebar-fixed" id="sidebar">
					<script type="text/javascript">
						try{ace.settings.check('sidebar' , 'fixed')}catch(e){}
					</script>

					<div class="sidebar-shortcuts" id="sidebar-shortcuts">
						<div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">
							<a href="<?php echo $statistics; ?>" class="btn btn-success <?php echo $statistics_active; ?>">
								<i class="icon-signal"></i>
							</a>

							<a href="<?php echo $edit_account; ?>" class="btn btn-info <?php echo $edit_account_active; ?>">
								<i class="icon-pencil"></i>
							</a>

							<a href="<?php echo $view_all_admin; ?>" class="btn btn-warning <?php echo $view_all_admin_active; ?>">
								<i class="icon-group"></i>
							</a>

							<a href="<?php echo $admin_panel; ?>" class="btn btn-danger <?php echo $admin_panel_active; ?>">
								<i class="icon-cogs"></i>
							</a>
						</div>

						<div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">
							<span class="btn btn-success"></span>

							<span class="btn btn-info"></span>

							<span class="btn btn-warning"></span>

							<span class="btn btn-danger"></span>
						</div>
					</div><!-- #sidebar-shortcuts -->

					<ul class="nav nav-list">
						<li class="<?php echo $home_active; ?> <?php echo markup_hidden($home_uri); ?>">
							<a href="<?php echo $home; ?>">
								<i class="icon-home"></i>
								<span class="menu-text"> Home </span>
							</a>
						</li>

						<li class="<?php echo $about_us_active; ?> <?php echo markup_hidden($about_us_uri); ?>">
							<a href="<?php echo $about_us; ?>">
								<i class="icon-desktop"></i>
								<span class="menu-text"> About Us </span>
							</a>
						</li>

						<li class="<?php echo $records_menu_active; ?>">
							<a href="#" class="dropdown-toggle">
								<i class="icon-list"></i>
								<span class="menu-text"> Records </span>

								<b class="arrow icon-angle-down"></b>
							</a>

							<ul class="submenu">
								<li class="<?php echo $add_record_active; ?> <?php echo markup_hidden($add_record_uri); ?>">
									<a href="<?php echo $add_record; ?>">
										<i class="icon-edit"></i>
										Add New Record
									</a>
								</li>

								<li class="<?php echo $records_active ?> <?php echo markup_hidden($records_uri); ?>">
									<a href="<?php echo $records; ?>">
										<i class="icon-list-alt"></i>
										View All Records
									</a>
								</li>

								<li class="<?php echo $search_and_rank_active ?> <?php echo markup_hidden($search_and_rank_uri); ?>">
									<a href="<?php echo $search_and_rank; ?>">
										<i class="icon-search"></i>
										Search and Rank
									</a>
								</li>

								<?php if($search_and_rank_results_session): ?>
								<li class="<?php echo $search_and_rank_results_active ?> <?php echo markup_hidden($search_and_rank_results_uri); ?>">
									<a href="<?php echo $search_and_rank_results; ?>">
										<i class="icon-search"></i>
										Search Results
									</a>
								</li>
								<?php endif; ?>

							</ul>
						</li>

						<li class="<?php echo $statistics_active; ?> <?php echo markup_hidden($statistics_uri); ?>">
							<a href="<?php echo $statistics; ?>">
								<i class="icon-table"></i>
								<span class="menu-text"> Statistics </span>
							</a>
						</li>

						<li class="<?php echo $admin_panel_menu_active; ?>  <?php echo markup_hidden($edit_account_uri); ?>">
							<a href="#" class="dropdown-toggle">
								<i class="icon-cogs"></i>
								<span class="menu-text"> Administration </span>
								<b class="arrow icon-angle-down"></b>
							</a>

							<ul class="submenu">

								<!--<li class="<?php echo $admin_panel_active; ?>  <?php echo markup_hidden($admin_panel_uri); ?>">
									<a href="<?php echo $admin_panel; ?>">
										<i class="icon-dashboard"></i>
										<span class="menu-text"> Admin Panel </span>
									</a>
								</li>-->

								<li class="<?php echo $add_new_admin_active; ?> <?php echo markup_hidden($add_new_admin_uri); ?>">
									<a href="<?php echo $add_new_admin; ?>">
										<i class="icon-user"></i>
										<span class="menu-text"> Add New Admin </span>
									</a>
								</li>

								<li class="<?php echo $view_all_admin_active; ?> <?php echo markup_hidden($view_all_admin_uri); ?>">
									<a href="<?php echo $view_all_admin; ?>">
										<i class="icon-group"></i>
										<span class="menu-text"> View All Admin </span>
									</a>
								</li>

								<li class="<?php echo $point_system_settings_active; ?> <?php echo markup_hidden($point_system_settings_uri); ?>">
									<a href="<?php echo $point_system_settings; ?>">
										<i class="icon-adjust"></i>
										<span class="menu-text"> Point System </span>
									</a>
								</li>

								<li class="<?php echo $edit_account_active; ?> <?php echo markup_hidden($edit_account_uri); ?>">
									<a href="<?php echo $edit_account; ?>">
										<i class="icon-pencil"></i>
										<span class="menu-text"> Edit My Account </span>
									</a>
								</li>
							</ul>

						</li>



						<!--<li class="<?php echo $request_inbox_active; ?> <?php echo markup_hidden($request_inbox_uri); ?>">
							<a href="<?php echo $request_inbox; ?>">
								<i class="icon-envelope-alt"></i>
								<span class="menu-text"> Request Inbox </span>
							</a>
						</li>-->



						<li class="<?php echo $reports_menu_active; ?>">
							<a href="#" class="dropdown-toggle">
								<i class="icon-bar-chart"></i>
								<span class="menu-text"> Reports </span>
								<b class="arrow icon-angle-down"></b>
							</a>

							<ul class="submenu">

								<li class="<?php echo $bar_charts_active; ?>  <?php echo markup_hidden($bar_charts_uri); ?>">
									<a href="<?php echo $bar_charts; ?>">
										<i class="icon-bar-chart"></i>
										<span class="menu-text"> Bar Charts </span>
									</a>
								</li>

								<li class="<?php echo $pie_charts_active; ?> <?php echo markup_hidden($pie_charts_uri); ?>">
									<a href="<?php echo $pie_charts; ?>">
										<i class="icon-info-sign"></i>
										<span class="menu-text"> Pie Charts </span>
									</a>
								</li>

								<!--<li class="<?php echo $line_charts_active; ?> <?php echo markup_hidden($line_charts_uri); ?>">
									<a href="<?php echo $line_charts; ?>">
										<i class="icon-signal"></i>
										<span class="menu-text"> Line Charts </span>
									</a>
								</li>-->
							</ul>

						</li>

					</ul><!-- /.nav-list -->

					<div class="sidebar-collapse" id="sidebar-collapse">
						<i class="icon-double-angle-left" data-icon1="icon-double-angle-left" data-icon2="icon-double-angle-right"></i>
					</div>

					<script type="text/javascript">
						try{ace.settings.check('sidebar' , 'collapsed')}catch(e){}
					</script>
				</div>