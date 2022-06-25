<?php 
   require_once __DIR__. "/autoload/autoload.php";

   if(isset($_SESSION['name_user'])){
       echo "<script>alert('Bạn đã đăng ký tài khoản rồi');location.href='index.php' </script>";
   }
 
   
    $data = [
        'name' => postInput("name"),
        'email' => postInput("email"),
        'password' =>postInput("password"),
        'phone' => postInput("phone"),
        'address' => postInput("address")

    ];

   // xử lý

   
   if($_SERVER["REQUEST_METHOD"]=="POST"){
      
       if($data['name'] ==''){
           $error['name'] = "Tên không được để trống !";
       }
        
        if($data['email'] ==''){
            $error['email'] = "Email không được để trống !";
        }else{
            $is_check = $db->fetchOne("users","email = '".$data['email']."' ");
            if($is_check != NULL){
                $error['email'] = "Địa chỉ email đã tồn tại mời bạn nhập email khác";
            }
        }
        
        if($data['password'] ==''){
            $error['password'] = "Mật khẩu không được để trống !";
        }else{
            $data['password'] = MD5(postInput("password"));
        }
       
        if($data['phone'] ==''){
            $error['phone'] = "Số điện thoại không được để trống !";
        }
       
        if($data['address'] ==''){
            $error['address'] = "Địa chỉ không được để trống !";
        }

        //Kiểm tra mảng error

        if(empty($error)){

            //insert

            $idInsert = $db->insert("users",$data);
            if($idInsert > 0){
                 
                $_SESSION['success']= "Đăng ký thành công ! Mời bạn đăng nhập";
                redirectWeb("dang-nhap.php");
                unset( $_SESSION['success']);
                
            }else{
                $_SESSION['error']= "Đăng ký thất bại";
                
            }
            
        }
   }


?>

<?php require_once __DIR__. "/layouts/header.php"; ?>
    <div class="col-md-9 bor" style="margin-bottom:2%">

        <section class="box-main1">
                
                <h3 class="title-main">
                    <a href="" style="text-decoration: none"> Đăng ký tài khoản  </a>
                    <p style="margin-bottom: -14px; margin-top: -3px" class="arrow">
                </h3>
                <div class="clearfix" style="margin-top:2%">
                            <?php include("partials/notification.php") ?>
                        </div>
                        <div class="row" style="margin-left:2%">
                            <div class="col-md-8">
                               <form action="" method="POST" >
                                <div class="form-group ">
                                   <form>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Tên tài khoản</label>
                                            <input type="text" class="form-control" id="product" aria-describedby="" placeholder="Tên đăng nhập"
                                             name="name" value="<?php echo  $data['name'] ?>" >
                                            <?php
                                            if(isset($error['name'])) : ?>
                                                 <p class="text-danger"><?php echo $error['name'] ?></p>
                                            <?php endif ?>

                                       
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Email</label>
                                            <input type="email" class="form-control"  aria-describedby="" placeholder="huyhayho@gmail.com"
                                             name="email" value="<?php echo  $data['email']?>"  >
                                            <?php
                                            if(isset($error['email'])) : ?>
                                                 <p class="text-danger"><?php echo $error['email'] ?></p>
                                            <?php endif ?>

        
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Số điện thoại</label>
                                            <input type="number" class="form-control" aria-describedby="" placeholder="0384559058" 
                                            name="phone" value="<?php echo  $data['phone'] ?>" >
                                            <?php
                                            if(isset($error['phone'])) : ?>
                                                 <p class="text-danger"><?php echo $error['phone'] ?></p>
                                            <?php endif ?>

                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Mật khẩu</label>
                                            <input type="password" class="form-control"  aria-describedby="" placeholder="***********"
                                             name="password" value="<?php echo  $data['password'] ?>"  >
                                            <?php
                                            if(isset($error['password'])) : ?>
                                                 <p class="text-danger"><?php echo $error['password'] ?></p>
                                            <?php endif ?>

                                           
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Địa chỉ</label>
                                            <input type="text" class="form-control"  aria-describedby="" placeholder="175 Tây Sơn - Đống Đa - Hà Nội" 
                                            name="address"  value="<?php echo  $data['address'] ?>" >
                                            <?php
                                            if(isset($error['address'])) : ?>
                                                 <p class="text-danger"><?php echo $error['address'] ?></p>
                                            <?php endif ?>

                                        </div>
                                       


                                        <button type="submit" class="btn btn-success" style="float :right ; margin-bottom:2%">Đăng ký</button>
                                    </form>
                                </div>

                               </form>
                            </div>
                        </div>
        </section>
        
    </div>

<?php require_once __DIR__. "/layouts/footer.php"; ?>