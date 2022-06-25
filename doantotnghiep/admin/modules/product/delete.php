<?php include("../../autoload/autoload.php") ?>
<?php
    $open = "product";

    $id = intval(getInput('id'));

    $EditProduct = $db ->fetchID("product",$id);
    if(empty($EditProduct)){
        $_SESSION['error'] = "Dữ liệu không tồn tại" ;
        redirectAdmin("product");
    }

     $num = $db ->delete("product",$id);
     if($num > 0){
        $_SESSION['success'] = " Xóa thành công";
        redirectAdmin("product");
        return true;
     }else{
        $_SESSION['error'] = " Xóa thất bại";
        redirectAdmin("product");
        return false;
     }
 

?>