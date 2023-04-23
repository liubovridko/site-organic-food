


<?php
      
	 require ($_SERVER['DOCUMENT_ROOT'] . '/configs/bd.php');
/*если $_GET масив не пустой*/

    if(!empty($_GET)) {
    	echo $_GET['user_id'];
    	/*удаляем запись найденную по полученому id*/
    	$sql= "DELETE FROM users WHERE id =".$_GET['id'];
   
			if (mysqli_query($conn, $sql)) {
			      //делаем редирект на страницу с постами
			      header("Location: /admin/index.php");
			} else {
			      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
			}

			mysqli_close($conn); 
    }

       
	?>