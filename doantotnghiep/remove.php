<?php 
    require_once __DIR__. "/autoload/autoload.php";

    $key = intval(getInput('key'));
    unset($_SESSION['cart'][$key]);
    unset($_SESSION['sosp']);
    $_SESSION['success'] = " xóa sản phẩm trong giỏ";
    redirectWeb("gio-hang.php");

?>
