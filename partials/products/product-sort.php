<?php
 require($_SERVER['DOCUMENT_ROOT'] ."/configs/bd.php"); 
 require ($_SERVER['DOCUMENT_ROOT'] . '/configs/helpers.php');

?>

<?php
        //$id=intval($_GET['id']);
        // Обработка POST-запроса с категорией товаров
        if (isset($_POST['id'])) {
            $id = $_POST['id'];
        } else {
            $id = ""; // Если категория не задана, то выбираем все товары
        }

        // Получение списка товаров для заданной категории или всех товаров
        $sql = "SELECT * FROM products";
        if ($id != "") {
            $sql .= " WHERE category_id  = '$id'";
        }
        $result = $conn->query($sql);

        // Формирование списка товаров в виде HTML-кода
        $html = '';
        if ($result->num_rows > 0) {
            
        

        while($product = $result->fetch_assoc()) {

        $image=$product['preview']; 
        $sale=$product['sale'];
        $product_id= $product['id'];
        $title=$product['title'];
        $price_sale=$product['price-sale'];
        $product_price=$product['price'];

            $html='<div class="col-md-6 col-lg-3 ">
    				<div class="product">
    					<a href="" class="img-prod"><img class="img-fluid" src="'. $image .'" alt="Colorlib Template">';
    						if ($sale) {
    						$html .= '<span class="status">'.$sale.'</span>';
    					   }   
    						 $html .='<div class="overlay"></div>
    					</a>
    					<div class="text py-3 pb-4 px-3 text-center">
    						<h3><a href="/?page=single-product&id='.$product_id.'">'. $title .'</a></h3>
    						<div class="d-flex">
    							<div class="pricing">';
    								 if ($price_sale > 0){ 
		    						$html .='<p class="price"><span class="mr-2 price-dc">$'.$product_price.'</span><span class="price-sale">$'.$price_sale.'</span></p>';
		    						 } else {
		    						$html .='<p class="price"><span class="mr-2 price-dc"></span><span class="price-sale">$'.$product_price.'</span></p>';
		    						 } 
		    					$html .='</div>
	    					</div>
	    					<div class="bottom-area d-flex px-3">
	    						<div class="m-auto d-flex">
	    							<a href="/?page=single-product&id='.$product_id.'" class="add-to-cart d-flex justify-content-center align-items-center text-center">
	    								<span><i class="ion-ios-menu"></i></span>
	    							</a>
	    							<a href="?page=home&action=add&id='. $product_id .' " class="buy-now d-flex justify-content-center align-items-center mx-1">
	    								<span><i class="ion-ios-cart"></i></span>
	    							</a>
	    							<a href="#" class="heart d-flex justify-content-center align-items-center ">
	    								<span><i class="ion-ios-heart"></i></span>
	    							</a>
    							</div>
    						</div>
    					</div>
    				</div>
    			</div>';

                 // Отправка списка товаров в виде HTML-кода в ответе на запрос
                 echo $html;
                              }
                } else {
                    $html = '<p>Товаров нет</p>';
                }

               
               

                // Закрытие соединения с базой данных
               // $conn->close();


 ?>  			