<?php
/**
 * Fallback template for any request that is not the front page.
 *
 * The theme is a one-page site, so this only exists to keep WordPress
 * happy on archives, search results and 404s.
 *
 * @package Andescon_Theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();
?>
<main id="main" class="section wrap">
	<?php if ( have_posts() ) : ?>
		<?php
		while ( have_posts() ) :
			the_post();
			?>
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
				<div class="entry-content"><?php the_excerpt(); ?></div>
			</article>
		<?php endwhile; ?>

		<?php the_posts_pagination(); ?>
	<?php else : ?>
		<p><?php esc_html_e( 'Nothing found here. Head back to the conference home page.', 'andescon-theme' ); ?></p>
		<a class="button" href="<?php echo esc_url( home_url( '/' ) ); ?>">
			<?php esc_html_e( 'Back to the conference', 'andescon-theme' ); ?>
		</a>
	<?php endif; ?>
</main>
<?php
get_footer();
