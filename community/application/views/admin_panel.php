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
				<div class="col-md-8">
					<div class="row">
						<h3>Register Product</h3>
						<form id="register-form" method="post" action="<?php echo site_url('community/register_product');?>" enctype="multipart/form-data" novalidate>
							<div class="form-group">
								<label for="register-name">Name : </label>
								<input id="register-name" name="name" class="form-control" type="text" placeholder="Name..." required>
							</div>
							<div class="form-group">
								<label for="register-category">Category : </label>
								<select id="register-category" name="category" class="form-control" required>
									<option value="shirts">Shirt</option>
									<option value="pants">Pant</option>
									<option value="t-shirts">T-Shirt</option>
									<option value="shorts">Short</option>
									<option value="fatuas">Fatua</option>
									<option value="punjabis">Punjabi</option>
								</select>
							</div>
							<div class="form-group">
								<label for="register-stock">Stock : </label>
								<input id="register-stock" name="stock" class="form-control" type="number" placeholder="Stock..." required>
							</div>
							<div class="form-group">
								<label for="register-price">Price : </label>
								<input id="register-price" name="price" class="form-control" type="number" placeholder="Price..." required>
							</div>
							<div class="form-group">
								<label for="register-image">Image : </label>
								<input id="register-image" name="userfile" class="form-control" type="file" required>
							</div>
							<input name="submit" type="submit" value="Submit">							
						</form>
					</div>
				</div>
			</section>
			<?php $this->load->view('components/footer');?>
		</div>
		<script type="text/javascript" src="<?php echo base_url('js/master.js');?>"></script>
	</body>
</html>