<?php if ( ! defined( 'SLZ' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'advertisement-settings' => array(
		'title'   => esc_html__( 'Advertisement', 'solala' ),
		'type'    => 'tab',
		'options' => array(
			'advertisement-box' => array(
				'title'   => esc_html__( 'Advertisement', 'solala' ),
				'type'    => 'box',
				'options' => array(
					'advertisement-popup' => array(
						'label' => esc_html__( 'Advertisement', 'solala' ),
						'type'  => 'addable-popup',
						'desc'  => esc_html__( 'Click to add new advertisement area. Advertisement area help you to create and manager the banner', 'solala' ),
						'add-button-text' => esc_html__('Add Advertisement Area', 'solala'),
						'template' => '{{-area_name }}',
						'popup-options' => array(
							'area_name' => array(
								'label' => esc_html__( 'Area Name', 'solala' ),
								'type'  => 'text',
								'desc'  => esc_html__( 'Input the advertisement area name' , 'solala'),
							),
							'advertisement-group' => array(
								'type'   => 'multi-picker',
								'label'  => false,
								'desc'   => false,
								'picker' => array(
									'type' => array(
										'label' => esc_html__( 'Display Banner', 'solala' ),
										'type'  => 'radio',
										'attr'  => array( 'class' => 'slz-checkbox-float-left' ),
										'choices' => array(
											'image'       => esc_html__( 'Image', 'solala' ),
											'custom_code' => esc_html__( 'Custom Code', 'solala' ),
											'disable'     => esc_html__( 'Disable', 'solala' ),
										),
										'value' => 'image',
									)
								),
								'choices' => array(
									'image' => array(
										'image-source' => array(
											'type'  => 'upload',
											'label' => esc_html__('Banner Image', 'solala'),
											'desc'  => esc_html__('Upload the banner image .png or .jpg', 'solala'),
											'images_only' => true,
										),
										'image-link' => array(
											'type'  => 'text',
											'label' => esc_html__('Banner Link', 'solala'),
											'desc'  => esc_html__('Set the banner link.', 'solala'),
										),
										'image-alt' => array(
											'type'  => 'text',
											'label' => esc_html__('Banner Alt Attribute', 'solala'),
											'desc'  => esc_html__('Appears inside the image container when the banner image can not be displayed. It helps search engines understand what an banner image is about.', 'solala'),
										),
										'image-new-tab' => array(
											'type'  => 'switch',
											'value' => 'yes',
											'label' => esc_html__( 'Open Link In New Tab', 'solala' ),
											'desc'  => esc_html__( 'Open Link In New Tab?', 'solala' ),
											'left-choice'  => array(
												'value' => 'no',
												'label' => esc_html__( 'No', 'solala' ),
											),
											'right-choice' => array(
												'value' => 'yes',
												'label' => esc_html__( 'Yes', 'solala' ),
											)
										),
									),
									'custom_code' => array(
										'html-code' => array(
											'type'  => 'code-editor',
											'mode'  => 'html',
											'label' => esc_html__('Textarea Option Code', 'solala'),
											'desc'  => esc_html__('Custom HTML allowed. Paste your ad code here.', 'solala'),
										)
									)
								),
								'show_borders' => true,
							)
						),
					),
				)
			),
		)
	)
);