<?php
  session_start();
  if (empty($_COOKIE['auth_token'])) {
  $_SESSION['message'] = 'Login to contact with us';
  header('Location: index.php');
} else header('Location: contact_us_form.php');
?>
