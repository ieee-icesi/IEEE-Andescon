<?php
/**
 * Page not found.
 *
 * @package Andescon_Theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();
?>
<main id="main">
	<section class="not-found wrap">
		<img class="not-found-art" src="<?php echo esc_url( andescon_asset( 'img/map-walker.webp' ) ); ?>" alt="" width="460" height="520">
		<div class="not-found-copy">
			<span class="eyebrow"><?php esc_html_e( 'Error 404', 'andescon-theme' ); ?></span>
			<h1><?php esc_html_e( 'Looks like you got lost in Cali', 'andescon-theme' ); ?></h1>
			<p><?php esc_html_e( 'The page you are looking for does not exist or has moved. Here is the way back.', 'andescon-theme' ); ?></p>
			<div class="not-found-actions">
				<a class="button" href="<?php echo esc_url( andescon_url( '/' ) ); ?>"><?php esc_html_e( 'Back to home', 'andescon-theme' ); ?></a>
				<a class="button cream" href="<?php echo esc_url( andescon_url( 'authors' ) ); ?>"><?php esc_html_e( 'Call for papers', 'andescon-theme' ); ?></a>
			</div>
		</div>
	</section>
</main>
<?php
get_footer();
