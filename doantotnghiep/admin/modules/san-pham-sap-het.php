<?php include("../autoload/autoload.php") ?>
<?php
    $open = "sanphamsaphet";
    // require_once __DIR__. "/../../autoload/autoload.php";
    // $product = $db->fetchAll("product");

    if(isset($_GET['page'])){
        $p = $_GET['page'];
    }else{
        $p = 1;
    }

    $sql = "SELECT product.*,category.name as namecategory FROM product 
    LEFT JOIN category on category.id = product.category_id WHERE product.number<15 ORDER BY ID DESC";

       
   $sumpro = count($db->fetchsql($sql));
   $product = $db->fetchJones("product",$sql,$sumpro,$p,5,true);
    

    if(isset($product['page'])){
        $sotrang = $product['page'];
        unset($product['page']);
    }



?>
<?php include("../layouts/header.php") ?>
<div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                       <div class="nav-tittle">
                       <h2 class="mt-4">Mặt hàng sắp hết </h2>
                       </div>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="<?php echo base_url() ?>/admin">Bảng điều khiển</a></li>
                            <li class="breadcrumb-item active">Mặt hàng sắp hết</li>
                        </ol>
                      
                        <div class="card mb-4"  style="width:95%;">
                            <div class="card-body" >
                                <div class="dataTable-wrapper dataTable-loading no-footer sortable searchable fixed-columns">
                                 
                                    <div class="dataTable-container">
                                        <table id="datatablesSimple" class="dataTable-table">
                                            <thead>
                                                <tr>
                                                    <th data-sortable="" style="width: 10%;"><a href="#" class="dataTable-sorter">Mã sản phẩm</a></th>
                                                    <th data-sortable="" style="width: 15%;"><a href="#" class="dataTable-sorter">Tên sản phẩm</a></th>
                                                    <th data-sortable="" style="width: 10%;"><a href="#" class="dataTable-sorter">Danh mục sản phẩm</a></th>
                                                    <th data-sortable="" style="width: 20%;"><a href="#" class="dataTable-sorter">Hình ảnh</a></th>
                                                    <th data-sortable="" style="width: 25%;"><a href="#" class="dataTable-sorter">Thông tin</a></th>
                                                   
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $stt =1;
                                                 foreach($product as $item) :  ?>
                                                <tr>
                                                    <td><?php echo $stt ?></td>
                                                    <td><?php echo $item['name'] ?></td>
                                                    <td><?php echo $item['namecategory'] ?></td>
                                                    <td>
                                                        <img src="<?php echo asset_uploads() ?>product/<?php echo $item['thunbar'] ?>" width="height:80px" height="80px" alt="">
                                                    </td>
                                                    <td>
                                                        <ul>
                                                            <li>Giá : <?php echo formatPrice($item['price']) ?></li>
                                                            <li>Số lượng : <?php echo $item['number'] ?></li>
                                                        </ul>
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
      
<?php require_once __DIR__. "/../layouts/footer.php"; ?>
