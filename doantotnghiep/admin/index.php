<?php include("autoload/autoload.php") ?>
<?php
    
    $open = "dashboard";
    if( $level[0]['level']=="1"){
        header("location: /doantotnghiep/admin/modules/news/");
    }
    // $category = $db->fetchAll("category");
    $sql7 ="SELECT count(*) FROM category";
    $sum_cate = $db->fetchnum($sql7);

    //Count number of products
    $sql = "SELECT number FROM product";
    $product = $db->fetchsql($sql);
    $sql2 = "SELECT count(*) FROM product";
    $product2 = $db->fetchnum($sql2);
    $num = (int)$product2['count(*)'];
    $s = 0;
    for ($i=0; $i < $num ; $i++) 
    {
        $s = $s + implode($product[$i]);
    }
    //Đếm sản phẩm đã bán
    $sql3 = "SELECT sum(qty) as sl FROM orders";
    $qty_product = $db->fetchnum($sql3);
     
    //Đếm sản phẩm còn lại
    // Số lương don hang da ban , tong doanh thu
    $sql5 = "SELECT count(*),sum(amount) FROM transaction WHERE status =1";
    $transaction_sum = $db->fetchnum($sql5);
    //so luong bai viet 
    $sql6 = "SELECT count(*) FROM news";
    $sum_new = $db->fetchnum($sql6);
    // mat hang sap het
    $sql8 = "SELECT count(*) FROM product WHERE number <15";
    $num_peo = $db->fetchnum($sql8);
    // so user
    $sql9 = "SELECT count(*) FROM users";
    $num_user = $db->fetchnum($sql9);
    //doanh nhu cua thang
    $sql10 = "SELECT created_at, SUM(amount) as doanhthu FROM transaction where month(CURRENT_DATE) = month(created_at) and status =1";
    $turnover = $db->fetchnum($sql10);
    // doanh thu hom nay
    $sql11= "SELECT sum(amount) as doanhthu FROM transaction WHERE CURRENT_DATE = date(created_at) and status =1";
    $turnover_day = $db->fetchnum($sql11);
    //doanh thu tuan nay
    $sql12= "SELECT sum(amount) as doanhthu FROM transaction WHERE week(CURRENT_DATE) = week(created_at) and status =1";
    $turnover_week = $db->fetchnum($sql12);
    //donhangmoi
    $sql13 = "SELECT transaction.* , users.name as nameuser FROM transaction LEFT JOIN users ON users.id = transaction.user_id WHERE transaction.status = 0 ORDER BY ID DESC LIMIT 4 ";
    $transactionNew = $db->fetchsql($sql13)
   
    
    
