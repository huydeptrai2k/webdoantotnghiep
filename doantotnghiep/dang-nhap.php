<?php 
   require_once __DIR__. "/autoload/autoload.php";

   $data = [
    'email' => postInput("email"),
    'password' =>postInput("password"),
   ];

   if($_SERVER["REQUEST_METHOD"]=="POST"){
      
    if($data['email'] ==''){
        $error['email'] = "Email đăng nhập không được để trống !";
    }
     
     if($data['password'] ==''){
         $error['password'] = " Mời bạn nhập mật khẩu !";
     }
     
     if(empty($error)){
         $is_check = $db->fetchOne("users","email = '".$data['email']."' AND password = '".md5($data['password'])."' AND status = 1 ");

         if($is_check != NULL){
             //dang nhap thanh cong
             $_SESSION['name_user'] = $is_check['name'];
             $_SESSION['name_id'] = $is_check['id'];
             redirectWeb("index.php");


         }else{
             //dang nhap that bai
             $_SESSION['error'] = " Đăng nhập thất bại bạn vui lòng kiểm tra lại tài khoản và mật khẩu";
         }
     }


    }
?>

<?php require_once __DIR__. "/layouts/header.php"; ?>
    <div class="col-md-9 bor"style="margin-bottom:12% ;" >
    <section class="box-main1" >
                
                <h3 class="title-main">
                    <a href="" style="text-decoration: none"> Đăng Nhập  </a>
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
                                            <label for="exampleInputEmail1">Email</label>
                                            <input type="email" class="form-control" id="product" aria-describedby="" placeholder="Email"
                                             name="email" value="<?php echo  $data['email'] ?>" >
                                            <?php
                                            if(isset($error['email'])) : ?>
                                                 <p class="text-danger"><?php echo $error['email'] ?></p>
                                            <?php endif ?>

                                       
                                        </div>
                                   
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Mật khẩu</label>
                                            <input type="password" class="form-control"  aria-describedby="" placeholder=""
                                             name="password" value="<?php echo  $data['password'] ?>"  >
                                            <?php
                                            if(isset($error['password'])) : ?>
                                                 <p class="text-danger"><?php echo $error['password'] ?></p>
                                            <?php endif ?>

                                           
                                        </div>

                                        <button type="submit" class="btn btn-success" style="float :right ; margin-bottom:2%">Đăng nhập</button>
                                    </form>
                                </div>

                               </form>
                            </div>
                        </div>
        </section>
    </div>

<?php require_once __DIR__. "/layouts/footer.php"; ?>