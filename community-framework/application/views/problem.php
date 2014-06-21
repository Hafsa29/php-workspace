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
			<h2>Problem Name: <?php echo $problem->name;?></h2>
			<h3>Problem Type: <?php echo $problem->type;?></h3>
			<iframe src="<?php $url = new Url; echo $url->base_url("problems/problem_files/{$problem->id}.txt");?>" frameborder="2"></iframe>
		</section>
		<?php
			require_once('components/footer.php');
		?>
	</div>
</body>
</html>