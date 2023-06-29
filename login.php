<?php


require($_SERVER['DOCUMENT_ROOT'] ."/configs/bd.php");
require($_SERVER['DOCUMENT_ROOT'] ."/partials/header.php");

?>



<?php
//если вненсены в форму данные, выбираем эти данные из базы данных
    if(isset($_POST["submit"])) {
    	$login =  $_POST['email'];
         $password = $_POST['password'];

          $sql="SELECT * FROM `users` WHERE `email`='". $login ."'";
          //запрос к базе данных
          $result=mysqli_query($conn, $sql);
          //выбирает одну запись и помещает ее в массив
          $user=$result->fetch_assoc();

            /* $password = "admin123345";
	        $hash = password_hash($password, PASSWORD_BCRYPT); /*хешируем пароль при регистрации*/
	        /*echo $hash . "<hr/>";*/

		     /*проверяем совпадает ли пароль введенный в форме логина с пароль в базе данных*/
			 if(password_verify($password, $user['password']) ){
			 	 var_dump($_POST);
			  //success
					   //определяем, была ли установлено переменная co значением в поле remember, отличным от null
				      if(isset($_POST['remember'])) {
				        setcookie("user_id", $user["id"],time()+60*60*24*30,"/");
				        //проверка охранились ли куки
				        echo "<h2>". $_COOKIE["user_id"] ."</h2>";
				      } else {
				            //сохраняем сессию
				          $_SESSION["user_id"] = $user["id"];
				      }
		          //редирект на главную страницу
		           header("Location: /");
		           //вывод id пользователя
		           //echo $user["id"];
		        } else {
		          //false
		          //убираем сессию
		          $_SESSION["user_id"] = null;
		          //удаляем куки
		            setcookie("user_id", '',0,"/");
		            echo "<script> alert('Неправильно введені дані. Введіть заново')</script>";
		         }
          
      }

        

?>

<div class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">

<?php
require($_SERVER['DOCUMENT_ROOT'] . "/partials/nav.php");
?>

</div>

<div class="bform py-5">
 <!-- Row -->
	 <div class="row">
		 <div class="container" style="display: flex;">
			 <div class="col-lg-6 align-justify-center pr-4 pl-0 contact-form">
				 <div class="">
				 <h2 class="mb-3 font-weight-light">Please, Login </h2>
				 
					 <form class="mt-3"   method="POST">
						 <div class="row">
							 <div class="col-lg-12">
								 <div class="form-group">
								 <input class="form-control" type="text" placeholder="Your name or email" name="email">
								 </div>
							 </div>
							 
							 <div class="col-lg-6">
								 <div class="form-group">
								 <input class="form-control" type="password" placeholder="Password" name="password">
								 </div>
							 </div>

							 <div class="row align-items-center remember">
	                           <input type="checkbox" name="remember" value="1">Remember Me
	                          </div>
								 <div class="col-lg-12">
								 <button type="submit" class="btn btn-primary btn-md btn-block  " name="submit" ><span> Login</span></button>
								 <!-- -->
							 </div>
						 </div>
					 </form>
				 <div class="row">
					 <div class="col-lg-12 text-center mt-4">
					 <h6 class="font-weight-normal">Signup with Social Accounts</h6>
						 <div class="row">
							 <div class="col-lg-6 col-md-6">
							   <a href="#" class="btn btn-block bg-facebook text-white mt-3">Facebook</a>
							 </div>
							 <div class="col-lg-6 col-md-6">
							    <a href="#" class="btn btn-block bg-twitter text-white mt-3">Twitter</a>
							 </div>
							 </div>
							 </div>
							 
							 </div>
						 </div>
					 </div>
					 <div class="col-lg-6  pl-3" style="background-image:url(assets/images/image_4.jpg); width: 100%; height: 100%; background-position: center;"></div>
				 </div>
			 
	 </div>
</div>

<?php
 require($_SERVER['DOCUMENT_ROOT'] . "/partials/footer.php");
?>		