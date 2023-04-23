<?php
require($_SERVER['DOCUMENT_ROOT'] ."/configs/bd.php");
require("partials/header.php");
//если сессия существует и не равна null
if(isset($_SESSION["user_id"]) && $_SESSION["user_id"] != null){
	$_SESSION["user_id"]=null;
	//редирект на главную страницу
	header("Location: /");
}

//если куки существуют и не равны null
if(isset($_COOKIE["user_id"]) && $_COOKIE["user_id"] != null){
	//удаляем куки
    setcookie("user_id", '',0,"/");
	//редирект на главную страницу
	header("Location: /");
}
?>