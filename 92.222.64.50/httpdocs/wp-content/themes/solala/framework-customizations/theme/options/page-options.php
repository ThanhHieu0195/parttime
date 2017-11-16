<?php if ( ! defined( 'SLZ' ) ) {
    die( 'Forbidden' );
}
$title_type = array(
	'default'    => esc_html__(' Default','solala'),
	'title'      => esc_html__(' Post Title','solala'),
	'level'      => esc_html__(' Category','solala'),
	'custom'     => esc_html__(' Custom','solala'),
);
if( is_admin() ) {
	$screen = get_current_screen();
	if($screen && $screen->post_type == 'page' ) {
		$title_type = array(
			'default'    => esc_html__(' Default','solala'),
			'title'      => esc_html__(' Page Title','solala'),
			'custom'     => esc_html__(' Custom','solala'),
		);
	}
}
$options = array(
	'page-title' => array(
		'title'   => esc_html__( 'Page Header', 'solala' ),
		'type'    => 'tab',
		'options' => array(
			'pagetitle-options'   => array(
				'type'         => 'multi-picker',
				'label'        => false,
				'desc'         => false,
				'picker'       => array(
					'enable-page-option' => array(
						'type'         => 'switch',
						'value'        => 'yes',
						'label'        => esc_html__( 'Default Setting', 'solala' ),
						'left-choice'  => array(
							'value' => 'disable',
							'label' => esc_html__( 'Default', 'solala' ),
						),
						'right-choice' => array(
							'value' => 'enable',
							'label' => esc_html__( 'Custom', 'solala' ),
						)
					),
				),
				'choices'      => array(
					'enable' => array(
						'group-pagetitle'   => array(
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
									'bg-image'   => array(
										'type'         => 'multi-picker',
										'label'        => false,
										'desc'         => false,
										'picker'       => array(
											'bg-image-type'	=> array(
												'type'  => 'radio',
												'value' => 'upload-image',
												'attr'  => array( 'class' => 'custom-class', 'data-foo' => 'bar' ),
												'label' => esc_html__('Background Image', 'solala'),
												'choices' => array(
													'upload-image' => esc_html__('Upload Image', 'solala'),
													'feature-image' => esc_html__('Featured Image', 'solala'),
												),
												'inline' => true,
											),
										),
										'choices'      => array(
											'upload-image' => array(
												'background-image'	=> array(
													'label'   => esc_html__( 'Image', 'solala' ),
													'type'    => 'background-image',
													'value'   => 'none',
													'desc'    => esc_html__( 'Upload an image to make background image',
														'solala' ),
			
												),
											)
										),
									),
//									'height'        => array(
//										'type'  => 'short-text',
//										'label' => esc_html__( 'Page Header Height', 'solala' ),
//										'desc'  => esc_html__( 'Enter heigth in pixels. Ex:80 ', 'solala' ),
//										'value' => '80',
//									),
                                    'padding-top'        => array(
                                        'type'  => 'short-text',
                                        'label' => esc_html__( 'Page Padding top', 'solala' ),
                                        'desc'  => esc_html__( 'Page Enter heigth in pixels. Ex:80 ', 'solala' ),
                                        'value' => '80',
                                    ),
                                    'padding-bottom'        => array(
                                        'type'  => 'short-text',
                                        'label' => esc_html__( 'Padding bottom', 'solala' ),
                                        'desc'  => esc_html__( 'Enter heigth in pixels. Ex:80 ', 'solala' ),
                                        'value' => '80',
                                    ),
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
									'type-of-title'	=>	array(
										'type'         => 'multi-picker',
										'label'        => false,
										'desc'         => false,
										'picker'       => array(
											'title-type' => array(
												'type'  => 'radio',
												'value' => '',
												'attr'  => array( 'class' => 'custom-class', 'data-foo' => 'bar' ),
												'label' => esc_html__('Choose Title', 'solala'),
												'choices' => $title_type,
												'desc'    => esc_html__( 'Choose title to display in page header. To get setting from "Theme Setting", choose "Default"','solala' ),
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
							),
						),
					),
				),
				'show_borders' => true,
			),
		)
	),
);