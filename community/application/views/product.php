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
					<div class="row">
						<h3><?php echo $product->name;?></h3>
					</div>
					<div class="row">
						<img src="<?php echo base_url("assets/images/products/large/{$product->name}.jpg");?>">
					</div>
					<div class="row">
						<table>
							<thead>
								<tr>
									<td>Stock</td>
									<td>Price</td>	
								</tr>
							</thead>
							<tbody>
								<tr>
									<td><?php echo $product->stock;?></td>
									<td><?php echo $product->price;?></td>
								</tr>
							</tbody>
						</table>
					</div>
					<div class="row">
						<div class="col-md-8">
							<h4>Share this</h4>
                           	<a class="facebook-share-button" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo base_url("assets/images/products/large/{$product->name}.jpg");?>" target="_blank" title="share on facebook"><span>Facebook</span></a>
                           	<a class="twitter-share-button" href="https://www.twitter.com/share?url=<?php echo base_url("assets/images/products/large/{$product->name}.jpg");?>" target="_blank" title="share on twitter"><span>Twitter</span></a>
                            <a class="google-share-button" href="https://plus.google.com/share?url=<?php echo base_url("assets/images/products/large/{$product->name}.jpg");?>" target="_blank" title="share on google+"><span>Google+</span></a>
						</div>
						<div class="col-md-4">
							<a href="<?php echo base_url("community/product/{$product->id}");?>" title="buy product">Buy</a>
						</div>
					</div>
				</div>
			</section>
			<?php $this->load->view('components/footer');?>
		</div>
		<script type="text/javascript" src="<?php echo base_url('js/master.js');?>"></script>
	</body>
</html>