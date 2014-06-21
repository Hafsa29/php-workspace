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
		<h2>Upload a Solution</h2>
		<div class="alert alert-info">
			<p>There should be 1 solution file.</p>
		</div>
		<form action="<?php $url = new Url; $url->site_url('solutions/upload');?>" method="post" novalidate>
			<div class="form-group">
				<label for="id-input">Problem Name: </label>
				<select name="id" id="id-input" class="form-control">
					<option value="" selected>Please select a Problem</option>
					<optgroup label="Adhoc">
						<?php foreach($adhoc as $i):?>
							<option value="<?php echo $i->id;?>"><?php echo $i->name;?></option>
						<?php endforeach;?>
					</optgroup>
					<optgroup label="Mathematics">
						<?php foreach($mathematics as $i):?>
							<option value="<?php echo $i->id;?>"><?php echo $i->name;?></option>
						<?php endforeach;?>
					</optgroup>
					<optgroup label="Data Structure">
						<?php foreach($data_structure as $i):?>
							<option value="<?php echo $i->id;?>"><?php echo $i->name;?></option>
						<?php endforeach;?>
					</optgroup>
					<optgroup label="Graph Theory">
						<?php foreach($graph_theory as $i):?>
							<option value="<?php echo $i->id;?>"><?php echo $i->name;?></option>
						<?php endforeach;?>
					</optgroup>
					<optgroup label="Dynamic Programming">
						<?php foreach($dynamic_programming as $i):?>
							<option value="<?php echo $i->id;?>"><?php echo $i->name;?></option>
						<?php endforeach;?>
					</optgroup>
					<optgroup label="Computational Geometry">
						<?php foreach($computational_geometry as $i):?>
							<option value="<?php echo $i->id;?>"><?php echo $i->name;?></option>
						<?php endforeach;?>
					</optgroup>
				</select>
			</div>
			<div class="form-group">
				<label for="solution-input">Solution: </label>
				<input type="file" id="solution-input" name="solution" class="form-control" placeholder="Solution...">
			</div>
			<input type="submit" class="btn btn-required" value="Submit">
		</form>
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