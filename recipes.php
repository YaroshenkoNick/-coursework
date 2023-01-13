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
  $_SESSION['message'] = 'Вы не администратор';
  header('Location: index.php'); }
?>
<div class="content" id="content_padding_bottom">
  <?php
     if (isset($_SESSION['message'])) {
       echo '<div class="msg"> ' . $_SESSION['message'] . ' </div>';
     }
     unset($_SESSION['message']);
  ?>
  <div class="main_content" id="main_content_users">
    <div class="admin_forms">
      <div class="delete_recipe_form">
        <form action="delete_recipe.php" method="post">
          <label for="delete_recipe_input">Удалить рецепт</label>
          <input placeholder="Введите название" class="input_admin_actions" type="text" id="delete_recipe_input" name="delete_recipe_input" required>
          <button type="submit" class="input red_button"><strong>Удалить</strong></button>
        </form>
      </div>
    </div>
    <h2>Рецепты</h2>
    <div class="display_users">
      <div class="display_users_container">
        <div class="users_id border_delete">
          <div><strong>Название</strong></div>
        </div>
        <div class="users_login border_delete">
          <div><strong>Категория</strong></div>
        </div>
        <div class="users_admin border_delete">
          <div><strong>Автор</strong></div>
        </div>
      </div>
      <?php
      $result = $mysql->query("SELECT * FROM `recipes` ORDER BY id DESC");
      while ($row = $result->fetch_assoc()) { ?>
      <div class="display_users_container">
        <div class="users_id border_delete">
          <div><?php echo $row['title']; ?></div>
        </div>
        <div class="users_login border_delete">
          <div><?php echo $row['category_title']; ?></div>
        </div>
        <div class="users_admin border_delete">
          <div><?php echo $row['login']; ?></div>
        </div>
      </div>
      <?php } ?>
    </div>
  </div>
</div>
<?php require ('footer.php') ?>
