<?php include('./include/header.php');?>

<?php require('../bublic/config.php'); ?>

<?php  ?>
<?php 

$id=$_SESSION['id'];


// get data from DB use id

// لحتى اعرض البيانات القديمة داخل الحقول

$db = crud::connect()->prepare("SELECT * FROM users WHERE id= $id"); 
$db->execute();
$data= $db->fetch(PDO::FETCH_ASSOC);

if(isset($_POST['submit'])){

// post method تخزين البيانات داخل متغيرات عن طريق ال 
   
    $name=$_POST['name'];
    $email=$_POST['email'];
    $number=$_POST['number'];
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
if(preg_match("/^[0-9\-\+]{14}$/",$_POST['number'])&&!empty($_POST['number'])){
    $number = $_POST['number'];
    $three=1;

} else {
    $error_number= 'phone number Should be 14 digits'."<br>";
}
if(preg_match(("/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,20}$/"), $_POST['password'])&&!empty($_POST['password'])){
$password = $_POST['password']; 
$four=1;
} else {

$error_password ='Your password is week'."<br>";
}


if( $one==1 && $two==1 && $three==1 &&  $four==1 &&  $five==1 && in_array( $file_extenshion, $array_extension) ){

    $db = crud::connect()->prepare("UPDATE  users SET FullName=:fname, Email=:email, Password=:pass,image=:img,PhoneNumber=:phone WHERE id=:id");
    $db->bindValue(':id' , $id);
    $db->bindValue(':fname' , $name);
    $db->bindValue(':email' , $email);
    $db->bindValue(':pass' , $password);
    $db->bindValue(':img' , $upload_image);
    $db->bindValue(':phone' , $number);
   
   
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

<!-- MAIN CONTENT-->
<div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                        <div class="col-lg-9 m-auto">
                                <div class="card">
                                    <div class="card-header">EDIT INFORMATIO</div>
                                    <div class="card-body card-block">

                                        <!--يظهر عند نجاح عملية الاضافة alert  -->

                                    <?php if( !empty ($succses)):?>
                                    <div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
											<span class="badge badge-pill badge-success">Success</span>
											The operation has been completed successfully.
											<button type="button" class="close" data-dismiss="alert" aria-label="Close">
												<span aria-hidden="true">&times;</span>
											</button>
										</div>
                                        <?php endif;?>

                                        <form action="" method="post" class="" enctype="multipart/form-data">
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-user"></i>
                                                    </div>
                                                    <input type="text" id="username" name="name" placeholder="Username" class="form-control" value="<?php echo $data['FullName'];?>">
                                                </div>
                                                <?php if( !empty ($error_name) ){echo "<p>$error_name</p>"; }?>
                                                 
                                            </div>
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                    <i class="zmdi zmdi-phone"></i>
                                                    </div>
                                                    <input type="number" id="number" name="number" placeholder="number" class="form-control" value="<?php echo $data['PhoneNumber'];?>">
                                                </div>
                                                <?php if( !empty ($error_number) ){echo "<p>$error_number</p>"; }?>

                                            </div>
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-envelope"></i>
                                                    </div>
                                                    <input type="email" id="email" name="email" placeholder="Email" class="form-control" value="<?php echo $data['Email'];?>">
                                                </div>
                                                <?php if( !empty ($error_email) ){echo "<p>$error_email</p>"; }?>
                                                <?php if( !empty ($email_exist) ){echo "<p>$email_exist</p>"; }?>

                                            </div>
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-asterisk"></i>
                                                    </div>
                                                    <input type="password" id="password" name="password" placeholder="Password" class="form-control" >
                                                </div>
                                                <?php if( !empty ($error_password) ){echo "<p>$error_password</p>"; }?>
                                            </div>
        
                                            
                                            <div class="row form-group m-3">
                                                <div class="col col-md-3">
                                                    <label for="file-input" class=" form-control-label"> upload image </label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="file" id="file-input" name="file" class="form-control-file" autocomplete="off" value="<?php echo $data['image'];?>">
                                                </div>
                                            </div>
                                         
                                            
                                            <div class="form-actions form-group">
                                                <button type="submit" class="btn btn-success btn-m" name="submit">Submit</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>





<?php include('./include/footer.php');?>
