<?php 
   require_once __DIR__. "/autoload/autoload.php";

   $id = intval(getInput('id'));

   if(!isset($_SESSION['name_id'])){
    echo "<script> alert('Bạn phải đăng nhập tài khoản thì mới thực hiện được chức năng này');location.href='index.php'; </script>";
}

   //lay chi tiet san pham

   $product = $db->fetchID("product",$id);
   
   // kiem tra neu ton tai gio hang thi cap nhat lại
   
   //hoặc tạo moi
   if(!isset($_SESSION['cart'][$id])){

       // Tao moi gio hang
        $_SESSION['cart'][$id]['name']= $product['name'];
        $_SESSION['cart'][$id]['thunbar']= $product['thunbar'];
        $_SESSION['cart'][$id]['qty']= 1;

        if($product['sale']  > 0){
            $_SESSION['cart'][$id]['price'] = $product['price']*(100 - $product['sale'])/100;
        }else{
            $_SESSION['cart'][$id]['price'] = $product['price'];
        }
       

   }else{

       //cap nhat lai go hang
       $_SESSION['cart'][$id]['qty'] += 1;
       $_SESSION['sosp'] +=1;


   }
//    echo "<script> alert('Thêm sản phẩm thành công');location.href='gio-hang.php'; </script>";
   redirectWeb("gio-hang.php")

?>