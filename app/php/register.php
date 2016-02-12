<?php
include_once 'phpincluds.php';
include_once 'phpsettings.php';

header("content-type: application/json");
if (!isset($_POST)) {
	exit(createMessageJson('Не заполнен логин и(или) пароль'));
}

//проверка введённых данных, используем модуль
$v = new Valitron\Validator($_POST);
$v->rule('required', ['login', 'password']);
if(!$v->validate()) {
  exit(createMessageJson('Не заполнены обязательные поля'));
}

//далее делаем регистрацию
//используем 
$login = $_POST['login'];
$password = $_POST['password'];
$rememberme = $_POST['rememberme'];

$hash = checkPassword2($login,$password);//проверка регистрации, если прошло, то из базы возращается хэш
if (!hash) { //=0 - проверка не прошла
    exit(createMessageJson('Регистрация не выполнена!'));
}
session_start();
$_SESSION['password_hash'] = $hash;   //в сессию пишем хэш

exit(createMessageJson('Регистраци выполнена'));

