
<?php


   require($_SERVER['DOCUMENT_ROOT'] ."/configs/bd.php");

   require($_SERVER['DOCUMENT_ROOT'] . "/partials/header.php");

   /*echo "USER is:".$_SESSION['user_id'];*/
?>

<div class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">

<?php
require($_SERVER['DOCUMENT_ROOT'] . "/partials/nav.php");
?>

</div>
    <!-- END nav -->
	
<?php
//выводим страницы в зависимости от существования в  адресной строке ?page=home или ?page=photography
  $page='home';
  if(isset($_GET['page'])) {
 switch ($_GET['page']) {
 	case 'home':
 		$page='home';
 		break;
 	case 'shop':
 		$page='shop';
 		break;
    case 'blog':
    $page='blog';
    break;
    case 'single-post':
    $page='single-post';
    break;
     case 'single-product':
    $page='single-product';
    break;
 	case 'cart':
 		$page='cart';
 		break;
 	case 'checkout':
 		$page='checkout';
 		break;
 	case 'about':
 		$page='about';
 		break;
 	case 'contact':
 		$page='contact';
 		break;    		
 	default:
 		$page='home';
 		break;
 }
}
   require($_SERVER['DOCUMENT_ROOT'] . "/partials/pages/" . $page . ".php");


   require($_SERVER['DOCUMENT_ROOT'] . "/partials/footer.php");
?>		
   
    

 