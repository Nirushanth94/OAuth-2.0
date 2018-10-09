<?php

session_start();

require './vendor/autoload.php';

$App = new Facebook\Facebook([

'app_id' => '331500484276480',
'app_secret' =>'6d073709b01ca7a8850dc087b4e13b88',
'default_graph_version' =>'v2.7'
]);


$helper = $App->getRedirectLoginHelper();
$login_url = $helper->getLoginUrl("http://localhost/fb-oauth/");

try{
	
	$accessToken = $helper->getAccessToken();
	if(isset($accessToken))
	{
		
		$_SESSION['access_token'] = (string)$accessToken;
		header("Location:index.php");
	}
}catch(Exception $exc){
	
	echo $exc->getTraceAsString();
}

	if(isset($_SESSION['access_token'])){
		try
		{
				$App->setDefaultAccessToken($_SESSION['access_token']);
				$res = $App->get('/me?locale=en_us&fields=name,email');
				$user = $res->getGraphUser();
			
		}catch(Exception $exc)
		{echo $exc->getTraceAsString();}
	}