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
<script type="text/javascript" src="<?php echo base_url();?>javascripts/home.js"></script>
<title><?php echo $u_name; ?> - Home</title>
</head>

<body>
	<div class="container">
    	<?php include 'header.php'; ?>
        
        <?php include 'menu.php'; ?>
        <section class="sixteen columns" id="home"> 
      		<h2>Welcome to Infinite Jest Online Judge, <?php echo $u_name;?></h2>
            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum 
            sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, 
            pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, 
            vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede 
            mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. 
            Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, 
            feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam 
            ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus 
            eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum. Nam quam nunc, blandit 
            vel, luctus pulvinar, hendrerit id, lorem. Maecenas nec odio et ante tincidunt tempus. Donec vitae sapien ut libero 
            venenatis faucibus. Nullam quis ante. Etiam sit amet orci eget eros faucibus tincidunt. Duis leo. Sed fringilla 
            mauris sit amet nibh. Donec sodales sagittis magna. Sed consequat, leo eget bibendum sodales, augue velit cursus 
            nunc.</p>
        </section>
        <section id="dashboard" class="sixteen columns">
        	<h2>Dash Board</h2>
            
            <h3>Problems you have recently uploaded</h3>
            <ul>
				<?php foreach($problems as $p): ;?>
               	<li><?php echo $p['name']; ?>  - <a href="<?php echo site_url("online_judge/unset_problem/{$u_id}/{$p['id']}"); ?>" class="links alert">Delete</a></li>
				<?php endforeach; ?>
			</ul>
			<h3>Tutorials you have recently uploaded</h3>
			<ul>
               <?php foreach($tutorials as $t): ;?>
               	<li><?php echo $t['name']; ?>  - <a href="<?php echo site_url("online_judge/unset_tutorial/{$u_id}/{$t['id']}"); ?>" class="links alert">Delete</a></li>
				<?php endforeach; ?> 
			</ul>
        </section>
        <?php include 'footer.php'; ?>
    </div>
</body>
</html>