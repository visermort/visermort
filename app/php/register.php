<?php
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

$res = checkPassword($login,$password,false);//на админа не проверяем в этот раз
if ($res) { //>0 - проверка не прошла
    exit(createMessageJson('Регистрация не выполнена!'.$res ));
}

session_start();
$_SESSION['login'] = $login;
$_SESSION['password'] = $password;

exit(createMessageJson('Регистраци выполнена'));

