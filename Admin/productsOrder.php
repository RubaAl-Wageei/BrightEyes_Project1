<?php
include('./includes/header.php');
?>

 
    <?php require('../config.php');  ?>


    
<div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-12">

                            <h3 class="title-5 m-b-35">Orders Table</h3>
                                <div class="table-data__tool">
                                    <div class="table-data__tool-left">
                                        <div class="rs-select2--light rs-select2--md">
                                            
                                            <div class="dropDownSelect2"></div>
                                        </div>
                                        <div class="rs-select2--light rs-select2--sm">
                                            
                                            <div class="dropDownSelect2"></div>
                                        </div>
                                    </div>
                                    <!-- <div class="table-data__tool-right">
                                        <form method="post">
                                        <button class="au-btn au-btn-icon au-btn--green au-btn--small" ><a href="productsAdd.php" style="color:white;">
                                            <i class="zmdi zmdi-plus"></i>add item</a></button>
                                        </form>
                                    </div> -->
                                
                                <!-- END DATA TABLE -->
                            </div>
                        </div>
                
                                <div class="table-responsive table--no-card m-b-30">
                                    <table class="table table-borderless table-striped table-earning">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>order id</th>
                                                <th>user id</th>
                                                <th >user name </th>
                                                <th>order date</th>
                                                <th>total price</th>
                    
                                            </tr>
                                        </thead>
  <tbody>
                                        <?php $i=1 ?>
                                        <?php $data = crud::selectorder(); ?>
                                        <?php foreach($data as $value):?> 
                                      
                                            <tr>
                                                <td><?php echo $i++;?></td>  
                                                <td><?php echo $value['order_id'];?></td>
                                                <td><?php echo $value['id'];?></td> 
                                                <td><?php echo $value['FullName'];?></td> 
                                                <td><?php echo $value['order_date'];?> </td> 
                                                <td><?php echo $value['total_price'];?></td> 
                                            

                                            </tr>                        
                                            <?php  endforeach;?>
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

   