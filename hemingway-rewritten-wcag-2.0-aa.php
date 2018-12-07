<?php
/*
Plugin Name: Hemingway Rewritten Accessibility Patch
Plugin URI: https://github.com/KonainM/hemingway-rewritten-wcag-2.0-aa.git
Description: Makes the Hemingway Rewritten theme compliant with the WCAG 2.0 AA stadards of web accessibility.
Author: Konain Mukadam
Version: 1.0
Author URI: https://github.com/KonainM/
*/

function menu_fix()
{
	$theme_name = wp_get_theme();
	if ($theme_name->get( 'TextDomain' ) === "hemingway-rewritten")
	{
		wp_register_script('superfish', plugins_url( 'JS/superfish.js', __FILE__ ), array('jquery'), '1.7.3', TRUE);
		wp_register_script('superfish-args', plugins_url( 'JS/superfish_args.js', __FILE__ ), array('jquery'), '1.7.3', TRUE);
		if(!is_admin()) wp_enqueue_script('superfish');
		if(!is_admin()) wp_enqueue_script('superfish-args');
	}
}

function css_fix()
{
	$theme_name = wp_get_theme();
	if ($theme_name->get( 'TextDomain' ) === "hemingway-rewritten")
	{
		wp_register_style( 'nyu-hemingway', plugins_url( '/CSS/nyu-hemingway.css' , __FILE__ ) );
		wp_enqueue_style('nyu-hemingway');
	}
}

add_action('wp_enqueue_scripts', 'menu_fix');
add_action( 'wp_print_styles', 'css_fix', 99 );
