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
					<article class="row">
						<h3><a href="<?php echo site_url('community/category/shirts');?>">Shirts</a></h3>
						<ul class="categories">
							<?php foreach($shirts as $k => $i):?>
								<li><a href="<?php echo site_url("community/product/{$i->id}");?>" title="<?php echo $i->name;?>"><img src="<?php echo base_url("assets/images/products/small/{$i->name}.jpg");?>"></a></li>
							<?php endforeach;?>
						</ul>
					</article>
					<article class="row">
						<h3><a href="<?php echo site_url('community/category/pants');?>">Pants</a></h3>
						<ul class="categories">
							<?php foreach($pants as $k => $i):?>
								<li><a href="<?php echo site_url("community/product/{$i->id}");?>" title="<?php echo $i->name;?>"><img src="<?php echo base_url("assets/images/products/small/{$i->name}.jpg");?>"></a></li>
							<?php endforeach;?>
						</ul>
					</article>
					<article class="row">
						<h3><a href="<?php echo site_url('community/category/t-shirts');?>">T-Shirts</a></h3>
						<ul class="categories">
							<?php foreach($tshirts as $k => $i):?>
								<li><a href="<?php echo site_url("community/product/{$i->id}");?>" title="<?php echo $i->name;?>"><img src="<?php echo base_url("assets/images/products/small/{$i->name}.jpg");?>"></a></li>
							<?php endforeach;?>
						</ul>
					</article>
					<article class="row">
						<h3><a href="<?php echo site_url('community/category/shorts');?>">Shorts</a></h3>
						<ul class="categories">
							<?php foreach($shorts as $k => $i):?>
								<li><a href="<?php echo site_url("community/product/{$i->id}");?>" title="<?php echo $i->name;?>"><img src="<?php echo base_url("assets/images/products/small/{$i->name}.jpg");?>"></a></li>
							<?php endforeach;?>
						</ul>
					</article>
					<article class="row">
						<h3><a href="<?php echo site_url('community/category/fatuas');?>">Fatuas</a></h3>
						<ul class="categories">
							<?php foreach($fatuas as $k => $i):?>
								<li><a href="<?php echo site_url("community/product/{$i->id}");?>" title="<?php echo $i->name;?>"><img src="<?php echo base_url("assets/images/products/small/{$i->name}.jpg");?>"></a></li>
							<?php endforeach;?>
						</ul>
					</article>
					<article class="row">
						<h3><a href="<?php echo site_url('community/category/punjabis');?>">Punjabis</a></h3>
						<ul class="categories">
							<?php foreach($punjabis as $k => $i):?>
								<li><a href="<?php echo site_url("community/product/{$i->id}");?>" title="<?php echo $i->name;?>"><img src="<?php echo base_url("assets/images/products/small/{$i->name}.jpg");?>"></a></li>
							<?php endforeach;?>
						</ul>
					</article>
				</div>
			</section>
			<?php $this->load->view('components/footer');?>
		</div>
		<script type="text/javascript" src="<?php echo base_url('js/master.js');?>"></script>
		<script type="text/javascript" src="<?php echo base_url('js/index.js');?>"></script>
	</body>
</html>