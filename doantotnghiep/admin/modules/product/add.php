<?php include("../../autoload/autoload.php") ?>
<?php

    $category = $db->fetchAll("category");

    $open = "product";
    if ($_SERVER["REQUEST_METHOD"]== "POST"){
        $data = [
            "name" => postInput('name'),
            "price" => postInput('price'),
            "slug" => to_slug(postInput('name')),
            "category_id" => postInput('category_id'),
            "content" => postInput('content'),
            "number" => postInput('number'),
            "sale" => postInput('sale')
        ];

        $error = [];
        if(postInput('name')== ''){
            $error['name'] = "Mời bạn nhập tên sản phẩm";
        }
        if(postInput('price')== ''){
            $error['price'] = "Mời bạn nhập giá sản phẩm";
        }
        if(postInput('category_id')== ''){
            $error['category_id'] = "Mời bạn chọn danh mục sản phẩm";
        }
        if(postInput('content')== ''){
            $error['content'] = "Mời bạn nhập nội dung sản phẩm";
        }
        if(postInput('number')== ''){
            $error['number'] = "Mời bạn nhập nội dung sản phẩm";
        }

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
                    $part = ROOT ."product/";
                    $data['thunbar'] = $file_name;
                }
            }

            $id_insert = $db->insert("product",$data);
            if($id_insert){

                move_uploaded_file($file_tmp,$part.$file_name);
                $_SESSION['success']= "Thêm mới thành công";
                redirectAdmin("product");
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
                       <h2 class="mt-4">Thêm mới sản phẩm</h2>
                       </div>
                        <ol class="breadcrumb mb-4" style="margin-left:5%">
                            <li class="breadcrumb-item"><a href="index.html">Bảng điều khiển</a></li>
                            <li class="breadcrumb-item"><a href="">Sản phẩm</a></li>
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
                                            <label for="exampleInputEmail1">Tên sản phẩm</label>
                                            <input type="text" class="form-control" id="product" aria-describedby="" placeholder="Tên sản phẩm" name="name">
                                            <?php 
                                            if(isset($error['name'])) : ?>
                                                <p class="text-danger"><?php echo $error['name'] ?></p>
                                           <?php endif ?>
                                            
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Giá sản phẩm</label>
                                            <input type="number" class="form-control"  aria-describedby="" placeholder="9.000.000" name="price">
                                            <?php 
                                            if(isset($error['price'])) : ?>
                                                <p class="text-danger"><?php echo $error['price'] ?></p>
                                           <?php endif ?>
                                            
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Giảm giá</label>
                                            <input type="text" class="form-control" aria-describedby="" placeholder="5%" name="sale" value="0">

                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Hình ảnh</label>
                                            <input type="file" class="form-control" aria-describedby="" placeholder="" name="thunbar" > 
                                            <?php 
                                            if(isset($error['thunbar'])) : ?>
                                                <p class="text-danger"><?php echo $error['thunbar'] ?></p>
                                           <?php endif ?>
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Danh mục</label>
                                            <select name="category_id" id="" class="form-control">
                                                <option value="">Mời bạn chọn</option>
                                                <?php
                                                foreach($category as $item): ?>
                                                <option value="<?php echo $item['id']?>"><?php echo $item['name'] ?></option>
                                                <?php endforeach ?>
                                            </select>
                                            <?php 
                                            if(isset($error['category_id'])) : ?>
                                                <p class="text-danger"><?php echo $error['category_id'] ?></p>
                                           <?php endif ?>
                                            
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Số lượng</label>
                                            <input type="number" class="form-control"  aria-describedby="" placeholder="100" name="number">
                                            <?php 
                                            if(isset($error['number'])) : ?>
                                                <p class="text-danger"><?php echo $error['number'] ?></p>
                                           <?php endif ?>
                                            
                                        </div>

                                        <div class="form-group">
                                        		
                                            <label for="exampleInputEmail1">Nội dung</label>
                                            <textarea style="width: 100%;" placeholder="Viết nội dung..." class="form-control" name="content" id="editor1"></textarea>	
                                            <?php 
                                            if(isset($error['content'])) : ?>
                                                <p class="text-danger"><?php echo $error['content'] ?></p>
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