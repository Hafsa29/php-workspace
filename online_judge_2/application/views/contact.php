<!doctype html>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>stylesheets/reset.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>stylesheets/skeleton.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>stylesheets/layout.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>stylesheets/customMessages.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>stylesheets/template.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>stylesheets/validationEngine.jquery.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>stylesheets/basic.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>stylesheets/content.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>stylesheets/form.css">
<script type="text/javascript" src="<?php echo base_url();?>javascripts/jquery.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>javascripts/underscore.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>javascripts/backbone.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>javascripts/jquery.validationEngine.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>javascripts/jquery.validationEngine-en.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>javascripts/contact.js"></script>
<title>You can contact with us</title>
</head>

<body>
	<div class="container">
		<?php include 'header.php'; ?>
		<section id="contact">
			
			<form action="#" method="post" id="contact" class="eight columns">
				<label for="name">Name : </label>
				<input id="name" name="name" type="text" class="validate[required]" placeholder="Enter Your Name"><br>
				<label for="email">Email : </label>
				<input id="email" name="email" type="email" class="validate[required,custom[email]]" placeholder="Enter Your Email"><br>
				<label for="Message">Message : </label>
				<textarea id="message" name="message" class="validate[required]" placeholder="Enter Your name"></textarea><br>
				<input type="submit" name="submit" value="Submit">
			</form>
			
			<div id="demo" class="eight columns">
			</div>
			

			<script type="text/template" id="temp">
				<div class="chunk"><span class="label">Name : </span><%= name %></div><br>
				<div class="chunk"><span class="label">Email: </span><%= email %></div><br>
				<div>
					<div class="chunk"><span class="label">Message</span></div><br>
					<div class="chunk">
						<%= message %>
					</div>
				</div>
			</script>
		
		</section>

		<?php include 'footer.php'; ?>
	</div>

</body>
</html>