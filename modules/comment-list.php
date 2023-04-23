<?php 
	/*подключаемся к базе данных*/
	 require ($_SERVER['DOCUMENT_ROOT'] . '/configs/bd.php');

use Phppot\DataSource;
require_once __DIR__ . '/DataSource.php';
$database = new DataSource();


$sql = "SELECT * FROM comments ORDER BY parent_comment_id asc, comment_id asc";

$result = $database->select($sql);
echo json_encode($result);

	 //запрос к базе данных
          /*$result=mysqli_query($conn, $sql);
          echo json_encode($result);
          var_dump($result);*/