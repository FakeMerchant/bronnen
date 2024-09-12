<?php
// Glue code for handling a Tinyboard post.
// Portions of this file are derived from Tinyboard code.
function audioHandler($post) {
    global $board, $config;
    if ($post->has_file) foreach ($post->files as &$file) if ($file->extension == 'mp3') {
        require_once dirname(__FILE__) . '/ffmpeg.php';
        $mp3info = get_mp3_info($file->file_path);
        if (empty($mp3info['error'])) {
          $file->width = $mp3info['width'];
          $file->height = $mp3info['height'];
          if ($config['spoiler_images'] && isset($_POST['spoiler'])) {
            $file = set_mp3_dimensions($post, $file);
	    $tn_path = $board['dir'] . $config['dir']['thumb'] . $file->file_id . '.png';
	    make_mp3_thumbnail($file->file_path, $tn_path, $file->thumbwidth, $file->thumbheight, $mp3info['streams']);
	    $file = mp3_set_spoiler($file);
          }
          else {
            $file = set_mp3_dimensions($post, $file);
            $tn_path = $board['dir'] . $config['dir']['thumb'] . $file->file_id . '.png';
            if(0 == make_mp3_thumbnail($file->file_path, $tn_path, $file->thumbwidth, $file->thumbheight, $mp3info['streams'])) {
              $file->thumb = $file->file_id . '.png';
            }
            else {
              $file->thumb = 'file';
            }
          }
        }
        else {
          return $mp3info['error']['msg'];
        }
    }
}
function set_mp3_dimensions($post,$file) {
  global $board, $config;
  $tn_dimensions = array();
  $tn_maxw = $post->op ? $config['thumb_op_width'] : $config['thumb_width'];
  $tn_maxh = $post->op ? $config['thumb_op_height'] : $config['thumb_height'];
  if ($file->width > $tn_maxw || $file->height > $tn_maxh) {
      $file->thumbwidth = min($tn_maxw, intval(round($file->width * $tn_maxh / $file->height)));
      $file->thumbheight = min($tn_maxh, intval(round($file->height * $tn_maxw / $file->width)));
  } else {
      $file->thumbwidth = $file->width;
      $file->thumbheight = $file->height;
  }
  return $file;
}
function mp3_set_spoiler($file) {
  global $board, $config;
  $file->thumb = 'spoiler';
  $size = @getimagesize($config['spoiler_image']);
  $file->thumbwidth = $size[0];
  $file->thumbheight = $size[1];
  return $file;
}
