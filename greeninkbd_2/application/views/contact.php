<link type="text/css" rel="stylesheet" href="<?php echo base_url();?>stylesheets/contact.css">
<div>
	<div class="row">
		<div class="large-6 columns">
			<p id="result"></p>
			<h2 id="email_header">Send us an email</h2>
			<form id="contact_form" action="#" method="post" novalidate>
				<label for="name">Name : </label>
				<input id="name" name="name" class="validate[required]" type="text" placeholder="Name..."><br>
				<label for="email">Email : </label>
				<input id="email" name="email" class="validate[required,custom[email]]" type="email" placeholder="Email..."><br>
				<label for="message">Message : </label>
				<textarea id="message" name="message" class="validate[required]" placeholder="Message..."></textarea><br>
				<input type="submit" name="submit" value="Submit" class="button"><br>
			</form>
		</div>
		<div id="address" class="large-6 columns">
			<p>Niketan Housing Project</p>
			<p>Gulshan, Dhaka</p>
		</div>
	</div>
</div>
<div>
	<div class="row">
		<div class="large-12 columns">
			<div id="map_canvas" style="height: 400px"></div>
		</div>
	</div>
</div>
<script type="text/javascript" src="<?php echo base_url();?>javascripts/contact.js"></script>