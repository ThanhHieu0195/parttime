<?php if ( ! defined( 'SLZ' ) ) {
	die( 'Forbidden. This theme requires the Solazu Unyson plugin installed!' );
}

$interval_option = wp_get_schedules();
$interval_option_array = array();
foreach ($interval_option as $key => $value) {
	$interval_option_array[$key] = $value['display'];
}

global $wp_styles, $wp_scripts;

$registered_wp_styles = array();
$registered_wp_scripts = array();

if ( !empty ( $wp_styles->registered ) ) {
	foreach ($wp_styles->registered as $key => $value) {
		$registered_wp_styles[$key] = $key;
	}
}

if ( !empty ( $wp_scripts->registered ) ) {
	foreach ($wp_scripts->registered as $key => $value) {
		$registered_wp_scripts[$key] = $key;
	}
}
$page_cache_reject = array(
	'reject_page_type' => array(
		'type'  => 'checkboxes',
		'attr'  => array('class' => 'cache_modify_listener'),
		'label' => esc_html__('Rejected Page Types', 'solala'),
		'desc'  => esc_html__('Do not cache the following page types. See the Conditional Tags documentation for a complete discussion on each type.', 'solala'),
		'choices' => array(
			'single'     => esc_html__('Single Posts (is_single)', 'solala'),
			'page'       => esc_html__('Pages (is_page)', 'solala'),
			'front_page' => esc_html__('Front Page (is_front_page)', 'solala'),
			'home'       => esc_html__('Home (is_home)', 'solala'),
			'archives'   => esc_html__('Archives (is_archive)', 'solala'),
			'tag'        => esc_html__('Tags (is_tag)', 'solala'),
			'category'   => esc_html__('Category (is_category)', 'solala'),
			'feed'       => esc_html__('Feeds (is_feed)', 'solala'),
			'search'     => esc_html__('Search Pages (is_search)', 'solala'),
			'author'     => esc_html__('Author Pages (is_author)', 'solala'),
		),
	),
	'reject_post_ids' => array(
		'label' => esc_html__('Rejected Post ID', 'solala'),
		'type'  => 'text',
		'attr'  => array('class' => 'cache_modify_listener'),
		'desc'  => esc_html__('Enter here the post IDs separated by commas (ex: 10,23,50) to disable cache in this page.', 'solala'),
	),
	'reject_author_roles' => array(
		'type'  => 'checkboxes',
		'attr'  => array('class' => 'cache_modify_listener'),
		'label' => esc_html__('Rejected User Roles', 'solala'),
		'desc'  => esc_html__('Select user roles that should not receive cached pages.', 'solala'),
		'choices' => array(
			'administrator' => esc_html__('Administrator', 'solala'),
			'editor'        => esc_html__('Editor', 'solala'),
			'author'        => esc_html__('Author', 'solala'),
			'contributor'   => esc_html__('Contributor', 'solala'),
			'subscriber'    => esc_html__('Subscriber)', 'solala')
		),
	),
	'reject_user_agents'  => array(
		'label'           => esc_html__('Rejected User Agents', 'solala'),
		'type'            => 'addable-option',
		'attr'            => array('class' => 'cache_modify_listener'),
		'desc'            => esc_html__('Never send cache pages for these user agents.', 'solala'),
		'value'           => array('bot', 'ia_archive', 'slurp', 'crawl', 'spider', 'Yandex'),
		'option'          => array( 'type' => 'text' ),
		'add-button-text' => esc_html__('Add', 'solala'),
		'sortable'        => true,
	),
	'reject_user_cookies' => array(
		'label'           => esc_html__('Rejected User Cookies', 'solala'),
		'type'            => 'addable-option',
		'attr'            => array('class' => 'cache_modify_listener'),
		'desc'            => esc_html__('Never cache pages that use the specified cookies.', 'solala'),
		'option'          => array( 'type' => 'text' ),
		'add-button-text' => esc_html__('Add', 'solala'),
		'sortable'        => true,
		'value'           => array()
	),
	'accept_query_string' => array(
		'label'           => esc_html__('Accepted Query Strings', 'solala'),
		'type'            => 'addable-option',
		'attr'            => array('class' => 'cache_modify_listener'),
		'desc'            => esc_html__('Always cache URLs with these query strings.', 'solala'),
		'option'          => array( 'type' => 'text' ),
		'add-button-text' => esc_html__('Add', 'solala'),
		'sortable'        => true,
		'value'           => array()
	),
	'cache_change_status' => array(
		'type'  => 'hidden',
		'value' => 'change',
		'attr'  => array( 'class' => 'cache_modify_listener_hidden_field', 'id' => 'cache_modify_listener_hidden_field' ),
	)
);
if( SOLALA_WC_ACTIVE ) {
	$woo_options = array(
		'reject_woo_page' => array(
			'type'  => 'checkboxes',
			'attr'  => array('class' => 'cache_modify_listener '),
			'label' => esc_html__('Rejected WooCommerce Pages', 'solala'),
			'desc'  => esc_html__('Do not cache the above pages.', 'solala'),
			'value' => array(
				'cart'     => true,
				'checkout' => true
			),
			'choices' => array(
				'account'  => esc_html__('My Account', 'solala'),
				'cart'     => esc_html__('Cart', 'solala'),
				'checkout' => esc_html__('Checkout', 'solala'),
				'shop'     => esc_html__('Shop', 'solala')
			)
		)
	);
	$page_cache_reject = array_merge( $woo_options, $page_cache_reject );
}

