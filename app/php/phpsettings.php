<?php 
include_once '../lib/phpmailer/phpmailer/class.phpmailer.php';
include_once '../lib/vlucas/valitron/src/Valitron/Validator.php';
include_once 'function.php';

define('const_admin_email','oxygenn@list.ru');
define('captcha_check_url','https://www.google.com/recaptcha/api/siteverify');
define('captcha_code','6Le3lhcTAAAAAHVZQNDRRYr9O3XuNz8kkHarbwEX');
define('dbhost','localhost');
define('dbname','visermort');
define('dblogin','root');
define('dbpassword','');
define('admins','Администраторы');//название группа администраторов