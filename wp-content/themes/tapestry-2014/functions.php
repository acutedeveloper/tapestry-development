<?php
	
add_theme_support( 'post-thumbnails' ); 

// A Very useful function that returns the page->ID from the slug
function get_ID_by_slug($page_slug) {

	$page = get_page_by_path($page_slug);

	if ($page) {
		return $page->ID;
	} else {
		return null;
	}
}

function return_child_cat($parentslug, $link = NULL)
{

	$catslug =  get_category_by_slug( $parentslug );

	foreach((get_the_category()) as $childcat)
	{
		if (cat_is_ancestor_of($catslug->term_id, $childcat))
		{
			if($link == NULL)
			{
				return $childcat->cat_name;
			}
			else
			{
				return '<a href="'.get_category_link( $childcat->term_id ).'">'.$childcat->cat_name.'</a>';			
			}
		}
	}	
}


//------ REGISTER SIDEBARS ------//

function tapestry_sidebars() {
    register_sidebar(array( 'name' => 'Homepage Promos','id' => 'homepage_promos','description' => "This is for the the homepage links. Max 6 items", 'before_widget' => '<div class="tapbox">','after_widget' => '</div>','before_title' => '<h2>','after_title' => '</h2>'));
    register_sidebar(array( 'name' => 'Carousel Promos','id' => 'carousel_promos','description' => "This is for the the homepage links. Max 2 items", 'before_widget' => '<div class="tapbox">','after_widget' => '</div>','before_title' => '<h2>','after_title' => '</h2>'));
    register_sidebar(array( 'name' => 'Footer Promos','id' => 'footer_sidebar','description' => "This is for promotions that appear in the page footers. Max 3 items", 'before_widget' => '<div class="tapbox">','after_widget' => '</div>','before_title' => '<h2>','after_title' => '</h2>'));
}

add_action( 'widgets_init', 'tapestry_sidebars' );


//------- MENU PAGES ---------//


function register_my_menus() {
  register_nav_menus(
	array(
	  'main_menu' => __( 'Main Menu' ),
	  'header_menu' => __( 'Header Menu' ),
	  'quick_links' => __( 'Quick Links' ),
	  'footer_menu' => __( 'Footer Menu' )
	)
  );
}

add_action( 'init', 'register_my_menus' );

//----- Sidebar Menu

function sideMenu($id){

	$currentPostAncestors = get_post_ancestors($id);

	// If get_ancestors == 1
	if(count($currentPostAncestors) == 0)
	{
		// show children of this post $post->ID
		$children = wp_list_pages("title_li=&child_of=".$id."&echo=0&link_after=");	  
		echo $children;
	}
	else if(count($currentPostAncestors) == 1)
	{
		// If get_ancestors == 2
		// Show the 1st array item
		$children = wp_list_pages("title_li=&child_of=".$currentPostAncestors[0]."&echo=0&link_after=");
		echo $children;
	}
	else if(count($currentPostAncestors) == 2)
	{
		$children = wp_list_pages("title_li=&child_of=".$currentPostAncestors[1]."&echo=0&link_after=");
		echo $children;
	}

}


//------ BREAD CRUMBS -------//

