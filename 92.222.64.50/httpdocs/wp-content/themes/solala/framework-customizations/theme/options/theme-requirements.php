<?php if ( ! defined( 'SLZ' ) ) {
	die( 'Forbidden' );
}

$solala_server_requirements = slz()->theme->manifest->get('server_requirements');

// wp version
global $wp_version;
$solala_wp_required_version = slz()->theme->manifest->get('requirements/wordpress/min_version');
if( version_compare($wp_version, $solala_wp_required_version , '<=') ){
	$solala_wp_version_text = '<i class="slz-no-icon dashicons dashicons-info"></i>'.'<strong>'.$wp_version.'</strong>';
	$solala_wp_version_description_text = '<span class="slz-error-message">' .esc_html__( "The version of WordPress installed on your site.", 'solala' ). ' '. esc_html__( 'We recommend you update WordPress to the latest version. The minimum required version for this theme is:', 'solala' ) .' <strong>'.$solala_wp_required_version. '</strong>. <a target="_blank" href="'.esc_url( admin_url('update-core.php') ).'">'.esc_html__('Do that right now', 'solala').'</a></span>';
}
else{
	$solala_wp_version_text = '<i class="slz-yes-icon dashicons dashicons-yes"></i>'.'<strong>'.$wp_version.'</strong>';
	$solala_wp_version_description_text = esc_html__( "The version of WordPress installed on your site", 'solala' );
}

// wp multisite
if ( is_multisite() ){
	$solala_multisite_text = '<i class="slz-yes-icon dashicons dashicons-yes"></i>'.'<strong>'.esc_html__('Yes', 'solala').'</strong>';
}
else{
	$solala_multisite_text = '<i class="slz-yes-icon dashicons dashicons-yes"></i>'.'<strong>'.esc_html__('No', 'solala').'</strong>';
}

// wp debug mode
if ( defined('WP_DEBUG') && WP_DEBUG ){
	$solala_wp_debug_mode_text = '<i class="slz-no-icon dashicons dashicons-info"></i>'.'<strong>'.esc_html__('Yes', 'solala').'</strong>';
	$solala_wp_debug_mode_description_text = '<span class="slz-error-message">' .esc_html__( 'Displays whether or not WordPress is in Debug Mode. This mode is used by developers to test the theme. We recommend you turn it off for an optimal user experience on your website.', 'solala' ).' <a href="'.esc_url('https://codex.wordpress.org/WP_DEBUG').'" target="_blank">'.esc_html__('Learn how to do it', 'solala').'</a></span>';
}
else{
	$solala_wp_debug_mode_text = '<i class="slz-yes-icon dashicons dashicons-yes"></i>'.'<strong>'.esc_html__('No', 'solala').'</strong>';
	$solala_wp_debug_mode_description_text = esc_html__( 'Displays whether or not WordPress is in Debug Mode', 'solala' );
}

// wp memory limit
$solala_memory = solala_return_memory_size( WP_MEMORY_LIMIT );
$solala_requirements_wp_memory_limit = solala_return_memory_size($solala_server_requirements['server']['wp_memory_limit']);
if ( $solala_memory < $solala_requirements_wp_memory_limit ) {
	$solala_wp_memory_limit_text = '<i class="slz-no-icon dashicons dashicons-info"></i>'.'<strong>'.size_format( $solala_memory ).'</strong>';
	$solala_wp_memory_limit_description_text = '<span class="slz-error-message">' . esc_html__('The maximum amount of memory (RAM) that your site can use at one time.', 'solala') . ' '.wp_kses(__( 'We recommend setting memory to at least <strong>256MB</strong>. Please define memory limit in <strong>wp-config.php</strong> file.', 'solala'), array('<strong>' => array()) ).' <a href="'.esc_url('http://codex.wordpress.org/Editing_wp-config.php#Increasing_memory_allocated_to_PHP').'" target="_blank">'.esc_html__('Learn how to do it', 'solala' ).'</a></span>';
} else {
	$solala_wp_memory_limit_text = '<i class="slz-yes-icon dashicons dashicons-yes"></i>'.'<strong>'.size_format( $solala_memory ).'</strong>';
	$solala_wp_memory_limit_description_text = esc_html__('The maximum amount of memory (RAM) that your site can use at one time', 'solala');
}

