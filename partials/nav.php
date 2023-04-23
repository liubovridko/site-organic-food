<?php



$username="Sign up";
/*проверка если есть сохраненные куки пользователя, подключаемся к базе данных и выбираем запись пользователя по id полученной из куки*/
if(isset($_COOKIE['user_id'])) {
	$userSQL = "SELECT * FROM users WHERE id=" . $_COOKIE['user_id'];
	$userResult = $conn->query($userSQL);
	if($userResult){ //если нашли запись пользователя в базе данных
	  $user = $userResult->fetch_assoc();
	  $username = $user['username']; //берем имя пользователя из базі данных
	}


}

 if(isset($_SESSION["user_id"]) && $_SESSION["user_id"] != null){
 	$userSQL = "SELECT * FROM users WHERE id=" . $_SESSION["user_id"];
	$userResult = $conn->query($userSQL);
	if($userResult){ //если нашли запись пользователя в базе данных
	  $user = $userResult->fetch_assoc();
	  $username = $user['username']; //берем имя пользователя из базі данных
	}

}	

?>

<?php
if(!empty($_SESSION["cart"])) {
$cart_count = count(array_keys($_SESSION["cart"]));
} else {
	$cart_count= 0;
}
?>

 
	    <div class="container">
	      <a class="navbar-brand" href="#">Vegefoods</a>
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
	      </button>

	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav ml-auto">
              <!-- проверка активна ли страница ,   если не существует/существует $_GET['page'] или адресная строка стоит home-добавляем класс "active" -->
	          <li class="nav-item  "
						>
	          	<a href="/?page=home" class="nav-link">Home</a>
	          </li>

	          <li class="nav-item dropdown <?php if(!isset($_GET['page']) || $_GET['page'] == 'shop') { echo 'active'; }   ?>"  >
	              <a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Shop</a>
	              <div class="dropdown-menu" aria-labelledby="dropdown04">
	              	<a class="dropdown-item" href="/?page=shop">Shop</a>
	              </div>
             </li>

	          <li  class="nav-item <?php if(!isset($_GET['page']) || $_GET['page'] == 'about') { echo 'active'; }   ?>" >
	          	<a href="/?page=about" class="nav-link">About</a>
	          </li>

	          <li  class="nav-item <?php if(!isset($_GET['page']) || $_GET['page'] == 'blog') { echo 'active'; }   ?>" >
	          	<a href="/?page=blog" class="nav-link">Blog</a>
	          </li>

	          <li  class="nav-item <?php if(!isset($_GET['page']) || $_GET['page'] == 'contact') { echo 'active'; } ?>" >
	          	<a href="/?page=contact" class="nav-link">Contact</a>
	          </li>

	           <li   class="nav-item cta cta-colored <?php if(!isset($_GET['page']) || $_GET['page'] == 'register') { echo 'active'; }   ?>" >
	           	<a href="register.php" class="nav-link"><span class="icon-user"></span> <?php echo $username ?></a>
	           </li>

	          <li  class="nav-item cta cta-colored <?php if(!isset($_GET['page']) || $_GET['page'] == 'cart') { echo 'active'; }   ?>" >
	          	<a href="/?page=cart" class="nav-link" >
	          		<span class="icon-shopping_cart mini-cart-qty"><?php echo $cart_count  ; ?></span></a>
	          </li>

	        </ul>
	      </div>
	    </div>
	  