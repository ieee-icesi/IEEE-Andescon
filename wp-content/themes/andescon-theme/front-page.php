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
	get_template_part( 'template-parts/tracks' );
	get_template_part( 'template-parts/authors' );
	get_template_part( 'template-parts/program' );
	get_template_part( 'template-parts/city' );
	get_template_part( 'template-parts/registration' );
	get_template_part( 'template-parts/committee' );
	get_template_part( 'template-parts/travel' );
	get_template_part( 'template-parts/partners' );
	get_template_part( 'template-parts/contact' );
	?>
</main>
<?php
get_footer();
