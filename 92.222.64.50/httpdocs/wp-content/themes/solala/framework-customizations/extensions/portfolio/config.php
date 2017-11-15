<?php if ( ! defined( 'SLZ' ) ) {
	die( 'Forbidden' );
}

$cfg = array();
// Enable/Disable taxonomy status
$cfg['enable_status'] = false;
// Enable/Disable taxonomy tags
$cfg['enable_tag'] = false;

$cfg['supports_comment'] = false;
$cfg['supports_author'] = true;

// Include {history, other } tab to Project Options
$cfg['has_gallery'] = false;
$cfg['has_history_tab'] = false; // This tab is needs enable_status = true
$cfg['has_other_tab'] = false;
$cfg['has_team_tab'] = false;
$cfg['has_album_tab'] = true;

$cfg['image_size'] = array (
	'portfolio' => array(
		'large'				=> '670x420',
		'small'				=> '320x320',
		'no-image-large'	=> '670x420',
		'no-image-small'	=> '320x320'
	)
);
$cfg['mbox_name'] = esc_html__('Project Options', 'solala');

$cfg['sort_portfolio'] = array(
	esc_html__( '- Latest -', 'solala' )         => '',
	esc_html__('A to Z', 'solala')               => 'az_order',
	esc_html__('Z to A', 'solala')               => 'za_order',
	esc_html__('Post is selected', 'solala')     => 'post__in',
	esc_html__('Random', 'solala')               => 'random_posts',
);

$cfg['ajax_html_audio'] = array(
    'image_format'  => '<div class="block-img">%1$s</div>',
    'title'         => '<div class="title">%s</div>',
    'content'       =>'<div class="content">%s</div>',
    'artist'        => '<li> <span class="title">%1$s</span> : <span class="value">%2$s</span> </li>',
    'image-content' => '<div class="img-content">
                            %1$s
                        </div>',
    'playlist'      => '<div class="slz-playlist sc_audio sc_audio sc_audio_portfolio">
                            <div class="slz-album-01 sc-audio-playlist">
                                <div class="main-item">
                                    <audio id="current-audio" controls="controls" class="current-audio main-audio slz-playlist-container">
                                        %1$s
                                    </audio>
                                </div>
                                <div class="bar-wrapper">
                                    <canvas class="oscilloscope" width="1110"></canvas>
                                </div>
                            </div>
                            <div class="oscilloscope-wrapper"></div>
                        </div>',
    'playlist_no_canvas' => '<div class="slz-playlist sc_audio sc_audio sc_audio_portfolio">
                            <div class="slz-album-01 sc-audio-playlist">
                                <div class="main-item">
                                    <audio id="current-audio" controls="controls" class="current-audio main-audio slz-playlist-container">
                                        %1$s
                                    </audio>
                                </div>
                            </div>
                        </div>'
);