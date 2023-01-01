<?php session_start();?>
<?php include('./include/header.php'); ?>
<?php require('../config.php');?>

<?php 
    if(isset($_GET['pro_id'])){

        $id =&$_GET['pro_id'];
        $_SESSION['details_id']=$id;
        $sql="SELECT * FROM products WHERE id=". $_SESSION['details_id'];
       
        $db=crud::connect()->prepare($sql);
        $db ->execute();
        $data= $db->fetchAll(PDO::FETCH_ASSOC);
        // print_r($data);
        $cat=$data[0]['category'];
        
    }
    
    //-----------------------------------------
    if(isset($_POST['add'])){
        //print id producr
        if(isset($_SESSION['cart'])){
            $item_array_id = array_column($_SESSION['cart'], 'product_id');
            // echo $_SESSION['id_category'];
            
                if(in_array($_POST['product_id'],$item_array_id)){
                // echo "<script>alert('product is already added in the cart')</script>";
                // echo "<script>window.location='./product.php?action=category&id=".$_SESSION['id_category']."'"."</script>";
                }else{
                    $count=count($_SESSION['cart']);
                    $item_array=array(
                        'product_id'=>$_POST['product_id'],
                    );
                    $_SESSION['cart'][$count]=$item_array;
                    // echo "<script>window.location='./product.php?action=category&id=".$_SESSION['id_category']."'"."</script>";
                }
        }else{
            $item_array=array(
                'product_id'=>$_POST['product_id'],
            );
    
            // create vew session variable
            $_SESSION['cart'][0]=  $item_array;
            // echo "<script>window.location='./product.php'</script>";
    
        } 
                print_r($_SESSION['cart']);

    }
  
    //-------------------------------------
    if (isset($_POST['submit'])){
        $product_id=$_SESSION['details_id'];
        $comment=$_POST['comment'];
        // $user_id=$_SESSION['id'];
        $sql="INSERT INTO comments (user_id, comment, comment_date, product_id) VALUES ('6', '$comment', current_timestamp(), ' $product_id');";
        $db=crud::connect()->prepare($sql);
        $db ->execute();
        echo "succes";
    }

    //---------------------comment
    $comments=crud::selectComments();
    $product_id='2';
    $comments->bindValue(':id', $_SESSION['details_id']);
    $comments->execute();
    $data_comment= $comments->fetchAll(PDO::FETCH_ASSOC);
    print_r($data_comment);
    $reviewe=count($data_comment);

    //------------------------------category product
    $data_category = array();
    $con=crud::connect()->prepare("SELECT * FROM products WHERE category=$cat");
    $con->execute();
    $data_category= $con->fetchAll(PDO::FETCH_ASSOC);
?>


 <!-- Breadcrumb Begin -->
 <div class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__links">
                        <a href="./index.html"><i class="fa fa-home"></i> Home</a>
                        <a href="#">Cat-eye sunglass </a>
                        <span>Page
                            Cat Eye Tortoise Eyeglasses
                            </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Product Details Section Begin -->
    <section class="product-details spad">
        <div class="container">
            <?php foreach($data as $value):?> 
            <div class="row">
                <div class="col-lg-6">
                <form action="" method="post">

                    <div class="product__details__pic">
                        <div class="product__details__pic__left product__thumb nice-scroll">
                            <a class="pt active" href="#product-1">
                                <img src="<?php echo $value['image']?>" alt="">
                            </a>
            
                        </div>
                        <div class="product__details__slider__content">
                            <div class="product__details__pic__slider owl-carousel">
                                <img data-hash="product-1" class="product__big__img" src="<?php echo $value['image']?>" alt="">
                  
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="product__details__text">
                        <h3>Page
                            
                             <span><?php echo $value['name']?></span></h3>
                        <div class="rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <span>( <?php echo $reviewe ?> reviews )</span>
                        </div>
                        <!-- <div class="product__details__price">25.00 JD<span>32.00 JD</span></div> -->
                        <div class="product__details__price"><?php echo $value['price'];?>JD</div>
                        <p><?php echo $value['description']?></p>
                        <div class="product__details__button">
                            <!-- <div class="quantity">
                                <span>Quantity:</span>
                                <div class="pro-qty">
                                    <input type="text" value="1">
                                </div>
                            </div> -->
                            <button type="submit" name="add" class="cart-btn">Add to Cart </button>
                    <input type="hidden" name="product_id" value="<?php echo $value['id']?>">
                           <!-- <a href="./productDetails.php?id=<?php echo $value['id'];?>&pro_id=<?php echo $value['id']?>" class="cart-btn"><span class="icon_bag_alt "></span> Add to cart</a> -->
                            <ul>
                                <li><a href="#"><span class="icon_heart_alt"></span></a></li>
                            </ul>
                        </div>
                        <!-- <div class="product__details__widget">
                            <ul>
                                <li>
                                    <span>Availability:</span>
                                    <div class="stock__checkbox">
                                        <label for="stockin">
                                            In Stock
                                            <input type="checkbox" id="stockin">
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                </li>
                            
                                <li>
                                    <span>Promotions:</span>
                                    <p>Free shipping</p>
                                </li>
                            </ul>
                        </div> -->
                    </div>
                </div>
                </form>
                <?php  endforeach;?>

                <div class="col-lg-12">
                    <div class="product__details__tab">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#tabs-1" role="tab">Description</a>
                            </li>
                 
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#tabs-3" role="tab">Reviews ( <?php echo $reviewe ?>)</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="tabs-1" role="tabpanel">
                                <h6>Description</h6>
                                <p>
                                    Page Cat Eye glasses are made polished metal and superior TR90 material. Featured with pearl decorated temple arms hollowed-out frames, it is a good choice for most of women in all collections. Blue blocker lenses and tinted lenses both are available.
                                    .</p>
                      
                            </div>
                
                            <div class="tab-pane" id="tabs-3" role="tabpanel">
                                <h6>Reviews ( <?php echo $reviewe ?> )</h6>
                                <!------comment section----->

            <div class="blog__details__comment">
                <h5><?php echo $reviewe ?> Comment</h5>
                <!-- <a href="#" class="leave-btn">Leave a comment</a> -->
                
                <?php foreach($data_comment as $value):?> 

                <div class="blog__comment__item">
                    <div class="blog__comment__item__pic">
                        <img src="./img/<?php echo $value['image'];?>" alt="" style="width:75px">
                    </div>
                    <div class="blog__comment__item__text">
                        <h6><?php echo $value['FullName'];?></h6>
                        <p><?php echo $value['comment'];?>.</p>
                        <ul>
                            <li><i class="fa fa-clock-o"></i> <?php echo $value['comment_date'];?></li>
                            <!-- <li><i class="fa fa-heart-o"></i> 12</li>
                            <li><i class="fa fa-share"></i> 1</li> -->
                        </ul>
                    </div>
                </div>
                <?php  endforeach;?>
                <form acton="" method="post">
                <label for="story">write comment:</label>

