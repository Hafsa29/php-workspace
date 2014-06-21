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
			<h2>Tutorials</h2>
			<table class="table table-bordered table-hover table-striped">
				<thead>
					<tr>
						<th>ID</th>
						<th>Name</th>
						<th>Type</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach($tutorials as $i):?>
						<tr>
							<td><?php echo $i->id;?></td>
							<td><a href="<?php $url = new Url; echo $url->site_url("tutorials/view/{$i->id}");?>"><?php echo $i->name;?></a></td>
							<td><?php echo $i->type;?></td>
						</tr>
					<?php endforeach;?>
				</tbody>
			</table>
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