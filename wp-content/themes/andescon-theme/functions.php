<?php
/**
 * Andescon Theme bootstrap.
 *
 * @package Andescon_Theme
 */

declare( strict_types = 1 );

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'ANDESCON_THEME_VERSION', '0.1.0' );

/**
 * Register theme supports, menus and image sizes.
 */
function andescon_theme_setup(): void {
	load_theme_textdomain( 'andescon-theme', get_template_directory() . '/languages' );

	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'html5', array( 'search-form', 'comment-form', 'gallery', 'caption', 'style', 'script' ) );
	add_theme_support( 'custom-logo', array(
		'height'      => 80,
		'width'       => 240,
		'flex-height' => true,
		'flex-width'  => true,
	) );

	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'andescon-theme' ),
		'footer'  => __( 'Footer Menu', 'andescon-theme' ),
	) );
}
add_action( 'after_setup_theme', 'andescon_theme_setup' );

/**
 * Enqueue front-end styles and scripts.
 */
function andescon_theme_assets(): void {
	wp_enqueue_style(
		'andescon-theme',
		get_template_directory_uri() . '/assets/css/main.css',
		array(),
		ANDESCON_THEME_VERSION
	);

	wp_enqueue_script(
		'andescon-theme',
		get_template_directory_uri() . '/assets/js/main.js',
		array(),
		ANDESCON_THEME_VERSION,
		true
	);
}
add_action( 'wp_enqueue_scripts', 'andescon_theme_assets' );
