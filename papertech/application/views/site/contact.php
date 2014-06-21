<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>stylesheets/site/contact.css">
<div class="row">
	<div class="large-4 columns">
		<div class="row">
			<div class="contact_link large-12 columns">
				<a data-reveal-id="addressModal" href="#">Address</a>
			</div>
			<div class="contact_link large-12 columns">
				<a data-reveal-id="phoneModal" href="#">Phone</a>
			</div>
		</div>
	</div>
	<div class="large-8 columns">
		<div id="map_canvas" style="height: 200px"></div>
	</div>
</div>
<div class="row">
	<div class="contact_link large-4 columns">
		<a data-reveal-id="faxModal" href="#">Fax</a>
	</div>
	<div class="contact_link large-4 columns">
		<a data-reveal-id="mailModal" href="#">Mail</a>
	</div>
	<div class="contact_link large-4 columns">
		<a data-reveal-id="chatModal" href="#">Chat</a>
	</div>
</div>
<div id="addressModal" class="reveal-modal">
  	<h2>Visit Us</h2>
  	<p>Address: 22/C Azimpur Road, Azimpur, Dhaka - 1205</p>
  	<a class="close-reveal-modal">&#215;</a>
</div>
<div id="phoneModal" class="reveal-modal">
  	<h2>Give Us a Call</h2>
  	<p>Phone: +01711-165-191</p>
  	<a class="close-reveal-modal">&#215;</a>
</div>
<div id="faxModal" class="reveal-modal">
  	<h2>Send Us a Fax</h2>
  	<p>Fax: +880-2-8816313</p>
  	<a class="close-reveal-modal">&#215;</a>
</div>
<div id="mailModal" class="reveal-modal">
  	<h2>Send Us an E-mail</h2>
  	<form id="contact_form" method="post" action="<?php echo site_url("papertech/email_contact");?>" autocomplete="on" novalidate>
  		<label for="name">Name :</label>
  		<input id="name" class="validate[required]" name="name" type="text" placeholder="Name..." value="" required><br>
  		<label for="email">Email :</label>
  		<input id="email" class="validate[required, custom[email]]" name="email" type="email" placeholder="Email..." value="" required><br>
  		<label for="message">Message :</label>
  		<textarea id="message" class="validate[required]" name="message" placeholder="Message..." value="">
  		</textarea><br>
  		<input class="button blue" name="submit" type="submit" value="Submit">
  	</form>
  	<a class="close-reveal-modal">&#215;</a>
</div>
<div id="chatModal" class="reveal-modal">
  	<h2><a href="#" target="_blank">Chat with us</a></h2>
  	<a class="close-reveal-modal">&#215;</a>
</div>
<script type="text/javascript" src="<?php echo base_url();?>javascripts/site/contact.js"></script>