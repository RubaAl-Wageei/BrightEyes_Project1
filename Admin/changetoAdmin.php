
<?php require('../config.php'); ?>

<?php
// get method من خلال ال  id احضار ال
if(isset($_GET['id'])){
    $id=$_GET['id'];
    $db = crud::connect()->prepare("UPDATE  users SET Role=:rol WHERE id=:id");
    $db->bindValue(':rol' , 1); // 1 من صفر الى  role  تغيير قيمة ال 
    $db->bindValue(':id' , $id);
    $db->execute();
    header("location:http://localhost/BrightEyes_Project1/admin/users.php");


    
}
    ?>