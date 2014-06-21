<nav>
	<div class="row">
		<div class="large-12 columns">
			<ul>
				<li><a class="button blue" href="<?php echo site_url("admin/home/{$u_id}");?>">Home</a></li>
				<li><a class="button blue" href="<?php echo site_url("admin/profile/{$u_id}");?>">Profile</a></li>
				<li><a class="button blue" href="<?php echo site_url("admin/events/{$u_id}");?>">Events</a></li>
				<li><a class="button redd" href="<?php echo site_url("admin/logout/{$u_id}");?>">Logout</a></li>
			</ul>	
		</div>
	</div>
</nav>