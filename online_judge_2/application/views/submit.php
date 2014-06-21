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
<script type="text/javascript" src="<?php echo base_url();?>javascripts/submit.js"></script>
<title><?php echo $u_name; ?> - Submit</title>
</head>

<body>
	<div class="container">
    	<?php include 'header.php'; ?>
        
        <?php include 'menu.php'; ?>
        
		<section id="submit">
			
			<div class="one-third column">
				<h3>Upload a Problem</h3>
				<p><?php echo $error_problem; ?></p>
				<form method="post" action="<?php echo site_url("online_judge/upload_problem/{$u_id}"); ?>" enctype="multipart/form-data" id="upload_problems">
					<label for="problem_file">Problem : </label>
					<input type="file" name="userfile[]" id="problem_file" class="validate[required]"><br>
					<label for="problem_file_name">Name : </label>
					<input type="text" name="name" id="problem_file_name" class="validate[required]"><br>
					<label for="problem_file_type">Type : </label>
					<select id="problem_file_type" name="type">
						<option value="adhoc" selected>Adhoc</option>
						<option value="mathematics">Mathematics</option>
						<option value="graph_theory">Graph Theory</option>
						<option value="data_structure">Data Structure</option>
						<option value="dynamic_programming">Dynamic Programming</option>
						<option value="computational_geometry">Computational Geometry</option>
					</select><br>
					<label for="file_input">Input : </label>
					<input type="file" name="userfile[]" id="file_input" class="validate[required]"><br>
					<label for="file_output">Output : </label>
					<input type="file" name="userfile[]" id="file_output" class="validate[required]"><br>
					<input type="submit" name="submit" value="Submit"><br>
				</form>
				
				<form method="post" action="<?php echo site_url("online_judge/upload_link_problem/{$u_id}"); ?>" enctype="multipart/form-data">
                    <label for="problem_link">Problem : </label>
                    <input type="url" name="link" id="problem_link" class="validate[required,custom[url]]">
                    <label for="problem_link_name">Name : </label>
					<input type="text" name="name" id="problem_link_name" class="validate[required]"><br>
					<label for="problem_link_type">Type : </label>
					<select id="problem_link_type" name="type">
						<option value="adhoc" selected>Adhoc</option>
						<option value="mathematics">Mathematics</option>
						<option value="graph_theory">Graph Theory</option>
						<option value="data_structure">Data Structure</option>
						<option value="dynamic_programming">Dynamic Programming</option>
						<option value="computational_geometry">Computational Geometry</option>
					</select><br>
					<label for="link_input">Input : </label>
					<input type="file" name="userfile[]" id="link_input" class="validate[required]"><br>
					<label for="link_output">Output : </label>
					<input type="file" name="userfile[]" id="link_output" class="validate[required]"><br>
					<input type="submit" name="submit" value="Submit"><br>
                </form>
			</div>
           
		   <div class="one-third column">
				<h3>Upload a Tutorial</h3>
				<p><?php echo $error_tutorial; ?></p>
                <form method="post" action="<?php echo site_url("online_judge/upload_tutorial/{$u_id}"); ?>" enctype="multipart/form-data">
                    <label for="tutorial_file">Tutorial : </label>
                    <input type="file" name="userfile" id="tutorial_file" class="validate[required]">
                    <label for="tutorial_file_name">Name : </label>
                    <input type="text" name="name" id="tutorial_file_name" class="validate[required]"><br>
                    <label for="tutorial_file_type">Type : </label>
                    <select id="tutorial_file_type" name="type">
                        <option value="adhoc" selected>Adhoc</option>
                        <option value="mathematics">Mathematics</option>
                        <option value="graph_theory">Graph Theory</option>
                        <option value="data_structure">Data Structure</option>
                        <option value="dynamic_programming">Dynamic Programming</option>
                        <option value="computational_geometry">Computational Geometry</option>
                    </select><br>
                    <input type="submit" name="submit" value="Submit"><br>
                </form>
                
                <form method="post" action="<?php echo site_url("online_judge/upload_link_tutorial/{$u_id}"); ?>" enctype="multipart/form-data">
                    <label for="tutorial_link">Tutorial : </label>
                    <input type="url" name="link" id="tutorial_link" class="validate[required,custom[url]]">
                    <label for="tutorial_link_name">Name : </label>
                    <input type="text" name="name" id="tutorial_link_name" class="validate[required]"><br>
                    <label for="tutorial_link_type">Type : </label>
                    <select id="tutorial_link_type" name="type">
                        <option value="adhoc" selected>Adhoc</option>
                        <option value="mathematics">Mathematics</option>
                        <option value="graph_theory">Graph Theory</option>
                        <option value="data_structure">Data Structure</option>
                        <option value="dynamic_programming">Dynamic Programming</option>
                        <option value="computational_geometry">Computational Geometry</option>
                    </select><br>
                    <input type="submit" name="submit" value="Submit"><br>
                </form>
            </div>
            
			<div class="one-third column">
				<h3>Upload a Solution</h3>
				<p><?php echo $error_solution; ?></p>
				<form method="post" action="<?php echo site_url("online_judge/upload_solution/{$u_id}"); ?>" enctype="multipart/form-data">
					<label for="solution">Solution : </label>
					<input type="file" name="userfile" id="solution" class="validate[required]"><br>
					<label for="problem_id">Problem ID : </label>
					<input type="number" name="problem_id" id="problem_id" class="validate[required,custom[integer]]"><br>
					<input type="submit" name="submit" value="Submit"><br>
				</form>
			</div>
		</section>
        
        <?php include 'footer.php'; ?>
    </div>
</body>
</html>