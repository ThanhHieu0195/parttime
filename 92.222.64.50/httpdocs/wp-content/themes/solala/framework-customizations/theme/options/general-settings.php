<?php if ( ! defined( 'SLZ' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'general' => array(
		'title'   => esc_html__( 'General', 'solala' ),
		'type'    => 'tab',
		'options' => array(
			'general-tab' => array(
				'title'   => esc_html__( 'General', 'solala' ),
				'type'    => 'tab',
				'options' => array(
					'general-box' => array(
						'title'   => esc_html__( 'Global Settings', 'solala' ),
						'type'    => 'box',
						'options' => array(
							'layout-group' => array(
								'type'   => 'multi-picker',
								'label'  => false,
								'desc'   => false,
								'picker' => array(
									'layout' => array(
										'label' => esc_html__( 'Site Layout', 'solala' ),
										'desc'  => esc_html__( 'This option will change layout for all pages of theme.', 'solala' ),
										'type'  => 'image-picker',
										'choices' => array(
											'full' => array(
												'small' => array(
													'height' => 70,
													'src'    => SOLALA_OPTION_IMG_URI .'/layout-full.jpg'
												),
												'large' => array(
													'height' => 214,
													'src'    => SOLALA_OPTION_IMG_URI .'/layout-full.jpg'
												),
											),
											'boxed' => array(
												'small' => array(
													'height' => 70,
													'src'    => SOLALA_OPTION_IMG_URI .'/layout-boxed.jpg'
												),
												'large' => array(
													'height' => 214,
													'src'    => SOLALA_OPTION_IMG_URI .'/layout-boxed.jpg'
												),
											),
										),
										'value' => 'full'
									),
								),
								'choices' => array(
									'full' => array(
										'bg-color' => array(
											'label'   => esc_html__( 'Background Color', 'solala' ),
											'desc'    => esc_html__( "Select background color to your's site", 'solala' ),
											'value'   => '',
											'choices' => SLZ_Com::get_palette_color(),
											'type'    => 'color-palette'
										),
									),
									'boxed' => array(
										'boxed-width' => array(
											'type'  => 'slider',
											'value' => 1200,
											'properties' => array(
												'min' => 700,
												'max' => 1920,
												'step' => 1,
											),
											'label' => esc_html__('Boxed Width', 'solala'),
											'desc'  => esc_html__('Select the website width', 'solala'),
										),
										'bg-color' => array(
											'label'   => esc_html__( 'Background Color', 'solala' ),
											'desc'    => esc_html__( "Select the boxed background color", 'solala' ),
											'value'   => '',
											'choices' => SLZ_Com::get_palette_color(),
											'type'    => 'color-palette'
										),
										'boxed-background'	=> array(
											'label'   => esc_html__( 'Background Image', 'solala' ),
											'type'    => 'background-image',
											'value'   => 'none',
											'choices' => array(
												'none' => array(
													'icon' => SOLALA_OPTION_IMG_URI .'/patterns/no_pattern.jpg',
													'css'  => 'none',
												),
												'bg-1' => array(
													'icon' => SOLALA_OPTION_IMG_URI .'/patterns/diagonal_bottom_to_top_pattern_preview.jpg',
													'css' => 'none',
												),
												'bg-2' => array(
													'icon' => SOLALA_OPTION_IMG_URI .'/patterns/diagonal_top_to_bottom_pattern_preview.jpg',
													'css' => 'none',
												),
												'bg-3' => array(
													'icon' => SOLALA_OPTION_IMG_URI .'/patterns/dots_pattern_preview.jpg',
													'css' => 'none',
												),
												'bg-4' => array(
													'icon' => SOLALA_OPTION_IMG_URI .'/patterns/romb_pattern_preview.jpg',
													'css' => 'none',
												),
												'bg-5' => array(
													'icon' => SOLALA_OPTION_IMG_URI .'/patterns/square_pattern_preview.jpg',
													'css' => 'none',
												),
												'bg-6' => array(
													'icon' => SOLALA_OPTION_IMG_URI .'/patterns/noise_pattern_preview.jpg',
													'css' => 'none',
												),
												'bg-7' => array(
													'icon' => SOLALA_OPTION_IMG_URI .'/patterns/vertical_lines_pattern_preview.jpg',
													'css' => 'none',
												),
												'bg-8' => array(
													'icon' => SOLALA_OPTION_IMG_URI .'/patterns/waves_pattern_preview.jpg',
													'css' => 'none',
												),
											),
											'desc' => esc_html__( 'Select background image or try to upload new image.',
												'solala' ),
										),
										'boxed-alignment' => array(
											'label' => esc_html__( 'Website Alignment', 'solala' ),
											'desc'  => esc_html__( 'Choose the website alignment.', 'solala' ),
											'type'  => 'image-picker',
											'choices' => array(
												'left' => array(
													'small' => array(
														'height' => 60,
														'src'	=> SOLALA_OPTION_IMG_URI .'/position/left-position.jpg'
													),
												),
												'center' => array(
													'small' => array(
														'height' => 60,
														'src'    => SOLALA_OPTION_IMG_URI .'/position/center-position.jpg'
													),
												),
												'right' => array(
													'small' => array(
														'height' => 60,
														'src'    => SOLALA_OPTION_IMG_URI. '/position/right-position.jpg'
													),
												),
											),
											'value' => 'center'
										),
									)
								),
								'show_borders' => true,
							),
							'logo' => array(
								'type'  => 'upload',
								'label' => esc_html__('Site Logo Image', 'solala'),
								'desc'  => esc_html__('Upload the site logo .png or .jpg', 'solala'),
								'images_only' => true,
								'value' => '',
							),
							'logo-transparent'   => array(
								'type'   => 'multi-picker',
								'label'  => false,
								'desc'   => false,
								'picker' => array(
									'logo_transparent_options' => array(
										'type'  => 'switch',
										'value' => 'disable',
										'label' => esc_html__( 'Logo Transparent', 'solala' ),
										'left-choice' => array(
											'value' => 'enable',
											'label' => esc_html__( 'Enable', 'solala' ),
										),
										'right-choice' => array(
											'value' => 'disable',
											'label' => esc_html__( 'Disable', 'solala' ),
										)
									),
								),
								'choices' => array(
									'enable' => array(
										'logo-transparent'	=>	array(
										    'type'  => 'upload',
										    'label' => esc_html__('Site Logo Transparent', 'solala'),
										    'desc'  => esc_html__('Upload the site logo .png or .jpg use for header transparent', 'solala'),
										    'images_only' => true,
										    'value' => array(
										        'url' => SOLALA_LOGO_IMG_URI . '/logo_trans.png'
										    )
										),
									),
								),
							),
							'logo-text' => array(
								'type'  => 'text',
								'label' => esc_html__('Site Logo Text', 'solala'),
								'desc'  => esc_html__('You can use this field instead of above field "Site Logo Image".', 'solala'),
								'value' => get_bloginfo('name'),
							),
							'logo-alt'  => array(
								'type'  => 'text',
								'label' => esc_html__('Logo Alt Attribute', 'solala'),
								'desc'  => esc_html__('Appears inside the image container when the image can not be displayed. It helps search engines understand what an image is about.', 'solala'),
							),
							'logo-title' => array(
								'type'  => 'text',
								'label' => esc_html__('Logo Title Attribute', 'solala'),
								'desc'  => esc_html__('Used to provide a title for your image. It is displayed in a popup when a user takes their mouse over to an image.', 'solala'),
							),
							'scroll-to-top-group' => array(
								'type'    => 'group',
								'options' => array(
									'scroll-to-top-styling' => array(
										'attr'  => array(
											'data-advanced-for' => 'scroll-to-top-styling',
											'class'             => 'slz-advanced-button'
										),
										'type'          => 'popup',
										'label'         => esc_html__( 'Custom Style', 'solala' ),
										'desc'          => esc_html__( 'Change the style / typography of this shortcode', 'solala' ),
										'button'        => esc_html__( 'Styling', 'solala' ),
										'size'          => 'medium',
										'popup-options' => array(
											'icon-type'  => array(
												'type'   => 'multi-picker',
												'label'  => false,
												'desc'   => false,
												'picker' => array(
													'icon-box-img' => array(
														'label'   => esc_html__( 'Icon', 'solala' ),
														'desc'    => esc_html__( 'Select icon type', 'solala' ),
														'attr'    => array( 'class' => 'slz-checkbox-float-left' ),
														'type'    => 'radio',
														'value'   => 'icon-class',
														'choices' => array(
															'icon-class'  => esc_html__( 'Font Awesome', 'solala' ),
															'upload-icon' => esc_html__( 'Custom Upload', 'solala' ),
														),
													),
												),
												'choices' => array(
													'icon-class'  => array(
														'icon_class' => array(
															'type'  => 'icon',
															'value' => '',
															'label' => esc_html__( '', 'solala' )
														),
													),
													'upload-icon' => array(
														'upload-custom-img' => array(
															'label' => '',
															'type'  => 'upload',
															'help'  => esc_html__('For best results upload a square image, larger then 30px x 30px.', 'solala'),
														),
													),
												)
											),
											'bg-color' => array(
												'label'   => esc_html__( 'Background Color', 'solala' ),
												'desc'    => esc_html__( 'Select the background color', 'solala' ),
												'value'   => '',
												'choices' => SLZ_Com::get_palette_color(),
												'type'    => 'color-palette'
											),
											'text-color'  => array(
												'label'   => esc_html__( 'Text Color', 'solala' ),
												'desc'    => esc_html__( 'Select the text color', 'solala' ),
												'value'   => '',
												'choices' => SLZ_Com::get_palette_color(),
												'type'    => 'color-palette'
											),
										)
									),
									'enable-scroll-to' => array(
										'attr'        => array( 'class' => 'scroll-to-top-styling' ),
										'type'        => 'switch',
										'value'       => 'yes',
										'label'       => esc_html__( 'Button To Top', 'solala' ),
										'desc'        => esc_html__( 'Enable scroll to top?', 'solala' ),
										'left-choice' => array(
											'value' => 'no',
											'label' => esc_html__( 'Disable', 'solala' ),
										),
										'right-choice' => array(
											'value' => 'yes',
											'label' => esc_html__( 'Enable', 'solala' ),
										)
									),
									'enable-woo-account' => array(
										'type'        => 'switch',
										'value'       => 'disable',
										'label'       => esc_html__( 'WooCommerce Account', 'solala' ),
										'desc'        => esc_html__( 'Show WooCommerce account on header top right.', 'solala' ),
										'left-choice' => array(
											'value' => 'disable',
											'label' => esc_html__( 'Disable', 'solala' ),
										),
										'right-choice' => array(
											'value' => 'enable',
											'label' => esc_html__( 'Enable', 'solala'),
										)
									),
									'enable-wpml' => array(
										'type'         => 'switch',
										'value'        => 'no',
										'label'        => esc_html__( 'Language Switcher', 'solala' ),
										'desc'         => esc_html__( 'Show language switcher of WPML plugin on header top', 'solala' ),
										'left-choice'  => array(
											'value' => 'no',
											'label' => esc_html__( 'Hide', 'solala' ),
										),
										'right-choice' => array(
											'value' => 'yes',
											'label' => esc_html__( 'Show', 'solala' ),
										),
									),
									'map-key-api' => array(
										'type'  => 'text',
										'value' => '',
										'label' => esc_html__( 'Google Map - API Key', 'solala' ),
										'desc'  => esc_html__( 'This key is used to run a some feature of Google Map. Please refer document to create a key', 'solala' ),
									),
                                    'footer-banner-section' => array(
                                        'title'   => esc_html__( 'Footer Banner Settings', 'solala' ),
                                        'type'    => 'box',
                                        'options' => array(
                                            'footer-banner' => array(
                                                'type'	  => 'multi-picker',
                                                'label'   => false,
                                                'desc'	  => false,
                                                'picker'  => array(
                                                    'enable-footer-banner' => array(
                                                        'type'         => 'switch',
                                                        'value'        => 'hide',
                                                        'label'        => esc_html__( 'Show Banner?', 'solala' ),
                                                        'desc'         => esc_html__( 'Show banner in Footer', 'solala' ),
                                                        'left-choice'  => array(
                                                            'value' => 'hide',
                                                            'label' => esc_html__( 'Hide', 'solala' )
                                                        ),
                                                        'right-choice' => array(
                                                            'value' => 'show',
                                                            'label' => esc_html__( 'Show', 'solala' )
                                                        )
                                                    )
                                                ),
                                                'choices' => array(
                                                    'show'=> array(
                                                        'footer_banner_group' => array(
                                                            'type'   => 'multi-picker',
                                                            'label'  => false,
                                                            'desc'   => false,
                                                            'picker' => array(
                                                                'footer_banner_style' => array(
                                                                    'type'  => 'switch',
                                                                    'label' => esc_html__( 'Footer Banner Style', 'solala' ),
                                                                    'desc'  => esc_html__('Choose style for footer banner.', 'solala'),
                                                                    'value' => 'style-1',
                                                                    'left-choice' => array(
                                                                        'value' => 'style-1',
                                                                        'label' => esc_html__( 'Style 1', 'solala' ),
                                                                    ),
                                                                    'right-choice' => array(
                                                                        'value' => 'style-2',
                                                                        'label' => esc_html__( 'Style 2', 'solala' ),
                                                                    ),
                                                                )
                                                            ),
                                                            'choices'      => array(
                                                                'style-1' => array(
                                                                    'banner_content' => array(
                                                                        'type'          => 'wp-editor',
                                                                        'label'         => esc_html__('Banner Description', 'solala'),
                                                                        'desc'          => esc_html__('Enter description to display on banner.', 'solala'),
                                                                        'size'          => 'small',
                                                                        'editor_height' => 200,
                                                                        'wpautop'       => true,
                                                                        'editor_type'   => false
                                                                    ),
                                                                    'banner_button_text' => array(
                                                                        'type'  => 'text',
                                                                        'value' => '',
                                                                        'label' => esc_html__( 'Banner Button Text', 'solala'),
                                                                        'desc'  => esc_html__( 'Enter text for button banner.', 'solala' ),
                                                                    ),
                                                                    'banner_button_url' => array(
                                                                        'type'  => 'text',
                                                                        'value' => '',
                                                                        'label' => esc_html__( 'Banner Button URL', 'solala' ),
                                                                        'desc'  => esc_html__( 'Enter url for button banner.', 'solala' ),
                                                                    ),
                                                                    'styling' => array(
                                                                        'type'          => 'popup',
                                                                        'attr'          => array( 'class' => 'slz-advanced-button' ),
                                                                        'label'         => esc_html__( 'Custom Style', 'solala' ),
                                                                        'desc'          => esc_html__( 'Change the style of banner', 'solala' ),
                                                                        'button'        => esc_html__( 'Styling', 'solala' ),
                                                                        'size'          => 'medium',
                                                                        'popup-options' => array(
                                                                            'banner_image' => array(
                                                                                'type'  => 'upload',
                                                                                'label' => esc_html__('Banner Image', 'solala'),
                                                                                'desc'  => esc_html__('Upload an image to make banner image. .png or .jpg', 'solala'),
                                                                                'images_only' => true,
                                                                                'value' => '',
                                                                            ),
                                                                            'block-bg-color'     => array(
                                                                                'label'   => esc_html__( 'Block Background Color', 'solala' ),
                                                                                'desc'   => esc_html__('Choose background color for banner.', 'solala'),
                                                                                'type'    => 'rgba-color-picker'
                                                                            ),
                                                                            'bg-image'	=> array(
                                                                                'label'   => esc_html__( 'Background Image', 'solala' ),
                                                                                'type'    => 'background-image',
                                                                                'value'   => 'none',
                                                                                'desc'    => esc_html__( 'Upload an image to make background image', 'solala' ),
                                                                            ),
                                                                        )
                                                                    )
                                                                ),
                                                                'style-2' => array(
                                                                    'banner_content' => array(
                                                                        'type'          => 'wp-editor',
                                                                        'label'         => esc_html__('Banner Description', 'solala'),
                                                                        'desc'          => esc_html__('Enter description to display on banner.', 'solala'),
                                                                        'size'          => 'small',
                                                                        'editor_height' => 200,
                                                                        'wpautop'       => true,
                                                                        'editor_type'   => false
                                                                    ),
                                                                    'banner_button_text' => array(
                                                                        'type'  => 'text',
                                                                        'value' => '',
                                                                        'label' => esc_html__( 'Banner Button Text', 'solala' ),
                                                                        'desc'  => esc_html__( 'Enter text for button banner.', 'solala' ),
                                                                    ),
                                                                    'banner_button_url' => array(
                                                                        'type'  => 'text',
                                                                        'value' => '',
                                                                        'label' => esc_html__( 'Banner Button URL', 'solala' ),
                                                                        'desc'  => esc_html__( 'Enter url for button banner.', 'solala' ),
                                                                    ),
                                                                    'styling' => array(
                                                                        'type'          => 'popup',
                                                                        'attr'          => array( 'class' => 'slz-advanced-button' ),
                                                                        'label'         => esc_html__( 'Custom Style', 'solala' ),
                                                                        'desc'          => esc_html__( 'Change the style of banner', 'solala' ),
                                                                        'button'        => esc_html__( 'Styling', 'solala' ),
                                                                        'size'          => 'medium',
                                                                        'popup-options' => array(
                                                                            'banner_image' => array(
                                                                                'type'  => 'upload',
                                                                                'label' => esc_html__('Banner Image', 'solala'),
                                                                                'desc'  => esc_html__('Upload an image to make banner image. .png or .jpg', 'solala'),
                                                                                'images_only' => true,
                                                                                'value' => '',
                                                                            ),
                                                                            'block-bg-color'     => array(
                                                                                'label'   => esc_html__( 'Block Background Color', 'solala' ),
                                                                                'desc'   => esc_html__('Choose background color for banner.', 'solala'),
                                                                                'type'    => 'rgba-color-picker'
                                                                            ),
                                                                            'bg-image'	=> array(
                                                                                'label'   => esc_html__( 'Background Image', 'solala' ),
                                                                                'type'    => 'background-image',
                                                                                'value'   => 'none',
                                                                                'desc'    => esc_html__( 'Upload an image to make background image', 'solala' ),
                                                                            ),
                                                                        )
                                                                    )
                                                                ),
                                                            ),
                                                            'show_borders' => true,
                                                        ),
                                                    )
                                                )
                                            )
                                        )
                                    )
								)
							),	
						)
					),
				)
			),
			'social-tab'  => array(
				'title'   => esc_html__( 'Social Profiles', 'solala' ),
				'type'	=> 'tab',
				'options' => array(
					'social-box' => array(
						'title'   => esc_html__( 'Social Settings', 'solala' ),
						'type'	=> 'box',
						'options' => array(
							'socials' => array(
								'type'		  => 'addable-popup',
								'label'		 => esc_html__( 'Social Links', 'solala' ),
								'desc'		  => esc_html__( 'Add your social profiles', 'solala' ),
								'template'	  => '{{=social_name}}',
								'popup-options' => array(
									'social_name' => array(
										'label' => esc_html__( 'Name', 'solala' ),
										'desc'  => esc_html__( 'Enter a name (it is for internal use and will not appear on the front end)', 'solala' ),
										'type'  => 'text',
									),
									'social_type' => array(
										'type'	=> 'multi-picker',
										'label'   => false,
										'desc'	=> false,
										'picker'  => array(
											'social-type' => array(
												'label'   => esc_html__( 'Icon', 'solala' ),
												'desc'	=> esc_html__( 'Select social icon type', 'solala' ),
												'attr'	=> array( 'class' => 'slz-checkbox-float-left' ),
												'type'	=> 'radio',
												'value'   => 'icon-social',
												'choices' => array(
													'icon-social' => esc_html__( 'Font Awesome', 'solala' ),
													'upload-icon' => esc_html__( 'Custom Upload', 'solala' ),
												),
											),
										),
										'choices' => array(
											'icon-social' => array(
												'icon_class' => array(
													'type'  => 'icon',
													'value' => 'fa fa-adn',
													'label' => '',
												),
											),
											'upload-icon' => array(
												'upload-social-icon' => array(
													'label' => '',
													'type'  => 'upload',
												)
											),
										)
									),
									'social-link' => array(
										'label' => esc_html__( 'Link', 'solala' ),
										'desc'  => esc_html__( 'Enter your social URL link', 'solala' ),
										'type'  => 'text',
									)
								),
							),
						)
					),
				)
			),
			'customize-icon-tab'  => array(
				'title'   => esc_html__( 'Customize Icon', 'solala' ),
				'type'	=> 'tab',
				'options' => array(
					'customize-icon-box' => array(
						'title'   => esc_html__( 'Customize Icon', 'solala' ),
						'type'	=> 'box',
						'options' => array(
							'customize-icon' => array(
								'type'		  => 'addable-popup',
								'label'		 => esc_html__( 'Customize Icon', 'solala' ),
								'desc'		  => esc_html__( 'Add your customizable icon', 'solala' ),
								'template'	  => '{{=icon_name}}',
								'popup-options' => array(
									'icon_name' => array(
										'label' => esc_html__( 'Name', 'solala' ),
										'desc'  => esc_html__( 'Enter a name (it will show in front end)', 'solala' ),
										'type'  => 'text',
									),
									'icon_type' => array(
										'type'	=> 'multi-picker',
										'label'   => false,
										'desc'	=> false,
										'picker'  => array(
											'icon-type' => array(
												'label'   => esc_html__( 'Icon', 'solala' ),
												'desc'	=> esc_html__( 'Select customize icon type', 'solala' ),
												'attr'	=> array( 'class' => 'slz-checkbox-float-left' ),
												'type'	=> 'radio',
												'value'   => 'icon',
												'choices' => array(
													'icon' => esc_html__( 'Font Awesome', 'solala' ),
													'upload-icon' => esc_html__( 'Custom Upload', 'solala' ),
												),
											),
										),
										'choices' => array(
											'icon' => array(
												'icon_class' => array(
													'type'  => 'icon',
													'value' => 'fa fa-adn',
													'label' => '',
												),
											),
											'upload-icon' => array(
												'upload-icon' => array(
													'label' => '',
													'type'  => 'upload',
												)
											),
										)
									),
									'icon-link' => array(
										'label' => esc_html__( 'Link', 'solala' ),
										'desc'  => esc_html__( 'Enter your customize icon URL link', 'solala' ),
										'type'  => 'text',
									)
								),
							),
						)
					),
				)
			),
			'tracking-tab'  => array(
				'title'   => esc_html__( 'Tracking Scripts', 'solala' ),
				'type'	=> 'tab',
				'options' => array(
					'tracking-box' => array(
						'title'   => esc_html__( 'Tracking Scripts', 'solala' ),
						'type'	=> 'box',
						'options' => array(
							'tracking-popup' => array(
								'type'		  => 'addable-popup',
								'label'		 => esc_html__( 'Tracking Scripts', 'solala' ),
								'desc'		  => esc_html__( 'Add your tracking scripts (MixPanel, Google Analytics, etc)', 'solala' ),
								'template'	  => '{{=tracking_name}}',
								'popup-options' => array(
									'tracking_name' => array(
										'label' => esc_html__( 'Tracking Name', 'solala' ),
										'desc'  => esc_html__( 'Enter a name (it is for internal use and will not appear on the front end)', 'solala' ),
										'type'  => 'text',
										'value'	=> ''
									),
									'tracking_script' => array(
										'type'  => 'code-editor',
										'mode'	=> 'html',
										'attr'	=> array('rows' => 4),
										'label' => esc_html__('Script', 'solala'),
										'desc'  => esc_html__('Copy/Paste the tracking script here. Include &lt;script&gt; or &lt;style&gt; tag', 'solala'),
									)
								),
							),
						)
					),
				)
			),
		)
	)
);