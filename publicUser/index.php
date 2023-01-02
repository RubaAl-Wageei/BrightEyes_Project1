<?php session_start();?>
<?php include('./include/header.php'); ?>
<?php require('../config.php');?>

    <!-- Categories Section Begin -->
    <section class="categories">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 p-0">
                    <div class="categories__item categories__large__item set-bg"
                    data-setbg="img/categories/landingpage1.jpg">
                    <div class="categories__text">
                        <h1>BRIGHT EYES</h1>
                        <p>We invite you to continue your shopping experience on our Bright eyes. Discover the premier shopping destination for the top brands, latest trends, and exclusive styles of high quality fashion and performance sunglasses. Your perfect new pair of shades is waiting for you.</p>
                        <a href="./shop.php">Shop now</a>
                    </div>
                </div>
            </div>
   
        </div>
    </div>
</section>
<!-- Categories Section End -->

<!-- Product Section Begin -->
<section class="product spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-4">
                <div class="section-title">
                    <h4>Huge Discounts here !</h4>
                </div>
            </div>
            <!-- <div class="col-lg-8 col-md-8">
                <ul class="filter__controls">
                    <li class="active" data-filter="*">All</li>
                    <li data-filter=".women">Women’s</li>
                    <li data-filter=".men">Men’s</li>
                    <li data-filter=".kid">Kid’s</li>
                    <li data-filter=".accessories">Accessories</li>
                    <li data-filter=".cosmetic">Cosmetics</li>
                </ul>
            </div> -->
        </div>
      

        <?php 
// to get the datat from data base 
       $data = crud::selectProduct();

   ?>
       
      
       
        <div class="row property__gallery">
            <?php foreach($data as $value): ?>
                <?php if($value['discount']== 0){continue;}?>
            <div class="col-lg-3 col-md-4 col-sm-6 mix women">
                <div class="product__item sale">
                    <div class="product__item__pic set-bg" data-setbg="../image/<?php echo $value['image']?>">
                        <div class="label">Sale</div>
                        <!-- <div class="label new">New</div> -->
                        <ul class="product__hover">
                            <li><a href="img/product/Cat-eye-sunglass3.jpg" class="image-popup"><span class="arrow_expand"></span></a></li>
                            <li><a href="#"><span class="icon_heart_alt"></span></a></li>
                            <li><a href="#"><span class="icon_bag_alt"></span></a></li>
                        </ul>
                    </div>
                    <div class="product__item__text">
                       <?php $ID = $value['id']; ?>
                        <h6><a href="productDetails.php?pro_id=<?php echo $ID; ?>"> <?php echo $value['title'] ?> <br>
                        <?php echo $value['productName'] ?>
                            </a></h6>
                  
                        <div class="product__price"><?php echo $value['new_Price'].".00 JD";?><span><?php echo $value['price'].".00 JD";?></span></div>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>




        </div>
    </div>
</section>
<!-- Product Section End -->

<!-- Banner Section Begin -->
<section class="banner set-bg" data-setbg="img/banner/banner-1.jpg">
    <div class="container">
        <div class="row">
            <div class="col-xl-7 col-lg-8 m-auto">
                <div class="banner__slider owl-carousel">
                    <div class="banner__item">
                        <div class="banner__text">
                            <span>The Chloe Collection</span>
                            <h1>See our New Sunglasses</h1>
                            <a href="#">Shop now</a>
                        </div>
                    </div>
                    <div class="banner__item">
                        <div class="banner__text">
                            <span>The Chloe Collection</span>
                            <h1>See our New Brand glasses</h1>
                            <a href="#">Shop now</a>
                        </div>
                    </div>
                    <div class="banner__item">
                        <div class="banner__text">
                            <span>The Chloe Collection</span>
                            <h1>See our Specials</h1>
                            <a href="#">Shop now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Banner Section End -->

