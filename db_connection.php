<?php
  header( 'Content-Type: text/html; charset=utf-8' );
  $hostname = 'localhost';
  $username = 'root';
  $passwordname = '';
  $basename = 'topfood';
  $mysql = new mysqli($hostname, $username, $passwordname, $basename);
  $mysql->set_charset('utf8');
?>
