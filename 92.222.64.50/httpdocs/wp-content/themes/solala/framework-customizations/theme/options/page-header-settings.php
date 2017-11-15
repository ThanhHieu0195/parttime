<?php if ( ! defined( 'SLZ' ) ) {
	die( 'Forbidden' );
}
$align = array(
	'left'   => esc_html__('Left','solala'),
	'right'  => esc_html__('Right','solala'),
	'center' => esc_html__('Center','solala')
	);

$general_box = array(
	'general-content-box' => array(
		'title'   => esc_html__( 'Area Setting', 'solala' ),
		'type'    => 'box',
		'options' => array(
			'bg-color'    => array(
				'label'   => esc_html__( 'Background Color', 'solala' ),
				'desc'    => esc_html__( "Select the page header background color", 'solala' ),
				'value'   => '',
				'choices' => SLZ_Com::get_palette_color(),
				'type'    => 'color-palette'
			),
			'bg-image'   => array(
				'type'         => 'multi-picker',
				'label'        => false,
				'desc'         => false,
				'picker'       => array(
					'bg-image-type' => array(
						'type'  => 'radio',
						'value' => 'upload-image',
						'attr'  => array( 'class' => 'custom-class', 'data-foo' => 'bar' ),
						'label' => esc_html__('Background Image', 'solala'),
						'choices' => array(
							'upload-image'  => esc_html__('Upload Image', 'solala'),
							'feature-image' => esc_html__('Featured Image', 'solala'),
						),
						'inline' => true,
					),
				),

				'choices'      => array(
					'upload-image' => array(
						'background-image' => array(
							'label'   => esc_html__( 'Image', 'solala' ),
							'type'    => 'background-image',
							'value'   => 'none',
							'desc'    => esc_html__( 'Upload an image to make background image', 'solala' ),
						),
					)
				),
			),
            'bg-icon' => array(
                'type'    => 'icon-v2',
                'label'   => esc_html__('Icon', 'solala'),
            ),
			'bg-attachment' => array(
				'type'    => 'select',
				'label'   => esc_html__('Background Attachment', 'solala'),
			),
			'bg-size' => array(
				'type'    => 'select',
				'label'   => esc_html__('Background Size', 'solala'),
				'choices' => SLZ_Params::get('option-bg-size'),
			),
			'bg-position' => array(
				'type'    => 'select',
				'label'   => esc_html__('Background Position', 'solala'),
				'choices' => SLZ_Params::get('option-bg-position'),
			),
			'text-align'  => array(
				'type'    => 'select',
				'label'   => esc_html__('Page Header Align', 'solala'),
				'choices' => $align,
			),
            'padding-top'    => array(
                'type'  => 'short-text',
                'label' => esc_html__( 'Padding top', 'solala' ),
                'desc'  => esc_html__( 'Enter heigth in pixels. Ex:80 ', 'solala' ),
                'value' => '80',
            ),
            'padding-bottom'    => array(
                'type'  => 'short-text',
                'label' => esc_html__( 'Padding bottom', 'solala' ),
                'desc'  => esc_html__( 'Enter heigth in pixels. Ex:80 ', 'solala' ),
                'value' => '80',
            ),
		),
	),
);
$general_title_box = array(
	'title-content-box' => array(
		'title'   => esc_html__( 'Title Setting', 'solala' ),
		'type'    => 'box',
		'options' => array(
			'general-pagetitle-title'   => array(
				'type'         => 'multi-picker',
				'label'        => false,
				'desc'         => false,
				'picker'       => array(
					'enable-pt-title' => array(
						'type'         => 'switch',
						'value'        => 'enable',
						'label'        => esc_html__( 'Title On Page Header', 'solala' ),
						'left-choice'  => array(
							'value' => 'disable',
							'label' => esc_html__( 'Disable', 'solala' ),
						),
						'right-choice' => array(
							'value' => 'enable',
							'label' => esc_html__( 'Enable', 'solala' ),
						)
					),
				),
				'choices'      => array(
					'enable' => array(
						'type-of-title' => array(
							'type'         => 'multi-picker',
							'label'        => false,
							'desc'         => false,
							'picker'       => array(
								'title-type' => array(
									'type'  => 'radio',
									'value' => 'title',
									'attr'  => array( 'class' => 'custom-class', 'data-foo' => 'bar' ),
									'label' => esc_html__('Choose Title', 'solala'),
									'choices' => array(
										'title'      => esc_html__('Page Title','solala'),
										'custom'     => esc_html__('Custom','solala'),
									),
									'inline' => true,
								),
							),
							'choices'      => array(
								'custom' => array(
									'custom-title' => array(
										'label'   => esc_html__( 'Custom Title', 'solala' ),
										'type'    => 'text',
										'value'   => '',
										'desc'    => esc_html__( 'Enter custom title to display in page header', 'solala' ),
									),
								)
							),
						),
						'title-typography' => array(
							'type'         => 'typography',
							'label'        => esc_html__( 'Styling', 'solala' ),
							'value' => array(
								'size'   => 60,
								'color'  => '#fefeff'
							),
							'components' => array(
								'family' => false,
							),
						),
					),
				),
			),
		),
	),
);
$post_title_box = array(
	'title-content-box' => array(
		'title'   => esc_html__( 'Title Setting', 'solala' ),
		'type'    => 'box',
		'options' => array(
			'general-pagetitle-title'   => array(
				'type'         => 'multi-picker',
				'label'        => false,
				'desc'         => false,
				'picker'       => array(
					'enable-pt-title' => array(
						'type'         => 'switch',
						'value'        => 'enable',
						'label'        => esc_html__( 'Title On Page Header', 'solala' ),
						'left-choice'  => array(
							'value' => 'disable',
							'label' => esc_html__( 'Disable', 'solala' ),
						),
						'right-choice' => array(
							'value' => 'enable',
							'label' => esc_html__( 'Enable', 'solala' ),
						)
					),
				),
				'choices'      => array(
					'enable' => array(
						'type-of-title' => array(
							'type'         => 'multi-picker',
							'label'        => false,
							'desc'         => false,
							'picker'       => array(
								'title-type' => array(
									'type'  => 'radio',
									'value' => 'level',
									'attr'  => array( 'class' => 'custom-class', 'data-foo' => 'bar' ),
									'label' => esc_html__('Choose Title', 'solala'),
									'choices' => array(
										'title'      => esc_html__( 'Post Title','solala' ),
										'level'      => esc_html__( 'Category','solala' ),
										'custom'     => esc_html__( 'Custom','solala' ),
									),
									'inline' => true,
								),
							),
							'choices'      => array(
								'custom' => array(
									'custom-title' => array(
										'label'   => esc_html__( 'Custom Title', 'solala' ),
										'type'    => 'text',
										'value'   => '',
										'desc'    => esc_html__( 'Enter custom title to display in page header', 'solala' ),
									),
								)
							),
						),
						'title-typography' => array(
							'type'         => 'typography',
							'label'        => esc_html__( 'Styling', 'solala' ),
							'value' => array(
								'size'   => 60,
								'color'  => '#fefeff'
							),
							'components' => array(
								'family' => false,
							),
						),
					),
				),
			),
		),
	),
);
$breadcrumb_box = array(
	'breadcrumb-content-box'	=> array(
		'title'   => esc_html__( 'Breadcrumb Setting', 'solala' ),
		'type'    => 'box',
		'options' => array(
			'general-pagetitle-bc'   => array(
				'type'         => 'multi-picker',
				'label'        => false,
				'desc'         => false,
				'picker'       => array(
					'enable-pt-breadcrumb' => array(
						'type'         => 'switch',
						'value'        => 'enable',
						'label'        => esc_html__( 'Breadcrumb On Page Header', 'solala' ),
						'left-choice'  => array(
							'value' => 'disable',
							'label' => esc_html__( 'Disable', 'solala' ),
						),
						'right-choice' => array(
							'value' => 'enable',
							'label' => esc_html__( 'Enable', 'solala' ),
						)
					),
				),
				'choices'      => array(
					'enable' => array(
						'breadcrumb' => array(
							'type'         => 'typography',
							'label'        => esc_html__( 'Breadcrumb Styling', 'solala' ),
							'value' => array(
								'size'   => 14,
								'color'  => '#fefeff'
							),
							'components' => array(
								'family' => false,
							),
						),
						'breadcrumb-active' => array(
							'type'         => 'typography',
							'label'        => esc_html__( 'Breadcrumb Active Styling', 'solala' ),
							'value' => array(
								'size'   => 14,
								'color'  => '#fefeff'
							),
							'components' => array(
								'family' => false,
							),
						),
					),
				),
			),
		),
	)
);

