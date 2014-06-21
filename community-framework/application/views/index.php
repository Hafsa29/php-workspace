<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="IE=7">
	<title>Welcome to Infinite Jest Online Judge</title>
	<?php
		$url = new Url;
		$css_url = $url->base_url("css/master.css");
		echo "<link type='text/css' rel='stylesheet' href='{$css_url}'>";
	?>
</head>
<body>
	<div class="container">
		<?php
			require_once('components/header.php');
			require_once('components/menu.php');
			require_once('components/messages.php');
		?>
		<section class="row">
			<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
  				<ol class="carousel-indicators">
    				<li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
    				<li data-target="#carousel-example-generic" data-slide-to="1"></li>
    				<li data-target="#carousel-example-generic" data-slide-to="2"></li>
  				</ol>
  				<div class="carousel-inner">
    				<div class="item active">
      					<img src="http://placehold.it/1200x500" alt="placeholder">
      					<div class="carousel-caption">baal</div>
    				</div>
    				<div class="item">
      					<img src="http://placehold.it/1200x500" alt="placeholder">
      					<div class="carousel-caption">baal</div>
    				</div>
    				<div class="item">
      					<img src="http://placehold.it/1200x500" alt="placeholder">
      					<div class="carousel-caption">baal</div>
    				</div>
  				</div>
  				<a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
    				<span class="glyphicon glyphicon-chevron-left"></span>
  				</a>
  				<a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
    				<span class="glyphicon glyphicon-chevron-right"></span>
  				</a>
			</div>
		</section>
		<?php
			require_once('components/footer.php');
		?>
	</div>
	<?php
		$js_url_1 = $url->base_url("js/jquery.min.js");
		$js_url_2 = $url->base_url("js/bootstrap.min.js");
		echo "<script type='text/javascript' src='{$js_url_1}'></script>";
		echo "<script type='text/javascript' src='{$js_url_2}'></script>";
	?>
</body>
</html>