function the_breadcrumb() {
	global $post;
	echo '<div class="silver breadcrumbs">';
	echo '<nav class="container">';
	echo '<ul>';
	if (!is_home())
	{
		echo '<li><a href="';
		echo get_option('home');
		echo '">';
		echo '<i class="fa fa-home"></i>';
		echo '</a></li><li> / </li>';
		if (is_archive() && !tribe_is_event_category())
		{
			echo '<li><a href="'.get_permalink(get_ID_by_slug('whats-new')).'">'.get_the_title(get_ID_by_slug('whats-new')).'</a><li/><li>';
			echo '</li><li> / </li><li><strong>'.return_child_cat('whats-new').' </strong>';
			//echo 'archive';
		}
		elseif (is_single() && !tribe_is_event_category())
		{
			echo '<li><a href="'.get_permalink(get_ID_by_slug('whats-new')).'">'.get_the_title(get_ID_by_slug('whats-new')).'</a><li/><li>';
			echo '</li><li> / </li><li>';
			echo '<li>'.return_child_cat('whats-new', TRUE);
			echo '</li><li> / </li><li>';
			the_title();
			echo '</li>';
			//echo 'single';
		}
		elseif (is_page())
		{
			//echo 'page';

			if($post->post_parent)
			{
				$anc = get_post_ancestors( $post->ID );
				$title = get_the_title();
				foreach ( $anc as $ancestor )
				{
					$output = '<li><a href="'.get_permalink($ancestor).'" title="'.get_the_title($ancestor).'">'.get_the_title($ancestor).'</a></li> <li>/</li>';
				}
				echo $output;
				echo '<strong title="'.$title.'"> '.$title.'</strong>';
			}
			else
			{
				echo '<li><strong> '.get_the_title().'</strong></li>';
			}
		}
		elseif (tribe_is_event() || tribe_is_event_category() || tribe_is_in_main_loop() || tribe_is_view() || 'tribe_events' == get_post_type() || is_singular( 'tribe_events' ))
		{
			echo '<li><strong>Going out</strong></li>';
			echo '<li> / </li>';
			if(tribe_is_event_category())
			{
				echo '<li><strong>'.tribe_get_event_taxonomy().'</strong></li>';
			}
			if(is_singular( 'tribe_events' ))
			{
				echo '<li> / </li>';
				echo '<li><strong>'.get_the_title().'</strong></li>';
			}
		}
		elseif (is_search())
		{
			echo '<li>Search Results: '.the_search_query().'</li>';
		}
		
	}
	elseif (is_tag()) {single_tag_title();}
	elseif (is_day()) {echo"<li>Archive for "; the_time('F jS, Y'); echo'</li>';}
	elseif (is_month()) {echo"<li>Archive for "; the_time('F, Y'); echo'</li>';}
	elseif (is_year()) {echo"<li>Archive for "; the_time('Y'); echo'</li>';}
	elseif (is_author()) {echo"<li>Author Archive"; echo'</li>';}
	elseif (isset($_GET['paged']) && !empty($_GET['paged'])) {echo "<li>Blog Archives"; echo'</li>';}
	echo '</ul>';
	echo '</nav>';
	echo '</div>';
}

//------ NEWS STICKY ------//

function newsSticky()
{
	/* Get all sticky posts */
	$sticky = get_option( 'sticky_posts' );


	/* Sort the stickies with the newest ones at the top */
	rsort( $sticky );

	/* Get the 5 newest stickies (change 5 for a different number) */
	$sticky = array_slice( $sticky, 0, 2 );	

	/* Query sticky posts */
	$query = query_posts( array( 'post__in' => $sticky, 'caller_get_posts' => 1) );
		
}

//------ EXCERPT LENGTH -----//

