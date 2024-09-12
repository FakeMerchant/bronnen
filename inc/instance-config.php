<?php

/*
*  Instance Configuration
*  ----------------------
*  Edit this file and not config.php for imageboard configuration.
*
*  You can copy values from config.php (defaults) and paste them here.
*/


	$config['db']['server'] = 'localhost';
	$config['db']['database'] = 'vichan';
	$config['db']['prefix'] = '';
	$config['db']['user'] = '';
	$config['db']['password'] = '';
	$config['cookies']['httponly'] = false;
	$config['poster_ids'] = false;
	$config['cookies']['expire'] = 60 * 60 * 24 * 30 * 12 * 10;
	$config['max_body'] = 10000;
	$config['reply_limit'] = 10000;
	$config['reply_limit'] = 10000;
	$config['max_links'] = 20;
	$config['max_filesize'] = 209715200;
	$config['thumb_width'] = 255;
	$config['thumb_height'] = 255;
	$config['max_width'] = 10000;
	$config['max_height'] = 10000;
	$config['threads_per_page'] = 15;
	$config['max_pages'] = 4000;
	$config['threads_preview'] = 5;
	$config['threads_preview_sticky'] = 3;
	$config['root'] = '/';
	$config['thumb_method'] = 'gm+gifsicle';
	$config['gnu_md5'] = '1';
	$config['debug'] = false;
	$config['allow_roll'] = true;
	$config['allow_subtitle_html'] = true;
	$config['allow_delete'] = false;
	$config['field_disable_password'] = true;
	$config['mod']['link_delete_own'] = '[Delete]';
	$config['mod']['link_report'] = '[Report]';
	$config['mod']['link_pm'] = '[PM]';
	$config['mod']['lock_ip'] = false;

	$config['mod']['groups'][0] = 'User';
	define_groups();
	$config['mod']['change_password'] = USER;
	$config['mod']['see_username'] = MOD;
	$config['mod']['reply_pm'] = USER;
	$config['mod']['search'] = USER;
	$config['mod']['search_posts'] = USER;
	$config['mod']['noticeboard'] = USER;
	$config['mod']['noticeboard_post'] = USER;
	$config['file_user'] = 'user.php';
	$config['mod']['edit_config'] = DISABLED;
	$config['mod']['bypass_field_disable'] = DISABLED;
    $config['cache']['enabled'] = 'redis';
    $config['boards'] = array(
                array("home" => "/"),
                array('int'),
                array('biz','edi'),
                array('vir','cuck'),
		array('mod'),
		array('meta','test','arch'),
		array("wiki"=>"/wiki/index.php?title=Main_Page","map"=>"/map/index.html"),
		array("register" => "/signup.php","login" => "/user.php","my threads" => "/user.php?/my_threads","replied threads" => "/user.php?/replied_threads","followed threads" => "/user.php?/followed_threads")
        );
   $config['search']['enable'] = false;
	$config['force_body_op'] = false;
	// Require an image for threads?
	$config['force_image_op'] = false;
	$config['spoiler_images'] = true;
	$config['always_noko'] = true;
    $config['country_flags'] = true;
    $config['country_flags_condensed'] = false;
    $config['flag_style'] = '';
//  $config['allow_no_country'] = true;
//  $config['image_blank'] = 'static/blank.gif';
    $config['max_images'] = 5;
	$config['additional_javascript'] = array();
	$config['enable_embedding'] = true;
	$config['additional_javascript'][] = 'js/jquery.min.js';
	$config['additional_javascript'][] = 'js/jquery.mixitup.min.js';
	$config['additional_javascript'][] = 'js/jquery-ui.custom.min.js';
	$config['additional_javascript'][] = 'js/js.cookie.js';
	$config['additional_javascript'][] = 'js/jquery.cookie.js';
 	$config['additional_javascript'][] = 'js/redirect.js';
	$config['additional_javascript'][] = 'js/inline-expanding.js';
    $config['additional_javascript'][] = 'js/auto-reload.js';
	$config['additional_javascript'][] = 'js/post-hover.js';
	$config['additional_javascript'][] = 'js/style-select.js';
    $config['additional_javascript'][] = 'js/multi-image.js';
    $config['additional_javascript'][] = 'js/expand-video.js';
//  $config['additional_javascript'][] = 'js/expand-audio.js';
    $config['additional_javascript'][] = 'js/mobile-style.js';
