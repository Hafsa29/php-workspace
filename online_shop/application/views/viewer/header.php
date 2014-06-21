<header class="row">
	<h1 class="col-md-6">Online Shop</h1>
	<div class="col-md-6">
		<a href="<?php echo site_url('viewer/login_register');?>">Login/Register</a>
		<form id="search" action="<?php echo site_url("viewer/show_search");?>" method="post" novalidate>
			<input id="search_field" name="search" type="text" placeholder="Search the site" required>
			<input name="submit" type="submit" value="Search">
		</form>
		<div id="search_div">
			<ul id="search_list">
			</ul>
		</div>
	</div>
</header>