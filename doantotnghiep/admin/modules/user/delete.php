<?php include("../../autoload/autoload.php") ?>
<?php
    $open = "user";

    $id = intval(getInput('id'));

    $EditUser = $db ->fetchID("users",$id);
    if(empty($EditUser)){
        $_SESSION['error'] = "Dữ liệu không tồn tại" ;
        redirectAdmin("user");
    }

     $num = $db ->delete("users",$id);
     if($num > 0){
        $_SESSION['success'] = " Xóa thành công";
        redirectAdmin("user");
        return true;
     }else{
        $_SESSION['error'] = " Xóa thất bại";
        redirectAdmin("user");
        return false;
     }
 

?>