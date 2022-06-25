<?php 
   require_once __DIR__. "/autoload/autoload.php";
  
   if( !isset($_SESSION['cart'])||count($_SESSION['cart']) ==0){
       redirectWeb("index.php");
        echo "<script> alert('Giỏ hàng của bạn đang rỗng vui lòng chọn sản phẩm để mua hàng' );
     </script>";
    }else if(!isset($_SESSION['name_id'])){
        redirectWeb("index.php");
        echo "<script> alert('Vui lòng đăng nhập để sử dụng chức năng này' ); 
        </script>";
    }
    $sum=0;
?>

<?php require_once __DIR__. "/layouts/header.php"; ?>
    <div class="col-md-9 bor" style="margin-bottom:2%">
        <section class="box-main1">
            <h3 class="title-main"> <a href="">Giỏ hàng của bạn</a></h3>
            <table class="table table-hover" id="shoppingcart_info">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Tên sản phẩm</th>
                        <th>Hình ảnh</th>
                        <th>Số lượng</th>
                        <th>Giá</th>
                        <th>Tổng tiền</th>
                        <th>Thao tác</th>
                    </tr>
                </thead>
                <tbody id="tbody">
                    <?php $stt =1; foreach($_SESSION['cart'] as $key=>$value) :?>
                            <tr>
                                <td scope="row"><?php echo $stt?></td>
                                <td><?php echo $value['name']?></td>
                                <td>
                                    <img src="<?php echo asset_uploads() ?>product/<?php echo $value['thunbar']?>" alt="" width="80" height="80">
                                </td>
                                <td>
                                    <input type="number" name="qty" class="form-control" id="qty" value="<?php echo $value['qty']?>" min ="1">
                                </td>
                                <td><?php echo formatPrice($value['price'])?></td>
                                <td><?php echo formatPrice($value['price']*$value['qty'])?></td>
                                <td>
                                    <a class="btn btn-xs btn-danger" href="remove.php?key=<?php echo $key ?>">Xóa</a>
                                    <a class="btn btn-xs btn-info updatecart" data-key=<?php echo $key ?> href="">Sửa</a>
                                </td>
                            </tr>
                            <?php $sum += $value['price']* $value['qty'] ;
                             $_SESSION['tongtien'] = $sum ;
                             $_SESSION['sosp'] = $stt;?>
                     <?php $stt++; endforeach; ?>
                     <script type="text/javascript">
                                var x = document.getElementsByClassName("sosp");
                                x[0].innerHTML = "<?php echo $_SESSION['sosp']; ?>";
                        </script>

                </tbody>
            </table>

            <div class="col-md-5 pull-right" style="margin-top:2%">
                <ul class="list-group">
                    <li class="list-group-item">
                        <h3>Thông tin đơn hàng</h3>
                    </li>
                    <li class="list-group-item">
                        <span class="badge">
                            <?php echo formatPrice($_SESSION['tongtien']) ?>
                        </span>
                        Số tiền 
                    </li>
                    <li class="list-group-item">
                        <span class="badge">
                            10%
                        </span>
                        Thuế VAT
                    </li>
                    <!-- <li class="list-group-item">
                        <span class="badge">
                             < ? php //echo sale( $_SESSION['tongtien']) ? > 
                        </span>
                        %
                    </li> -->
                    <li class="list-group-item">
                        <span class="badge">
                        <?php echo $_SESSION['total'] =$_SESSION['tongtien']* (110/100) ; echo round(formatPrice($_SESSION['total']) )?>
                        </span>
                        Tổng tiền thanh toán : 
                    </li>
                     <li class="list-group-item">
                        <a href="index.php" class="btn btn-success">Tiếp tục mua hàng</a>
                        <a href="thanh-toan.php" class="btn btn-success pull-right"> Thanh toán </a>
                    </li>
                </ul>
            </div>


        </section>

    </div>

<?php require_once __DIR__. "/layouts/footer.php"; ?>