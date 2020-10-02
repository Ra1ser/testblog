<?php
//Загрузка изображения
require_once $_SERVER['DOCUMENT_ROOT'] . '/lib_db/database.php';
$connection = new DataBase();
$connection->connection();
session_start();

function newNameImage($ext)
{
	$image = time() . "_" . rand(-99999, 99999) . $ext;
	move_uploaded_file($_FILES["file"]["tmp_name"], $_SERVER['DOCUMENT_ROOT'] . '/up_img/'. $image);
	$_SESSION['image'] = $image;
}

if(!empty($_FILES["file"]["name"]))
{
	switch ($_FILES["file"]["type"])
	{
		case 'image/gif':
			$ext =  '.jpeg';
			newNameImage($ext);
			break;
		case 'image/png':
			$ext =  '.png';
			newNameImage($ext);
			break;
		case 'image/jpeg':
			$ext =  '.jpg';
			newNameImage($ext);
			break;
	}

}
else header("Location: /");