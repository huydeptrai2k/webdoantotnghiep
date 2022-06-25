<!DOCTYPE html>
<html>
    <head>
        <title>Gia Phát Mobile</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="shortcut icon" type="image/png" href="">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>/asset/frontend/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>/asset/frontend/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>/asset/frontend/css/style.css?v=?">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="<?php echo base_url() ?>/asset/frontend/js/jquery-3.2.1.min.js"></script>
        <script src="<?php echo base_url() ?>/asset/frontend/js/bootstrap.min.js"></script>
        <script src="https://apis.google.com/js/platform.js" async defer></script>
        <meta name="google-signin-client_id" content="204097884474-cndods9sgpqnvhfm1dg7soih5j5hh50u.apps.googleusercontent.com">

    </head>
    <body>
        <div id="wrapper">
            <div id="header">
                <div id="header-top">
                    <div class="container">
                        <div class="row clearfix">
                            <!-- <div class="col-md-5" id="header-text">
                                <a>Welcome</a>to Gia Phát Mobile
                            </div> -->
                            <div class="col-md-6 pull-right">
                                <nav id="header-nav-top">
                                    <ul class="list-inline pull-right" id="headermenu">
                                        <?php if(isset($_SESSION['name_user'])): ?>
                                            <li >
                                                <a href=""><i class="fa fa-user"></i> Tài khoản <i class="fa fa-caret-down"></i></a>
                                                <ul id="header-submenu"  style="width :55%">
                                                    <li style="width :100%"><a href="info-user.php">Thông tin</a></li>
                                                    <li style="width :100%"><a href="gio-hang.php">Giỏ hàng</a></li>
                                                    <li style="width :100%"><a href="dang-xuat.php">Đăng xuất</a></li>
                                                </ul>
                                            </li>
                                            <li style="color:blue">Xin chào: <?php echo $_SESSION['name_user'] ?></li>
                                            
                                          <?php else : ?>
                                            <li>
                                                <a href="dang-ky.php"><i class="fa fa-unlock"></i> Đăng ký</a>
                                            </li>
                                            
                                            <li>
                                                <a href="dang-nhap.php"><i class="fa fa-share-square-o"></i> Đăng nhập</a>
                                            </li>
                                        <?php endif ;?>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
                <div style="margin-top: -15px; margin-bottom: -20px; " class="container" >
                    <div class="row" id="header-main" >
                        
                        <div style="margin: auto; width:50%;" class="col-md-4">
                            <a href=""><img height="80px" width="90%" src="<?php echo base_url() ?>/asset/frontend/images/3.png"></a>
                        </div>
                        <div class="col-md-5" id="header-right">
                            <div class="pull-right" style="margin-top:4%">
                                <div class="pull-left">
                                    <i class="glyphicon glyphicon-phone-alt"></i>
                                </div>
                                <div class="pull-right">
                                    <p id="hotline">HOTLINE</p>
                                    <p>0384556789</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="menunav">
                <div class="container" style="padding-top:1px;padding-bottom: 1px;">
                    <nav>
                        <div class="home pull-left" style="margin-left: 2%;">
                            <a href="index.php">Trang chủ</a>
                        </div>
                        <ul id="menu-main">
                            <li>
                                <a href="introduce.php">Giới thiệu</a>
                            </li>
                            <li>
                                <a href="contact.php">Liên hệ</a>
                            </li>
                            <li>
                                <a href="news.php">Tin Tức</a>
                            </li>
                            
                         
                        </ul>
                        <ul id="form-seach-item">
                        <li class="">
                                <style type="text/css">
                                    .fc:focus
                                    {
                                        box-shadow: 0 0 10px dimgray;
                                    }
                                    #menunav{
                                        background-color: #11556B;
                                    }
                                </style>
                                <form  action="search.php" class="form-inline pull-left" method="GET">
                                    <input required style="margin-top: 4px;width:auto; height: 32px; background-color: 7FFFD4;  border-color: #353535; border-radius: 3px;margin-left:15px"
                                     class="form-control fc" type="text" placeholder="Tìm kiếm..." name="search"> 
                                    <button style="margin-top: 4px; height: 32px; background-color:	#DC143C; color: white; border-color: #444" class="fa fa-search form-control"
                                     type="submit" name="submit">
                                    </button>
                                </form>
                                
                            </li>
                        </ul>
                     <div class="baner-gio">
                     <ul class="pull-right" id="main-shopping">

                        <li>
                            <a style="background-color: #ea3a3c;" href="gio-hang.php"><i style="background-color: #ea3a3c" class="fa fa-shopping-bag"></i> &nbspGiỏ hàng<i class="sosp" style="margin-left: 6px; padding: 6px 10px; font-style: normal; border-radius: 3px;"><?php if (isset($_SESSION['sosp'])) {echo $_SESSION['sosp'];} else {echo "0";} ?></i></a>
                        </li>
                        </ul>
                        <ul class="pull-right arrow-left" id="muiten">
                        <li>
                            <a style="background-color: #ea3a3c" href=""></a>
                        </li>
                        </ul>
                     </div>
                    </nav>
                </div>
            </div>
            <div id="maincontent">
                <div class="container">
                    <div class="col-md-3  fixside" id="menucategory">
                        <div class="box-left box-menu" >
                            <h3 class="box-title"><i class="fa fa-list"></i>&nbsp&nbsp Danh mục</h3>
                                <ul>
                                    <?php  foreach($category as $item): ?>
                                        <?php $idcate = $item['id'];
                                         $sql = "SELECT id FROM product WHERE category_id = $idcate";
                                        $total = count($db->fetchsql($sql)); ?>
                                    <li>
                                        <a href="danh-muc-san-pham.php?id=<?php echo $item['id']?>"><?php echo $item['name']?><span class="badge pull-right"><?php echo $total ?></span></a>
                                    </li>
                                    <?php endforeach;?>                                
                                </ul>
                            
                        </div>
                        
                      
                    </div>