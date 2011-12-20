<?php
/*
@package WordPress
@subpackage Basics
@author Bruno Bichet <bruno.bichet@gmail.com>
@version 0.2.7
@since Version 0.1
@todo Check the markup http://validator.w3.org/
For Those About to Rock. Fire!
*/
 
/**
 * Note: 
 *
 * When using a child theme (see http://codex.wordpress.org/Theme_Development and
 * http://codex.wordpress.org/Child_Themes), you can override the functions
 * wrapped in a function_exists() call) by defining them first in your child theme's
 * functions.php file. 
 *
 * The child theme's functions.php file is included before the parent
 * theme's file, so the child theme functions would be used.
 */
require( dirname( __FILE__ ) . '/inc/functions-setup.php' );
require( dirname( __FILE__ ) . '/inc/functions-filter-action.php' );
require( dirname( __FILE__ ) . '/inc/functions-display.php' );
require( dirname( __FILE__ ) . '/inc/functions-comment.php' );
?>