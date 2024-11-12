<?php 
	
	include_once 'database/connection.php';
	include_once 'classes/user.php';
	include_once 'classes/tweet.php';
	include_once 'classes/follow.php';

	global $pdo;
	session_start();
	$getFromUser = new User($pdo);
	$getFromTweet = new Tweet($pdo);
	$getFromFollow= new Follow($pdo);

	define('BASE_URL', 'http://localhost/twitter-clone/');
	

 ?>