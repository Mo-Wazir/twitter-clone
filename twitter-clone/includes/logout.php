<?php 
// include_once '../core/init.php';

$filePath = __dir__ .'/../core/init.php';

if (file_exists($filePath)) {
    include_once $filePath;
    echo "see the $filePath";
} else {
    echo "File not found: " . $filePath;
}
	$getFromUser->logout();
	if ($getFromUser->loggedIn() === false) {
		header('Location: '.BASE_URL.'index.php');
		exit();
	}
 ?>