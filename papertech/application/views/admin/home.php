<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="description" content="Papertech">
		<meta name="viewport" content="initial-scale=1.0, user-scalable=no">
		<title>Welcome to Papertech Admin</title>
		<link rel="stylesheet" type="text/css" href="<?php echo base_url('stylesheets/foundation.min.css');?>">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url('stylesheets/buttons.css');?>">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url('stylesheets/admin/basic.css');?>">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url('stylesheets/admin/home.css');?>">
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
					this is home	
				</div>
			</div>
		</section>
	</body>
</html>