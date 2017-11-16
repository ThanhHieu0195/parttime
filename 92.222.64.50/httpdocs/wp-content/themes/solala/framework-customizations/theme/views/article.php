<?php
if( slz_ext('templates') ) {
    $module->get_post_format_post_view();
}else{
    if ( $module->has_post_thumbnail() ) :
    ?>
        <div class="block-image">
            <a href="<?php echo ( $module->get_url() ); ?>" class="link">
                <?php echo ( $module->get_featured_image() ); ?>
            </a>
        </div>
<?php endif;
}
?>


<div class="block-content">
	<?php echo ( $module->get_title() );?>

	<div class="block-text"><?php echo ( $module->get_excerpt() ); ?></div>
	<a href="<?php echo ( $module->get_url() ); ?>" class="block-read-more">
		<?php echo esc_html__('Read More', 'solala'); ?>
		<i class="fa fa-arrow-circle-right"></i>
	</a>
	<ul class="block-info">
		<?php echo ( $module->get_meta_data() );?>
	</ul>

</div>
