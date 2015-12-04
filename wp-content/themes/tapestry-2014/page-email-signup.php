<?php

/*
Template Name: Email Signup
*/

?>
		<?php include("header.php"); ?>
		
		<!-- BREADCRUMBS -->
		<?php the_breadcrumb(); ?>
		
		<div class="container">
			<!-- LEFT COLUMN -->
			<aside id="leftcolumn">

 			</aside>
			
			<!-- RIGHT COLUMN -->
			<aside id="rightcolumn">
				
				<?php if ( have_posts() ): while ( have_posts() ) : the_post(); ?>
					<h1><?php the_title(); ?></h1>
					
				  	<?php the_content(); ?>
		
				<?php endwhile; else: ?>
				<?php endif; ?>
				
				<!-- Begin MailChimp Signup Form -->
				<link href="//cdn-images.mailchimp.com/embedcode/classic-081711.css" rel="stylesheet" type="text/css">
				<style type="text/css">
					#mc_embed_signup{background:#fff; clear:left; font:14px Helvetica,Arial,sans-serif; }
					#mc_embed_signup form{padding: 0px;}
					/* Add your own MailChimp form style overrides in your site stylesheet or in this style block.
					   We recommend moving this block and the preceding CSS link to the HEAD of your HTML file. */
				</style>
				<div id="mc_embed_signup">
				<form action="//tapestry-uk.us9.list-manage.com/subscribe/post?u=cc5827a8da1401a34356936ad&amp;id=479006e823" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
				    <div id="mc_embed_signup_scroll">
					
				<div class="indicates-required"><span class="asterisk">*</span> indicates required</div>
				<div class="mc-field-group">
					<label for="mce-EMAIL">Email Address  <span class="asterisk">*</span>
				</label>
					<input type="email" value="" name="EMAIL" class="required email" id="mce-EMAIL">
				</div>
				<div class="mc-field-group">
					<label for="mce-FNAME">First Name </label>
					<input type="text" value="" name="FNAME" class="" id="mce-FNAME">
				</div>
				<div class="mc-field-group">
					<label for="mce-LNAME">Last Name </label>
					<input type="text" value="" name="LNAME" class="" id="mce-LNAME">
				</div>
				<p><a href="http://us9.campaign-archive1.com/home/?u=cc5827a8da1401a34356936ad&id=479006e823" title="View previous campaigns">View previous campaigns.</a></p>
					<div id="mce-responses" class="clear">
						<div class="response" id="mce-error-response" style="display:none"></div>
						<div class="response" id="mce-success-response" style="display:none"></div>
					</div>    <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
				    <div style="position: absolute; left: -5000px;"><input type="text" name="b_cc5827a8da1401a34356936ad_479006e823" tabindex="-1" value=""></div>
				    <div class="clear"><input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="button"></div>
				    </div>
				</form>
				</div>
				<script type='text/javascript' src='//s3.amazonaws.com/downloads.mailchimp.com/js/mc-validate.js'></script><script type='text/javascript'>(function($) {window.fnames = new Array(); window.ftypes = new Array();fnames[0]='EMAIL';ftypes[0]='email';fnames[1]='FNAME';ftypes[1]='text';fnames[2]='LNAME';ftypes[2]='text';}(jQuery));var $mcj = jQuery.noConflict(true);</script>
				<!--End mc_embed_signup-->
				
			</aside>
		</div>		

		<?php include("footer.php"); ?>