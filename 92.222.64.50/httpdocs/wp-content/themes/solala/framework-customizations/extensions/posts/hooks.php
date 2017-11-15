<?php if (!defined('SLZ')) die('Forbidden');

/** @internal */
function solala_filter_disable_posts( $args ) {
	$args = array(
		'post_01',
		'post_02',
		'post_03',
	);
	return $args;
}
add_filter( 'slz_ext_posts_disabled_posts' , 'solala_filter_disable_posts');