		<?php get_header(); ?>
		<!-- CAROUSEL & SERVICES -->		
		<section class="silver">
			<div class="container">
			
			<h2 class="home-section-headings">Supporting adults in leading<br/> a positive, fullfilling life.</h2>	
			<div class="homepromos">
				<div class="carousel">
		            <article class="bxslider-wrapper">
		                <div>
		                    <ul class="bxslider" id="carousel">		
		                    <?php query_posts(array('showposts' => 10, 'post_parent' => get_ID_by_slug('homepage-slideshows'), 'post_type' => 'page')); ?>
		
		                    <?php if ( have_posts() ): while ( have_posts() ) : the_post(); ?>
			                    <li>
									<div class="tapbox">                    
										<?php the_content(); echo get_the_ID(); ?>
										<?php $this_page_id = get_the_ID(); echo $this_page_id ; ?>
										<?php category_label(get_the_ID());  ?>
					                    <a class="<?php the_field('slide_color') ?> tapbox_overlay" href="<?php the_field('slide_link') ?>">&nbsp;</a>
				                        <?php if(has_post_thumbnail()): ?>
				                            <?php the_post_thumbnail( 'tap-box-2', array('class' => get_field('header_image_position')) ); ?>
										<?php endif; ?>
									</div>
			                    </li>		
		                    <?php endwhile; else: ?>
		                    <?php endif; ?>
		                    <?php wp_reset_postdata(); ?>

		                    </ul>
		                </div>
		            </article>
				</div>

				<div class="column">

				<?php dynamic_sidebar('carousel_promos') ?>
								
				</div>
			</div>

			<h2 class="home-section-headings">Looking for advice?<br/> Here are some ways we can help</h2>
			
			<?php dynamic_sidebar('homepage_promos') ?>								
			
			</div>
		</section>

		<!-- NEWS ARTICLES -->
		
		<section class="news-home">
				<div class="container">
					<h2 class="home-section-headings">Here are some of our latest going ons</h2>				

					<?php 
						
						$args = array(
							'category_name' => 'tapestry-news',
							'post__in' => get_option( 'sticky_posts' ),
							'showposts' => '4'
						);
					
						$the_query = new WP_Query( $args );
						
						$count = 0;
						
					?>

					<?php if ( $the_query -> have_posts() ): while($the_query -> have_posts()) : $the_query -> the_post(); ?>

					<?php if($count%2 == 0): ?><div class="column"><?php endif; ?>

						<?php if (has_post_thumbnail()) { ?>
						<article>
							<div class="newsbox">
							
								<?php category_label(get_the_ID()); ?>
	                            
	                            <?php the_post_thumbnail('news-home'); ?>
	                            
							</div>					
							<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
							<p><?php the_excerpt(); ?></p>
						</article>
						<?php } else { ?>
						
						<article class="no-image">
							<?php category_label(get_the_ID()); ?>
							<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
						</article>
						
						<?php } ?>
																		
					<?php if($count%2 == 1): ?></div><?php endif; ?>
					
						<?php $count++; endwhile; else: ?>
						<?php endif; wp_reset_query(); ?>	

				</div>
		</section>
	
		<?php get_footer(); ?>