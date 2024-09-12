<?php
/*
* ffmpeg.php
* A barebones ffmpeg based webm implementation for vichan.
*/
function get_mp3_info($filename) {
  global $board, $config;
  $filename = escapeshellarg($filename);
  $ffprobe = $config['webm']['ffprobe_path'];
  $ffprobe_out = array();
  $mp3info = array();
  exec("$ffprobe -v quiet -print_format json -show_format -show_streams $filename", $ffprobe_out);
  $ffprobe_out = json_decode(implode("\n", $ffprobe_out), 1);
  $mp3info['error'] = is_valid_mp3($ffprobe_out);
  if(empty($mp3info['error'])) {
    $mp3info['width'] = $config['thumb_width'] ;
    $mp3info['height'] = $config['thumb_height'] ;
    $mp3info['streams'] = count($ffprobe_out['streams']);
    if($mp3info['streams']>1 &&isset($ffprobe_out['streams'][1]['width'])&&isset($ffprobe_out['streams'][1]['height'])){
	$mp3info['width'] = $ffprobe_out['streams'][1]['width'];
	$mp3info['height'] = $ffprobe_out['streams'][1]['height'];
    }
    else{
	$mp3info['streams'] = 1;
    }
  }
  return $mp3info;
}
function is_valid_mp3($ffprobe_out) {
  global $board, $config;
  if (empty($ffprobe_out))
    return array('code' => 1, 'msg' => $config['error']['genmp3merror']);
  $extension = pathinfo($ffprobe_out['format']['filename'], PATHINFO_EXTENSION);
  if ($extension === 'mp3') {
    if ($ffprobe_out['format']['format_name'] != 'mp3')
      return array('code' => 2, 'msg' => $config['error']['invalidmp3']);
  } else {
    return array('code' => 1, 'msg' => $config['error']['genmp3error']);  
  }
}
function make_mp3_thumbnail($filename, $thumbnail, $width, $height, $streams) {
  global $board, $config;
  $filename = escapeshellarg($filename);
  $thumbnailfc = escapeshellarg($thumbnail); // Should be safe by default but you
                                           // can never be too safe.
  $width = escapeshellarg($width);
  $height = escapeshellarg($height); // Same as above.
  $ffmpeg = $config['webm']['ffmpeg_path'];
  $ret = 0;
  $ffmpeg_out = array();
  if ($streams>1){
    exec("$ffmpeg -i $filename -v quiet -s $width"."x"."$height $thumbnailfc 2>&1", $ffmpeg_out, $ret);
  }
  else {
    exec("$ffmpeg -i $filename -v quiet -filter_complex 'showwavespic=s=$width"."x"."$height,hue=185' -frames:v 1 $thumbnailfc", $ffmpeg_out, $ret);
  }
    if (filesize($thumbnail) === 0) {
      $ret = 1;
    }
  return $ret;
}

