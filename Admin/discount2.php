
<?php
 require('../config.php');
include('./includes/header.php');
?>
 

  <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-header">Discount</div>
                                    <div class="card-body card-block">
                                        <form action="" method="post" class="">
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                        <span>Add New Price</span>
                                                    </div>
                                                    <input type="text" id="username" name="newprice" placeholder="Amount" class="form-control">
                                                </div>
                                            </div>
                                            <div class="form-actions form-group">
                                                <button type="submit" name="Confirm" class="btn btn-success btn-sm">Confirm</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

<?php

                        $id=$_GET['id'];

                        if(isset($_POST['Confirm'])){

                                $newPrice=$_POST['newprice'];

                        $result = crud::connect()->prepare("UPDATE products SET discount = '1' WHERE id = :id");
                        $result ->bindValue(':id', $id);
                        $result->execute();
                        
                        $result2 = crud::connect()->prepare("UPDATE products SET new_Price = :Nprice WHERE id = :id");
                        $result2->bindValue(':Nprice', $newPrice);
                        $result2->bindValue(':id', $id);
                        $result2->execute();
                        // header('location:./discount.php');        
                        echo "<script>window.location='discount.php'</script>";
                       
                        }

include("./includes/footer.php");
?>



                        
        