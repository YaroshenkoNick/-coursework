<?php
session_start();
$email = $_POST['email'];
$phone = $_POST['phone'];
$comment = $_POST['comment'];
require_once 'create_uid.php';
$sql = ("SELECT login FROM `users` WHERE `id` = '$uid'");
$result = $mysql->query($sql);
$take_login = $result->fetch_assoc();
$login = $take_login['login'];
var_dump($email);
var_dump($phone);
var_dump($comment);
var_dump($login);
$mysql->query("INSERT INTO `contact_us` (`login`,`email`,`phone`,`comment`) VALUES('$login','$email','$phone','$comment')");
$mysql->close();
$_SESSION['message'] = 'Спасибо, мы скоро с вами свяжемся!' ;
header('Location: index.php');
?>
