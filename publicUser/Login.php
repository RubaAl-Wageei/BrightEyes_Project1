
<?php session_start(); 
// if(isset($_SESSION['name'])){
//     header("location:./index.php");
// }
?>
<?php include('./include/header.php'); ?>
<?php require('../config.php'); ?>

    <?php 
    
    if(isset($_POST['submit'])){
        $_SESSION['Validate'] = false;
        $email=$_POST['email'];
        $password=$_POST['password'];
        // $nowTimeStamp = date("Y-m-d H:i:s");
        $error="";
        $con = crud::connect()->prepare("SELECT * FROM users WHERE email=:email and password = :password ");
        $con->bindValue(':email' , $email);
        $con->bindValue(':password' , $password);
        $con->execute();
        $d= $con->fetch(PDO::FETCH_ASSOC);
        if(!empty($_POST['email']) && !empty($_POST['password'])){
            if($d){
                $_SESSION['name']=$d["FullName"];
                $_SESSION['email']=$d["Email"];
                $_SESSION['pass']=$d["Password"];
                $_SESSION['role']=$d["Role"];
                $_SESSION['id']=$d["id"];
                $_SESSION['validate']=true;
                echo "<script>window.location='index.php'</script>";

                 //add date last log in use now() function
                // $sql="UPDATE  users SET  last_login =now() WHERE id=". $_SESSION['id'];
                // $con = crud::connect()->prepare( $sql);
                // $con->execute();
            }
         
            else{
                $error= "Not Match";
                
            }  
           
        } else{
            $error= "This Email is Not Found";  
        }   
          
    }
    
    ?>


<link rel="stylesheet" href="./css/Login.css">

<div class="container1">
    <h2>LOGIN </h2>

    <form action="" method="post" enctype="multipart/form-data" id="form">
            <br>
            <input type="email" name="email" placeholder="Enter Your Email">
            <br>
            <input type="password" name="password" placeholder="Enter Your Password">
            <?php 
            if( !empty ($error) ){
                echo "<p>$error</p>";
            }
            ?>
            <br><br>
            <input type="submit" name="submit" value="Login" id="submit">
            <p id="para">Don't have an account?<a href="./register.php" >Sign up</a></p>

    </form>
</div>

     <!-- Js Plugins -->
     <script src="js/jquery-3.3.1.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/jquery.magnific-popup.min.js"></script>
        <script src="js/jquery-ui.min.js"></script>
        <script src="js/mixitup.min.js"></script>
        <script src="js/jquery.countdown.min.js"></script>
        <script src="js/jquery.slicknav.js"></script>
        <script src="js/owl.carousel.min.js"></script>
        <script src="js/jquery.nicescroll.min.js"></script>
        <script src="js/main.js"></script>
    </body>

    </html>
