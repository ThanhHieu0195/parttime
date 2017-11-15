<?php if (!defined('SLZ')) die('Forbidden');

/** @internal */
function solala_filter_disable_footers( $args ) {
	$args = array(
		'footer_02',
		'footer_03',
		'footer_04',
	);
	return $args;
}
add_filter( 'slz_ext_footers_disabled_footers' , 'solala_filter_disable_footers');