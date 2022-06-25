<?php include("../../autoload/autoload.php");
  $open = "transaction";

  $id = intval(getInput('id'));

  $tran = $db->fetchID("transaction",$id);
  $user = $db->fetchID("users",$tran['user_id']);
    $sql1 = "SELECT product_id ,qty FROM orders WHERE transaction_id = $id ";
    $order1 = $db->fetchsql($sql1);
  

?>

<?php include("../../layouts/header.php") ?>
<div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                       <div class="nav-tittle" style="margin-left:5%">
                       <h2 class="mt-4">Quản lý đơn hàng</h2>
                       </div>
                        <ol class="breadcrumb mb-4" style="margin-left:5%">
                            <li class="breadcrumb-item"><a href="index.html">Bảng điều khiển</a></li>
                            <li class="breadcrumb-item"><a href="">Quản lý đơn hàng</a></li>
                            <li class="breadcrumb-item active">Chi tiết đơn hàng</li>
                        </ol>
                        <div class="clearfix" style="margin-left:5%">
                            <?php include("../../../partials/notification.php") ?>
                        </div>
                        <div class="row" style="margin-left:5%">
                            <div class="col-md-6">
                               <form action="" method="POST">
                                   <div class="form-group ">
                                    <form>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Mã đơn hàng</label>
                                                <input type="text" readonly ="" class="form-control" id="product" aria-describedby="" placeholder=""
                                                name="name" value="<?php echo  $tran['id'] ?>" >
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Tên khách hàng</label>
                                                <input type="email"  readonly ="" class="form-control"  aria-describedby="" placeholder="huyhayho@gmail.com"
                                                name="email" value="<?php echo   $user['name']?>"  >
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Số điện thoại</label>
                                                <input type="number" readonly ="" class="form-control" aria-describedby="" placeholder="0384559058" 
                                                name="phone" value="<?php echo   $tran['phone'] ?>" >
                                            </div>

                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Địa chỉ giao hàng</label>
                                                <input type="text" readonly ="" class="form-control"  aria-describedby="" placeholder="175 Tây Sơn - Đống Đa - Hà Nội" 
                                                name="address"  value="<?php echo  $tran['address'] ?>" >
                                            </div>

                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Thông tin sản phẩm</label>
                                                
                                             
                                                         <table class="table">
                                                        
                                                             <thead>
                                                                 <tr>
                                                                     <th>Sản phẩm</th>
                                                                     <th>Số lượng</th>
                                                                     <th>Giá tiền</th>
                                                                    
                                                                 </tr>
                                                             </thead>
                                                             <tbody>
                                                             <?php foreach($order1 as $item) : ?>
                                                              <?php
                                                             $idpro = $item['product_id'];
                                                             $productxx = $db->fetchID("product",$idpro); ?>
                                                                 <tr>
                                                                     <td scope="row"><?php  echo $productxx['name']  ?></td>
                                                                     <td><?php  echo $item['qty'] ?></td>
                                                                     <td><?php  echo formatPrice( $productxx['price'])  ?></td>
                                                                 </tr>
                                                                 <?php endforeach; ?>
                                                             </tbody>
                                                            
                                                         </table>
                                                
                                            </div>
                                        

                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Tổng tiền</label>
                                                <input type="text" readonly ="" class="form-control"  aria-describedby="" placeholder="" 
                                                name="address"  value="<?php echo  formatPrice($tran['amount'])?>" >
                                            </div>
                                            
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Trạng thái</label>
                                                <input type="text" readonly ="" class="form-control"  aria-describedby="" placeholder="" 
                                                name="status"  value="<?php echo $tran['status'] == 0 ? 'Chưa xử lý' : 'Đã xử lý' ?>" >
                                            </div>

                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Ghi chú</label>
                                                <input type="text" readonly ="" class="form-control"  aria-describedby="" placeholder="" 
                                                name="note"   value="<?php echo $tran['note']?>" >
                                            </div>
                                          
                                            
                                        </form>
                                </div>
                               </form>
                            </div>
                        </div>
                    </div>
                </main>
      
<?php require_once __DIR__. "/../../layouts/footer.php"; ?>