<!-- Trend Section Begin -->
<section class="product spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-4">
                <div class="section-title">
                    <h4>Our Best Sellers !!</h4>
                </div>
            </div>
        </div>
        <div class="row property__gallery">
      
              <?php $i = 1;  ?>
              <?php foreach($data as $value): ?>

                  <?php if($value['discount']== 1 || $i > 8){

                        continue;}

                                 ?>
            <div class="col-lg-3 col-md-4 col-sm-6 mix women">
                <div class="product__item sale">
                    <div class="product__item__pic set-bg imgSize" data-setbg="../image/<?php echo $value['image']?>">
                        <!-- <div class="label new">New</div> -->
                   
                    </div>
                    
                    <div class="product__item__text">
                  
                    <?php $ID = $value['id']; ?>
                        <h6><a href="productDetails.php?pro_id=<?php echo $ID; ?>"><?php echo $value['title'] ?> <br>
                        <?php echo $value['productName'] ?>
                            </a></h6>
                            <div class="rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                        <div class="product__price"><?php echo $value['price'].".00 JD";?></div>
                    </div>
                </div>
            </div>
                      <?php  $i++ ?>
            <?php endforeach; ?>
        
        </div>
    </div>
</section>
    
        </div>
    </div>
</section>
<!-- Trend Section End -->

<!-- Services Section Begin -->
<section class="services spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="services__item">
                    <i class="fa fa-car"></i>
                    <h6>Free Shipping</h6>
                    <p>For all oder over 99.00 JD</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="services__item">
                    <i class="fa fa-money"></i>
                    <h6>Money Back Guarantee</h6>
                    <p>If good have Problems</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="services__item">
                    <i class="fa fa-support"></i>
                    <h6>Online Support 24/7</h6>
                    <p>Dedicated support</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="services__item">
                    <i class="fa fa-headphones"></i>
                    <h6>Payment Secure</h6>
                    <p>100% secure payment</p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Services Section End -->

<!-- Instagram Begin -->
<div class="instagram">
    <div class="col-lg-4 col-md-4">
        <div class="section-title">
            <h4>We WORK WITH THE BEST BRANDS !</h4>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-2 col-md-4 col-sm-4 p-0">
                <div class="instagram__item set-bg" data-setbg="img/instagram/brand1.jpg">
                    <!-- <div class="instagram__text">
                        <i class="fa fa-instagram"></i>
                        <a href="#">@ ashion_shop</a>
                    </div> -->
                </div>
            </div>
            <div class="col-lg-2 col-md-4 col-sm-4 p-0">
                <div class="instagram__item set-bg" data-setbg="img/instagram/brand6.jpg">
                    <!-- <div class="instagram__text">
                        <i class="fa fa-instagram"></i>
                        <a href="#">@ ashion_shop</a>
                    </div> -->
                </div>
            </div>
            <div class="col-lg-2 col-md-4 col-sm-4 p-0">
                <div class="instagram__item set-bg" data-setbg="img/instagram/brand3.jpg">
                    <!-- <div class="instagram__text">
                        <i class="fa fa-instagram"></i>
                        <a href="#">@ ashion_shop</a>
                    </div> -->
                </div>
            </div>
            <div class="col-lg-2 col-md-4 col-sm-4 p-0">
                <div class="instagram__item set-bg" data-setbg="img/instagram/brand4.jpg">
                    <!-- <div class="instagram__text">
                        <i class="fa fa-instagram"></i>
                        <a href="#">@ ashion_shop</a>
                    </div> -->
                </div>
            </div>
            <div class="col-lg-2 col-md-4 col-sm-4 p-0">
                <div class="instagram__item set-bg" data-setbg="img/instagram/brand5.jpg">
                    <!-- <div class="instagram__text">
                        <i class="fa fa-instagram"></i>
                        <a href="#">@ ashion_shop</a>
                    </div> -->
                </div>
            </div>
            <div class="col-lg-2 col-md-4 col-sm-4 p-0">
                <div class="instagram__item set-bg" data-setbg="img/instagram/brand2.jpg">
                    <!-- <div class="instagram__text">
                        <i class="fa fa-instagram"></i>
                        <a href="#">@ ashion_shop</a>
                    </div> -->
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Instagram End -->


<?php include('./include/footer.php'); ?>
