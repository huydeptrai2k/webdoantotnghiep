<?php include("../../autoload/autoload.php");

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
    if($EditTransaction['status']==1){
        $_SESSION['error'] = "Đơn hàng đã được xử lý rồi" ;
        redirectAdmin("transaction");
    }

    $status = 1;
    $update = $db ->update("transaction",array("status"=>$status),array("id"=>$id));
    if($update > 0){

        $_SESSION['success'] = " Cập nhật thành công";

        $sql = "SELECT product_id ,qty FROM orders WHERE transaction_id = $id";
        $order = $db->fetchsql($sql);

        foreach( $order as $item){
            // echo $item['product_id'];
            $idproduct = intval($item['product_id']);
            //lay san pham 
            $product = $db->fetchID("product",$idproduct);
            // so luong bang so luong cu tru so da ban
            $number = $product['number'] - $item['qty'];
            // cap nhat lai
            $update_pro = $db->update("product",array("number"=>$number,"pay"=>$product['pay']+1),array("id"=>$idproduct));
        }

        redirectAdmin("transaction");
    }else{
        $_SESSION['error'] = "Dữ liệu không thay đổi";
        redirectAdmin("transaction");
    }
?>