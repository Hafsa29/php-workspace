<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Online Shop</title>
		<link rel="stylesheet" type="text/css" href="<?php echo base_url('stylesheets/bootstrap.min.css');?>">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url('stylesheets/basic.css');?>">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url('stylesheets/user/basic.css');?>">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url('stylesheets/user/history.css');?>">
	</head>
	<body>
		<div class="container">
			<?php $this->load->view('user/header');?>
			<section class="row">
				<?php echo $this->load->view('user/menu');?>
				<div class="col-md-6">
					<table id="history">
						<thead>
							<tr>
								<td>Name</td>
								<td>Photo</td>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($history as $i):?>
							<tr>
								<td><a href="<?php echo site_url("user/product/{$id}/{$i['pro_id']}");?>"><?php echo $i['pro_name'];?></a></td>
								<td><a href="<?php echo site_url("user/product/{$id}/{$i['pro_id']}");?>"><img src="<?php echo base_url("images/{$i['photo']}");?>" alt="<?php echo $i['pro_name'];?>"></a></td>
							</tr>
							<?php endforeach;?>
						</tbody>
					</table>
				</div>
			</section>
			<?php $this->load->view('user/footer');?>
		</div>
		<script type="text/javascript">
			var base_url = '<?php echo base_url();?>';
			var id = '<?php echo $id;?>';
		</script>
		<script type="text/javascript" src="<?php echo base_url('javascripts/jquery.js');?>"></script>
		<script type="text/javascript" src="<?php echo base_url('javascripts/user/search.js');?>"></script>
	</body>
</html>