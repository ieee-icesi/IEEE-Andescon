<?php
/**
 * Discover Cali: places and typical food, as photo-card carousels.
 *
 * Photos come from Wikimedia Commons under free licenses; each card carries
 * its attribution as the licenses require.
 *
 * @package Andescon_Theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<section id="discover" class="discover">
	<div class="wrap">
		<div class="section-head">
			<div>
				<h2><?php esc_html_e( 'Discover Cali', 'andescon-theme' ); ?></h2>
			</div>
			<p><?php esc_html_e( 'Stay a few extra days. Salsa, green hills, rivers and some of the best street food in Colombia are waiting for you.', 'andescon-theme' ); ?></p>
		</div>

		<?php foreach ( andescon_discover() as $andescon_group_key => $andescon_group ) : ?>
			<div class="discover-group">
				<div class="discover-bar">
					<h3><?php echo esc_html( $andescon_group['title'] ); ?></h3>
					<div class="discover-nav">
						<button type="button" data-scroll="-1" aria-controls="<?php echo esc_attr( 'discover-' . $andescon_group_key ); ?>" aria-label="<?php esc_attr_e( 'Previous', 'andescon-theme' ); ?>"><i class="fa-solid fa-chevron-left" aria-hidden="true"></i></button>
						<button type="button" data-scroll="1" aria-controls="<?php echo esc_attr( 'discover-' . $andescon_group_key ); ?>" aria-label="<?php esc_attr_e( 'Next', 'andescon-theme' ); ?>"><i class="fa-solid fa-chevron-right" aria-hidden="true"></i></button>
					</div>
				</div>

				<ul class="discover-track" id="<?php echo esc_attr( 'discover-' . $andescon_group_key ); ?>">
					<?php foreach ( $andescon_group['items'] as $andescon_item ) : ?>
						<li class="discover-card">
							<figure>
								<img src="<?php echo esc_url( andescon_asset( $andescon_item['image'] ) ); ?>" alt="<?php echo esc_attr( $andescon_item['alt'] ); ?>" width="600" height="800" loading="lazy">
								<figcaption>
									<b><?php echo esc_html( $andescon_item['title'] ); ?></b>
									<span><?php echo esc_html( $andescon_item['text'] ); ?></span>
								</figcaption>
							</figure>
							<?php if ( ! empty( $andescon_item['author'] ) ) : ?>
								<small class="discover-credit">
								<?php esc_html_e( 'Photo:', 'andescon-theme' ); ?>
								<a href="<?php echo esc_url( $andescon_item['source'] ); ?>" target="_blank" rel="noopener"><?php echo esc_html( $andescon_item['author'] ); ?></a>,
								<?php echo esc_html( $andescon_item['license'] ); ?>
								</small>
							<?php endif; ?>
						</li>
					<?php endforeach; ?>
				</ul>
			</div>
		<?php endforeach; ?>
	</div>
</section>
