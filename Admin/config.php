<?php


class crud{

    public static function connect(){
        try{

        $con=new PDO('mysql:localhost=localhost;dbname=brighteyes','root','');

       
        return $con;

    }catch(PDOException $error){

        echo 'the error ' . $error->getMessage();


    }

    
   
}


public static function selectorder(){
    $data = array();
    $con=crud::connect()->prepare("SELECT * FROM orders");
    $con->execute();
    $data= $con->fetchAll(PDO::FETCH_ASSOC);
    return  $data;
}

public static function delete(){
    $con=crud::connect()->prepare("UPDATE products SET is_deleted = '1' WHERE id = :id");
    return    $con;
}

public static function selectProduct(){
    $data = array();
    $con=crud::connect()->prepare("SELECT * FROM products");
    $con->execute();
    $data= $con->fetchAll(PDO::FETCH_ASSOC);
    return  $data;
}

public static function deleteProduct($id){

    $con=crud::connect()->prepare("DELETE FROM products WHERE id = :id");
    $con->bindValue(':id', $id);
    $con->execute();

}
 

}


