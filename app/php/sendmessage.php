<?php
include_once 'phpincluds.php';
include_once 'phpsettings.php';

header("content-type: application/json");

//проверка капчи
if (!isset($_POST['g-recaptcha-response']) || !captchaCheck($_POST['g-recaptcha-response'])) {
	exit(createMessageJson(false,'Не прошла проверка Каптчи'));
}

//проверка введённых данных, используем модуль
$v = new Valitron\Validator($_POST);
$v->rule('required', ['name', 'email', 'text']);
$v->rule('email', 'email');
if(!$v->validate()) {
  exit (createMessageJson(false,'Неверные введённые данные'));
}
//echo( $_post );
$body ='';
//foreach($_POST as $key => $value){
	$body .= '<p><strong>Name</strong>'.$_POST['name'].'</p>'; 
	$body .= '<p><strong>Email</strong>'.$_POST['email'].'</p>'; 
	$body .= '<p><strong>Text</strong>'.$_POST['text'].'</p>'; 
//}

$res = sendEmail($_POST['name'],$_POST['email'],'Сообщение с сайта visermort.ru',$body );

if ($res)exit (createMessageJson(false,$res)); else
	exit(createMessageJson(true,'Ваше сообщение отправлено!'));

