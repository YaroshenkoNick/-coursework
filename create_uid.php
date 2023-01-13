<?php
  require_once 'db_connection.php';
  $auth_token = $_COOKIE['auth_token'];
  $sql = ("SELECT id FROM clients WHERE `auth_token` = '$auth_token'");
  $result = $mysql->query($sql);
  $take_uid = $result->fetch_assoc();
  $uid = $take_uid['id'];
?>
