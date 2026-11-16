<?php
/**
 * Every <dialog> used by the page, rendered server-side.
 *
 * One dialog per content key plus one per research track, so the markup and
 * the copy never live in JavaScript.
 *
 * @package Andescon_Theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$andescon_dialogs = andescon_dialogs();

foreach ( andescon_tracks() as $andescon_i => $andescon_track ) :
	$andescon_key = 'track-' . ( $andescon_i + 1 );
	?>
	<dialog id="dialog-<?php echo esc_attr( $andescon_key ); ?>" class="info-dialog" aria-labelledby="dialog-title-<?php echo esc_attr( $andescon_key ); ?>">
		<button type="button" class="dialog-close" aria-label="<?php esc_attr_e( 'Close dialog', 'andescon-theme' ); ?>">&times;</button>
		<span class="eyebrow"><?php echo esc_html( sprintf( 'RESEARCH TRACK %s', andescon_index( $andescon_i ) ) ); ?></span>
		<h2 id="dialog-title-<?php echo esc_attr( $andescon_key ); ?>"><?php echo esc_html( $andescon_track['title'] ); ?></h2>
		<div class="dialog-body">
			<p><?php echo esc_html( $andescon_track['summary'] ); ?></p>
			<p><?php echo esc_html( $andescon_track['topics'] ); ?></p>
			<p class="caption"><?php esc_html_e( 'Illustrative scope. Final topics and track chairs will be confirmed in the official Call for Papers.', 'andescon-theme' ); ?></p>
			<a class="text-link dialog-link" href="<?php echo esc_url( andescon_url( 'authors#submission' ) ); ?>">
				<?php esc_html_e( 'Explore author information', 'andescon-theme' ); ?>
			</a>
		</div>
		<button type="button" class="button dialog-done">
			<?php esc_html_e( 'Got it', 'andescon-theme' ); ?>
			<span aria-hidden="true">&check;</span>
		</button>
	</dialog>
<?php endforeach; ?>

<?php foreach ( $andescon_dialogs as $andescon_key => $andescon_dialog ) : ?>
	<dialog id="dialog-<?php echo esc_attr( $andescon_key ); ?>" class="info-dialog" aria-labelledby="dialog-title-<?php echo esc_attr( $andescon_key ); ?>">
		<button type="button" class="dialog-close" aria-label="<?php esc_attr_e( 'Close dialog', 'andescon-theme' ); ?>">&times;</button>
		<span class="eyebrow"><?php echo esc_html( $andescon_dialog['label'] ); ?></span>
		<h2 id="dialog-title-<?php echo esc_attr( $andescon_key ); ?>"><?php echo esc_html( $andescon_dialog['title'] ); ?></h2>
		<div class="dialog-body"><?php echo wp_kses_post( $andescon_dialog['body'] ); ?></div>
		<button type="button" class="button dialog-done">
			<?php esc_html_e( 'Got it', 'andescon-theme' ); ?>
			<span aria-hidden="true">&check;</span>
		</button>
	</dialog>
<?php endforeach; ?>
