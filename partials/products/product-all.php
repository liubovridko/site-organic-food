



<?php
  
  $sql = "SELECT * FROM products";

   if($result = mysqli_query($conn, $sql)):  /*при успешном выполнении команды SELECT возвращает набор строк, который можно перебрать с помощью цикла*/



    while($row = mysqli_fetch_array($result) ) : /*Функция mysqli_fetch_array() выбирает текущую строку из набора в переменную $row и переходит к следующей. $row хранит данные отдельной строки в виде ассоциативного массива, где ключи элементов - названия столбцов*/
    	/*echo "<pre>"; Удобный вывод отладочной иформации массивов
        var_dump($row);  */

        $categorySql=" SELECT * FROM categorias_product WHERE id=" . $row['category_id']; /*обращаемся к базе данных категорий по id ищем категорию*/
        $categoryResult = $conn->query($categorySql);
        $categoryRow =  $categoryResult->fetch_assoc(); /*Выбирает одну строку данных из набора результатов и возвращает её в виде ассоциативного массива*/

 ?> 

<?php 
    if(isset($message)){ 
      echo "<h2>$message</h2>"; 
    } 
  ?>


<div class="col-md-6 col-lg-3 ftco-animate">
    				<div class="product">
    					<a href="/?page=single-product&id=<?php echo $row['id']; ?>" class="img-prod"><img class="img-fluid" src="<?php echo $row['preview'];?>" alt="Colorlib Template">
    						<?php if($row['sale']) : ?>
    						<span class="status"><?php echo $row['sale'];?></span>

    						<?php endif; ?>
    						<div class="overlay"></div>
    					</a>
    					<div class="text py-3 pb-4 px-3 text-center">
    						<h3><a href="/?page=single-product"><?php echo $row['title'];?></a></h3>
    						<div class="d-flex">
    							<div class="pricing">
		    						<p class="price"><span class="mr-2 price-dc"><?php echo $row['price-sale'] !== "0.00" ? $row['price'] : '' ;?></span><span class="price-sale">$<?php echo $row['price-sale'] !== "0.00" ? $row['price-sale'] : $row['price'] ;?></span></p>
		    					</div>
	    					</div>
	    					<div class="bottom-area d-flex px-3">
	    						<div class="m-auto d-flex">
	    							<a href="?cart=add&id=<?php echo $row['id'] ?>" class="add-to-cart d-flex justify-content-center align-items-center text-center"  data-id="<?php echo $row['id'] ?>" data-title="Додати до кошика" >
	    								<span><i class="ion-ios-menu"></i></span>
	    							</a>
	    							<a href="/?page=single-product&id=<?php echo $row['id']; ?> " class="buy-now d-flex justify-content-center align-items-center mx-1" data-title="Купити зараз">
	    								<span><i class="ion-ios-cart"></i></span>
	    							</a>
	    							<a href="#" class="heart d-flex justify-content-center align-items-center ">
	    								<span><i class="ion-ios-heart"></i></span>
	    							</a>
    							</div>
    						</div>
    					</div>
    				</div>
    			</div>

       
        
<?php 
     endwhile;
       endif;

?>