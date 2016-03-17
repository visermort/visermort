<!DOCTYPE html>
<html lang="ru-RU">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--[if lt IE 9]>
	<!-- build:js scripts/html5shiv.js -->
	<script type="text/javascript" src="js/html5shiv.js"></script>
	<!-- endbuild -->
    <![endif]-->
	<title>Выпускной проект ученика LoftSchool</title>
	<meta name="keywords" content="спартак портфолио ученик loftschool">
	<!-- build:css css/vendor.css -->
	<!-- bower:css-->
	<link rel="stylesheet" href="bower/normalize-css/normalize.css" />
	<!-- endbower -->
	<!-- endbuild -->
	<!-- build:css css/portfolio.css -->
	<link rel="stylesheet" href="css/main.css">
	<link rel="stylesheet" href="css/portfolio.css">
	<!-- endbuild -->
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
</head>
<body class="portfolio">

<div class="wrapper">
	<header class="header ">
		<div class="header-container  " >
			<a href="/"  class="logo"  >
				<img src="images/logo-logaster-shadow-24.png"  alt="loftschool. От мыслителя к создателю" class="logo-image">
				<span class="logo-text">От мыслителя к создателю</span>
			</a>
			
			<ul class="socials ">
				<li class="social-item">
					<a href="https://www.facebook.com/ViserMort?ref=bookmarks" class="social-item-link sprite facebook">
					 facebook	
					</a>
				</li>
				<li class="social-item">
					<a href="http://vk.com/id1519895" class="social-item-link sprite vk">
					vkontakte	
					</a>
				</li>
				<li class="social-item">
					<a href="https://twitter.com/ViserMort" class="social-item-link sprite twitter">
					twitter	
					</a>
				</li>
				<li class="social-item">
					<a href="https://github.com/visermort" class="social-item-link sprite github">
					github	
					</a>
				</li>
			</ul>
		</div>
	</header> 
	<div class="content clearfix">
		<aside class="sidebar">
			<ul class="nav">
				<li class="nav-item ">
				 <a href="index.html" class="menu-item-link about-link"> Обо мне</a>      
				</li>
				<li class="nav-item ">
				 <a href="portfolio.php" class="menu-item-link portfolio-link">Мои работы</a>
				</li>
				<li class="nav-item ">
				 <a href="contact.html" class="menu-item-link contact-link">Обратная связь</a>      
				</li>
			</ul>
			<div class="contacts-block">
			<h1 class="block-header">Контакты</h1>
			<ul class="contacts">
				<li class="contacts-item" >
					<a href="mailto:oxygenn@list.ru" class="contact-item-link email">oxygenn@list.ru</a>
				</li>
				<li class="contacts-item ">
					<a href="tel:+79114135031" class="contact-item-link phone">+79114135031</a>
				</li>
				<li class="contacts-item ">
					<a href="skype:visermort" class="contact-item-link skype">visermort</a>
				</li>
			</ul>
			</div>
		</aside>
		<div class="content-area">
		<section class="content-part content-">
		    <h1 class="content-header">Мои работы</h1>
			<div class="content-content ">
				<ul class="pages clearfix">

					<?php include_once 'php/readproject.php';  ?>

					<li class="page-add">
						<a href="#" class="page-add-link">
						    <!--  <img src="images/polaroid-1.png" height="64" alt="Добавить проект" class="page-add-image"> -->
							<p class="page-add-text">Добавить проект</p>
						 </a> 
					</li>
				</ul>			

			</div>
		</section>


		</div>
	</div>

	<div class="empty">
	</div>	
</div>
<footer class="footer">
	<div class="footer-content">
		<div class="login login-area sprite"> <a href="#" class="login-area login-text ">вход</a>
		</div>	
	    <div class="footer-text">   &copy; 2015. Это мой сайт. Пожалуйста, не копируйте и не воруйте его.
	    </div>
	</div>
</footer>
<div class="popup ">
	<div class="popup__inner">
		<p class="popup__text">Сообщение успешно отправлено</p>
	</div>
</div>
<div class="form-login">
	<p class="form-register__label" >Авторизируйтесь</p>
	<form action="" class="form-register">
		<div class="form-register__icon icon-email-grey">
			<input name="login"  type="text" class="form-register__email register-input email-gray" placeholder="Введите Email" >
		</div>
		<div class="form-register__icon icon-password">
			<input name="password"  type="password" class="form-register__password register-input password" placeholder="Введите пароль">
		</div>
		<div class="form-register__icon icon-checkbox">
				<input name="rememberme"  type="checkbox" id="form-register__checkbox" class="form-register__checkbox register-checkbox" name="register-checkbox" checked="true">
	  			<div class="form_register__label-chechbox label-checkbox" >
					Запомнить меня?
				</div>
		</div>
		<input type="submit" class="form-register__submit register-submit" value="Войти">

	</form>	
</div>

<div class="page-add-project">
	<p class="pade-add-project__label" >Добавление проекта</p>
	<form id="form_add_project" action="" class="form-add-project" enctype="multipart/form-data" >
		<a href="#" class="page-add-project__close-button">Закрыть</a>
	
			<div class="form-add-project__item close-button">
 				<div class="block-addproject_validate tooltip validate-project-name left">введите название</div>
				<p class="form-add-project__label">Название проекта</p>
				<input name="name" type="text" class="form-add-project__text project-name validate" placeholder="Введите название">
			</div>
			<div class="form-add-project__item">
				<div class="block-addproject_validate tooltip validate-image left">изображение</div>
				 <p class="form-add-project__label">Картинка проекта</p>
				 <label for="form-add-project__image" class="form-add-project__text add-project-image">Загрузите изображение</label>
				 <input type="file" name="image" id="form-add-project__image" class="form-add-project__image-file validate" placeholder="Загрузите изображение" accept="image/jpeg,image/png" > 
				  
			</div>
			<div class="form-add-project__item">
				<div class="block-addproject_validate tooltip validate-url left">ссылка на проект</div>
				<p class="form-add-project__label">URL проекта</p>
				<input type="text" name="url" class="form-add-project__text project-url validate" placeholder="Добавьте ссылку">
			</div>
			<div class="form-add-project__item">
				<div class="block-addproject_validate tooltip validate-decription left">описание проекта</div>
				<p class="form-add-project__label">Описание</p>
				<textarea  name="description" cols="40" rows="6" class="form-add-project__text project-description validate" placeholder="Пара слов о вашем проекте"></textarea>
			</div>
			<div class="form-add-project__item">
				<input type="submit" class="form-add-project__button project-add-submit" value="Добавить">
			</div>

	</form>
</div>
	<!-- build:js scripts/vendor.js -->
	<!-- bower:js -->
	<script src="bower/modernizr/modernizr.js"></script>
	<script src="bower/jquery/jquery.js"></script>
	<script src="bower/bPopup/jquery.bpopup.js"></script>
	<script src="bower/qtip2/jquery.qtip.js"></script>
	<script src="bower/qtip2/basic/jquery.qtip.js"></script>
	<!--endbower-->
	<!-- endbuild -->
	<!-- build:js scripts/main.js -->
	<script type="text/javascript" src="js/main.js"> </script>
	<!-- endbuild -->
</body>
</html>