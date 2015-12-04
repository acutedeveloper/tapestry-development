		<?php include("header.php"); ?>
		
		<!-- BREADCRUMBS -->
		<?php the_breadcrumb(); ?>
		
		<div class="container">
			<!-- LEFT COLUMN -->
			<aside id="leftcolumn">

				<!-- TODO: Add user article data -->
			<?php if ( have_posts() ): while ( have_posts() ) : the_post(); ?>

				<div class="authorinfo" id="post-<?php the_ID(); ?>">
					<p class="author"><?php the_date('jS M Y'); ?></p>
					<p class="author">Written by <strong><?php the_author(); ?></strong></p>
					<hr/>
					<p>Categorised under</p>

					<?php category_label(get_the_ID()); ?>
					<hr/>
					<p>Share links</p>
					<a class="label label-tw" href="https://twitter.com/intent/tweet?url=<?php the_permalink(); ?>&amp;text=<?php the_title(); ?>&amp;via=tapestrycare" target="_blank">Tweet this</a>
					<a class="label label-fb" href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>" target="_blank">Share this</a>	
				</div>
			<?php endwhile; else: ?>
			<?php endif; ?>
			</aside>
			
			<!-- RIGHT COLUMN -->
			<article class="content" id="rightcolumn">

			<?php if ( have_posts() ): while ( have_posts() ) : the_post(); ?>
				<h1><?php the_title(); ?></h1>
				
			  	<?php the_content(); ?>
	
			<?php endwhile; else: ?>
			<?php endif; ?>

			</article>
		</div>		
		<!-- RELATED RESOURCES -->

		<div class="container">
		
			<div class="related-articles">
				
			<?php 
					
				$orig_post = $post;
				global $post;
				$categories = get_the_category($post->ID);
				
				if ($categories) {
					$category_ids = array();
					
					foreach($categories as $individual_category) $category_ids[] = $individual_category->term_id;
					
					$args=array(
						'category__in' => $category_ids,
						'post__not_in' => array($post->ID),
						'posts_per_page'=> 3, // Number of related posts that will be displayed.
						'caller_get_posts'=>1,
						'orderby'=>'rand' // Randomize the posts
					);
					
					$my_query = new wp_query( $args );
					if( $my_query->have_posts() )
						{?>

							<h4>Related articles</h4>
						
							<?php 
								
							while( $my_query->have_posts() )
							{
								$my_query->the_post(); ?>
								<article>
									<h2><a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
									<p><?php the_excerpt(); ?></p>
									<?php category_label($post->ID); ?>
								</article>
						<?php }
						}
					}
				
				$post = $orig_post;
				wp_reset_query();
			?>
				
			</div>
		
			<div class="services-6">
				
				<?php dynamic_sidebar('footer_sidebar') ?>				

			</div>			
		</div>

		<?php include("footer.php"); ?>