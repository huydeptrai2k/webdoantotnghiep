<?php include("../../autoload/autoload.php") ?>
<?php

if( $level[0]['level']=="1"){
    header("location: /doantotnghiep/admin/modules/news/");
}

    $open = "product";

    $data = [
        "name" => postInput('name'),
        "email" => postInput('email'),
        "phone" => to_slug(postInput('phone')),
        "password" => MD5(postInput('password')),
        "level" => postInput('level'),
        "address" => postInput('address')
    ];
    if ($_SERVER["REQUEST_METHOD"]== "POST"){
      

        $error = [];
        if(postInput('name')== ''){
            $error['name'] = "Mời bạn nhập tên tài khoản";
        }
        if(postInput('email')== ''){
            $error['email'] = "Mời bạn nhập email";
        }else{
            $is_check = $db -> fetchOne("admin"," email = '".$data['email']."' " );
            if($is_check != NULL){
                $error['email'] = "Email đã tồn tại";
            }
        }
        if(postInput('phone')== ''){
            $error['phone'] = "Mời bạn nhập số điện thoại";
        }
        if(postInput('password')== ''){
            $error['password'] = "Mời bạn nhập password";
        }

        if($data['password'] != MD5(postInput("re_password"))){
            $error['password'] = "Mật khẩu không trùng khớp" ;
        }

        if(postInput('level')== ''){
            $error['level'] = "Mời bạn chọn level";
        }
        if(postInput('address')== ''){
            $error['address'] = "Mời bạn nhập địa chỉ";
        }

       

        // error trong cla khong co loi
        if(empty($error)){

          
            $id_insert = $db->insert("admin",$data);
            if($id_insert){

                
                $_SESSION['success']= "Thêm mới thành công";
                redirectAdmin("admin");
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
                       <h2 class="mt-4">Thêm admin</h2>
                       </div>
                        <ol class="breadcrumb mb-4" style="margin-left:5%">
                            <li class="breadcrumb-item"><a href="<?php echo base_url() ?>/admin">Bảng điều khiển</a></li>
                            <li class="breadcrumb-item"><a href="">Tài khoản người quản trị</a></li>
                            <li class="breadcrumb-item active">Thêm mới</li>
                        </ol>
                        <div class="clearfix" style="margin-left:5%">
                            <?php include("../../../partials/notification.php") ?>
                        </div>
                        <div class="row" style="margin-left:5%">
                            <div class="col-md-6">
                               <form action="" method="POST" >
                                <div class="form-group ">
                                   <form>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Tên tài khoản</label>
                                            <input type="text" class="form-control" id="product" aria-describedby="" placeholder="Tên đăng nhập" name="name" >
                                            <?php
                                            if(isset($error['name'])) : ?>
                                                 <p class="text-danger"><?php echo $error['name'] ?></p>
                                            <?php endif ?>

                                       
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Email</label>
                                            <input type="email" class="form-control"  aria-describedby="" placeholder="huyhayho@gmail.com" name="email" >
                                            <?php
                                            if(isset($error['email'])) : ?>
                                                 <p class="text-danger"><?php echo $error['email'] ?></p>
                                            <?php endif ?>

        
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Số điện thoại</label>
                                            <input type="number" class="form-control" aria-describedby="" placeholder="0384559058" name="phone">
                                            <?php
                                            if(isset($error['phone'])) : ?>
                                                 <p class="text-danger"><?php echo $error['phone'] ?></p>
                                            <?php endif ?>

                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Mật khẩu</label>
                                            <input type="password" class="form-control"  aria-describedby="" placeholder="" name="password" >
                                            <?php
                                            if(isset($error['password'])) : ?>
                                                 <p class="text-danger"><?php echo $error['password'] ?></p>
                                            <?php endif ?>

                                           
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Nhập lại mật khẩu</label>
                                            <input type="password" class="form-control"  aria-describedby="" placeholder="" name="re_password" >
                                            <?php
                                            if(isset($error['re_password'])) : ?>
                                                 <p class="text-danger"><?php echo $error['re_password'] ?></p>
                                            <?php endif ?>
                                           
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Chức vụ</label>
                                            <select name="level" id="" class="form-control">
                                                <option value="1">CTV</option>
                                                <option value="2">Admin</option>
                                            </select>   
                                            <?php
                                            if(isset($error['level'])) : ?>
                                                 <p class="text-danger"><?php echo $error['level'] ?></p>
                                            <?php endif ?> 
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Địa chỉ</label>
                                            <input type="text" class="form-control"  aria-describedby="" placeholder="175 Tây Sơn - Đống Đa - Hà Nội" name="address" >
                                            <?php
                                            if(isset($error['address'])) : ?>
                                                 <p class="text-danger"><?php echo $error['address'] ?></p>
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