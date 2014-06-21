<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Online Shop - <?php echo $product['pro_name'];?></title>
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
					<h2><?php echo $product['pro_name'];?></h2>
					<img src="<?php echo base_url("images/{$product['photo']}");?>" alt="image of <?php echo $product['pro_name']?>">
					<p>Description : <?php echo $product['description'];?></p>
					<table>
						<tr>
							<td>Weight</td>
							<td><?php echo $product['weight']?></td>
						</tr>
						<tr>
							<td>Stock</td>
							<td><?php echo $product['stock']?></td>
						</tr>
						<tr>
							<td>Cost</td>
							<td><?php echo $product['cost']?></td>
						</tr>
					</table>
					<?php 
						if(!$exists && !$empty){
							$url = site_url("user/add_to_shopping_cart/{$id}/{$product['pro_id']}");
							echo '<a href="'.$url.'">Add to Shopping Cart</a>';
						}
					?>
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