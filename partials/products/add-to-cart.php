<?php 
  require ($_SERVER['DOCUMENT_ROOT'] . '/configs/bd.php');

    if(isset($_POST['id']) && (int)$_POST['quantity'] >= 1){

         
        $id=intval($_POST['id']); 
         
        if(isset($_SESSION['cart'][$id])){ 
             
            $_SESSION['cart'][$id]['quantity']++; 
             
        } else { 
             
            $sql_s="SELECT * FROM products 
                WHERE id={$id}"; 
            $query_s=mysqli_query($conn, $sql_s); 
            if(mysqli_num_rows($query_s)!=0){ 
                $row_s=mysqli_fetch_array($query_s); 
                 
                $_SESSION['cart'][$row_s['id']]=array( 
                        "quantity" => 1, 
                        "price" => $row_s['price'] 
                    ); 
                 
                 
            }else{ 
                 
                $message="This product id it's invalid!"; 
                 
            } 
             
        } 
        
      header("Location: /?page=cart");   
    } 
 
?>

<!-- добавить товар по клику на кнопку без перехода на страницу корзины -->

<?php 
 
    if(isset($_GET['action']) && $_GET['action']=="add"){ 
         
        $id=intval($_GET['id']); 
         
        if(isset($_SESSION['cart'][$id])){ 
             
            $_SESSION['cart'][$id]['quantity']++; 
             
        }else{ 
             
            $sql_s="SELECT * FROM products 
                WHERE id={$id}"; 
            $query_s=mysqli_query($conn, $sql_s); 
            if(mysqli_num_rows($query_s)!=0){ 
                $row_s=mysqli_fetch_array($query_s); 
                 
                $_SESSION['cart'][$row_s['id']]=array( 
                        "quantity" => 1, 
                        "price" => $row_s['price'] 
                    ); 
                 
                 
            }else{ 
                 
                $message="This product id it's invalid!"; 
                 
            } 
             
        } 
         
    } 
 
?>


