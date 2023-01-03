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
    $price = $_POST['product-price'];
    $description = $_POST['product-description'];
    $category = $_POST['product-category'];


    
    $fileimagename =$_FILES['photo-input'];
     $imagename=$fileimagename['name'];
     $imagetemp=$fileimagename['tmp_name'];
     $filename =explode('.', $imagename);
     // print_r  ($filename). "<br>";
     $file_extenshion=strtolower( end($filename));
     // echo   $file_extenshion . "<br>";
 
     $array_extension=array("png","jpg","jpeg","jfif");
 
     if(in_array( $file_extenshion, $array_extension)){
 
     // $upload_image= 'images/'. $fileimagename;
     $upload_image='../image/'.$imagename;
     move_uploaded_file($imagetemp,  $upload_image);
        
     }else{
         echo "the file extenyion is not supported";
     }

   


        // to update the data 

    $P=crud::connect()->prepare('UPDATE products SET productName=:pName, price=:pPrice, image=:pImage, description=:pDescription, category=:pCategory WHERE id=:id');

    $P->bindValue(':pName', $name);
    $P->bindValue(':pPrice', $price);
    $P->bindValue(':pImage',  $upload_image);
    $P->bindValue(':pDescription', $description);
    $P->bindValue(':pCategory', $category);
    $P->bindValue(':id', $id);
   
if( $P->execute()){
    $succses=1;
}
    // echo 'Successfully'."<br>";
    
    // header('Location: '.$_SERVER['REQUEST_URI']);
  
    }

    ?>

    <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">

                        <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header">
                                        <strong>Edit items</strong> 
                                    </div>
                                    <div class="card-body card-block">
                                    <?php if( !empty ($succses)):?>
                                    <div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
											<span class="badge badge-pill badge-success">Success</span>
											The operation has been completed successfully.
											<button type="button" class="close" data-dismiss="alert" aria-label="Close">
												<span aria-hidden="true">&times;</span>
											</button>
										</div>
                                        <?php endif;?>
                                        <form action="" method="post" enctype="multipart/form-data" class="form-horizontal" enctype="multipart/form-data">
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label class=" form-control-label">Item</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <p class="form-control-static">Inputs</p>
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">Product Name</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="text-input" name="product-name" placeholder="" class="form-control" value="<?php echo $data['productName'];?>">
                                                    <small class="form-text text-muted"></small>
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="email-input" class=" form-control-label">Price</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="number" id="email-input" name="product-price" placeholder="" class="form-control" value="<?php echo $data['price'];?>">
                                                    <small class="help-block form-text"></small>
                                                </div>
                                            </div>
                                        
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="textarea-input" class=" form-control-label">Product description</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <textarea name="product-description" id="textarea-input" rows="9" placeholder="" class="form-control" value="<?php echo $data['description'];?>"></textarea>
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="select" class=" form-control-label">ِAdd product to a category</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <select name="product-category" id="select" class="form-control">
                                                        <option value="0">Please select</option>
                                                        <option value="1">Cat-eye sunglasses</option>
                                                        <option value="2">Mirrored Sunglasses</option>
                                                        <option value="3">Cunglass Chain</option>
                                                        <option value="4">Kids Eyeglasses</option>
                                                        <option value="5">Cunglass Chain</option>
                                                    </select>
                                                </div>
                                            </div>

                                            
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="file-input" class=" form-control-label">Add Main Photo</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="file" id="file-input" name="photo-input" class="form-control-file">
                                                </div>
                                            </div>
                        
                                        <!-- form first -->
                                    </div>
                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary btn-sm" name="confirm">
                                            <i class="fa fa-dot-circle-o"></i> Submit
                                        </button>
                                        <button type="reset" class="btn btn-danger btn-sm">
                                            <i class="fa fa-ban"></i> Reset
                                        </button>
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

   