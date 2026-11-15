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
			<span class="eyebrow"><?php esc_html_e( '02 / RESEARCH DIRECTIONS', 'andescon-theme' ); ?></span>
			<h2>
				<?php esc_html_e( 'Nine tracks.', 'andescon-theme' ); ?><br>
				<em><?php esc_html_e( 'Endless connections.', 'andescon-theme' ); ?></em>
			</h2>
		</div>
		<p>
			<?php esc_html_e( 'Find the right conversation for your work.', 'andescon-theme' ); ?><br>
			<?php esc_html_e( 'Select a track to explore its focus.', 'andescon-theme' ); ?>
		</p>
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
