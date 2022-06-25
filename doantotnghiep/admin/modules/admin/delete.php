<?php include("../../autoload/autoload.php") ?>
<?php
    $open = "admin";

    $id = intval(getInput('id'));

    $EditAdmin = $db ->fetchID("admin",$id);
    if(empty($EditAdmin)){
        $_SESSION['error'] = "Dữ liệu không tồn tại" ;
        redirectAdmin("admin");
    }

     $num = $db ->delete("admin",$id);
     if($num > 0){
        $_SESSION['success'] = " Xóa thành công";
        redirectAdmin("admin");
        return true;
     }else{
        $_SESSION['error'] = " Xóa thất bại";
        redirectAdmin("admin");
        return false;
     }
 

?>