// php version
if ( function_exists( 'phpversion' ) ) {
	if( version_compare(phpversion(), $solala_server_requirements['server']['php_version'], '<=') ){
		$solala_php_version_text = '<i class="slz-no-icon dashicons dashicons-info"></i><strong>'.esc_html( phpversion() ).'</strong>';
		$solala_php_version_description_text = '<span class="slz-error-message">' .esc_html__( 'The version of PHP installed on your hosting server.', 'solala' ).' '.esc_html__( 'We recommend you update PHP to the latest version. The minimum required version for this theme is:', 'solala' ) .' <strong>'.$solala_server_requirements['server']['php_version']. '</strong>. '.__('Contact your hosting provider, they can install it for you.', 'solala').'</span>';
	}
	else{
		$solala_php_version_text = '<i class="slz-yes-icon dashicons dashicons-yes"></i><strong>'.esc_html( phpversion() ).'</strong>';
		$solala_php_version_description_text =  esc_html__( 'The version of PHP installed on your hosting server', 'solala' );
	}
}
else{
	$solala_php_version_text = esc_html__('No PHP Installed', 'solala');
}

// php post max size
$solala_requirements_post_max_size = solala_return_memory_size($solala_server_requirements['server']['post_max_size']);
if ( solala_return_memory_size( ini_get('post_max_size') ) < $solala_requirements_post_max_size ) {
	$solala_php_post_max_size_text = '<i class="slz-no-icon dashicons dashicons-info"></i><strong>'.size_format(solala_return_memory_size( ini_get('post_max_size') ) ).'</strong>';
	$solala_php_post_max_size_description_text = '<span class="slz-error-message">' .esc_html__( 'The largest file size that can be contained in one post.', 'solala'  ).' '. esc_html__( 'We recommend setting the post maximum size to at least:', 'solala' ) .' <strong>'.size_format($solala_requirements_post_max_size). '</strong>'.'. <a href="'.esc_url('http://docs.themefuse.com/the-core/your-theme/theme-settings/how-to-set-a-maximum-file-upload-size').'" target="_blank">'.esc_html__('Learn how to do it','solala').'</a></span>';
}
else{
	$solala_php_post_max_size_text = '<i class="slz-yes-icon dashicons dashicons-yes"></i><strong>'.size_format(solala_return_memory_size( ini_get('post_max_size') ) ).'</strong>';
	$solala_php_post_max_size_description_text = esc_html__( 'The largest file size that can be contained in one post', 'solala'  );
}

// php time limit
$solala_time_limit = ini_get('max_execution_time');
$solala_required_php_time_limit = (int)$solala_server_requirements['server']['php_time_limit'];
if ( $solala_time_limit < $solala_required_php_time_limit && $solala_time_limit != 0 ) {
	$solala_php_time_limit_text = '<i class="slz-no-icon dashicons dashicons-info"></i>'.'<strong>'.$solala_time_limit.'</strong>';
	$solala_php_time_limit_description_text = '<span class="slz-error-message">'.esc_html__( 'The amount of time (in seconds) that your site will spend on a single operation before timing out (to avoid server lockups).', 'solala'  ).' '.esc_html__( 'We recommend setting the maximum execution time to at least', 'solala').' <strong>'.$solala_required_php_time_limit.'</strong>'.'. <a href="'.esc_url('http://codex.wordpress.org/Common_WordPress_Errors#Maximum_execution_time_exceeded').'" target="_blank">'.esc_html__('Learn how to do it','solala').'</a></span>';
} else {
	$solala_php_time_limit_description_text = esc_html__( 'The amount of time (in seconds) that your site will spend on a single operation before timing out (to avoid server lockups)', 'solala'  );
	$solala_php_time_limit_text = '<i class="slz-yes-icon dashicons dashicons-yes"></i>'.'<strong>'.$solala_time_limit.'</strong>';
}

