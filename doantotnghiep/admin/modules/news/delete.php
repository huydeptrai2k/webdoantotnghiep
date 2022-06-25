<?php include("../../autoload/autoload.php") ?>
<?php
    $open = "news";

    $id = intval(getInput('id'));

    $EditProduct = $db ->fetchID("news",$id);
    if(empty($EditProduct)){
        $_SESSION['error'] = "Dữ liệu không tồn tại" ;
        redirectAdmin("news");
    }

     $num = $db ->delete("news",$id);
     if($num > 0){
        $_SESSION['success'] = " Xóa thành công";
        redirectAdmin("news");
        return true;
     }else{
        $_SESSION['error'] = " Xóa thất bại";
        redirectAdmin("news");
        return false;
     }
 

?>