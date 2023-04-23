<?php


require($_SERVER['DOCUMENT_ROOT'] ."/configs/bd.php");

require($_SERVER['DOCUMENT_ROOT'] ."/partials/header.php");

/*$password = "admin123345";
	 $hash = password_hash($password, PASSWORD_BCRYPT); хешируем пароль при регистрации
	 echo $hash . "<hr/>";*/

	 //если внесены в форму данные, вставляем эти данные в базу данных
 if(!empty($_POST)) {

    $sql = "INSERT INTO `users` ( `username`,`last_name`, `email`,`phone`, password) VALUES ('". $_POST['first_name'] ."', '". $_POST['last_name'] ."', '". $_POST['email'] ."', '". $_POST['phone'] ."' , '". password_hash($_POST['password'], PASSWORD_BCRYPT) ."')";
    //если запрос к базе данных успешный
      if (mysqli_query($conn, $sql)) {
      	    $_SESSION['user_id'] = $user['id'];
           echo 'Ви успішно зареєстровані!'; 
            sleep(3);
            //редирект на главную страницу
            header("Location: /");
      } else {
        //если запрос к базе данных не успешный
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
      }
      //закрываем соединение
        mysqli_close($conn);
    }
?>

<div class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">

<?php
require($_SERVER['DOCUMENT_ROOT'] . "/partials/nav.php");
?>

</div>

<?php
//если переменная $_SESSION["user_id"] or $_COOKIE["user_id"] сессия существует и не равна null 
    if(isset($_SESSION["user_id"]) && $_SESSION["user_id"] != null){
      // выводим кнопку выйти
         echo '<div class=container><p>Бажаєте вийти?</p><a class="btn btn-primary" style="margin-bottom:10px;" href="logout.php" role="button">Logout</a></div>';
       } else if(isset($_COOKIE["user_id"]) && $_COOKIE["user_id"] != null){
       // выводим кнопку выйти
         echo '<div class=container><p>Бажаєте вийти?</p><a class="btn btn-primary" style="margin-bottom:10px;" href="logout.php" role="button">Logout</a></div>';
       } else {
        //если сессия не существует, выводим form регистрация
   ?>   
        <div class="bform py-5">
 <!-- Row -->
	 <div class="row">
		 <div class="container">
			 <div class="col-lg-6 align-justify-center pr-4 pl-0 contact-form">
				 <div class="">
				 <h2 class="mb-3 font-weight-light">Please, Register </h2>
				 
					 
					 <form action="#" method="POST" >
                                    <div class="row">
                                       <div class="col-lg-6">
                                          <div class="floating-label form-group">
                                             <input name="first_name" class="floating-input form-control" type="text" placeholder=" " required>
                                             <label>Full Name</label>
                                          </div>
                                       </div>
                                       <div class="col-lg-6">
                                          <div class="floating-label form-group">
                                             <input name="last_name" class="floating-input form-control" type="text" placeholder=" " required>
                                             <label>Last Name</label>
                                          </div>
                                       </div>
                                       <div class="col-lg-6">
                                          <div class="floating-label form-group">
                                             <input name="email" class="floating-input form-control" type="email" placeholder=" " required>
                                             <label>Email</label>
                                          </div>
                                       </div>
                                       <div class="col-lg-6">
                                          <div class="floating-label form-group">
                                             <input name="phone" class="floating-input form-control" type="tel" placeholder="068-444-55-555 " pattern="[0-9]{3}-[0-9]{2}-[0-9]{3}" required>
                                             <label>Phone No.</label>
                                          </div>
                                       </div>
                                       <div class="col-lg-6">
                                          <div class="floating-label form-group">
                                             <input name="password" class="floating-input form-control" type="password" placeholder=" " onChange="onChange()" required >
                                             <label>Password</label>
                                          </div>
                                       </div>
                                       <div class="col-lg-6">
                                          <div class="floating-label form-group">
                                             <input name="confirm" class="floating-input form-control" type="password" onChange="onChange()" placeholder=" " required >
                                             <label>Confirm Password</label>
                                          </div>
                                       </div>
                                       
                                          <div class="row align-items-center remember">
	                           <input type="checkbox" name="remember" value="1">Remember Me
	                          </div>
                                       </div>
                                    </div>
                                     <div class="col-lg-12">
								 <button type="submit" class="btn btn-primary btn-md btn-block" name="submit"><span> Create Account</span></button>
								 
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
							 <div class="col-lg-12 text-center mt-4">
							 Already have an account? <a href="login.php" class="text-danger">Sign In</a>
							 </div>
							 </div>
						 </div>
					 </div>
				 </div>
			 <div class="col-lg-6 right-image pl-3" style="background-image:url(assets/images/image_5.jpg);">
		 </div>
	 </div>
</div>

  <?php    
       }
  ?>

<?php
 require($_SERVER['DOCUMENT_ROOT'] . "/partials/footer.php");
?>		

