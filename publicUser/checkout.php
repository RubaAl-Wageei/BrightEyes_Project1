<?php session_start();?>
<?php include('./include/header.php'); ?>
<?php require('../config.php');?>

<?php
$user_id=$_SESSION['id'];

//----------------------------------------------

if(!isset($_SESSION['name'])){
    echo "<script>window.location='login.php'</script>";
 };
//----------------------------------------------

 $db=crud::selectcartTable();
 $db->bindValue(':id',$user_id);
 $db->execute();
 $data= $db->fetchAll(PDO::FETCH_ASSOC);
//  print_r($data);


if(isset($_SESSION['cart'])){
    $item_array_id = array_column($_SESSION['cart'], 'product_id');

};


?>
<?php 

// orders table تخزين الطلب في ال 
    if(isset($_POST['submit'])) {

    $totalPrice = $_SESSION['totalPrice'];

    $sql="INSERT INTO orders (order_id, order_date, user_id, total_price) VALUES (NULL, now(), '$user_id', '$totalPrice');";

    $con=crud::connect()->prepare($sql);

    $con->execute();

// orders details table تخزين الطلب في ال 

    $conn=crud::connect()->prepare("SELECT * FROM orders  ORDER BY order_id DESC"); //  بنعمل للجدول ترتيب تنازلي لحتى نجيب اخر اوردر  
    $conn->execute();
    $data=$conn->fetch(PDO::FETCH_ASSOC);  // بجيب اول صف fetch  من خلال ال 
    $last_id = $data['order_id'];

    $_SESSION['last_order']=$last_id ;
    $db=crud::selectcartTable();
    $db->bindValue(':id',$user_id);
    $db->execute();
    $data= $db->fetchAll(PDO::FETCH_ASSOC);
    foreach($data as $value){
           
            $id=$value['id'];
            $price=$value['price'];
            $quantity=$value['quantity'];
            $sql="INSERT INTO order_details (order_id, product_id, quantity, price) 
            VALUES ('$last_id', '$id', '$quantity', '$price')";
            $insert=crud::connect()->prepare($sql);
            $insert->execute();
          
    }           
        unset($_SESSION['cart']);
        unset($_SESSION['totalPrice']);
        $con=crud::connect()->prepare("DELETE FROM cart WHERE user_id = :id");
        $con->bindValue(':id', $user_id);
        $con->execute();
        echo "<script>window.location='./orderInvoice.php'</script>";

        }
    // }

