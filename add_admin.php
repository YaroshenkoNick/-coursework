<?php
session_start();
$login = $_POST['add_admin_input'];
require_once 'db_connection.php';
$sql = ("SELECT id FROM users WHERE `login`='$login'");
$result = $mysql->query($sql);
$take_user_id = $result->fetch_assoc();
if ($take_user_id == 0) {
  $_SESSION['message'] = 'Такого пользователя не существует';
  header('Location: users.php');
} else {
$user_id = $take_user_id['id'];
$mysql->query("UPDATE users SET admin=1 WHERE id=$user_id");
$mysql->close();
$_SESSION['message'] = 'Вы успешно выдали права';
header('Location: users.php'); }
?>
