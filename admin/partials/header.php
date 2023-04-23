<?php
  require ($_SERVER['DOCUMENT_ROOT'] . '/configs/bd.php');
  //проверка: если сессии не существует, запускаем сессию
  if(!isset($_SESSION)){
    session_start();

require ($_SERVER['DOCUMENT_ROOT'] . '/configs/helpers.php');

  }
  
//проверка есть ли у нас сессия
$is_session=isset($_SESSION["user_id"]) && $_SESSION["user_id"] != null;// true/false
//проверка есть ли у нас куки
$is_cookie=isset($_COOKIE["user_id"]) && $_COOKIE["user_id"] != null;// true/false

  //если переменная $_SESSION["used_id"] сессия или куки существует и не равна null /пользовалеть авторизовался
    if( $is_session || $is_cookie ){
      //есть есть сессия(не равна 0(true)) присваиваем переменной $userID=$_SESSION["user_id"], если нет сессии $userID=$_COOKIE["user_id"]
      $userID= $is_session ? $_SESSION["user_id"] : $_COOKIE["user_id"];
      
          // выбор пользователя
         $sql="SELECT * FROM users WHERE id=" . $userID;
     $result=mysqli_query($conn, $sql);
     $user=$result->fetch_assoc();//user это наш пользователь
     //var_dump($user);
         //если наш пользователь роль не админ, делаем переадресацию на страницу авторизации
     if($user['role'] !=="admin") {
      header("Location: /login.php");
      
     }
     // выводим кнопку выйти
         //echo '<a class="btn btn-primary" href="logout.php" role="button">Logout</a>';
       } else {
            header("Location: /login.php");
       }
?>



<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <title>POS Dash | Responsive Bootstrap 4 Admin Dashboard Template</title>
      
      <!-- Favicon -->
      <link rel="shortcut icon" href="/admin/assets/images/favicon.ico" />
      <link rel="stylesheet" href="/admin/assets/css/backend-plugin.min.css">
      <link rel="stylesheet" href="/admin/assets/css/backend.css?v=1.0.0">
      <link rel="stylesheet" href="/admin/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css">
      <link rel="stylesheet" href="/admin/assets/vendor/line-awesome/dist/line-awesome/css/line-awesome.min.css">
      <link rel="stylesheet" href="/admin/assets/vendor/remixicon/fonts/remixicon.css">  </head>
  <body class="  ">