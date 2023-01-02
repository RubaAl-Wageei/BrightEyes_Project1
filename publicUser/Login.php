
<?php session_start(); 
// if(isset($_SESSION['name'])){
//     header("location:./index.php");
// }
?>
<?php include('./include/header.php'); ?>
<?php require('../config.php'); ?>

<link rel="stylesheet" href="./css/Login.css">

    <?php 
    
    if(isset($_POST['submit'])){

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
                // $_SESSION['validate']=true;
                header("location:./index.php");

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

<?php include('./include/footer.php'); ?>
