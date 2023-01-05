

<?php include('./includes/header.php');?>
<?php require('../config.php'); ?>
<?php
if(isset($_SESSION['name'])){
   
    // echo "<h1>"."welcome " . $_SESSION['name'] ."</h1>" . "<br>";
}else{
    // header("location:http://localhost/BrightEyes_Project1/Admin/login.php");
    echo "<script>window.location='login.php'</script>";

    exit();
}
?> 



<!--category الخاص بقرائة بيانات جدول ال function استدعاء ال  -->

<?php
//The last 5 registered on the site
$con=crud::connect()->prepare("SELECT * FROM
(
 SELECT * FROM users ORDER BY id DESC LIMIT 5
) AS sub
ORDER BY id ASC");
$con->execute();
$last_5_registered= $con->fetchAll(PDO::FETCH_ASSOC);

// The_numbers_of_people_registered_on_the_site
$conn=crud::connect()->prepare("SELECT COUNT(users.FullName) The_numbers_of_people_registered_on_the_site FROM users");
$conn->execute();
$The_numbers_of_users= $conn->fetchAll(PDO::FETCH_ASSOC);

// The number of products in each category
$connn=crud::connect()->prepare("SELECT category, COUNT(*)
FROM products
GROUP BY category");
$connn->execute();
$The_numbers_of_products= $connn->fetchAll(PDO::FETCH_ASSOC);

//The number of products purchased more than 5 times
$connnn=crud::connect()->prepare("SELECT COUNT(product_id),product_id FROM order_details GROUP BY product_id HAVING COUNT(product_id) > 5");
$connnn->execute();
$The_numbers_of_products_repeated= $connnn->fetchAll(PDO::FETCH_ASSOC);
?>



<div class="main-content">
    <div class="section__content section__content--p30">
                        <div class="row" style="justify-content:space-between">
                            <div>
                                <h2 class="title-5 m-b-35">Statistics</h2>
                                <hr>
                                <br>
                            </div>           
                        </div>
        <div class="container-fluid">
                        <div class="row" style="justify-content:space-between">
                            <div>
                                <h3 class="title-5 m-b-35">The numbers of people registered on the site</h3>
                            </div>           
                        </div>
                  
                    <div class="row m-t-30">
                                <!-- DATA TABLE-->
                        <div class="col-lg-12">
                            <div class="table-responsive table--no-card m-b-30">
                                <table class="table table-borderless table-striped table-earning">
                                        <thead>

                                            <tr style="text-align:center">
                                                <th>The numbers of people registered on the site</th>
                                           
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php $i=1; ?>
                                            <!-- foreach  طباعة البيانات داخل جدول من خلال  -->
                                            <?php foreach($The_numbers_of_users as $value):?> 

                                            <tr style="text-align:center">
                                                <td><?php echo $value['The_numbers_of_people_registered_on_the_site']?></td>                                         
                                            </tr>
                                            <?php  endforeach;?>                                     
                                        </tbody>
                                </table>
                                </div>
                                <!-- END DATA TABLE-->
                            </div>
        <div class="container-fluid">
                        <div class="row" style="justify-content:space-between">
                            <div>
                                <h3 class="title-5 m-b-35">The last 5 registered on the site</h3>
                            </div>           
                        </div>
                  
                    <div class="row m-t-30">
                                <!-- DATA TABLE-->
                        <div class="col-lg-12">
                            <div class="table-responsive table--no-card m-b-30">
                                <table class="table table-borderless table-striped table-earning">
                                        <thead>

                                            <tr style="text-align:center">
                                                <th>#</th>
                                                <th>name</th>
                                                <th>phone number</th>
                                                <th>email</th>
                                                <th>password</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php $i=1; ?>
                                            <!-- foreach  طباعة البيانات داخل جدول من خلال  -->
                                            <?php foreach($last_5_registered as $value):?> 

                                            <tr style="text-align:center">

                                                <td><?php echo $i++;?></td>
                                                <td><?php echo $value['FullName']?></td>
                                                <td><?php echo $value['PhoneNumber']?></td>
                                                <td><span class="block-email"><?php echo $value['Email']?></span></td>
                                                <td><?php echo $value['Password']?></td>                                                
                                         
                                            </tr>
                                            <?php  endforeach;?>                                     
                                        </tbody>
                                </table>
                                </div>
                                <!-- END DATA TABLE-->
                            </div>
                        </div>
                    </div>
        <div class="container-fluid">
                        <div class="row" style="justify-content:space-between">
                            <div>
                                <h3 class="title-5 m-b-35">The number of products in each category</h3>
                            </div>           
                        </div>
                  
                    <div class="row m-t-30">
                                <!-- DATA TABLE-->
                        <div class="col-lg-12">
                            <div class="table-responsive table--no-card m-b-30">
                                <table class="table table-borderless table-striped table-earning">
                                        <thead>

                                            <tr style="text-align:center">
                                                <th>Category</th>
                                                <th>Number of product</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php $i=1; ?>
                                            <!-- foreach  طباعة البيانات داخل جدول من خلال  -->
                                            <?php foreach($The_numbers_of_products as $value):?> 

                                            <tr style="text-align:center">

                                                <td><?php if( $value['category'] == 1){
                                                    echo "Cat-eye sunglasses";
                                                    }elseif($value['category'] == 2){
                                                        echo "Mirrored Sunglasses";
                                                    }elseif($value['category'] == 3){
                                                        echo "Sunglass Chain";
                                                    }elseif($value['category'] == 4){
                                                        echo "Kids Eyeglasses"; 
                                                    }else{
                                                        echo "Sunglass Cases";
                                                    } ?></td>
                                               
                                                <td><?php echo $value['COUNT(*)']?></td>
                                         
                                            </tr>
                                            <?php  endforeach;?>                                     
                                        </tbody>
                                </table>
                                </div>
                                <!-- END DATA TABLE-->
                            </div>
                        </div>
                    </div>
        <div class="container-fluid">
                        <div class="row" style="justify-content:space-between">
                            <div>
                                <h3 class="title-5 m-b-35">The number of products purchased more than 5 times</h3>
                            </div>           
                        </div>
                  
                    <div class="row m-t-30">
                                <!-- DATA TABLE-->
                        <div class="col-lg-12">
                            <div class="table-responsive table--no-card m-b-30">
                                <table class="table table-borderless table-striped table-earning">
                                        <thead>

                                            <tr style="text-align:center">
                                                <th>Product id</th>
                                                <th>The number of purchases</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php $i=1; ?>
                                            <!-- foreach  طباعة البيانات داخل جدول من خلال  -->
                                            <?php foreach($The_numbers_of_products_repeated as $value):?> 

                                            <tr style="text-align:center">

                                                <td><?php echo $value['product_id']?></td>
                                                <td><?php echo $value['COUNT(product_id)']?></td>
                                         
                                            </tr>
                                            <?php  endforeach;?>                                     
                                        </tbody>
                                </table>
                                </div>
                                <!-- END DATA TABLE-->
                            </div>
                        </div>
                    </div>
                    </div>
<?php include('./includes/footer.php');?>

             
                
