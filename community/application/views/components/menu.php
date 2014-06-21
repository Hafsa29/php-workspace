<nav class="row">
	<div class="navbar navbar-default">
		<ul class="nav navbar-nav">
			<?php if($this->session->userdata('logged_in')):?>
				<?php if($this->session->userdata('role') == 2):?>
					<li><a href="<?php echo site_url('community/admin_panel');?>" title="admin panel">Admin Panel</a></li>
				<?php else:?>
					<li><a href="<?php echo site_url("community/user_profile/{$this->session->userdata('id')}");?>" title="user profile"><?php echo $this->session->userdata('name');?></a></li>
				<?php endif;?>
				<li><a href="<?php echo site_url('community/logout_user');?>" title="logout user">Logout</a></li>
			<?php else:?>
				<li><a href="#" title="login" data-toggle="modal" data-target="#login-form-modal">Login</a></li>
				<li><a href="#" title="register" data-toggle="modal" data-target="#register-form-modal">Register</a></li>
			<?php endif;?>
		</ul>
	</div>
</nav>