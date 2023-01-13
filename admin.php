<?php
  session_start();
  if (empty($_COOKIE['auth_token'])) {
  $_SESSION['message'] = 'Сначала вы должны войти';
  header('Location: index.php'); }
  require 'header.php';
  require_once 'create_uid.php';
  $sql = ("SELECT admin FROM `users` WHERE `id` = '$uid'");
  $result = $mysql->query($sql);
  $take_admin = $result->fetch_assoc();
  $admin = $take_admin['admin'];
  if ($admin != 1) {
  $_SESSION['message'] = 'Вы не админ';
  header('Location: index.php'); }
?>
<div class="content">
  <?php
     if (isset($_SESSION['message'])) {
       echo '<div class="msg"> ' . $_SESSION['message'] . ' </div>';
     }
     unset($_SESSION['message']);
  ?>
  <div class="main_content" id="main_content_admin">
    <h2 id="h2_admin">Добро пожаловать, админ!</h2>
    <div id="admin_links">
    <a class="admin_link" href="users.php">Просмотр пользователей и их удаление</a>
    <a class="admin_link" href="recipes.php">Просмотр рецептов и их удаление</a>
    </div>
  </div>
</div>
<?php require ('footer.php') ?>
