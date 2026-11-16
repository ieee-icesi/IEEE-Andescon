<?php
/**
 * Pages. Slugs listed in andescon_pages() render their template parts under
 * a page header; any other page shows its editor content.
 *
 * @package Andescon_Theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$andescon_pages = andescon_pages();
$andescon_slug  = (string) get_post_field( 'post_name', get_queried_object_id() );
$andescon_page  = $andescon_pages[ $andescon_slug ] ?? null;

get_header();
?>
<main id="main">
	<?php if ( $andescon_page ) : ?>
		<?php
		get_template_part( 'template-parts/page-hero', null, $andescon_page );

		foreach ( $andescon_page['parts'] as $andescon_part ) {
			get_template_part( 'template-parts/' . $andescon_part );
		}
		?>
	<?php else : ?>
		<?php
		while ( have_posts() ) :
			the_post();
			get_template_part( 'template-parts/page-hero', null, array( 'title' => get_the_title(), 'intro' => '' ) );
			?>
			<div class="section wrap entry-content"><?php the_content(); ?></div>
		<?php endwhile; ?>
	<?php endif; ?>
</main>
<?php
get_footer();
