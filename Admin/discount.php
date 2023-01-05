<?php
include('./includes/header.php');
?>

 
    <?php require('../config.php');  ?>
    <?php
if(isset($_SESSION['name'])){
   
    // echo "<h1>"."welcome " . $_SESSION['name'] ."</h1>" . "<br>";
}else{
    // header("location:http://localhost/BrightEyes_Project1/Admin/login.php");
    echo "<script>window.location='login.php'</script>";

    exit();
}
?> 

<div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-12">

                            <h3 class="title-5 m-b-35">Create a discount</h3>
                                <div class="table-data__tool">
                                    <div class="table-data__tool-left">
                                        <div class="rs-select2--light rs-select2--md">
                                            
                                            <div class="dropDownSelect2"></div>
                                        </div>
                                        <div class="rs-select2--light rs-select2--sm">
                                            
                                            <div class="dropDownSelect2"></div>
                                        </div>
                                    </div>
                            
                                <!-- END DATA TABLE -->
                            </div>
                        </div>
                
                                <div class="table-responsive table--no-card m-b-30">
                                    <table class="table table-borderless table-striped table-earning">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Product Name</th>
                                                <th>Price</th>
                                                <th >images</th>
                                                <th >Add discount</th>
                                                
                                            </tr>
                                        </thead>
  <tbody>
                                        <?php 
                 
                                        ?>

                                        <?php 
                                    // i didnt print the items witch have the value of discount is 1 in database in this table 
                                    // to show only items without discount . 
                                        $i=1;
                                         $data = crud::selectProduct(); 
                                         foreach($data as $value):
                                            if($value['discount']== 1){continue;}

                                      ?>
                                      <?php

                                        if(isset($_POST["NewPrice"])){
                                                
                                                $newPrice = $_POST['Discount'];
                                        }

                                         ?>   

                                            <tr>    
                                                <td><?php echo $i++;?></td>  
                                                <td><?php echo $value['productName'];?></td>
                                                <td><?php echo $value['price'];?></td> 
                                                <td> <?php echo "<img src='../image/{$value['image']}'style=\"width:100px\">"?></td>
                                                <form method="post">
                                                <td><a href="./discount2.php?id=<?php echo $value['id'];?>"><span>Add new</span></a></td>
                                                 </form>
                                          
                                             
                                            </tr>                        
                                            <?php  endforeach;?>
                                            <?php
                                            
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

    
      <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-12">

                            <h3 class="title-5 m-b-35">Products on discount</h3>
                                <div class="table-data__tool">
                                    <div class="table-data__tool-left">
                                        <div class="rs-select2--light rs-select2--md">
                                            
                                            <div class="dropDownSelect2"></div>
                                        </div>
                                        <div class="rs-select2--light rs-select2--sm">
                                            
                                            <div class="dropDownSelect2"></div>
                                        </div>
                                    </div>
                            
                                <!-- END DATA TABLE -->
                            </div>
                        </div>
                
                                <div class="table-responsive table--no-card m-b-30">
                                    <table class="table table-borderless table-striped table-earning">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Product Name</th>
                                                <th>Old price</th>
                                                <th>Discounted price</th>
                                                <th >images</th>
                                                <th >Remove discount</th>
                                            </tr>
                                        </thead>
  <tbody>
                                            
                                        <?php 

                                        // i didnt print the items witch have the value of discount is 0 in database in this table 
                                      // to show only items with discount . 
                                        $i=1;
                                         $data = crud::selectProduct(); 
                                         foreach($data as $value):
                                         if($value['discount']== 0){continue;}
                                        ?>
                                      
                                            <tr>
                                                <td><?php echo $i++;?></td>  
                                                <td><?php echo $value['productName'];?></td>
                                                <td><?php echo $value['price'];?></td>
                                                <td><?php echo $value['new_Price'];?></td>
                                                <td> <?php echo "<img src='../image/{$value['image']}'style=\"width:100px\">"?></td>
                                                <form method="post">
                                                <td><a href="./discountRemove.php?id=<?php echo $value['id'];?>"><span>Remove Discount</span></a></td>
                                                 </form>
                                            </tr>                        
                                            <?php  endforeach ;?>

                                            <?php
                                           
                                            
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <?php
include("./includes/footer.php");
?>
        </div>

    </div>

   