<?php include('./include/header.php');?>
<?php require('../bublic/config.php'); ?>
<?php
$id=$_GET['id'];

// get data from DB use id
$db = crud::connect()->prepare("SELECT * FROM users WHERE id= $id"); 
$db->execute();
$data= $db->fetch(PDO::FETCH_ASSOC);

if(isset($_POST['submit'])){
   
    $name=$_POST['name'];
    $email=$_POST['email'];
    $number=$_POST['number'];
    $password=$_POST['password'];
  

    $one=0;
    $two=0;
    $three=0;
    $four=0;
  
    $error_name="";
    $error_email="";
    $error_number="";
    $error_password="";
    $email_exist="";
    $succses="";

//==================
$email_check=array();

$dd=crud::selectDataUser();
foreach($dd as $value){
    array_push( $email_check , $value['Email']);

}   
if(in_array(  $email , $email_check)){
     $email_exist = "this email is exist";
}
else{
    $five=1;

}

//==================

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


if( $one==1 && $two==1 && $three==1 &&  $four==1 &&  $five==1 ){
    $db = crud::connect()->prepare("UPDATE  users SET FullName=:fname, Email=:email, Password=:pass,PhoneNumber=:phone WHERE id=:id");
    $db->bindValue(':id' , $id);
    $db->bindValue(':fname' , $name);
    $db->bindValue(':email' , $email);
    $db->bindValue(':pass' , $password);
    $db->bindValue(':phone' , $number);
   
    $db -> execute();
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
                                                    <input type="text" id="username" name="name" placeholder="Username" class="form-control" value="<?php echo $data['FullName'];?>">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                    <i class="zmdi zmdi-phone"></i>
                                                    </div>
                                                    <input type="number" id="number" name="number" placeholder="number" class="form-control" value="<?php echo $data['PhoneNumber'];?>">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-envelope"></i>
                                                    </div>
                                                    <input type="email" id="email" name="email" placeholder="Email" class="form-control" value="<?php echo $data['Email'];?>">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-asterisk"></i>
                                                    </div>
                                                    <input type="password" id="password" name="password" placeholder="Password" class="form-control">
                                                </div>
                                            </div>
                                            
                                            <div class="form-actions form-group">
                                                <button type="submit" class="btn btn-success btn-m " name="submit">Submit</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
<?php include('./include/footer.php');?>
