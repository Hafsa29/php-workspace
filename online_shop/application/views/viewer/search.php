<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Online Shop</title>
		<link rel="stylesheet" type="text/css" href="<?php echo base_url('stylesheets/bootstrap.min.css');?>">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url('stylesheets/basic.css');?>">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url('stylesheets/viewer/basic.css');?>">
	</head>
	<body>
		<div class="container">
			<?php $this->load->view('user/header');?>
			<section class="row">
				<?php echo $this->load->view('user/menu');?>
				<div class="col-md-6">
					<ul>
						<?php foreach($search as $i):?>
						<li><a href="<?php echo site_url("user/product/{$i['pro_id']}");?>"><?php echo $i['pro_name']?></a></li>
						<?php endforeach;?>
					</ul>
				</div>
			</section>
			<?php $this->load->view('user/footer');?>
		</div>
		<script type="text/javascript">
			var base_url = '<?php echo base_url();?>';
		</script>
		<script type="text/javascript" src="<?php echo base_url('javascripts/jquery.js');?>"></script>
		<script type="text/javascript" src="<?php echo base_url('javascripts/viewer/search.js');?>"></script>
	</body>
</html>