<?php if (!defined('SLZ')) die('Forbidden');

/** @internal */
function solala_filter_disable_shortcodes($to_disable)
{
	$to_disable[] = 'demo_disabled';
	$to_disable[] = 'counter'; // using counterv2
	return $to_disable;
}
add_filter('slz_ext_shortcodes_disable_shortcodes', 'solala_filter_disable_shortcodes');

/** @internal */
function solala_filter_enable_shortcodes($to_disable)
{
	$args = array(
		'accordion',
		'ads_banner',
		'audio',
		'button',
		'category',
		'contact',
		'contact_form',
		'counterv2',
		'event_block',
		'event_carousel',
		'icon_box',
		'image',
		'image_carousel',
		'isotope',
		'item_list',
		'main_title',
		'map',
		'new_tweet',
		'partner',
		'portfolio_carousel',
		'portfolio_list',
		'posts_block',
		'posts_carousel',
		'posts_mansory',
		'pricing_box',
		'tabs',
		'tags',
		'team_carousel',
		'team_list',
		'testimonial',
		'timeline',
		'video',
		'video_carousel',
		'instagram',
	);
	return $args;
}
add_filter('slz_ext_shortcodes_enable_shortcodes', 'solala_filter_enable_shortcodes');