<?php
	session_start();
	require_once "GoogleAPI/vendor/autoload.php";
	$gClient = new Google_Client();
	$gClient->setClientId("455315795961-jlgu1s4tm467q493jce9eeermghkf138.apps.googleusercontent.com");
	$gClient->setClientSecret("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");
	$gClient->setApplicationName("The Blue Group");
	$gClient->setRedirectUri("http://localhost/GoogleLogin/g-callback.php");
	$gClient->addScope("https://www.googleapis.com/auth/plus.login https://www.googleapis.com/auth/userinfo.email");
?>
