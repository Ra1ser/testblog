<?
//Редактирование записиси в БД
require_once $_SERVER['DOCUMENT_ROOT'] .  '/system/functions.php';
Functions::link();
Main::edit($_POST['id_num']);