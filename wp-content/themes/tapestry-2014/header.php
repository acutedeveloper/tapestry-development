<!DOCTYPE html>
<!--[if IE 9 ]><html lang="en" class="ie ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html <?php language_attributes(); ?>> <!--<![endif]-->
		<head>
		<title><?php
			global $page, $paged;
			wp_title( '|', true, 'right' );
				bloginfo( 'name' );
				$site_description = get_bloginfo( 'description', 'display' );
				if ( $site_description && ( is_home() || is_front_page() ) )
					echo " | $site_description";
				if ( $paged >= 2 || $page >= 2 )
					echo ' | ' . sprintf( __( 'Page %s' ), max( $paged, $page ) );
			?>
		</title>
		<meta name="description" content="<?php if ( is_single() ) {
			single_post_title('', true);
			} else {
			bloginfo('name'); echo " - "; bloginfo('description');
			}
		?>" />
		<meta charset="<?php bloginfo( 'charset' ); ?>" />
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->

        <link rel="stylesheet" href="<?php bloginfo('stylesheet_directory'); ?>/library/css/main.css">
        <link rel="stylesheet" href="<?php bloginfo('stylesheet_directory'); ?>/library/css/main.css">
        <link rel="stylesheet" href="<?php bloginfo('stylesheet_directory'); ?>/style.css">
		<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
        <script src="<?php bloginfo('template_url'); ?>/library/js/vendor/modernizr-2.6.2.min.js"></script>
		<!--[if IE]>
			<link href="<?php bloginfo('template_url'); ?>/library/css/ie.css" media="screen, projection" rel="stylesheet" type="text/css" />
			<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/library/js/selectivizr-min.js"></script>

		<![endif]-->
        <?php wp_head(); ?>
    </head>
    <body <?php body_class('typography'); ?> >
        <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->


		<div class="wrap">

		<header>
			<div class="container">

				<div class="mini-tab">
					<p><a href="http://www.tapestry-uk.org/email-signup/">Sign up to our E-Bulletin</a></p>
				</div>

				<div class="logo">
					<a href="<?php echo get_option('home'); ?>"><img src="<?php bloginfo('template_url'); ?>/library/img/logo-tapestry.png" alt="logo-tapestry" width="169" height="92" /></a>
				</div>

				<nav class="mini-navs">
<!--
					<ul>
						<li><a href="#">Client Login</a></li>
					</ul>
-->
					<?php wp_nav_menu( array( 'theme_location'  => 'header_menu', ) ); ?>
					<p><a href="http://www.tapestry-uk.org/email-signup/">Sign up to our E-Bulletin</a></p>
				</nav>
				
				<form action="<?php echo site_url(); ?>" method="get" accept-charset="utf-8">
					<div class="input-group">
						<input class="search" type="search" name="s" placeholder="Search" />
						<span class="input-group-addon"><i class="fa fa-search"></i></span>
					</div>				
				</form>
				
			</div>
		</header>

		<nav id="main-nav">
			<div class="container">
				<a class="to-main-nav" href="#main-nav">Menu <i class="fa fa-bars"></i></a>
				<ul class="main-nav">
				<?php wp_nav_menu( array( 'theme_location'  => 'main_menu', 'menu_class' => 'main-nav', 'container' => '', 'items_wrap' => '%3$s', ) ); ?>
				</ul>
			</div>
		</nav>
		
