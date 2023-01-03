<?php session_start();?>

<?php include('./include/header.php'); ?>
<?php require('../config.php'); ?>
<?php 
$id=$_SESSION['id'];

// echo $id;
// get data from DB use id

// لحتى اعرض البيانات القديمة داخل الحقول

$db = crud::connect()->prepare("SELECT * FROM users WHERE id= $id"); 
$db->execute();
$data= $db->fetch(PDO::FETCH_ASSOC);

if(isset($_POST['submit'])){

// post method تخزين البيانات داخل متغيرات عن طريق ال 
   
    $name=$_POST['name'];
    $email=$_POST['email'];
    $password=$_POST['password'];

// image file
    $fileimagename =$_FILES['file']; // تخزن فيها معلومات الصورة array عبارة عن  file ال 
    $imagename=$fileimagename['name']; //  تخزين اسم الصورة داخل متغير
    $imagetemp=$fileimagename['tmp_name']; // الخاص بالصورة داخل متغير path تخزين
    $filename =explode('.', $imagename); //extenion لحتى نفصل الاسم عن ال array  تحويل اسم الصورة الى
    $file_extenshion=strtolower( end($filename)); // validation الخاص بالصورة داخل متغير لتحى نعمل عليها extenion  تخزين ال 


    $array_extension=array("png","jpg","jpeg","jfif");

    if(in_array( $file_extenshion, $array_extension)){

        $upload_image='../image/'.$imagename;
        move_uploaded_file($imagetemp,   $upload_image); // image لنقل الصورة الى داخل ملف ال 
        
    }else{
        echo "the file extenyion is not supported";
    }

// متغيرات خاصة بعملية الريجيكس في حال كانت عملية الريجيكس صحيحة يتم تغيير قيمتهم الى (1)

    $one=0;
    $two=0;
    $three=0;
    $four=0;
    $five=0;
  
//الخاص بكل حقل error متغيرات لحتى يتم تخزين فيهم ال  

    $error_name="";
    $error_email="";
    $error_number="";
    $error_password="";
    $email_exist="";
    $succses="";

//==================
// للتأكد من ان الايميل غير موجود من قبل في الداتا بيس

$email_check=array();

$dd=crud::selectDataUser();
foreach($dd as $value){
    array_push( $email_check , $value['Email']); //array تخزين جميع الايميلات داخل  

}   
if(in_array(  $email , $email_check)){
     $email_exist = "this email is exist";
}
else{
    $five=1;

}

//==================

// عملية الريجيكس لكل حقل

if(preg_match("/^[A-Z a-z]+$/",$_POST['name'])&&!empty($_POST['name'])){
    $name = $_POST['name'];
    $one=1;

} else {
    $error_name= 'Your first name should contain just alphabets'."<br>";
}

if(filter_var($_POST['email'],FILTER_VALIDATE_EMAIL) && !empty($_POST['email'])){
$email = $_POST['email'];
$two=1;
} else {
    $error_email= 'Your email is invalid'."<br>";
}

if(preg_match(("/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,20}$/"), $_POST['password'])&&!empty($_POST['password'])){
$password = $_POST['password']; 
$four=1;
} else {

$error_password ='Your password is week'."<br>";
}


if( $one==1 && $two==1  &&  $four==1 &&  $five==1 && in_array( $file_extenshion, $array_extension) ){

    $db = crud::connect()->prepare("UPDATE  users SET FullName=:fname, Email=:email, Password=:pass,image=:img,PhoneNumber=:phone WHERE id=:id");
    $db->bindValue(':id' , $id);
    $db->bindValue(':fname' , $name);
    $db->bindValue(':email' , $email);
    $db->bindValue(':pass' , $password);
    $db->bindValue(':img' , $upload_image);
   
   
    $db -> execute(); 
    $_SESSION['name']=$name;
    $_SESSION['email']=$email;
    $_SESSION['pass']=$password;
    $_SESSION['img']=$upload_image;


   
    $succses=1;
}else{
    // echo 'not Successfully'."<br>";

}};
?>

   <style>
      
        .container{
            margin-top: 10%;
        }




    </style>
    <title>Edit</title>
</head>
<body>
    




    <div class="container">
        <h1>Edit Profile</h1>
          <hr>
        <div class="row">
          <!-- left column -->
          <div class="col-md-3">
            <div class="text-center">
              <img src="../image/<?php echo $_SESSION['image']?>" class="avatar img-circle" alt="avatar">
             
            </div>
          </div>
          
          <!-- edit form column -->
          <div class="col-md-9 personal-info">
        
            <h3>Personal info</h3>
            
            <form class="form-horizontal" action="" method="post" class="" enctype="multipart/form-data">
              <div class="form-group">
                <label class="col-lg-3 control-label">Full name:</label>
                <div class="col-lg-8">
                  <input class="form-control" type="text"  name="name" placeholder="" value="<?php echo $data['FullName'];?>">
                </div>
                <?php if( !empty ($error_name) ){echo "<p>$error_name</p>"; }?>

              </div>
              
              <div class="form-group">
                <label class="col-lg-3 control-label">Email:</label>
                <div class="col-lg-8">
                  <input class="form-control" type="text" name="email" placeholder="" value="<?php echo $data['Email'];?>">
                </div>
                <?php if( !empty ($error_email) ){echo "<p>$error_email</p>"; }?>
                                                <?php if( !empty ($email_exist) ){echo "<p>$email_exist</p>"; }?>
              </div>
             
            
              <div class="form-group">
                <label class="col-md-3 control-label">Password:</label>
                <div class="col-md-8">
                  <input class="form-control" name="password" type="password" placeholder="">
                </div>
                <?php if( !empty ($error_password) ){echo "<p>$error_password</p>"; }?>

              </div>
              
              <div class="form-group">
                <label class="col-md-3 control-label">Upload a different photo...</label>
                <div class="col-md-8">
                <input type="file" class="form-control" name="file" autocomplete="off">
                </div>
                </div>
              <div class="form-group">
                <label class="col-md-3 control-label"></label>
                <div class="col-md-8">
                  <input type="submit" class="btn btn-primary" value="Save Changes" name="submit">
              
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
      <hr>
      

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