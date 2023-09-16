<?php
//error_reporting(E_ALL);

// make sure ur session file path +rw by www wwwrun www-data
$tmp = './tmp';
ini_set('session.save_path', $tmp);

$cookieName = "sesi";
$time = time();
if(!isset($_COOKIE[$cookieName])){
	session_start();
	setcookie($cookieName, session_id(), $time + 3600);
	// record cookie and session start time;
	$_SESSION['time_start'] = $time;
} else {
	session_id($_COOKIE[$cookieName]);
	session_start();
	
	// cookies always renew and will expire if idle an hour+;
	if(isset($_SESSION['time_start'])){
		if($time - $_SESSION['time_start'] < 3600){
			setcookie($cookieName, session_id(), $time + 3600);
			$_SESSION['time_start'] = $time;
		}
	}
}