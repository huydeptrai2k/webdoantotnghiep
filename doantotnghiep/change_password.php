<?php 
   require_once __DIR__. "/autoload/autoload.php";

   if (isset($_SESSION['name_id'])) 
    {
        $id = intval($_SESSION['name_id']);
        $EditUser = $db->fetchID("users",$id);
        if (empty($EditUser)) 
        {
            header("location: info-user.php");
        }
        if ($_SERVER["REQUEST_METHOD"] == "POST")
        {
            $error = [];
                if(postInput('password')!= NULL && postInput("re_password")!=NULL){
                    if(postInput('password')!= postInput("re_password")){
                        $error['password'] = " Mật khẩu không trùng khớp" ;
                    }
                    else{
                        $data['password'] = MD5(postInput("password"));
                    }
                }else{
                    $error['password'] = " Mật khẩu không được để trống" ;
                    $error['re_password'] = " Mật khẩu không được để trống" ;
                    header("location: change_password.php");
                }
                
                if (empty($error))
                {
                    $idupdate = $db->update("users", $data, array('id'=>$id));
                    if ($idupdate > 0)
                    {  
                        $_SESSION['name_user'] = $data['name'];
                        header("location: info-user.php");
                    }
                    else 
                    {
                        $_SESSION['name_user'] = $data['name'];
                        header("location: info-user.php");
                    }
                }
            
        }
    }
    else
    {
        header("location: info-user.php");

    }
?>

<?php require_once __DIR__. "/layouts/header.php"; ?>
    <div class="col-md-9 bor">
    <section class="box-main1">
                <h3 class="title-main">Cập nhật tài khoản</a> </h3>
                <form action="" method="POST" class="form-horizontal" role="form" style="margin-top: 20px">
                	<div class="form-group">
                		<label class="col-md-3 col-md-offset-1" style="margin-top: 10px">Mật khẩu mới</label>
                		<div class="col-md-8">
                			<input type="password" name="password" class="form-control" value="" placeholder="*****">
                            <?php
                        if(isset($error['password'])) : ?>
                            <p class="text-danger"><?php echo $error['password'] ?></p>
                        <?php endif ?>
                		</div>
                        
                	</div>
                	<div class="form-group">
                		<label class="col-md-3 col-md-offset-1" style="margin-top: 10px">Nhập lại mật khẩu mới</label>
                		<div class="col-md-8">
                			<input type="password" name="re_password" class="form-control" value="" placeholder="*****">
                            <?php
                            if(isset($error['re_password'])) : ?>
                                <p class="text-danger"><?php echo $error['re_password'] ?></p>
                            <?php endif ?>
                		</div>
                        
                	</div>
                	
                	<button type="submit" class="btn btn-success col-md-2  col-md-offset-6">Cập nhật</button>
                </form>
                <!--content-->
            </section>
    </div>

<?php require_once __DIR__. "/layouts/footer.php"; ?>