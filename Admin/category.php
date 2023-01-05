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


<?php $db = crud::selectDataCategort(); ?>



<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
                        <div class="row" style="justify-content:space-between">
                            <div>
                                <h3 class="title-5 m-b-35">category table </h3>
                            </div>           
                            <div class="table-data__tool">

                                <div class="table-data__tool-right">
                                    <a href="http://localhost/BrightEyes_Project1/Admin/addCategory.php">
                                        <button class="au-btn au-btn-icon au-btn--blue au-btn--small"><i class="zmdi zmdi-plus"></i>add category</button>
                                    </a> 
                                </div>
                            </div>
                        </div>
                  
                    <div class="row m-t-30">
                                <!-- DATA TABLE-->
                        <div class="col-lg-12">
                            <div class="table-responsive table--no-card m-b-30">
                                <table class="table table-borderless table-striped table-earning">
                                        <thead>
                                            <tr style="text-align:center">
                                                <th>id</th>
                                                <th>name</th>
                                                <th>image</th>
                                                <th>edit</th>
                                                <th>delete</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <!-- foreach  طباعة البيانات داخل جدول من خلال  -->
                                            <?php foreach($db as $value):?> 

                                            <tr style="text-align:center">
                                                <td><?php echo $value['category_id']?></td>
                                                <td><?php echo $value['category_name']?></td>
                                                <td><?php echo "<img src='{$value['category_image']}'style=\"width:100px\">" ?></td>
                                                <td>
                                                        <div class="table-data-feature" style="justify-content:center">
                                                        
                                                            <button class="item m-auto" data-toggle="tooltip" data-placement="top" title="Edit">
                                                                <a href="http://localhost/BrightEyes_Project1/Admin/editCategory.php?id=<?php echo $value['category_id']; ?>"><i class="zmdi zmdi-edit"></i></a>
                                                            </button>
                
                                                        </div>
                                                </td>
                                                <td>
                                                        <div class="table-data-feature" style="justify-content:center">
                                                        
                                                            <button class="item" data-toggle="tooltip" data-placement="top" title="Delete">
                                                            <a href="./deleteCategory.php?id=<?php echo $value['category_id']; ?>" onclick="return confirm ('are you shure')" ><i class="zmdi zmdi-delete"></i></a>
                                                            </button>
                
                                                        </div>
                                                </td> 
                                            </tr>
                                            <?php  endforeach;?>                                     
                                        </tbody>
                                </table>
                                </div>
                                <!-- END DATA TABLE-->
                            </div>
                        </div>
                    </div>
<?php include('./includes/footer.php');?>

        