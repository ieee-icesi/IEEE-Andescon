<?php
/**
 * Venue and travel.
 *
 * @package Andescon_Theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$andescon_venue = andescon_venue();
?>
<section id="travel" class="section wrap travel">
	<div class="travel-map">
		<iframe
			src="<?php echo esc_url( 'https://www.google.com/maps?q=' . rawurlencode( $andescon_venue['query'] ) . '&output=embed' ); ?>"
			title="<?php echo esc_attr( sprintf( /* translators: %s: venue name. */ __( 'Map: %s', 'andescon-theme' ), $andescon_venue['name'] ) ); ?>"
			loading="lazy" referrerpolicy="no-referrer-when-downgrade" allowfullscreen></iframe>
		<div class="venue-card">
			<i class="fa-solid fa-location-dot" aria-hidden="true"></i>
			<div>
				<b><?php echo esc_html( $andescon_venue['name'] ); ?></b>
				<span><?php echo esc_html( $andescon_venue['address'] ); ?></span>
			</div>
		</div>
	</div>

	<div class="travel-copy">
		<h2><?php esc_html_e( 'Venue & travel', 'andescon-theme' ); ?></h2>
		<p><?php esc_html_e( 'Practical information for your trip to Cali.', 'andescon-theme' ); ?></p>

		<?php foreach ( andescon_travel_topics() as $andescon_topic ) : ?>
			<details<?php echo $andescon_topic['open'] ? ' open' : ''; ?>>
				<summary>
					<?php echo esc_html( $andescon_topic['title'] ); ?> <b aria-hidden="true">+</b>
				</summary>
				<p><?php echo esc_html( $andescon_topic['text'] ); ?></p>
			</details>
		<?php endforeach; ?>

		<a class="text-link" href="<?php echo esc_url( 'https://www.google.com/maps/search/?api=1&query=' . rawurlencode( $andescon_venue['query'] ) ); ?>" target="_blank" rel="noopener">
			<?php esc_html_e( 'Open in Google Maps', 'andescon-theme' ); ?>
			<span class="sr-only"><?php esc_html_e( '(opens in a new tab)', 'andescon-theme' ); ?></span>
		</a>
	</div>
</section>
