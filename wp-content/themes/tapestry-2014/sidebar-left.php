			<!-- LEFT COLUMN -->
			<aside id="leftcolumn">
			<?php if( is_page() ): ?>

				<a class="inner-nav-link" href="#"><i class="fa fa-bars pull-right"></i>Inner Nav </a>
				<ul class="pages-menu">
					<?php sideMenu($post->ID); ?>
				</ul>

			<?php endif; ?>

			<?php
				
			if (tribe_is_event() || tribe_is_event_category() || tribe_is_in_main_loop() || tribe_is_view() || 'tribe_events' == get_post_type() || is_singular( 'tribe_events' )) {
	
			$terms = get_terms("tribe_events_cat");
		 		$count = count($terms);
		 		if ( $count > 0 ){
					echo '<a class="inner-nav-link" href="#"><i class="fa fa-bars pull-right"></i>Inner Nav </a>';
		 		    echo "<ul class=\"pages-menu\">";
		 		    foreach ( $terms as $term ) {
		 		      echo "<li><a href='" .  get_site_url() . "/going-out/category/". $term->slug." '>" . $term->name . "</a></li>";
		
		 		    }
		 		    echo "</ul>";
		 		}
		 	}
			?>
			
			</aside>
