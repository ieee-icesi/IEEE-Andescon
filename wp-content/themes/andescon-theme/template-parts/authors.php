<?php
/**
 * Call for papers: pitch, author journey and submission milestones.
 *
 * @package Andescon_Theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<section id="authors" class="authors section">
	<div class="wrap author-grid">
		<div>
			<h2><?php esc_html_e( 'Call for papers', 'andescon-theme' ); ?></h2>
			<p><?php esc_html_e( 'Authors are invited to submit original research in any of the nine conference tracks. Full papers are due February 16, 2027.', 'andescon-theme' ); ?></p>
			<a class="button" href="<?php echo esc_url( '#submission' ); ?>">
				<?php esc_html_e( 'Prepare your submission', 'andescon-theme' ); ?>
			</a>

			<div class="paper-templates" id="templates">
				<h3><?php esc_html_e( 'Paper templates', 'andescon-theme' ); ?></h3>
				<p><?php esc_html_e( 'Prepare your manuscript with the official ANDESCON 2027 template.', 'andescon-theme' ); ?></p>
				<ul>
					<?php foreach ( andescon_paper_templates() as $andescon_template ) : ?>
						<?php
						$andescon_href = '';
						if ( ! empty( $andescon_template['file'] ) && file_exists( ANDESCON_THEME_DIR . '/assets/' . $andescon_template['file'] ) ) {
							$andescon_href = andescon_asset( $andescon_template['file'] );
						} elseif ( ! empty( $andescon_template['url'] ) ) {
							$andescon_href = $andescon_template['url'];
						}
						?>
						<li class="<?php echo $andescon_href ? 'is-ready' : 'is-pending'; ?>">
							<i class="<?php echo esc_attr( $andescon_template['icon'] ); ?>" aria-hidden="true"></i>
							<div>
								<b><?php echo esc_html( $andescon_template['title'] ); ?></b>
								<span><?php echo esc_html( $andescon_template['format'] ); ?></span>
							</div>
							<?php if ( $andescon_href ) : ?>
								<a href="<?php echo esc_url( $andescon_href ); ?>"<?php echo empty( $andescon_template['file'] ) ? ' target="_blank" rel="noopener"' : ' download'; ?>>
									<?php echo empty( $andescon_template['file'] ) ? esc_html__( 'Open', 'andescon-theme' ) : esc_html__( 'Download', 'andescon-theme' ); ?>
									<span class="sr-only"><?php echo esc_html( $andescon_template['title'] ); ?></span>
								</a>
							<?php else : ?>
								<em><?php esc_html_e( 'Coming soon', 'andescon-theme' ); ?></em>
							<?php endif; ?>
						</li>
					<?php endforeach; ?>
				</ul>
			</div>
		</div>

		<div class="author-guide" id="submission">
			<span class="eyebrow"><?php esc_html_e( 'HOW TO SUBMIT', 'andescon-theme' ); ?></span>

			<?php foreach ( andescon_author_steps() as $andescon_i => $andescon_step ) : ?>
				<details<?php echo $andescon_step['open'] ? ' open' : ''; ?>>
					<summary>
						<span><?php echo esc_html( andescon_index( $andescon_i ) ); ?></span>
						<?php echo esc_html( $andescon_step['title'] ); ?> <b aria-hidden="true">+</b>
					</summary>
					<p><?php echo esc_html( $andescon_step['text'] ); ?></p>

					<?php if ( $andescon_step['dialog'] ) : ?>
						<button type="button" class="text-link" data-dialog="<?php echo esc_attr( $andescon_step['dialog'] ); ?>">
							<?php esc_html_e( 'Submission information', 'andescon-theme' ); ?>
						</button>
					<?php endif; ?>
				</details>
			<?php endforeach; ?>
		</div>
	</div>

	<?php get_template_part( 'template-parts/dates' ); ?>
</section>
