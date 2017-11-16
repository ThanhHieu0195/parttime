<?php if ( ! defined( 'SLZ' ) ) {
	die( 'Forbidden' );
}
$options = array(
	'404-info' => array(
		'title'   => esc_html__( '404 Settings', 'solala' ),
		'type'    => 'tab',
		'options' => array(
			'header-box' => array(
				'title'   => esc_html__( '404 Settings', 'solala' ),
				'type'    => 'box',
				'options' => array(
					'404-background-image'	=> array(
						'label'   => esc_html__( 'Background Image', 'solala' ),
						'type'    => 'background-image',
						'value'   => 'none',
						'desc'    => esc_html__( 'Upload background image.', 'solala' ),
					),
					'404-title' => array(
						'type'  => 'text',
						'label' => esc_html__( 'Title', 'solala' ),
					),
					'404-description' => array(
						'type'    => 'wp-editor',
						'value'   => 'default value',
						'label'   => esc_html__('Description', 'solala'),
						'size'    => 'large', // small, large
						'editor_height' => 200,
						'wpautop'       => true,
						'editor_type'   => false, // tinymce, html
					),
					'404-btn-text' => array(
						'type'  => 'text',
						'label' => esc_html__( 'Back To Home Text', 'solala' ),
					),
					'404-btn-02-text' => array(
						'type'  => 'text',
						'label' => esc_html__( 'Button 02 Text', 'solala' ),
					),
					'404-btn-02-link' => array(
						'label' => esc_html__( 'Button Link', 'solala' ),
						'desc'  => esc_html__( 'Enter link for button 02', 'solala' ),
						'type'  => 'text',
					)
					
				)
			)
		)
	)
);
