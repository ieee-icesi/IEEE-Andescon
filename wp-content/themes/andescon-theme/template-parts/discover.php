<?php
/**
 * Discover Cali: an illustrated intro, then places and typical food as
 * photo-card carousels. Wikimedia Commons photos carry their attribution
 * as the licenses require.
 *
 * @package Andescon_Theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<section id="discover" class="discover">
	<div class="wrap">
		<div class="discover-intro">
			<figure class="discover-poster">
				<img src="<?php echo esc_url( andescon_asset( 'img/cali-poster.webp' ) ); ?>" alt="<?php esc_attr_e( 'Illustration: a market bag holding Cali — the Cristo Rey, the Gato del Río, a colonial chapel, lulo fruit, maracas and a glass of lulada.', 'andescon-theme' ); ?>" width="800" height="1000" loading="lazy">
			</figure>
			<div class="discover-lead">
				<span class="eyebrow"><?php esc_html_e( 'Culture · Flavor · Rhythm', 'andescon-theme' ); ?></span>
				<h2><?php esc_html_e( 'Discover Cali', 'andescon-theme' ); ?></h2>
				<p class="discover-tagline"><?php esc_html_e( '“Llévate un poquito de Cali” — take a little bit of Cali home with you.', 'andescon-theme' ); ?></p>
				<p><?php esc_html_e( 'Stay a few extra days. Salsa, green hills, rivers and some of the best street food in Colombia are waiting for you.', 'andescon-theme' ); ?></p>
				<ul class="discover-jump">
					<?php foreach ( andescon_discover() as $andescon_group_key => $andescon_group ) : ?>
						<li><a href="<?php echo esc_url( '#discover-' . $andescon_group_key ); ?>"><?php echo esc_html( $andescon_group['title'] ); ?> <i class="fa-solid fa-chevron-down" aria-hidden="true"></i></a></li>
					<?php endforeach; ?>
				</ul>
			</div>
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
