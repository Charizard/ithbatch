<?php
	require_once("facebook-php-sdk/src/facebook.php");
	
	$facebook=new Facebook(array('appId'=>'311163782301874','secret'=>'c855eb8cd1072b6ac444323f4780fd72'));

	session_destroy();
	
	header("Location: login.php");
?>