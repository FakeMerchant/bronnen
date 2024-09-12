<?php

	require_once 'inc/functions.php';
// 	require_once 'maxmind/autoload.php';
// 	use GeoIp2\Database\Reader;
	header('Content-type: text/plain');
// 	$config['ip_whitelist'] = cache::get('whitelist')?cache::get('whitelist'):[];
// 	$reader = new Reader('/usr/local/share/GeoIP/GeoLite2-City.mmdb');
	$uri='int';
	$hours=1;
	$unfiltered = array();
	$query = prepare(sprintf("SELECT DISTINCT(`ip`) as `ip`, `user` FROM ``posts_%s`` WHERE `time` > UNIX_TIMESTAMP()-60*60*%s", $uri,$hours));
	$query->execute() or error(db_error($query));
	$iplist=$query->fetchAll();
	foreach ($iplist as $result){
		$location=geolocs($result['ip'],$result['user'],TRUE) ;
		$unfiltered[]=array($location['country_code'],$location['longitude'].' '.$location['latitude'],$location['longitude'],$location['latitude']);
	}
	$coordsort=array();
	foreach($unfiltered as $arr) {
		$uarr = $arr;
		unset($uarr[1]);
		$coordsort[$arr[1]][] =  $uarr;
	}
	$blinkenworld=array();
	foreach($coordsort as $arr) {
		$blinkenworld[] = array_merge(
		current($arr), 
		array(count($arr))
		);
	}
	print('{"success":1,"messages":[],"data":'.json_encode($blinkenworld)."}");
	
?>
