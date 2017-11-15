<?php if ( ! defined( 'SLZ' ) ) {
	die( 'Forbidden' );
}
/**
 * Theme config
 *
 * @var array $cfg Fill this array with configuration data
 */

$cfg = array();
$cfg['settings_form_side_tabs'] = true;

$cfg['posts_rating'] = array(
);

$cfg['sidebar_mapping'] = array(
	'post'            => 'blog-sidebar',
	'page'            => 'page-sidebar',
	'slz-portfolio'   => 'portfolio-sidebar',
	'slz-team'        => 'team-sidebar',
	'slz-event'     => 'event-sidebar',
	'slz-portfolio'   => 'portfolio-sidebar',
	'product'         => 'product-sidebar',
	'archive_slz-portfolio'   => 'portfolio-ac-sidebar',
	'archive_slz-event'     => 'event-ac-sidebar',
	'archive_slz-team'        => 'team-ac-sidebar',
);
// post
$cfg['post_template_default'] = array(
	'main-blog-article-style' => 'article_04',
	'archive-article-style'   => 'article_04',
	'category-article-style'  => 'article_04',
	'tag-article-style'       => 'article_04',
	'author-article-style'    => 'article_04',
	'search-article-style'    => 'article_04',
	'blog-layout'             => 'post_05',
);

$cfg['post_info'] = array(
	'hide_main_category'      => 'yes',
);
$cfg['post_format_setting'] = array(
);
$cfg['ribbon_date_format'] = array(
	'day'   => esc_html_x('d','daily posts date format', 'solala'),
	'month' => esc_html_x('M','daily posts date format', 'solala'),
	'year'  => esc_html_x('Y','daily posts date format', 'solala'),
);

$cfg['map_config'] = array(
	'color'    => array(
        array(
            "featureType" => "administrative.locality",
            "elementType" => "all",
            "stylers" => array(
                array(
                    "hue" => "#2c2e33"
                ),
                array(
                    "saturation" => "7"
                ),
                array(
                    "lightness" => "19"
                ),
                array(
                    "visibility" => "on"
                )
            )
        ),
        array(
            "featureType" => "landscape",
            "elementType" => "all",
            "stylers" => array(
                array(
                    "hue" => "#ffffff"
                ),
                array(
                    "saturation" => "-100"
                ),
                array(
                    "lightness" => "100"
                ),
                array(
                    "visibility" => "simplified"
                )
            )
        ),
        array(
            "featureType" => "poi",
            "elementType" => "all",
            "stylers" => array(
                array(
                    "hue" => "#ffffff"
                ),
                array(
                    "saturation" => "-100"
                ),
                array(
                    "lightness" => "100"
                ),
                array(
                    "visibility" => "off"
                )
            )
        ),
        array(
            "featureType" => "road",
            "elementType" => "geometry",
            "stylers" => array(
                array(
                    "hue" => "#bbc0c4"
                ),
                array(
                    "saturation" => "-93"
                ),
                array(
                    "lightness" => "31"
                ),
                array(
                    "visibility" => "simplified"
                )
            )
        ),
        array(
            "featureType" => "road",
            "elementType" => "labels",
            "stylers" => array(
                array(
                    "hue" => "#bbc0c4"
                ),
                array(
                    "saturation" => "-93"
                ),
                array(
                    "lightness" => "31"
                ),
                array(
                    "visibility" => "off"
                )
            )
        ),
        array(
            "featureType" => "road.arterial",
            "elementType" => "labels",
            "stylers" => array(
                array(
                    "hue" => "#bbc0c4"
                ),
                array(
                    "saturation" => "-93"
                ),
                array(
                    "lightness" => "-2"
                ),
                array(
                    "visibility" => "simplified"
                )
            )
        ),
        array(
            "featureType" => "road.local",
            "elementType" => "geometry",
            "stylers" => array(
                array(
                    "hue" => "#e9ebed"
                ),
                array(
                    "saturation" => "-90"
                ),
                array(
                    "lightness" => "-8"
                ),
                array(
                    "visibility" => "simplified"
                )
            )
        ),
        array(
            "featureType" => "transit",
            "elementType" => "all",
            "stylers" => array(
                array(
                    "hue" => "#e9ebed"
                ),
                array(
                    "saturation" => "10"
                ),
                array(
                    "lightness" => "69"
                ),
                array(
                    "visibility" => "on"
                )
            )
        ),
        array(
            "featureType" => "transit",
            "elementType" => "icon",
            "stylers" => array(
                array(
                    "visibility" => "off"
                )
            )
        ),
        array(
            "featureType" => "water",
            "elementType" => "all",
            "stylers" => array(
                array(
                    "hue" => "#e9ebed"
                ),
                array(
                    "saturation" => "-78"
                ),
                array(
                    "lightness" => "67"
                ),
                array(
                    "visibility" => "simplified"
                )
            )
        ),
        array(
            "featureType" => "road.highway",
            "elementType" => "labels",
            "stylers" => array(
                array(
                    "visibility" => "off"
                )
            )
        ),
	)
);
//post type => extension name
$cfg['active_posttype_ext'] = array(
	'slz-event'       => 'events',
	'slz-portfolio'   => 'portfolio',
	'slz-team'        => 'teams',
	'product'         => 'product',
);

// Typography & custom color config <<
$cfg['typography_settings'] = array(
	'typo-body' => 'body',
	'typo-paragraph' => 'p',
	'typo-h1' => 'h1, .entry-content h1',
	'typo-h2' => 'h2, .entry-content h2',
	'typo-h3' => 'h3, .entry-content h3',
	'typo-h4' => 'h4, .entry-content h4',
	'typo-h5' => 'h5, .entry-content h5',
	'typo-h6' => 'h6, .entry-content h6',
);
// Some of suggest colors for theme
$cfg['site_default_colors'] = array(
	'color_1' => '#a18cd1',
	'color_2' => '#fa709a',
	'color_3' => '#667eea',
	'color_4' => '#6a11cb',
	'color_5' => '#f43b47',
	'color_6' => '#7028e4',
	'color_7' => '#0250c5',
	'color_8' => '#ec77ab'
);
// This config to setting color to theme ( key => default color, label, desc )
$cfg['site_custom_colors'] = array(
	'main-color'    => array('#d32eb2', esc_html__( 'Main Color', 'solala' ), esc_html__( 'Select the main color', 'solala' ) ),
	'second-color'  => array('#d43f8d', esc_html__( 'Sub Color', 'solala' ), esc_html__( 'Select the sub color', 'solala' ) ),
);
// >> Typography & custom color config