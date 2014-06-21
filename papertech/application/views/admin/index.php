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
		<link rel="stylesheet" type="text/css" href="<?php echo base_url('stylesheets/admin/index.css');?>">
	</head>
	<body>
		<?php $this->load->view('admin/header');?>
		<section>
			<div class="row">
				<div class="large-12 columns">
					<h3>Enter your email and password to login</h3>
					<?php
						echo "<p>{$result}</p>";
					?>
					<form method="post" action="<?php echo site_url('admin/sign_in');?>" autocomplete="on" novalidate>
						<label for="email">Email :</label>
						<input id="email" class="validate[required, custom[email]]" name="email" type="email" placeholder="Email..." required><br>
						<label for="password">Password: </label>
						<input id="password" class="validate[required]" name="password" type="password" placeholder="Password..." required><br>
						<img id="captcha" src="<?php echo site_url('admin/captcha');?>"><input class="validate[required]" name="captcha" type="text" placeholder="Are u Human?">
						<input class="button blue" name="submit" type="submit" value="Login"><br>
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