<?php 
    session_start();
    // define('ROOT_PATH',realpath(dirname(__FILE__)));
    // define('BASE_URL', "http://localhost:8000/doantotnghiep");
    require_once __DIR__."/../libraries/database.php";
    require_once __DIR__."/../libraries/function.php";
    $db = new Database;

    define("ROOT",$_SERVER['DOCUMENT_ROOT'] . "/doantotnghiep/asset/uploads/");




    $category = $db->fetchAll("category");

    // Lấy danh sách sản phẩm mới của thư mục 

    $sqlNew = "SELECT * FROM product WHERE 1 ORDER BY ID DESC LIMIT 10";
    $productNew = $db->fetchsql($sqlNew);

    $sqlPay = "SELECT * FROM product WHERE 1 ORDER BY PAY DESC LIMIT 10";
    $productPay = $db->fetchsql($sqlPay);
?>