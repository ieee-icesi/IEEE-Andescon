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
				<h2><?php esc_html_e( 'Organizing committee', 'andescon-theme' ); ?></h2>
			</div>
			<p><?php esc_html_e( 'Committee members will be announced soon.', 'andescon-theme' ); ?></p>
		</div>

		<div class="committee-grid">
			<?php foreach ( andescon_committee() as $andescon_i => $andescon_group ) : ?>
				<article>
					<h3><?php echo esc_html( $andescon_group['title'] ); ?></h3>
					<p><?php echo esc_html( $andescon_group['text'] ); ?></p>
				</article>
			<?php endforeach; ?>
		</div>
	</div>
</section>
