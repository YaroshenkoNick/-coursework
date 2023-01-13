<?php
session_start();
$title = $_POST['title'];
$category = $_POST['category'];
$content = $_POST['content'];
$ingredients = $_POST['ingredients'];
require_once 'create_uid.php';
$result = $mysql->query("SELECT login FROM `users` WHERE `id` = '$uid'");
$take_login = $result->fetch_assoc();
$login = $take_login['login'];
$res = $mysql->query("SELECT * FROM `categories` WHERE `title` = '$category'");
$cnc = $res->fetch_assoc();
if (empty($cnc)) {
  $_SESSION['message'] = 'Такой категории не существует' ;
  header('Location: add_recipe_form.php');
} else {
$img_type =  substr($_FILES['image_recipe']['type'], 0, 5);
if (!empty($_FILES['image_recipe']['tmp_name']) and $img_type === 'image') {
global $img;
$img =
addslashes(file_get_contents($_FILES['image_recipe']['tmp_name']));
}
$mysql->query("INSERT INTO `recipes` (`title`,`category_title`,`content`,`image`,`ingredients`, `login`) VALUES('$title','$category','$content','$img', '$ingredients', '$login')");
$mysql->close();
$_SESSION['message'] = 'Ваш рецепт был успешно добавлен' ;
header('Location: add_recipe_form.php'); }
?>
