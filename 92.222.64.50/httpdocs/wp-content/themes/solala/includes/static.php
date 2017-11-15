<?php if ( ! defined( 'ABSPATH' ) ) {
	die( 'Direct access forbidden.' );
}

if ( defined( 'SLZ' ) ) {
	$solala_version = slz()->theme->manifest->get_version();
} else {
	$solala_version = '1.0';
}
/*--------------------functions-------------------------*/
if ( ! function_exists( 'solala_google_font_custom' ) ):
function solala_google_font_custom(){
	if ( SOLALA_SLZ_ACTIVE && function_exists('slz_get_db_settings_option') ) {
		$font_google = $fonts = array();
		$settings = slz_get_db_settings_option();
		//google_font
		$arr_typo = (array)slz()->theme->get_config('typography_settings');
		foreach( $arr_typo as $option_key => $css_key ) {
			$custom_style = slz_akg($option_key .'/custom-style', $settings, '' );
			if( $custom_style == 'custom' && $custom = slz_akg($option_key .'/custom/typography', $settings, '' ) ) {
				if( !empty($custom['google_font']) ) {
					if( !empty($custom['family']) ) {
						if( !empty($custom['variation']) ) {
							$font_google[$custom['family']][$custom['variation']] = $custom['variation'];
						} else {
							$font_google[$custom['family']] = '';
						}
					}
				}
			}
		}
		foreach($font_google as $font=>$variant){
			$fonts[] = $font . ':' .implode(',', $variant);
		}
		if( $fonts ) {
			$font_url = solala_fonts_url( $fonts );
			wp_enqueue_style( 'solala-custom-fonts', $font_url, array(), null );
		}
	}
}
endif;

/*-------------------- enqueue-------------------------*/
//font
wp_enqueue_style( 'solala-fonts', solala_fonts_url(), array(), null );
solala_google_font_custom();
wp_enqueue_style( 'font-awesome.min',    SOLALA_STATIC_URI . '/font/font-icon/font-awesome/css/font-awesome.min.css', array(), false );

//libs css
wp_enqueue_style( 'bootstrap.min',             SOLALA_STATIC_URI . '/libs/bootstrap/css/bootstrap.min.css', array(), false );
wp_enqueue_style( 'bootstrap-datepicker.min',  SOLALA_STATIC_URI . '/libs/bootstrap-datepicker/css/bootstrap-datepicker.min.css', array(), false );

//theme css
wp_enqueue_style( 'solala-style',       get_stylesheet_uri(), array(), $solala_version );
if ( ! solala_check_extension('headers') ) {
	wp_enqueue_style( 'solala-default', SOLALA_STATIC_URI . '/css/default.css', array(), $solala_version );
}
wp_enqueue_style( 'solala-layout',      SOLALA_STATIC_URI . '/css/layout.css', array(), $solala_version );
solala_slz_enqueue_style();
wp_enqueue_style( 'solala-responsive',  SOLALA_STATIC_URI . '/css/responsive.css', array(), $solala_version );

// js
if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
	wp_enqueue_script( 'comment-reply' );
}

wp_enqueue_script( 'bootstrap.min',            SOLALA_STATIC_URI . '/libs/bootstrap/js/bootstrap.min.js', array( 'jquery' ), false, true );
wp_enqueue_script( 'bootstrap-datepicker.min', SOLALA_STATIC_URI . '/libs/bootstrap-datepicker/js/bootstrap-datepicker.min.js', array( ), false, true );

wp_enqueue_script( 'solala-main',       SOLALA_STATIC_URI . '/js/main.js', array( ), $solala_version, true );
wp_enqueue_script( 'solala-custom',     SOLALA_STATIC_URI . '/js/custom.js', array( ), $solala_version, true );

if ( defined( 'SLZ' ) && function_exists('slz_get_db_settings_option') ) {
	$solala_custom_script = slz_get_db_settings_option('custom_scripts', '');
	if( !empty( $solala_custom_script ) ) {
		wp_enqueue_script( 'solala-custom-inline',    SOLALA_STATIC_URI . '/js/custom-inline.js', array( ), $solala_version, true );
		wp_add_inline_script( 'solala-custom-inline', $solala_custom_script );
	}
}
global $wp_scripts;
if( isset($wp_scripts->registered['slick']) && SOLALA_WC_ACTIVE ) {
	wp_enqueue_style( 'solala-woocommerce',     SOLALA_STATIC_URI . '/css/solala-woocommerce.css', array(), $solala_version );
	wp_enqueue_script( 'solala-woocommerce',    SOLALA_STATIC_URI . '/js/solala-woocommerce.js', array( ), $solala_version, true );
}