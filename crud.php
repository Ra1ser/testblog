<?
require_once 'controller/main.php';
require_once 'lib_db/database.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/functions.php';
Functions::link();
session_start();

Main::crud_select($_POST['temp'],$_POST['select'], $_POST['uri']);
Main::crud_delete($_POST['id']);
Main::crud_save($_POST['title'], $_POST['text'], $_SESSION['image']);
Main::crud_update($_POST['id_num'], $_POST['title_update'], $_POST['text_update'], $_SESSION['image']);

session_destroy();