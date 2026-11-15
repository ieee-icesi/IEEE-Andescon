<?php
/**
 * Organizing committees.
 *
 * @package Andescon_Theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<section id="committee" class="committee section">
	<div class="wrap">
		<div class="section-head">
			<div>
				<span class="eyebrow"><?php esc_html_e( '07 / THE PEOPLE BEHIND IT', 'andescon-theme' ); ?></span>
				<h2>
					<?php esc_html_e( 'Built through', 'andescon-theme' ); ?><br>
					<em><?php esc_html_e( 'collaboration.', 'andescon-theme' ); ?></em>
				</h2>
			</div>
			<p>
				<?php esc_html_e( 'Meet the teams bringing the conference together.', 'andescon-theme' ); ?><br>
				<?php esc_html_e( 'Committee appointments will be added after confirmation.', 'andescon-theme' ); ?>
			</p>
		</div>

		<div class="committee-grid">
			<?php foreach ( andescon_committee() as $andescon_i => $andescon_group ) : ?>
				<article>
					<span aria-hidden="true"><?php echo esc_html( andescon_index( $andescon_i ) ); ?></span>
					<h3><?php echo esc_html( $andescon_group['title'] ); ?></h3>
					<p><?php echo esc_html( $andescon_group['text'] ); ?></p>
					<small><?php echo esc_html( $andescon_group['note'] ); ?></small>
				</article>
			<?php endforeach; ?>
		</div>
	</div>
</section>
