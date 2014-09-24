<?php
	$view_admin = base_url('admin/view');
	$edit_admin = base_url('admin/edit');
	$delete_admin = base_url('admin/delete');
	$create_csv = base_url('admin/create-csv');
?>


<div class="table-responsive">
	<table id="admin-table" class="table table-striped table-bordered table-hover">
		<thead>
			<tr>
				<!--<th class="center">
					<label>
						<input type="checkbox" class="ace" />
						<span class="lbl"></span>
					</label>
				</th>-->
				<th>ID</th>
				<th>Username</th>
				<th>First Name</th>
				<th class="hidden-480">Last Name</th>
				<th>Role</th>
				<th class="hidden-480">
					<i class="icon-signal hidden-480"></i>
					No. of Encoded Names
				</th>
				<th></th>
			</tr>
		</thead>

		<tbody>
			<?php
				foreach($accounts as $account){
					$id = $account['id'];
					$username = $account['username'];
					$firstname = $account['firstname'];
					$lastname = $account['lastname'];
					$status = $account['status'];
					$role = $account['role'];
					$no_of_encoded = $account['no_of_encoded'];
			?>
			<tr>
				<!--<td class="center">
					<label>
						<input type="checkbox" class="ace" />
						<span class="lbl"></span>
					</label>
				</td>-->

				<td><?php echo $id; ?></td>
				<td><?php echo $username; ?></td>
				<td><?php echo $firstname; ?></td>
				<td class="hidden-480"><?php echo $lastname; ?></td>
				<td><?php echo $role; ?></td>
				<td class="hidden-480">
					<span class="label label-sm label-info"><?php echo $no_of_encoded; ?></span>
				</td>

				<td>
					<div class="visible-md visible-lg hidden-sm hidden-xs btn-group">
						
						<!--<a href="<?php echo $view_admin.'/'.$id; ?>" class="btn btn-xs btn-success">
							<i class="icon-zoom-in bigger-120"></i>
							VIEW
						</a>-->

						<a href="<?php echo $edit_admin.'/'.$id; ?>" class="btn btn-xs btn-info">
							<i class="icon-edit bigger-120"></i>
							EDIT
						</a>

						<a href="<?php echo $delete_admin.'/'.$id; ?>" class="btn btn-xs btn-danger">
							<i class="icon-trash bigger-120"></i>
							DELETE
						</a>
					</div>

					<div class="visible-xs visible-sm hidden-md hidden-lg">
						<div class="inline position-relative">
							<button class="btn btn-minier btn-primary dropdown-toggle" data-toggle="dropdown">
								<i class="icon-cog icon-only bigger-110"></i>
							</button>

							<ul class="dropdown-menu dropdown-only-icon dropdown-yellow pull-right dropdown-caret dropdown-close">
								<!--<li>
									<a href="#" class="tooltip-info" data-rel="tooltip" title="View">
										<span class="blue">
											<i class="icon-zoom-in bigger-120"></i>
										</span>
									</a>
								</li>-->

								<li>
									<a href="#" class="tooltip-success" data-rel="tooltip" title="Edit">
										<span class="green">
											<i class="icon-edit bigger-120"></i>
										</span>
									</a>
								</li>

								<li>
									<a href="#" class="tooltip-error" data-rel="tooltip" title="Delete">
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