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
<script type="text/javascript" src="<?php echo base_url();?>javascripts/jquery.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>javascripts/underscore.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>javascripts/backbone.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>javascripts/alertify.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>javascripts/documents.js"></script>
<title><?php echo $u_name; ?> - Problems</title>
</head>

<body>
	<div class="container">
    	<?php include 'header.php'; ?>
        
        <?php include 'menu.php'; ?>
        <section class="sixteen columns" id="documents"> 
      		<h2>Adhoc</h2>
            <ul>
            	<?php foreach($adhoc as $v): ;?>
            	<li><a href="<?php echo site_url("online_judge/{$function}/{$u_id}/{$v['d_id']}"); ?>" class="links"><?php echo $v['d_given_name']; ?></a></li>
                <?php endforeach; ?>
            </ul>
            <h2>Mathematics</h2>
            <ul>
            	<?php foreach($mathematics as $v): ;?>
            	<li><a href="<?php echo site_url("online_judge/{$function}/{$u_id}/{$v['d_id']}"); ?>" class="links"><?php echo $v['d_given_name']; ?></a></li>
                <?php endforeach; ?>
            </ul>
            <h2>Graph Theory</h2>
            <ul>
            	<?php foreach($graph_theory as $v): ;?>
            	<li><a href="<?php echo site_url("online_judge/{$function}/{$u_id}/{$v['d_id']}"); ?>" class="links"><?php echo $v['d_given_name']; ?></a></li>
                <?php endforeach; ?>
            </ul>
            <h2>Data Structure</h2>
            <ul>
            	<?php foreach($data_structure as $v): ;?>
            	<li><a href="<?php echo site_url("online_judge/{$function}/{$u_id}/{$v['d_id']}"); ?>" class="links"><?php echo $v['d_given_name']; ?></a></li>
                <?php endforeach; ?>
            </ul>
            <h2>Dynamic Programming</h2>
            <ul>
            	<?php foreach($dynamic_programming as $v): ;?>
            	<li><a href="<?php echo site_url("online_judge/{$function}/{$u_id}/{$v['d_id']}"); ?>" class="links"><?php echo $v['d_given_name']; ?></a></li>
                <?php endforeach; ?>
            </ul>
            <h2>Computational Geometry</h2>
            <ul>
            	<?php foreach($computational_geometry as $v): ;?>
            	<li><a href="<?php echo site_url("online_judge/{$function}/{$u_id}/{$v['d_id']}"); ?>" class="links"><?php echo $v['d_given_name']; ?></a></li>
                <?php endforeach; ?>
            </ul>
        </section>
        
        <?php include 'footer.php'; ?>
    </div>
</body>
</html>