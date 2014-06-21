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
					<h3><?php echo $title;?></h3>
					<ul id="category">
						<?php foreach($products as $k => $i):?>
							<li><a href="<?php echo site_url("community/product/{$i->id}");?>" title="<?php echo $i->name;?>"><img src="<?php echo base_url("assets/images/products/large/{$i->name}.jpg");?>"></a></li>
						<?php endforeach;?>
					</ul>
				</div>
			</section>
			<?php $this->load->view('components/footer');?>
		</div>
		<script type="text/javascript" src="<?php echo base_url('js/master.js');?>"></script>
		<script type="text/javascript" src="<?php echo base_url('js/category.js');?>"></script>
	</body>
</html>