<?php 


include('./include/header.php');
require('../config.php');
if(isset($_POST['submit'])){

    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phoneNumber'];
    $password = $_POST['password'];
    $repassword = $_POST['re_password'];

    // echo($name);


    $one=0;
    $two=0;
    $three=0;
    $four=0;
    $five=0;
    $six=0;

    $error_name = "";
    $error_email = "";
    $error_phone = "";
    $error_password = "";
    $error_repassword = "";
    $email_exist = "";

    /// Check Email
   
    $check = crud::selectDataUser();
     $email_check = array();
    foreach($check as $value){
        array_push($email_check , $value['Email']);
    }
    if(in_array($email , $email_check)){
        $email_exist = "This Email Is Exist";
    } else {
        $sex=1;
    }
    // Regex name , email , phoneNumber , password and repassword
    if(preg_match("/^[A-Z a-z]+$/", $_POST['name']) && !empty($_POST['name'])){
        $name = $_POST['name'];
        $one=1;
    } else {
        $error_name = "Your Name Is Incorrect"."<br>";
    }

    if(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) && !empty($_POST['email'])){
        $email = $_POST['email'];
        $two=1;
    } else {
        $error_email = "Your Email Is Invalid"."<br>";
    }

    if(preg_match("/^[0-9\-\+]{14}$/", $_POST['phoneNumber']) && !empty($_POST['phoneNumber'])){
        $phone = $_POST['phoneNumber'];
        $three=1;
    } else {
        $error_phone = "The Phone Number Should be Contain 14 digits"."<br>";
    }

    if(preg_match("/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,20}$/", $_POST['password']) && !empty($_POST['password'])){
        $password = $_POST['password'];
        $four = 1;
    } else {
        $error_password = "Your Password is Week"."<br>";
    }

    if($password == $repassword){
        $five = 1;
    } else {
        $error_repassword = "Your Password is Not Match"."<br>";
    }

    if($one==1 && $two==1 && $three==1 && $four==1 && $five==1 && $sex==1 ){
        $sql="INSERT INTO users ( FullName , PhoneNumber , Email , Password) VALUES ( :fname , :phone, :email , :pass)";
        $con = crud::connect()->prepare($sql);

        $con->bindValue(':fname' , $name);
        $con->bindValue(':phone' , $phone);
        $con->bindValue(':email' , $email);
        $con->bindValue(':pass' , $password);
        $con->execute();
        // header("location: ./Login.php");
        // exit();
        echo "Successfully"."<br>";
    } else {
        echo "Not Successfully"."<br>";
    }
}

?>


    <link rel="stylesheet" href="./css/Register.css">
      
    <div class="container">
        <form action="" method="post" id="form">
            <div id="div">
                <h2>CREATE AN ACCOUNT</h2>
                <br>
                <input type="text" name="name" placeholder="Please Enter Your Full Name">
                <?php 
                if(!empty($error_name)){
                    echo "<p> $error_name </p>";
                }
                ?>
                <br>
                <input type="email" name="email" placeholder="Please Enter Your Email">
                <?php 
                if(!empty($error_email)){
                    echo "<p> $error_email </p>";
                }
                if(!empty($email_exist)){
                    echo "<p> $email_exist </p>";
                }
                ?>
                <br>
                <input type="text" name="phoneNumber" placeholder="Please Enter Your Phone Number">
                <?php 
                if(!empty($error_phone)){
                    echo "<p> $error_phone </p>";
                }
                ?>
                <br>
                <input type="password" name="password" placeholder="Please Enter Your Password">
                <?php 
                if(!empty($error_password)){
                    echo "<p> $error_password </p>";
                }
                ?>
                <br>
                <input type="password" name="re_password" placeholder="Please Repeat Your Password">
                <?php 
                if(!empty($error_repassword)){
                    echo "<p> $error_repassword </p>";
                }
                ?>
                <br><br>
                <input type="submit" name="submit" value="Register" id="submit">
            
            <p id="para">Do you have an account?<a href="./login.php" >Login</a></p>
            </div>
        </form>
    </div>  
    <?php include('./include/footer.php'); ?>
