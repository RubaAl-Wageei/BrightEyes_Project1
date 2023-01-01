<?php
include('./includes/header.php');
?>

 
    <?php require('../config.php');  ?>
<?php
    if(isset($_POST["confirm"])){
    $name = $_POST['product-name'];
    $price = $_POST['product-price'];
    $description = $_POST['product-description'];
    $category = $_POST['product-category'];

     // image file
     $fileimagename =$_FILES['file'];
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
     move_uploaded_file($imagetemp,   $upload_image);
        
     }else{
         echo "the file extenyion is not supported";
     }

    $P=crud::connect()->prepare('INSERT INTO products(productName, price, image,  description, category) VALUE (:pName, :pPrice,:pImage, :pDescription, :pCategory)');

    $P->bindValue(':pName', $name);
    $P->bindValue(':pPrice', $price);
    $P->bindValue(':pImage',  $upload_image);
    $P->bindValue(':pDescription',$description);
    $P->bindValue(':pCategory', $category);
    $P->execute();

    }

    ?>

    <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">

                        <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header">
                                        <strong>Add item</strong> 
                                    </div>
                                    <div class="card-body card-block">
                                        <form action="" method="post"  class="form-horizontal" enctype="multipart/form-data">
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
                                                    <input type="text" id="text-input" name="product-name" placeholder="" class="form-control">
                                                    <small class="form-text text-muted"></small>
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="email-input" class=" form-control-label">Price</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="number" id="email-input" name="product-price" placeholder="" class="form-control">
                                                    <small class="help-block form-text"></small>
                                                </div>
                                            </div>
                                            <!-- <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="password-input" class=" form-control-label">Password</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="password" id="password-input" name="password-input" placeholder="Password" class="form-control">
                                                    <small class="help-block form-text">Please enter a complex password</small>
                                                </div>
                                            </div> -->
                                         
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="textarea-input" class=" form-control-label">Product description</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <textarea name="product-description" id="textarea-input" rows="9" placeholder="Content..." class="form-control"></textarea>
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
                                                    <input type="file" id="file-input" name="file" class="form-control-file" autocomplete="off">
                                                </div>
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

   