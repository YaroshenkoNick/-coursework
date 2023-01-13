<?php
 session_start();
 $login = $_POST['login'];
 $pass = $_POST['pass'];
 $pass_confirm = $_POST['pass_confirm'];
 require_once 'db_connection.php';
 $res = $mysql->query("SELECT COUNT(*) FROM users WHERE login = '$login' LIMIT 1");
 $checkResult = $res->fetch_assoc();
 if (mb_strlen($login) < 3 || mb_strlen($login) > 50) {
   $_SESSION['message'] = 'Недопустимая длина логина';
   header('Location: index.php');
 } else if (mb_strlen($pass) < 5 || mb_strlen($pass) > 50) {
   $_SESSION['message'] = 'Недопустимая длина пароля';
   header('Location: index.php');
 } else if ($pass != $pass_confirm) {
   $_SESSION['message'] = 'Пароли не совпадают' ;
   header('Location: index.php');
 } else if (current($checkResult) > 0) {
   $_SESSION['message'] = 'Данное имя уже существует' ;
   header('Location: index.php');
 } else {
 function rand_string($nChars, array $case = array()) {
   define ('LOW', 'abcdefghijklmnopqrstuvwxyz');
   define ('UPP', 'ABCDEFGHIJKLMNOPQRSTUVWXYZ');
   define ('NUM', '1234567890');
   $nChars–;
   $symbols = array();
   if (in_array('low', $case))
   $symbols[] = LOW;
   if (in_array('upp', $case))
   $symbols[] = UPP;
   if (in_array('num', $case))
   $symbols[] = NUM;
   if (count($symbols) == 0)
   $symbols = array(LOW, UPP, NUM);
   $rand_str = '';
   for ($i = 0; $i < $nChars; $i++) { // циклим по числу необходимых символов в итоговой строке
   $id = mt_rand(0, count($symbols) - 1); // случайным образом определяем ТИП символов, из которых будем получать случайный СИМВОЛ
   $source_str = $symbols[$id];
   $rand_str .= $source_str{ mt_rand(0, strlen($source_str) - 1) }; // очередной случаный символ
   }
   return $rand_str;
   }
 $arr=array('low', 'upp', 'num');
 $salt = rand_string(22,$arr);
 $options = ['salt' => $salt];
 var_dump($salt);
 $pass = password_hash($pass, PASSWORD_BCRYPT, $options);
 var_dump($pass);
 $mysql->query("INSERT INTO `users` (`login`, `pass`, `salt`) VALUES('$login', '$pass', '$salt') ");
 $mysql->close();
 $_SESSION['message'] = 'Теперь вы можете войти' ;
 header('Location: index.php');
}
?>
