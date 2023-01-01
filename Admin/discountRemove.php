
    <?php require('../config.php');  ?>

<?php


$id=$_GET['id'];

if(isset($_GET['id'])){


$result = crud::connect()->prepare("UPDATE products SET discount = '0' WHERE id = :id");
$result ->bindValue(':id', $id);
$result->execute();

$result2 = crud::connect()->prepare("UPDATE products SET new_Price = '0' WHERE id = :id");
$result2->bindValue(':id', $id);
$result2->execute();

header('location:./discount.php');

}
?>

