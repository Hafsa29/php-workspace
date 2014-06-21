<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Online Shop - <?php echo $header?></title>
		<link rel="stylesheet" type="text/css" href="<?php echo base_url('stylesheets/bootstrap.min.css');?>">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url('stylesheets/basic.css');?>">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url('stylesheets/jquery.bxslider.css');?>">
	</head>
	<body>
		<div class="container">
			<?php $this->load->view('viewer/header');?>
			<section class="row">
				<?php echo $this->load->view('viewer/menu');?>
				<div class="col-md-6">
					<h2><?php echo $header;?></h2>
					<ul class="slider">
						<?php foreach($category as $i):?>
						<li><a href="<?php echo site_url("viewer/product/{$i['pro_id']}");?>"><img src="<?php echo base_url("images/{$i['photo']}");?>" alt="<?php echo $i['pro_name'];?>"></a></li>
						<?php endforeach ?>
					</ul>
				</div>
			</section>
			<?php $this->load->view('viewer/footer');?>
		</div>
		<script type="text/javascript">
			var base_url = '<?php echo base_url();?>';
		</script>
		<script type="text/javascript" src="<?php echo base_url('javascripts/jquery.js');?>"></script>
		<script type="text/javascript" src="<?php echo base_url('javascripts/jquery.bxslider.min.js');?>"></script>
		<script type="text/javascript" src="<?php echo base_url('javascripts/viewer/category.js');?>"></script>
		<script type="text/javascript" src="<?php echo base_url('javascripts/viewer/search.js');?>"></script>
	</body>
</html>
