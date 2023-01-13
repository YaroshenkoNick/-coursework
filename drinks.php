<?php
  session_start();
  require 'header.php';
?>
<div class="content">
  <div class="main_content" id="main_content_recipes_display">
    <h2>Напитки</h2>
    <div class="recipes_display">
      <?php
        require_once 'db_connection.php';
        $result = $mysql->query("SELECT * FROM `recipes` WHERE `category_title`='Напитки' ORDER BY id DESC");
        while ($row = $result->fetch_assoc()) {
          $show_img = base64_encode($row['image']); ?>
          <div class="recipes_display_container">
            <h2><?php echo $row['title']; ?></h2>
            <div class="info_recipe">
              <div class="img_ul_recipes">
              <img class="img_recipes" src="data:image/jpeg;base64, <?php echo $show_img ?>" alt="">
              <ul>Ингридиенты: <?php $string = $row['ingredients'];
                    $tok = strtok($string, "\n");
                    while ($tok !== false) {
                      echo "<li>$tok</li>";
                      $tok = strtok("\n"); }
                  ?>
              </ul>
              </div>
              <div class="recipe_content"><?php
              $content = nl2br($row['content']);
              echo $content;?></div>
              <div class="author">Автор: <?php echo $row['login'];?></div>
          </div>
          <hr color="black" width="100%" size="3px"/>
      <?php } ?>
    </div>
  </div>
</div>
</div>
<?php require 'footer.php' ?>
