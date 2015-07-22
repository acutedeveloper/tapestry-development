<?php

function tap_register_widget() {
	require_once TAP_PLUGIN_DIR . 'includes/class-widget.php'; 
	register_widget('TAP_Widgets_Widget');  
}

add_action( 'widgets_init', 'tap_register_widget');

function tap_register_post_type()	{
	$labels = array(
	    'name' => __('Tapestry Widgets', 'tap-widgets'),
	    'singular_name' => __('Tapestry Widget', 'tap-widgets'),
	    'add_new' => __('New Tapestry Widget', 'tap-widgets'),
	    'add_new_item' => __('Add New Tapestry Widget', 'tap-widgets'),
	    'edit_item' => __('Edit Tapestry Widget', 'tap-widgets'),
	    'new_item' => __('New Tapestry Widget', 'tap-widgets'),
	    'all_items' => __('All Tapestry Widgets', 'tap-widgets'),
	    'view_item' => __('View Tapestry Widget', 'tap-widgets'),
	    'search_items' => __('Search Tapestry Widgets', 'tap-widgets'),
	    'not_found' =>  __('No Tapestry widget blocks found', 'tap-widgets'),
	    'not_found_in_trash' => __('No Tapestry widget found in Trash', 'tap-widgets'), 
	    'menu_name' => __('Tapestry Widgets', 'tap-widgets')
	  );
	$args = array(
		'public' => false,
		'show_ui' => true,
		'labels' => $labels,
		'supports' => array('title', 'editor','thumbnail')
	);

   	register_post_type( 'tap-widget', $args );
}

add_action('init', 'tap_register_post_type');
