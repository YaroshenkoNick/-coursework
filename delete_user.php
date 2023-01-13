<?php
session_start();
$login = $_POST['delete_user_input'];
require_once 'db_connection.php';
$sql = ("SELECT id FROM users WHERE `login`='$login'");
$result = $mysql->query($sql);
$take_user_id = $result->fetch_assoc();
if ($take_user_id == 0) {
  $_SESSION['message'] = 'Такого пользователя не существует';
  header('Location: users.php');
} else {
$user_id = $take_user_id['id'];
$mysql->query("DELETE FROM users WHERE id=$user_id");
$mysql->close();
$_SESSION['message'] = 'Вы успешно удалили пользователя';
header('Location: users.php'); }
?>
