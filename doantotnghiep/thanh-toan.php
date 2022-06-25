<?php 
   require_once __DIR__. "/autoload/autoload.php";

   $user = $db->fetchID("users",intval($_SESSION['name_id']));

   if($_SERVER["REQUEST_METHOD"] == "POST"){

        $data = [
            'amount' => $_SESSION['total'],
            'user_id' => $_SESSION['name_id'],
            'phone' => postInput('phone'),
            'address' => postInput('address'),
            'note' => postInput("note")
        ];
        $error = [];
        if(postInput('phone')== ''){
            $error['phone'] = "Mời bạn nhập số điện thoại";
        }
   
        if(postInput('address')== ''){
            $error['address'] = "Mời bạn nhập địa chỉ";
        }
        if(empty($error)){
        $idtran = $db->insert("transaction",$data);
        if($idtran > 0){
            foreach($_SESSION['cart'] as $key => $value){
                $data2 = [
                    'transaction_id' => $idtran,
                    'product_id'     => $key,
                    'qty'            => $value['qty'],
                    'price'          => $value['price']
                ];

                $id_insert2 = $db->insert("orders",$data2);
            }
            $_SESSION['success'] = " Lưu thông tin đơn hàng thành công ! chúng tôi sẽ liên hệ với bạn sớm nhất";
            unset($_SESSION['sosp']);
            redirectWeb("thong-bao.php");
            
       
            }
        }
    }
?>

<?php require_once __DIR__. "/layouts/header.php"; ?>
    <div class="col-md-9 ">
        <section class="box-main1">
                <h3 class="title-main"> <a href="">Thanh toán đơn hàng</a></h3>
                <div class="row" style="margin-left:2%">
                            <div class="col-md-8">
                               <form action="" method="POST" >
                                <div class="form-group ">
                                   <form>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Tên khách hàng</label>
                                            <input type="text" readonly ="" class="form-control" id="product" aria-describedby="" placeholder="Tên đăng nhập"
                                             name="name" value="<?php echo  $user['name'] ?>" >
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Email</label>
                                            <input type="email"  readonly ="" class="form-control"  aria-describedby="" placeholder="huyhayho@gmail.com"
                                             name="email" value="<?php echo   $user['email']?>"  >
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Số điện thoại</label>
                                            <input type="number"  class="form-control" aria-describedby="" placeholder="0384559058" 
                                            name="phone" value="<?php echo   $user['phone'] ?>" >
                                            <?php
                                            if(isset($error['phone'])) : ?>
                                                 <p class="text-danger"><?php echo $error['phone'] ?></p>
                                            <?php endif ?>
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Địa chỉ</label>
                                            <input type="text" class="form-control"  aria-describedby="" placeholder="175 Tây Sơn - Đống Đa - Hà Nội" 
                                            name="address"  value="<?php echo  $user['address'] ?>" >
                                            <?php
                                            if(isset($error['address'])) : ?>
                                                 <p class="text-danger"><?php echo $error['address'] ?></p>
                                            <?php endif ?>
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Tổng tiền</label>
                                            <input type="text" readonly ="" class="form-control"  aria-describedby="" placeholder="" 
                                            name="total"  value="<?php echo  formatPrice($_SESSION['total'])?>" >
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Ghi chú</label>
                                            <input type="text" class="form-control"  aria-describedby="" placeholder="Giao hàng tại nhà" 
                                            name="note"   >
                                        </div>
                                       
                                        <button type="submit" class="btn btn-success" style="float :right ; margin-bottom:2%">Xác nhận</button>
                                    </form>
                                </div>

                               </form>
                            </div>
                        </div>
        </section>
    </div>

<?php require_once __DIR__. "/layouts/footer.php"; ?>