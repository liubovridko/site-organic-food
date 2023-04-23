 
<div class="hero-wrap hero-bread" style="background-image: url('assets/images/bg_1.jpg');">
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
            <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span>Products</span></p>
            <h1 class="mb-0 bread">Products</h1>
          </div>
        </div>
      </div>
    </div>
 <section class="ftco-section">
    	<div class="container">
    		<div class="row justify-content-center">
    			<div class="col-md-10 mb-5 text-center">
    				<ul class="product-category">
    					<li><a href="?page=shop&category=product-all" 
                             <?php if(!isset($_GET['category']) || $_GET['category'] == 'product-all') : ?>  class="active" <?php endif; ?> >All</a></li>
              <li><a href="?page=shop&category=product-sort&id=1" 
                            <?php if(isset($_GET['id']) && intval($_GET['id']) == 1): ?> class="active" <?php endif; ?> >Vegetables</a></li>
              <li><a href="?page=shop&category=product-sort&id=2"
                            <?php if(isset($_GET['id']) && intval($_GET['id']) == 2): ?> class="active" <?php endif; ?>>Fruits</a></li>
              <li><a href="?page=shop&category=product-sort&id=3"
                            <?php if(isset($_GET['id']) && intval($_GET['id']) == 3): ?> class="active" <?php endif; ?>>Juice</a></li>
              <li><a href="?page=shop&category=product-sort&id=4"
                            <?php if(isset($_GET['id']) && intval($_GET['id']) == 4): ?> class="active" <?php endif; ?>>Dried</a></li>
    				</ul>
    			</div>
    		</div>
    		<div class="row">
    			

<?php 
$page='product-all';
  if(isset($_GET['category'])) {
 switch ($_GET['category']) {
    case 'product-sort':
        $page='product-sort';
        break;       
    default:
        $page='product-all';
        break;
 }
}
   require($_SERVER['DOCUMENT_ROOT'] . "/partials/products/" . $page . ".php");
 ?>

    		</div>
    		<div class="row mt-5">
          <div class="col text-center">
            <div class="block-27">
              <ul>
                <li><a href="#">&lt;</a></li>
                <li class="active"><span>1</span></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">4</a></li>
                <li><a href="#">5</a></li>
                <li><a href="#">&gt;</a></li>
              </ul>
            </div>
          </div>
        </div>
    	</div>
    </section>

