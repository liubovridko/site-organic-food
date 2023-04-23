<?php
$id=intval($_GET['id']);
$product_sort_by_category =$conn->query('SELECT * FROM products WHERE category_id =' .$id);
?>

<?php foreach ($product_sort_by_category as $product): ?>

<div class="col-md-6 col-lg-3 ftco-animate">
    				<div class="product">
    					<a href="" class="img-prod"><img class="img-fluid" src="<?php echo $product['preview'];?>" alt="Colorlib Template">
    						<?php if ($product['sale']): ?>
    						<span class="status"><?php echo $product['sale']; ?></span>
    					<?php endif; ?>
    						<div class="overlay"></div>
    					</a>
    					<div class="text py-3 pb-4 px-3 text-center">
    						<h3><a href="/?page=single-product&id=<?php echo $product['id']; ?>"><?php echo $product['title']; ?></a></h3>
    						<div class="d-flex">
    							<div class="pricing">
    								<?php if ($product['price-sale'] > 0){ ?>
		    						<p class="price"><span class="mr-2 price-dc">$<?php echo $product['price']; ?></span><span class="price-sale">$<?php echo $product['price-sale']; ?></span></p>
		    						<?php } else {?>
		    						<p class="price"><span class="mr-2 price-dc"></span><span class="price-sale">$<?php echo $product['price']; ?></span></p>
		    						<?php } ?>
		    					</div>
	    					</div>
	    					<div class="bottom-area d-flex px-3">
	    						<div class="m-auto d-flex">
	    							<a href="/?page=single-product&id=<?php echo $product['id']; ?>" class="add-to-cart d-flex justify-content-center align-items-center text-center">
	    								<span><i class="ion-ios-menu"></i></span>
	    							</a>
	    							<a href="?page=home&action=add&id=<?php echo $product['id'] ?> " class="buy-now d-flex justify-content-center align-items-center mx-1">
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
  <?php endforeach; ?>  			