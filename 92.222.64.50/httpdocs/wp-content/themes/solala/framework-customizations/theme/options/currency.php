<?php if ( ! defined( 'SLZ' ) ) {
	die( 'Forbidden' );
}

$currency_position_arr = array(
	'left'             => esc_html__( 'Left ($99.99)', 'solala' ),
	'right'            => esc_html__( 'Right (99.99$)', 'solala' ),
	'left-with-space'  => esc_html__( 'Left With Space ($ 99.99)', 'solala' ),
	'right-with-space' => esc_html__( 'Right With Space (99.99 $)', 'solala' ),
);

$option_payment_arr = array(
	'customlink'   => esc_html__( 'Custom Link', 'solala' ),
	'woocommerce'  => esc_html__( 'WooCommerce ( when plugin woocommerce active )', 'solala' ),
);

$options = array(
	'currency' => array(
		'title'   => esc_html__( 'Currency', 'solala' ),
		'type'    => 'tab',
		'options' => array(
			'currency-tab' => array(
				'title'   => esc_html__( 'General', 'solala' ),
				'type'    => 'tab',
				'options' => array(
					'currency-box' => array(
						'title'   => esc_html__( 'Currency Settings', 'solala' ),
						'type'    => 'box',
						'options' => array(
							'currency-money-format'  => array(
								'type'  => 'text',
								'value' => '$',
								'label' => esc_html__('Currency Format', 'solala'),
								'desc'  => esc_html__('If want to show $400, then input $ in the field. Default: $', 'solala'),
							),
							'currency-position' => array(
								'type'    => 'select',
								'label'   => esc_html__('Currency Position', 'solala'),
								'choices' => $currency_position_arr,
								'value'   => 'left'
							),
						)
					),
				)
			),
			'payment-tab' => array(
				'title'   => esc_html__( 'Payment', 'solala' ),
				'type'    => 'tab',
				'options' => array(
					'payment-box' => array(
						'title'   => esc_html__( 'Payment Settings', 'solala' ),
						'type'    => 'box',
						'options' => array(
                            'event-payment-option' => array(
                                'type'    => 'select',
                                'label'   => esc_html__('Event Payment Option', 'solala'),
                                'choices' => $option_payment_arr,
                                'value'   => 'customlink'
                            ),
							'portfolio-payment-option' => array(
								'type'    => 'select',
								'label'   => esc_html__('Portfolio Payment Option', 'solala'),
								'choices' => $option_payment_arr,
								'value'   => 'customlink'
							),
						)
					),
				)
			),
		)
	)
);