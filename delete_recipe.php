<?php
session_start();
$title = $_POST['delete_recipe_input'];
require_once 'db_connection.php';
$sql = ("SELECT id FROM recipes WHERE `title`='$title'");
$result = $mysql->query($sql);
$take_recipe_id = $result->fetch_assoc();
if ($take_recipe_id == 0) {
  $_SESSION['message'] = 'Такого рецепта не существует';
  header('Location: recipes.php');
} else {
$recipe_id = $take_recipe_id['id'];
$mysql->query("DELETE FROM recipes WHERE id=$recipe_id");
$mysql->close();
$_SESSION['message'] = 'Вы успешно удалили рецепт';
header('Location: recipes.php'); }
?>
