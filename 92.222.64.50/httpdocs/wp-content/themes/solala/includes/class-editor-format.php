<?php
class Solala_Editor_Format {
	public function __construct(){
		add_action( 'init', array(&$this, '_action_add_editor_styles') );
		// Custom Styles to WordPress Visual Editor
		add_filter('mce_buttons_2', array(&$this, '_filter_mce_buttons') );
		// Attach callback to 'tiny_mce_before_init'
		add_filter( 'tiny_mce_before_init', array(&$this, '_filter_mce_before_init_insert_formats') );
	}
	public function _action_add_editor_styles() {
		add_editor_style( 'static/css/custom-editor.css' );
	}

	public function _filter_mce_buttons($buttons) {
		array_unshift($buttons, 'styleselect');
		return $buttons;
	}
	
	
	public function _filter_mce_before_init_insert_formats( $init_array ) {
		$style_formats = $this->_dropcap_formats();
		$init_array['style_formats'] = json_encode( $style_formats );
		return $init_array;
	}
	private function _dropcap_formats() {
		$formats = array(
				'solala_dropcap' => array(
					'title' => esc_html__('Drop Cap Paragraph', 'solala'),
					'items' => array(
						array(
							'parent_id' => 'solala_dropcap',
							'title'     => esc_html__('Regular','solala'),
							'classes'   => 'dropcap',
							'block'     => 'div',
						),
						array(
							'parent_id' => 'solala_dropcap',
							'title'     => esc_html__('Italic','solala'),
							'classes'   => 'dropcapi',
							'block'     => 'div',
						),
						array(
							'parent_id' => 'solala_dropcap',
							'title'     => esc_html__('Bold','solala'),
							'classes'   => 'dropcapb',
							'block'     => 'div',
						),
					)
				),
		);
		return $formats;
	}
} new Solala_Editor_Format();