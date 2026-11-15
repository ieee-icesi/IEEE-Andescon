<?php
/**
 * Hero section.
 *
 * @package Andescon_Theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<section class="hero wrap">
	<div class="hero-meta">
		<span class="eyebrow"><i></i><?php esc_html_e( 'IEEE ANDESCON 2027', 'andescon-theme' ); ?></span>
		<span>
			<?php esc_html_e( 'CALI, COLOMBIA', 'andescon-theme' ); ?>
			<span class="flag" aria-label="<?php esc_attr_e( 'Colombia', 'andescon-theme' ); ?>"></span>
		</span>
	</div>

	<div class="hero-grid">
		<div class="hero-copy">
			<h1>
				<?php esc_html_e( 'Engineering', 'andescon-theme' ); ?><br>
				<?php esc_html_e( 'a', 'andescon-theme' ); ?> <em><?php esc_html_e( 'connected', 'andescon-theme' ); ?></em><br>
				<?php esc_html_e( 'future.', 'andescon-theme' ); ?>
			</h1>

			<p>
				<?php esc_html_e( 'Where research meets possibility.', 'andescon-theme' ); ?><br>
				<?php esc_html_e( 'Join the conversation shaping technology,', 'andescon-theme' ); ?><br>
				<?php esc_html_e( 'industry and society in the Andean region.', 'andescon-theme' ); ?>
			</p>

			<div class="actions">
				<a class="button" href="<?php echo esc_url( andescon_anchor( 'authors' ) ); ?>">
					<?php esc_html_e( 'Explore the call for papers', 'andescon-theme' ); ?>
					<?php andescon_arrow(); ?>
				</a>
				<a class="text-link" href="<?php echo esc_url( andescon_anchor( 'tracks' ) ); ?>">
					<?php esc_html_e( 'Discover the tracks', 'andescon-theme' ); ?>
					<span aria-hidden="true">&darr;</span>
				</a>
			</div>
		</div>

		<div class="hero-art">
			<span class="art-note"><?php esc_html_e( 'A CITY OF CONNECTIONS.', 'andescon-theme' ); ?></span>
			<img
				src="<?php echo esc_url( andescon_asset( 'img/cali-illustration.webp' ) ); ?>"
				alt="<?php esc_attr_e( 'Cali illustrated through La Ermita, Puente Ortiz, engineering, an orchid, a tanager and salsa dancers', 'andescon-theme' ); ?>"
				width="1520" height="633" fetchpriority="high">
			<div class="art-caption">
				<span><?php esc_html_e( 'SCIENCE. CULTURE. BIODIVERSITY.', 'andescon-theme' ); ?></span>
				<span><?php esc_html_e( '03°27′ N · 76°32′ W', 'andescon-theme' ); ?></span>
			</div>
		</div>
	</div>

	<div class="hero-bottom">
		<div>
			<small><?php esc_html_e( 'SAVE THE DATE', 'andescon-theme' ); ?></small>
			<strong><?php esc_html_e( 'June 9–11, 2027', 'andescon-theme' ); ?></strong>
		</div>
		<div>
			<small><?php esc_html_e( 'THE HOST CITY', 'andescon-theme' ); ?></small>
			<strong><?php esc_html_e( 'Santiago de Cali, Colombia', 'andescon-theme' ); ?></strong>
		</div>
		<a href="<?php echo esc_url( andescon_anchor( 'dates' ) ); ?>">
			<?php esc_html_e( 'Explore important dates', 'andescon-theme' ); ?>
			<?php andescon_arrow(); ?>
		</a>
	</div>
</section>
