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
		<h2>Upload a Problem</h2>
		<div class="alert alert-info">
			<p>There should be 1 problem file, 1 input file, 1 output file.</p>
			<p>Problem file should be a pdf file.</p>
			<p>Input and output file should be text file.</p>
		</div>
		<form action="<?php $url = new Url; $url->site_url('problems/upload');?>" method="post" novalidate>
			<div class="form-group">
				<label for="name-input">Name: </label>
				<input type="text" id="name-input" name="name" class="form-control" placeholder="Name...">
			</div>
			<div class="form-group">
				<label for="type-input">Type: </label>
				<select name="type" id="type-input" class="form-control">
					<option value="">Please select a type</option>
					<option value="adhoc">Adhoc</option>
					<option value="mathematics">Mathematics</option>
					<option value="data_structure">Data Structure</option>
					<option value="graph_theory">Graph Theory</option>
					<option value="dynamic_programming">Dynamic Programming</option>
					<option value="computational_geometry">Computational Geometry</option>
				</select>
			</div>
			<div class="form-group">
				<label for="problem-input">Problem: </label>
				<input type="file" id="problem-input" name="problem" class="form-control" placeholder="Problem...">
			</div>
			<div class="form-group">
				<label for="input-input">Input: </label>
				<input type="file" id="input-input" name="input" class="form-control" placeholder="Input...">
			</div>
			<div class="form-group">
				<label for="output-input">Output: </label>
				<input type="file" id="output-input" name="output" class="form-control" placeholder="Output...">
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