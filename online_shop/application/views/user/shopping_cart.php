<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Online Shop</title>
		<link rel="stylesheet" type="text/css" href="<?php echo base_url('stylesheets/bootstrap.min.css');?>">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url('stylesheets/basic.css');?>">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url('stylesheets/user/basic.css');?>">
	</head>
	<body>
		<div class="container">
			<?php $this->load->view('user/header');?>
			<section class="row">
				<?php echo $this->load->view('user/menu');?>
				<div class="col-md-6">
					<?php foreach ($shopping_cart as $k => $i):?>
					<h2><?php echo $i['pro_name'];?></h2>
					<img src="<?php echo base_url("images/{$i['photo']}");?>" alt="<?php echo $i['pro_name'];?>">
					<a href="<?php echo site_url("user/remove_from_shopping_cart/{$id}/{$k}");?>">Remove from Shopping Cart</a>
					<?php endforeach;?>
					<a href="<?php echo site_url("user/purchase/{$id}");?>">Purchase</a>
				</div>
			</section>
			<?php $this->load->view('user/footer');?>
		</div>
		<script type="text/javascript">
			var base_url = '<?php echo base_url();?>';
			var id = '<?php echo $id;?>';
		</script>
		<script type="text/javascript" src="<?php echo base_url('javascripts/jquery.js');?>"></script>
		<script type="text/javascript" src="<?php echo base_url('javascripts/user/search.js');?>"></script>
	</body>
</html>