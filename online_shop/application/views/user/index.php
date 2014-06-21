<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Online Shop</title>
		<link rel="stylesheet" type="text/css" href="<?php echo base_url('stylesheets/bootstrap.min.css');?>">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url('stylesheets/basic.css');?>">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url('stylesheets/user/basic.css');?>">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url('stylesheets/jquery.bxslider.css');?>">
	</head>
	<body>
		<div class="container">
			<?php $this->load->view('user/header');?>
			<section class="row">
				<?php echo $this->load->view('user/menu');?>
				<div class="col-md-6">
					<h2>Brownies</h2>
					<ul class="slider">
						<?php foreach($brownies as $i):?>
						<li><a href="<?php echo site_url("user/product/{$id}/{$i['pro_id']}");?>"><img src="<?php echo base_url("images/{$i['photo']}");?>" alt="<?php echo $i['pro_name'];?>"></a></li>
						<?php endforeach ?>
					</ul>
					<h2>Macaroons</h2>
					<ul class="slider">
						<?php foreach($macaroons as $i):?>
						<li><a href="<?php echo site_url("user/product/{$id}/{$i['pro_id']}");?>"><img src="<?php echo base_url("images/{$i['photo']}");?>" alt="<?php echo $i['pro_name'];?>"></a></li>
						<?php endforeach ?>
					</ul>
					<h2>Chocolates</h2>
					<ul class="slider">
						<?php foreach($chocolates as $i):?>
						<li><a href="<?php echo site_url("user/product/{$id}/{$i['pro_id']}");?>"><img src="<?php echo base_url("images/{$i['photo']}");?>" alt="<?php echo $i['pro_name'];?>"></a></li>
						<?php endforeach ?>
					</ul>
					<h2>Liquorice</h2>
					<ul class="slider">
						<?php foreach($liquorice as $i):?>
						<li><a href="<?php echo site_url("user/product/{$id}/{$i['pro_id']}");?>"><img src="<?php echo base_url("images/{$i['photo']}");?>" alt="<?php echo $i['pro_name'];?>"></a></li>
						<?php endforeach ?>
					</ul>
					<h2>Pastries</h2>
					<ul class="slider">
						<?php foreach($pastries as $i):?>
						<li><a href="<?php echo site_url("user/product/{$id}/{$i['pro_id']}");?>"><img src="<?php echo base_url("images/{$i['photo']}");?>" alt="<?php echo $i['pro_name'];?>"></a></li>
						<?php endforeach ?>
					</ul>
					<h2>Cakes</h2>
					<ul class="slider">
						<?php foreach($cakes as $i):?>
						<li><a href="<?php echo site_url("user/product/{$id}/{$i['pro_id']}");?>"><img src="<?php echo base_url("images/{$i['photo']}");?>" alt="<?php echo $i['pro_name'];?>"></a></li>
						<?php endforeach ?>
					</ul>
					<h2>Biscuits</h2>
					<ul class="slider">
						<?php foreach($biscuits as $i):?>
						<li><a href="<?php echo site_url("user/product/{$id}/{$i['pro_id']}");?>"><img src="<?php echo base_url("images/{$i['photo']}");?>" alt="<?php echo $i['pro_name'];?>"></a></li>
						<?php endforeach ?>
					</ul>
				</div>
			</section>
			<?php $this->load->view('user/footer');?>
		</div>
		<script type="text/javascript">
			var base_url = '<?php echo base_url();?>';
			var id = '<?php echo $id;?>';
		</script>
		<script type="text/javascript" src="<?php echo base_url('javascripts/jquery.js');?>"></script>
		<script type="text/javascript" src="<?php echo base_url('javascripts/jquery.bxslider.min.js');?>"></script>
		<script type="text/javascript" src="<?php echo base_url('javascripts/user/search.js');?>"></script>
		<script type="text/javascript" src="<?php echo base_url('javascripts/viewer/index.js');?>"></script>
	</body>
</html>