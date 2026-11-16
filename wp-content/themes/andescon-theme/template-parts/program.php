<?php
/**
 * Program: the three conference days. Sessions are added once the
 * technical program is published.
 *
 * @package Andescon_Theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$andescon_days = array(
	array( 'label' => __( 'DAY 1', 'andescon-theme' ), 'date' => __( 'Wednesday, June 9', 'andescon-theme' ) ),
	array( 'label' => __( 'DAY 2', 'andescon-theme' ), 'date' => __( 'Thursday, June 10', 'andescon-theme' ) ),
	array( 'label' => __( 'DAY 3', 'andescon-theme' ), 'date' => __( 'Friday, June 11', 'andescon-theme' ) ),
);
?>
<section id="program" class="section wrap">
	<div class="section-head">
		<div>
			<h2><?php esc_html_e( 'Three days in Cali', 'andescon-theme' ); ?></h2>
		</div>
		<p><?php esc_html_e( 'Keynotes, technical sessions and workshops over three days. The detailed program will be published after the notification of acceptance on March 30, 2027.', 'andescon-theme' ); ?></p>
	</div>

	<div class="milestones program-days">
		<?php foreach ( $andescon_days as $andescon_day ) : ?>
			<article class="program-day">
				<span><?php echo esc_html( $andescon_day['label'] ); ?></span>
				<h4><?php echo esc_html( $andescon_day['date'] ); ?></h4>
				<p><?php esc_html_e( 'Sessions to be announced', 'andescon-theme' ); ?></p>
			</article>
		<?php endforeach; ?>
	</div>
</section>
