<?php 
	/*подключаемся к базе данных*/
	 require ($_SERVER['DOCUMENT_ROOT'] . '/configs/bd.php');
	 require ($_SERVER['DOCUMENT_ROOT'] . '/configs/helpers.php');


	 /*var_dump($_POST);*/
	 $comment_id = $_POST['comment_id'];
	 $username = $_POST['username'];
	 $email = $_POST['email'];
	 $text = $_POST['message'];
	 $user=getCurrentUser();
	 $timeTwit = date("F j, Y, g:i a");
	 


	/*вставляем новый comment*/
	 $sql="INSERT INTO `comments`( parent_comment_id, `comment_sender_name`, `comment_sender_email`, `comment`) VALUES ('". $comment_id. "', '". $username ."', '". $email ."', '". $text ."') ";

           /*выполнить запрос*/
           //запрос к базе данных
          $result=mysqli_query($conn, $sql);
          echo $result;
         

            /*if (mysqli_query($conn, $sql)) {*/
            	/*добавить этот текст твита с картинкой в начало списка всех твитов*/
            	/* echo "<li class='list-group-item'>$text</li>";*/
            	/* $html = "<li class='comment'>
                  <div class='vcard bio'>
                    <img src='assets/images/person_1.jpg' alt='Image placeholder'>
                  </div>
                  <div class='comment-body'>
                    <h3>$username</h3>
                    <div class='meta'>$timeTwit</div>
                    <p>$text</p>
                    <p><a href='#' class='reply'>Reply</a></p>
                  </div>
                </li>" ;
				   echo $html ;*/ 
				/*} else {
				      echo "Error: " . $sql . "<br>" . mysqli_error($conn);

				}*/


?>

           