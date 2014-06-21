<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="description" content="Papertech">
	<meta name="viewport" content="initial-scale=1.0, user-scalable=no">
	<title>Welcome to Papertech</title>
	<script type="text/javascript" src="<?php echo base_url();?>javascripts/jquery.js"></script>
	<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?v=3&key=AIzaSyDOa6ddqNHek_hR83F5VwplHjlCNNVmeqY&sensor=true"></script>
	<link type="text/css" rel="stylesheet" href="<?php echo base_url();?>stylesheets/foundation.min.css">
	<link type="text/css" rel="stylesheet" href="<?php echo base_url();?>stylesheets/jquery.bxslider.css">
	<link type="text/css" rel="stylesheet" href="<?php echo base_url();?>stylesheets/customMessages.css">
	<link type="text/css" rel="stylesheet" href="<?php echo base_url();?>stylesheets/validationEngine.jquery.css">
	<link type="text/css" rel="stylesheet" href="<?php echo base_url();?>stylesheets/buttons.css">
	<link href='http://fonts.googleapis.com/css?family=IM+Fell+Double+Pica+SC' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Ultra' rel='stylesheet' type='text/css'>
	<link type="text/css" rel="stylesheet" href="<?php echo base_url();?>stylesheets/site/basic.css">
</head>
<body>
	<?php $this->load->view('site/header');?>
	<section class="row">
		<nav class="large-3 columns">
			<ul>
				<li><a href="#/home">Home</a></li><hr>
				<li><a href="#/about_us">About Us</a></li><hr>
				<li><a href="#/products">Products</a></li><hr>
				<li><a href="#/resources">Resources</a></li><hr>
				<li><a href="#/clients">Clients</a></li><hr>
				<li><a href="#/events">Events</a></li><hr>
				<li><a href="#/contact">Contact</a></li><hr>
				<li><a href="#/order">Order Now</a></li><hr>
			</ul>
		</nav>
		<section id="content" class="large-9 columns">
		</section>
	</section>
	<?php $this->load->view('site/footer');?>
	<script type="text/javascript">
		var base_url = '<?php echo base_url();?>';
	</script>
	<script type="text/javascript" src="<?php echo base_url();?>javascripts/custom.modernizr.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>javascripts/foundation.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>javascripts/underscore.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>javascripts/backbone.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>javascripts/jquery.bxslider.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>javascripts/jquery.validationEngine.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>javascripts/jquery.validationEngine-en.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>javascripts/gmaps.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>javascripts/site/basic.js"></script>
</body>
</html>