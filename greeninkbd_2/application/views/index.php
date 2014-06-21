<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Welcome to Green ink.</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>stylesheets/foundation.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>stylesheets/parallax_slider.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>stylesheets/elastislide.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>stylesheets/jquery.bxslider.css">
	<link type="text/css" rel="stylesheet" href="<?php echo base_url();?>stylesheets/customMessages.css">
	<link type="text/css" rel="stylesheet" href="<?php echo base_url();?>stylesheets/validationEngine.jquery.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>stylesheets/buttons.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>stylesheets/basic.css">
	<link href='http://fonts.googleapis.com/css?family=Armata' rel='stylesheet' type='text/css'>
	<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?v=3&key=AIzaSyDOa6ddqNHek_hR83F5VwplHjlCNNVmeqY&sensor=true"></script>
</head>
<body>
	<script type="text/javascript" src="<?php echo base_url();?>javascripts/modernizr.custom.75901.js"></script>
	
	<?php $this->load->view('header');?>
	<?php $this->load->view('menu');?>
	<section id="content">
	</section>
	<?php $this->load->view('footer');?>
	
	<script type="text/javascript">
		var base_url = '<?php echo base_url();?>';
	</script>
	<script type="text/javascript" src="<?php echo base_url();?>javascripts/jquery.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>javascripts/foundation.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>javascripts/foundation.tooltips.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>javascripts/underscore.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>javascripts/backbone.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>javascripts/parallax_slider.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>javascripts/jquery.flexslider-min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>javascripts/jquery.elastislide.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>javascripts/jquery.bxslider.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>javascripts/jquery.validationEngine.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>javascripts/jquery.validationEngine-en.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>javascripts/gmaps.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>javascripts/basic.js"></script>
</body>
</html>