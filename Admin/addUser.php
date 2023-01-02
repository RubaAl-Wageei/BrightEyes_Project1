<?php include('./includes/header.php');?>
<?php require('../config.php'); ?>
<?php

// post method تخزين البيانات داخل متغيرات عن طريق ال 
if(isset($_POST['submit'])){
   
    $name=$_POST['name'];
    $email=$_POST['email'];
    $number=$_POST['number'];
    $password=$_POST['password'];
    $role=$_POST['select'];
  
// متغيرات خاصة بعملية الريجيكس في حال كانت عملية الريجيكس صحيحة يتم تغيير قيمتهم الى (1)
    $one=0;
    $two=0;
    $three=0;
    $four=0;
    $five=0;
    $six=0;
//الخاص بكل حقل error متغيرات لحتى يتم تخزين فيهم ال  
    $error_name="";
    $error_email="";
    $error_number="";
    $error_password="";
    $email_exist="";
    $role_role="";
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
if(preg_match("/^[0-9\-\+]{10}$/",$_POST['number'])&&!empty($_POST['number'])){
    $number = $_POST['number'];
    $three=1;

} else {
    $error_number= 'phone number Should be 10 digits'."<br>";
}
if(preg_match("/^[0-1\-\+]{1}$/",$_POST['role'])&&!empty($_POST['role'])){
    $role = $_POST['role'];
    $six=1;

} else {
    $error_role= 'role Should be 1 digits (0 or 1)'."<br>";
}
if(preg_match(("/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,20}$/"), $_POST['password'])&&!empty($_POST['password'])){
    $password = $_POST['password']; 
    $four=1;
} else {

    $error_password ='Your password is week'."<br>";
}

// اذا كانت قيمة كل المتغيرات 1 راح يتم تخزين البيانات في الداتا بيس
if( $one==1 && $two==1 && $three==1 &&  $four==1 &&  $five==1 ){
    $db = crud::connect()->prepare("INSERT INTO users (id,FullName,Email,password,PhoneNumber,Role) VALUES (NULL,:fname,:email,:pass,:phone,:role)");

    $db->bindValue(':fname' , $name);
    $db->bindValue(':email' , $email);
    $db->bindValue(':pass' , $password);
    $db->bindValue(':phone' , $number);
    $db->bindValue(':role' , $role);
   
    $db -> execute();

    $succses=1;

}else{
    echo 'not Successfully'."<br>";

}};
?>

    <!-- MAIN CONTENT-->
    <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                        <div class="col-lg-9 m-auto">
                                <div class="card">
                                    <div class="card-header">ADD USER</div>
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
                                        <form action="" method="post" class="">
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-user"></i>
                                                    </div>
                                                    <input type="text" id="username" name="name" placeholder="Username" class="form-control">
                                                </div>
                                                <?php if( !empty ($error_name) ){echo "<p>$error_name</p>"; }?>
                                                 
                                            </div>
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                    <i class="zmdi zmdi-phone"></i>
                                                    </div>
                                                    <input type="number" id="number" name="number" placeholder="number" class="form-control">
                                                </div>
                                                <?php if( !empty ($error_number) ){echo "<p>$error_number</p>"; }?>

                                            </div>
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-envelope"></i>
                                                    </div>
                                                    <input type="email" id="email" name="email" placeholder="Email" class="form-control">
                                                </div>
                                                <?php if( !empty ($error_email) ){echo "<p>$error_email</p>"; }?>
                                                <?php if( !empty ($email_exist) ){echo "<p>$email_exist</p>"; }?>

                                            </div>
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-asterisk"></i>
                                                    </div>
                                                    <input type="password" id="password" name="password" placeholder="Password" class="form-control">
                                                </div>
                                                <?php if( !empty ($error_password) ){echo "<p>$error_password</p>"; }?>

                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="select" class=" form-control-label">Select (Admin or User)</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <select name="select" id="select" class="form-control">
                                                        <option value="1">ADMIN</option>
                                                        <option value="0"> USER</option>
                                                    </select>
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
<?php include('./includes/footer.php');?>