//  $config['additional_javascript'][] = 'js/compact-boardlist.js';
	$config['additional_javascript'][] = 'js/ajax.js';
	$config['additional_javascript'][] = 'js/youtube.js';
	$config['additional_javascript'][] = 'js/dailymotion.js?n=1';
	$config['additional_javascript'][] = 'js/expand-too-long.js';
	$config['additional_javascript'][] = 'js/download-original.js';
	$config['additional_javascript'][] = 'js/ajax-post-controls.js';
	$config['additional_javascript'][] = 'js/wPaint/8ch.js';
	$config['additional_javascript'][] = 'js/wpaint.js';
//	$config['additional_javascript'][] = 'js/quick-post-controls.js';
	$config['additional_javascript'][] = 'js/infinite-scroll.js';
	$config['additional_javascript'][] = 'js/quick-reply.js';
	$config['additional_javascript'][] = 'js/upload-selection.js';
	$config['additional_javascript'][] = 'js/comment-toolbar.js';
	$config['additional_javascript'][] = 'js/options.js';
//	$config['additional_javascript'][] = 'js/options/fav.js';
//	$config['additional_javascript'][] = 'js/options/general.js';
	$config['additional_javascript'][] = 'js/options/user-css.js';
	$config['additional_javascript'][] = 'js/options/user-js.js';
// 	$config['additional_javascript'][] = 'js/settings.js';
	$config['additional_javascript'][] = 'js/toggle-images.js';
	$config['additional_javascript'][] = 'js/fix-report-delete-submit.js';
	$config['additional_javascript'][] = 'js/hide-images.js';
	$config['additional_javascript'][] = 'js/hide-threads.js';
	$config['additional_javascript'][] = 'js/smartphone-spoiler.js';
//  $config['additional_javascript'][] = 'js/webm-settings.js';
    $config['additional_javascript'][] = 'js/webm/playersettings.js';
	$config['additional_javascript'][] = 'js/catalog.js';
	$config['additional_javascript'][] = 'js/catalog-link.js';
	$config['additional_javascript'][] = 'js/catalog-search.js';
	$config['additional_javascript'][] = 'js/followed-threads.js?n=90';
	$config['additional_javascript'][] = 'js/show-backlinks.js';
	$config['additional_javascript'][] = 'js/show-op.js';
	$config['additional_javascript'][] = 'js/show-own-posts.js';
	$config['additional_javascript'][] = 'js/thread-stats.js';
	$config['additional_javascript'][] = 'js/stats.js';
// 	$config['additional_javascript'][] = 'js/post-menu.js';
// 	$config['additional_javascript'][] = 'js/show-op.js';
	$config['additional_javascript'][] = 'js/titlebar-notifications.js';
 	$config['additional_javascript'][] = 'js/file-selector.js';
 	$config['additional_javascript'][] = 'js/highlight.max.js';
