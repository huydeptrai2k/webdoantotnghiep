<?php include("../../autoload/autoload.php") ?>
<?php
    $open = "category";

    $id = intval(getInput('id'));

    $EditCategory = $db ->fetchID("category",$id);
    if(empty($EditCategory)){
        $_SESSION['error'] = "Dữ liệu không tồn tại" ;
        redirectAdmin("category");
    }
    // Kiểm tra danh mục có chứa sản phẩm không

    $is_product = $db->fetchOne("product"," category_id = $id ");
    if($is_product == NULL){
      $num = $db->delete("category",$id);
       if($num > 0){
        $_SESSION['success'] = " Xóa thành công";
        redirectAdmin("category");
        return true;
       }else{
        $_SESSION['error'] = " Xóa thất bại";
        redirectAdmin("category");
        return false;
       }
 
    }else{
      $_SESSION['error'] = " Danh mục đã có sản phẩm ! bạn không thể xóa";
      redirectAdmin("category");
      return false;
    }

     

?>