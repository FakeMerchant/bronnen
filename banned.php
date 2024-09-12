<?php
 require_once 'inc/functions.php';
 require_once 'inc/bans.php';
 $_SERVER['REMOTE_ADDR'] = isset($_SERVER['HTTP_CF_CONNECTING_IP']) ? $_SERVER['HTTP_CF_CONNECTING_IP'] : $_SERVER['REMOTE_ADDR'];
 checkBan();
 print "<!doctype html><html><head><meta charset='utf-8'><title>"._("Banned?")."</title></head><body>";
 print "<h1>"._("You are not banned.")."</h1>";
 print "</body></html>";
?>
