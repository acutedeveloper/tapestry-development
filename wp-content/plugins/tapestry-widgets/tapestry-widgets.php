<?php
/*
Plugin Name: Tapestry Widget Plugin
Plugin URI: http://www.acumendesign.co.uk
Description: A simple plugin that adds simple wysiwyg widgets
Version: 1.0
Author: @acute_designer
Author http://www.acumendesign.co.uk
License: GPL2
*/

if ( ! defined( 'ABSPATH' ) ) exit;

define("TAP_VERSION_NUMBER", "0.1");
define("TAP_PLUGIN_DIR", plugin_dir_path(__FILE__)); 

require_once TAP_PLUGIN_DIR . 'includes/plugin.php';
