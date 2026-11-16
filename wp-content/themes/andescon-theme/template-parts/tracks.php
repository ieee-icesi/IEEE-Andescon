<?php
/**
 * Research tracks grid. Each card opens its own dialog.
 *
 * @package Andescon_Theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<section class="section wrap" id="tracks">
	<div class="section-head">
		<div>
			<h2><?php esc_html_e( 'Research tracks', 'andescon-theme' ); ?></h2>
		</div>
		<p><?php esc_html_e( 'ANDESCON 2027 accepts papers in nine technical tracks. Select a track to see its scope.', 'andescon-theme' ); ?></p>
	</div>

	<div class="track-grid" id="track-grid">
		<?php foreach ( andescon_tracks() as $andescon_i => $andescon_track ) : ?>
			<button type="button" class="track" data-dialog="<?php echo esc_attr( 'track-' . ( $andescon_i + 1 ) ); ?>">
				<div class="track-top">
					<?php andescon_icon( $andescon_track['icon'] ); ?>
					<span><?php echo esc_html( andescon_index( $andescon_i ) ); ?></span>
				</div>
				<h3><?php echo esc_html( $andescon_track['title'] ); ?></h3>
				<span class="arrow" aria-hidden="true">&#8599;</span>
			</button>
		<?php endforeach; ?>
	</div>
</section>
