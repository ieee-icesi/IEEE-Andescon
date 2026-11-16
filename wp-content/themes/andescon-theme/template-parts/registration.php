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
			<h2><?php esc_html_e( 'Registration', 'andescon-theme' ); ?></h2>
		</div>
		<p><?php esc_html_e( 'Registration fees and the registration form will be published here.', 'andescon-theme' ); ?></p>
	</div>

	<div class="registration-grid">
		<?php foreach ( andescon_registration_tiers() as $andescon_tier ) : ?>
			<article<?php echo $andescon_tier['featured'] ? ' class="featured"' : ''; ?>>
				<h3><?php echo esc_html( $andescon_tier['title'] ); ?></h3>
				<p><?php echo esc_html( $andescon_tier['text'] ); ?></p>
				<div class="price"><?php echo esc_html( $andescon_tier['price'] ); ?></div>
				<button
					type="button"
					class="<?php echo $andescon_tier['featured'] ? 'button' : 'text-link'; ?>"
					data-dialog="registration">
					<?php echo esc_html( $andescon_tier['action'] ); ?>
				</button>
			</article>
		<?php endforeach; ?>
	</div>
</section>