$general_tab = array(
	'title'   => esc_html__( 'General', 'solala' ),
	'type'    => 'tab',
	'options' => array(
		'general-pagetitle'   => array(
			'type'         => 'multi-picker',
			'label'        => false,
			'desc'         => false,
			'picker'       => array(
				'enable-page-title' => array(
					'type'         => 'switch',
					'value'        => 'enable',
					'label'        => esc_html__( 'Page Header Area', 'solala' ),
					'left-choice'  => array(
						'value' => 'disable',
						'label' => esc_html__( 'Disable', 'solala' ),
					),
					'right-choice' => array(
						'value' => 'enable',
						'label' => esc_html__( 'Enable', 'solala' ),
					)
				),
			),
			'choices'      => array(
				'enable' => array(
					$general_box,
					$general_title_box,
					$breadcrumb_box
				),
			),
		),
	),
); // general tab

$post_tab = array(
	'title'   => esc_html__( 'Posts', 'solala' ),
	'type'    => 'tab',
	'options' => array(
		'post-pagetitle'   => array(
			'type'         => 'multi-picker',
			'label'        => false,
			'desc'         => false,
			'picker'       => array(
				'enable-page-title' => array(
					'type'         => 'switch',
					'value'        => 'enable',
					'label'        => esc_html__( 'Page Header Area', 'solala' ),
					'left-choice'  => array(
						'value' => 'disable',
						'label' => esc_html__( 'Disable', 'solala' ),
					),
					'right-choice' => array(
						'value' => 'enable',
						'label' => esc_html__( 'Enable', 'solala' ),
					)
				),
			),
			'choices'      => array(
				'enable' => array(
					$general_box,
					$post_title_box,
					$breadcrumb_box
				),
			),
		),
	),
); // post tab