?>
<?php include("layouts/header.php") ?>
<div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                       <div class="nav-tittle">
                       <h2 class="mt-4">Bảng điều khiển</h2>
                       </div>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="<?php echo base_url() ?>/admin">Bảng điều khiển</a></li>
                           
                        </ol>
                        <div class="card mb-4">
                        <div id="content-wrapper" class="d-flex flex-column">
                <!-- Main Content -->
                <div id="content">
                        <!-- Content Row -->
                        <div class="row">
                            <!-- Earnings (Monthly) Card Example -->
                            <div class="col-xl-3 col-md-6 mb-4">
                                <div class="card border-left-primary shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                   Doanh thu tháng
                                                </div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo formatPrice($turnover['doanhthu']) ?></div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Earnings (Monthly) Card Example -->
                            <div class="col-xl-3 col-md-6 mb-4">
                                <div class="card border-left-success shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                    Tổng doanh thu
                                                </div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo formatPrice($transaction_sum['sum(amount)']) ?></div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Earnings (Monthly) Card Example -->
                            <div class="col-xl-3 col-md-6 mb-4">
                                <div class="card border-left-info shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Số lượng đơn hàng đã bán
                                                </div>
                                                <div class="row no-gutters align-items-center">
                                                    <div class="col-auto">
                                                        <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php echo $transaction_sum['count(*)'] ?></div>
                                                    </div>
                                                  
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Pending Requests Card Example -->
                            <div class="col-xl-3 col-md-6 mb-4">
                                <div class="card border-left-warning shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                    Số lượng bài viết
                                                </div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $sum_new['count(*)'] ?></div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-comments fa-2x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                               <!-- Pending Requests Card Example -->
                               <div class="col-xl-3 col-md-6 mb-4">
                                <div class="card border-left-warning shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                    Doanh thu hôm nay
                                                </div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo formatPrice($turnover_day['doanhthu']) ?></div>
                                            </div>
                                            <div class="col-auto">
                                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                               <!-- Pending Requests Card Example -->
                               <div class="col-xl-3 col-md-6 mb-4">
                                <div class="card border-left-warning shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                    Doanh thu tuần 
                                                </div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo formatPrice($turnover_week['doanhthu']) ?></div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-comments fa-2x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                               <!-- Pending Requests Card Example -->
                               <div class="col-xl-3 col-md-6 mb-4">
                                <div class="card border-left-warning shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                   Số lượng thành viên
                                                </div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $num_user['count(*)'] ?></div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-comments fa-2x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                               <!-- Pending Requests Card Example -->
                               <div class="col-xl-3 col-md-6 mb-4">
                                <div class="card border-left-warning shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                    Số lượng danh mục
                                                </div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $sum_cate['count(*)'] ?></div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-comments fa-2x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <!-- Content Column -->
                            <div class="col-lg-6 mb-4">
                                <!-- Color System -->
                                <div class="row">
                                    <div class="col-lg-6 mb-4">
                                        <div class="card bg-primary text-white shadow">
                                            <div class="card-body">
                                                Sản phẩm
                                                <div class="text-white-50 small"><?php echo $num ?></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 mb-4">
                                        <div class="card bg-success text-white shadow">
                                            <div class="card-body">
                                                Số lượng sản phẩm 
                                                <div class="text-white-50 small"><?php echo $s ?></div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- <div class="col-lg-6 mb-4">
                                        <div class="card bg-info text-white shadow">
                                            <div class="card-body">
                                                Số lượng người dùng
                                                <div class="text-white-50 small"><?php echo $num_user['count(*)'] ?></div>
                                            </div>
                                        </div>
                                    </div> -->
                                    <div class="col-lg-6 mb-4">
                                        <div class="card bg-warning text-white shadow">
                                            <div class="card-body">
                                                Số lượng mặt hàng sắp hết
                                                <div class="text-white-50 small"><?php echo $num_peo['count(*)'] ?></div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- <div class="col-lg-6 mb-4">
                                        <div class="card bg-danger text-white shadow">
                                            <div class="card-body">
                                                Số danh mục
                                                <div class="text-white-50 small"><?php echo $sum_cate['count(*)'] ?></div>
                                            </div>
                                        </div>
                                    </div> -->
                                    <div class="col-lg-6 mb-4">
                                        <div class="card bg-secondary text-white shadow">
                                            <div class="card-body">
                                                Số lượng sản phẩm đã bán
                                                <div class="text-white-50 small"><?php echo $qty_product['sl'] ?></div>
                                            </div>
                                        </div>
                                    </div>
                             
                                </div>
                            </div>
                            <div class="col-lg-6 mb-4">
                                <!-- Illustrations -->
                                <h4>Đơn hàng mới</h4>
                               <table class="table">
                                   <thead class="thead-dark">
                                       <tr>
                                           <th>STT</th>
                                           <th>Name</th>
                                           <th>Số điện thoại</th>
                                           <th>Trạng thái</th>
                                       </tr>
                                   </thead>
                                   <tbody>
                                   <?php $stt =1;
                                        foreach($transactionNew as $item) :  ?>
                                       <tr>
                                           <td scope="row"><?php echo $stt ?></td>
                                           <td><?php echo $item['nameuser'] ?></td>
                                           <td><?php echo $item['phone'] ?></td>
                                           <td>
                                           <a href="#" class="btn btn-xs <?php echo $item['status'] ==0 ? 'btn-warning':'btn-info' ?>"><?php echo $item['status'] == 0 ? 'Chưa xử lý' : 'Đã xử lý' ?></a>
                                           </td>
                                       </tr>
                                      <?php $stt++; endforeach; ?>
                                   </tbody>
                               </table>
                               
                            </div>
                        </div>
                   
                    <!-- /.container-fluid -->
                </div>
                <!-- End of Main Content -->
                        </div>
                    </div>
                </main>
      
<?php require_once __DIR__. "/layouts/footer.php"; ?>