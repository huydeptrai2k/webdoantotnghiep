<?php 
    $open = "slide";
    include("../../autoload/autoload.php");

    $id = intval(getInput('id'));

    $EditSlide = $db ->fetchID("slide",$id);
    if(empty($EditSlide)){
        $_SESSION['error'] = "Dữ liệu không tồn tại" ;
        redirectAdmin("slide");
    }

    $home =$EditSlide['home'] == 0 ? 1 :0;
    $update = $db ->update("slide",array("home"=>$home),array("id"=>$id));
    if($update > 0){

        $_SESSION['success'] = " Cập nhật thành công";
        redirectAdmin("slide");
    }else{
        $_SESSION['error'] = "Dữ liệu không thay đổi";
        redirectAdmin("slide");
    }
?>