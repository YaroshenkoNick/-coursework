<?php
require_once 'db_connection.php';
$auth_token = $_COOKIE['auth_token'];
$mysql->query(" DELETE FROM clients WHERE auth_token='$auth_token'");
setcookie('auth_token', $auth_token, time() - 604800, "/");
header('Location: index.php');
?>