// Default is 55 shortened to 20
function custom_excerpt_length( $length ) {
	return 20;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

//------ PAGE META BOXES ------//

add_action( 'admin_init', 'page_meta_boxes' );
function page_meta_boxes(){
	 
	// Add category metabox to page 
	register_taxonomy_for_object_type('category', 'page');  	
}

//------ CATEGORY LABEL ------//

function category_label($id){
		
	switch (get_post_type($id)) {
	    case "page":
	        $parent_cat_id = 12;
	        break;
	    case "post":
	        $parent_cat_id = 24;
	        break;
	}
		
	$cat_children = explode("/", get_category_children($parent_cat_id));

	$tags = get_the_category($id);
		
	foreach ( $tags as $tag ) {
		
		if(in_array($tag->term_id, $cat_children))
		{
			$tag_link = get_tag_link( $tag->term_id );
					
			echo "<a href='{$tag_link}' title='{$tag->name} Tag' class='{$tag->slug} label label-blue'>{$tag->name}</a>";			
		}
	}
			
}

//------ FLICKR FEED -------//
// http://www.barattalo.it/2010/05/30/parsing-flickr-feed-with-php-tutorial/

function attr($s,$attrname) { // return html attribute
    preg_match_all('#\s*('.$attrname.')\s*=\s*["|\']([^"\']*)["|\']\s*#i', $s, $x);
    if (count($x)>=3) return $x[2][0]; else return "";
}
 
// id = id of the feed
// n = number of thumbs
function parseFlickrFeed($id,$n) {
	    $url = "http://api.flickr.com/services/feeds/photos_public.gne?id={$id}&lang=it-it&format=rss_200";
	    $s = file_get_contents($url);
	    preg_match_all('#<item>(.*)</item>#Us', $s, $items);
	    $out = "";
	    for($i=0;$i<count($items[1]);$i++) {
	        if($i>=$n) return $out;
	        $item = $items[1][$i];
	        preg_match_all('#<link>(.*)</link>#Us', $item, $temp);
	        $link = $temp[1][0];
	        preg_match_all('#<title>(.*)</title>#Us', $item, $temp);
	        $title = $temp[1][0];
	        preg_match_all('#<media:thumbnail([^>]*)>#Us', $item, $temp);
	        $thumb = attr($temp[0][0],"url");
	        $out.="<li class=\"flickr-thumbs\"><a href='$link' target='_blank' title=\"".str_replace('"','',$title)."\"><img src='$thumb'/></a></li>";
	    }
	    return $out;
}

//----- MEDIA IMAGE SIZES -----//

add_theme_support( 'post-thumbnails' );

add_image_size( 'news-home', 200, 151, true);
add_image_size( 'tap-box', 400, 300, true);
add_image_size( 'tap-box-2', 600, 450, true);

// This is to stop the fixed height and widths distorting the images
function remove_img_attr ($html) {
	return preg_replace('/(width|height)="\d+"\s/', "", $html);
}

add_filter( 'post_thumbnail_html', 'remove_img_attr' );

//------ LOCATION INFORMATION GOOGLE MAP ------//

function location_map($maparray = NULL)
{
	if($maparray == NULL)
	{
		exit;
	}

?>
	<script src="https://maps.googleapis.com/maps/api/js?v=3.exp"></script>
    <script>
		function initialize() {
		  var myLatlng = new google.maps.LatLng(<?php echo $maparray['lat'] ?>,<?php echo $maparray['lng'] ?>);
		  var mapOptions = {
		    zoom: 15,
		    center: myLatlng
		  }
		  var map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
		
		  var marker = new google.maps.Marker({
		      position: myLatlng,
		      map: map,
		      title: 'Hello World!'
		  });
		}
		
		google.maps.event.addDomListener(window, 'load', initialize);		
    </script>
<?php
}


//------ EDITOR STYLES ------//
add_filter( 'mce_buttons_2', 'my_mce_buttons_2' );

function my_mce_buttons_2( $buttons ) {
	array_unshift( $buttons, 'styleselect' );
	return $buttons;
}

add_filter( 'tiny_mce_before_init', 'my_mce_before_init' );

function my_mce_before_init( $settings ) {

	$style_formats = array(
		array(
			'title' => 'Tapestry Table Style',
			'selector' => 'table',
			'classes' => 'data'
		),
		array(
			'title' => 'Grey button',
			'selector' => 'a',
			'classes' => 'btn btn-default btn-lg'
		),
		array(
			'title' => 'Blue button',
			'selector' => 'a',
			'classes' => 'btn btn-primary btn-lg'
		),
		array(
			'title' => 'Green button',
			'selector' => 'a',
			'classes' => 'btn btn-success btn-lg'
		),
		array(
			'title' => 'Orange button',
			'selector' => 'a',
			'classes' => 'btn btn-warning btn-lg'
		),
		array(
			'title' => 'Red button',
			'selector' => 'a',
			'classes' => 'btn btn-danger btn-lg'
		),
		array(
			'title' => 'Small Red button',
			'selector' => 'a',
			'classes' => 'btn btn-danger btn-xs'
		),
		array(
			'title' => 'Light blue button',
			'selector' => 'a',
			'classes' => 'btn btn-info btn-lg'
		),
		array(
			'title' => 'Sub-heading style',
			'selector' => 'h2',
			'classes' => 'section-header h3'
		)
	);

	$settings['style_formats'] = json_encode( $style_formats );

	return $settings;

}

function my_theme_add_editor_styles() {
	add_editor_style( 'library/css/havering-editor-styles.css' );
}
add_action( 'init', 'my_theme_add_editor_styles' );


function fb_change_mce_buttons( $initArray ) {
	//@see http://wiki.moxiecode.com/index.php/TinyMCE:Control_reference
	$initArray['block_formats'] = 'Paragraph=p;Small=small;Header 1=h1;Header 2=h2;Header 3=h3';
	$initArray['theme_advanced_disable'] = 'forecolor';

	return $initArray;
}
add_filter('tiny_mce_before_init', 'fb_change_mce_buttons');
