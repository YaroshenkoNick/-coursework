<?php
  session_start();
  if (!$_COOKIE['auth_token']) {
      header('Location: index.php');
  }
  require 'header.php';
?>
<div class="content" id="content_add_recipe">
  <?php
     if (isset($_SESSION['message'])) {
       echo '<div class="msg"> ' . $_SESSION['message'] . ' </div>';
     }
     unset($_SESSION['message']);
  ?>
  <div class="main_content" id="add_recipe">
        <div class="add_recipe_form">
          <h2 id="h2_add_recipe">Добавьте ваш рецепт</h2>
          <form action="add_recipe.php" method="post" enctype="multipart/form-data">
            <label for="title">Название:</label>
            <input placeholder="Введите название" class="input_add_recipe" type="text" id="title" name="title" required>
            <label for="category">Категория:</label>
            <input placeholder="Введите категорию" class="input_add_recipe" type="text" id="category" name="category" required>
            <label for="image_recipe">Изображение:</label>
            <input placeholder="Выберите изображение" class="input_add_recipe" type="file" id="image_recipe" name="image_recipe" required>
            <textarea id="ingredients" name="ingredients" placeholder="Введите ингредиенты" maxlength="500" required></textarea>
            <p id="p_add_recipe">Ингредиенты разделять переносом строки(Enter)</p>
            <textarea id="describe_add_recipe" name="content" placeholder="Описание рецепта" maxlength="3000" required></textarea>
            <button type="submit" class="input red_button"><strong>Добавить</strong></button>
          </form>
        </div>
    </div>
  </div>
<?php require ('footer.php') ?>
