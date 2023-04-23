
<?php
  require ($_SERVER['DOCUMENT_ROOT'] . '/admin/partials/header.php'); 
?>


<?php
  /* если форма передала данные через метод,  _POST не пустой*/  
    if(!empty($_POST)) {
/*вносим изменения в базу данных*/
    $sql = "UPDATE `users` SET `username` = '". $_POST['name']."', `email` = '". $_POST['email'] ."' WHERE `id` = ". $_GET['id'] .";";
			if (mysqli_query($conn, $sql)) {
			      echo "<h2>Дані оновлено.<a href='/admin/index.php'>Повернутись</a></h2>";
			     /* header("Location: /");*/
			} else {
			      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
			}
			/*ошибка- соединение не нужно закрывать
			  mysqli_close($conn);*/
    } 
		/*делаем запрос к базе данных к строке по id*/
		$sql = "SELECT * FROM users WHERE id=" . $_GET['id'];
		$result = $conn->query($sql);
		$row = $result->fetch_assoc();
     
	?>
<!-- Форма для редактирования -->

	<div class="card shadow mb-4">
		 <div class="card-header py-3">
		    <h6 class="m-0 font-weight-bold text-primary">Users list</h6>
		 </div>
	  <div class="card-body">
		<form action="/admin/modules/users/edit.php?id=<?php echo $_GET['id']; ?>" method="POST">
           <div class="mb-3">
			  <label for="name" class="form-label">Username</label>
			  <input type="text" name="name" value="<?php echo $row['username']; ?>" class="form-control" id="name" placeholder="Enter name">
			</div>

			<div class="mb-3">
			  <label for="email" class="form-label">Email</label>
			  <input type="text" name="email" value="<?php echo $row['email']; ?>" class="form-control" id="email" placeholder="Enter email">
			</div>
			<button type="submit" class="btn btn-primary btn-lg"><i class="fas fa-save"></i> Save</button>
		</form>
	  </div>
	</div>