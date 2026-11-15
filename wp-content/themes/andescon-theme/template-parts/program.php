<?php
/**
 * Program: day tabs and their session panels.
 *
 * All three days are rendered server-side; JavaScript only toggles which
 * panel is visible and keeps the ARIA state in sync.
 *
 * @package Andescon_Theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$andescon_agenda = andescon_agenda();
?>
<section id="program" class="section wrap">
	<div class="section-head">
		<div>
			<span class="eyebrow"><?php esc_html_e( '04 / THE EXPERIENCE', 'andescon-theme' ); ?></span>
			<h2>
				<?php esc_html_e( 'Three days.', 'andescon-theme' ); ?><br>
				<em><?php esc_html_e( 'A wider perspective.', 'andescon-theme' ); ?></em>
			</h2>
		</div>
		<p>
			<?php esc_html_e( 'A rhythm of discovery, discussion and connection.', 'andescon-theme' ); ?><br>
			<span class="caption"><?php esc_html_e( 'Illustrative program · sessions and times are placeholders.', 'andescon-theme' ); ?></span>
		</p>
	</div>

	<div class="program-layout">
		<div class="day-tabs" role="tablist" aria-label="<?php esc_attr_e( 'Conference days', 'andescon-theme' ); ?>">
			<?php foreach ( $andescon_agenda as $andescon_i => $andescon_day ) : ?>
				<button
					type="button"
					role="tab"
					id="day<?php echo esc_attr( (string) $andescon_i ); ?>"
					aria-selected="<?php echo 0 === $andescon_i ? 'true' : 'false'; ?>"
					aria-controls="schedule-<?php echo esc_attr( (string) $andescon_i ); ?>"
					tabindex="<?php echo 0 === $andescon_i ? '0' : '-1'; ?>"
					data-day="<?php echo esc_attr( (string) $andescon_i ); ?>">
					<span><?php echo esc_html( $andescon_day['label'] ); ?></span>
					<b><?php echo esc_html( $andescon_day['title'] ); ?></b>
					<i aria-hidden="true">&#8599;</i>
				</button>
			<?php endforeach; ?>
		</div>

		<div class="day-panels">
			<?php foreach ( $andescon_agenda as $andescon_i => $andescon_day ) : ?>
				<div
					role="tabpanel"
					id="schedule-<?php echo esc_attr( (string) $andescon_i ); ?>"
					aria-labelledby="day<?php echo esc_attr( (string) $andescon_i ); ?>"
					tabindex="0"<?php echo 0 === $andescon_i ? '' : ' hidden'; ?>>
					<?php foreach ( $andescon_day['sessions'] as $andescon_session ) : ?>
						<article class="session">
							<time><?php echo esc_html( $andescon_session['time'] ); ?></time>
							<div>
								<small><?php echo esc_html( $andescon_session['type'] ); ?> &middot; <?php esc_html_e( 'SAMPLE', 'andescon-theme' ); ?></small>
								<h3><?php echo esc_html( $andescon_session['title'] ); ?></h3>
								<p><?php echo esc_html( $andescon_session['text'] ); ?></p>
							</div>
						</article>
					<?php endforeach; ?>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>
