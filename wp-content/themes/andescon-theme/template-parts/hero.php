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
<section class="hero">
	<div class="hero-banner">
		<h1 class="sr-only"><?php esc_html_e( 'IEEE ANDESCON 2027 — Call for papers. June 9–11, 2027, Cali, Colombia.', 'andescon-theme' ); ?></h1>
		<img
			src="<?php echo esc_url( andescon_asset( 'img/banner.webp' ) ); ?>"
			srcset="<?php echo esc_url( andescon_asset( 'img/banner-1200.webp' ) ); ?> 1200w, <?php echo esc_url( andescon_asset( 'img/banner.webp' ) ); ?> 2400w"
			sizes="100vw"
			alt="<?php esc_attr_e( 'IEEE ANDESCON 2027 Call for papers, June 9–11, 2027, over a view of Cali, Colombia', 'andescon-theme' ); ?>"
			width="2400" height="805" fetchpriority="high">
	</div>

	<?php get_template_part( 'template-parts/countdown' ); ?>

</section>
