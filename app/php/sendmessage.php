<?php
include_once 'phpsettings.php';  



header("content-type: application/json");
if (!isset($_POST)) {
	exit(createMessageJson('Нет входных данных'));
}
//проверка капчи
if (!isset($_POST['g-recaptcha-response']) || !captchaCheck($_POST['g-recaptcha-response'])) {
	exit(createMessageJson('Не прошла проверка Каптчи'));
}

//проверка введённых данных, используем модуль
$v = new Valitron\Validator($_POST);
$v->rule('required', ['name', 'email', 'text']);
$v->rule('email', 'email');
if(!$v->validate()) {
  exit (createMessageJson('Неверные введённые данные'));
}

$body ='';
//foreach($_POST as $key => $value){
	$body .= '<p><strong>Name</strong>'.$_POST['name'].'</p>'; 
	$body .= '<p><strong>Email</strong>'.$_POST['email'].'</p>'; 
	$body .= '<p><strong>Text</strong>'.$_POST['text'].'</p>'; 
//}

$res = sendEmail($_POST['name'],$_POST['email'],'Сообщение с сайта visermort.ru',$body );

exit(createMessageJson($res));

