
<?php
	require_once("facebook-php-sdk/src/facebook.php");
	
	$facebook=new Facebook(array('appId'=>'311163782301874','secret'=>'c855eb8cd1072b6ac444323f4780fd72'));
	
	$user=$facebook->getUser();
	
	//logged in user
	if($user){
	try{
		//authenticated user
		$user_profile=$facebook->api('/me');
	}
	catch(FacebookApiException $e){
		//unauthenticated user
		error_log($e);
		$user=NULL;
	}
	}
	
	if($user){
		//user logged in and authenticated
		$logouturl=$facebook->getLogoutUrl(array('next'=>'http://localhost/ithbatch/wp-content/logout.php'));
		/*$logouturl=$facebook->getLogoutUrl(array('next'=>'http:ithbatch.phpfogapp.com/logout.php'));*/
	}
	else{
		//user not logged in
		$loginurl=$facebook->getLoginUrl(array('scope'=>'user_groups,publish_stream','redirect_uri'=>'http://localhost/ithbatch/wp-content/index.php'));
		/*$loginurl=$facebook->getLoginUrl(array('scope'=>'user_groups','redirect_uri'=>'http://http:ithbatch.phpfogapp.com/index.php'));*/
	}
?>