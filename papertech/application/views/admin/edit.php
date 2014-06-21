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
		<link rel="stylesheet" type="text/css" href="<?php echo base_url('stylesheets/alertify.core.css');?>">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url('stylesheets/alertify.bootstrap.css');?>">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url('stylesheets/admin/basic.css');?>">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url('stylesheets/admin/edit.css');?>">
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
					<h3>Change Event Information</h3>
					<?php
						echo "<p>{$result}</p>";
					?>
					<form method="post" action="<?php echo site_url("admin/change_event/{$u_id}/{$e_id}");?>" autocomplete="on" novalidate>
						<label for="header">Header :</label>
						<input id="header" class="validate[required]" name="header" type="text" placeholder="Header..." required><br>
						<label for="description">Description :</label>
						<textarea id="description" class="validate[required]" name="description" placeholder="Description..."></textarea><br>
						<label for="date">Date :</label>
						<input id="date" class="validate[required, custom[date]]" name="date" type="date" placeholder="Date..." required><br>
						<input class="button blue" name="submit" type="submit" value="Change"><br>
					</form>
					<h3>Add Pictures to the Event</h3>
					<form method="post" action="<?php echo site_url("admin/add_pictures/{$u_id}/{$e_id}");?>" enctype="multipart/form-data" autocomplete="on" novalidate>
						<label for="pictures">Pictures :</label>
						<input id="pictures" class="validate[required]" name="userfile[]" type="file" multiple="multiple" placeholder="Pictures..."><br>
						<input class="button blue" name="submit" type="submit" value="Add"><br>
					</form>
					<h3>Delete Pictures</h3>
					<div id="del_pics">
						<ul>
							<?php foreach($pictures as $p):?>
							<li><a href="<?php echo site_url("admin/delete_picture/{$u_id}/{$e_id}/{$p['p_id']}");?>"><img src="<?php echo base_url("pictures/{$e_id}/{$p['p_id']}.jpg");?>"></a></li>
							<?php endforeach;?>
						</ul>
					</div>		
				</div>
			</div>
			
		</section>
	</body>
	<script type="text/javascript" src="<?php echo base_url('javascripts/jquery.js');?>"></script>
	<script type="text/javascript" src="<?php echo base_url('javascripts/alertify.min.js');?>"></script>
	<script type="text/javascript" src="<?php echo base_url('javascripts/jquery.validationEngine-en.js');?>"></script>
	<script type="text/javascript" src="<?php echo base_url('javascripts/jquery.validationEngine.js');?>"></script>
	<script type="text/javascript">
		$(window).load(function(){
			$('form').validationEngine('attach');
			$('#del_pics a').on('click', function(e){
				e.preventDefault()
				var url = $(e.target).parent().attr('href');
				alertify.confirm('Are you sure?', function (e) {
				    if(e){
				    	window.location.href = url;
				    }
				});
			});
		});
	</script>
</html>