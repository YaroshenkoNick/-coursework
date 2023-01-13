<?php
  session_start();
  require 'header.php';
  if (empty($_COOKIE['auth_token'])) {
  $_SESSION['message'] = 'Login to contact with us';
  header('Location: index.php'); }
?>
<div class="content" id="content_contact_us">
  <div id="contact_us">
    <img src="images/contact_us.png" id="contact_us_image" alt="" width="300px" height="300px">
      <div class="contact_us_form">
        <h2 class="h2_contact_us">Связь с нами</h2>
        <form action="contact_us.php" method="post">
          <label for="email">Введите ваш email:</label>
          <input placeholder="Email" class="input_contact_us" type="email" id="email" name="email" required>
          <label for="phone">Введите ваш номер:</label>
          <input placeholder="Номер телефона" maxlength="11" class="input_contact_us" type="tel" id="phone" name="phone" pattern="[0-9]{11}" required>
          <textarea name="comment" placeholder="Как мы можем вам помочь?" maxlength="500" required></textarea>
          <button type="submit" class="input green_button"><strong>Отправить</strong></button>
        </form>
      </div>
      <div class="info_au"><p>
        Наш адрес: Большая Морская 67<br />
        Наш номер телефона: 89881233211
      </p></div>
  </div>
</div>
<?php require 'footer.php' ?>
