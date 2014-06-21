<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Online Shop</title>
		<link rel="stylesheet" type="text/css" href="<?php echo base_url('stylesheets/bootstrap.min.css');?>">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url('stylesheets/basic.css');?>">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url('stylesheets/jquery.bxslider.css');?>">
	</head>
	<body>
		<div class="container">
			<a data-toggle="modal" href="#myModal" class="btn btn-primary btn-lg">Launch demo modal</a>

  <!-- Modal -->
  <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">Modal title</h4>
        </div>
        <div class="modal-body">
          ...
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->
		</div>
		<script type="text/javascript">
			var base_url = '<?php echo base_url();?>';
		</script>
		<script type="text/javascript" src="<?php echo base_url('javascripts/jquery.js');?>"></script>
		<script type="text/javascript" src="<?php echo base_url('javascripts/bootstrap.min.js');?>"></script>
		<script type="text/javascript" src="<?php echo base_url('javascripts/jquery.bxslider.min.js');?>"></script>
		<script type="text/javascript" src="<?php echo base_url('javascripts/viewer/index.js');?>"></script>
		<script type="text/javascript" src="<?php echo base_url('javascripts/viewer/search.js');?>"></script>
	</body>
</html>