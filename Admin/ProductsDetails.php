<?php
include('./includes/header.php');
?>

 
    <?php require('../config.php');  ?>






<?php
    $id=$_GET['id'];

// to display data before editing it 
    $A = crud::connect()->prepare("SELECT * FROM products WHERE id= $id"); 
    $A->execute();
    $data= $A->fetch(PDO::FETCH_ASSOC);




    if(isset($_POST["confirm"])){
    $name = $_POST['product-name'];
    $description = $_POST['product-description'];


    }

    ?>

    <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">

                        <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header">
                                        <strong>Product Details</strong> 
                                    </div>
                          
                                        <form action="" method="post" enctype="multipart/form-data" class="form-horizontal" enctype="multipart/form-data">
                                        <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">Product Name</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                     <?php echo $data['productName'];?></div>
                                                    <small class="form-text text-muted"></small>
                                                </div>

                                                <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">Price</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                     <?php echo $data['price'].".00 JD";?></div>
                                                    <small class="form-text text-muted"></small>
                                                </div>

                                                <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">Category</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    
                                                <?php if( $data['category'] == 1){
                                                    echo "Cat-eye sunglasses";
                                                    }elseif($data['category'] == 2){
                                                        echo "Mirrored Sunglasses";
                                                    }elseif($data['category'] == 3){
                                                        echo "Sunglass Chain";
                                                    }elseif($data['category'] == 4){
                                                        echo "Kids Eyeglasses"; 
                                                    }else{
                                                        echo "Sunglass Cases";
                                                    }
                                                    ?></div>
                                                    <small class="form-text text-muted"></small>
                                                </div>


                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">Image</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                <?php echo "<img src='../image/{$data['image']}'style=\"width:320px\">"?></div>
                                                    <small class="form-text text-muted"></small>
                                                </div>
                                             
                                     
                                             <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="textarea-input" class=" form-control-label">Product description</label>
                                                </div>
                                                <div style="width:500px;height:120px;"><?php echo $data['description'];?></div>
                                            </div>
            
                                        <!-- form first -->
                                    </div>
                                </form>
                                </div>
                        </div>
                        </div>
                        </div>
  

<?php
include("./includes/footer.php");
?>
        </div>

    </div>

   