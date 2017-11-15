<?php if ( ! defined( 'ABSPATH' ) ) {
    die( 'Direct access forbidden.' );
}

wp_enqueue_media();

if ( defined( 'SLZ' ) ) {
    $solala_version = slz()->theme->manifest->get_version();
} else {
    $solala_version = '1.0';
}

wp_enqueue_style(
	'css-theme-admin',
	SOLALA_STATIC_URI . '/css/theme-admin.css',
	array(),
    $solala_version
);

wp_enqueue_script(
	'js-theme-admin',
	SOLALA_STATIC_URI . '/js/theme-admin.js',
	array( 'jquery', ),
    $solala_version,
	true
);

