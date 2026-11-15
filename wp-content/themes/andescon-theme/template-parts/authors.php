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
			<span class="eyebrow"><?php esc_html_e( '03 / CALL FOR PAPERS', 'andescon-theme' ); ?></span>
			<h2>
				<?php esc_html_e( 'Your next idea', 'andescon-theme' ); ?><br>
				<?php esc_html_e( 'belongs', 'andescon-theme' ); ?> <em><?php esc_html_e( 'here.', 'andescon-theme' ); ?></em>
			</h2>
			<p><?php esc_html_e( 'Bring your research into a multidisciplinary dialogue. Explore the tracks, prepare your manuscript and share your contribution with the ANDESCON community.', 'andescon-theme' ); ?></p>
			<a class="button" href="<?php echo esc_url( andescon_anchor( 'submission' ) ); ?>">
				<?php esc_html_e( 'Prepare your submission', 'andescon-theme' ); ?>
				<?php andescon_arrow(); ?>
			</a>
			<p class="caption">
				<?php esc_html_e( 'Author requirements shown below are a draft structure.', 'andescon-theme' ); ?><br>
				<?php esc_html_e( 'Final guidelines will be supplied by the organizing committee.', 'andescon-theme' ); ?>
			</p>
		</div>

		<div class="author-guide" id="submission">
			<span class="eyebrow"><?php esc_html_e( 'THE AUTHOR JOURNEY', 'andescon-theme' ); ?></span>

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
							<?php andescon_arrow(); ?>
						</button>
					<?php endif; ?>
				</details>
			<?php endforeach; ?>
		</div>
	</div>

	<div class="wrap dates" id="dates">
		<div class="dates-heading">
			<h3><?php esc_html_e( 'Mark your calendar.', 'andescon-theme' ); ?></h3>
			<span class="caption"><?php esc_html_e( 'Submission milestones · dates to be confirmed', 'andescon-theme' ); ?></span>
		</div>

		<div class="milestones">
			<?php foreach ( andescon_milestones() as $andescon_milestone ) : ?>
				<article>
					<span><?php echo esc_html( $andescon_milestone['label'] ); ?></span>
					<h4><?php echo esc_html( $andescon_milestone['value'] ); ?></h4>
					<p><?php echo esc_html( $andescon_milestone['text'] ); ?></p>
				</article>
			<?php endforeach; ?>
		</div>

		<small class="caption"><?php esc_html_e( '*Date supplied for this design preview; subject to official confirmation.', 'andescon-theme' ); ?></small>
	</div>
</section>
