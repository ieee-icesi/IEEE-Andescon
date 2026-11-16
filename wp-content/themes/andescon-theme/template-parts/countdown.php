<?php
/**
 * Countdown to the conference with an "Add to calendar" menu.
 *
 * Numbers are rendered here; main.js only keeps them ticking.
 *
 * @package Andescon_Theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$andescon_left  = andescon_time_left();
$andescon_units = array(
	'days'    => __( 'Days', 'andescon-theme' ),
	'hours'   => __( 'Hours', 'andescon-theme' ),
	'minutes' => __( 'Minutes', 'andescon-theme' ),
	'seconds' => __( 'Seconds', 'andescon-theme' ),
);
?>
<div class="countdown-band">
	<div class="countdown">
		<div class="countdown-title">
			<span class="countdown-eyebrow"><?php esc_html_e( 'JOIN US IN COLOMBIA', 'andescon-theme' ); ?></span>
			<h2><?php esc_html_e( 'Countdown to ANDESCON 2027', 'andescon-theme' ); ?></h2>
		</div>

		<div class="countdown-clock" data-countdown="<?php echo esc_attr( andescon_event()['starts_at'] ); ?>" role="timer" aria-label="<?php esc_attr_e( 'Time left until ANDESCON 2027', 'andescon-theme' ); ?>">
			<?php foreach ( $andescon_units as $andescon_unit => $andescon_label ) : ?>
				<div>
					<b data-unit="<?php echo esc_attr( $andescon_unit ); ?>"><?php echo esc_html( 'days' === $andescon_unit ? (string) $andescon_left[ $andescon_unit ] : str_pad( (string) $andescon_left[ $andescon_unit ], 2, '0', STR_PAD_LEFT ) ); ?></b>
					<span><?php echo esc_html( $andescon_label ); ?></span>
				</div>
			<?php endforeach; ?>
		</div>

		<details class="add-calendar">
			<summary class="button cream">
				<i class="fa-regular fa-calendar" aria-hidden="true"></i>
				<?php esc_html_e( 'Add to calendar', 'andescon-theme' ); ?>
				<i class="fa-solid fa-chevron-down" aria-hidden="true"></i>
			</summary>
			<div class="add-calendar-menu">
				<?php foreach ( andescon_calendar_links() as $andescon_link ) : ?>
					<a href="<?php echo esc_url( $andescon_link['url'] ); ?>" <?php echo $andescon_link['download'] ? 'download="andescon-2027.ics"' : 'target="_blank" rel="noopener"'; ?>>
						<i class="<?php echo esc_attr( $andescon_link['icon'] ); ?>" aria-hidden="true"></i>
						<?php echo esc_html( $andescon_link['label'] ); ?>
					</a>
				<?php endforeach; ?>
			</div>
		</details>
	</div>
</div>
