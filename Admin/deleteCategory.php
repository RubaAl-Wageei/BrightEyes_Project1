<?php require('../config.php'); ?>

<?php
// ------------------- delete category
// get method من خلال ال  id احضار ال

if(isset($_GET['id'])){
    $id=$_GET['id'];
    $db = crud::deleteCategory();
    $db ->bindValue(':id',$id);
    $db->execute();
    header("location:http://localhost/BrightEyes_Project1/Admin/category.php");


}
?>