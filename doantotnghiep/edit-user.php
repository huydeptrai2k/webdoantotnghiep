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
            $data =
            [
                'name'      => postInput('name'),
                'address'   => postInput('address'),
                'phone'     => postInput('phone')
            ];
            $error = [];
            {
                if (postInput('name') == '') 
                {
                    $error['name'] = "Nhập tên";
                }
                if (postInput('phone') == '') 
                {
                    $error['phone'] = "Nhập sđt";
                }
                if (postInput('address') == '') 
                {
                    $error['address'] = "Nhập địa chỉ";
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
                		<label class="col-md-3 col-md-offset-1" style="margin-top: 10px">Tên tài khoản</label>
                		<div class="col-md-8">
                			<input type="text" name="name" class="form-control" value="<?php echo $EditUser['name'] ?>">
                		</div>
                	</div>
                	<div class="form-group">
                		<label class="col-md-3 col-md-offset-1" style="margin-top: 10px">Số điện thoại</label>
                		<div class="col-md-8">
                			<input type="text" name="phone" class="form-control" value="<?php echo $EditUser['phone'] ?>">
                		</div>
                	</div>
                	<div class="form-group">
                		<label class="col-md-3 col-md-offset-1" style="margin-top: 10px">Địa chỉ</label>
                		<div class="col-md-8">
                			<input type="text" name="address" class="form-control" value="<?php echo $EditUser['address'] ?>">
                		</div>
                	</div>
                	<button type="submit" class="btn btn-success col-md-2  col-md-offset-6">Cập nhật</button>
                </form>
                <!--content-->
            </section>
    </div>

<?php require_once __DIR__. "/layouts/footer.php"; ?>