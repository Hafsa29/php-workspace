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
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>stylesheets/basic.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>stylesheets/form.css">
<script type="text/javascript" src="<?php echo base_url();?>javascripts/jquery.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>javascripts/underscore.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>javascripts/backbone.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>javascripts/jquery.flexslider-min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>javascripts/jquery.validationEngine.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>javascripts/jquery.validationEngine-en.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>javascripts/s3Capcha.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>javascripts/index.js"></script>
<title>Welcome to Infinte Jest Online Judge</title>
</head>

<body>
	<div class="container">
    	<?php include 'header.php'; ?>
        
     	<section class="ten columns slider">
        	<div class="flexslider">
         		<ul class="slides">
            		<li>
  	    	   			<img src="<?php echo base_url();?>images/pic-1.jpg">
  	    			</li>
  	    			<li>
  	   	    			<img src="<?php echo base_url();?>images/pic-2.jpg">
  	   				</li>
  	   				<li>
  	   	    			<img src="<?php echo base_url();?>images/pic-3.jpg">
      				</li>
                 	<li>
  	    	    		<img src="<?php echo base_url();?>images/pic-4.jpg">
  	    			</li>
  	    			<li>
  	   	    			<img src="<?php echo base_url();?>images/pic-5.jpg">
  	   				</li>
  	   				<li>
  	   	    			<img src="<?php echo base_url();?>images/pic-6.jpg">
      				</li>
                 	<li>
  	    	    		<img src="<?php echo base_url();?>images/pic-7.jpg">
  	    			</li>
  	    			<li>
  	    	    		<img src="<?php echo base_url();?>images/pic-8.jpg">
  	    			</li>
  	    			<li>
  	    	    		<img src="<?php echo base_url();?>images/pic-9.jpg">
  	    			</li>
                 	<li>
  	    	    		<img src="<?php echo base_url();?>images/pic-10.jpg">
  	    			</li>
  	    			<li>
  	   	    			<img src="<?php echo base_url();?>images/pic-11.jpg">
  	   				</li>
         		</ul>
        	</div>
    	</section>
            
      	<section class="six columns">
            <?php echo validation_errors(); ?>
           	<form id="login" method="post" action="<?php echo base_url();?>index.php/online_judge/login" novalidate>
               	<label for="login_email">Email : </label>
   		          	<input type="email" id="login_email" class="validate[required,custom[email]]" name="login_email" value="<?php echo set_value('login_email'); ?>" placeholder="Email..." required><br>
            	<label for="login_password">Password : </label>
         		    <input type="password" id="login_password" class="validate[required,minSize[5]]" name="login_password" value="<?php echo set_value('login_password'); ?>" placeholder="Password..." required><br>
                    <input type="submit" name="submit" value="Login" id="check">
          	</form>
          	<form id="sign_up" method="post" action="<?php echo base_url();?>index.php/online_judge/sign_up" novalidate>
                <label for="first_name">First Name : </label>
             	    <input type="text" id="first_name" class="validate[required]" name="first_name" value="<?php echo set_value('first_name'); ?>" placeholder="First Name..." required><br>
              	<label for="last_name">Last Name : </label>
                    <input type="text" id="last_name" class="validate[required]" name="last_name" value="<?php echo set_value('last_name'); ?>" placeholder="Last Name..." required><br>
               	<label for="sign_up_email">Email : </label>
                    <input type="email" id="sign_up_email" class="validate[required,custom[email]]" name="sign_up_email" value="<?php echo set_value('sign_up_email'); ?>" placeholder="Email..." required><br>
              	<label for="sign_up_password">Password : </label>
                    <input type="password" id="sign_up_password" class="validate[required,minSize[5]]" name="sign_up_password" value="<?php echo set_value('sign_up_password'); ?>" placeholder="Password..." required><br>
               	<label for="sign_up_conf_password">Confirm Password : </label>
                    <input type="password" id="sign_up_conf_password" class="validate[required,minSize[5],equals[sign_up_password]]" name="conf_password" value="<?php echo set_value('conf_password'); ?>" placeholder="Confirm Password..." required><br>
                    <div id="capcha"> <?php include("s3Capcha.php"); ?> </div><br /><br />
                    <input type="submit" name="submit" value="Submit">
          	</form>
      	</section>
        
        <?php include 'footer.php'; ?>
    </div>
</body>
</html>