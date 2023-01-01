<?php include('./includes/header.php');?>
<?php require('../config.php'); ?>


<?php


if(isset($_POST['submit'])){
   
// تخزين البيانات المرسلة من الفورم داخل متغيرات
    $category_name=$_POST['name'];

// الكود الخاص بتحميل الصورة

    $fileimagename =$_FILES['file']; // تخزن فيها معلومات الصورة array عبارة عن  file ال 
    $imagename=$fileimagename['name'];//  تخزين اسم الصورة داخل متغير
    $imagetemp=$fileimagename['tmp_name']; // الخاص بالصورة داخل متغير path تخزين 
    $filename =explode('.', $imagename); //extenion لحتى نفصل الاسم عن ال array  تحويل اسم الصورة الى 
    $file_extenshion=strtolower( end($filename)); // validation الخاص بالصورة داخل متغير لتحى نعمل عليها extenion  تخزين ال 

    $array_extension=array("png","jpg","jpeg","jfif"); 

    if(in_array( $file_extenshion, $array_extension)){

    $upload_image='../image/'.$imagename;
    move_uploaded_file($imagetemp,   $upload_image);  // image لنقل الصورة الى داخل ملف ال
       
    }else{
        $error_image= "the file extenyion is not supported";
    }
  

    $succses="";
  



//==================


if( in_array( $file_extenshion, $array_extension)){
    $db = crud::connect()->prepare("INSERT INTO category (category_id,category_name,category_image) VALUES (NULL,:name,:img)"); 
    $db->bindValue(':name' , $category_name);
    $db->bindValue(':img' , $upload_image);
    $db -> execute();

    $succses=1;
}else{
    // echo 'not Successfully'."<br>";

}};
?>

    <!-- MAIN CONTENT-->
    <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                        <div class="col-lg-9 m-auto">
                                <div class="card">
                                    <div class="card-header">ADD CATEGORY</div>
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

                                        <form action="" method="post" class="" enctype="multipart/form-data">
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                    <i class="zmdi zmdi-view-agenda"></i>
                                                    </div>
                                                    <input type="text" id="email" name="name" placeholder="Category Name" class="form-control">
                                                </div>
                                                <div class="row form-group m-3">
                                                    <div class="col col-md-3">
                                                        <label for="file-input" class=" form-control-label"> image category</label>
                                                    </div>
                                                    <div class="col-12 col-md-9">
                                                        <input type="file" id="file-input" name="file" class="form-control-file" autocomplete="off">
                                                    </div>
                                                    <?php if( !empty ($error_image) ){echo "<p>$error_image</p>"; }?>

                                                </div>
                                            </div>
                                            <div class="form-actions form-group">
                                                <button type="submit" class="btn btn-success btn-m " name="submit">Submit</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
<?php include('./includes/footer.php');?>
