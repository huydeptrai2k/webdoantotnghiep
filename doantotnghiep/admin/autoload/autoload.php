<?php 
    session_start();
    // define('ROOT_PATH',realpath(dirname(__FILE__)));
    // define('BASE_URL', "http://localhost:8000/doantotnghiep");
    require_once __DIR__."/../../libraries/database.php";
    require_once __DIR__."/../../libraries/function.php";
    $db = new Database;

    if(!isset($_SESSION['admin_id'])){
        header("location: /doantotnghiep/login/");
    }
    $id_Admin = intval($_SESSION['admin_id']);
    $sqlLevel = "SELECT level FROM admin WHERE id =$id_Admin";
    $level = $db->fetchsql($sqlLevel);
    

    define("ROOT",$_SERVER['DOCUMENT_ROOT'] . "/doantotnghiep/asset/uploads/");
?>