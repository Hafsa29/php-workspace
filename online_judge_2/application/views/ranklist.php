<!doctype html>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>stylesheets/reset.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>stylesheets/skeleton.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>stylesheets/layout.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>stylesheets/alertify.core.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>stylesheets/alertify.default.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>stylesheets/basic.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>stylesheets/content.css">
<script type="text/javascript" src="<?php echo base_url();?>javascripts/jquery.js"></script>\
<script type="text/javascript" src="<?php echo base_url();?>javascripts/underscore.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>javascripts/backbone.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>javascripts/alertify.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>javascripts/ranklist.js"></script>
<title><?php echo $u_name; ?> - Ranklist</title>
</head>

<body>
	<div class="container">
    	<?php include 'header.php'; ?>
        
        <?php include 'menu.php'; ?>
        <section class="sixteen columns" id="ranklist"> 
      		<h2>Ranklist</h2>
            <ol>
            	<?php foreach($first_rank as $v): ;?>
            	<li><a href="<?php echo site_url("online_judge/other_profile/{$u_id}/{$v['u_id']}"); ?>"  class="links"><?php echo $v['u_name']; ?></a></li>
                <?php endforeach; ?>
                <?php foreach($second_rank as $v): ;?>
            	<li><a href="<?php echo site_url("online_judge/other_profile/{$u_id}/{$v['u_id']}"); ?>"  class="links"><?php echo $v['u_name']; ?></a></li>
                <?php endforeach; ?>
            </ol>
        </section>
        
        <?php include 'footer.php'; ?>
    </div>
</body>
</html>