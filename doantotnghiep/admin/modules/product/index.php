<?php include("../../autoload/autoload.php") ?>
<?php
    $open = "product";
    // require_once __DIR__. "/../../autoload/autoload.php";
    // $product = $db->fetchAll("product");

    if(isset($_GET['page'])){
        $p = $_GET['page'];
    }else{
        $p = 1;
    }

    $sql = "SELECT product.*,category.name as namecategory FROM product LEFT JOIN category on category.id = product.category_id ORDER BY ID DESC";

    $product = $db->fetchJone('product',$sql,$p,6,true);

    if(isset($product['page'])){
        $sotrang = $product['page'];
        unset($product['page']);
    }



?>
<?php include("../../layouts/header.php") ?>
<div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                       <div class="nav-tittle">
                       <h2 class="mt-4">Sản phẩm</h2>
                       </div>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="<?php echo base_url() ?>/admin">Bảng điều khiển</a></li>
                            <li class="breadcrumb-item active">Sản phẩm</li>
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
                                                    <th data-sortable="" style="width: 10%;"><a href="#" class="dataTable-sorter">Mã sản phẩm</a></th>
                                                    <th data-sortable="" style="width: 20%;"><a href="#" class="dataTable-sorter">Tên sản phẩm</a></th>
                                                    <th data-sortable="" style="width: 10%;"><a href="#" class="dataTable-sorter">Danh mục</a></th>
                                                    <th data-sortable="" style="width: 15%;"><a href="#" class="dataTable-sorter">Hình ảnh</a></th>
                                                    <th data-sortable="" style="width: 20%;"><a href="#" class="dataTable-sorter">Thông tin</a></th>
                                                    <th data-sortable="" style="width: 10%;"><a href="#" class="dataTable-sorter">Chức năng</a></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php 
                                                 foreach($product as $item) :  ?>
                                                <tr>
                                                    <td><?php echo $item['id'] ?></td>
                                                    <td><?php echo $item['name'] ?></td>
                                                    <td><?php echo $item['namecategory'] ?></td>

                                                    <td>
                                                        <img src="<?php echo asset_uploads() ?>product/<?php echo $item['thunbar'] ?>" width="height:80px" height="80px" alt="">
                                                    </td>
                                                    <td>
                                                        <ul>
                                                            <li>Giá : <?php echo formatPrice($item['price']) ?></li>
                                                            <li>Số lượng : <?php echo $item['number'] ?></li>
                                                            <li>Số lượng đã bán : <?php echo $item['pay'] ?></li>
                                                        </ul>
                                                    </td>
                                                    <td>
                                                        <a class="btn btn-outline-info" href="edit.php?id=<?php echo $item['id']?>"> <i class="fa fa-edit"></i>Sửa</a>
                                                        <a class="btn btn-outline-danger"  onclick="return confirm('Bạn có muốn xóa không?')" href="delete.php?id=<?php echo $item['id']?>">Xóa</a>
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
