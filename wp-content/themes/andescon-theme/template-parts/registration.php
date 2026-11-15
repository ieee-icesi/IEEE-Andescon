<?php
/**
 * Registration categories.
 *
 * @package Andescon_Theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<section class="section wrap" id="registration">
	<div class="section-head">
		<div>
			<span class="eyebrow"><?php esc_html_e( '06 / JOIN THE COMMUNITY', 'andescon-theme' ); ?></span>
			<h2>
				<?php esc_html_e( 'Make room for', 'andescon-theme' ); ?><br>
				<em><?php esc_html_e( 'what comes next.', 'andescon-theme' ); ?></em>
			</h2>
		</div>
		<p>
			<?php esc_html_e( 'Choose how you will be part of ANDESCON.', 'andescon-theme' ); ?><br>
			<?php esc_html_e( 'Registration categories and fees are pending confirmation.', 'andescon-theme' ); ?>
		</p>
	</div>

	<div class="registration-grid">
		<?php foreach ( andescon_registration_tiers() as $andescon_tier ) : ?>
			<article<?php echo $andescon_tier['featured'] ? ' class="featured"' : ''; ?>>
				<span class="eyebrow"><?php echo esc_html( $andescon_tier['eyebrow'] ); ?></span>
				<h3><?php echo esc_html( $andescon_tier['title'] ); ?></h3>
				<p><?php echo esc_html( $andescon_tier['text'] ); ?></p>
				<div class="price"><?php echo esc_html( $andescon_tier['price'] ); ?></div>
				<button
					type="button"
					class="<?php echo $andescon_tier['featured'] ? 'button' : 'text-link'; ?>"
					data-dialog="registration">
					<?php echo esc_html( $andescon_tier['action'] ); ?>
					<?php andescon_arrow(); ?>
				</button>
			</article>
		<?php endforeach; ?>
	</div>
</section>
