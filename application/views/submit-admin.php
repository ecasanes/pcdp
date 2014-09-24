<?php

	if(is_object($account)){
		$id = $account->id;
		$username = $account->account;
		$password = $account->password;
		$firstname = $account->name;
		$lastname = $account->lastname;
		$role = $account->role;
		$form_id = "edit-admin";
		$submit_url = base_url('admin/save/edit/'.$id);
	}else{
		$id = '';
		$username = $this->input->post('username');
		$password = $this->input->post('password');;
		$firstname = $this->input->post('firstname');;
		$lastname = $this->input->post('lastname');;
		$role = $this->input->post('role');;
		$form_id = "add-admin";
		$submit_url = base_url('admin/save/add');
	}

	$view_all_admin = base_url('admin/view-all-admin');
	$field_error_prefix = '<div class="form-group col-sm-12 col-xs-12"><label class="col-sm-4 col-xs-12"></label><label class="col-sm-6 col-xs-12 error label label-danger arrowed-in-right arrowed-in">';
	$field_error_suffix = '</label></div>';

?>

<!--

col-xs = < 768px
col-sm = > 768px
col-md = > 992px
col-lg = > 1200px

-->

<!-- success message -->
<?php if($success_add): ?>
	<div class="row">
		<div class="alert alert-success alert-block">
				<button type="button" class="close" data-dismiss="alert">
					<i class="icon-remove"></i>
				</button>

				<p>
					<strong>
						<i class="icon-check"></i>
						New Admin was successfully added.
					</strong>
				</p>
			</div>
	</div>
<?php endif; ?>


<?php if($success_edit): ?>
	<div class="row">
		<div class="alert alert-success alert-block">
				<button type="button" class="close" data-dismiss="alert">
					<i class="icon-remove"></i>
				</button>

				<p>
					<strong>
						<i class="icon-check"></i>
						Admin Info was successfully updated.
					</strong>
				</p>
			</div>
	</div>
<?php endif; ?>


<div class="row">
	<div class="col-xs-12 col-sm-8">
		<div class="widget-box">
			<div class="widget-header">
				<h4>
					<i class="icon-pencil"></i>
					<?php if($form_id == 'edit-admin'): ?>
						Edit Information
					<?php else: ?>
						New Admin
					<?php endif; ?>
				</h4>
			</div>

			<div class="widget-body">
				<div class="widget-main no-padding">
					<form id="<?php echo $form_id; ?>" name='update_admin_form' action='<?php echo $submit_url; ?>' method='POST'>
						<fieldset>
							<div class="form-group col-sm-12 col-xs-12">
								<label class="col-sm-4 col-xs-12">Username <span class="text-danger">*</span></label>
								<input id="username" class="col-sm-6 col-xs-12" type="text" placeholder="Input Username..." name="username" value="<?php echo $username; ?>">
								<input type="hidden" name="id" value="<?php echo $id; ?>">
								
							</div>

							<?php echo form_error('username', $field_error_prefix, $field_error_suffix); ?>

							<?php if($form_id == 'edit-admin'): ?>
								<div class="form-group col-xs-12">
									<label class="col-sm-4 col-xs-12"></label>
									<span class="help-block col-sm-6 col-xs-12">If you want to change your password, please input password and confirm field.</span>
								</div>
							<?php endif; ?>


							<div class="form-group col-sm-12 col-xs-12">
								<label class="col-sm-4 col-xs-12">Password <span class="text-danger">*</span></label>
								<input class="col-sm-6 col-xs-12" type="password" placeholder="Input Password..." id="password" name="password" value="">
								
							</div>

							<?php echo form_error('password', $field_error_prefix, $field_error_suffix); ?>

							<div class="form-group col-sm-12 col-xs-12">
								<label class="col-sm-4 col-xs-12">Confirm Password</label>
								<input class="col-sm-6 col-xs-12" type="password" placeholder="Confirm Password..." id="confirm-password" name="confirm_password" value="">
							</div>

							<?php echo form_error('confirm_password', $field_error_prefix, $field_error_suffix); ?>

							<div class="form-group col-sm-12 col-xs-12">
								<label class="col-sm-4 col-xs-12">First Name <span class="text-danger">*</span></label>
								<input class="col-sm-6 col-xs-12" type="text" placeholder="Input First Name..." name="firstname" value="<?php echo $firstname; ?>">
							</div>

							<?php echo form_error('firstname', $field_error_prefix, $field_error_suffix); ?>

							<div class="form-group col-sm-12 col-xs-12">
								<label class="col-sm-4 col-xs-12">Last Name</label>
								<input class="col-sm-6 col-xs-12" type="text" placeholder="Input Last Name..." name="lastname" value="<?php echo $lastname; ?>">
							</div>

							<div class="form-group col-sm-12 col-xs-12">
								<label class="col-sm-4 col-xs-12">Role <span class="text-danger">*</span></label>
								<select class="form-control input-medium col-sm-6 col-xs-12" id="role" name="role">
									<?php echo select_role($role) ?>
								</select>
							</div>

							<?php echo form_error('role', $field_error_prefix, $field_error_suffix); ?>
							

							<div class="form-group col-sm-12 col-xs-12">
							<?php
							/*echo validation_errors('<div class="alert alert-danger">
							<button type="button" class="close" data-dismiss="alert">
								<i class="icon-remove"></i>
							</button>

							<strong>
								<i class="icon-remove"></i>
									Submit Failed
							</strong>', '<br>
							</div>'); */
							?>
							</div>

						</fieldset>

						<div class="form-actions center">
							<a href="<?php echo $view_all_admin; ?>" class="btn btn-sm btn-info" name="update_admin">
								<i class="icon-arrow-left icon-on-left bigger-110"></i>
								Back
							</a>
							<button type="submit" class="btn btn-sm btn-success" name="update_admin">
								<?php if($form_id == 'edit-admin'): ?>
									Update
								<?php else: ?>
									Submit
								<?php endif; ?>
								<i class="icon-arrow-right icon-on-right bigger-110"></i>
							</button>
						</div>
					</form>
				</div>
			</div>

		</div>
	</div>
</div>