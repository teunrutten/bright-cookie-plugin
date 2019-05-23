<?php
/*
Plugin Name: Bright Cookie Notice
Plugin URI: https://bureaubright.nl/
Description: WIP
Version: 1.0.0
Author: Linsey Brander, Teun Rutten
Author URI: https://bureaubright.nl/
Text Domain: bright-cookie
License: GPLv2 or later
*/

// Make sure we don't expose any info if called directly
if ( !function_exists( 'add_action' ) ) {
	echo 'Hi there!  I\'m just a plugin, not much I can do when called directly.';
	exit;
}