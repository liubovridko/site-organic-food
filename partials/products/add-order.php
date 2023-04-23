<?php
require($_SERVER['DOCUMENT_ROOT'] ."/configs/bd.php"); 
 require ($_SERVER['DOCUMENT_ROOT'] . '/configs/helpers.php');

if(!empty($_POST)) {
 $data=load($data);
 $order_id=save('orders', $data);
 
} else {

}