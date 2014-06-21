<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Welcome to Community Online Shop</title>
		<link rel="stylesheet" type="text/css" href="<?php echo base_url('css/master.css');?>">
	</head>
	<body>
		<div class="container">
			<?php
				$this->load->view('components/header');
				$this->load->view('components/menu');
				$this->load->view('components/messages');
			?>
			<section class="row">
				<?php $this->load->view('components/sidebar');?>
				<div class="col-md-9">
					this is the user profile
				</div>
			</section>
			<?php $this->load->view('components/footer');?>
		</div>
		<script type="text/javascript" src="<?php echo base_url('js/master.js');?>"></script>
	</body>
</html>