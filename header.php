<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>TopFood</title>
    <link href="style.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css2?family=Comfortaa&display=swap" rel="stylesheet">
  </head>
  <body>
    <header>
      <a href="index.php"><img class="logo" src="images/logo.png" width="103px" height="64px" alt="Can`t download image"></a>
      <nav>
        <ul class="nav_links">
          <li class="nav_links_li"><a href="index.php">Главная</a></li>
          <li class="nav_links_li"><a href="contact_us_check.php">Связь с нами</a></li>
          <?php if (empty($_COOKIE['auth_token'])) { ?>
          <li class="nav_links_li"><button onclick="show('block')" class="green_button">Регистрация</button></li>
          <li class="nav_links_li"><button onclick="show2('block')" class="blue_button">Войти</button></li>
        <?php } elseif (isset($_COOKIE['auth_token'])) { ?>
          <li class="nav_links_li"><a href="add_recipe_form.php">Добавить рецепт</a></li>
          <?php require_once 'create_uid.php';
          $sql = ("SELECT admin FROM `users` WHERE `id` = '$uid'");
          $result = $mysql->query($sql);
          $take_admin = $result->fetch_assoc();
          $admin = $take_admin['admin'];
          if ($admin == 1) { ?>
          <li class="nav_links_li"><a href="admin.php">Панель администратора</a></li>
          <?php } ?>
          <li class="nav_links_li" id="welcome">Добро пожаловать
          <?php
           if (isset($_SESSION['login_u'])) {
             echo $_SESSION['login_u'];
           }
          ?>!</li>
          <img class="avatar" src="images/avatar.png" width="64px" height="64px" alt="Can`t download image">
          <li class="nav_links_li"><a href="exit.php">Выйти</a></li>
        </ul>
      </nav>
      <?php } ?>
    </header>
    <div onclick="show('none')" id="gray"></div>
    <div onclick="show2('none')" id="gray2"></div>
    <div id="window1" class="window">
        <img class="close" src="images/close.png" alt=""  onclick="show('none')">
        <div class="form">
            <h2 class="h2_modal">Регистрация</h2>
            <form action="signup.php" method="post">
                <input type="text" id="login" name="login"
                 placeholder="Ваше имя" class="input">
                <input type="password" id="pass" name="pass" placeholder="Пароль" class="input">
                <input type="password" id="pass_confirm" name="pass_confirm" placeholder="Подтверждение пароля" class="input">
                <button type="submit" class="input green_button"><strong>Подтвердить</strong></button>
            </form>
        </div>
    </div>
    <div id="window2" class="window">
        <img class="close" src="images/close.png" alt=""  onclick="show2('none')">
        <div class="form">
            <h2 class="h2_modal">Войти</h2>
            <form action="login.php" method="post">
                <input type="text" id="login1" name="login1" placeholder="Ваше имя" class="input">
                <input type="password" id="pass1" name="pass1" placeholder="Пароль" class="input">
                <button type="submit" class="input blue_button"><strong>Подтвердить</strong></button>
            </form>
        </div>
    </div>
