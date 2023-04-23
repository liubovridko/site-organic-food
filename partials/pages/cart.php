



<div class="hero-wrap hero-bread" style="background-image: url('assets/images/bg_1.jpg');">
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
          	<p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span>Cart</span></p>
            <h1 class="mb-0 bread">My Cart</h1>
          </div>
        </div>
      </div>
    </div>



    <?php



// Remove product from cart, check for the URL param "remove", this is the product id, make sure it's a number and check if it's in the cart
if (isset($_GET['remove']) && is_numeric($_GET['remove']) && isset($_SESSION['cart']) && isset($_SESSION['cart'][$_GET['remove']])) {
    // Remove the product from the shopping cart
    unset($_SESSION['cart'][$_GET['remove']]);
} 





		/*if($result = mysqli_query($conn, $sql)):  при успешном выполнении команды SELECT возвращает набор строк, который можно перебрать с помощью цикла

    while($row = mysqli_fetch_array($result)) :*/
?>

    <section class="ftco-section ftco-cart">
			<div class="container">
				<div class="row">
    			<div class="col-md-12 ftco-animate">
    				<div class="cart-list">
                      <form method="post" action="?page=cart">  
	    				<table class="table">
						    <thead class="thead-primary">
						      <tr class="text-center">
						        <th>&nbsp;</th>
						        <th>&nbsp;</th>
						        <th>Product name</th>
						        <th>Price</th>
						        <th>Quantity</th>
						        <th>Total</th>
						      </tr>
						    </thead>
						    <tbody>
                           
                                 <?php 
                                 $products_in_cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : array();
                                 $count=count(array_keys($_SESSION["cart"]));
                          if(!empty($products_in_cart))  {    
                           $sql="SELECT * FROM products WHERE id IN ("; 
                           foreach($_SESSION['cart'] as $id => $value) { 
                        $sql.=$id.","; 
                    } 
                     
                    $sql=substr($sql, 0, -1).") "; 
                    $query=mysqli_query($conn, $sql);

                           $totalprice=0; 
                    while($row=mysqli_fetch_array($query)){ 
                        $price= $row['price-sale'] !== '0.00' ? $row['price-sale'] : $row['price'] ;
                        $discount = $row['sale'] ? $row['sale'] : "0.00" ;
                          
                        $subtotal=$_SESSION['cart'][$row['id']]['quantity'] * $price; 
                        $totalprice+=$subtotal; 
                    ?> 
                             
						      <tr class="text-center item">
						        <td class="product-remove" data-label=" "><a href="?page=cart&remove=<?=$row['id']?>"><span class="ion-ios-close"></span></a></td>
						        
						        <td class="image-prod" data-label=" "><div class="img" style="background-image:url(<?php echo $row['preview']; ?>);"></div></td>
						        
						        <td class="product-name" data-label="Product name">
						        	<h3><?php echo $row['title']; ?></h3>
						        	<p>Far far away, behind the word mountains, far from the countries</p>
						        </td>
						        
						        <td class="price" data-label="Price">$<span  class="priceItem" id="price" data-price="<?php echo $price  ; ?>"><?php echo $price  ; ?></span></td>
						        
						        <td class="quantity" data-label="Quantity">
						        	<div class="input-group mb-3">
					             	<input type="number" id="count" name="quantity" class="quantity form-control input-number" value="<?php echo $_SESSION['cart'][$row['id']]['quantity'] ; ?>" min="1" max="100">

					          	</div>
					          </td>
						        
						        <td class="total"  data-label="Total" >$<span id="total" class="totalPrice"><?php echo $subtotal; ?></span></td>
						      </tr><!-- END TR-->


						      <?php } 
                               }
                              ?>
                           
						    </tbody>
						  </table>
                        </form>
					  </div>
    			</div>
    		</div>

 <!--  <?php 
     /*endwhile;
       endif;*/

?>  	 -->

    		<div class="row justify-content-end">
    			<div class="col-lg-4 mt-5 cart-wrap ftco-animate">
    				<div class="cart-total mb-3">
    					<h3>Coupon Code</h3>
    					<p>Enter your coupon code if you have one</p>
  						<form action="#" class="info">
	              <div class="form-group">
	              	<label for="">Coupon code</label>
	                <input type="text" class="form-control text-left px-3" placeholder="">
	              </div>
	            </form>
    				</div>
    				<p><a href="checkout.html" class="btn btn-primary py-3 px-4">Apply Coupon</a></p>
    			</div>
    			<div class="col-lg-4 mt-5 cart-wrap ftco-animate">
    				<div class="cart-total mb-3">
    					<h3>Estimate shipping and tax</h3>
    					<p>Enter your destination to get a shipping estimate</p>
  						<form action="#" class="info">
	              <div class="form-group">
	              	<label for="">Country</label>
	                <input type="text" class="form-control text-left px-3" placeholder="">
	              </div>
	              <div class="form-group">
	              	<label for="country">State/Province</label>
	                <input type="text" class="form-control text-left px-3" placeholder="">
	              </div>
	              <div class="form-group">
	              	<label for="country">Zip/Postal Code</label>
	                <input type="text" class="form-control text-left px-3" placeholder="">
	              </div>
	            </form>
    				</div>
    				<p><a href="checkout.html" class="btn btn-primary py-3 px-4">Estimate</a></p>
    			</div>
    			<div class="col-lg-4 mt-5 cart-wrap ftco-animate">
    				<div class="cart-total mb-3">
    					<h3>Cart Totals</h3>
    					<p class="d-flex">
    						<span>Subtotal</span>
    						<span  id="total-sum-all-items">$<?php echo $products_in_cart ? $totalprice : "0.00"; ?></span>
    					</p>
    					<p class="d-flex">
    						<span>Delivery</span>
    						<span>$0.00</span>
    					</p>
    					<p class="d-flex">
    						<span>Discount</span>
    						<span><?php echo  $products_in_cart ? "$".$discount :'$0.00' ; ?></span>
    					</p>
                        <p class="d-flex">
                            <span>Total items</span>
                            <span id="count-products"><?php echo $count; ?></span>
                        </p>
    					<hr>
    					<p class="d-flex total-price">
    						<span>Total</span>
    						<span ><?php echo $products_in_cart ? "$". $totalprice : "$0.00"; ?></span>
    					</p>
    				</div>
    				<p><a href="?page=checkout" class="btn btn-primary py-3 px-4">Proceed to Checkout</a></p>
    			</div>
    		</div>
			</div>
		</section>




		