$options = array(
	'speed_optimize_tab' => array(
		'title'   => esc_html__( 'Optimize Performance', 'solala' ),
		'type'    => 'tab',
		'options' => array(
			'minify_tab'  => array(
				'title'   => esc_html__( 'Minify Resource', 'solala' ),
				'type'    => 'tab',
				'options' => array(
					'general_box'        => array(
						'title'   => esc_html__( 'General Configuration', 'solala' ),
						'type'    => 'box',
						'options' => array(
							'js_status' => array(
								'type'  => 'switch',
								'value' => 'disable',
								'label' => esc_html__('JavaScript Minification', 'solala'),
								'desc'  => esc_html__('Enable / Disable javaScript minification', 'solala'),
								'left-choice' => array(
									'value' => 'enable',
									'label' => esc_html__('Enable', 'solala'),
								),
								'right-choice' => array(
									'value' => 'disable',
									'label' => esc_html__('Disable', 'solala'),
								),
							),
							'css_status' => array(
								'type'  => 'switch',
								'value' => 'disable',
								'label' => esc_html__('Stylesheet Minification', 'solala'),
								'desc'  => esc_html__('Enable / Disable stylesheet minification', 'solala'),
								'left-choice' => array(
									'value' => 'enable',
									'label' => esc_html__('Enable', 'solala'),
								),
								'right-choice' => array(
									'value' => 'disable',
									'label' => esc_html__('Disable', 'solala'),
								),
							),
							'clear_minify' => array(
								'type'        => 'slz-minify',
								'button_text' => esc_html__('Delete Minify Files', 'solala'),
								'label'       => esc_html__('Delete Minify Files', 'solala'),
								'desc'        => esc_html__('Minify files are stored on your server as .js and .css files. If you need to delete them, use the button below.', 'solala'),
							),
						)
					),
					'advance_box'        => array(
						'title'   => esc_html__( 'Advanced Settings', 'solala' ),
						'type'    => 'box',
						'options' => array(
							'minify_cache_time' => array(
								'type'  => 'short-text',
								'label' => esc_html__('Cache Time', 'solala'),
								'desc'  => esc_html__('Cache Time (seconds)', 'solala'),
								'value' => '3600'
							),
							'js_placement' => array(
								'type'  => 'select',
								'value' => 'header-footer',
								'label' => esc_html__('JavaScript Placement', 'solala'),
								'desc'  => esc_html__('JavaScript Placement', 'solala'),
								'choices' => array(
									'header-footer' => esc_html__('Both header and footer', 'solala'),
									'header' => esc_html__('All in header', 'solala'),
									'footer' => esc_html__('All in footer', 'solala'),
								),
							),
						)
					)
				)
			),
			'browser_cahe_tab'  => array(
				'title'   => esc_html__( 'Browser Cache', 'solala' ),
				'type'    => 'tab',
				'options' => array(
					'general_box'        => array(
						'title'   => esc_html__( 'General Configuration', 'solala' ),
						'type'    => 'box',
						'options' => array(
							'data_gzip_status' => array(
								'type'  => 'switch',
								'value' => 'disable',
								'label' => esc_html__('Gzip Compression', 'solala'),
								'desc'  => esc_html__('Enable / Disable gzip compression', 'solala'),
								'left-choice' => array(
									'value' => 'enable',
									'label' => esc_html__('Enable', 'solala'),
								),
								'right-choice' => array(
									'value' => 'disable',
									'label' => esc_html__('Disable', 'solala'),
								),
							),
							'data_leverage_browser_caching_status'   => array(
								'type'   => 'multi-picker',
								'label'  => false,
								'desc'   => false,
								'picker' => array(
									'leverage_browser_caching' => array(
										'type'  => 'switch',
										'value' => 'disable',
										'label' => esc_html__( 'Leverage Browser Caching', 'solala' ),
										'left-choice' => array(
											'value' => 'enable',
											'label' => esc_html__('Enable', 'solala'),
										),
										'right-choice' => array(
											'value' => 'disable',
											'label' => esc_html__('Disable', 'solala'),
										),
									),
								),
								'choices' => array(
									'enable' => array(
										'html_expire_time' => array(
											'type'  => 'text',
											'value' => '3600',
											'label' => esc_html__('HTML Expire Time', 'solala'),
										),
										'cssjs_expire_time' => array(
											'type'  => 'text',
											'value' => '31536000',
											'label' => esc_html__('CSS JS Expire Time', 'solala'),
										),
										'other_expire_time' => array(
											'type'  => 'text',
											'value' => '31536000',
											'label' => esc_html__('Other Expire Time', 'solala'),
										),
									),
								),
							),
						)
					),
				)
			),
			'page_cache_tab'  => array(
				'title'   => esc_html__( 'Page Cache', 'solala' ),
				'type'    => 'tab',
				'options' => array(
					'page_cache_general_box'        => array(
						'title'   => esc_html__( 'General Configuration', 'solala' ),
						'type'    => 'box',
						'show_borders'	=> 'true',
						'options' => array(
							'page_cache_status'	=>	array(
								'type'  => 'switch',
								'value' => 'disable',
								'attr'  => array('class' => 'cache_modify_listener'),
								'label' => esc_html__('Page Cache Status', 'solala'),
								'desc'  => esc_html__('Enable / Disable page cache', 'solala'),
								'left-choice' => array(
									'value' => 'enable',
									'label' => esc_html__('Enable', 'solala'),
								),
								'right-choice' => array(
									'value' => 'disable',
									'label' => esc_html__('Disable', 'solala'),
								),
							),
							'clear_cache' => array(
								'type'        => 'slz-cache',
								'button_text' => 'Delete Cache',
								'label'       => esc_html__('Delete Cached Pages', 'solala'),
								'desc'        => esc_html__('Cached pages are stored on your server as html and PHP files. If you need to delete them, use the button below.', 'solala'),
							),
							'cache_compress_content' => array(
								'label' => esc_html__('Compress Content', 'solala'),
								'type'  => 'checkbox',
								'attr'  => array('class' => 'cache_modify_listener'),
								'text'  => esc_html__('Compress pages so they are served more quickly to visitors (Recommended).', 'solala'),
								'desc'  => esc_html__('Compression is disabled by default because some hosts have problems with compressed files. Switching it on and off clears the cache.', 'solala'),
								'value' => false,
							),
							'cache_user_logged_in' => array(
								'label' => esc_html__('Cache Content', 'solala'),
								'type'  => 'checkbox',
								'attr'  => array('class' => 'cache_modify_listener'),
								'desc'  => esc_html__('Unauthenticated users may view a cached version of the last authenticated users view of a given page. Disabling this option is not recommended.', 'solala'),
								'text'  => esc_html__('Do not cache pages for logged in users', 'solala'),
								'value' => false,
							),
							'cache_flush_status'   => array(
								'type'         => 'multi-picker',
								'label'        => false,
								'desc'         => false,
								'picker'       => array(
									'enable-page-cache-preload' => array(
										'type'         => 'switch',
										'value'        => 'disable',
										'attr'         => array('class' => 'cache_modify_listener'),
										'label'        => esc_html__( 'Cache Preload', 'solala' ),
										'desc'         => esc_html__( 'Automatically prime the page cache.', 'solala' ),
										'left-choice'  => array(
											'value' => 'enable',
											'label' => esc_html__( 'Enable', 'solala' ),
										),
										'right-choice' => array(
											'value' => 'disable',
											'label' => esc_html__( 'Disable', 'solala' ),
										)
									),
								),
								'choices'      => array(
									'enable' => array(
										'page_cache_time' => array(
											'type'  => 'short-text',
											'attr'  => array('class' => 'cache_modify_listener'),
											'label' => esc_html__('Cache Time', 'solala'),
											'desc'  => esc_html__('How long should cached pages remain fresh? Set to 0 to disable garbage collection. A good starting point is 3600 seconds.', 'solala'),
											'value' => '3600'
										),
										'cache_scheduler_time' => array(
											'type'  => 'datetime-picker',
											'attr'  => array('class' => 'cache_modify_listener'),
											'label' => esc_html__('Scheduler Clear Cache', 'solala'),
											'desc'  => esc_html__('Check for stale cached files at this time (UTC) or starting at this time every interval below.', 'solala'),
											'datetime-picker' => array(
												'format'        => 'H:i',
												'timepicker'    => true,
												'datepicker'    => false,
												'defaultTime'   => '12:00'
											),
										),
										'cache_scheduler_interval' => array(
											'type'  => 'select',
											'attr'  => array('class' => 'cache_modify_listener'),
											'label' => esc_html__('Scheduler Clear Cache Interval', 'solala'),
											'choices' => $interval_option_array,
										),
									)
								)
							),
						),
					),
					'page_cache_update_box'        => array(
						'title'   => esc_html__( 'Cache Update Configuration', 'solala' ),
						'type'    => 'box',
						'options' => array(
							'cache_refresh_update_post' => array(
								'label' => esc_html__('When Update Post', 'solala'),
								'type'  => 'checkboxes',
								'attr'  => array('class' => 'cache_modify_listener'),
								'desc'  => esc_html__('Auto update when edit, delete, publish, trash post.', 'solala'),
								'value' => array(
									'post'     => true,
									'front'    => true,
									'category' => true
								),
								'choices' => array(
									'post'     => esc_html__('Update edited posts', 'solala'),
									'front'    => esc_html__('Update front page and posts page', 'solala'),
									'category' => esc_html__('Update category page', 'solala')
								),
							),
							'cache_refresh_post_comment' => array(
								'label' => esc_html__('When Post Comment', 'solala'),
								'type'  => 'checkbox',
								'attr'  => array('class' => 'cache_modify_listener'),
								'text'  => esc_html__('Auto refresh cache when post, edit, approve user comment.', 'solala'),
								'value' => false,
							),
							'cache_refresh_switch_theme' => array(
								'label' => esc_html__('When Switch Theme', 'solala'),
								'type'  => 'checkbox',
								'attr'  => array('class' => 'cache_modify_listener'),
								'text'  => esc_html__('Auto refresh all cache. Include all cache content you selected', 'solala'),
								'value' => false,
							),
							'cache_refresh_update_nav_menu' => array(
								'label' => esc_html__('When Update Nav Menu', 'solala'),
								'type'  => 'checkbox',
								'attr'  => array('class' => 'cache_modify_listener'),
								'text'  => esc_html__('Auto clear all cache. Where used this nav menu', 'solala'),
								'value' => false,
							),
							'cache_refresh_user_profile' => array(
								'label' => esc_html__('When Update User Profile', 'solala'),
								'type'  => 'checkboxes',
								'attr'  => array('class' => 'cache_modify_listener'),
								'desc'  => esc_html__('Update cache when user update profile.', 'solala'),
								'choices' => array(
									'author' => esc_html__('Update page author', 'solala'),
									'post'   => esc_html__('Update posts belong to this user', 'solala'),
								),
							),
						)
					),
					'page_cache_reject_box'        => array(
						'title'   => esc_html__( 'Reject Cache Configuration', 'solala' ),
						'type'    => 'box',
						'options' => $page_cache_reject
					)
				)
			),
		)
	)
);

