<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * e.g., it puts together the home page when no home.php file exists.
 *
 * Learn more: {@link https://codex.wordpress.org/Template_Hierarchy}
 *
 * @package WordPress
 * @subpackage Solala
 * @since 1.0
 */

$solala_container = solala_get_container_class( 'main-blog-article-style' );

get_header();?>

	<div class="slz-main-content">

		<div class="container">

			<div class="slz-blog-detail slz-block-index <?php echo esc_attr( $solala_container['sidebar_layout_class'] ); ?> margin-top-100 margin-bottom-100">

				<div class="row">

					<div id="page-content" class="<?php echo esc_attr( $solala_container['content_class'] ); ?> slz-posts slz-content-column">

						<?php if ( have_posts() ) : ?>

							<div class="slz-list-block <?php echo esc_attr( $solala_container['block_class'] ); ?>">

								<?php
									if ( $solala_template = solala_check_article_layout('articles', 'main-blog-article-style') ) {
										while ( have_posts() ) : the_post();

											$solala_template->render( $post );

										endwhile;

									}
									else{

										while ( have_posts() ) : the_post();

											get_template_part( 'default-templates/article' );

										endwhile;

									}

								?>

							</div>

							<?php solala_posts_pagination();?>

						<?php

						else :
							get_template_part( 'default-templates/no-content' );

						endif;
						?>
						
					</div>

					<?php if( $solala_container['show_sidebar'] ):?>

						<div id="page-sidebar" class="<?php echo esc_attr( $solala_container['sidebar_class'] ); ?> slz-sidebar-column slz-widgets">

							<?php solala_get_sidebar($solala_container['sidebar']);?>

						</div>

					<?php endif; ?>

					<div class="clearfix"></div>

				</div>

			</div>

		</div>

	</div>

<?php get_footer(); ?>
