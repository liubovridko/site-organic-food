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
        <?php
	/*проверка если массив GET параметров  пустой -выводим страницу all*/
	          if(empty($_GET)){
	           require ($_SERVER['DOCUMENT_ROOT'] . '/admin/modules/users/all-users.php');
	        } else {
	            
	            /*или если есть GET с параметром page- в случаи edit-выводим страницу /edit.php*/
	           switch ($_GET['page']) {
	               case 'edit':
	                   require ($_SERVER['DOCUMENT_ROOT'] . '/admin/modules/users/edit.php');
	                   break;
	               case 'add':
	                    require ($_SERVER['DOCUMENT_ROOT'] . '/admin/modules/users/add.php');
	                   break;
	               default:
	                   # code...
	                   break;
	           }
	        }
?> 
    </div>
    <!-- Modal Edit -->
    <div class="modal fade" id="edit-note" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="popup text-left">
                        <div class="media align-items-top justify-content-between">                            
                            <h3 class="mb-3">Product</h3>
                            <div class="btn-cancel p-0" data-dismiss="modal"><i class="las la-times"></i></div>
                        </div>
                        <div class="content edit-notes">
                            <div class="card card-transparent card-block card-stretch event-note mb-0">
                                <div class="card-body px-0 bukmark">
                                    <div class="d-flex align-items-center justify-content-between pb-2 mb-3 border-bottom">                                                    
                                        <div class="quill-tool">
                                        </div>
                                    </div>
                                    <div id="quill-toolbar1">
                                        <p>Virtual Digital Marketing Course every week on Monday, Wednesday and Saturday.Virtual Digital Marketing Course every week on Monday</p>
                                    </div>
                                </div>
                                <div class="card-footer border-0">
                                    <div class="d-flex flex-wrap align-items-ceter justify-content-end">
                                        <div class="btn btn-primary mr-3" data-dismiss="modal">Cancel</div>
                                        <div class="btn btn-outline-primary" data-dismiss="modal">Save</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
      </div>
    </div>
    <!-- Wrapper End-->

     <?php
  require ($_SERVER['DOCUMENT_ROOT'] . '/admin/partials/footer.php'); 
?>
     	