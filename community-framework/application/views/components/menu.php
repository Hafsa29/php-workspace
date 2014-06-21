<nav class="row">
	<div class="navbar navbar-default">
		<div class="navbar-collapse collapse navbar-responsive-collapse">
			<ul class="nav navbar-nav navbar-left">
				<?php
					$session = new Session;
					$url = new Url;
					if($session->userdata('logged_in')){
						echo "<li><a href='{$url->site_url('sites/home')}'>Home</a></li>";
						echo "<li><a href='{$url->site_url('problems/viewall')}'>Problems</a></li>";
						echo "<li><a href='{$url->site_url('tutorials/viewall')}''>Tutorials</a></li>";
						$str = "<li class='dropdown'>";
						$str .= "<a href='#' class='dropdown-toggle' data-toggle='dropdown'>Dropdown<b class='caret'></b></a>";
						$str .= "<ul class='dropdown-menu'>";
						$str .= "<li><a href='{$url->site_url('problems/show_upload')}'>Upload Problem</a></li>";
						$str .= "<li><a href='{$url->site_url('tutorials/show_upload')}'>Upload Tutorial</a></li>";
						$str .= "<li><a href='{$url->site_url('solutions/show_upload')}'>Upload Solution</a></li>";
						$str .= "</ul>";
						$str .= "</li>";
						echo $str;
					}
				?>
				<?php
					$url = new Url;
					echo "<li><a href='{$url->site_url('sites/contact')}''>Contact</a></li>";
				?>
			</ul>
			<ul class="nav navbar-nav navbar-right">
				<?php
					if($session->userdata('logged_in')){
						$url = new Url;
						echo "<li><a href='{$url->site_url('users/logout')}'>Logout</a></li>";
					} else{
						echo "<li><a href='#' data-toggle='modal' data-target='#login-modal'>Login</a></li>";
						echo "<li><a href='#' data-toggle='modal' data-target='#register-modal'>Register</a></li>";
					}
				?>
			</ul>
		</div>
	</div>
</nav>