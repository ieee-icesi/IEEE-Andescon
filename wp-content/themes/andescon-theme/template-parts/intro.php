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
	array( 'value' => '03', 'label' => __( 'Days of exchange', 'andescon-theme' ) ),
	array( 'value' => '01', 'label' => __( 'Connected community', 'andescon-theme' ) ),
);
?>
<section class="intro-section">
	<div class="wrap intro-grid">
		<div>
			<span class="eyebrow light"><?php esc_html_e( '01 / THE CONVERSATION', 'andescon-theme' ); ?></span>
			<h2>
				<?php esc_html_e( 'Ideas cross borders.', 'andescon-theme' ); ?><br>
				<em><?php esc_html_e( 'Impact connects us.', 'andescon-theme' ); ?></em>
			</h2>
		</div>
		<div>
			<p><?php esc_html_e( 'ANDESCON brings engineering disciplines into a shared conversation. A place for researchers, practitioners and students to exchange ideas and explore technology in the context of our region.', 'andescon-theme' ); ?></p>
			<p class="muted"><?php esc_html_e( 'From intelligent systems to sustainable energy, discover the intersections that move research forward.', 'andescon-theme' ); ?></p>
			<a class="text-link light" href="<?php echo esc_url( andescon_anchor( 'tracks' ) ); ?>">
				<?php esc_html_e( 'Find your field of research', 'andescon-theme' ); ?>
				<?php andescon_arrow(); ?>
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
