<?php 
    require_once __DIR__. "/autoload/autoload.php";

    $key = intval(getInput('key')); //id san pham
    $qty = intval(getInput('qty'));

    // $sql = "SELECT number FROM product WHERE product.id = $key";
    // $qtypro = $db->fetchsql($sql);
    $qtypro = $db->fetchID("product",$key);
    if($qtypro['number'] < $qty){
     echo 0;
    }else{
        $_SESSION['cart'][$key]["qty"] = $qty;
        echo 1;
    }


?>