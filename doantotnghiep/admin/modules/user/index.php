<?php include("../../autoload/autoload.php") ?>
<?php
    $open = "user";
    // require_once __DIR__. "/../../autoload/autoload.php";
    // $product = $db->fetchAll("product");

    if(isset($_GET['page'])){
        $p = $_GET['page'];
    }else{
        $p = 1;
    }

    $sql = "SELECT users.* FROM users ORDER BY ID DESC ";

    $users = $db->fetchJone('admin',$sql,$p,5,true);

    if(isset($users['page'])){
        $sotrang = $users['page'];
        unset($users['page']);
    }



?>
<?php include("../../layouts/header.php") ?>
<div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                       <div class="nav-tittle">
                       <h2 class="mt-4">Danh sách thành viên</h2>
                       </div>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="<?php echo base_url() ?>/admin">Bảng điều khiển</a></li>
                            <li class="breadcrumb-item active">Thành viên</li>
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
                                                    <th data-sortable="" style="width: 10%;"><a href="#" class="dataTable-sorter">Mã tài khoản</a></th>
                                                    <th data-sortable="" style="width: 20%;"><a href="#" class="dataTable-sorter">Tên khách hàng</a></th>
                                                    <th data-sortable="" style="width: 20%;"><a href="#" class="dataTable-sorter">Email</a></th>
                                                    <th data-sortable="" style="width: 15%;"><a href="#" class="dataTable-sorter">Số điện thoại</a></th>
                                                    <th data-sortable="" style="width: 20%;"><a href="#" class="dataTable-sorter">Địa Chỉ</a></th>
                                                    <th data-sortable="" style="width: 10%;"><a href="#" class="dataTable-sorter">Trạng thái truy cập</a></th>
                                                    <th data-sortable="" style="width: 15%;"><a href="#" class="dataTable-sorter">Chức năng</a></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                 foreach($users as $item) :  ?>
                                                <tr>
                                                    <td><?php echo $item['id'] ?></td>
                                                    <td><?php echo $item['name'] ?></td>
                                                    <td><?php echo $item['email'] ?></td>
                                                    <td><?php echo $item['phone'] ?></td>
                                                    <td><?php echo $item['address'] ?></td>
                                                    <td>
                                                    <a href="home.php?id=<?php echo $item['id'] ?>" class="btn btn-xs <?php echo $item['status'] ==1 ? 'btn-success' :'btn-warning' ?>">
                                                        <?php echo $item['status'] ==1 ? 'truy cập' :'đã chặn' ?></a>
                                                    </td>
                                                    <td>
                                                        <a class="btn btn-outline-danger" onclick="return confirm('Bạn có muốn xóa không?')" href="delete.php?id=<?php echo $item['id']?>">Xóa</a>
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
