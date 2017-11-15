<?php if ( ! defined( 'ABSPATH' ) ) {
    die( 'Direct access forbidden.' );
}

register_nav_menus( array(
	'top-nav'     	=> esc_html__('Top menu', 'solala' ),
	'main-nav'    	=> esc_html__('Main menu', 'solala' ),
	'sub-nav'    	=> esc_html__('Sub menu', 'solala' ),
	'bottom-nav'  	=> esc_html__('Bottom menu', 'solala' ),
	'feature-nav'  	=> esc_html__('Feature menu', 'solala' )
) );
