<!doctype html>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>stylesheets/reset.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>stylesheets/skeleton.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>stylesheets/layout.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>stylesheets/flexslider.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>stylesheets/customMessages.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>stylesheets/template.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>stylesheets/validationEngine.jquery.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>stylesheets/jquery.gridster.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>stylesheets/alertify.core.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>stylesheets/alertify.default.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>stylesheets/basic.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>stylesheets/form.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>stylesheets/content.css">
<script type="text/javascript" src="<?php echo base_url();?>javascripts/jquery.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>javascripts/underscore.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>javascripts/backbone.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>javascripts/jquery.flexslider-min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>javascripts/jquery.validationEngine.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>javascripts/jquery.validationEngine-en.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>javascripts/alertify.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>javascripts/profile.js"></script>
<title><?php echo $user['u_name']; ?> - Profile</title>
</head>

<body>
	<div class="container">
    	<?php include 'header.php'; ?>
        
		<?php include 'menu.php'; ?>
        <section class="profile two-thirds column slider">
           	<div class="flexslider">
       			<ul class="slides">
                    <?php foreach($pictures as $p): ?>
            		<li>
  	    	   			<img src="<?php echo base_url(); ?>pictures/<?php echo $p['pic_name']; ?>" height="250px" width="500px">
  	    			</li>
  	    			<?php endforeach; ?>
       			</ul>
       		</div>
     	</section>
            
      	<section class="profile one-third column gridster">
            <table>
               	<tr>
                    <td colspan="2" id="profile_title">Profile</td>
                </tr>
                    
          	    <tr>
                   	<td>Name : </td>
      	            <td><?php echo $user['u_name']; ?></td>
  	             </tr>
                 <tr>
                   	<td>Email : </td>
          	        <td><?php echo $user['u_email']; ?></td>
       	        </tr>
   	            <tr>
                  	<td>Solved : </td>
                   	<td><?php echo $solved_num; ?></td>
               	</tr>
          	    <tr>
                    <td>Tried : </td>
               	    <td><?php echo $tried_num; ?></td>
         	    </tr>
     	    </table>
           	<form method="post" action="<?php echo site_url('online_judge/upload_picture/'.$u_id); ?>" enctype="multipart/form-data" id="upload_picures">
               	<p><?php echo $error; ?></p>
               	<p>Upload Your Pictures</p>
     	          <input id="userfile" name="userfile" type="file" class="validate[required,maxSize[2000000000]]">
                  <input type="submit" value="Submit">
           	</form>
    	</section>
            
     	<section class="profile links sixteen columns">
          	<h2>Problems Solved</h2>
  	        <hr>
        	<ul>
                <?php foreach($solved as $s):?>
               	<li><a href="<?php echo site_url("online_judge/problem/{$u_id}/{$s['p_id']}");?>" class="links"><?php echo $s['p_given_name']; ?></a></li>
          		<?php endforeach; ?>
     	    </ul>
      	</section>
            
      	<section class="profile links sixteen columns">
            <h2>Problems Tried</h2>
       	    <hr>
           	<ul>
               	<?php foreach($tried as $t):?>
               	<li><a href="<?php echo site_url("online_judge/problem/{$u_id}/{$t['p_id']}");?>" class="links"><?php echo $t['p_given_name']; ?></a></li>
       			<?php endforeach; ?>
  	        </ul>
      	</section>
        
        <section class="profile sixteen columns">
            <h2>Problems Submitted</h2>
       	    <hr>
           	<ul>
               	<?php foreach($problems as $p):?>
               	<li><a href="<?php echo site_url("online_judge/problem/{$u_id}/{$p['p_id']}");?>" class="links"><?php echo $p['p_given_name']; ?></a></li>
       			<?php endforeach; ?>
  	        </ul>
      	</section>
        
        <section class="profile sixteen columns">
            <h2>Tutorials Submitted</h2>
       	    <hr>
           	<ul>
               	<?php foreach($tutorials as $t):?>
               	<li><a href="<?php echo site_url("online_judge/tutorial/{$u_id}/{$t['t_id']}");?>" class="links"><?php echo $t['t_given_name']; ?></a></li>
       			<?php endforeach; ?>
  	        </ul>
      	</section>
        <?php include 'footer.php'; ?>
    </div>


</body>
</html>