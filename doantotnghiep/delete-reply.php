<?php
    require_once __DIR__. "/autoload/autoload.php";
    $id = intval(getInput('id'));
    $Edit = $db->fetchID("reply",$id);
    if (empty($Edit)) {
        $_SESSION['error'] = "Dữ liệu không tồn tại";
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
    $num = $db->delete("reply",$id);
    if($num > 0)
    {
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
    else {
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
 ?>