<?php
  session_start();
  require 'header.php';
?>
<div class="content">
  <?php
     if (isset($_SESSION['message'])) {
       echo '<div class="msg"> ' . $_SESSION['message'] . ' </div>';
     }
     unset($_SESSION['message']);
  ?>
  <div class="main_content">
    <h2 id="h2_index">Категории</h2>
    <div class="categories_index">
      <?php
        require_once 'db_connection.php';
        $result = $mysql->query("SELECT * FROM `categories`");
        while ($row = $result->fetch_assoc()) {
          $show_img = base64_encode($row['image']); ?>
          <div class="category_bd"><img class="img_index" src="data:image/jpeg;base64, <?php echo $show_img ?>" alt="">
          <h2><?php echo $row['title']; ?></h2><?php echo $row['description'];?> <a href="<?php echo $row['link'] ?>">Перейти</a></div>
      <?php } ?>
    </div>
  </div>
</div>
<?php require ('footer.php') ?>
