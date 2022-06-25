<?php 
       require_once __DIR__. "/autoload/autoload.php";
    session_start();
    unset($_SESSION['admin_name']);
    unset($_SESSION['admin_id']);
    header("location: index.php");



?>