?>


    <!-- Breadcrumb Begin -->
    <div class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__links">
                        <a href="./index.html"><i class="fa fa-home"></i> Home</a>
                        <span>Shopping cart</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Checkout Section Begin -->
    <section class="checkout spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h6 class="coupon__link"><span class="icon_tag_alt"></span> <a href="#">Have a coupon?</a> Click
                    here to enter your code.</h6>
                </div>
            </div>
            <form action="" class="checkout__form" method="post">
                <div class="row">
                    <div class="col-lg-8">
                        <h5>Billing detail</h5>
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="checkout__form__input">
                                    <p>First Name <span>*</span></p>
                                    <input type="text">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="checkout__form__input">
                                    <p>Last Name <span>*</span></p>
                                    <input type="text">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="checkout__form__input">
                                    <p>Country <span>*</span></p>
                                    <input type="text">
                                </div>
                                <div class="checkout__form__input">
                                    <p>Address <span>*</span></p>
                                    <input type="text" placeholder="Street Address">
                                    <input type="text" placeholder="Apartment. suite, unite ect ( optinal )">
                                </div>
                                <div class="checkout__form__input">
                                    <p>Town/City <span>*</span></p>
                                    <input type="text">
                                </div>
                                <div class="checkout__form__input">
                                    <p>Country/State <span>*</span></p>
                                    <input type="text">
                                </div>
                                <div class="checkout__form__input">
                                    <p>Postcode/Zip <span>*</span></p>
                                    <input type="text">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="checkout__form__input">
                                    <p>Phone <span>*</span></p>
                                    <input type="text">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="checkout__form__input">
                                    <p>Email <span>*</span></p>
                                    <input type="text">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="checkout__form__checkbox">
                                    <label for="acc">
                                        Create an acount?
                                        <input type="checkbox" id="acc">
                                        <span class="checkmark"></span>
                                    </label>
                                    <p>Create am acount by entering the information below. If you are a returing
                                        customer login at the <br />top of the page</p>
                                    </div>
                                    <div class="checkout__form__input">
                                        <p>Account Password <span>*</span></p>
                                        <input type="text">
                                    </div>
                                    <div class="checkout__form__checkbox">
                                        <label for="note">
                                            Note about your order, e.g, special noe for delivery
                                            <input type="checkbox" id="note">
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                    <div class="checkout__form__input">
                                        <p>Oder notes <span>*</span></p>
                                        <input type="text"
                                        placeholder="Note about your order, e.g, special noe for delivery">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="checkout__order">
                                <h5>Your order</h5>
                                <div class="checkout__order__product">
                                    <ul>
                                        <li>
                                            <span class="top__text">Product</span>
                                            <span class="top__text__right">Total</span>
                                        </li>
                                        <?php $i=1;?>
                                        
                                        <?php foreach($data as $value) :?>
                                        <li><?php echo $i?>. <?php echo $value['productName']?> *<?php echo $value['quantity']?> <span><?php echo $value['price']*$value['quantity']?> JD</span></li>
                                        <!-- <li>02. Zip-pockets pebbled<br /> tote briefcase <span>170.00 JD</span></li>
                                        <li>03. Black jean <span>170.00 JD</span></li>
                                        <li>04. Cotton shirt <span>110.00 JD</span></li> -->
                                        <?php $i++?>
                                        <?php endforeach; ?>
                                        
                                    </ul>


                                
                                </div>
                                <div class="checkout__order__total">
                                    <ul>
                                        <!-- <li>Subtotal <span>750.00 JD</span></li> -->
                                        <li>Total <span><?php  echo $_SESSION['totalPrice']; ?> JD
                                        </span></li>
                                    </ul>
                                </div>
                                <div class="checkout__order__widget">
                                    <!-- <label for="o-acc">
                                        Create an acount?
                                        <input type="checkbox" id="o-acc">
                                        <span class="checkmark"></span>
                                    </label>
                                    <p>Create am acount by entering the information below. If you are a returing customer
                                    login at the top of the page.</p>
                                    <label for="check-payment">
                                        Cheque payment
                                        <input type="checkbox" id="check-payment">
                                        <span class="checkmark"></span>
                                    </label> -->
                                    <label for="paypal">
                                    Cash on delivery
                                        <input type="checkbox" id="paypal">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                <button type="submit" class="site-btn" name="submit">Place oder</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </section>
        <!-- Checkout Section End -->

        <!-- Instagram Begin -->
        <!-- <div class="instagram">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-2 col-md-4 col-sm-4 p-0">
                        <div class="instagram__item set-bg" data-setbg="img/instagram/insta-1.jpg">
                            <div class="instagram__text">
                                <i class="fa fa-instagram"></i>
                                <a href="#">@ ashion_shop</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-4 col-sm-4 p-0">
                        <div class="instagram__item set-bg" data-setbg="img/instagram/insta-2.jpg">
                            <div class="instagram__text">
                                <i class="fa fa-instagram"></i>
                                <a href="#">@ ashion_shop</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-4 col-sm-4 p-0">
                        <div class="instagram__item set-bg" data-setbg="img/instagram/insta-3.jpg">
                            <div class="instagram__text">
                                <i class="fa fa-instagram"></i>
                                <a href="#">@ ashion_shop</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-4 col-sm-4 p-0">
                        <div class="instagram__item set-bg" data-setbg="img/instagram/insta-4.jpg">
                            <div class="instagram__text">
                                <i class="fa fa-instagram"></i>
                                <a href="#">@ ashion_shop</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-4 col-sm-4 p-0">
                        <div class="instagram__item set-bg" data-setbg="img/instagram/insta-5.jpg">
                            <div class="instagram__text">
                                <i class="fa fa-instagram"></i>
                                <a href="#">@ ashion_shop</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-4 col-sm-4 p-0">
                        <div class="instagram__item set-bg" data-setbg="img/instagram/insta-6.jpg">
                            <div class="instagram__text">
                                <i class="fa fa-instagram"></i>
                                <a href="#">@ ashion_shop</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
        <!-- Instagram End -->

<?php include('./include/footer.php'); ?>