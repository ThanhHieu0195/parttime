<?php
/**
 * Template Name: Shortcode
 * This is the template displayed content with border top wave
 * @package WordPress
 * @subpackage Solala
 * @since 1.0
 */

get_header();
?>
<div class="slz-main-content padding-top-100 padding-bottom-100 slz-page-shortcode">
	<!-- slider -->
	<div class="container">

		<?php
			get_template_part( 'default-templates/page' );
		?>
		<?php slz_theme_nav_menu( 'feature-nav' ); ?>
	</div>

</div>

<?php get_footer(); ?>
