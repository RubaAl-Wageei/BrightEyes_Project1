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
                                        <button class="au-btn au-btn-icon au-btn--green au-btn--small"><a href="productsAdd.php" style="color:white;">
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
                                                <th>More Details</th>
                                                <th >Edit</th>
                                                <th >Delete</th>
                                            </tr>
                                        </thead>
  <tbody>
                                        <?php $i=1; ?>
                                        <?php $data = crud::selectProduct(); ?>
                                        <?php foreach($data as $value):?> 
                                       
                                                       
                                                        <!-- <td style="border:none;overflow-y:scroll;"><p style="width:100px;"><?php //echo $value['description'];?></p></td>  -->
                                            <tr>
                                                <td><?php echo $i++;?></td>  
                                                <td><?php echo $value['productName'];?></td>
                                                <form method="post">
                                                <td><a href="./ProductsDetails.php?id=<?php echo $value['id'];?>"><span>see more details</span></a></td> 
                                                <td><a href="./productsEdit.php?id=<?php echo $value['id'];?>"><span>Edit</span></a></td>
                                                <td><a href="./deleteProducts.php?id=<?php echo $value['id'];?>" onclick="return confirm ('Are you sure..?')" ><span>Delete</span</a></td>
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

   





    <?php
//     $f = 10;
//     $s = 20;
//     $length = strlen($value['description']);
// //  echo $length;
    
// for($i = 0 ; $i<5; $i++){

//     for($x = 0; $x<=$length; $x++){
//         echo substr($value['description'],$f,$s);
//         $f= $f+10;
//         $s= $s+10;
                                                                                    
//     }
//     echo "<br>";
// }


?>