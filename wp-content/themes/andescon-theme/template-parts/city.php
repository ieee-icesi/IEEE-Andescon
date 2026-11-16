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
<section id="city" class="city-feature">
	<img
		src="<?php echo esc_url( andescon_asset( 'img/cali.webp' ) ); ?>"
		alt="<?php esc_attr_e( 'La Ermita church and the surrounding city of Cali', 'andescon-theme' ); ?>"
		loading="lazy" width="1280" height="728">
	<div class="city-overlay"></div>

	<div class="wrap city-copy">
		<h2><?php esc_html_e( 'Santiago de Cali', 'andescon-theme' ); ?></h2>
		<p><?php esc_html_e( 'Capital of the Valle del Cauca, Colombia’s third-largest city and the world capital of salsa.', 'andescon-theme' ); ?></p>
		<a href="<?php echo esc_url( andescon_url( 'attend#travel' ) ); ?>" class="button cream">
			<?php esc_html_e( 'Explore your host city', 'andescon-theme' ); ?>
		</a>
		<span class="photo-credit"><?php esc_html_e( 'La Ermita · Photograph by Juanes016 / Wikimedia Commons, CC0', 'andescon-theme' ); ?></span>
	</div>
</section>
