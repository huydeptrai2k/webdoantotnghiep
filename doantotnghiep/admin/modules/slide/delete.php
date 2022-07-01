<?php include("../../autoload/autoload.php") ?>
<?php
    $open = "slide";
    if( $level[0]['level']=="1"){
      header("location: /doantotnghiep/admin/modules/news/");
  }
    $id = intval(getInput('id'));

    $EditProduct = $db ->fetchID("slide",$id);
    if(empty($EditProduct)){
        $_SESSION['error'] = "Dữ liệu không tồn tại" ;
        redirectAdmin("slide");
        return true;
    }

     $num = $db ->delete("slide",$id);
     if($num > 0){
        $_SESSION['success'] = " Xóa thành công";
        redirectAdmin("slide");
     }else{
        $_SESSION['error'] = " Xóa thất bại";
        redirectAdmin("slide");
        return false;
     }
 

?>