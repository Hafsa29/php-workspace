<?php $session = new Session;?>
<?php if(!$session->userdata('logged_in')):?>
	<div class="modal fade" id="login-modal">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button class="close" data-dismiss="modal">&times;</button>
					<h2>Please Login</h2>
				</div>
				<div class="modal-body">
					<?php
						$url = new Url;
						$action = $url->site_url('users/login');
					?>
					<form action="<?php echo $action;?>" method="post" novalidate>
						<div class="form-group">
							<label for="login-email-input">Email: </label>
							<input type="email" id="login-email-input" name="email" class="form-control" placeholder="Email..." required>
						</div>
						<div class="form-group">
							<label for="login-password-input">Password: </label>
							<input type="password" id="login-password-input" name="password" class="form-control" placeholder="Password..." required>
						</div>
						<input type="submit" name="submit" class="btn btn-default" value="Submit">
						<a href="#" class="btn btn-default" data-target="#register-modal" data-toggle="modal" data-dismiss="modal">Register</a>
					</form>
				</div>
				<div class="modal-footer">
					dont know what will be here
				</div>
			</div>
		</div>
	</div>
	<div class="modal fade" id="register-modal">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button class="close" data-dismiss="modal">&times;</button>
					<h2>Please Register</h2>
				</div>
				<div class="modal-body">
					<?php
						$url = new Url;
						$action = $url->site_url('users/register');
					?>
					<form action="<?php echo $action;?>" method="post" novalidate>
						<div class="form-group">
							<label for="register-firstname-input">First Name: </label>
							<input type="text" id="register-firstname-input" name="firstname" class="form-control" placeholder="First Name..." required>
						</div>
						<div class="form-group">
							<label for="register-lastname-input">Last Name: </label>
							<input type="text" id="register-lastname-input" name="lastname" class="form-control" placeholder="Last Name..." required>
						</div>
						<div class="form-group">
							<label for="register-email-input">Email: </label>
							<input type="email" id="register-email-input" name="email" class="form-control" placeholder="Email..." required>
						</div>
						<div class="form-group">
							<label for="register-password-input">Password: </label>
							<input type="password" id="register-password-input" name="password" class="form-control" placehlder="Password..." required>
						</div>
						<div class="form-group">
							<label for="register-confirm-password-input">Confirm Password: </label>
							<input type="password" id="register-password-input" name="confirm-password" class="form-control" placehlder="Confirm Password..." required>
						</div>
						<input type="submit" name="submit" class="btn btn-default" value="Submit">
						<a href="#" class="btn btn-default" data-target="#login-modal" data-toggle="modal" data-dismiss="modal">Login</a>
					</form>
				</div>
				<div class="modal-footer">
					dont know what will be here
				</div>
			</div>
		</div>
	</div>
<?php endif;?>
<section class="row">
	<?php if($session->flashdata('error')):?>
		<div class="alert alert-danger">
			<button class="close" data-dismiss="alert">&times;</button>
			<p><?php echo $session->flashdata('message');?></p>
		</div>
	<?php endif;?>
	<?php if($session->flashdata('success')):?>
		<div class="alert alert-success">
			<button class="close" data-dismiss="alert">&times;</button>
			<p><?php echo $session->flashdata('message');?></p>
		</div>
	<?php endif;?>
</section>
