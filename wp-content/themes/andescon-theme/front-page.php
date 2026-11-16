<?php
/**
 * Front page: assembles the landing page sections.
 *
 * @package Andescon_Theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();
?>
<main id="main">
	<?php
	get_template_part( 'template-parts/hero' );
	get_template_part( 'template-parts/intro' );
	?>
	<section class="home-dates">
		<?php get_template_part( 'template-parts/dates', null, array( 'link' => true ) ); ?>
	</section>
	<?php
	get_template_part( 'template-parts/city' );
	?>
</main>
<?php
get_footer();
