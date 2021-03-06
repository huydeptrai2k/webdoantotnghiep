<?php include("../../autoload/autoload.php") ?>
<?php

    // $category = $db->fetchAll("category");

    $open = "slide";
    if( $level[0]['level']=="1"){
        header("location: /doantotnghiep/admin/modules/news/");
    }
    if ($_SERVER["REQUEST_METHOD"]== "POST"){
        $data = [
            "title" => postInput('title'),
            "content" => postInput('content')
      
        ];

        $error = [];
       

        if(!isset($_FILES['thunbar'])){
            $error['thunbar'] = "Mời bạn chọn hình ảnh";
        }

        // error trong cla khong co loi
        if(empty($error)){

            if(isset($_FILES['thunbar'])){
                $file_name = $_FILES['thunbar']['name'];
                $file_tmp = $_FILES['thunbar']['tmp_name'];
                $file_type = $_FILES['thunbar']['type'];
                $file_error = $_FILES['thunbar']['error'];

                if($file_error ==0){
                    $part = ROOT ."slide/";
                    $data['thunbar'] = $file_name;
                }
            }

            $id_insert = $db->insert("slide",$data);
            if($id_insert){

                move_uploaded_file($file_tmp,$part.$file_name);
                $_SESSION['success']= "Thêm mới thành công";
                redirectAdmin("slide");
            }else{
                $_SESSION['error']= "Thêm mới thất bại";
            }
           
           
        }
    }


?>
<?php include("../../layouts/header.php") ?>
<div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                       <div class="nav-tittle" style="margin-left:5%">
                       <h2 class="mt-4">Thêm mới </h2>
                       </div>
                        <ol class="breadcrumb mb-4" style="margin-left:5%">
                            <li class="breadcrumb-item"><a href="index.html">Bảng điều khiển</a></li>
                            <li class="breadcrumb-item"><a href="">Thanh trượt</a></li>
                            <li class="breadcrumb-item active">Thêm mới</li>
                        </ol>
                        <div class="clearfix" style="margin-left:5%">
                            <?php include("../../../partials/notification.php") ?>
                        </div>
                        <div class="row" style="margin-left:5%">
                            <div class="col-md-6">
                               <form action="" method="POST" enctype="multipart/form-data">
                                <div class="form-group ">
                                   <form>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Tiêu đề</label>
                                            <input type="text" class="form-control" id="product" aria-describedby="" placeholder=" Đây là đài tiếng nói Việt Nam" name="title">
                                            <?php 
                                            if(isset($error['title'])) : ?>
                                                <p class="text-danger"><?php echo $error['title'] ?></p>
                                           <?php endif ?>
                                            
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Nội dung </label>
                                            <input type="text" class="form-control" id="product" aria-describedby="" placeholder=" Đây là đài tiếng n ói  ..........." name="content">
                                            <?php 
                                            if(isset($error['content'])) : ?>
                                                <p class="text-danger"><?php echo $error['content'] ?></p>
                                           <?php endif ?>
                                            
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Hình ảnh</label>
                                            <input type="file" class="form-control" aria-describedby="" placeholder="" name="thunbar" > 
                                            <?php 
                                            if(isset($error['thunbar'])) : ?>
                                                <p class="text-danger"><?php echo $error['thunbar'] ?></p>
                                           <?php endif ?>
                                        </div>

                                        <button type="submit" class="btn btn-success">Thêm</button>
                                    </form>
                                   </div>

                               </form>
                            </div>
                        </div>
                    </div>
                </main>
      
<?php require_once __DIR__. "/../../layouts/footer.php"; ?>