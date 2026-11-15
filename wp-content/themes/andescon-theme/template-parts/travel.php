<?php
/**
 * Venue and travel.
 *
 * @package Andescon_Theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<section id="travel" class="section wrap travel">
	<div class="travel-image">
		<img
			src="<?php echo esc_url( andescon_asset( 'img/ermita.webp' ) ); ?>"
			alt="<?php esc_attr_e( 'The white Gothic architecture of La Ermita church in Cali', 'andescon-theme' ); ?>"
			loading="lazy" width="1280" height="1812">
		<span class="image-label"><?php esc_html_e( 'SANTIAGO DE CALI / COLOMBIA', 'andescon-theme' ); ?></span>
	</div>

	<div class="travel-copy">
		<span class="eyebrow"><?php esc_html_e( '08 / PLAN YOUR VISIT', 'andescon-theme' ); ?></span>
		<h2>
			<?php esc_html_e( 'Come for the ideas.', 'andescon-theme' ); ?><br>
			<em><?php esc_html_e( 'Stay for Cali.', 'andescon-theme' ); ?></em>
		</h2>
		<p><?php esc_html_e( 'A setting where engineering meets a vibrant cultural landscape. Make space for the city beyond the conference.', 'andescon-theme' ); ?></p>

		<?php foreach ( andescon_travel_topics() as $andescon_topic ) : ?>
			<details<?php echo $andescon_topic['open'] ? ' open' : ''; ?>>
				<summary>
					<?php echo esc_html( $andescon_topic['title'] ); ?> <b aria-hidden="true">+</b>
				</summary>
				<p><?php echo esc_html( $andescon_topic['text'] ); ?></p>
			</details>
		<?php endforeach; ?>

		<a class="text-link" href="https://www.google.com/maps/search/Cali+Colombia" target="_blank" rel="noopener">
			<?php esc_html_e( 'Explore Cali on the map', 'andescon-theme' ); ?>
			<?php andescon_arrow(); ?>
			<span class="sr-only"><?php esc_html_e( '(opens in a new tab)', 'andescon-theme' ); ?></span>
		</a>
		<span class="caption credit"><?php esc_html_e( 'Photo: C arango / Wikimedia Commons, public domain', 'andescon-theme' ); ?></span>
	</div>
</section>
