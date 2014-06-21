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
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>stylesheets/alertify.core.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>stylesheets/alertify.default.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>stylesheets/basic.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>stylesheets/form.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>stylesheets/content.css">
<script type="text/javascript" src="<?php echo base_url();?>javascripts/jquery.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>javascripts/underscore.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>javascripts/backbone.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>javascripts/jquery.validationEngine.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>javascripts/jquery.validationEngine-en.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>javascripts/alertify.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>javascripts/solution.js"></script>
<title><?php echo $u_name; ?> - Submit</title>
</head>

<body>
	<div class="container">
    	<?php include 'header.php'; ?>
        
        <?php include 'menu.php'; ?>
        
		<section id="solution_section" class="offset-by-six ten columns">
			<h3>Upload a Solution</h3>
			<p><?php echo $error_solution; ?></p>
			<form method="post" action="<?php echo site_url("online_judge/upload_individual_solution/{$u_id}"); ?>" enctype="multipart/form-data">
				<label for="solution">Solution : </label>
				<input type="file" name="userfile" id="solution" class="validate[required,custom[integer]]"><br>
				<label for="problem_id">Problem ID : </label>
				<input type="number" name="problem_id" id="problem_id" class="validate[required]" value="<?php echo $p_id; ?>" readonly><br>
				<input type="submit" name="submit" value="Submit"><br>
			</form>
		</section>
        
        <?php include 'footer.php'; ?>
    </div>
</body>
</html>