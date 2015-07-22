<?php

/*
Template Name: What's New
*/

?>
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
				
				<div class="featured-articles">
					<h4>Featured</h4>

					<?php newsSticky(); ?>
					<?php if (have_posts()): while (have_posts()) : the_post(); ?>
						<!-- STICKY -->
						<article>
				            <?php if (has_post_thumbnail()) { ?>
								<div class="image-crop">
									<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('tap-box'); ?></a>
								</div>
			                <?php } else { ?>

			                <?php } ?>
							<h2><a href="<?php the_permalink(); ?>"><?php the_title() ?></a></h2>
							<?php the_excerpt(); ?>
							<?php category_label(get_the_ID()); ?>
							<p class="date"><?php the_time('jS M Y'); ?></p>
						</article>
					<?php endwhile; else: ?>
					<?php endif; ?>

				</div>

				<div class="latest-articles">
					<h4>Latest articles</h4>

					<?php
					query_posts(array(
						'post_type'      => 'post', // You can add a custom post type if you like
						'posts_per_page' => 10,
						'post__not_in' => get_option('sticky_posts')
					));
			
					?>

					<?php while ( have_posts() ) : the_post(); ?>
						<?php /* How to display standard posts and search results */ ?>
					
					        <article class="article-archive <?php echo $firstClass; ?>" id="post-<?php the_ID(); ?>">
								<?php $firstClass = ""; ?>
								<?php ?>
					                <h2><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( '%s' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark">
					                	<?php the_title(); ?></a></h2>
					
					                <p><?php the_excerpt(); ?></p>
									<?php category_label(get_the_ID()); ?>
									<p class="date"><?php the_time('l, F jS, Y') ?></p>
							</article>
					
							<?php comments_template( '', true ); ?>
					
					<?php endwhile; // End the loop. Whew. ?>
					
					</div>
					
					<?php /* Display navigation to next/previous pages when applicable */ ?>
					<?php if (  $wp_query->max_num_pages > 1 ) : ?>
					    <ul class="navigation">
					        <li class="older">
					            <?php next_posts_link( __( 'Older posts' ) ); ?>
					        </li> 
					        <li class="newer">
					            <?php previous_posts_link( __( 'Newer posts' ) ); ?>
					        </li>
					    </ul>
					<?php endif; ?>
				
			</aside>
		</div>		

		<?php include("footer.php"); ?>