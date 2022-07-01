<?php include("../../autoload/autoload.php") ?>
<?php
    $open = "transaction";
    if( $level[0]['level']=="1"){
        header("location: /doantotnghiep/admin/modules/news/");
    }
    $id = intval(getInput('id'));
   
    $EditTransaction = $db ->fetchID("transaction",$id);
    if(empty($EditTransaction)){
        $_SESSION['error'] = "Dữ liệu không tồn tại" ;
        redirectAdmin("transaction");
    }
    // $sql = "SELECT status FROM transaction WHERE id = $id";
    // $status = $db->fetchsql($sql);
    // if($status['status'] ==1){
    $num = $db ->delete("transaction",$id);
     if($num > 0){
        $_SESSION['success'] = " Xóa thành công";
        redirectAdmin("transaction");
        return true;
     }else{
        $_SESSION['error'] = " Xóa thất bại";
        redirectAdmin("transaction");
        return false;
     }
    // }else{
    //     $_SESSION['error'] = " Bạn không thể xóa đơn hàng đã xử lý";
    //     redirectAdmin("transaction"); 
    // }
     
 

?>