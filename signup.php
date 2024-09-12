<?php

/*
 *  Copyright (c) 2010-2014 Tinyboard Development Group
 */

	require_once 'inc/functions.php';
	if (isset($_POST['username'], $_POST['password']) || isset($_POST['auto'])) {
		$timenow = time();
		if (!isset($_POST['auto'])) {
			$pswd = $_POST['password'];
			$username=htmlspecialchars(strip_tags(trim($_POST['username'])));
			if ($username== '')
				error(sprintf(_('<a href="/signup.php">The username field is required.</a>')));
			if ($pswd == '')
				error(sprintf(_('<a href="/signup.php">The password field is required.</a>')));
			list($version, $password) = crypt_password($pswd);
		}
		else {
			$query = prepare(sprintf("SELECT `username`, `time` FROM ``modlogs`` LEFT JOIN ``mods`` ON `mod` = ``mods``.`id` WHERE `ip` = '%s' AND `username` LIKE 'temp_%%' ORDER BY `time` DESC LIMIT 1",$_SERVER['REMOTE_ADDR']));
			$query->execute() or error(db_error($query));
			$username = $query->fetchColumn();
			$pswd = str_replace('temp_','',$username);
			if(!login($username, $pswd)) {
				$pswd = $timenow;
				$username = 'temp_'.$pswd;
				list($version, $password) = crypt_password($pswd);
			}
			else {
				setCookies();
				$loggedin = true;
				modLog('Logged in');
			}
		}
		if(!isset($loggedin)){
			$query = prepare("SELECT `username` FROM ``mods`` WHERE `username` = :username");
			$query->bindValue(':username', $username);
			$query->execute() or error(db_error($query));
			if ($query->rowCount()) {
				error(sprintf( _('<a href="/signup.php">That user already exists!</a>')));
			}
			$query = prepare('INSERT INTO ``mods`` VALUES (NULL, :username, :password, :version, :type, :boards, :created, :stats)');
			$query->bindValue(':username', $username);
			$query->bindValue(':password', $password);
			$query->bindValue(':version', $version);
			$query->bindValue(':type', 0);
			$query->bindValue(':boards', '');
			$query->bindValue(':created', $timenow);
			$query->bindValue(':stats', json_encode(array()));
			$query->execute() or error(db_error($query));
			
			$userID = $pdo->lastInsertId();
			
			modLog('Created a new user: ' . utf8tohtml($username) . ' <small>(#' . $userID . ')</small>');
			login($username, $pswd);
			setCookies();
		}
		if (!isset($_POST['auto'])) {
			header('Location: /user.php', true, $config['redirect_http']);
		}
		else {
			$response_array['status'] = 1;
			echo json_encode($response_array);
		}
	}
	else {
		echo Element('page.html', array(
			'config' => $config,
			'mod' => $mod,
			'hide_dashboard_link' => true,
			'title' => _('Create a New User'),
			'subtitle' => false,
			'boardlist' => createBoardlist($mod),
			'body' => Element('signup.html',
					array_merge(
						array('config' => $config, 'mod' => $mod), 
						array('new' => true, 'boards' => listBoards())
					)
				)
			)
		);
	}