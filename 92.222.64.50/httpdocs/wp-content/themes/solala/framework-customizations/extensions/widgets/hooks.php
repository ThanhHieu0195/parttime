<?php if (!defined('SLZ')) die('Forbidden');

function solala_filter_enable_widgets($args)
{
    $args = array(
        'SLZ_Widget_Gallery',
        'SLZ_Widget_New_Tweet',
        'SLZ_Widget_Contact',
        'SLZ_Widget_Events',
        'SLZ_Widget_Recent_Post',
        'SLZ_Widget_Ads_Banner',
        'SLZ_Widget_Tags',
        'SLZ_Widget_Category',
        'SLZ_Widget_About_Us',
    	'SLZ_Widget_Custom_Post',
    );
    return $args;
}
add_filter('slz_ext_widgets_enable_widgets', 'solala_filter_enable_widgets');