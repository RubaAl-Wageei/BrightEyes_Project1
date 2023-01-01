<?php
include('./includes/header.php');
?>

 
    <?php require('../config.php');  ?>


<div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-12">

                            <h3 class="title-5 m-b-35">Products Table</h3>
                                <div class="table-data__tool">
                                    <div class="table-data__tool-left">
                                        <div class="rs-select2--light rs-select2--md">
                                            
                                            <div class="dropDownSelect2"></div>
                                        </div>
                                        <div class="rs-select2--light rs-select2--sm">
                                            
                                            <div class="dropDownSelect2"></div>
                                        </div>
                                    </div>
                                    <div class="table-data__tool-right">
                                        <form method="post">
                                        <button class="au-btn au-btn-icon au-btn--green au-btn--small"><a href="productsAdd.php">
                                            <i class="zmdi zmdi-plus"></i>add item</a></button>
                                        </form>
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
                                                <th>description</th>
                                                <th >category</th>
                                                <th >Add</th>
                                                <th >Delete</th>
                                            </tr>
                                        </thead>
  <tbody>
                                        <?php $i=1 ?>
                                        <?php $data = crud::selectProduct(); ?>
                                        <?php foreach($data as $value):?> 
                                      
                                            <tr>
                                                <td><?php echo $i++;?></td>  
                                                <td><?php echo $value['productName'];?></td>
                                                <td><?php echo $value['price'];?></td> 
                                                <td> <?php echo "<img src='{$value['image']}'style=\"width:100px\">"?></td>
                                                <td><?php echo $value['description'];?></td> 
                                                <td><?php echo $value['category'];?></td> 
                                                <form method="post">
                                                <td><a href="./productsEdit.php?id=<?php echo $value['id'];?>"><span>Edit</span></a></td>
                                                 <td><a href="./deleteProduct.php?id=<?php echo $value['id'];?>" onclick="return confirm ('Are you sure..?')" ><span>Delete</span</a></td>
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
                        
                    
                <?php
include("./includes/footer.php");
?>
        </div>

    </div>

   