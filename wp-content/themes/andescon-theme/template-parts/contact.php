<?php
/**
 * Contact section and site footer.
 *
 * @package Andescon_Theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$andescon_organizer = andescon_organizer();
?>
<div class="footer-skyline" aria-hidden="true">
	<img src="<?php echo esc_url( andescon_asset( 'img/andescon-cali-footer.svg' ) ); ?>" alt="" width="2400" height="420" loading="lazy">
</div>
<section id="contact" class="contact">
	<div class="wrap">
		<div class="contact-grid">
			<div class="footer-col">
				<h2><?php esc_html_e( 'Contact', 'andescon-theme' ); ?></h2>
				<p><?php esc_html_e( 'For author enquiries, partnerships or planning your visit, write to the organizing team.', 'andescon-theme' ); ?></p>
				<a class="contact-email" href="<?php echo esc_url( 'mailto:' . $andescon_organizer['email'] ); ?>">
					<i class="fa-regular fa-envelope" aria-hidden="true"></i>
					<?php echo esc_html( $andescon_organizer['email'] ); ?>
				</a>
				<a class="contact-social" href="<?php echo esc_url( $andescon_organizer['facebook'] ); ?>" target="_blank" rel="noopener">
					<i class="fa-brands fa-facebook" aria-hidden="true"></i>
					<?php esc_html_e( 'IEEE ANDESCON on Facebook', 'andescon-theme' ); ?>
					<span class="sr-only"><?php esc_html_e( '(opens in a new tab)', 'andescon-theme' ); ?></span>
				</a>
			</div>

			<div class="footer-col footer-partners" id="partners">
				<h2><?php esc_html_e( 'Sponsors & partners', 'andescon-theme' ); ?></h2>
				<?php foreach ( andescon_footer_logos() as $andescon_group ) : ?>
					<div class="organizer">
						<span><?php echo esc_html( $andescon_group['label'] ); ?></span>
						<ul class="logo-row">
							<?php foreach ( $andescon_group['logos'] as $andescon_logo ) : ?>
								<li><img src="<?php echo esc_url( andescon_asset( $andescon_logo['image'] ) ); ?>" alt="<?php echo esc_attr( $andescon_logo['name'] ); ?>" width="<?php echo (int) $andescon_logo['width']; ?>" height="<?php echo (int) $andescon_logo['height']; ?>" loading="lazy"></li>
							<?php endforeach; ?>
						</ul>
					</div>
				<?php endforeach; ?>
			</div>
		</div>

		<p class="copyright">
			&copy; <?php esc_html_e( 'Copyright 2026 IEEE Icesi Student Branch Web Master', 'andescon-theme' ); ?>
		</p>

	</div>
</section>
