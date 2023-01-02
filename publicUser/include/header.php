
<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ashion Template">
    <meta name="keywords" content="Ashion, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>BrightEyes | Project</title>

    <!-- Google Font -->
    <!-- <link href="https://fonts.googleapis.com/css2?family=Cookie&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800;900&display=swap"
    rel="stylesheet"> -->
    <link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin><link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&family=Josefin+Sans:wght@600&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="css/magnific-popup.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <!-- <style> 
textarea {
  width: 100%;
  height: 150px;
  padding: 12px 20px;
  box-sizing: border-box;
  border: 2px solid #ccc;
  border-radius: 4px;
  background-color: #f8f8f8;
  font-size: 16px;
  resize: none;
}
</style> -->
</head>
<body>
<?php
    if(isset($_SESSION['cart'])){
            $count=count($_SESSION['cart']);

    }else{
        $count=0;
    }  
?>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Offcanvas Menu Begin -->
    <div class="offcanvas-menu-overlay"></div>
    <div class="offcanvas-menu-wrapper">
        <div class="offcanvas__close">+</div>
        <ul class="offcanvas__widget">
            <li><span class="icon_search search-switch"></span></li>
            <li><a href="#"><span class="icon_heart_alt"></span>
                <div class="tip">2</div>
            </a></li>
            <li><a href="./shop-cart.html"><span class="icon_bag_alt"></span>
                <div class="tip">2</div>
            </a></li>
        </ul>
        <div class="offcanvas__logo">
            <a href="./index.php"><img src="img/logo_1.png" alt="logo" style="width:50px"></a>
            <a href="./index.html"><img src="../img/logo_1.png" alt=""></a>
        </div>
        
        <div id="mobile-menu-wrap"></div>
        <div class="offcanvas__auth">
            <a href="./Register.php">Login</a>
            <a href="./Login.php">Register</a>
            
            <a href="./user_prof.html">Edit Profile</a>
            
        </div>
    </div>
    <!-- Offcanvas Menu End -->

    <!-- Header Section Begin -->
    <header class="header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-3 col-lg-2">
                    <div class="header__logo">

                        <a href="./index.php"><img src="./img/logo_1.png" alt="" style="width:50px"></a> 
                    </div>
                </div>
                <div class="col-xl-6 col-lg-7">
                    <nav class="header__menu">
                        <ul>
                            <li><a href="./index.php">Home</a></li>
                            <li><a href="./shop.php">ٍShop</a></li>
                            <li><a href="#">Categories</a>
                                <ul class="dropdown">
                                        <li><a href="./shop.php?id=1">Cat Eye Glass</a></li>
                                        <li><a href="./shop.php?id=3">Kid's Eyeglasses</a></li>
                                        <li><a href="./shop.php?id=2">Mirrored Sunglasses</a></li>
                                        <li><a href="./shop.php?id=4">Sunglass Cases</a></li>
                                        <li><a href="./shop.php?id=5">Sunglass chain</a></li>
                                 </ul>   
                                </li>     
                            <!-- <li><a href="#">Men’s</a></li> -->
                         
                            <li><a href="./shop.php">SHOP</a></li>
                            <li><a href="./contact.php">Contact</a></li>
                            <li><a href="./about.php">About us</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="col-lg-3">
                    <div class="header__right">
                        <div class="header__right__auth">
                            <a href="./Login.php">Login</a>
                            <a href="./Register.php">Register</a>
                        </div>
                        <ul class="header__right__widget">
                            <!-- <li><span class="icon_search search-switch"></span></li>
                            <li><a href="#"><span class="icon_heart_alt"></span>
                                <div class="tip">2</div>
                            </a></li> -->
                            <li><a href="./cart.php"><span class="icon_bag_alt"></span>
                                <div class="tip"><?php echo $count ?></div>
                            </a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="canvas__open">
                <i class="fa fa-bars"></i>
            </div>
        </div>
    </header>
    <!-- Header Section End -->