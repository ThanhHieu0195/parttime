<div id="post-<?php the_ID(); ?>" <?php post_class('item');?> >
	<div class="slz-block-item-01 style-1 slz-article article-default">

		<?php if( ! is_search() ) :?>
			<?php solala_sticky_ribbon();?>
			<?php solala_post_thumbnail(); ?>
		<?php endif;?>

		<div class="block-content">

			<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( solala_get_link_url() ) ), '</a></h2>' ); ?>

			<div class="block-info">
				<ul class="list-info">
					<?php solala_entry_meta();?>
				</ul>
			</div>
			
			<div class="entry-content">
				<?php if( is_search() ):?>

					<?php the_excerpt(); ?>

				<?php else:?>

					<?php the_content( sprintf( '<a href="%s" class="read-more">%s<i class="fa fa-angle-right"></i></a>',
							esc_url( get_permalink() ),
							esc_html__( 'Read more', 'solala' )
					) );?>

				<?php endif;?>

				<?php
					wp_link_pages( array(
						'before' => '<div class="page-links"><span class="page-links-title">' . esc_html__( 'Pages:', 'solala' ) . '</span>',
						'after' => '</div>',
						'link_before' => '<span>',
						'link_after' => '</span>',
					) );
				?>
				
			</div>

			<?php if( get_post_type() == 'post' ) :?>
			<div class="entry-meta">
				<?php solala_categories_meta();?>
				<?php solala_tags_meta();?>
			</div>
			<?php endif;?>

			</div>
	</div>
</div>