<?php if (!defined('SLZ')) die('Forbidden');

/** @internal */
function solala_filter_disable_headers( $args ) {
	$args = array(
		'header_03',
		'header_04',
		'header_05',
		'header_06',
	);
	return $args;
}
add_filter( 'slz_ext_headers_disabled_headers' , 'solala_filter_disable_headers');