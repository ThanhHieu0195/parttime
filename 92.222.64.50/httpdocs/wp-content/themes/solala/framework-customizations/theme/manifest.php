<?php if ( ! defined( 'SLZ' ) ) {
	die( 'Forbidden' );
}

$manifest = array();

$manifest['id']                  = 'solala';
$manifest['skin']                = 'main';

$manifest['requirements']        = array(
	'wordpress' => array(
		'min_version' => '4.4',
	),
);

$manifest['prefix'] = 'solala';
$manifest['post_view_name']      = 'solala_postview_number';
$manifest['sidebar_name']        = 'solala-custom-sidebar';
$manifest['log_page_id']         = 'solala-log';

$manifest['count_view_to_post_type'] = array(
	'post', 'slz-portfolio'
);

$manifest['supported_extensions'] = array(
	'megamenu'       => array(),
	'events'         => array(),
	'portfolio'      => array(),
	'gallery'        => array(),
	'new-tweet'      => array(),
	'teams'          => array(),
	'testimonials'   => array(),
	'backups'        => array(),
	'instagram'      => array(),
);
$manifest['theme_libs'] = array(
	'bootstrap.min', 'bootstrap-datepicker.min',
	'font-awesome.min', 'solala-fonts',
);
$manifest['server_requirements'] = array(
	'server' => array(
		'wp_memory_limit'          => '256M', // use M for MB, G for GB
		'php_version'              => '5.2.4',
		'post_max_size'            => '8M',
		'php_time_limit'           => '1500',
		'php_max_input_vars'       => '4000',
		'suhosin_post_max_vars'    => '3000',
		'suhosin_request_max_vars' => '3000',
		'mysql_version'            => '5.6',
		'max_upload_size'          => '8M',
	),
);

$manifest['register_image_sizes'] = array(
	//post-thumbnail (1200x650)
    'solala-thumb-85x85'         => array( 'width' =>  85, 'height' =>  85, 'crop' => array('center', 'top' ) ), // sc & widget event
    'solala-thumb-350x350'       => array( 'width' => 350, 'height' => 350, 'crop' => array('center', 'top' ) ), // sc project carousel
    'solala-thumb-550x550'       => array( 'width' => 550, 'height' => 550, 'crop' => array('center', 'top' ) ), // sc project list
	'solala-thumb-800x600'       => array( 'width' => 800, 'height' => 600, 'crop' => array('center', 'top' ) ), // gallery,
    'solala-thumb-800x500'       => array( 'width' => 800, 'height' => 500, 'crop' => array('center', 'top' ) ), // grid, block, portfolio
    'solala-thumb-450x800'       => array( 'width' => 450, 'height' => 800, 'crop' => array('center', 'top' ) ), // grid, block, portfolio
 	'solala-thumb-800x400'       => array( 'width' => 800, 'height' => 400, 'crop' => array('center', 'top' ) ), // grid
    'solala-thumb-800x300'       => array( 'width' => 800, 'height' => 300, 'crop' => array('center', 'top' ) ), // gallery small,
    'solala-thumb-1200x650'      => array( 'width' => 1200,'height' => 650, 'crop' => array('center', 'top' ) ), // gallery small,
 	'solala-thumb-690x270'       => array( 'width' => 690, 'height' => 270, 'crop' => array('center', 'top' ) ), // post mansory small
    'solala-thumb-550x350'       => array( 'width' => 550, 'height' => 350, 'crop' => array('center', 'top' ) ), // post mansory large
    'solala-thumb-670x410'       => array( 'width' => 670, 'height' => 410, 'crop' => array('center', 'top' ) ), // post mansory large
 	'solala-thumb-670x420'       => array( 'width' => 670, 'height' => 420, 'crop' => array('center', 'top' ) ), // block ( small )
);

$manifest['css_supported_shortcodes'] = array(
	'accordion',
	'audio',
	'event',
	'icon-box',
	'isotope',
	'portfolio',
	'post-block',
	'post-carousel',
	'pricing-box',
	'tabs',
	'team',
	'testimonials',
	'video',
	'widget',
);
$manifest['block_image_size'] = array(

);