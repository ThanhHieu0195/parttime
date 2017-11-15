<?php
/**
 * Constants.
 * 
 * @package WordPress
 * @subpackage Solala
 * @since 1.0
 */

defined( 'SOLALA_THEME_URI' )         || define( 'SOLALA_THEME_URI', get_template_directory_uri() );
defined( 'SOLALA_STATIC_URI' )        || define( 'SOLALA_STATIC_URI', get_template_directory_uri() . '/static');

defined( 'SOLALA_INCLUDE_DIR' )       || define( 'SOLALA_INCLUDE_DIR', get_template_directory() . '/includes' );
defined( 'SOLALA_FW_CUSTOMIZE_DIR' )  || define( 'SOLALA_FW_CUSTOMIZE_DIR', get_template_directory() . '/framework-customizations' );
defined( 'SOLALA_PLUGIN_DIR' )        || define( 'SOLALA_PLUGIN_DIR', get_template_directory() . '/plugins' );

defined( 'SOLALA_OPTION_IMG_URI' )    || define( 'SOLALA_OPTION_IMG_URI', SOLALA_THEME_URI . '/static/img/theme-option' );
defined( 'SOLALA_PLUGIN_IMG_URI' )    || define( 'SOLALA_PLUGIN_IMG_URI', SOLALA_THEME_URI . '/static/img/tgm-images' );
defined( 'SOLALA_LOGO_IMG_URI' )      || define( 'SOLALA_LOGO_IMG_URI', SOLALA_THEME_URI . '/static/img/logo' );
defined( 'SOLALA_IMG_URI' )           || define( 'SOLALA_IMG_URI', SOLALA_THEME_URI . '/static/img' );
//Active Woocommerce Plugin
defined( 'SOLALA_WC_ACTIVE' )     || define( 'SOLALA_WC_ACTIVE', class_exists( 'WooCommerce' ) );

if ( defined( 'YITH_WCWL' ) ) {
	define( 'SOLALA_WC_WISHLIST', defined( 'YITH_WCWL' ) );
}
else {
	define( 'SOLALA_WC_WISHLIST', '' );
}
// Active Solazu Unyson
if( defined( 'SOLAZU_UNYSON_VERSION' ) ) {
	define( 'SOLALA_SLZ_ACTIVE', defined( 'SOLAZU_UNYSON_VERSION' ) );
}
else {
	define( 'SOLALA_SLZ_ACTIVE', '' );
}