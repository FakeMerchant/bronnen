<?php

class Twig_Extensions_Extension_Tinyboard extends Twig_Extension
{
	/**
	* Returns a list of filters to add to the existing list.
	*
	* @return array An array of filters
	*/
	public function getFilters()
	{
		return array(
			new Twig_SimpleFilter('filesize', 'format_bytes'),
			new Twig_SimpleFilter('truncate', 'twig_truncate_filter'),
			new Twig_SimpleFilter('truncate_body', 'truncate'),
			new Twig_SimpleFilter('truncate_filename', 'twig_filename_truncate_filter'),
			new Twig_SimpleFilter('extension', 'twig_extension_filter'),
			new Twig_SimpleFilter('sprintf', 'sprintf'),
			new Twig_SimpleFilter('capcode', 'capcode'),
			new Twig_SimpleFilter('remove_modifiers', 'remove_modifiers'),
			new Twig_SimpleFilter('hasPermission', 'twig_hasPermission_filter'),
			new Twig_SimpleFilter('date', 'twig_date_filter'),
			new Twig_SimpleFilter('poster_id', 'poster_id'),
			new Twig_SimpleFilter('remove_whitespace', 'twig_remove_whitespace_filter'),
			new Twig_SimpleFilter('count', 'count'),
			new Twig_SimpleFilter('ago', 'ago'),
			new Twig_SimpleFilter('until', 'until'),
			new Twig_SimpleFilter('push', 'twig_push_filter'),
			new Twig_SimpleFilter('bidi_cleanup', 'bidi_cleanup'),
			new Twig_SimpleFilter('addslashes', 'addslashes'),
		);
	}
	
	/**
	* Returns a list of functions to add to the existing list.
	*
	* @return array An array of filters
	*/
	public function getFunctions()
	{
		return array(
			new Twig_SimpleFunction('time', 'time'),
			new Twig_SimpleFunction('floor', 'floor'),
			new Twig_SimpleFunction('timezone', 'twig_timezone_function'),
			new Twig_SimpleFunction('hiddenInputs', 'hiddenInputs'),
			new Twig_SimpleFunction('hiddenInputsHash', 'hiddenInputsHash'),
			new Twig_SimpleFunction('ratio', 'twig_ratio_function'),
			new Twig_SimpleFunction('secure_link_confirm', 'twig_secure_link_confirm'),
			new Twig_SimpleFunction('secure_link_fa', 'twig_secure_link_fa'),
			new Twig_SimpleFunction('secure_link', 'twig_secure_link'),
			new Twig_SimpleFunction('link_for', 'link_for'),
			new Twig_SimpleFunction('is_it_friday', 'is_it_friday'),
			new Twig_SimpleFunction('followed', 'followed'),
			new Twig_SimpleFunction('poster_count', 'poster_count')
		);
	}
	
	/**
	* Returns the name of the extension.
	*
	* @return string The extension name
	*/
	public function getName()
	{
		return 'tinyboard';
	}
}

function twig_timezone_function() {
	return 'Z';
}

function twig_push_filter($array, $value) {
	array_push($array, $value);
	return $array;
}

function twig_remove_whitespace_filter($data) {
	return preg_replace('/[\t\r\n]/', '', $data);
}

function twig_date_filter($date, $format) {
	return gmstrftime($format, $date);
}

function twig_hasPermission_filter($mod, $permission, $board = null) {
	return hasPermission($permission, $board, $mod);
}

function twig_extension_filter($value, $case_insensitive = true) {
	$ext = mb_substr($value, mb_strrpos($value, '.') + 1);
	if($case_insensitive)
		$ext = mb_strtolower($ext);		
	return $ext;
}

function twig_sprintf_filter( $value, $var) {
	return sprintf($value, $var);
}

function twig_truncate_filter($value, $length = 30, $preserve = false, $separator = '…') {
	if (mb_strlen($value) > $length) {
		if ($preserve) {
			if (false !== ($breakpoint = mb_strpos($value, ' ', $length))) {
				$length = $breakpoint;
			}
		}
		return mb_substr($value, 0, $length) . $separator;
	}
	return $value;
}

