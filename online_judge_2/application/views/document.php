<!doctype html>
<html>
<head>
<meta charset="utf-8">

<title><?php echo "{$u_name} - {$d_given_name}"; ?></title>
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>stylesheets/reset.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>stylesheets/skeleton.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>stylesheets/layout.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>stylesheets/alertify.core.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>stylesheets/alertify.default.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>stylesheets/jquery.pageslide.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>stylesheets/basic.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>stylesheets/form.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>stylesheets/content.css">
</head>

<body>
   	<?php
   		         
        if($d_format == 'file')
        {
            $src = base_url().$folder.$d_name;
            if($folder == 'problems/')
            {
                $submit = '<li><a href='.site_url("online_judge/submit_solution/{$u_id}/{$d_id}").'>Submit</a></li>';
                $download = '<li><a href='.site_url("online_judge/download_problem/{$u_id}/{$d_id}").'>Download</a></li>';
                $site_url = site_url("online_judge/comment_problem/{$u_id}/{$d_id}");
                $document = 'Problem';
                $statistics = '<li><a href="#mod" class="second">Statistics</a></li>';
            }
            else
            {
                $submit = '';
                $download = '<li><a href='.site_url("online_judge/download_tutorial/{$u_id}/{$d_id}").'>Download</a></li>';
                $site_url = site_url("online_judge/comment_tutorial/{$u_id}/{$d_id}");
                $document = 'Tutorial';
                $statistics = '';
            }
        }
        else
        {
            $src = $d_name;
            $download = '';
          
            if($folder == 'problems/')
            {
                $site_url = site_url("online_judge/comment_problem/{$u_id}/{$d_id}");
                $document = 'Problem';
                $statistics = '<li><a href="#mod" class="second">Statistics</a></li>';
                  $submit = '<li><a href='.site_url("online_judge/submit_solution/{$u_id}/{$d_id}").'>Submit</a></li>';
            }
            else
            {
                $site_url = site_url("online_judge/comment_tutorial/{$u_id}/{$d_id}");
                $document = 'Tutorial';
                $statistics = '';
                $submit = '';
            }
        }  
    ?>
	<div class="container">
        <?php include 'header.php'; ?>
        


        <?php include 'menu.php'; ?>
        <section class="sixteen columns" id="document">
            <h2><?php echo "{$document} ID : {$d_id}";?></h2>
            <h2><?php echo "{$document} Name : {$d_given_name}";?></h2>
            <iframe src="<?php echo $src;?>">
                Your browser doesn't support iframe
            </iframe>
        </section>
        <nav>
            <ul>
                <?php echo $submit; ?>  
                <?php echo $download; ?>
                <?php echo $statistics; ?>
             </ul>
        </nav>
        <div id="mod">
       		<h2><?php echo "{$document} Name : {$d_given_name}";?></h2>
       		<table>
       			<tr>
       				<td>Tried : </td>
       				<td><?php echo $stat['tried']; ?></td>
       			</tr>
       			<tr>
       				<td>Solved : </td>
       				<td><?php echo $stat['solved']; ?></td>
       			</tr>
       		</table>
      		<p><a href="javascript:$.pageslide.close()">Close</a></p>
  		</div>
        <form method="post" action="<?php echo $site_url; ?>" id="upload_comment">
            <label for="comment">Comment : </label>
            <textarea name="comment" placeholder="Please upload your comments" id="comment"></textarea><br>
            <input type="submit" name="submit" value="Submit"><br>
        </form>
        
        <?php foreach($comments as $c): ;?>
        <section class="comments">
            <p><?php echo $c['comment']; ?></p>
            <p>- <a href="<?php echo site_url("online_judge/other_profile/{$u_id}/{$c['u_id']}"); ?>" class="links"><?php echo $c['u_name']?></a></p>
        </section>
        <?php endforeach; ?>
        <?php include 'footer.php'; ?>
    </div>
	<script type="text/javascript" src="<?php echo base_url();?>javascripts/jquery.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>javascripts/underscore.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>javascripts/backbone.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>javascripts/alertify.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>javascripts/jquery.pageslide.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>javascripts/document.js"></script>
</body>
</html>