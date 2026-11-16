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
 * Absolute URL for a site target written as "page#anchor".
 *
 * Examples: "authors" → /authors/, "authors#tracks" → /authors/#tracks,
 * "#city" → front page #city.
 *
 * @param string $target Page slug, optional "#anchor", or both.
 * @return string
 */
function andescon_url( string $target ): string {
	$parts  = explode( '#', $target, 2 );
	$page   = trim( $parts[0], '/' );
	$anchor = $parts[1] ?? '';
	$url    = home_url( '' === $page ? '/' : '/' . $page . '/' );

	return '' === $anchor ? $url : $url . '#' . $anchor;
}

/**
 * Whether a navigation target points at the page being viewed.
 *
 * @param string $target Same format as andescon_url().
 * @return bool
 */
function andescon_is_current( string $target ): bool {
	$parts = explode( '#', $target, 2 );
	$page  = trim( $parts[0], '/' );

	if ( '' === $page ) {
		return '/' === $target && is_front_page();
	}

	return is_page( $page );
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

/**
 * "Add to calendar" targets for the conference event.
 *
 * @return array<int, array{label: string, icon: string, url: string, download: bool}>
 */
function andescon_calendar_links(): array {
	$event = andescon_event();
	$start = str_replace( '-', '', $event['start'] );
	$end   = str_replace( '-', '', $event['end'] );

	$google = add_query_arg(
		array(
			'action'   => 'TEMPLATE',
			'text'     => rawurlencode( $event['title'] ),
			'dates'    => $start . '/' . $end,
			'location' => rawurlencode( $event['location'] ),
			'details'  => rawurlencode( $event['details'] ),
		),
		'https://calendar.google.com/calendar/render'
	);

	$outlook = add_query_arg(
		array(
			'path'     => '/calendar/action/compose',
			'rru'      => 'addevent',
			'allday'   => 'true',
			'subject'  => rawurlencode( $event['title'] ),
			'startdt'  => $event['start'],
			'enddt'    => $event['end'],
			'location' => rawurlencode( $event['location'] ),
			'body'     => rawurlencode( $event['details'] ),
		),
		'https://outlook.live.com/calendar/0/deeplink/compose'
	);

	return array(
		array( 'label' => 'Google Calendar', 'icon' => 'fa-brands fa-google', 'url' => $google, 'download' => false ),
		array( 'label' => 'Outlook', 'icon' => 'fa-brands fa-microsoft', 'url' => $outlook, 'download' => false ),
		array( 'label' => 'Apple Calendar (.ics)', 'icon' => 'fa-brands fa-apple', 'url' => andescon_asset( 'andescon-2027.ics' ), 'download' => true ),
	);
}

/**
 * Time left until the conference opens, for the server-rendered countdown
 * (main.js keeps it ticking).
 *
 * @return array{days: int, hours: int, minutes: int, seconds: int}
 */
function andescon_time_left(): array {
	$left = max( 0, strtotime( andescon_event()['starts_at'] ) - time() );

	return array(
		'days'    => intdiv( $left, DAY_IN_SECONDS ),
		'hours'   => intdiv( $left % DAY_IN_SECONDS, HOUR_IN_SECONDS ),
		'minutes' => intdiv( $left % HOUR_IN_SECONDS, MINUTE_IN_SECONDS ),
		'seconds' => $left % MINUTE_IN_SECONDS,
	);
}
