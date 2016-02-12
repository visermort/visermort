<?php
include_once 'phpincluds.php';
include_once 'phpsettings.php';

//читаем проекты и пишим в массив
function readProjects(){
    try {
        $resArray= [];
        $database = new PDO('mysql:host='.dbhost.';dbname='.dbname, dblogin,dbpassword,array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING)); //подключение к базе
        $qres = $database-> prepare('SELECT * FROM `projects`');
        $qres -> execute();
        while ($row = $qres -> fetch()) {
           $resArray[] = $row;
        }
        $database -> NULL;
    } catch (PDOException $e) {			//ошибка,
        $resArray = "Error!: " . $e->getMessage();
    }
    return $resArray;
}

function writeProject($name,$url,$description,$image){
    try {
        $res = 0;
        $database = new PDO('mysql:host='.dbhost.';dbname='.dbname, dblogin,dbpassword,array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING)); //подключение к базе
        $qres = $database-> prepare('INSERT INTO `projects` (`name`,`url`,`decsription`,`image`) VALUES (:pname,:url,:description,:image)');
        $qres -> bindValue(':pname',$name ,PDO::PARAM_STR);
        $qres -> bindValue(':url',$url ,PDO::PARAM_STR);
        $qres -> bindValue(':description',$description ,PDO::PARAM_STR);
        $qres -> bindValue(':image',$image,PDO::PARAM_STR);
        $qres -> execute();
        $database -> NULL;
    } catch (PDOException $e) {			//ошибка,
        $res = "Error!: " . $e->getMessage();
    }
    return $res;
}

function readDatabase(){
    echo('<h4>Читаем данные из таблицы в массив</h4>');
    $projects = readProjects();
//    echo('<h3>Выводим весь массив</h3>');
//    print_r($projects);
    echo('<h4>Выводим массив построчно</h4>');
    foreach ($projects as $row) {
        echo('<p>' . $row['id'] . ' ' . $row['name'] . ' ' . $row['url'] . ' ' . $row['description'] . ' ' . $row['image'] . '</p>');
    }
}

echo ('<h3>Первоначальное чтение из базы</h3>');
readDatabase();
echo ('<h3>Следующий шаг - запись в базу</h3>');
writeProject('projectname','projectUrl','projectDecr','projectImage');
echo ('<h3>Снова чтение из базы уже обновлённых данных</h3>');
readDatabase();
echo ('<h3>Выведем сведения о сервере</h3>');
phpinfo();





/* Катин код fileUpload
function _initFileUpload () {

    $('#project-file').fileupload({
            url: 'UploadHandler.php',
            dataType: 'json',
            replaceFileInput: false,
            maxNumberOfFiles: 1,
            add: function(e, data) {
        if (!~data.files[0].type.indexOf('image')) {
            $showTooltip($(this), 'Файл не картинка', 'left');
        } else
            if (data.files[0].size > 5000000) {
                $showTooltip($(this), 'Файл слишком большой', 'left');
            } else {
                data.submit();
            }
    },
            done: function (e, data) {
        var fileName = data.files[0].name;
        $('#project-file-name').val(fileName); //Тут мы кладем имя файла в скрытое поле. После валидации формы мы отправляем ее всю обычным аяксом
    }
        })


    };
*/