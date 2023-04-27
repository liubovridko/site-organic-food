<?php
session_start();
require($_SERVER['DOCUMENT_ROOT'] ."/configs/bd.php"); 
 require ($_SERVER['DOCUMENT_ROOT'] . '/configs/helpers.php');

if(!empty($_POST)) {

	$cart = $_SESSION['cart'];

//Create a new record in the orders tables
  $data=load($data);
  $order_id=save('orders', $data);


	// Adding records to the order_details table for each product in the order
	foreach ($cart as $item) {
	  $product_id = mysqli_real_escape_string($conn, $item['product_id']);
	  $product_name = mysqli_real_escape_string($conn, $item['title']);
	  $quantity = mysqli_real_escape_string($conn, $item['quantity']);
	  $price = mysqli_real_escape_string($conn, $item['price']);
	  $sql = "INSERT INTO order_details (order_id, product_id, product_name, quantity, price) VALUES ('$order_id', '$product_id', '$product_name', '$quantity', '$price')";
	 if(mysqli_query($conn, $sql)){
          $_SESSION["cart"]=null;
           echo 'Ви успішно оформили замовлення! Номер вашого замовлення: №'.$order_id; 
            sleep(3);
			//redirect to main page
			header("Location: /");
	     } else {

			  // Checking the successful execution of a request to add a product
		        die("Error: Product not added to order.");
            }
	}
 
} else {
        
}


