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
			<img src="<?php echo esc_url( andescon_asset( 'img/logo.webp' ) ); ?>" alt="IEEE Andescon 2027 Cali" width="1014" height="200">
		</a>

		<button type="button" class="menu-toggle" aria-expanded="false" aria-controls="navigation">
			<span class="when-closed"><?php esc_html_e( 'Menu', 'andescon-theme' ); ?></span>
			<span class="when-open"><?php esc_html_e( 'Close', 'andescon-theme' ); ?></span>
			<span class="icon-when-closed" aria-hidden="true">&#9776;</span>
			<span class="icon-when-open" aria-hidden="true">&times;</span>
		</button>

		<nav id="navigation" aria-label="<?php esc_attr_e( 'Main navigation', 'andescon-theme' ); ?>">
			<?php foreach ( andescon_navigation() as $item ) : ?>

				<?php if ( ! empty( $item['mega'] ) ) : ?>
					<?php
					$mega    = $item['mega'];
					$menu_id = 'menu-' . sanitize_title( $item['label'] );
					?>
					<div class="dropdown<?php echo andescon_is_current( $item['url'] ) ? ' is-current' : ''; ?>">
						<button type="button" aria-expanded="false" aria-controls="<?php echo esc_attr( $menu_id ); ?>">
							<?php echo esc_html( $item['label'] ); ?>
							<span class="chevron" aria-hidden="true"></span>
						</button>
						<div class="mega" id="<?php echo esc_attr( $menu_id ); ?>" hidden>
							<div class="mega-inner">
								<div class="mega-side">
									<ul>
										<?php foreach ( $mega['links'] as $link ) : ?>
											<li>
												<a href="<?php echo esc_url( andescon_url( $link['url'] ) ); ?>">
													<?php echo esc_html( $link['title'] ); ?>
													<i class="fa-solid fa-chevron-right" aria-hidden="true"></i>
												</a>
											</li>
										<?php endforeach; ?>
									</ul>
									<a class="button cream" href="<?php echo esc_url( andescon_url( $mega['cta']['url'] ) ); ?>">
										<?php echo esc_html( $mega['cta']['label'] ); ?>
									</a>
								</div>

								<div class="mega-main">
									<div class="mega-head">
										<h3><?php echo esc_html( $mega['heading'] ); ?></h3>
										<a href="<?php echo esc_url( andescon_url( $item['url'] ) ); ?>">
											<?php
											/* translators: %s: menu section, e.g. "Program". */
											echo esc_html( sprintf( __( 'View all %s', 'andescon-theme' ), $item['label'] ) );
											?>
											<i class="fa-solid fa-angles-right" aria-hidden="true"></i>
										</a>
									</div>
									<div class="mega-cards">
										<?php foreach ( $mega['cards'] as $card ) : ?>
											<a class="mega-card" href="<?php echo esc_url( andescon_url( $card['url'] ) ); ?>">
												<span class="mega-media" aria-hidden="true">
													<?php if ( ! empty( $card['image'] ) ) : ?>
														<img src="<?php echo esc_url( andescon_asset( $card['image'] ) ); ?>" alt="" loading="lazy" width="400" height="160">
													<?php else : ?>
														<i class="<?php echo esc_attr( $card['icon'] ); ?>"></i>
													<?php endif; ?>
												</span>
												<b><?php echo esc_html( $card['title'] ); ?></b>
												<span><?php echo esc_html( $card['text'] ); ?></span>
											</a>
										<?php endforeach; ?>
									</div>
								</div>
							</div>
						</div>
					</div>
				<?php else : ?>
					<a href="<?php echo esc_url( andescon_url( $item['url'] ) ); ?>"<?php echo andescon_is_current( $item['url'] ) ? ' aria-current="page"' : ''; ?>><?php echo esc_html( $item['label'] ); ?></a>
				<?php endif; ?>

			<?php endforeach; ?>

			<a class="button small" href="<?php echo esc_url( andescon_url( 'authors#submission' ) ); ?>">
				<?php esc_html_e( 'Submit a paper', 'andescon-theme' ); ?>
			</a>
		</nav>
	</div>
</header>