// 	$config['additional_javascript'][] = 'js/expand.js';
// 	$config['additional_javascript'][] = 'js/live-index.js';
    $config['additional_javascript'][] = 'js/upvote.js';
    $config['catalog_link'] = false;
    $config['javascript_image_dispatch'] = true;
    $config['url_banner'] = '/banner.php';
    $config['url_favicon'] = '/favicon.ico';
    $config['thumb_method'] = 'convert';
    $config['allowed_ext_files'][] = 'svg';
    $config['allowed_ext_files'][] = 'psd';
    $config['allowed_ext_files'][] = 'xlsx';
    $config['allowed_ext_files'][] = 'xcf';
    $config['allowed_ext_files'][] = 'flac';
    $config['allowed_ext_files'][] = 'wav';
    $config['allowed_ext_files'][] = 'mp4';
    $config['allowed_ext_files'][] = 'webm';
    $config['allowed_ext_files'][] = 'mp3';
    $config['allowed_ext_files'][] = 'zip';
    $config['allowed_ext_files'][] = 'rar';
    $config['allowed_ext_files'][] = 'pdf';
    $config['allowed_ext_files'][] = 'wav';
    $config['allowed_ext_files'][] = '7z';
	$config['allowed_ext_files'][] = 'swf';
	$config['allowed_ext_files'][] = 'txt';
	$config['allowed_ext_files'][] = 'iso';
	$config['allowed_ext_files'][] = 'sh';
	$config['allowed_ext_files'][] = 'deb';
 	$config['allowed_ext_files'][] = 'tar';
	$config['allowed_ext_files'][] = 'torrent';
    $config['allowed_ext_files'][] = 'apkg';
	$config['allowed_ext_files'][] = 'gz';
	$config['allowed_ext_files'][] = 'xz';
	$config['webm']['use_ffmpeg'] = true;
	$config['webm']['allow_audio'] = true;
	$config['webm']['max_length'] = 12000;
	$config['image_identification'] = true;
	$config['timezone'] = 'UTC';
	$config['post_date'] = '%d/%m/%y (%a) %H:%M:%S';
	$config['thread_subject_in_title'] = true;
	$config['stylesheets']['Burichan'] = 'burichan.css';
	$config['stylesheets']['Bronnen'] = 'bronnen.css';
	$config['stylesheets']['Caffe'] = 'caffe.css';
	$config['stylesheets']['Confraria'] = 'confraria.css';
	$config['stylesheets']['Dark'] = 'dark.css';
	$config['stylesheets']['Dark Roach'] = 'dark_roach.css';
	$config['stylesheets']['Favela'] = 'favela.css';
	$config['stylesheets']['Ferus'] = 'ferus.css';
	$config['stylesheets']['Fringe'] = 'fringe.css';
	$config['stylesheets']['Futaba'] = 'futaba.css';
	$config['stylesheets']['Futaba Light'] = 'futaba-light.css';
	$config['stylesheets']['Futaba+Vichan'] = 'futaba+vichan.css';
	$config['stylesheets']['Gentoochan'] = 'gentoochan.css';
	$config['stylesheets']['Jungle'] = 'jungle.css';
	$config['stylesheets']['Luna'] = 'luna.css';
	$config['stylesheets']['Miku'] = 'miku.css';
	$config['stylesheets']['Nigrachan'] = 'nigrachan.css';
	$config['stylesheets']['Northboard'] = 'northboard_cb.css';
	$config['stylesheets']['Notsuba'] = 'notsuba.css';
	$config['stylesheets']['Novo Jungle'] = 'novo_jungle.css';
	$config['stylesheets']['Photon'] = 'photon.css';
	$config['stylesheets']['Piwnichan'] = 'piwnichan.css';
	$config['stylesheets']['Ricechan'] = 'ricechan.css';
	$config['stylesheets']['Roach'] = 'roach.css';
	$config['stylesheets']['Rugby'] = 'rugby.css';
	$config['stylesheets']['Stripe'] = 'stripes.css';
	$config['stylesheets']['Style'] = 'style.css';
	$config['stylesheets']['Szalet'] = 'szalet.css';
	$config['stylesheets']['Terminal'] = 'terminal2.css';
	$config['stylesheets']['Testorange'] = 'testorange.css';
	$config['stylesheets']['chan.org.il'] = 'chanorgil.rtl.css';
	$config['stylesheets']['Wasabi'] = 'wasabi.css';
	$config['stylesheets']['Wongstein'] = 'wongstein.css';
	$config['default_stylesheet'] = array('Bronnen', $config['stylesheets']['Bronnen']);
	$config['url_banner'] = '/logo.php';
	$config['file_script'] = 'main.js';
	$config['field_email_selectbox'] = false;
	$config['ban_appeals'] = false;
	$config['ban_show_post'] = true;
	$config['ban_page_extra'] = 'If you wish to appeal this ban, log in (or create a new account) at the links above on the navbar, and PM one of the moderators.';
	$config['image_reject_repost'] = false;
	$config['dailymotion_js_html'] = '<div class="dailymotion-container" data-video="$2">'.
		'<a href="https://www.dailymotion.com/video/$2" target="_blank" class="file">'.
		'<img style="width:360px;height:270px;" src="https://www.dailymotion.com/thumbnail/video/$2" class="post-image"/>'.
		'</a></div>';
	$config['vimeo_js_html'] = '<div class="vimeo-container" data-video="$2">'.
		'<a href="https://vimeo.com/$2" target="_blank" class="file">'.
		'<img style="width:360px;height:270px;" src="%%vimeoplaceholder%%" class="post-image"/>'.
		'</a></div>';
		
    	$config['embedding'] = array(
		array(
			'/^https?:\/\/(\w+\.)?youtube\.com\/watch\?v=([a-zA-Z0-9\-_]{10,11})(&.+)?$/i',
			$config['youtube_js_html']
		),
		array(
			'/^https?:\/\/(\w+\.)?youtu\.be\/([a-zA-Z0-9\-_]{10,11})(&.+)?$/i',
			$config['youtube_js_html']
		),
		array(
			'/^https?:\/\/(\w+\.)?vimeo\.com\/(\d{2,10})(\?.+)?$/i',
			$config['vimeo_js_html'],
			TRUE
		),
		array(
			'/^https?:\/\/(\w+\.)?dailymotion\.com\/video\/([a-zA-Z0-9]{2,10})(_.+)?$/i',
			$config['dailymotion_js_html']
		),
		array(
			'/^https?:\/\/(\w+\.)?metacafe\.com\/watch\/(\d+)\/([a-zA-Z0-9_\-.]+)\/(\?[^\'"<>]+)?$/i',
			'<div style="float:left;margin:10px 20px;width:%%tb_width%%px;height:%%tb_height%%px"><embed flashVars="playerVars=showStats=no|autoPlay=no" src="http://www.metacafe.com/fplayer/$2/$3.swf" width="%%tb_width%%" height="%%tb_height%%" wmode="transparent" allowFullScreen="true" allowScriptAccess="always" name="Metacafe_$2" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash"></div>'
		),
		array(
			'/^https?:\/\/video\.google\.com\/videoplay\?docid=(\d+)([&#](.+)?)?$/i',
			'<embed src="http://video.google.com/googleplayer.swf?docid=$1&hl=en&fs=true" style="width:%%tb_width%%px;height:%%tb_height%%px;float:left;margin:10px 20px" allowFullScreen="true" allowScriptAccess="always" type="application/x-shockwave-flash"></embed>'
		),
		array(
			'/^https?:\/\/(\w+\.)?vocaroo\.com\/i\/([a-zA-Z0-9]{2,15})$/i',
			'<object style="float: left;margin: 10px 20px;" width="148" height="44"><param name="movie" value="https://vocaroo.com/player.swf?playMediaID=$2&autoplay=0"><param name="wmode" value="transparent"><embed src="https://vocaroo.com/player.swf?playMediaID=$2&autoplay=0" width="148" height="44" wmode="transparent" type="application/x-shockwave-flash"></object>'
		)
	);
    // Ability to lock a board for normal users and still allow mods to post.  Could also be useful for making an archive board

	// If poster's proxy supplies X-Forwarded-For header, check if poster's real IP is banned.
	$config['proxy_check'] = true;

	// If poster's proxy supplies X-Forwarded-For header, save it for further inspection and/or filtering.
	//$config['proxy_save'] = true;

	$config['mod']['move'] = ADMIN;
	$config['move_replies'] = false;


	// When moving a thread to another board and choosing to keep a "shadow thread", an automated post (with
	// a capcode) will be made, linking to the new location for the thread. "%s" will be replaced with a
	// standard cross-board post citation (>>>/board/xxx)
	$config['mod']['shadow_mesage'] = _('Moved to %s.');
	// Capcode to use when posting the above message.
	$config['mod']['shadow_capcode'] = 'Mod';
	// Name to use when posting the above message. If false, $config['anonymous'] will be used.
	$config['anonymous']='';
	$config['mod']['shadow_name'] = false;

	$config['strip_exif'] = true;
	$config['use_exiftool'] = false;
	$config['convert_auto_orient'] = true;
	$config['error']['genmp3error']	= _('There was a problem processing your mp3.');
	$config['error']['invalidmp3'] 	= _('Invalid mp3 uploaded.');
	$config['search']['search_limit'] = 500;

	$config['max_width'] = 100000;
	$config['max_height'] = $config['max_width'];
	$config['markup'][] = array("/__(.+?)__/", "<ins>\$1</ins>");
	$config['markup'][] = array("/~~(.+?)~~/", "<del>\$1</del>");
	$config['markup'][] = array("/\[code=?(.*?)\](.+?)\[\/code\]/s", "<pre><code class='\$1'>\$2</code></pre>");
	$config['strip_combining_chars'] = false; 
	$config['max_links'] = 50;

	$config['delete_time'] = 60;
	$config['error']['delete_too_late']	= _('You can\'t delete older posts.');
	$config['error']['edit_too_late']	= _('You can\'t edit older posts.');
	$config['body_truncate'] = 25;