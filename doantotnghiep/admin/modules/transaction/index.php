<?php include("../../autoload/autoload.php") ?>
<?php
    $open = "transaction";
    // require_once __DIR__. "/../../autoload/autoload.php";
    // $product = $db->fetchAll("product");

    if(isset($_GET['page'])){
        $p = $_GET['page'];
    }else{
        $p = 1;
    }

    $sql = "SELECT transaction.* , users.name as nameuser FROM transaction LEFT JOIN users ON users.id = transaction.user_id ORDER BY ID DESC ";

    $transaction = $db->fetchJone('transaction',$sql,$p,8,true);

    if(isset($transaction['page'])){
        $sotrang = $transaction['page'];
        unset($transaction['page']);
    }



?>
<?php include("../../layouts/header.php") ?>
<div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                       <div class="nav-tittle">
                       <h2 class="mt-4">Đơn hàng</h2>
                       </div>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="<?php echo base_url() ?>/admin">Bảng điều khiển</a></li>
                            <li class="breadcrumb-item active">Đơn hàng</li>
                        </ol>
                        <div class="clearfix">
                        <?php include("../../../partials/notification.php") ?>
                        </div>
                        <div class="card mb-4"  style="width:95%;">
                            <div class="card-body" >
                                <div class="dataTable-wrapper dataTable-loading no-footer sortable searchable fixed-columns">
                                    <div class="dataTable-top">
                                        <!-- <div class="dataTable-search"><input class="dataTable-input" placeholder="Search..." type="text"></div> -->
                                    </div>
                                    <div class="dataTable-container">
                                        <table id="datatablesSimple" class="dataTable-table">
                                            <thead>
                                                <tr>
                                                    <th data-sortable="" style="width: 10%;"><a href="#" class="dataTable-sorter">Mã đơn hàng</a></th>
                                                    <th data-sortable="" style="width: 15%;"><a href="#" class="dataTable-sorter">Tên khách hàng</a></th>
                                                    <th data-sortable="" style="width: 20%;"><a href="#" class="dataTable-sorter">Số điện thoại</a></th>
                                                    <th data-sortable="" style="width: 15%;"><a href="#" class="dataTable-sorter">Tổng Tiền</a></th>
                                                    <th data-sortable="" style="width: 15%;"><a href="#" class="dataTable-sorter">Trạng thái</a></th>
                                                    <th data-sortable="" style="width: 10%;"><a href="#" class="dataTable-sorter">Thời gian</a></th>
                                                    <th data-sortable="" style="width: 20%;"><a href="#" class="dataTable-sorter">Chức năng</a></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php 
                                                 foreach($transaction as $item) :  ?>
                                                <tr>
                                                    <td><?php echo $item['id']?></td>
                                                    <td><?php echo $item['nameuser'] ?></td>
                                                    <td><?php echo $item['phone'] ?></td>
                                                    <td><?php echo formatPrice($item['amount']) ?></td>
                                                    <td>
                                                        <a href="status.php?id=<?php echo $item['id'] ?>" class="btn btn-xs <?php echo $item['status'] ==0 ? 'btn-warning':'btn-info' ?>"><?php echo $item['status'] == 0 ? 'Chưa xử lý' : 'Đã xử lý' ?></a>
                                                    </td>
                                                    <td><?php echo $item['created_at'] ?></td>
                                                    <td>
                                                        <a class="btn btn-outline-warning" href="edit.php?id=<?php echo $item['id']?>">Sửa</a>
                                                        <a class="btn btn-outline-danger" onclick="return confirm('Bạn có muốn xóa không?')" href="delete.php?id=<?php echo $item['id']?>">Xóa</a>
                                                        <a class="btn btn-outline-success" href="detail.php?id=<?php echo $item['id']?>">Chi tiết</a>
                                                    </td>
                                                </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="dataTable-bottom">
                                        <nav class="dataTable-pagination">
                                            <ul class="dataTable-pagination-list">
                                                <?php 
                                                    for($i=1;$i<=$sotrang;$i++): ?>
                                                    <?php 
                                                    if(isset($_GET['page'])){
                                                        $p = $_GET['page'];
                                                    }else{
                                                        $p = 1;
                                                    }
                                                ?>
                                                <li class="<?php echo($i == $p) ?'active' : '' ?>">
                                                    <a href="?page=<?php echo $i;?>" ><?php echo $i;?></a>

                                                </li>
                                                <?php endfor; ?>
                                    
                                            </ul>
                                        </nav>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
      
<?php require_once __DIR__. "/../../layouts/footer.php"; ?>
