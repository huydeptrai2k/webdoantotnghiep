<?php include("../../autoload/autoload.php") ?>
<?php

    // $category = $db->fetchAll("category");

    $open = "slide";
    if( $level[0]['level']=="1"){
        header("location: /doantotnghiep/admin/modules/news/");
    }
    $id = intval(getInput('id'));

    $EditSlide = $db ->fetchID("slide",$id);
    if(empty($EditSlide)){
        $_SESSION['error'] = "Dữ liệu không tồn tại" ;
        redirectAdmin("slide");
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

            $update = $db ->update("slide",$data,array("id"=>$id));
            if($update >0){

                
                move_uploaded_file($file_tmp,$part.$file_name);
                $_SESSION['success']= "Cập nhật thành công";
                redirectAdmin("slide");

            }else{
                $_SESSION['error']= "Dữ liệu không thay đổi";
                redirectAdmin("slide");
            }
            
           
        }
    }


?>
<?php include("../../layouts/header.php") ?>
<div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                       <div class="nav-tittle" style="margin-left:5%">
                       <h2 class="mt-4">Sửa slide</h2>
                       </div>
                        <ol class="breadcrumb mb-4" style="margin-left:5%">
                            <li class="breadcrumb-item"><a href="index.html">Bảng điều khiển</a></li>
                            <li class="breadcrumb-item"><a href="#">Thanh trượt</a></li>
                            <li class="breadcrumb-item active">Sửa</li>
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
                                            <input type="text" class="form-control" id="" aria-describedby="" placeholder=" Đây là đài tiếng nói Việt Nam" name="title"
                                            value="<?php echo $EditSlide['title']?>">
                                            <?php 
                                            if(isset($error['title'])) : ?>
                                                <p class="text-danger"><?php echo $error['title'] ?></p>
                                           <?php endif ?>
                                            
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Nội dung</label>
                                            <input type="text" class="form-control" id="" aria-describedby="" placeholder=" Đây là đài tiếng n ói  ..........." name="content"
                                           value="<?php echo $EditSlide['content']?>">
                                            <?php 
                                            if(isset($error['summary'])) : ?>
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
                                           <img src="<?php echo asset_uploads() ?>slide/<?php echo $EditSlide['thunbar']?>" alt="" width="80px" height="70px">
                                        </div>

                                        <button type="submit" class="btn btn-success">Sửa</button>
                                    </form>
                                   </div>

                               </form>
                            </div>
                        </div>
                    </div>
                </main>
      
<?php require_once __DIR__. "/../../layouts/footer.php"; ?>