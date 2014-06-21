<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="description" content="Papertech">
		<meta name="viewport" content="initial-scale=1.0, user-scalable=no">
		<title>Welcome to Papertech Admin</title>
		<link rel="stylesheet" type="text/css" href="<?php echo base_url('stylesheets/foundation.min.css');?>">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url('stylesheets/buttons.css');?>">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url('stylesheets/validationEngine.jquery.css');?>">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url('stylesheets/customMessages.css');?>">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url('stylesheets/admin/basic.css');?>">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url('stylesheets/admin/profile.css');?>">
	</head>
	<body>
		<?php $this->load->view('admin/header');?>
		<?php
			$data['u_id'] = $u_id; 
			$this->load->view('admin/menu', $data);
		?>
		<section>
			<div class="row">
				<div class="large-12 columns">
					<h3>Add a new account</h3>
					<?php
						echo "<p>{$result_1}</p>";
					?>
					<form method="post" action="<?php echo site_url("admin/sign_up/{$u_id}");?>" autocomplete="on" novalidate>
						<label for="new_email">Email :</label>
						<input id="new_email" class="validate[required, custom[email]]" name="email" type="email" placeholder="Email..." required><br>
						<label for="new_password">Password: </label>
						<input id="new_password" class="validate[required]" name="password" type="password" placeholder="Password..." required><br>
						<label for="new_conf_password">Retype Password: </label>
						<input id="new_conf_password" class="validate[required, equals[new_password]]" name="conf_password" type="password" placeholder="Retype Password..." required><br>
						<input class="button blue" name="submit" type="submit" value="Sign Up"><br>
					</form>
					<h3>Change your Account Information</h3>
					<?php
						echo "<p>{$result_2}</p>";
					?>
					<form method="post" action="<?php echo site_url("admin/change_account/{$u_id}");?>" autocomplete="on" novalidate>
						<label for="email">Email :</label>
						<input id="email" class="validate[required, custom[email]]" name="email" type="email" placeholder="Email..." required><br>
						<label for="password">Password: </label>
						<input id="password" class="validate[required]" name="password" type="password" placeholder="Password..." required><br>
						<label for="conf_password">Retype Password: </label>
						<input id="conf_password" class="validate[required, equals[password]]" name="conf_password" type="password" placeholder="Retype Password..." required><br>
						<label for="old_password">Old Password: </label>
						<input id="old_password" class="validate[required]" name="old_password" type="password" placeholder="Old Password..." required><br>
						<input class="button blue" name="submit" type="submit" value="Change"><br>
					</form>		
				</div>
			</div>
		</section>
	</body>
	<script type="text/javascript" src="<?php echo base_url('javascripts/jquery.js');?>"></script>
	<script type="text/javascript" src="<?php echo base_url('javascripts/jquery.validationEngine-en.js');?>"></script>
	<script type="text/javascript" src="<?php echo base_url('javascripts/jquery.validationEngine.js');?>"></script>
	<script type="text/javascript">
		$(window).load(function(){
			$('form').validationEngine('attach');
		});
	</script>
</html>