<?php
/**
 * Contact section and site footer.
 *
 * @package Andescon_Theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<section id="contact" class="contact">
	<div class="wrap">
		<span class="eyebrow light"><?php esc_html_e( 'LET’S START A CONVERSATION', 'andescon-theme' ); ?></span>

		<div class="contact-grid">
			<h2>
				<?php esc_html_e( 'Have a question?', 'andescon-theme' ); ?><br>
				<em><?php esc_html_e( 'Let’s connect.', 'andescon-theme' ); ?></em>
			</h2>
			<div>
				<p><?php esc_html_e( 'For author enquiries, partnerships or planning your visit, reach out to the organizing team.', 'andescon-theme' ); ?></p>
				<button type="button" class="button cream" data-dialog="contact">
					<?php esc_html_e( 'Contact the committee', 'andescon-theme' ); ?>
					<?php andescon_arrow(); ?>
				</button>
			</div>
		</div>

		<div class="footer">
			<strong>
				<?php esc_html_e( 'IEEE ANDESCON', 'andescon-theme' ); ?>
				<span><?php esc_html_e( '2027 · CALI', 'andescon-theme' ); ?></span>
			</strong>
			<div>
				<a href="<?php echo esc_url( andescon_anchor( 'authors' ) ); ?>"><?php esc_html_e( 'For authors', 'andescon-theme' ); ?></a>
				<a href="<?php echo esc_url( andescon_anchor( 'travel' ) ); ?>"><?php esc_html_e( 'Visit Cali', 'andescon-theme' ); ?></a>
				<button type="button" data-dialog="credits"><?php esc_html_e( 'Image credits', 'andescon-theme' ); ?></button>
				<a href="<?php echo esc_url( andescon_anchor( 'main' ) ); ?>"><?php esc_html_e( 'Back to top', 'andescon-theme' ); ?> &uarr;</a>
			</div>
		</div>

		<div class="footer-note"><?php esc_html_e( 'Design prototype · All unconfirmed program, committee, registration and venue information is illustrative.', 'andescon-theme' ); ?></div>
	</div>
</section>
