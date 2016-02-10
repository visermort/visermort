<?php
include_once 'phpsettings.php';  


header("content-type: application/json");

if (!checkLogin(true)) {
exit('Пользователь не зарегистрирован с системе или не имеет прав на добавление проекта!');
};

if (!isset($_POST)) {
	exit('Нет входных данных');
}

foreach($_FILES as $key => $value) { $files .= ' '.$key.' => '.$value;};
foreach($_POST as $key => $value) {  $post  .= ' '.$key.' => '.$value; };

//проверка введённых данных, используем модуль
$v = new Valitron\Validator($_POST);
$v->rule('required', ['name', 'url', 'description']);
//if(!$v->validate()) {
//  exit ('Неполные данные  post '.$post.' files '.$files);
//}

$name = $_POST['name'];
$url = $_POST['url'];
$image = $_POST['image'];
$description = $_POST['description'];


exit ('Данные введены в базу данных  '.$name.$url.$image.$description.$files.$post);
