<?php
/**
 * The template for displaying the blog detail content
 *
 * @package WordPress
 * @subpackage Solala
 * @since 1.0
 */

get_header(); ?>

<div class="slz-main-content">

	<div class="container padding-top-100 padding-bottom-100">

		<?php
			if( $solala_template = solala_check_post_layout('posts', 'blog-layout')){
				$solala_template->render();
			}
			else
				get_template_part('default-templates/single');

		?>

	</div>

</div>

<?php get_footer(); ?>
