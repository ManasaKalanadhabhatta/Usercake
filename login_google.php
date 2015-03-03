<?php
session_start();
//require_once("models/config.php");
//require_once("models/header.php");
require_once('models/init.php');
$db = new DB;
$googleClient = new Google_Client;
$auth = new GoogleAuth($db, $googleClient);
$authUrl = $auth->checkToken();
if($auth->login())
	header("Location: login_google.php");
?>

<!DOCTYPE HTML>
<html>
<head>
	<meta charset = "utf-8">
</head>
<body>
	<?php if($authUrl): ?>
		<a href="<?=$authUrl?>">Sign in with Google<a>
	<?php else: ?>
		You are logged in. <a href="logout_google.php">Logout</a>
	<?php endif;?>
</body>
</html>