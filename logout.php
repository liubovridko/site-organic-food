<?php
require($_SERVER['DOCUMENT_ROOT'] ."/configs/bd.php");
require("partials/header.php");
//if the session exists and is not null
if(isset($_SESSION["user_id"]) && $_SESSION["user_id"] != null){
	$_SESSION["user_id"]=null;
	//redirect to main page
	header("Location: /");
}

//если куки существуют и не равны null
if(isset($_COOKIE["user_id"]) && $_COOKIE["user_id"] != null){
	//delete cookie
    setcookie("user_id", '',0,"/");
	//redirect to main page
	header("Location: /");
}
?>