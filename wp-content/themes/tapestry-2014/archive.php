		<?php include("header.php"); ?>
		
		<!-- BREADCRUMBS -->
		<?php the_breadcrumb(); ?>
		
		<div class="container">
			<!-- LEFT COLUMN -->
			<aside id="leftcolumn">
				<a class="inner-nav-link" href="#"><i class="fa fa-bars pull-right"></i>Inner Nav </a>
				<ul class="pages-menu">
				<?php 
				  $categories = get_categories('child_of=12'); 
				  foreach ($categories as $category) {

					echo '<li><a href="'.get_category_link($category->cat_ID).'">'.$category->cat_name.'</a></li>';

				  }
				 ?>
				</ul>
 			</aside>
			
			<!-- RIGHT COLUMN -->
			<aside id="rightcolumn">
							
			<?php
				/* Since we called the_post() above, we need to
				 * rewind the loop back to the beginning that way
				 * we can run the loop properly, in full.
				 */
				rewind_posts();
			
				/* Run the loop for the archives page to output the posts.
				 * If you want to overload this in a child theme then include a file
				 * called loop-archives.php and that will be used instead.
				 */
				 get_template_part( 'loop', 'archive' );
			?>
				
			</aside>
		</div>		

		<?php include("footer.php"); ?>