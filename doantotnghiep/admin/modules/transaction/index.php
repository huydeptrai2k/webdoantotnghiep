<?php include("../../autoload/autoload.php") ?>
<?php
    $open = "transaction";
    // require_once __DIR__. "/../../autoload/autoload.php";
    // $product = $db->fetchAll("product");
    if( $level[0]['level']=="1"){
        header("location: /doantotnghiep/admin/modules/news/");
    }

    if(isset($_GET['page'])){
        $p = $_GET['page'];
    }else{
        $p = 1;
    }
    if($_SERVER["REQUEST_METHOD"]=="POST" && isset($_POST['daybyday'])&& $_POST['daybyday']!=""){
        $day = postInput("daybyday");
        $sql = "SELECT transaction.* , users.name as nameuser FROM transaction LEFT JOIN users ON users.id = transaction.user_id WHERE date(transaction.created_at) = '$day' ORDER BY ID DESC ";
    }else if($_SERVER["REQUEST_METHOD"]=="POST" && isset($_POST['loc'])){
        $loc = postInput("loc");
        
        if($loc == "1"){
            $sql = "SELECT transaction.* , users.name as nameuser FROM transaction LEFT JOIN users ON users.id = transaction.user_id WHERE date(transaction.created_at)=CURRENT_DATE ORDER BY ID DESC ";
        }else if($loc =="2"){
            $sql = "SELECT transaction.* , users.name as nameuser FROM transaction LEFT JOIN users ON users.id = transaction.user_id WHERE week(transaction.created_at)=week(CURRENT_DATE) ORDER BY ID DESC ";
        }else if($loc =="3"){
            $sql = "SELECT transaction.* , users.name as nameuser FROM transaction LEFT JOIN users ON users.id = transaction.user_id WHERE month(transaction.created_at)=month(CURRENT_DATE) ORDER BY ID DESC ";
        }else{
            $sql = "SELECT transaction.* , users.name as nameuser FROM transaction LEFT JOIN users ON users.id = transaction.user_id ORDER BY ID DESC ";
        }
    }else{
        $sql = "SELECT transaction.* , users.name as nameuser FROM transaction LEFT JOIN users ON users.id = transaction.user_id ORDER BY ID DESC ";
    }


    // $sql = "SELECT transaction.* , users.name as nameuser FROM transaction LEFT JOIN users ON users.id = transaction.user_id ORDER BY ID DESC ";
    $total1 = count($db->fetchsql($sql));
    $transaction = $db->fetchJones('transaction',$sql,$total1,$p,9,true);

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
                       <h2 class="mt-4">????n h??ng</h2>
                       </div>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="<?php echo base_url() ?>/admin">B???ng ??i???u khi???n</a></li>
                            <li class="breadcrumb-item active">????n h??ng</li>
                        </ol>
                        <div class="clearfix">
                        <?php include("../../../partials/notification.php") ?>
                        </div>
                        <div class="card mb-4"  style="width:95%;">
                            <div class="card-body" >
                                <div class="dataTable-wrapper dataTable-loading no-footer sortable searchable fixed-columns">
                                    <div class="dataTable-top">
                                       <form action="" method="POST">
                                            <div class="dataTable" style="float: left; ">
                                              <label for="">Hi???n th??? ????n h??ng</label>
                                              <select class="" name="loc" id="">
                                                <option value="0">T???t c???</option>
                                                <option value="1">H??m nay</option>
                                                <option value="2">Tu???n n??y</option>
                                                <option value="3">Th??ng n??y</option>
                                              </select>
                                              <button type="submit" class="btn btn-success" style="padding:2px ;margin-bottom:1%" >Hi???n th???</button>
                                            </div>
                                       <div class="dataTable" style="float: right ; margin-right:5%">
                                        <input class="dataTable" placeholder="" type="date" name="daybyday"> 
                                            <button type="submit" class="btn btn-success" style="padding:4px ;margin-bottom:1%" >L???c</button>
                                        </div>
                                       </form>
                                    </div>
                                    <div class="dataTable-container">
                                        <table id="datatablesSimple" class="dataTable-table">
                                            <thead>
                                                <tr>
                                                    <th data-sortable="" style="width: 10%;"><a href="#" class="dataTable-sorter">M?? ????n h??ng</a></th>
                                                    <th data-sortable="" style="width: 15%;"><a href="#" class="dataTable-sorter">T??n kh??ch h??ng</a></th>
                                                    <th data-sortable="" style="width: 20%;"><a href="#" class="dataTable-sorter">S??? ??i???n tho???i</a></th>
                                                    <th data-sortable="" style="width: 15%;"><a href="#" class="dataTable-sorter">T???ng Ti???n</a></th>
                                                    <th data-sortable="" style="width: 15%;"><a href="#" class="dataTable-sorter">Tr???ng th??i</a></th>
                                                    <th data-sortable="" style="width: 10%;"><a href="#" class="dataTable-sorter">Th???i gian</a></th>
                                                    <th data-sortable="" style="width: 20%;"><a href="#" class="dataTable-sorter">Ch???c n??ng</a></th>
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
                                                        <a href="status.php?id=<?php echo $item['id'] ?>" class="btn btn-xs <?php echo $item['status'] ==0 ? 'btn-warning':'btn-info' ?>"><?php echo $item['status'] == 0 ? 'Ch??a x??? l??' : '???? x??? l??' ?></a>
                                                    </td>
                                                    <td><?php echo $item['created_at'] ?></td>
                                                    <td>
                                                        <a style="<?php echo $item['status']=="1" ? 'display:none' : '' ?> " class="btn btn-outline-warning"  href="edit.php?id=<?php echo $item['id']?>">S???a</a>
                                                        <a class="btn btn-outline-danger" onclick="return confirm('B???n c?? mu???n x??a kh??ng?')" href="delete.php?id=<?php echo $item['id']?>"style="<?php echo $item['status']=="1" ? 'display:none' : '' ?>">X??a</a>
                                                        <a class="btn btn-outline-success" href="detail.php?id=<?php echo $item['id']?>">Chi ti???t</a>
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
                                                    <a href="?page=<?php echo $i;?>"><?php echo $i;?></a>

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