// php max input vars
$solala_max_input_vars = ini_get('max_input_vars');
$solala_required_input_vars = $solala_server_requirements['server']['php_max_input_vars'];
if ( $solala_max_input_vars < $solala_required_input_vars ) {
	$solala_php_max_input_vars_description_text = '<span class="slz-error-message">'.esc_html__( 'The maximum number of variables your server can use for a single function to avoid overloads.', 'solala'  ). ' '.esc_html__( 'Please increase the maximum input variables limit to:','solala').' <strong>' . $solala_required_input_vars . '</strong>'.'. <a href="'.esc_url('http://docs.themefuse.com/the-core/your-theme/theme-settings/how-to-increase-the-maximum-input-variables-limit').'" target="_blank">'.esc_html__('Learn how to do it','solala').'</a></span>';
	$solala_php_max_input_vars_text = '<i class="slz-no-icon dashicons dashicons-info"></i><strong>'.$solala_max_input_vars.'</strong>';
} else {
	$solala_php_max_input_vars_description_text = esc_html__( 'The maximum number of variables your server can use for a single function to avoid overloads.', 'solala'  );
	$solala_php_max_input_vars_text = '<i class="slz-yes-icon dashicons dashicons-yes"></i><strong>'.$solala_max_input_vars.'</strong>';
}

// suhosin
if( extension_loaded( 'suhosin' ) ) {
	$solala_suhosin_text = '<i class="slz-no-icon dashicons dashicons-info"></i><strong>'.esc_html__('Yes', 'solala').'</strong>';
	$solala_suhosin_description_text = '<span class="slz-error-message">'. esc_html__( 'Suhosin is an advanced protection system for PHP installations and may need to be configured to increase its data submission limits', 'solala'  ).'</span>';
	$solala_max_input_vars      = ini_get( 'suhosin.post.max_vars' );
	$solala_required_input_vars = $solala_server_requirements['server']['suhosin_post_max_vars'];
	if ( $solala_max_input_vars < $solala_required_input_vars ) {
		$solala_suhosin_description_text .= '<span class="slz-error-message">' . sprintf( wp_kses(__( '%s - Recommended Value is: %s. <a href="%s" target="_blank">Increasing max input vars limit.</a>', 'solala' ), array( 'a' => array('href' => array()) ) ), $solala_max_input_vars, '<strong>' . ( $solala_required_input_vars ) . '</strong>', esc_url('http://docs.themefuse.com/the-core/your-theme/theme-settings/how-to-increase-the-maximum-input-variables-limit') ) . '</span>';
	}
}
else {
	$solala_suhosin_text = '<i class="slz-yes-icon dashicons dashicons-yes"></i><strong>'.esc_html__('No', 'solala').'</strong>';
	$solala_suhosin_description_text = esc_html__( 'Suhosin is an advanced protection system for PHP installations.', 'solala'  );
}

// mysql version
global $wpdb;
if( version_compare($wpdb->db_version(), $solala_server_requirements['server']['mysql_version'], '<=') ){
	$solala_mysql_version_text = '<i class="slz-no-icon dashicons dashicons-info"></i><strong>'.$wpdb->db_version().'</strong>';
	$solala_mysql_version_description_text = '<span class="slz-error-message">' . esc_html__( 'The version of MySQL installed on your hosting server.', 'solala'  ).' '. esc_html__( 'We recommend you update MySQL to the latest version. The minimum required version for this theme is:', 'solala' ) .' <strong>'.$solala_server_requirements['server']['mysql_version']. '</strong> '.esc_html__('Contact your hosting provider, they can install it for you.', 'solala').'</span>';
}
else{
	$solala_mysql_version_text = '<i class="slz-yes-icon dashicons dashicons-yes"></i><strong>'.$wpdb->db_version().'</strong>';
	$solala_mysql_version_description_text = esc_html__( 'The version of MySQL installed on your hosting server', 'solala'  );
}

// max upload size
$solala_requirements_max_upload_size = solala_return_memory_size($solala_server_requirements['server']['max_upload_size']);
if ( wp_max_upload_size() < $solala_requirements_max_upload_size ) {
	$solala_max_upload_size_text = '<i class="slz-no-icon dashicons dashicons-info"></i><strong>'.size_format(wp_max_upload_size()).'</strong>';
	$solala_max_upload_size_description_text = '<span class="slz-error-message">' . esc_html__( 'The largest file size that can be uploaded to your WordPress installation.', 'solala'  ). ' '.esc_html__( 'We recommend setting the maximum upload file size to at least:', 'solala' ) .' <strong>'.size_format($solala_requirements_max_upload_size). '</strong>. <a href="'.esc_url('http://docs.themefuse.com/the-core/your-theme/theme-settings/how-to-set-a-maximum-file-upload-size').'" target="_blank">'.esc_html__('Learn how to do it', 'solala').'</a></span>';
}
else{
	$solala_max_upload_size_text = '<i class="slz-yes-icon dashicons dashicons-yes"></i><strong>'.size_format(wp_max_upload_size()).'</strong>';
	$solala_max_upload_size_description_text = esc_attr__( 'The largest file size that can be uploaded to your WordPress installation', 'solala'  );
}

