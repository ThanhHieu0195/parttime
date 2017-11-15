<?php
$solala_container = solala_get_container_class( );
?>

<div class="slz-blog-detail slz-posts <?php echo esc_attr( $solala_container['sidebar_layout_class'] ); ?>">
	<div class="row">
		<div id="page-content" class="<?php echo esc_attr( $solala_container['content_class'] ); ?> slz-content-column">
			<?php
			while ( have_posts() ) : the_post();
			?>

				<div class="page-detail-wrapper">

					<?php echo solala_show_title( '<h1 class="title">', '</h1>' ); ?>

					<?php solala_post_detail_thumbnail(); ?>

					<div class="entry-content">
						<?php
							the_content( '<a href="%s" class="read-more">%s<i class="fa fa-angle-right"></i></a>',
											esc_url( get_permalink() ),
											esc_html__( 'Read more', 'solala' ) );

							wp_link_pages( array(
								'before' => '<div class="page-links"><span class="page-links-title">' . esc_html__( 'Pages:', 'solala' ) . '</span>',
								'after' => '</div>',
								'link_before' => '<span>',
								'link_after' => '</span>',
							) );
						?>
					</div>

					<footer class="entry-footer">
						<?php edit_post_link( esc_html__( 'Edit', 'solala' ), '<span class="edit-link">', '</span>' ); ?>
					</footer>
				</div>

				<?php
					if ( comments_open() ) :
						comments_template();
					endif;
				?>

			<?php endwhile; ?>

		</div>

		<?php if ( $solala_container['show_sidebar'] ): ?>

			<div id="page-sidebar" class="<?php echo esc_attr( $solala_container['sidebar_class'] ); ?> slz-sidebar-column  slz-widgets">

				<?php solala_get_sidebar($solala_container['sidebar']);?>

			</div>
		<?php endif; ?>

		<div class="clearfix"></div>

	</div>

</div>