<?php
include_once 'phpincluds.php';
include_once 'phpsettings.php';


header("content-type: application/json");

if (!isset($_POST) or !isset($_FILES)) {
	exit( createMessageJson('Нет входных данных'));
}

//foreach($_POST as $key => $value ){$post .=$key.' => '.$value; };


//проверка введённых данных, используем модуль
$v = new Valitron\Validator($_POST);
$v->rule('required', ['name', 'url', 'description']);
if(!$v->validate()) {
	exit (createMessageJson('Неполные данные '.$post));
}

//cделаем проверку, что выполнена регистрация
//смотрим , есть ли в сессии логи и пароль, и проверяем
session_start();  //
if (!isset($_SESSION) or !isset($_SESSION['password_hash']))
        	exit (createMessageJson('Не выполнена регистрация в системе'));
$res = checkGroup($_SESSION['password_hash'],admins);
if ($res) exit (createMessageJson($res));


$name = $_POST['name'];
$url = $_POST['url'];
$image = $_POST['image'];
$description = $_POST['description'];
$file = $_FILES['image'];
//проверяем размер файла
if ($file['size'] == 0 or $file['size'] > 2097152)
	exit(createMessageJson('Загрузите файл разрешённого размера'));
//провряем формат файла
$imageinfo = getimagesize($file['tmp_name']);
if ($imageinfo['mime'] != 'image/gif' and $imageinfo['mime'] != 'image/jpeg' and $imageinfo['mime'] != 'image/png')
	exit(createMessageJson('Неверный тип файла '.$imageinfo['mime']));
//добавляем расширение
$path_info = pathinfo($file['name']);
$ftype = strtolower($path_info['extension']);//равширение файла

//проверяем, есть ли директория для загузки
//if (!file_exists('../../files')){
//	//если нет, то создаём\
//	mkdir('./../files'.uploads,777);
//}

//создаём уникальное имя для файла
$filename=md5(uniqid(rand(10000,99999)));
$filename_copy = $filename.'_copy';
$file_dist = $_SERVER["DOCUMENT_ROOT"].uploads.$filename.'.'.$ftype;
$file_copy_dist = $_SERVER["DOCUMENT_ROOT"].uploads.$filename_copy.'.'.$ftype;

$tmpname = $file['tmp_name'];
if(move_uploaded_file($tmpname,$file_dist))
    {$res='файл успешно скопирован';}
    else {$res = 'Ошибка при сохранении файла ';};
//пока всё норм, далее конвертация
$img = new abeautifulsite\SimpleImage();
$img -> load($file_dist) -> resize( 172 , 126 ) -> save($file_copy_dist);
unlink($file_dist);
//запись в базу

try{
	$database = new PDO('mysql:host='.dbhost.';dbname='.dbname, dblogin,dbpassword);
	$qres = $database-> prepare('insert into `projects` (`name`,`url`,`decsription`,`image`) values (:pname,:url,:description,:image)');
	$qres -> bindValue(':pname',$name ,PDO::PARAM_STR);
	$qres -> bindValue(':url',$url ,PDO::PARAM_STR);
	$qres -> bindValue(':description',$description ,PDO::PARAM_STR);
	$qres -> bindValue(':image',$filename_copy.'.'.$ftype,PDO::PARAM_STR);
	$qres -> execute();
	$database -> NULL;
} catch (PDOException $e) {			//ошибка,
	$res .= "Error!: " . $e->getMessage();
}


exit (createMessageJson('Выполнен перенос данных в базу '. $res));