// fsockopen
if( function_exists( 'fsockopen' ) || function_exists( 'curl_init' ) ) {
	$solala_fsockopen_text = '<i class="slz-yes-icon dashicons dashicons-yes"></i><strong>'.esc_html__('Yes', 'solala').'</strong>';
	$solala_fsockopen_description_text = esc_html__( 'Payment gateways can use cURL to communicate with remote servers to authorize payments, other plugins may also use it when communicating with remote services', 'solala' );
}
else{
	$solala_fsockopen_text = '<i class="slz-no-icon dashicons dashicons-info"></i><strong>'.esc_html__('No', 'solala').'</strong>';
	$solala_fsockopen_description_text = '<span class="slz-error-message">'.wp_kses(__( 'Payment gateways can use cURL to communicate with remote servers to authorize payments, other plugins may also use it when communicating with remote services. Your server does not have <strong>fsockopen</strong> or <strong>cURL</strong> enabled thus PayPal IPN and other scripts which communicate with other servers will not work. Contact your hosting provider, they can install it for you.', 'solala' ), array( '<strong>' => array() )).'</span>';
}

$options = array(
	'requirements_tab' => array(
		'title'   => esc_html__( 'Requirements', 'solala' ),
		'type'    => 'tab',
		'options' => array(
			'wordpress-environment-box' => array(
				'title'   => esc_html__( 'WordPress Environment', 'solala' ),
				'type'    => 'box',
				'options' => array(
					'home_url' => array(
						'attr'  => array( 'class' => 'slz-theme-requirements-option', ),
						'label' => esc_html__( 'Home URL', 'solala' ),
						'desc'  => esc_html__( "The URL of your site's homepage", 'solala' ),
						'type'  => 'html',
						'html'  => '<i class="slz-yes-icon dashicons dashicons-yes"></i>'.'<strong>'.esc_url(home_url()).'</strong>',
					),
					'site_url' => array(
						'attr'  => array( 'class' => 'slz-theme-requirements-option', ),
						'label' => esc_html__( 'Site URL', 'solala' ),
						'desc'  => esc_html__( "The root URL of your site", 'solala' ),
						'type'  => 'html',
						'html'  => '<i class="slz-yes-icon dashicons dashicons-yes"></i>'.'<strong>'.esc_url(site_url()).'</strong>',
					),
					'wp_version' => array(
						'attr'  => array( 'class' => 'slz-theme-requirements-option', ),
						'label' => esc_html__( 'WP Version', 'solala' ),
						'desc'  => $solala_wp_version_description_text,
						'type'  => 'html',
						'html'  => $solala_wp_version_text,
					),
					'wp_multisite' => array(
						'attr'  => array( 'class' => 'slz-theme-requirements-option', ),
						'label' => esc_html__( 'WP Multisite', 'solala' ),
						'type'  => 'html',
						'desc'  => esc_html__( 'Whether or not you have WordPress Multisite enabled', 'solala' ),
						'html'  => $solala_multisite_text,
					),
					'wp_debug_mode' => array(
						'attr'  => array( 'class' => 'slz-theme-requirements-option', ),
						'label' => esc_html__( 'WP Debug Mode', 'solala' ),
						'type'  => 'html',
						'desc'  => $solala_wp_debug_mode_description_text,
						'html'  => $solala_wp_debug_mode_text,
					),
					'wp_memory_limit' => array(
						'attr'  => array( 'class' => 'slz-theme-requirements-option', ),
						'label' => esc_html__( 'WP Memory Limit', 'solala' ),
						'desc'  => $solala_wp_memory_limit_description_text,
						'type'  => 'html',
						'html'  => $solala_wp_memory_limit_text,
					),
				)
			),
			'server-environment-box' => array(
				'title'   => esc_html__( 'Server Environment', 'solala' ),
				'type'    => 'box',
				'options' => array(
					'server_info' => array(
						'attr'  => array( 'class' => 'slz-theme-requirements-option', ),
						'label' => esc_html__( 'Server Info', 'solala' ),
						'desc'  => esc_html__( "Information about the web server that is currently hosting your site", 'solala' ),
						'type'  => 'html',
						'html'  => '<i class="slz-yes-icon dashicons dashicons-yes"></i><strong>'.esc_html( $_SERVER['SERVER_SOFTWARE'] ).'</strong>',
					),
					'php_version' => array(
						'attr'  => array( 'class' => 'slz-theme-requirements-option', ),
						'label' => esc_html__( 'PHP Version', 'solala' ),
						'desc'  => $solala_php_version_description_text,
						'type'  => 'html',
						'html'  => $solala_php_version_text,
					),
					'php_post_max_size' => array(
						'attr'  => array( 'class' => 'slz-theme-requirements-option', ),
						'label' => esc_html__( 'PHP Post Max Size', 'solala' ),
						'desc'  => $solala_php_post_max_size_description_text,
						'type'  => 'html',
						'html'  => $solala_php_post_max_size_text,
					),
					'php_time_limit' => array(
						'attr'  => array( 'class' => 'slz-theme-requirements-option', ),
						'label' => esc_html__( 'PHP Time Limit', 'solala' ),
						'desc'  => $solala_php_time_limit_description_text,
						'type'  => 'html',
						'html'  => $solala_php_time_limit_text,
					),
					'php_max_input_vars' => array(
						'attr'  => array( 'class' => 'slz-theme-requirements-option', ),
						'label' => esc_html__( 'PHP Max Input Vars', 'solala' ),
						'desc'  => $solala_php_max_input_vars_description_text,
						'type'  => 'html',
						'html'  => $solala_php_max_input_vars_text,
					),
					'suhosin_installed' => array(
						'attr'  => array( 'class' => 'slz-theme-requirements-option', ),
						'label' => esc_html__( 'SUHOSIN Installed', 'solala' ),
						'desc'  => $solala_suhosin_description_text,
						'type'  => 'html',
						'html'  => $solala_suhosin_text,
					),
					'zip_archive' => array(
						'attr'  => array( 'class' => 'slz-theme-requirements-option', ),
						'label' => esc_html__( 'ZipArchive', 'solala' ),
						'desc'  => class_exists( 'ZipArchive' ) ? esc_html__('ZipArchive is required for importing demos. They are used to import and export zip files specifically for sliders', 'solala') : '<span class="slz-error-message">'.esc_html__('ZipArchive is required for importing demos. They are used to import and export zip files specifically for sliders.', 'solala').' '.esc_html__('Contact your hosting provider, they can install it for you.', 'solala').'</span>',
						'type'  => 'html',
						'html'  => class_exists( 'ZipArchive' ) ? '<i class="slz-yes-icon dashicons dashicons-yes"></i><strong>'.esc_html__('Yes', 'solala').'</strong>' : '<i class="slz-no-icon dashicons dashicons-info"></i><strong>'.esc_html__('No', 'solala').'</strong>',
					),
					'mysql_version' => array(
						'attr'  => array( 'class' => 'slz-theme-requirements-option', ),
						'label' => esc_html__( 'MySQL Version', 'solala' ),
						'desc'  => $solala_mysql_version_description_text,
						'type'  => 'html',
						'html'  => $solala_mysql_version_text,
					),
					'max_upload_size' => array(
						'attr'  => array( 'class' => 'slz-theme-requirements-option', ),
						'label' => esc_html__( 'Max Upload Size', 'solala' ),
						'desc'  => $solala_max_upload_size_description_text,
						'type'  => 'html',
						'html'  => $solala_max_upload_size_text,
					),
					'fsockopen' => array(
						'attr'  => array( 'class' => 'slz-theme-requirements-option', ),
						'label' => esc_html__( 'fsockopen/cURL', 'solala' ),
						'desc'  => $solala_fsockopen_description_text,
						'type'  => 'html',
						'html'  => $solala_fsockopen_text,
					),
					'legend' => array(
						'label' => false,
						'type'  => 'html',
						'html'  => '',
						'desc'  => '<i class="slz-yes-icon dashicons dashicons-yes"></i><span class="slz-success-message">'.esc_html__('Meets minimum requirements', 'solala').'</span><br><i class="slz-no-icon dashicons dashicons-info"></i><span class="slz-error-message">'.esc_html__("We have some improvements to suggest", 'solala').'</span>',
					),
				)
			),
		)
	),
);
