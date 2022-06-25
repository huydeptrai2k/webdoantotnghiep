<?php include("../../autoload/autoload.php") ?>
<?php
    $open = "category";
    if ($_SERVER["REQUEST_METHOD"]== "POST"){
        $data = [
            "name" => postInput('name'),
            "slug" => to_slug(postInput('name'))
        ];

        $error = [];
        if(postInput('name')== ''){
            $error['name'] = "Mời bạn nhập đầy đủ tên danh mục";
        }
        if(!isset($_FILES['thunbar'])){
            $error['thunbar'] = "Mời bạn chọn hình ảnh";
        }

        // error trong cla khong co loi
        if(empty($error)){

            $isset = $db ->fetchOne("category","name ='".$data['name']."' ");
            if(count($isset) > 0){
                $_SESSION['error'] = "Tên danh mục đã tồn tại !";
            }else{
                
                if(isset($_FILES['thunbar'])){
                    $file_name = $_FILES['thunbar']['name'];
                    $file_tmp = $_FILES['thunbar']['tmp_name'];
                    $file_type = $_FILES['thunbar']['type'];
                    $file_error = $_FILES['thunbar']['error'];

                    if($file_error ==0){
                        $part = ROOT ."category/";
                        $data['banner'] = $file_name;
                    }
                }
            
                $id_insert = $db -> insert("category",$data);
                // print_r($id_insert);
    
                if($id_insert > 0){
                    move_uploaded_file($file_tmp,$part.$file_name);
                    $_SESSION['success']= "Thêm mới thành công";
                    redirectAdmin("category");
                }else{
                    $_SESSION['error'] = "Thêm mới thất bại";
                }

             }
           
        }
    }


?>
<?php include("../../layouts/header.php") ?>
<div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                       <div class="nav-tittle" style="margin-left:5%">
                       <h2 class="mt-4">Danh mục sản phẩm</h2>
                       </div>
                        <ol class="breadcrumb mb-4" style="margin-left:5%">
                            <li class="breadcrumb-item"><a href="<?php echo base_url() ?>/admin">Bảng điều khiển</a></li>
                            <li class="breadcrumb-item"><a href="#">Danh mục</a></li>
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
                                            <label for="exampleInputEmail1">Tên danh mục</label>
                                            <input type="text" class="form-control" id="danhmuc" aria-describedby="" placeholder="Tên danh mục" name="name">
                                            <?php 
                                            if(isset($error['name'])) : ?>
                                                <p class="text-danger"><?php echo $error['name'] ?></p>
                                           <?php endif ?>
                                            
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Ảnh bìa danh mục</label>
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