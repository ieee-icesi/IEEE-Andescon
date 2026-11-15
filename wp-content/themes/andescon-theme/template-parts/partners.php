<?php
/**
 * Partners.
 *
 * @package Andescon_Theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<section id="partners" class="partners wrap">
	<span class="eyebrow"><?php esc_html_e( '09 / PARTNERS IN POSSIBILITY', 'andescon-theme' ); ?></span>
	<h2><?php esc_html_e( 'Greater impact.', 'andescon-theme' ); ?> <em><?php esc_html_e( 'Together.', 'andescon-theme' ); ?></em></h2>
	<p><?php esc_html_e( 'A space for the institutions and organizations supporting the next chapter of engineering.', 'andescon-theme' ); ?></p>

	<div class="partner-slots">
		<?php foreach ( andescon_partners() as $andescon_partner ) : ?>
			<span>
				<?php echo esc_html( $andescon_partner['label'] ); ?>
				<small><?php echo esc_html( $andescon_partner['note'] ); ?></small>
			</span>
		<?php endforeach; ?>
	</div>

	<button type="button" class="text-link" data-dialog="partner">
		<?php esc_html_e( 'Become a conference partner', 'andescon-theme' ); ?>
		<?php andescon_arrow(); ?>
	</button>
</section>
