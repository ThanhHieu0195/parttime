<?php if ( ! defined( 'SLZ' ) ) {
	die( 'Forbidden' );
}

if ( function_exists( 'solala_implement_options' ) == false ){

	function solala_implement_options() {

		$custom_css = '';
		$post_id = get_the_ID();
		$post_type = get_post_type();
		
		$post_type_arr = slz()->theme->get_config('active_posttype_ext');
		$post_type_arr['post'] = '';
		$page_header_key = 'general';
		
		if( is_single() && isset($post_type_arr[$post_type]) ){
			$page_header_key = $post_type;
		}
		$settings = slz_get_db_settings_option(); // array settings
		//content padding
		$ct_padding_top  = slz_get_db_post_option( $post_id , 'ct-padding-top', '' );
		$ct_padding_bottom  = slz_get_db_post_option( $post_id , 'ct-padding-bottom', '' );

		if( $ct_padding_top != ''){
			$custom_css .= '.slz-main-content {padding-top: '.esc_attr($ct_padding_top).'px;}';
		}
		if( $ct_padding_bottom != ''){
			$custom_css .= '.slz-main-content {padding-bottom: '.esc_attr($ct_padding_bottom).'px;}';
		}
		$page_bg_color = slz_get_db_post_option($post_id, 'bg-color');
		$layout_class = '';
		$custom_layout = array();
		// layout
		if ( isset( $settings['layout-group'] ) && $layout_group = $settings['layout-group'] ) {
			if ( isset($layout_group['layout']) ){
				//boxed
				if ( $layout_group['layout'] == 'boxed'){
					add_filter( 'body_class','solala_add_body_class_boxed' );
					$background = slz_akg('boxed/boxed-background', $layout_group, array());
					$custom_layout[] = '.slz-wrapper-content {background-color: white;}';
				
					if ( isset($layout_group['boxed']['bg-color']) && $bg_color = $layout_group['boxed']['bg-color'] ) {
						$boxed_bg_color = SLZ_Com::get_palette_selected_color( $bg_color );
						$custom_layout['bg_color'] = '.slz-boxed-layout{ background-color: ' . esc_attr( $boxed_bg_color ) . '}';
					}
				
					$bg_icon = $background['data']['icon'];
					if ( !empty($bg_icon) ) {
						$custom_layout['bg_url'] = '.slz-boxed-layout{ background: url(\'' . $bg_icon . '\') no-repeat center center fixed; background-size: cover;}';
					}
				
					if ( is_numeric( slz_akg('boxed/boxed-width', $layout_group, '' ) ) ) {
						$custom_layout[] = '.slz-boxed-layout{ width: ' . slz_akg('boxed/boxed-width', $layout_group, 1200 ) . 'px}';
					}
				
					$align = slz_akg('boxed/boxed-alignment', $layout_group, 'center');
					if ( $align != 'center' ){
						add_filter( 'body_class','solala_add_body_class_' . $align );
					}
					$layout_class = 'slz-boxed-layout';
				} else {
					//full
					add_filter( 'body_class','solala_add_body_class_full' );
					if ( isset($layout_group['full']['bg-color']) && $bg_color = $layout_group['full']['bg-color'] ) {
						$bg_color = SLZ_Com::get_palette_selected_color( $bg_color );
						$custom_layout['bg_color'] = '.slz-full-layout{ background-color: ' . esc_attr( $bg_color ) . '}';
					}
					$layout_class = 'slz-full-layout';
				}
				if( $page_bg_color ) {
					$page_bg_color = SLZ_Com::get_palette_selected_color( $page_bg_color );
					if( $page_bg_color ) {
						$custom_layout['bg_color'] = '.'.$layout_class.'{ background-color: ' . esc_attr( $page_bg_color ) . '}';
						if( isset($custom_layout['bg_url'])) {
							unset($custom_layout['bg_url']);
						}
					}
				}
				$custom_css .= implode("\n", $custom_layout);
			}
		}
		//page header
		if( isset( $settings[$page_header_key.'-pagetitle'] ) && $pagetitle_options = $settings[$page_header_key.'-pagetitle'] ){

			$background_type = SLZ_Com::merge_options('pagetitle-options','enable/group-pagetitle/enable/bg-image/bg-image-type',slz_akg('enable/bg-image/bg-image-type', $pagetitle_options, '' ));

			if( (is_single() || is_page()) && $background_type == 'feature-image' ){
				if( !post_password_required() && has_post_thumbnail() ){
					$bg_image = get_the_post_thumbnail_url(null, 'full');
				}
			} else {
				$bg_image = SLZ_Com::merge_options('pagetitle-options','enable/group-pagetitle/enable/bg-image/upload-image/background-image/data/icon',slz_akg('enable/bg-image/upload-image/background-image/data/icon', $pagetitle_options, '' ));
			}
			
			$bg_attachment = slz_akg('enable/bg-attachment', $pagetitle_options, '');
			$bg_size = slz_akg('enable/bg-size', $pagetitle_options, '');
			$bg_position = slz_akg('enable/bg-position', $pagetitle_options, '');

            $padding_top = SLZ_Com::merge_options('pagetitle-options','enable/group-pagetitle/enable/padding-top',slz_akg('enable/padding-top', $pagetitle_options, '' ));
            $padding_bottom= SLZ_Com::merge_options('pagetitle-options','enable/group-pagetitle/enable/padding-bottom',slz_akg('enable/padding-bottom', $pagetitle_options, '' ));
            $text_align = slz_akg('enable/text-align', $pagetitle_options, '');

			$bg_color = slz_akg('enable/bg-color', $pagetitle_options, '' );
			if ( $bg_color ) {
				$bg_color = SLZ_Com::get_palette_selected_color( $bg_color );
				if( $bg_color ){
					$custom_css .= '.slz-title-command{ background-color: ' . esc_attr( $bg_color ) . '}';
				}
			}

			if(!empty($bg_image)){
				$custom_css .= '.slz-title-command {background-image: url(\''.$bg_image.'\');}';
			}
			if(!empty($bg_attachment)){
				$custom_css .= '.slz-title-command {background-attachment:'.esc_attr($bg_attachment).';}';
			}
			if(!empty($bg_size)){
				$custom_css .= '.slz-title-command {background-size:'.esc_attr($bg_size).';}';
			}
			if(!empty($bg_position)){
				$custom_css .= '.slz-title-command {background-position:'.esc_attr($bg_position).';}';
			}
			if(!empty($text_align)){
				$custom_css .= '.slz-title-command {text-align:'.esc_attr($text_align).';}';
			}

            if(!empty($padding_top)){
                $custom_css .= '.slz-title-command .title-command-wrapper {padding-top: '.esc_attr($padding_top).'px;}';
            }
            if(!empty($padding_bottom)){
                $custom_css .= '.slz-title-command .title-command-wrapper {padding-bottom: '.esc_attr($padding_bottom).'px;}';
            }
			//title
			if( isset( $pagetitle_options['enable']['general-pagetitle-title'] ) && $pagetitle_title = $pagetitle_options['enable']['general-pagetitle-title'] ){
				$size = slz_akg( 'enable/title-typography/size',$pagetitle_title, '' );
				$color = slz_akg( 'enable/title-typography/color',$pagetitle_title, '' );

				if( $size || $color ) {
					if( $size ) {
						$size = 'font-size: '.esc_attr($size) .'px;';
					}
					if( $color ) {
						$color = 'color: '.esc_attr($color) .';';
					}
					$custom_css .= '.slz-title-command .title-command-wrapper  .title{'.$size . $color.'}';
				}
			}
			//breadcrumb
			if( isset( $pagetitle_options['enable']['general-pagetitle-bc'] ) && $pagetitle_bc = $pagetitle_options['enable']['general-pagetitle-bc'] ){

				$size = slz_akg( 'enable/breadcrumb/size',$pagetitle_bc, '' );
				$color = slz_akg( 'enable/breadcrumb/color',$pagetitle_bc, '' );
	
				if( $size || $color ) {
					if( $size ) {
						$size = 'font-size: '.esc_attr($size) .'px;';
					}
					if( $color ) {
						$color = 'color: '.esc_attr($color) .';';
					}
					$custom_css .= '.slz-title-command .breadcrumb-link{'.$size . $color.'}';
				}
				$size_act = slz_akg( 'enable/breadcrumb-active/size',$pagetitle_bc, '' );
				$color_act = slz_akg( 'enable/breadcrumb-active/color',$pagetitle_bc, '' );
	
				if( $size_act || $color_act ) {
					if( $size_act ) {
						$size_act = 'font-size: '.esc_attr($size_act) .'px;';
					}
					if( $color_act ) {
						$color_act = 'color: '.esc_attr($color_act) .';';
					}
					$custom_css .= '.slz-title-command .breadcrumb-active{'.$size_act . $color_act.'}';
				}
			}
		}
		//scroll to top
		if ( isset($settings['enable-scroll-to']) && $settings['enable-scroll-to'] == 'yes' ) {

			if ( isset( $settings['scroll-to-top-styling'] ) && $scroll_settings = $settings['scroll-to-top-styling'] ) {
				if( !empty($scroll_settings['bg-color']) ) {
					$bg_color = SLZ_Com::get_palette_selected_color( $scroll_settings['bg-color'] );
					if ( !empty ( $bg_color ) ) {
						$custom_css .= '.back-to-top{ background-color: ' . esc_attr( $bg_color ) . '}';
					}
				}

				if( isset($scroll_settings['text-color']) && $text_color = $scroll_settings['text-color'] ) {
					$text_color = SLZ_Com::get_palette_selected_color( $text_color );
					if ( !empty ( $text_color ) ) {
						$custom_css .= '.back-to-top i { color: ' . esc_attr( $text_color ) . '}';
					}
				}

				if( isset($scroll_settings['to-top-text']) && $btn_text = $scroll_settings['to-top-text'] ) {
					if ( !empty ( $btn_text ) ) {
						$custom_css .= '.back-to-top a.btn i:after { content: "' . esc_attr( $btn_text ) . '"}';
					}
				}

			}

		}
		if( isset($settings['404-background-image']) && $page_404_bg = $settings['404-background-image'] ){
			if ( !empty ( $page_404_bg['data']['icon'] ) && $page_404_bg['data']['css'] != 'none' ){
				$custom_css .= '.content-wrapper-404{ background-image: url(\'' . $page_404_bg['data']['icon'] . '\');}';
			}
		}
		//--------- Change color & typography << ----------------
		$is_change_color = false;
		//site color
		if( $typo = solala_setting_theme_color($settings) ) {
			$custom_css .= $typo;
			$is_change_color = true;
		}
		//typography
		if( $typo = solala_setting_typography($settings) ) {
			$custom_css .= $typo;
			$is_change_color = true;
		}
		if( $is_change_color ) {
			add_filter( 'body_class','solala_add_body_class_custom_color' );
		}
		//--------- >> Change color & typography----------------
		$theme_setting_custom_styles = slz_get_db_settings_option('custom_styles', '');
		if( !empty( $theme_setting_custom_styles ) ) {
			$custom_css .= $theme_setting_custom_styles;
		}
		
		if( $custom_css ) {
			do_action( 'slz_add_inline_style', $custom_css);
		}
	}
}
// Custom css - Typography
if ( function_exists( 'solala_setting_typography' ) == false ){
	function solala_setting_typography( $settings ){
		$arr_typo = (array)slz()->theme->get_config('typography_settings');
		$support_style = array(
			'italic', 'normal', 'oblique'
		);
		//typo
		$custom_css = '';
		// link colors
		$custom_style = slz_akg('styling-link-colors/custom-style', $settings, '' );
		if( $custom_style == 'custom' && $custom = slz_akg('styling-link-colors/custom', $settings, '' ) ) {
			if( !empty($custom['regular-color'])) {
				$custom_css .= "\n". '.slz-change-color a{color:' . $custom['regular-color'] . ';}';
			}
			if( !empty($custom['hover-color'])) {
				$custom_css .= "\n". '.slz-change-color a:hover{color:' . $custom['hover-color'] . ';}';
			}
			if( !empty($custom['active-color'])) {
				$custom_css .= "\n". '.slz-change-color a:active, .slz-change-color a:focus{color:' . $custom['active-color'] . ';}';
			}
		}

		foreach( $arr_typo as $option_key => $css_key ) {
			$css = $weight = $style = '';
			$custom_style = slz_akg($option_key .'/custom-style', $settings, '' );
			if( $custom_style == 'custom' && $custom = slz_akg($option_key .'/custom/typography', $settings, '' ) ) {
				if( !empty($custom['family']) ) {
					$css .= 'font-family:'.$custom['family'].';' . "\n";
				}
				if( !empty( $custom['google_font'] ) ){
					if( !empty($custom['variation']) ) {
						$weight = SLZ_Util::get_numerics($custom['variation']);
						$style = SLZ_Util::get_non_numerics($custom['variation']);
					}
				} else {
					$weight = isset($custom['weight'])? $custom['weight'] : '';
					$style = isset($custom['style'])? $custom['style'] : '';
				}
				if( $style && in_array( $style, $support_style )) {
					$css .= 'font-style:'.$style.';' . "\n";
				}
				if( $weight ) {
					$css .= 'font-weight:'.$weight.';' . "\n";
				}
				if( !empty($custom['size']) && $size = floatval($custom['size'])) {
					$css .= 'font-size:'.$size.'px;' . "\n";
				}
				if( !empty($custom['line-height']) && $l_height = floatval($custom['line-height']) ) {
					$css .= 'line-height:'.$l_height.'px;' . "\n";
				}
				if( !empty($custom['letter-spacing']) && $l_spacing = floatval($custom['letter-spacing']) ) {
					$css .= 'letter-spacing:'.$l_spacing.'px;' . "\n";
				}
				if( !empty($custom['color']) ) {
					$css .= 'color:'.$custom['color'].';' . "\n";
				}
				if( $css ) {
					$custom_css .= "\n" . $css_key.'{'.$css.'}';
				}
			}
		}
		return $custom_css;
	}
}
// Custom css - Skin Color
if ( function_exists( 'solala_setting_theme_color' ) == false ){
	function solala_setting_theme_color( $settings ){
		$custom_colors = (array)slz()->theme->get_config('site_custom_colors');
		$site_colors = (array)slz()->theme->get_config('site_default_colors');
		$search_key = $replace_key = array();
		$custom_css = '';
		$custom_style = slz_akg('styling-skin-colors/custom-style', $settings, '' );

		$page_option = slz_get_db_post_option( get_the_ID(), 'styling-skin-colors' );
		$page_custom_style = slz_akg('custom-style', $page_option);

		if( ( $page_custom_style == 'custom' && $custom = slz_akg( 'custom', $page_option, '') ) ||
				($custom_style == 'custom' ) && $custom = slz_akg('styling-skin-colors/custom', $settings, '' ) ) {

			if( $custom ) {
				foreach( $custom_colors as $db_key => $variant ){
					$default_color = $variant[0];
					$key_color = str_replace('-', '_', $db_key);
					$custom_color = slz_akg('custom/'.$db_key, $settings, '' );
					if( !empty($custom[$db_key]) ) {
						$custom_color = SLZ_Com::get_palette_selected_color( $custom[$db_key], $site_colors );
						if( $custom_color ) {
							$default_color = $custom_color;
						}
					}
					$search_key[] = '$' . $key_color;
					$replace_key[] = $default_color;
				}
			}
		}
		if( $search_key && $replace_key ) {
			$view_file = slz_get_template_customizations_directory( '/theme/custom-color.php' );
			$file_content_css = slz_render_view($view_file);
			$custom_css = str_replace($search_key, $replace_key, $file_content_css);
		}
		return $custom_css;
	}
}
if ( function_exists( 'solala_add_body_class_custom_color' ) == false ){

	function solala_add_body_class_custom_color( $classes ) {

		$classes[] = 'slz-change-color';

		return $classes;
			
	}

}
if ( function_exists( 'solala_add_body_class_full' ) == false ){

	function solala_add_body_class_full( $classes ) {

		$classes[] = 'slz-full-layout';

		return $classes;
			
	}

}

if ( function_exists( 'solala_add_body_class_boxed' ) == false ){

	function solala_add_body_class_boxed( $classes ) {

		$classes[] = 'slz-boxed-layout';

		return $classes;
			
	}

}

if ( function_exists( 'solala_add_body_class_left' ) == false ){

	function solala_add_body_class_left( $classes ) {

		$classes[] = 'layout-algin-left';

		return $classes;
			
	}

}

if ( function_exists( 'solala_add_body_class_right' ) == false ){

	function solala_add_body_class_right( $classes ) {

		$classes[] = 'layout-algin-right';

		return $classes;
			
	}

}

if ( function_exists( 'solala_add_body_class_center' ) == false ){

	function solala_add_body_class_center( $classes ) {

		$classes[] = 'layout-algin-center';

		return $classes;
	}

}
solala_implement_options();