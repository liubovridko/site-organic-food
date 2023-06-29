<?php
/*функция для определения авторизован ли пользователь*/

function isLogin() {
	/*/проверка есть ли у нас сессия*/
	$is_session=isset($_SESSION["user_id"]) && $_SESSION["user_id"] != null;// true/false
	//проверка есть ли у нас куки
	$is_cookie=isset($_COOKIE["user_id"]) && $_COOKIE["user_id"] != null;// true/false

	  //если переменная $_SESSION["used_id"] сессия или куки существует и не равна null /пользовалеть авторизовался
	    if( $is_session || $is_cookie ){
	    	return true;
	    } else {
	    	return false;
	    }
}

/*получаем данные о нашем пользователе*/
function getCurrentUser() {
	    /*обьявляем глобальную переменную*/
	    global $conn;
		//проверка есть ли у нас сессия
		$is_session=isset($_SESSION["user_id"]) && $_SESSION["user_id"] != null;// true/false
		//проверка есть ли у нас куки
		$is_cookie=isset($_COOKIE["user_id"]) && $_COOKIE["user_id"] != null;// true/false

	  //если переменная $_SESSION["used_id"] сессия или куки существует и не равна null /пользовалеть авторизовался
	    if( $is_session || $is_cookie ){
	      //есть есть сессия(не равна 0(true)) присваиваем переменной $userID=$_SESSION["user_id"], если нет сессии $userID=$_COOKIE["user_id"]
	     
	      $userID= $is_session ? $_SESSION["user_id"] :  $_COOKIE["user_id"];
	      
	     // выбор пользователя
	     $sql="SELECT * FROM users WHERE id=" . $userID;
	     $result=mysqli_query($conn, $sql);
	     return $user=$result->fetch_assoc();//user это наш пользователь
	    } else {
	    	return null;
	    }
}

/*функция получения ID пользователя*/
function getUserID() {
	/*/проверка есть ли у нас сессия*/
	$is_session=isset($_SESSION["user_id"]) && $_SESSION["user_id"] != null;// true/false
	//проверка есть ли у нас куки
	$is_cookie=isset($_COOKIE["user_id"]) && $_COOKIE["user_id"] != null;// true/false

	  //если переменная $_SESSION["used_id"] сессия или куки существует и не равна null /пользовалеть авторизовался
	    if( $is_session || $is_cookie ){
	    	return $is_session ? $_SESSION["user_id"] : $_COOKIE["user_id"];
	    } else {
	    	return 0;
	    }
}

/*вывести список твитов-постов пользователя */ 

function getAllTwitsByUser($userID) {
	 /*обьявляем глобальную переменную*/
	    global $conn;

	 // выбор пользователя
	     $sql="SELECT * FROM posts WHERE user_id=" . $userID . " ORDER BY id DESC  "; /*и отсортировать DESC или ASC*/
	     $result=mysqli_query($conn, $sql);
	     return $result;//user это наш пользователь. Выбираем одну строку данных из набора результатов и возвращает её в виде ассоциативного массива

}

function getProducts() : array 
{
	 /*обьявляем глобальную переменную*/
	    global $conn;

	 // выбор пользователя
	     $sql="SELECT * FROM products "; 
	     $result=mysqli_query($conn, $sql);
	     return $product=$result->fetch_assoc();// Выбираем одну строку данных из набора результатов и возвращает её в виде ассоциативного массива
	     
}

function getProduct(int $id) : array|false
{

	 /*обьявляем глобальную переменную*/
	    global $conn;
 // выбор 
	     $sql="SELECT * FROM products WHERE id=" . $id;
	     $result=mysqli_query($conn, $sql);
	     return $result->fetch_assoc();
}

function addToCart($product,$count) : void 
{
	$price= $product['price-sale']!== '0.00' ? $product['price-sale'] : $product['price'];
 if(isset($_SESSION['cart'][$product['id']] ) ) {
 	$_SESSION['cart'][$product['id']]['quantity']+=1;
 } else {
 	$_SESSION['cart'][$product['id']]=[
        "product_id" => $product['id'],
 		"quantity" => $count, 
        "price" => $price,
        "title" => $product['title'],
        "image" => $product['preview']
 	];
 }

$_SESSION['cart.quantity']=!empty($_SESSION['cart.quantity']) ? ++$_SESSION['cart.quantity'] : 1;
$_SESSION['cart.sum']=!empty($_SESSION['cart.sum']) ? $_SESSION['cart.sum'] + $price : $price;

}

/*заполнение массива данными из формы на странице офрмления заказа*/
$data=[
        "firstname" => '', 
        "emailaddress" => '',
        "phone" => '',
        /*"list-products" => '',*/
        "streetaddress" => ''      
];

function load($data) {
	foreach ($_POST as $key => $value) {
		if(array_key_exists($key, $data)){
			$data[$key]=$value;
		}
	}
    return $data;
}

function debug($data){
	      echo '<pre>' . print_r( $data, true) .  '</pre>';

}

function save($table, $data) {

	 /*обьявляем глобальную переменную*/
	    global $conn;
 // выбор таблицы базы данных
	     $sql="INSERT INTO $table ( `name`, `email`, `phone`, `adress`) VALUES ('".$data['firstname']."','".$data['emailaddress']."','". $data['phone']."','". $data['streetaddress']."')";
	    $conn->query($sql);
	    $order_id = mysqli_insert_id($conn);
	         // Проверка успешного выполнения запроса на добавление заказа
			if (mysqli_affected_rows($conn) == 0) {
			    die("Error: Order not added.");
			}
	    return   $order_id;
}