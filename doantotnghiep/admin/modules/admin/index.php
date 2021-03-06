<?php include("../../autoload/autoload.php") ?>
<?php
    $open = "admin";
    if( $level[0]['level']=="1"){
        header("location: /doantotnghiep/admin/modules/news/");
    }

    if(isset($_GET['page'])){
        $p = $_GET['page'];
    }else{
        $p = 1;
    }

    $sql = "SELECT admin.* FROM admin ORDER BY ID DESC ";

    $admin = $db->fetchJone('admin',$sql,$p,5,true);

    if(isset($admin['page'])){
        $sotrang = $admin['page'];
        unset($admin['page']);
    }



?>
<?php include("../../layouts/header.php") ?>
<div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                       <div class="nav-tittle">
                       <h2 class="mt-4">Tài khoản người quản trị</h2>
                       </div>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="<?php echo base_url() ?>/admin">Bảng điều khiển</a></li>
                            <li class="breadcrumb-item active">Tài khoản người quản trị</li>
                        </ol>
                        <div class="clearfix">
                        <?php include("../../../partials/notification.php") ?>
                        </div>
                        <div class="card mb-4"  style="width:95%;">
                            <div class="card-body" >
                                <div class="dataTable-wrapper dataTable-loading no-footer sortable searchable fixed-columns">
                                    <div class="dataTable-top">
                                    <a href="add.php" class="btn btn-success pull-right ">Thêm mới</a>
                                        <!-- <div class="dataTable-search"><input class="dataTable-input" placeholder="Search..." type="text"></div> -->
                                    </div>
                                    <div class="dataTable-container">
                                        <table id="datatablesSimple" class="dataTable-table">
                                            <thead>
                                                <tr>
                                                    <th data-sortable="" style="width: 10%;"><a href="#" class="dataTable-sorter">STT</a></th>
                                                    <th data-sortable="" style="width: 15%;"><a href="#" class="dataTable-sorter">Tên người quản trị</a></th>
                                                    <th data-sortable="" style="width: 15%;"><a href="#" class="dataTable-sorter">Email</a></th>
                                                    <th data-sortable="" style="width: 15%;"><a href="#" class="dataTable-sorter">Số điện thoại</a></th>
                                                    <th data-sortable="" style="width: 20%"><a href="#" class="dataTable-sorter">Địa Chỉ</a></th>
                                                    <th data-sortable="" style="width: 15%"><a href="#" class="dataTable-sorter">Vai trò</a></th>
                                                    <th data-sortable="" style="width: 15%;"><a href="#" class="dataTable-sorter">Chức năng</a></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $stt =1;
                                                 foreach($admin as $item) :  ?>
                                                <tr>
                                                    <td><?php echo $stt ?></td>
                                                    <td><?php echo $item['name'] ?></td>
                                                    <td><?php echo $item['email'] ?></td>
                                                    <td><?php echo $item['phone'] ?></td>
                                                    <td><?php echo $item['address'] ?></td>
                                                    <td><?php  $item['level'] ==1 ?  $item['level']="CTV" :$item['level']= "Admin" ; echo $item['level']?></td>
                                                    <td>
                                                        <a class="btn btn-outline-info" href="edit.php?id=<?php echo $item['id']?>"> <i class="fa fa-edit"></i>Sửa</a>
                                                        <a class="btn btn-outline-danger" onclick="return confirm('Bạn có muốn xóa không?')" href="delete.php?id=<?php echo $item['id']?>">Xóa</a>
                                                    </td>
                                                </tr>
                                                <?php $stt++ ;endforeach ?>
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
