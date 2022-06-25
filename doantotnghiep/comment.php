<?php 
   require_once __DIR__. "/autoload/autoload.php";

   if(!isset($_SESSION['name_user'])){
       echo "<script type='text/javascript'>location.href='dang-nhap.php';</script>";
   }else{
    $data = [
        'comment' => postInput('comment'),
        'id_user' => postInput('id_user'),
        'id_product' => postInput('id_product'),
        'name'  => postInput('name')
    ];
    $error = [];
    if($_SERVER["REQUEST_METHOD"]== "POST"){
        if($data['comment']==''){
            $error['comment'] = " Bạn chưa nhập nội dung !";
        }
        if(empty($data['error'])){

            $insert = $db->insert("comments",$data);
            if($insert > 0){
                header('Location: ' . $_SERVER['HTTP_REFERER']);
            }

        }


        
    }
   
   }
?>

