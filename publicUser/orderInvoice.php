<?php session_start();?>
<?php require('../config.php');?>
<?php



$lastOrder=$_SESSION['last_order'];

$sql="SELECT products.productName,products.new_Price,products.discount,order_details.quantity,order_details.price
FROM products
INNER JOIN order_details
ON order_details.product_id=products.id
WHERE order_details.order_id=:id";

$db=crud::connect()->prepare($sql);
$db->bindValue(':id',$lastOrder);
$db->execute();
$data= $db->fetchAll(PDO::FETCH_ASSOC);


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/invoic.css" type="text/css">

    <title>orderInvoice</title>
</head>
<body>
<table class="body-wrap">
    <tbody><tr>
        <td></td>
        <td class="container" width="600">
            <div class="content">
                <table class="main" width="100%" cellpadding="0" cellspacing="0">
                    <tbody><tr>
                        <td class="content-wrap aligncenter">
                            <table width="100%" cellpadding="0" cellspacing="0">
                                <tbody><tr>
                                    <td class="content-block">
                                        <h2>Thanks for using our website</h2>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="content-block">
                                        <table class="invoice">
                                            <tbody><tr>
                                                <td><?php echo $_SESSION['name']; ?> <br><?php $date = date('m/d/Y h:i:s a', time());  echo $date; ?></td>
                                            </tr>
                                            <tr>
                                                
                                                <td>
                                                    <table class="invoice-items" cellpadding="0" cellspacing="0">
                                                        <tbody>
                                                            <tr>
                                                                <th>Product name</th>
                                                                <th class="alignright">Price</th>
                                                            </tr>
                                                            <?php $total=0;?>
                                                         <?php  foreach($data as $value):?> 
                                                            <?php if($value['discount']== 0){?>


                                                        <tr>
                                                            <td><?php echo $value['productName']; ?> <span style="color:red;">  *<?php echo $value['quantity']; ?> </span></td>
                                                            <td class="alignright"> <?php echo $value['price']*$value['quantity']; ?> JD</td>
                                                        </tr>

                                                        <?php $total+= $value['price']*$value['quantity'];?>
                                                        <?php }else{?>

                                                            

                                                        <tr>
                                                            <td><?php echo $value['productName']; ?> <span style="color:red;">  *<?php echo $value['quantity']; ?> </span></td>
                                                            <td class="alignright"> <?php echo $value['new_Price']*$value['quantity']; ?> JD</td>
                                                        </tr>

                                                        <?php $total+= $value['new_Price']*$value['quantity'];?>


                                                            <?php }?>

                                                        <?php endforeach;?>
                                                    
                                                        <tr class="total">
                                                            <td class="alignright" width="80%">Total</td>
                                                            <td class="alignright"><?php echo $total?> JD</td>
                                                        </tr> 
                                                    </tbody></table>
                                                </td>
                                            </tr>
                                        </tbody></table>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="content-block">
                                      <?php if($total>50 && $total<200){
                                        echo "<p style='color:red;margen:0'>Congratulations you earned the free shipping !";
                                        echo "<p style='color:red;margen:0'>thank you for shopping with us</p>";
                                      }
                                      ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="content-block">
                                      <?php if($total>200){
                                        echo "<p style='color:red;margen:0'>Congratulations you earned the free shipping";
                                        echo "<p style='color:red;'> And entered the monthly prize draw !</p>";
                                        echo "<p style='color:red;margen:0'>thank you for shopping with us</p>";
                                      }
                                      ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="content-block">
                                        <a href="./index.php">Home page</a>
                                    </td>
                                </tr>
                                <tr>
                                    <!-- <td class="content-block">
                                        Company Inc. 123 Van Ness, San Francisco 94102
                                    </td> -->
                                </tr>
                            </tbody></table>
                        </td>
                    </tr>
                </tbody></table>
                <div class="footer">
                    <table width="100%">
                        <tbody><tr>
                            <td class="aligncenter content-block">Questions?  <a href="./contact.php">contact page</a></td>
                        </tr>
                    </tbody></table>
                </div></div>
        </td>
        <td></td>
    </tr>
</tbody></table>
</body>
</html>