<?php if ( ! defined( 'SLZ' ) ) {
	die( 'Forbidden' );
}

$post_ext = slz_ext('posts');

if ( empty( $post_ext ) )
	return;

$regist_sidebars = array_merge( array( '' => esc_html__('-- Select widget area --', 'solala') ), SLZ_Com::get_regist_sidebars() );
$sidebar_layout = array(
	'left' => array(
		'small' => array(
			'height' => 50,
			'src'    => SOLALA_OPTION_IMG_URI . '/sidebar/left.png'
		)
	),
	'right' => array(
		'small' => array(
			'height' => 50,
			'src'    => SOLALA_OPTION_IMG_URI . '/sidebar/right.png'
		)
	),
	'none' => array(
		'small' => array(
			'height' => 50,
			'src'    => SOLALA_OPTION_IMG_URI . '/sidebar/full.png'
		)
	),
);
$social_box = array(
	'type'   => 'multi-picker',
	'label'  => false,
	'picker' => array(
		'enable-social-share' => array(
			'type'        => 'switch',
			'value'       => 'disable',
			'label'       => esc_html__( 'Social Share', 'solala' ),
			'desc'   => esc_html__( 'Enable social share links in single pages ?', 'solala' ),
			'left-choice' => array(
				'value' => 'disable',
				'label' => esc_html__( 'Disable', 'solala' ),
			),
			'right-choice' => array(
				'value' => 'enable',
				'label' => esc_html__( 'Enable', 'solala' ),
			)
		),
	),
	'choices'    => array(
		'enable' => array(
			'social-share-info' => array(
				'label'  => esc_html__( 'Add Social', 'solala' ),
				'type'   => 'addable-option',
				'option' => array(
					'type'  => 'select',
					'choices' => array(
						'facebook'    => esc_html__('Facebook', 'solala'),
						'twitter'     => esc_html__('Twitter', 'solala'),
						'google-plus' => esc_html__('Google Plus', 'solala'),
						'pinterest'   => esc_html__('Pinterest', 'solala'),
						'linkedin'    => esc_html__('Linkedint', 'solala'),
						'digg'        => esc_html__('Digg', 'solala'),
					)
				),
			),
			'social-share-count' => array(
				'type'   => 'multi-picker',
				'label'  => false,
				'desc'   => false,
				'picker' => array(
					'enable-social-share-count' => array(
						'type'        => 'switch',
						'value'       => 'disable',
						'label'       => esc_html__( 'Share Count', 'solala' ),
						'desc'        => esc_html__( 'Enable social share count in single pages ?', 'solala' ),
						'left-choice' => array(
							'value' => 'disable',
							'label' => esc_html__( 'Disable', 'solala' ),
						),
						'right-choice' => array(
							'value' => 'enable',
							'label' => esc_html__( 'Enable', 'solala' ),
						)
					),
				),
				'choices'    => array(
					'enable' => array(
						'social-share-facebook-appid' => array(
							'type'  => 'text',
							'label' => esc_html__('Facebook App ID', 'solala'),
							'desc'  => esc_html__( 'Enter App ID to get the share count of Facebook.', 'solala' ),
						),
						'social-share-facebook-secret-key' => array(
							'type'  => 'text',
							'label' => esc_html__('Facebook Secret Key', 'solala'),
							'desc'  => esc_html__( 'Enter Secret Key to get the share count of Facebook.', 'solala' ),
						),
					),
				),
			),
		),
	),
);
//-------------------------------------------------------------------------//

