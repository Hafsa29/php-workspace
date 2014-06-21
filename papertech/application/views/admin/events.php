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
		<link rel="stylesheet" type="text/css" href="<?php echo base_url('stylesheets/admin/events.css');?>">
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
					<table>
						<?php foreach($events as $e):?>
						<tr>
							<td><?php echo $e['e_header']?></td>
							<td><a href="<?php echo site_url("admin/edit_event/{$u_id}/{$e['e_id']}")?>"><img src="<?php echo base_url('assets/images/pencil.jpg');?>"></a></td>
							<td><a href="<?php echo site_url("admin/delete_event/{$u_id}/{$e['e_id']}")?>"><img src="<?php echo base_url('assets/images/multiply.jpg');?>"></a></td>
						</tr>
						<?php endforeach;?>
					</table>
					<h3>Add a new Event</h3>
					<?php
						echo "<p>{$result}</p>";
					?>
					<form method="post" action="<?php echo site_url("admin/add_event/{$u_id}");?>" enctype="multipart/form-data" autocomplete="on" novalidate>
						<label for="header">Header :</label>
						<input id="header" class="validate[required]" name="header" type="text" placeholder="Header..." required><br>
						<label for="description">Description :</label>
						<textarea id="description" class="validate[required]" name="description" placeholder="Description..."></textarea><br>
						<label for="date">Date :</label>
						<input id="date" class="validate[required, custome[date]]" name="date" type="date" placeholder="Date..." required><br>
						<label for="pictures">Pictures :</label>
						<input id="pictures" class="validate[required]" name="userfile[]" type="file" multiple="multiple" placeholder="Pictures..."><br>
						<input class="button blue" name="submit" type="submit" value="Submit"><br>
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