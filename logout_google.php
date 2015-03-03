<?php
require_once('models/init.php');
$db = new DB;
$googleClient = new Google_Client;
$auth = new GoogleAuth($db, $googleClient);
$auth->logout();
//session_destroy();
header('Location: index.php');
?>