<?php

 require('../config');
   if(isset($_GET['id'])){
       $id=$_GET['id'];
       $db = crud::deleteProduct($id);
     
       }
   
       
header('location:http://localhost/BrightEyes_Project/CoolAdmin-master/Productstable.php');
?>