<textarea id="story" name="comment"
          rows="5" cols="33">
It was a dark and stormy night...
</textarea>
<input type="submit" name="submit">
</form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

<!----------------RELATED PRODUCTS section--------------->
            
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="related__title">
                        <h5>RELATED PRODUCTS</h5>
                    </div>
                </div>
<!-- 
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="product__item">
                        <div class="product__item__pic set-bg" data-setbg="img/product/related/Cat-eye-sunglass3.jpg">
                            <div class="label new">New</div>
                            <ul class="product__hover">
                                <li><a href="img/product/related/Cat-eye-sunglass3.jpg" class="image-popup"><span class="arrow_expand"></span></a></li>
                                <li><a href="#"><span class="icon_heart_alt"></span></a></li>
                                <li><a href="#"><span class="icon_bag_alt"></span></a></li>
                            </ul>
                        </div>
                        <div class="product__item__text">
                            <h6><a href="#">Hannah<br>
                                Cat Eye Champagne Eyeglasses
                                </a></h6>
                            <div class="rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                            <div class="product__price">59.00 JD</div>
                        </div>
                    </div>
                </div> -->
                <?php $i=1;?>
                <?php foreach($data_category as $value):?> 
<?php if ($i<=4):?>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="product__item">
                        <div class="product__item__pic set-bg" data-setbg="<?php echo $value['image']?>">
                            <ul class="product__hover">
                                <li><a href="img/product/related/Cat-eye-sunglass4.jpg" class="image-popup"><span class="arrow_expand"></span></a></li>
                                <!-- <li><a href="#"><span class="icon_heart_alt"></span></a></li> -->
                                <li><a href="./cart.php"><span class="icon_bag_alt"></span></a></li>
                            </ul>
                        </div>
                        <div class="product__item__text">
                            <h6><a href="#"><?php echo $value['name']?><br>
                                Cat Eye Black/Golden Eyeglasses
                                </a></h6>
                            <div class="rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                            <div class="product__price"><?php echo $value['price']?> JD</div>
                        </div>
                    </div>
                </div>
                <?php $i++;?>

                <?php  endif;?>
                <?php  endforeach;?>

                <!--  <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="product__item">
                        <div class="product__item__pic set-bg" data-setbg="img/product/related/Cat-eye-sunglass5.jpg">
                            <div class="label stockout">out of stock</div>
                            <ul class="product__hover">
                                <li><a href="img/product/related/Cat-eye-sunglass5.jpg" class="image-popup"><span class="arrow_expand"></span></a></li>
                                <li><a href="#"><span class="icon_heart_alt"></span></a></li>
                                <li><a href="#"><span class="icon_bag_alt"></span></a></li>
                            </ul>
                        </div>
                        <div class="product__item__text">
                            <h6><a href="#">Kama<br>
                                Cat Eye Black/Golden Eyeglasses
                                </a></h6>
                            <div class="rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                            <div class="product__price">59.00 JD</div>
                        </div>
                    </div>
                </div> -->
                <!-- <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="product__item">
                        <div class="product__item__pic set-bg" data-setbg="img/product/related/Cat-eye-sunglass6.jpg">
                            <ul class="product__hover">
                                <li><a href="img/product/related/Cat-eye-sunglass36.jpg" class="image-popup"><span class="arrow_expand"></span></a></li>
                                <li><a href="#"><span class="icon_heart_alt"></span></a></li>
                                <li><a href="#"><span class="icon_bag_alt"></span></a></li>
                            </ul>
                        </div>
                        <div class="product__item__text">
                            <h6><a href="#">Jocelyn<br>
                                Cat Eye Golden/Green Eyeglasses
                                </a></h6>
                            <div class="rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                            <div class="product__price">59.00 JD</div>
                        </div>
                    </div>
                </div> 
            </div>
        </div> -->
    </section>
    <!-- Product Details Section End -->



<?php include('./include/footer.php'); ?>