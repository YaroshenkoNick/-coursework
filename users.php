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
<div class="content">
  <?php
     if (isset($_SESSION['message'])) {
       echo '<div class="msg"> ' . $_SESSION['message'] . ' </div>';
     }
     unset($_SESSION['message']);
  ?>
  <div class="main_content" id="main_content_users">
    <div class="admin_forms">
      <div class="delete_user_form">
        <form action="delete_user.php" method="post">
          <label for="delete_user_input">Удалить пользователя</label>
          <input placeholder="Введите имя пользователя" class="input_admin_actions" type="text" id="delete_user_input" name="delete_user_input" required>
          <button type="submit" class="input red_button"><strong>Удалить</strong></button>
        </form>
      </div>
      <div class="add_admin_form">
        <form action="add_admin.php" method="post">
          <label for="add_admin_input">Выдать права администратора</label>
          <input placeholder="Введите имя пользователя" class="input_admin_actions" type="text" id="add_admin_input" name="add_admin_input" required>
          <button type="submit" class="input red_button"><strong>Выдать</strong></button>
        </form>
      </div>
      <div class="delete_admin_form">
        <form action="delete_admin.php" method="post">
          <label for="delete_admin_input">Отнять права администратора</label>
          <input placeholder="Введите имя пользователя" class="input_admin_actions" type="text" id="delete_admin_input" name="delete_admin_input" required>
          <button type="submit" class="input red_button"><strong>Отнять</strong></button>
        </form>
      </div>
    </div>
    <h2>Пользователи</h2>
    <div class="display_users">
      <div class="display_users_container">
        <div class="users_id border_delete">
          <div><strong>id</strong></div>
        </div>
        <div class="users_login border_delete">
          <div><strong>Имя</strong></div>
        </div>
        <div class="users_admin border_delete">
          <div><strong>admin</strong></div>
        </div>
      </div>
      <?php
      $result = $mysql->query("SELECT * FROM `users`");
      while ($row = $result->fetch_assoc()) { ?>
      <div class="display_users_container">
        <div class="users_id border_delete">
          <div><?php echo $row['id']; ?></div>
        </div>
        <div class="users_login border_delete">
          <div><?php echo $row['login']; ?></div>
        </div>
        <div class="users_admin border_delete">
          <div><?php echo $row['admin']; ?></div>
        </div>
      </div>
      <?php } ?>
    </div>
  </div>
</div>
<?php require ('footer.php') ?>
