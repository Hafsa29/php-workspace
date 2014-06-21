<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Online Shop - Login/Register</title>
		<link rel="stylesheet" type="text/css" href="<?php echo base_url('stylesheets/bootstrap.min.css');?>">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url('stylesheets/form.css');?>">
	</head>
	<body>
		<div class="container">
			<?php $this->load->view('viewer/header');?>
			<section class="row">
				<div class="col-md-6">
					<div id="sign_in_error">
						<?php echo $sign_in_error;?>
					</div>
					<form id="sign_in" method="post" action="<?php echo site_url('viewer/sign_in');?>" novalidate autocomplete="on">
						<label for="sign_in_username">username : </label>
						<input id="sign_in_username" name="sign_in_username" type="text" placeholder="username" required><br>
						<label for="sign_in_password">password : </label>
						<input id="sign_in_passsword" name="sign_in_password" type="password" placeholder="password" required><br>
						<input name="submit" type="submit" value="submit">
					</form>
				</div>
				<div class="col-md-6">
					<div id="sign_up_error">
						<?php echo $sign_up_error;?>
					</div>
					<form id="sign_up" method="post" action="<?php echo site_url('viewer/sign_up');?>" novalidate autocomplete="on">
						<label for="sign_up_username">username : </label>
						<input id="sign_up_username" name="sign_up_username" type="text" placeholder="username" required><br>
						<label for="sign_up_password">password : </label>
						<input id="sign_up_password" name="sign_up_password" type="password" placeholder="password" required><br>
						<label for="sign_up_confirm_password">password : </label>
						<input id="sign_up_confirm_password" name="sign_up_confirm_password" type="password" placeholder="confirm password" required><br>
						<label for="sign_up_first_name">first name : </label>
						<input id="sign_up_first_name" name="sign_up_first_name" type="text" placeholder="first name" required><br>
						<label for="sign_up_last_name">last name : </label>
						<input id="sign_up_last_name" name="sign_up_last_name" type="text" placeholder="last name" required><br>
						<label for="sign_up_address">address : </label>
						<input id="sign_up_address" name="sign_up_address" type="text" placeholder="address" required><br>
						<label for="sign_up_phone">phone : </label>
						<input id="sign_up_phone" name="sign_up_phone" type="text" placeholder="phone" required><br>
						<label for="sign_up_email">email : </label>
						<input id="sign_up_email" name="sign_up_email" type="text" placeholder="email" required><br>
						<input name="submit" type="submit" value="submit">
					</form>
				</div>
			</section>
			<?php $this->load->view('viewer/footer');?>
		</div>
		<script type="text/javascript">
			var base_url = '<?php echo base_url();?>';
		</script>
		<script type="text/javascript" src="<?php echo base_url('javascripts/jquery.js');?>"></script>
		<script type="text/javascript" src="<?php echo base_url('javascripts/viewer/search.js');?>"></script>
	</body>
</html>
