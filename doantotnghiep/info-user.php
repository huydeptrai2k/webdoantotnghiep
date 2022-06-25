<?php 
   require_once __DIR__. "/autoload/autoload.php";
    $id = intval($_SESSION['name_id']);
   $user = $db->fetchID("users",$id);

   //trấnction
   
    $sql = "SELECT transaction.* , users.name as nameuser FROM transaction LEFT JOIN users ON  transaction.user_id = users.id WHERE transaction.user_id = $id ORDER BY ID DESC ";

    $transaction = $db->fetchsql($sql);

  

?>

<?php require_once __DIR__. "/layouts/header.php"; ?>
    <div class="col-md-9 bor" style="margin-bottom:2%">
        <div class="row">
            <ul class="nav nav-tabs">
                <li class="active"><a data-toggle="tab" href="#home">Thông tin người dùng</a></li>
                <li><a data-toggle="tab" href="#menu2">Lịch sử giao dịch</a></li>
            </ul>
            <div class="tab-content">
                            <div id="home" class="tab-pane fade in active"> 
                                <section class="box-main1 " ><br>
                                   
                                    <form action="" method="POST" class="form-horizontal" role="form" style="margin-top: 20px">
                                        <div class="panel-body">
                                            <div class="row">
                                                <div class="col-md-3 col-lg-3">
                                                    <img class="img-circle" src="asset/frontend/images/avatar.jpg" width="150px" height="150px" alt="User Pic">
                                                </div>
                                                <div class=" col-md-9 col-lg-9">
                                                    <h3><?php echo $user['name'] ?></h3><br>
                                                    <table class="table table-user-information">
                                                        <tbody>
                                                        <tr>
                                                            <td>Tên khách hàng:</td>
                                                            <td><?php echo $user['name'] ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Email:</td>
                                                            <td><?php echo $user['email'] ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Số điện thoại:</td>
                                                            <td><?php echo $user['phone'] ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Địa chỉ:</td>
                                                            <td><?php echo $user['address'] ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Ngày tạo:</td>
                                                            <td><?php echo $user['created_at'] ?></td>
                                                        </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div><br>
                                            <script>
                                                $(document).ready(function(){
                                                $('[data-toggle="tooltip"]').tooltip();   
                                                });
                                            </script>
                                            <div class="panel-footer">
                                                <button class="btn btn-sm btn-primary" type="button"><i style="color: white;" class="glyphicon glyphicon-envelope"></i></button>
                                                <button class="btn btn-sm btn-primary" type="button"><i style="color: white;" class="fa fa-facebook-square"></i></button>
                                                <button class="btn btn-sm btn-primary" type="button"><i style="color: white;" class="fa fa-twitter"></i></button>
                                                <button class="btn btn-sm btn-primary" type="button"><i style="color: white;" class="fa fa-comment"></i></button>
                                                <span class="pull-right">
                                                <a href="change_password.php" title="Đổi password" data-toggle="tooltip" data-placement="bottom"><button class="btn btn-sm btn-basic" type="button"><i class="fa fa-unlock"></i></button></a>
                                                <a href="edit-user.php" title="Sửa thông tin" data-toggle="tooltip" data-placement="bottom"><button class="btn btn-sm btn-basic" type="button"><i class="glyphicon glyphicon-edit"></i></button></a>
                                                </span>
                                            </div>
                                        </div>
                                    </form>
                                </section>
                            </div>
                            <div id="menu2" class="tab-pane fade">
                                <h3>Lịch sử đơn hàng</h3><br>
                                <div class="card mb-4"  style="width:95%;">
                                    <div class="card-body" >
                                        <div class="dataTable-wrapper dataTable-loading no-footer sortable searchable fixed-columns">
                                            <div class="dataTable-container">
                                                <table id="datatablesSimple" class="dataTable-table">
                                                    <thead class="text-center">
                                                        <tr>
                                                            <th data-sortable="" style="width: 8%"><a href="#" class="dataTable-sorter">STT</a></th>
                                                            <th data-sortable="" style="width: 25%"><a href="#" class="dataTable-sorter">Tên khách hàng</a></th>
                                                            <th data-sortable="" style="width: 30%"><a href="#" class="dataTable-sorter">Số điện thoại</a></th>
                                                            <th data-sortable="" style="width: 25%"><a href="#" class="dataTable-sorter">Trạng thái</a></th>
                                                            <th data-sortable="" style="width: 15%"><a href="#" class="dataTable-sorter"> Chức năng</a></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php $stt =1;
                                                        foreach($transaction as $item) :  ?>
                                                        <tr>
                                                            <td><?php echo $stt ?></td>
                                                            <td><?php echo $item['nameuser'] ?></td>
                                                            <td><?php echo $item['phone'] ?></td>
                                                            <td>
                                                                <a href="#" class="btn btn-xs <?php echo $item['status'] ==0 ? 'btn-warning':'btn-info' ?>"><?php echo $item['status'] == 0 ? 'Chưa xử lý' : 'Đã xử lý' ?></a>
                                                            </td>
                                                            <td>
                                                                <a class="btn btn-success" href="detail.php?id=<?php echo $item['id']?>">Chi tiết</a>
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
        </div>
    
    </div>
    </div>

<?php require_once __DIR__. "/layouts/footer.php"; ?>