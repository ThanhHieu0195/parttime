<?php if ( ! defined( 'SLZ' ) ) {
	die( 'Forbidden' );
}

if ( !is_admin() ) {
	$ext_instance = slz()->extensions->get( 'portfolio' );

	wp_enqueue_style(
		'slz-extension-'. $ext_instance->get_name() .'-styles',
		$ext_instance->locate_css_URI( 'styles' ),
		array(),
		$ext_instance->manifest->get_version()
	);

	wp_enqueue_script(
		'slz-extension-'. $ext_instance->get_name() .'-scripts',
		$ext_instance->locate_js_URI( 'portfolio' ),
		array( 'jquery'),
		$ext_instance->manifest->get_version(),
		true
	);

    wp_enqueue_style(
        'slz-extension-'. $ext_instance->get_name() .'-mep-libs',
        $ext_instance->locate_URI( '/static/libs/mejs/mep-feature-playlist.css' ),
        array(),
        slz_ext('shortcodes')->manifest->get('version')
    );
    wp_enqueue_script(
        'slz-extension-'. $ext_instance->get_name() .'-mep-libs',
        $ext_instance->locate_URI( '/static/libs/mejs/mep-feature-playlist.js' ),
        array( 'jquery' ),
        slz()->manifest->get_version(),
        true
    );
    wp_enqueue_script(
        'slz-extension-'. $ext_instance->get_name() .'-audio',
        $ext_instance->locate_URI( '/static/js/audio.js' ),
        array( 'jquery' ),
        slz()->manifest->get_version(),
        true
    );
}