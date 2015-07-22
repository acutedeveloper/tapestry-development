			<!-- SOCIAL MEDIA -->
			<section class="silver social-media-footer">
				<div class="container">
					<div class="column">
						<?php tap_facebook_feed(); ?>
					</div>
	
					<div class="column">
						<?php tap_twitter_feed(); ?>
					</div>
	
					<div class="column">
						<h4 class="flickr">Tapestry on Flickr</h4>
						<div class="flickr">
						    <ul>
							<?php echo parseFlickrFeed("129113666@N05",8); ?>
						    </ul>
						</div>
					</div>
				</div>
			</section>


			<div class="push"></div>			
		</div><!-- END OF WRAP -->
		
		<footer class="container">
			<div class="logo-col">
				<a href="<?php echo get_option('home'); ?>"><img src="<?php bloginfo('stylesheet_directory'); ?>/library/img/logo-tapestry.png" alt="logo-tapestry" width="169" height="92" /></a>
			</div>
			<div class="details-col">
				<p><strong>Registered office</strong></p>
				<p>Age Concern Havering,1st Floor Scottish Mutual House,<br/>
				27-29 North Street, Hornchurch, RM11 1RS<br/>
				Registered Charity number: 1079969<br/>
				Company number: 3942243</p>
			</div>
			<div class="contact-col">
				<p><strong>Get in Touch</strong></p>
				<p><strong>T:</strong> 01708 796600 <br/>
				<strong>E:</strong> <a href="mailto:hello@tapestry-uk.org">hello@tapestry-uk.org</a></p>
			</div>
			<div class="qlinks-col">
				<p><strong>Quick Links</strong></p>
				<?php wp_nav_menu( array( 'theme_location'  => 'quick_links', ) ); ?>
			</div>
			<nav class="footer-nav">
				<?php wp_nav_menu( array( 'theme_location'  => 'footer_menu', ) ); ?>
			</nav>
		</footer>

        <?php wp_footer();?>

        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.10.2.min.js"><\/script>')</script>
        <script src="<?php bloginfo('stylesheet_directory'); ?>/library/js/plugins.js"></script>
		<script type="text/javascript" src="<?php bloginfo('stylesheet_directory'); ?>/library/js/retina.min.js"></script>
		<script type="text/javascript" src="<?php bloginfo('stylesheet_directory'); ?>/library/js/bxslider/jquery.bxslider.min.js"></script>
        <script src="<?php bloginfo('stylesheet_directory'); ?>/library/js/main.js"></script>

        <!-- Google Analytics: change UA-59843083-1 to be your site's ID. -->
        <script>
            (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
            function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
            e=o.createElement(i);r=o.getElementsByTagName(i)[0];
            e.src='//www.google-analytics.com/analytics.js';
            r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
            ga('create','UA-59843083-1');ga('send','pageview');
        </script>
    </body>
</html>
