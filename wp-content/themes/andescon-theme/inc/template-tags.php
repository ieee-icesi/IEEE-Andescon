<?php
/**
 * Small presentation helpers shared by the template parts.
 *
 * @package Andescon_Theme
 */

declare( strict_types = 1 );

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * URL of a file inside the theme's assets directory.
 *
 * @param string $path Path relative to assets/, e.g. "img/cali.jpg".
 * @return string
 */
function andescon_asset( string $path ): string {
	return get_template_directory_uri() . '/assets/' . ltrim( $path, '/' );
}

/**
 * Absolute URL for an in-page anchor, so links keep working when the
 * front page is not the current request.
 *
 * @param string $anchor Section id without the leading "#".
 * @return string
 */
function andescon_anchor( string $anchor ): string {
	return home_url( '/' ) . '#' . ltrim( $anchor, '#' );
}

/**
 * The decorative north-east arrow used throughout the design.
 *
 * @param string $class Extra class names.
 * @return void
 */
function andescon_arrow( string $class = 'north-arrow' ): void {
	printf(
		'<span class="%s" aria-hidden="true"></span>',
		esc_attr( $class )
	);
}

/**
 * Two-digit section counter, e.g. 1 => "01".
 *
 * @param int $index Zero-based index.
 * @return string
 */
function andescon_index( int $index ): string {
	return str_pad( (string) ( $index + 1 ), 2, '0', STR_PAD_LEFT );
}

/**
 * Print an inline SVG icon from the track data.
 *
 * The path strings are literals defined in inc/data.php, never user input.
 *
 * @param string $paths Raw SVG child markup.
 * @return void
 */
function andescon_icon( string $paths ): void {
	printf(
		'<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">%s</svg>',
		$paths // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- trusted literal.
	);
}
