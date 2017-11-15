<?php
	
	$solala_search_icon = 'fa fa-search';

	$solala_search_placeholder = esc_html__('Search', 'solala');

	if ( defined ( 'SLZ' ) ){

		if ( is_page( ) ) {

			$solala_selected_header = slz_get_db_post_option( get_the_ID(), 'page-header-style' );

			if ( $solala_selected_header == 'default' )
				unset ( $solala_selected_header );

		}

		if ( empty ( $solala_selected_header ) && slz_get_db_settings_option('slz-header-style-group/slz-header-style', false) ){

			$solala_selected_header = slz_get_db_settings_option('slz-header-style-group/slz-header-style', '');

		}

		if ( !empty ( $solala_selected_header ) ) {

			$solala_key = 'slz-header-style-group/' . $solala_selected_header . '/search-group-styling';

			$solala_search_options = slz_get_db_settings_option( $solala_key, '');

			if ( !empty ( $solala_search_options ) ){

				
				if ( !empty ( $solala_search_options['icon-class'] ) ) {

				    $solala_search_icon = $solala_search_options['icon-class'];

				}

				if ( !empty ( $solala_search_options['placeholder'] ) ) {

				    $solala_search_placeholder = $solala_search_options['placeholder'];

				}


			}

		}

	}

?>

<form action="<?php echo esc_url( home_url( '/' ) ) ?>" method="get" accept-charset="utf-8" class="search-form">

	<input type="search" placeholder="<?php echo esc_attr($solala_search_placeholder); ?>" class="search-field" name="s" value="<?php echo get_search_query(); ?>" />

	<button type="submit" class="search-submit">
		<span class="search-icon">
			<?php esc_html_e('Search', 'solala')?>
		</span>
	</button>
</form>
