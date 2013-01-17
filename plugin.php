<?php
/*
Plugin Name: WP Theme Control
Plugin URI: https://github.com/BFTrick/wp-theme-picker-control
Description: This plugin creates a new control in the theme customizer to help users select groups of options
Version: 0.2
Author: Patrick Rauland
Author URI: http://www.patrickrauland.com

Copyright (C) 2013 Patrick Rauland
*/


/**
 * Include theme classes
**/
require_once( 'theme-picker-theme.php' );
require_once( 'theme-picker-theme-collection.php' );


/**
 * Include theme classes & control
 * only load when the theme customizer is loaded
**/
add_action( 'customize_register', 'theme_picker_control_customize_register' );
function theme_picker_control_customize_register()
{
	// theme customizer control
	require_once( 'control.php' );
}