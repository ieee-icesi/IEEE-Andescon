<?php
/**
 * Site header: document head, preview banner and primary navigation.
 *
 * @package Andescon_Theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="<?php echo esc_attr( 'Explore the ANDESCON 2027 Cali conference: engineering, research and Colombian creativity.' ); ?>">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<a class="skip" href="#main"><?php esc_html_e( 'Skip to content', 'andescon-theme' ); ?></a>

<?php if ( andescon_show_preview_banner() ) : ?>
	<div class="prototype">
		<?php esc_html_e( 'DESIGN PREVIEW', 'andescon-theme' ); ?>
		<span><?php esc_html_e( 'Illustrative content · official details to be confirmed', 'andescon-theme' ); ?></span>
		<button type="button" data-dismiss-prototype aria-label="<?php esc_attr_e( 'Dismiss preview notice', 'andescon-theme' ); ?>">&times;</button>
	</div>
<?php endif; ?>

<header>
	<div class="nav-wrap">
		<a class="logo" href="<?php echo esc_url( home_url( '/' ) ); ?>" aria-label="<?php esc_attr_e( 'ANDESCON home', 'andescon-theme' ); ?>">
			<img src="<?php echo esc_url( andescon_asset( 'img/identity.webp' ) ); ?>" alt="IEEE Andescon" width="1152" height="299">
		</a>

		<button type="button" class="menu-toggle" aria-expanded="false" aria-controls="navigation">
			<span class="when-closed"><?php esc_html_e( 'Menu', 'andescon-theme' ); ?></span>
			<span class="when-open"><?php esc_html_e( 'Close', 'andescon-theme' ); ?></span>
			<span class="icon-when-closed" aria-hidden="true">&#9776;</span>
			<span class="icon-when-open" aria-hidden="true">&times;</span>
		</button>

		<nav id="navigation" aria-label="<?php esc_attr_e( 'Main navigation', 'andescon-theme' ); ?>">
			<?php foreach ( andescon_navigation() as $item ) : ?>

				<?php if ( ! empty( $item['children'] ) ) : ?>
					<div class="dropdown">
						<button type="button" aria-expanded="false" aria-controls="authors-menu">
							<?php echo esc_html( $item['label'] ); ?>
							<span class="chevron" aria-hidden="true"></span>
						</button>
						<div class="dropdown-panel" id="authors-menu" hidden>
							<small><?php esc_html_e( 'YOUR RESEARCH STARTS HERE', 'andescon-theme' ); ?></small>
							<?php foreach ( $item['children'] as $child ) : ?>
								<a href="<?php echo esc_url( andescon_anchor( $child['anchor'] ) ); ?>">
									<b><?php echo esc_html( $child['title'] ); ?></b>
									<span><?php echo esc_html( $child['note'] ); ?></span>
								</a>
							<?php endforeach; ?>
						</div>
					</div>
				<?php else : ?>
					<a href="<?php echo esc_url( andescon_anchor( $item['anchor'] ) ); ?>"><?php echo esc_html( $item['label'] ); ?></a>
				<?php endif; ?>

			<?php endforeach; ?>

			<a class="button small" href="<?php echo esc_url( andescon_anchor( 'submission' ) ); ?>">
				<?php esc_html_e( 'Submit a paper', 'andescon-theme' ); ?>
				<?php andescon_arrow(); ?>
			</a>
		</nav>
	</div>
</header>
