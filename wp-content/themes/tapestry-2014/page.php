		<?php include("header.php"); ?>
		
		<!-- BREADCRUMBS -->
		<?php the_breadcrumb(); ?>
		
		<div class="container">

			<?php get_sidebar('left'); ?>
			
			<!-- RIGHT COLUMN -->
			<article id="rightcolumn" class="content">

			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	
			<h1><?php the_title(); ?></h1>
			
			<?php $current_page_ID = get_the_ID(); ?>
			
			<?php 
			
				if (get_the_content() == ""):
				
					echo "<div class='alert alert-warning'>No Content!</div>";
					
				else:
				
					the_content();
					
				endif;
			
			?>

			<?php if(get_field('location_info') != ""){ ?>
				<div class="location-info">
					<div class="location-content">
						<?php the_field('location_info'); ?>						
					</div>
						<?php $field = get_field('google_map'); ?>					
						<?php if($field['address'] != ""){ ?>
						<?php location_map(get_field('google_map')); ?>
						<div class="location-map" id="map-canvas"></div>
					<?php } ?>
				</div>
			<?php } ?>

			<a class="label label-tw" href="https://twitter.com/intent/tweet?url=<?php the_permalink(); ?>&amp;text=<?php the_title(); ?>&amp;via=tapestrycare" target="_blank">Tweet this</a>
			<a class="label label-fb" href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>" target="_blank">Share this</a>	
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
					if( $my_query->have_posts() && count(have_posts()) == 3 )
						{?>

							<h4>Related articlessss</h4>
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