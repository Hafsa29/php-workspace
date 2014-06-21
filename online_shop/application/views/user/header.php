<header class="row">
	<h1 class="col-md-6">Online Shop</h1>
	<div class="col-md-6">
		<div class="row">
			<div id="user_links" class="col-md-12">
				<a href="<?php echo site_url('user/logout');?>">Logout</a>
				<a href="<?php echo site_url("user/history/{$id}");?>">History</a>
				<a href="<?php echo site_url("user/shopping_cart/{$id}");?>">Shopping Cart</a>
			</div>
			<form id="search" class="col-md-12" action="<?php echo site_url("user/show_search/{$id}");?>" method="post" novalidate>
				<input id="search_field" name="search" type="text" placeholder="Search the site" required>
				<input name="submit" type="submit" value="Search">
			</form>
			<div id="search_div" class="col-md-12">
				<ul id="search_list">
			  	</ul>
			</div>
		</div>
	</div>
</header>