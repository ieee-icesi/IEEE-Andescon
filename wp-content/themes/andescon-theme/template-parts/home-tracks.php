<?php
/**
 * Home: research tracks as a photo mosaic. Each tile opens the same scope
 * dialog as the Authors page; the full call lives on Authors.
 *
 * @package Andescon_Theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$andescon_photos = andescon_track_photos();
?>
<section class="home-tracks" id="home-tracks">
	<div class="wrap">
		<div class="home-tracks-head">
			<div>
				<span class="eyebrow"><?php esc_html_e( 'Call for papers', 'andescon-theme' ); ?></span>
				<h2><?php esc_html_e( 'Nine tracks, one engineering community', 'andescon-theme' ); ?></h2>
			</div>
			<div>
				<p><?php esc_html_e( 'From smart grids to medical devices, ANDESCON 2027 brings together the research shaping technology and industry in the Andean region. Select a track to see its scope.', 'andescon-theme' ); ?></p>
				<a class="button" href="<?php echo esc_url( andescon_url( 'authors' ) ); ?>"><?php esc_html_e( 'Read the call for papers', 'andescon-theme' ); ?></a>
			</div>
		</div>

		<div class="mosaic">
			<?php foreach ( andescon_tracks() as $andescon_i => $andescon_track ) : ?>
				<?php $andescon_photo = $andescon_photos[ $andescon_i ] ?? null; ?>
				<button type="button" class="mosaic-tile" data-dialog="<?php echo esc_attr( 'track-' . ( $andescon_i + 1 ) ); ?>">
					<?php if ( $andescon_photo ) : ?>
						<img src="<?php echo esc_url( andescon_asset( $andescon_photo['image'] ) ); ?>" alt="" loading="lazy">
					<?php endif; ?>
					<span class="mosaic-top">
						<?php andescon_icon( $andescon_track['icon'] ); ?>
					</span>
					<span class="mosaic-body">
						<b><?php echo esc_html( $andescon_track['title'] ); ?></b>
						<small><?php echo esc_html( $andescon_track['topics'] ); ?></small>
					</span>
				</button>
			<?php endforeach; ?>
		</div>

		<details class="mosaic-credits">
			<summary><?php esc_html_e( 'Photo credits', 'andescon-theme' ); ?></summary>
			<ul>
				<?php foreach ( $andescon_photos as $andescon_photo ) : ?>
					<li>
						<?php echo esc_html( $andescon_photo['alt'] ); ?> —
						<a href="<?php echo esc_url( $andescon_photo['source'] ); ?>" target="_blank" rel="noopener"><?php echo esc_html( $andescon_photo['author'] ); ?></a>,
						<?php echo esc_html( $andescon_photo['license'] ); ?>, Wikimedia Commons
					</li>
				<?php endforeach; ?>
			</ul>
		</details>
	</div>
</section>
