<?php 


//function checkLogin($write){ //проверка, зарегистрирован пользватель или нет write - имеются ли права на запись в базу.
//	return true;
//}


function sendEmail($name,$email,$subject,$body) {
		//непосредственно почта
		$mail = new PHPMailer;
		//$mail->SMTPDebug = 3;                               // Enable verbose debug output
		//$mail->isSMTP();                                      // Set mailer to use SMTP
		//$mail->Host = 'smtp1.example.com;smtp2.example.com';  // Specify main and backup SMTP servers
		//$mail->SMTPAuth = true;                               // Enable SMTP authentication
		//$mail->Username = 'user@example.com';                 // SMTP username
		//$mail->Password = 'secret';                           // SMTP password
		//$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
		//$mail->Port = 587;                                    // TCP port to connect to

		$mail->setFrom($email,$name);
		$mail->addAddress(const_admin_email);                    // Add a recipient
		//$mail->addAddress('ellen@example.com');               // Name is optional
		//$mail->addReplyTo('info@example.com', 'Information');
		//$mail->addCC('cc@example.com');
		//$mail->addBCC('bcc@example.com');
		//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
		//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
		$mail->isHTML(true);                                  // Set email format to HTML

		$mail->Subject = $subject;//'Message from visermort.ru';
		$mail->Body    = $body;//'This is the HTML message body <b>in bold!</b>';
		$mail->AltBody = $body;//'This is the body in plain text for non-HTML mail clients';
		if(!$mail->send()) {
		    return 'Сообщение не отправлено '.$mail->ErrorInfo;
		} else {
		    return 'Сообщение отправлено';
		}
}//sendEmail


//проверка капчи - запрос на сервер, ответ - прошло или не прошло
function captchaCheck($request) {
	//нужно формировать post запрос 
	// secret	Required. The shared key between your site and ReCAPTCHA.
	// response	Required. The user response token provided by the reCAPTCHA to the user and provided to your site on.
	// remoteip	Optional. The user's IP address.
		$myCurl = curl_init();
		curl_setopt_array($myCurl, array(
		    CURLOPT_URL => captcha_check_url,
		    CURLOPT_RETURNTRANSFER => true,
		    CURLOPT_POST => true,
		    CURLOPT_POSTFIELDS => http_build_query(array(
		    	/*здесь массив параметров запроса*/
		    	'secret' => captcha_code,
		    	'response' => $request,
		    	'remoteip' => $_SERVER["REMOTE_ADDR"]
		    	))
		));
		$response = curl_exec($myCurl);
		curl_close($myCurl);
	//	echo "Ответ на Ваш запрос: ".$response;

   $googleresponse = json_decode($response,true);

// Ответ в формате jsomThe response is a JSON object:
// {
//   "success": true|false,
//   "error-codes": [...]   // optional
// }
	return ($googleresponse['success']==1);
}

  //для возврата в JS сообщений - кодируем их в Json
function createMessageJson($mess) {
      $res['message'] = $mess;
    return json_encode($res);
}



   //проверяем логин и пароль пользователя, если $admin - то принадлежность к группе администраторов
 //если всё хорошо, то результат 0 Если что-то плохо, то строка с ошибкой
function checkPassword($login,$password,$admin){
	try {
		$res = 0;//это верный результат
		$database = new PDO('mysql:host='.dbhost.';dbname='.dbname, dblogin,dbpassword); //подключение к базе
		$qres = $database-> prepare('SELECT * FROM `users`  where `name`=:name');
		$qres -> bindValue(':name',$login ,PDO::PARAM_STR);
		$qres -> execute();
		if ($row = $qres -> fetch()) {
			if (password_verify( $password ,$row['password'])) {
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
	return $res;
}


















