<?php
/**
 * The template for displaying tag.
 *
 * @package WordPress
 * @subpackage Solala
 * @since 1.0
 */

get_header();
$solala_container = solala_get_container_class( 'tag-article-style' );
?>

	<div class="slz-main-content">

		<?php echo solala_show_title( '<div class="archive-header"><div class="container"><h1 class="title">', '</h1></div></div>' ); ?>

		<div class="container">

			<div class="slz-blog-detail <?php echo esc_attr( $solala_container['sidebar_layout_class'] ); ?> margin-top-100 margin-bottom-100">

				<div class="row">

					<div id="page-content" class="<?php echo esc_attr( $solala_container['content_class'] ); ?> slz-content-column">

						<?php if ( have_posts() ) : ?>

							<div class="slz-list-block <?php echo esc_attr( $solala_container['block_class'] ); ?>">

								<?php

								if ( $solala_template = solala_check_article_layout('articles', 'tag-article-style') ) {
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

						<div id="page-sidebar" class="<?php echo esc_attr($solala_container['sidebar_class'])?> slz-sidebar-column slz-widgets">

							<?php solala_get_sidebar($solala_container['sidebar']);?>

						</div>

					<?php endif; ?>

					<div class="clearfix"></div>

				</div>

			</div>

		</div>

	</div>

<?php get_footer(); ?>
