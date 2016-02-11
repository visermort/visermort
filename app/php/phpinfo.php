<?php
include_once 'phpsettings.php';

session_start();
//$_SESSION['login'] = 'Некоторый логин';
echo  "здесь должен быть логин и пароль".$_SESSION['login'].'  '.$_SESSION['password'].'<br>';

if (!isset($_SESSION['counter'])) $_SESSION['counter']=0;
echo "Вы обновили эту страницу ".$_SESSION['counter']++." раз. ";
//echo "<br><a href=".$_SERVER['PHP_SELF'].">обновить";
print_r($_SESSION);


//$hash=checkPassword2('vs','111');
//echo '<p> Ввводим логин VS пароль 111 , получаем из базы hash '.$hash.' </p>';
//$res = checkGroup($hash,'Администраторы');
//echo '<p> Полученный hash вставляем - делаем проверку, что пользователь в группе Администраторы, результат '.$res.' </p>';
//$_SESSION['password_hash']=$hash;
//echo '<p> Полученный hash пишем в сессию, и вот он уже в сессии '.$_SESSION['password_hash'].' </p>';



