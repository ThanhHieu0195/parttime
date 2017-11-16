<?php
$author_id = get_the_author_meta( 'ID' );
if(empty($author_id)) {
	$author_id = get_query_var('author');
}
if( empty($author_id) ) return;

$author_url = get_author_posts_url( $author_id );
$author_desc = get_the_author_meta( 'description', $author_id );

$html_social = '';
if( defined( 'SLZ' ) ) {
	$arr_params = SLZ_Params::setting();
	if( isset( $arr_params['social-icons'] ) ) :
	    $arr_social_icon = $arr_params['social-icons'];
	    foreach ($arr_social_icon as $key => $value) {
	        $social = $key;
	        $link = get_the_author_meta($key);
	        if (!empty($link)) {
	            $html_social .= '<a href="' . esc_attr($link) . '"><i class="slz-icon fa ' . esc_attr($value) . '"></i></a>';
	        }
	    }
    endif;
}
?>
<div class="slz-blog-author media">
	<div class="media-left">
		<a href="<?php echo esc_url( $author_url )?>" class="media-image thumb"><?php echo get_avatar($author_id, 100); ?></a>
	</div>
	<div class="media-right">
		<a href="<?php echo esc_url( $author_url )?>" title="" class="author"><?php echo get_the_author_meta('display_name', $author_id); ?></a>
		<div class="des"><?php echo nl2br( esc_textarea( $author_desc ) ) ?></div>
        <?php
        if ( !empty($html_social) ) {
            echo '<div class="social-icon">'. ( $html_social ) .'</div>';
        }
        ?>
	</div>
</div>
