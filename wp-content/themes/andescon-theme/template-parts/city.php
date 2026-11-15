<?php
/**
 * City feature: full-bleed Cali image with overlay copy.
 *
 * @package Andescon_Theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<section class="city-feature">
	<img
		src="<?php echo esc_url( andescon_asset( 'img/cali.webp' ) ); ?>"
		alt="<?php esc_attr_e( 'La Ermita church and the surrounding city of Cali', 'andescon-theme' ); ?>"
		loading="lazy" width="1280" height="728">
	<div class="city-overlay"></div>

	<div class="wrap city-copy">
		<span class="eyebrow light"><?php esc_html_e( '05 / THIS IS CALI', 'andescon-theme' ); ?></span>
		<h2>
			<?php esc_html_e( 'A different rhythm.', 'andescon-theme' ); ?><br>
			<em><?php esc_html_e( 'A new perspective.', 'andescon-theme' ); ?></em>
		</h2>
		<p>
			<?php esc_html_e( 'Let the city be part of the conversation.', 'andescon-theme' ); ?><br>
			<?php esc_html_e( 'Discover the architecture, culture and energy of Cali.', 'andescon-theme' ); ?>
		</p>
		<a href="<?php echo esc_url( andescon_anchor( 'travel' ) ); ?>" class="button cream">
			<?php esc_html_e( 'Explore your host city', 'andescon-theme' ); ?>
			<?php andescon_arrow(); ?>
		</a>
		<span class="photo-credit"><?php esc_html_e( 'La Ermita · Photograph by Juanes016 / Wikimedia Commons, CC0', 'andescon-theme' ); ?></span>
	</div>
</section>
