<?php include("../../autoload/autoload.php") ?>
<?php
    $open = "product";
    if( $level[0]['level']=="1"){
        header("location: /doantotnghiep/admin/modules/news/");
    }
    $category = $db->fetchAll("category");
    
    $id = intval(getInput('id'));

    $EditProduct = $db ->fetchID("product",$id);
    if(empty($EditProduct)){
        $_SESSION['error'] = "Dữ liệu không tồn tại" ;
        redirectAdmin("product");
    }

   
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

            $update = $db ->update("product",$data,array("id"=>$id));
            if($update >0){

                
                move_uploaded_file($file_tmp,$part.$file_name);
                $_SESSION['success']= "Cập nhật thành công";
                redirectAdmin("product");

            }else{
                $_SESSION['error']= "Dữ liệu không thay đổi";
                redirectAdmin("product");
            }
            
           
        }
    }


?>
<?php include("../../layouts/header.php") ?>
<div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                       <div class="nav-tittle" style="margin-left:5%">
                       <h2 class="mt-4">Sửa thông tin sản phẩm</h2>
                       </div>
                        <ol class="breadcrumb mb-4" style="margin-left:5%">
                            <li class="breadcrumb-item"><a href="index.html">Bảng điều khiển</a></li>
                            <li class="breadcrumb-item"><a href="">Sản phẩm</a></li>
                            <li class="breadcrumb-item active">Sửa thông tin</li>
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
                                            <input type="text" class="form-control" id="product" aria-describedby="" placeholder="Tên sản phẩm" name="name" 
                                            value="<?php echo $EditProduct['name']?>">
                                            <?php 
                                            if(isset($error['name'])) : ?>
                                                <p class="text-danger"><?php echo $error['name'] ?></p>
                                           <?php endif ?>
                                            
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Giá sản phẩm</label>
                                            <input type="number" class="form-control"  aria-describedby="" placeholder="9.000.000" name="price" 
                                            value="<?php echo $EditProduct['price']?>">
                                            <?php 
                                            if(isset($error['price'])) : ?>
                                                <p class="text-danger"><?php echo $error['price'] ?></p>
                                           <?php endif ?>
                                            
                                       
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Giảm giá</label>
                                            <input type="text" class="form-control" aria-describedby="" placeholder="5%" name="sale" value="<?php echo $EditProduct['sale']?>">

                                        </div>
                                        </div> <div class="form-group">
                                            <label for="exampleInputEmail1">Số lượng sản phẩm</label>
                                            <input type="number" class="form-control"  aria-describedby="" placeholder="100" name="number" 
                                            value="<?php echo $EditProduct['number']?>">
                                           
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Hình ảnh</label>
                                            <input type="file" class="form-control" aria-describedby="" placeholder="" name="thunbar" > 
                                            <?php 
                                            if(isset($error['thunbar'])) : ?>
                                                <p class="text-danger"><?php echo $error['thunbar'] ?></p>
                                           <?php endif ?>
                                           <img src="<?php echo asset_uploads() ?>product/<?php echo $EditProduct['thunbar']?>" alt="" width="80px" height="70px">
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Danh mục</label>
                                            <select name="category_id" id="" class="form-control">
                                                <option value="">Mời bạn chọn</option>
                                                <?php
                                                foreach($category as $item): ?>
                                                <option value="<?php echo $item['id']?>" <?php echo $EditProduct['category_id']==$item['id']
                                                ? "selected = 'selected'" :'' ?>><?php echo $item['name'] ?></option>
                                                <?php endforeach ?>
                                            </select>
                                            <?php 
                                            if(isset($error['category'])) : ?>
                                                <p class="text-danger"><?php echo $error['category'] ?></p>
                                           <?php endif ?>
                                            
                                        </div>

                                        <div class="form-group">
                                        		
                                                <label for="exampleInputEmail1">Nội dung</label>
                                                <textarea style="width: 100%;" placeholder="Viết nội dung..."  class="form-control" 
                                                name="content" id="editor1" ><?php echo $EditProduct['content']?></textarea>	
                                                <?php 
                                                if(isset($error['content'])) : ?>
                                                    <p class="text-danger"><?php echo $error['content'] ?></p>
                                               <?php endif ?>
                                                
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