$posts_tab = array (
	'title'   => esc_html__( 'Post Settings', 'solala' ),
	'type'    => 'tab',
	'options' => array(
		'posts-box'        => array(
			'title'   => esc_html__( 'Post Layout', 'solala' ),
			'type'    => 'box',
			'options' => array(
				'blog-layout'	=> array(
					'type'    => 'image-picker',
					'label'   => esc_html__( 'Blog Style', 'solala' ),
					'desc'    => esc_html__( 'Select the blog display style', 'solala' ),
					'choices' => $post_ext->get_post_choices(),
					'value'   => SLZ_Com::get_first( $post_ext->get_post_choices() ),
				),
				'blog-sidebar-layout'    => array(
					'label' => esc_html__( 'Sidebar Layout', 'solala' ),
					'desc'  => esc_html__( 'Set how to display sidebar in single pages.', 'solala' ),
					'type'  => 'image-picker',
					'choices' =>$sidebar_layout,
					'value' => 'left'
				),
				'blog-sidebar' => array(
					'type'    => 'select',
					'label'   => esc_html__('Post Sidebar', 'solala'),
					'desc'    => esc_html__('You can create new sidebar in','solala').' <br><a href="' . esc_url( admin_url( 'widgets.php' ) ) . '" >'.esc_html__('Appearance > Widgets','solala').'</a>',
					'choices' => $regist_sidebars,
				),
			)
		),
		'post-info-box' => array(
			'title'   => esc_html__( 'Post Info', 'solala' ),
			'type'    => 'box',
			'options' => array(
				'post-info' => array(
					'label'  => esc_html__( 'Select Post Info', 'solala' ),
					'type'   => 'addable-option',
					'option' => array(
						'type'  => 'select',
						'choices' => array(
							'date'     => esc_html__('Date', 'solala'),
							'author'   => esc_html__('Author', 'solala'),
							'category' => esc_html__('Category', 'solala'),
							'tag'      => esc_html__('Tag', 'solala'),
							'comment'  => esc_html__('Comment Count', 'solala'),
							'view'     => esc_html__('View Count', 'solala'),
							'like'     => esc_html__('Like Count', 'solala'),
						)
					),
					'value'  => array( 'author', 'date', 'comment' ),
					'desc'   => esc_html__( 'Select post info to show in single pages and blocks.', 'solala' ),
				),
			)
		),
		'related-box' => array(
			'title'   => esc_html__( 'Related Articles', 'solala' ),
			'type'    => 'box',
			'options' => array(
				'blog-article'   => array(
					'type'         => 'multi-picker',
					'label'        => false,
					'desc'         => false,
					'picker'       => array(
						'status' => array(
							'label'        => esc_html__( 'Show Related Articles', 'solala' ),
							'desc'         => esc_html__( 'Show related articles in single pages ?', 'solala' ),
							'type'         => 'switch',
							'right-choice' => array(
								'value' => 'show',
								'label' => esc_html__( 'Show', 'solala' )
							),
							'left-choice'  => array(
								'value' => 'hide',
								'label' => esc_html__( 'Hide', 'solala' )
							),
							'value'        => 'hide',
						)
					),
					'choices'      => array(
						'show' => array(
							'filter-by' => array(
								'label'        => esc_html__( 'Filter By', 'solala' ),
								'desc'         => esc_html__( 'Filter related articles by ?', 'solala' ),
								'type'         => 'switch',
								'right-choice' => array(
									'value' => 'category',
									'label' => esc_html__( 'By Category', 'solala' )
								),
								'left-choice'  => array(
									'value' => 'tag',
									'label' => esc_html__( 'By Tag', 'solala' )
								),
								'value'        => 'category',
							),
							'limit' => array(
								'type'  => 'short-text',
								'label' => esc_html__( 'Article Post Limit', 'solala' ),
								'desc'  => esc_html__( 'Total post of related article will be show. Ex: 6', 'solala' ),
								'value' => '6',
							),
							'order_by' => array(
								'type'    => 'select',
								'label'   => esc_html__('Article Order By', 'solala'),
								'desc'    => esc_html__('Order the post in related article by ?', 'solala'),
								'choices' => array(
									'id'     => esc_html__('ID', 'solala'),
									'title'  => esc_html__('Title', 'solala'),
									'date'   => esc_html__('Date', 'solala'),
									'author' => esc_html__('Author', 'solala'),
									'random' => esc_html__('Random', 'solala')
								),
							),
							'order' => array(
								'type'    => 'select',
								'label'   => esc_html__('Article Order', 'solala'),
								'desc'    => esc_html__('Order the post in related article with ascending or descending mode ?', 'solala'),
								'choices' => array(
									'desc'  => esc_html__('Desc', 'solala'),
									'asc'   => esc_html__('Asc', 'solala')
								),
							)
						),
					),
					'show_borders' => true,
				),
			)
		),
		'post-content-box' => array(
			'title'   => esc_html__( 'Other Settings', 'solala' ),
			'type'    => 'box',
			'options' => array(
				'blog-post-tags' => array(
					'label'        => esc_html__( 'Post Tags', 'solala' ),
					'desc'         => esc_html__( 'Show list of post tags in single pages?', 'solala' ),
					'type'         => 'switch',
					'right-choice' => array(
						'value' => 'yes',
						'label' => esc_html__( 'Yes', 'solala' )
					),
					'left-choice'  => array(
						'value' => 'no',
						'label' => esc_html__( 'No', 'solala' )
					),
					'value'        => 'yes',
				),
				'blog-post-categories' => array(
					'label'        => esc_html__( 'Post Categories', 'solala' ),
					'desc'         => esc_html__( 'Show list of post categories in single pages ?', 'solala' ),
					'type'         => 'switch',
					'right-choice' => array(
						'value' => 'yes',
						'label' => esc_html__( 'Yes', 'solala' )
					),
					'left-choice'  => array(
						'value' => 'no',
						'label' => esc_html__( 'No', 'solala' )
					),
					'value'        => 'yes',
				),
				'blog-post-author-box' => array(
					'label'        => esc_html__( 'Author Box', 'solala' ),
					'desc'         => esc_html__( 'Show author box in single pages?', 'solala' ),
					'type'         => 'switch',
					'right-choice' => array(
						'value' => 'yes',
						'label' => esc_html__( 'Yes', 'solala' )
					),
					'left-choice'  => array(
						'value' => 'no',
						'label' => esc_html__( 'No', 'solala' )
					),
					'value'        => 'yes',
				),
				'blog-post-post-navigation' => array(
					'label'        => esc_html__( 'Post Navigation', 'solala' ),
					'desc'         => esc_html__( 'Show post navigation in single pages ?', 'solala' ),
					'type'         => 'switch',
					'right-choice' => array(
						'value' => 'yes',
						'label' => esc_html__( 'Yes', 'solala' )
					),
					'left-choice'  => array(
						'value' => 'no',
						'label' => esc_html__( 'No', 'solala' )
					),
					'value'        => 'yes',
				),
				'social-in-post' => $social_box,// end social
			),
		),
	),
);

