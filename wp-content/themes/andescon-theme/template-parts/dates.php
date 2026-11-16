<?php
/**
 * Important dates as a timeline: a pin with the milestone above a row of
 * chevrons carrying the dates. The next upcoming milestone is highlighted.
 * Shown on the front page and inside the call for papers.
 *
 * @package Andescon_Theme
 *
 * @var array{link?: bool} $args Pass link => true to add a call-for-papers link.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$andescon_today     = wp_date( 'Y-m-d' );
$andescon_next_seen = false;
?>
<div class="wrap dates" id="dates">
	<div class="dates-heading">
		<h3><?php esc_html_e( 'Important dates', 'andescon-theme' ); ?></h3>
		<?php if ( ! empty( $args['link'] ) ) : ?>
			<a class="text-link" href="<?php echo esc_url( andescon_url( 'authors' ) ); ?>">
				<?php esc_html_e( 'Read the call for papers', 'andescon-theme' ); ?>
			</a>
		<?php endif; ?>
	</div>

	<ol class="timeline">
		<?php foreach ( andescon_milestones() as $andescon_i => $andescon_milestone ) : ?>
			<?php
			$andescon_state = '';
			if ( $andescon_milestone['date'] < $andescon_today ) {
				$andescon_state = ' is-past';
			} elseif ( ! $andescon_next_seen ) {
				$andescon_state     = ' is-next';
				$andescon_next_seen = true;
			}
			?>
			<li class="tl-item tl-<?php echo esc_attr( (string) ( $andescon_i + 1 ) . $andescon_state ); ?>">
				<div class="tl-pin">
					<span class="tl-dot" aria-hidden="true"></span>
					<div class="tl-body">
						<?php if ( ' is-next' === $andescon_state ) : ?>
							<span class="tl-badge"><?php esc_html_e( 'Next deadline', 'andescon-theme' ); ?></span>
						<?php endif; ?>
						<span class="tl-label"><?php echo esc_html( $andescon_milestone['label'] ); ?></span>
						<h4><?php echo esc_html( $andescon_milestone['title'] ); ?></h4>
						<p><?php echo esc_html( $andescon_milestone['text'] ); ?></p>
					</div>
				</div>
				<time class="tl-date" datetime="<?php echo esc_attr( $andescon_milestone['date'] ); ?>"><?php echo esc_html( $andescon_milestone['short'] ); ?></time>
			</li>
		<?php endforeach; ?>
	</ol>
</div>