$options_tab = array(
	$general_tab,
	$post_tab,
); // option tab
$active_posttype_ext = slz()->theme->get_config('active_posttype_ext');
$option_title = array(
	'slz-portfolio'   => esc_html__( 'Portfolio', 'solala' ),
	'slz-event'       => esc_html__( 'Event', 'solala' ),
	'slz-team'        => esc_html__( 'Team', 'solala' ),
	'product'         => esc_html__( 'Product', 'solala'),
);
foreach( $active_posttype_ext as $option => $extension ) {
	// check extension is activated
	if( ( $option != 'product' && ! slz_ext( $extension ) ) || ( $option == 'product' && ! SOLALA_WC_ACTIVE ) ) {
		continue;
	}
	$posttype = str_replace( 'slz-', '', $option );
	$options_tab[] =  array(
		$posttype.'-tab' => array(
			'title'   => $option_title[$option],
			'type'    => 'tab',
			'options' => array(
				$option.'-pagetitle' => array(
					'type'         => 'multi-picker',
					'label'        => false,
					'desc'         => false,
					'picker'       => array(
						'enable-page-title' => array(
							'type'         => 'switch',
							'value'        => 'enable',
							'label'        => esc_html__( 'Page Header Area', 'solala' ),
							'left-choice'  => array(
								'value' => 'disable',
								'label' => esc_html__( 'Disable', 'solala' ),
							),
							'right-choice' => array(
								'value' => 'enable',
								'label' => esc_html__( 'Enable', 'solala' ),
							),
						),
					),
					'choices'      => array(
						'enable' => array(
							$general_box,
							$post_title_box,
							$breadcrumb_box
						),
					),
				),
			),
		),
	);
}

$options = array(
	'page-title' => array(
		'title'   => esc_html__( 'Page Header', 'solala' ),
		'type'    => 'tab',
		'options' => $options_tab,
	)
);
