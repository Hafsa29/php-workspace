<link type="text/css" rel="stylesheet" href="<?php echo base_url();?>stylesheets/site/order.css">
<div class="row">
	<div class="large-6 large-centered columns">
		<h2>Order Now</h2>
		<form id="order_form" method="post" action="<?php echo site_url('papertech/email_order');?>" autocomplete="on" novalidate>
			<label for="name">Name :</label>
			<input id="name" class="validate[required]" name="name" type="text" placeholder="Name..." required><br>
			<label for="email">Email :</label>
			<input id="email" class="validate[required,custom[email]]" name="email" type="email" placeholder="Email..." required><br>
			<label for="product">Product :</label>
			<select id="product" name="product">
				<optgroup label="Category 1">
					<option value="product_1">Product 1</option>
					<option value="product_2">Product 2</option>
					<option value="product_3">Product 3</option>
					<option value="product_4">Product 4</option>
				</optgroup>
				<optgroup label="Category 2">
					<option value="product_1">Product 1</option>
					<option value="product_2">Product 2</option>
					<option value="product_3">Product 3</option>
					<option value="product_4">Product 4</option>
				</optgroup>
				<optgroup label="Category 3">
					<option value="product_1">Product 1</option>
					<option value="product_2">Product 2</option>
					<option value="product_3">Product 3</option>
					<option value="product_4">Product 4</option>
				</optgroup>
			</select><br>
			<label for="phone">Phone :</label>
			<input id="phone" class="validate[required,custom[phone]]" name="phone" type="tel" placeholder="Phone..." required><br>
			<label for="address">Address :</label>
			<input id="address" class="validate[required]" name="address" type="text" placeholder="Address..." required><br>
			<input class="button blue" name="submit" type="submit" value="Submit">
		</form>
	</div>
</div>
<script type="text/javascript" src="<?php echo base_url();?>javascripts/site/order.js"></script>