<?php 
       require_once __DIR__. "/autoload/autoload.php";
    session_start();
    unset($_SESSION['name_user']);
    unset($_SESSION['name_id']);
    unset($_SESSION['cart']);
    unset($_SESSION['sosp']);
    redirectWeb("index.php");



?>