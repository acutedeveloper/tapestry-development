		<?php include("header.php"); ?>
		
		<!-- BREADCRUMBS -->
		<?php the_breadcrumb(); ?>
		
		<div class="container">
			<!-- LEFT COLUMN -->
			<aside id="leftcolumn">

 			</aside>
			
			<!-- RIGHT COLUMN -->
			<aside id="rightcolumn">
							
			<?php if ( have_posts() ) : ?>
			    <article role="main" class="page-content search-content">
			<!--         <h1><?php printf( __( 'Search Results for: %s' ), '<span>' . get_search_query() . '</span>' ); ?></h1> -->
			        <?php get_template_part( 'loop', 'search' ); ?>
					<?php else : ?>
			            <h1 class="entry-title"><?php _e( 'Nothing Found' ); ?></h1>
			            <article class="entry-content">
			                <p><?php _e( 'Sorry, but nothing matched your search criteria. Please try again with some different keywords.' ); ?></p>
			                <?php /*?><?php get_search_form(); ?><?php */?>
			            </article><!-- .entry-content -->
			        <?php endif; ?>
			    </article>
				
			</aside>
		</div>		

		<?php include("footer.php"); ?>