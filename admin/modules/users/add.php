
	<?php
  require ($_SERVER['DOCUMENT_ROOT'] . '/configs/bd.php');

  

  ?>

	<?php
      
/* если форма передала данные через метод,  _POST не пустой*/
    if(!empty($_POST)) {
    echo $_POST['name'] . "-" . $_POST['email'];

    /*вносим текст поста в новую строку в базе данных */

    $sql = "INSERT INTO `users` ( `username`, `email`, password ) VALUES ('". $_POST['name'] ."', '". $_POST['email'] ."' , '". password_hash($_POST['password'], PASSWORD_BCRYPT) ."')";
			if (mysqli_query($conn, $sql)) {
				/*редирект на страницу с пользователя*/
			      echo "New record created successfully";
			      header("Location: /admin/users.php");
			} else {
			      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
			}
			  mysqli_close($conn);
    }

     
	?>

	<div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title">Add Users</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="#"  method="POST" data-toggle="validator">
                            <div class="row"> 
                                <div class="col-md-6">                      
                                    <div class="form-group">
                                        <label>Name *</label>
                                        <input type="text" class="form-control" placeholder="Enter Name" name="name" required>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>    
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Phone Number *</label>
                                        <input type="text" class="form-control" placeholder="Enter Phone No" required>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div> 
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Email *</label>
                                        <input type="text" class="form-control" name="email" placeholder="Enter Email" required>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div> 
                                
                                <div class="col-md-12">                      
                                    <div class="form-group">
                                        <label>User Name *</label>
                                        <input type="text" class="form-control" placeholder="Enter User Name" required>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-6">                      
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input type="text" class="form-control" name="password" placeholder="Enter Password" required>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>  
                                <div class="col-md-6">                      
                                    <div class="form-group">
                                        <label>Confirm Password</label>
                                        <input type="text" class="form-control" placeholder="Enter Confirm Password" required>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div> 
                                
                                <div class="col-md-12">
                                   <div class="checkbox d-inline-block mb-3">
                                        <input type="checkbox" class="checkbox-input mr-2" id="checkbox1" checked="">
                                        <label for="checkbox1">Notify User by Email</label>
                                    </div>
                                </div>                               
                            </div>                            
                            <button type="submit" class="btn btn-primary mr-2">Add Customer</button>
                            <button type="reset" class="btn btn-danger">Reset</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Page end  -->