$options_tab = array(
	$posts_tab,
);
$active_posttype_ext = slz()->theme->get_config('active_posttype_ext');
$option_title = array(
	'slz-portfolio'   => esc_html__( 'Portfolio Settings', 'solala' ),
	'slz-event'        => esc_html__( 'Event Settings', 'solala' ),
	'slz-team'        => esc_html__( 'Team Settings', 'solala' ),
	'product'         => esc_html__( 'Product Settings', 'solala'),
);
foreach( $active_posttype_ext as $option => $extension ) {
	// check extension is activated
	if( ( $option != 'product' && ! slz_ext( $extension ) ) || ( $option == 'product' && ! SOLALA_WC_ACTIVE ) ) {
		continue;
	}
	$posttype = str_replace( 'slz-', '', $option );
	
	$box = array(
		'post-layout-box' => array(
			'title'   => $option_title[$option],
			'type'    => 'box',
			'options' => array(
				$posttype .'-sidebar-layout' => array(
					'label' => esc_html__( 'Sidebar Layout', 'solala' ),
					'desc'  => esc_html__( 'Set how to display sidebar in service single pages.', 'solala' ),
					'type'  => 'image-picker',
					'choices' => $sidebar_layout,
					'value' => 'left'
				),
				$posttype .'-sidebar'  =>  array(
					'type'  => 'select',
					'label' => esc_html__('Choose Sidebar', 'solala'),
					'desc'  => esc_html__('You can create new sidebar in','solala').' <br><a href="' . esc_url( admin_url( 'widgets.php' ) ) . '" >'.esc_html__('Appearance > Widgets','solala').'</a>',
					'choices' => $regist_sidebars,
				),
			)
		)
	); // box options

	$options_tab[] = array(
		$posttype .'-tab' => array(
			'title'   => $option_title[$option],
			'type'    => 'tab',
			'options' => $box,
		)
	);
}

$options = array(
	'posts'          => array(
		'title'   => esc_html__( 'Post Settings', 'solala' ),
		'type'    => 'tab',
		'options' => $options_tab
	),
);