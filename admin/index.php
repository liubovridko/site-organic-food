<?php
  require ($_SERVER['DOCUMENT_ROOT'] . '/admin/partials/header.php'); 
?>


<?php

$sql = "SELECT * FROM users"; //выбрать все из базы данных users
$result = $conn->query($sql);

//foreach ($result as $row) {
	//var_dump($row);//посмотреть что находится в row
	//echo '<p>Запись id='. $row ['id'] . '. Текст: '. $row ['username'] . '</p>';//выводим данные
//}


?>

  <!-- loader Start -->
    <div id="loading">
          <div id="loading-center">
          </div>
    </div>
    <!-- loader END -->
    <!-- Wrapper Start -->
    <div class="wrapper">


<?php
  require ($_SERVER['DOCUMENT_ROOT'] . '/admin/partials/sidebar.php'); 
?>

 <div class="content-page">
     <div class="container-fluid">
	<table id="customers">
		  <tr>
		    <th>Id</th>
		    <th>Username</th>
		    <th>Email</th>
		    <th>Password</th>
		    <th>Option</th>
		  </tr>

	  <?php
	while($row = $result->fetch_assoc())//получаем все строки в цикле по одной
		{
		?>
		  <tr>
		    <td><?php echo $row['id']; ?></td>
		    <td><?php echo $row['username']; ?></td>
		    <td><?php echo $row['email']; ?></td>
		    <td><?php echo $row['password']; ?></td>
		    <td>
		    	<!-- ссылки в кнопках устанавливаем GET параметр -->
                                            <a href="/admin/modules/users/edit.php?id=<?php echo $row['id']; ?>" class="btn btn-warning"><i class="fas fa-pen"></i> Edit</a>

                                            <a href="/admin/modules/users/delete.php?id=<?php echo $row['id']; ?>" class="btn btn-danger"><i class="fas fa-trash"></i> Delete</a>
		    </td>
		  </tr> 

		  <?php	
		}
	   ?>
   </table>


        </div>
	   </div>
	  </div>
    <!-- Wrapper End-->


  <?php
  require ($_SERVER['DOCUMENT_ROOT'] . '/admin/partials/footer.php'); 
?>
  