function twig_filename_truncate_filter($value, $length = 30, $separator = '…') {
	if (mb_strlen($value) > $length) {
		$value = strrev($value);
		$array = array_reverse(explode(".", $value, 2));
		$array = array_map("strrev", $array);
		
		$filename = &$array[0];
		$extension = isset($array[1]) ? $array[1] : false;

		$filename = mb_substr($filename, 0, $length - ($extension ? mb_strlen($extension) + 1 : 0)) . $separator;

		return implode(".", $array);
	}
	return $value;
}

function twig_ratio_function($w, $h) {
	return fraction($w, $h, ':');
}
function twig_secure_link_confirm($text, $title, $confirm_message, $href) {
	global $config;

	return '<a onclick="if (event.which==2) return true;if (confirm(\'' . htmlentities(addslashes($confirm_message)) . '\')) document.location=\'?/' . htmlspecialchars(addslashes($href . '/' . make_secure_link_token($href))) . '\';return false;" title="' . htmlentities($title) . '" href="?/' . $href . '">' . $text . '</a>';
}
function twig_secure_link_fa($fa, $title, $confirm_message, $href) {
	global $config;

	return '<a class="fa fa-'.$fa.'" onclick="if (event.which==2) return true;if (confirm(\'' . htmlentities(addslashes($confirm_message)) . '\')) document.location=\'?/' . htmlspecialchars(addslashes($href . '/' . make_secure_link_token($href))) . '\';return false;" title="' . htmlentities($title) . '" href="?/' . $href . '"></a>';
}
function twig_secure_link($href) {
	return $href . '/' . make_secure_link_token($href);
}

function is_it_friday($isoCode, $flag) {
	if($isoCode == false && $flag == false)
		return false;
	if($isoCode == false && strlen($flag) == 2)
		$isoCode = strtoupper($flag);
	if($isoCode == false)
		return false;
	$num=0;
	switch ($isoCode) {
		case 'US':
			$num=20;
			break;
		case 'RU':
			$num=21;
			break;
		case 'AU':
			$num=12;
			break;
		case 'CA':
			$num=23;
			break;
		case 'BR':
			$num=15;
			break;
		case 'MX':
			$num=7;
			break;
		case 'CL':
			$num=1;
			break;
		case 'ES':
			$num=2;
			break;
		case 'PT':
			$num=2;
			break;
		case 'MN':
			$num=2;
			break;
		default:
			break;
	}
	if (isset(DateTimeZone::listIdentifiers(DateTimeZone::PER_COUNTRY,$isoCode)[$num])) {
		$date = new DateTime("now", new DateTimeZone(DateTimeZone::listIdentifiers(DateTimeZone::PER_COUNTRY,$isoCode)[$num]));
		return ($date->format('wH') >= 516 && $date->format('wH') <= 605);
	}
	return false;
}

function followed($board, $post) {
	global $config, $mod;
	
	$followedThread = array('board'=>$board,'post'=>$post);
	if ($config['cache']['enabled'] && ($followedThreads = cache::get('followed_threads_' . $mod['id']))){}
	else {
		$query = prepare('SELECT `board`, `post`, `seen`,`title` FROM ``follows`` WHERE `id` = :id');
		$query->bindValue(':id', $mod['id']);
		$query->execute() or error(db_error($query));
		$followedThreads = $query->fetchAll(PDO::FETCH_ASSOC);
		if ($config['cache']['enabled'] && isset($followedThreads))
			cache::set('followed_threads_' . $mod['id'], $followedThreads);
	}
	if (!isset($followedThreads))
		return false;
	else {
		foreach($followedThreads as &$thread) {
			if ($thread['board'] == $board && $thread['post'] == $post)
				return true;
		}
		return false;
	}
}

function poster_count($board) {
	return cache::get('poster_count_' . $board);
}