<?php
/**
 * Header band for inner pages.
 *
 * @package Andescon_Theme
 *
 * @var array{title: string, intro: string} $args
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<section class="page-hero">
	<div class="wrap">
		<nav class="breadcrumb" aria-label="<?php esc_attr_e( 'Breadcrumb', 'andescon-theme' ); ?>">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'ANDESCON 2027', 'andescon-theme' ); ?></a>
			<i class="fa-solid fa-chevron-right" aria-hidden="true"></i>
			<span aria-current="page"><?php echo esc_html( $args['title'] ); ?></span>
		</nav>
		<h1><?php echo esc_html( $args['title'] ); ?></h1>
		<?php if ( ! empty( $args['intro'] ) ) : ?>
			<p><?php echo esc_html( $args['intro'] ); ?></p>
		<?php endif; ?>
	</div>
</section>
