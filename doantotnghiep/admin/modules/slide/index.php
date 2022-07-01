<?php include("../../autoload/autoload.php") ?>
<?php
    $open = "slide";
    if( $level[0]['level']=="1"){
        header("location: /doantotnghiep/admin/modules/news/");
    }
    // require_once __DIR__. "/../../autoload/autoload.php";
    $slide = $db->fetchAll("slide");

?>
<?php include("../../layouts/header.php") ?>
<div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                       <div class="nav-tittle">
                       <h2 class="mt-4">Danh sách thanh trượt</h2>
                       </div>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="<?php echo base_url() ?>/admin">Bảng điều khiển</a></li>
                            <li class="breadcrumb-item active">Thanh trượt</li>
                        </ol>
                        <div class="clearfix">
                        <?php include("../../../partials/notification.php") ?>
                        </div>
                        <div class="card mb-4"  style="width:95%;">
                            <div class="card-body" >
                                <div class="dataTable-wrapper dataTable-loading no-footer sortable searchable fixed-columns">
                                    <div class="dataTable-top">
                                    <a href="add.php" class="btn btn-success pull-right ">Thêm mới</a>
                                      
                                    </div>
                                    <div class="dataTable-container">
                                        <table id="datatablesSimple" class="dataTable-table">
                                            <thead>
                                                <tr>
                                                    <th data-sortable="" style="width: 5%;"><a href="#" class="dataTable-sorter">STT</a></th>
                                                    <th data-sortable="" style="width: 20%;"><a href="#" class="dataTable-sorter">Tiêu đề</a></th>
                                                    <th data-sortable="" style="width: 15%;"><a href="#" class="dataTable-sorter">Nội dung</a></th>
                                                    <th data-sortable="" style="width: 10%;"><a href="#" class="dataTable-sorter">Hiển thị</a></th>
                                                    <th data-sortable="" style="width: 20%;"><a href="#" class="dataTable-sorter">Hình Ảnh</a></th>
                                                    <th data-sortable="" style="width: 15%;"><a href="#" class="dataTable-sorter">Thời gian tạo</a></th>
                                                    <th data-sortable="" style="width: 15%;"><a href="#" class="dataTable-sorter">Chức năng</a></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $stt =1;
                                                 foreach($slide as $item) :  ?>
                                                <tr>
                                                    <td><?php echo $stt ?></td>
                                                    <td><?php echo $item['title'] ?></td>
                                                    <td><?php echo $item['content'] ?></td>
                                
                                                    <td>
                                                        <a href="home.php?id=<?php echo $item['id'] ?>" class="btn btn-xs <?php echo $item['home'] ==1 ? 'btn-info' :'btn-warning' ?>">
                                                        <?php echo $item['home'] ==1 ? 'Hiển thị' :'Không' ?></a>
                                                    </td>
                                                    <td>
                                                        <img src="<?php echo asset_uploads() ?>slide/<?php echo $item['thunbar'] ?>" width="70%" height="10%" alt="">
                                                    </td>
                                                    <td><?php echo $item['created_at'] ?></td>
                                                    <td>
                                                        <a class="btn btn-outline-info" href="edit.php?id=<?php echo $item['id']?>"> <i class="fa fa-edit"></i>Sửa</a>
                                                        <a class="btn btn-outline-danger" onclick="return confirm('Bạn có muốn xóa không?')"  href="delete.php?id=<?php echo $item['id']?>">Xóa</a>
                                                    </td>
                                                </tr>
                                                <?php $stt++ ;endforeach ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
      
<?php require_once __DIR__. "/../../layouts/footer.php"; ?>
