<?php 
    $open = "user";
    include("../../autoload/autoload.php");

    $id = intval(getInput('id'));

    $EditUser = $db ->fetchID("users",$id);
    if(empty($EditUser)){
        $_SESSION['error'] = "Dữ liệu không tồn tại" ;
        redirectAdmin("user");
    }

    $status =$EditUser['status'] == 0 ? 1 :0;
    $update = $db ->update("users",array("status"=>$status),array("id"=>$id));
    if($update > 0){

        $_SESSION['success'] = " Cập nhật thành công";
        unset($_SESSION['name_user']);
        unset($_SESSION['name_id']);
        unset($_SESSION['cart']);
        unset($_SESSION['sosp']);
        redirectAdmin("user");
    }else{
        $_SESSION['error'] = "Dữ liệu không thay đổi";
        redirectAdmin("user");
    }
?>