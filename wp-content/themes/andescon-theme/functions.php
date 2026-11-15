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

define( 'ANDESCON_THEME_VERSION', '0.2.0' );
define( 'ANDESCON_THEME_DIR', get_template_directory() );
define( 'ANDESCON_THEME_URI', get_template_directory_uri() );

require_once ANDESCON_THEME_DIR . '/inc/data.php';
require_once ANDESCON_THEME_DIR . '/inc/template-tags.php';

/**
 * Register theme supports and menus.
 */
function andescon_theme_setup(): void {
	load_theme_textdomain( 'andescon-theme', ANDESCON_THEME_DIR . '/languages' );

	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'html5', array( 'search-form', 'comment-form', 'gallery', 'caption', 'style', 'script' ) );
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 80,
			'width'       => 240,
			'flex-height' => true,
			'flex-width'  => true,
		)
	);

	register_nav_menus(
		array(
			'primary' => __( 'Primary Menu', 'andescon-theme' ),
			'footer'  => __( 'Footer Menu', 'andescon-theme' ),
		)
	);
}
add_action( 'after_setup_theme', 'andescon_theme_setup' );

/**
 * Enqueue styles and scripts.
 */
function andescon_theme_assets(): void {
	wp_enqueue_style(
		'andescon-fonts',
		'https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=Libre+Caslon+Display&display=swap',
		array(),
		null // phpcs:ignore WordPress.WP.EnqueuedResourceParameters.MissingVersion -- third party.
	);

	wp_enqueue_style(
		'andescon-theme',
		ANDESCON_THEME_URI . '/assets/css/main.css',
		array( 'andescon-fonts' ),
		ANDESCON_THEME_VERSION
	);

	wp_enqueue_script(
		'andescon-theme',
		ANDESCON_THEME_URI . '/assets/js/main.js',
		array(),
		ANDESCON_THEME_VERSION,
		true
	);
}
add_action( 'wp_enqueue_scripts', 'andescon_theme_assets' );

/**
 * Preconnect to the Google Fonts origins.
 *
 * @param array<int, string> $urls          Existing resource hints.
 * @param string             $relation_type Hint type.
 * @return array<int, string>
 */
function andescon_resource_hints( array $urls, string $relation_type ): array {
	if ( 'preconnect' === $relation_type ) {
		$urls[] = array(
			'href'        => 'https://fonts.googleapis.com',
			'crossorigin' => 'anonymous',
		);
		$urls[] = array(
			'href'        => 'https://fonts.gstatic.com',
			'crossorigin' => 'anonymous',
		);
	}

	return $urls;
}
add_filter( 'wp_resource_hints', 'andescon_resource_hints', 10, 2 );

/**
 * The landing page has no blog archive, so drop the emoji and block assets
 * the design does not use. Keeps the <head> close to the original template.
 */
function andescon_clean_head(): void {
	remove_action( 'wp_head', 'wp_generator' );
	remove_action( 'wp_head', 'rsd_link' );
	remove_action( 'wp_head', 'wlwmanifest_link' );
	remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
	remove_action( 'wp_print_styles', 'print_emoji_styles' );
}
add_action( 'init', 'andescon_clean_head' );

/**
 * Whether the "DESIGN PREVIEW" banner should render.
 *
 * Hidden on production automatically; override with the
 * ANDESCON_PREVIEW_BANNER constant if the design ever needs it back.
 *
 * @return bool
 */
function andescon_show_preview_banner(): bool {
	if ( defined( 'ANDESCON_PREVIEW_BANNER' ) ) {
		return (bool) ANDESCON_PREVIEW_BANNER;
	}

	return 'production' !== wp_get_environment_type();
}

/**
 * Preload the hero illustration so it does not wait on CSS parsing.
 *
 * @return void
 */
function andescon_preload_hero(): void {
	if ( ! is_front_page() ) {
		return;
	}

	printf(
		'<link rel="preload" as="image" href="%s" fetchpriority="high">' . "\n",
		esc_url( andescon_asset( 'img/cali-illustration.webp' ) )
	);
}
add_action( 'wp_head', 'andescon_preload_hero', 2 );

/**
 * Body classes that describe the landing page context.
 *
 * @param array<int, string> $classes Existing classes.
 * @return array<int, string>
 */
function andescon_body_classes( array $classes ): array {
	if ( is_front_page() ) {
		$classes[] = 'andescon-front';
	}

	return $classes;
}
add_filter( 'body_class', 'andescon_body_classes' );
