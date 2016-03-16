<?php
/**
 * Created by PhpStorm.
 * User: Spartak
 * Date: 27.02.2016
 * Time: 21:38
 */

header("content-type: application/json");

$name = $_post['name'];
$email = $_post['email'];

sleep(1);//что-то сделали

$result = true;//вернули тру

echo json_encode(array(
    'status' => $result
));