<?php
require($_SERVER['DOCUMENT_ROOT'] ."/configs/bd.php"); 
 require ($_SERVER['DOCUMENT_ROOT'] . '/configs/helpers.php');
 session_start();
?>

<?php 
  
  if(isset($_GET['cart'])) {
    switch ($_GET['cart']) {
        case 'add':
            $id= isset($_GET['id']) ? (int)$_GET['id'] : 0;
            $product=getProduct($id);
            if(!$product){
            	echo json_encode(['code'=> 'error', 'answer'=> 'Error']);
            } else {
              addToCart($product,1);
            	echo json_encode(['code'=> 'OK', 'answer'=> $product]);
            }
            
            break;
        
       
    }
  }
  ?>


  <?php

 if(isset($_POST['product_id']) && (int)$_POST['quantity'] >= 1){

         
        $id=intval($_POST['product_id']); 
        $countOfProduct=$_POST['quantity'];
         $product=getProduct($id);

        addToCart($product,$countOfProduct);
         header("Location: /?page=cart");
                 
                 
            }else{ 
                 
                $message="This product id it's invalid!"; 
                 
            } 
             
       

  ?>