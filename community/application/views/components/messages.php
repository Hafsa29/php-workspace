<div class="row">
	<?php if($this->session->flashdata('success')):?>
		<div class="alert alert-success">
			<a class="close" data-dismiss="alert" href="#">&times;</a>
			<?php echo $this->session->flashdata('message');?>	
		</div>
	<?php elseif($this->session->flashdata('error')):?>
		<div class="alert alert-danger">
			<a class="close" data-dismiss="alert" href="#">&times;</a>
			<?php echo $this->session->flashdata('message');?>	
		</div>
	<?php endif;?>
</div>
<div id="login-form-modal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button class="close" data-dismiss="modal">&times;</button>
				<h2>Please login to your account</h2>
			</div>
			<div class="modal-body">
				<form id="login-form" method="post" action="<?php echo site_url('community/login_user');?>" novalidate>
					<div class="form-group">
						<label for="login-email">Email : </label>
						<input id="login-email" name="email" class="form-control" type="email" placeholder="Email..." required>
					</div>
					<div class="form-group">
						<label for="login-password">Password : </label>
						<input id="login-password" name="password" class="form-control" type="password" placeholder="Password..." required>	
					</div>
					<input name="submit" class="btn btn-primary" type="submit" value="Submit">
				</form>
			</div>
		</div>
	</div>
</div>
<div id="register-form-modal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button class="close" data-dismiss="modal">&times;</button>
				<h2>Welcome to Community Online Shop</h2>
			</div>
			<div class="modal-body">
				<form id="register-form" method="post" action="<?php echo site_url('community/register_user');?>" novalidate>
					<div class="form-group">
						<label for="register-name">Name : </label>
						<input id="register-name" name="name" class="form-control" type="text" placeholder="Name..." required>
					</div>
					<div class="form-group">
						<label for="register-email">Email : </label>
						<input id="register-email" name="email" class="form-control" type="email" placeholder="Email..." required>
					</div>
					<div class="form-group">
						<label for="register-address">Address : </label>
						<input id="register-address" name="address" class="form-control" type="text" placeholder="Address..." required>
					</div>
					<div class="form-group">
						<label for="register-account">Account No. : </label>
						<input id="register-account" name="account" class="form-control" type="text" placeholder="Account..." required>
					</div>
					<div class="form-group">
						<label for="register-password">Password : </label>
						<input id="register-password" name="password" class="form-control" type="password" placeholder="Password..." required>
					</div>
					<div class="form-group">
						<label for="register-conf-password">Confirm Password : </label>
						<input id="register-conf-password" name="conf-password" class="form-control" type="password" placeholder="Confirm Password..." required>
					</div>
					<input name="submit" type="submit" value="Submit">
				</form>
			</div>
		</div>
	</div>
</div>