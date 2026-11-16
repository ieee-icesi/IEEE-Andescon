<?php
/**
 * Intro section: positioning statement and key numbers.
 *
 * @package Andescon_Theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$andescon_numbers = array(
	array( 'value' => '09', 'label' => __( 'Research tracks', 'andescon-theme' ) ),
	array( 'value' => '03', 'label' => __( 'Conference days', 'andescon-theme' ) ),
	array( 'value' => 'XIII', 'label' => __( 'Edition', 'andescon-theme' ) ),
);
?>
<section class="intro-section">
	<div class="wrap intro-grid">
		<div>
			<h2><?php esc_html_e( 'About ANDESCON', 'andescon-theme' ); ?></h2>
			<dl class="intro-meta">
				<div>
					<dt><?php esc_html_e( 'SAVE THE DATE', 'andescon-theme' ); ?></dt>
					<dd><?php esc_html_e( 'June 9–11, 2027', 'andescon-theme' ); ?></dd>
				</div>
				<div>
					<dt><?php esc_html_e( 'THE HOST CITY', 'andescon-theme' ); ?></dt>
					<dd><?php esc_html_e( 'Santiago de Cali, Colombia', 'andescon-theme' ); ?></dd>
				</div>
			</dl>
			<a class="button cream" href="<?php echo esc_url( andescon_url( 'authors' ) ); ?>">
				<?php esc_html_e( 'Explore the call for papers', 'andescon-theme' ); ?>
			</a>
		</div>
		<div>
			<p><?php esc_html_e( 'ANDESCON is the biennial technical and scientific conference of the IEEE Andean Council, bringing together IEEE professionals and scientists from the Andean countries.', 'andescon-theme' ); ?></p>
			<p><?php esc_html_e( 'It is an opportunity for professional members, academics, researchers and industry to meet and present the developments and technological advances that move the Andean region forward.', 'andescon-theme' ); ?></p>
			<p class="muted"><?php esc_html_e( 'The thirteenth edition of this IEEE event will be held in Santiago de Cali, Colombia.', 'andescon-theme' ); ?></p>
			<a class="text-link light" href="<?php echo esc_url( andescon_url( 'authors#tracks' ) ); ?>">
				<?php esc_html_e( 'Find your field of research', 'andescon-theme' ); ?>
			</a>
		</div>
	</div>

	<div class="wrap intro-numbers">
		<?php foreach ( $andescon_numbers as $andescon_number ) : ?>
			<div>
				<b><?php echo esc_html( $andescon_number['value'] ); ?></b>
				<span><?php echo esc_html( $andescon_number['label'] ); ?></span>
			</div>
		<?php endforeach; ?>
	</div>
</section>
