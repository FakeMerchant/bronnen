<?php

//  require_once 'inc/functions.php';


//  function upvote($uri, $id, $ip) {
//  	global $board, $config;
//  	$board = getBoardInfo($uri);
//  	$board['dir'] = sprintf($config['board_path'], $board['uri']);
//  	$board['url'] = sprintf($config['board_abbreviation'], $board['uri']);
//  	$config['uri_thumb'] = $config['root'] . $board['dir'] . $config['dir']['thumb'];
//  	$config['uri_img'] = $config['root'] . $board['dir'] . $config['dir']['img'];
//     	$query = prepare(sprintf("SELECT `voters`,`ip` FROM ``posts_%s`` WHERE `id` = :id", $uri));
//      	$query->bindValue(':id', $id, PDO::PARAM_INT);
//  	$query->execute() or error(db_error($query));
//  	$post =$query->fetch(PDO::FETCH_ASSOC);
//  	$voters = json_decode($post['voters']);
//  	if (array_search($ip,$voters) !== False)
//  		return 2;
//  	if ($ip == $post['ip'])
//  		return 3;
//  	array_push($voters,$ip);
//  	$query = prepare(sprintf("UPDATE ``posts_%s`` SET `upvotes` = `upvotes`+1, `voters` = '%s' WHERE `id` = :id", $uri,json_encode($voters)));
//  	$query->bindValue(':id', $id, PDO::PARAM_INT);
//  	$query->execute() or error(db_error($query));
//  	return 0;
//  }
//  $upvote_ips[] = $_SERVER['REMOTE_ADDR'];
//  $response_array['status'] = upvote($_POST['board'],$_POST['id'],$upvote_ips[0]);
//  echo json_encode($response_array);
//  if (function_exists('fastcgi_finish_request'))
//  	@fastcgi_finish_request();
//  if($response_array['status'] == 0) {
//  	rebuildPost($_POST['id']);
//  	buildIndex();
//  	rebuildThemes('post', $_POST['board']);
//  }
?>
