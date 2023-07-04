<?php
session_start();
require($_SERVER['DOCUMENT_ROOT'] ."/configs/bd.php"); 
 require ($_SERVER['DOCUMENT_ROOT'] . '/configs/helpers.php');

if(!empty($_POST)) {

	$cart = $_SESSION['cart'];

//Create a new record in the orders tables
  $data=load($data);
  $order_id=save('orders', $data);

  
  
  // Проверка, был ли выбран чекбокс "Create an Account"
  if (isset($_POST['optradio'])) {
  	// Получение данных из формы
	  $firstname = $_POST['firstname'];
	  $lastname = $_POST['lastname'];
	  $email = $_POST['emailaddress'];
	  $password = ''; // Здесь необходимо сгенерировать и сохранить пароль пользователя
	  // Генерация случайного пароля
	  $random_password = generateRandomPassword(); // Здесь вызывается ваша функция для генерации случайного пароля

	  // Хэширование пароля
	  $hashed_password = password_hash($random_password, PASSWORD_DEFAULT);

	  // Сохранение хэшированного пароля
	  $password = $hashed_password;
	  $phone=$_POST['phone'];

    // Создание нового пользователя

     $sql = "INSERT INTO `users` ( `username`,`last_name`, `email`,`phone`, password) VALUES ('".  $firstname ."', '". $lastname ."', '". $email ."', '". $phone ."' , '". $password ."')";
    //если запрос к базе данных успешный
       $result=mysqli_query($conn, $sql);
          //выбирает одну запись и помещает ее в массив
          $user=$result->fetch_assoc();
      if ($result) {
      	    $_SESSION['user_id'] = $user['id'];
           
      } else {
        //если запрос к базе данных не успешный
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
      }
      //закрываем соединение
        mysqli_close($conn);
    
  }


	// Adding records to the order_details table for each product in the order
	foreach ($cart as $item) {
	  $product_id = mysqli_real_escape_string($conn, $item['product_id']);
	  $product_name = mysqli_real_escape_string($conn, $item['title']);
	  $quantity = mysqli_real_escape_string($conn, $item['quantity']);
	  $price = mysqli_real_escape_string($conn, $item['price']);
	  $sql = "INSERT INTO order_details (order_id, product_id, product_name, quantity, price) VALUES ('$order_id', '$product_id', '$product_name', '$quantity', '$price')";
	 if(mysqli_query($conn, $sql)){
          $_SESSION["cart"]=null;
           
			//redirect to  page my order
			header("Location: /?page=my-order&id=". $order_id);
	     } else {

			  // Checking the successful execution of a request to add a product
		        die("Error: Product not added to order.");
            }
	}
 
} else {
        
}


