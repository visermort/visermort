<?php
include_once 'phpsettings.php';


try {
$sql ='SELECT * FROM users where `name`="vs"';
$res = 0;//это верный результат
$database = new PDO('mysql:host='.dbhost.';dbname='.dbname, dblogin,dbpassword); //подключение к базе
$qres = $database-> prepare('SELECT * FROM `users`  where `name`=:name');
$qres -> bindValue(':name','vs' ,PDO::PARAM_STR);
$qres -> execute();
if ($row = $qres -> fetch()) {
        $count=1;
        $hash = $row['password'];
        if (password_verify('111',$row['password'])) {
            if (true) {  //если $admin то надо убедиться, что пользователь в группе администраторов
					$group=$row['id_group'];
					$qres->closeCursor();
                    $qres = $database -> prepare('SELECT * from `groups` where id=:group and name=:admins');
                    $qres->bindValue(':group', $group,PDO::PARAM_INT);
					$qres->bindValue(':admins','Администраторы',PDO::PARAM_STR);
					$qres -> execute();
                    if ($res  = $qres-> fetch()) {
 						$res=0;
					}else $res = "У пользователя нет прав на запись в базу данных";
				}
               }else $res = "Неправильный пароль";
        }else
            $res = "Нет такого пользователя";
		$database -> NULL;
} catch (PDOException $e) {			//ошибка,
    $res = "Error!: " . $e->getMessage();
    echo $res;
}

echo "Полный результат ".$res;


