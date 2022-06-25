<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Trang quản trị</title>
        <link href="<?php echo base_url() ?>/asset/admin/css//styles.css" rel="stylesheet" />
       
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
        <script src="<?php echo base_url() ?>/asset/ckeditor/ckeditor.js"></script>
        <script src="<?php echo base_url() ?>/asset/ckfinder/ckfinder.js"></script>
    </head>
    <body>
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <h5 class="navbar-brand ps-3">Trang quản trị</h5>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!" onclick="open_nav()"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
             <!-- Top Menu Items -->
             <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-0 my-1 my-md-0">
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-5 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i><?php echo $_SESSION['admin_name']?></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                      
                        <li>
                            <hr class="dropdown-divider" />
                        </li>
                        <li><a class="dropdown-item" href="/doantotnghiep/admin/dang-xuat-admin.php">Đăng xuất</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav" >
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading"></div>
                            <a class="nav-link <?php echo isset($open) && $open =='dashboard' ? 'active' : ''?>" href="<?php echo base_url() ?>/admin">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Bảng điều khiển
                            </a>
                            <div class="sb-sidenav-menu-heading">Quản lý</div>
                            <li class="">
                                <a class="nav-link <?php echo isset($open) && $open =='slide' ? 'active' : ''?> " href="<?php echo modules("slide")?>">
                                    <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                    Thanh trượt
                                    <div class="sb-sidenav-collapse-arrow"></div>
                                </a>
                            </li>
                            <li class="">
                                <a class="nav-link <?php echo isset($open) && $open =='category' ? 'active' : ''?> " href="<?php echo modules("category")?>">
                                    <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                    Danh mục sản phẩm
                                    <div class="sb-sidenav-collapse-arrow"></div>
                                </a>
                            </li>
                            <li class="">
                                <a class="nav-link <?php echo isset($open) && $open =='product' ? 'active' : ''?>" href="<?php echo modules("product")?>" >
                                    <div class="sb-nav-link-icon"><i class="fa-brands fa-product-hunt"></i></div>
                                    Sản phẩm
                                    <div class="sb-sidenav-collapse-arrow"></div>
                                </a>
                            </li>
                            <li class="">
                                <a class="nav-link <?php echo isset($open) && $open =='user' ? 'active' : ''?>" href="<?php echo modules("user")?>" >
                                    <div class="sb-nav-link-icon"><i class="fa-solid fa-users"></i></div>
                                    Tài khoản khách hàng
                                    <div class="sb-sidenav-collapse-arrow"></div>
                                </a>
                            </li>
                         
                            <li class="level-admin"  style="<?php echo $level[0]['level']=="1" ? 'display:none' : 'display:block' ?>">
                                <a class="nav-link <?php echo isset($open) && $open =='admin' ? 'active' : ''?>" href="<?php echo modules("admin")?>" >
                                    <div class="sb-nav-link-icon"><i class="fa fa-user"></i></div>
                                    Tài khoản người quản trị
                                    <div class="sb-sidenav-collapse-arrow"></div>
                                </a>
                            </li>
                            <li class="">
                                <a class="nav-link <?php echo isset($open) && $open =='transaction' ? 'active' : ''?>" href="<?php echo modules("transaction")?>" >
                                    <div class="sb-nav-link-icon"><i class="fa-brands fa-artstation"></i></div>
                                    Đơn hàng
                                    <div class="sb-sidenav-collapse-arrow"></div>
                                </a>
                            </li>
                           <li>
                            <a class="nav-link  <?php echo isset($open) && $open =='news' ? 'active' : ''?>" href="<?php echo modules("news")?>" >
                                    <div class="sb-nav-link-icon"><i class="fa-solid fa-blog"></i></div>
                                    Tin tức
                                    <div class="sb-sidenav-collapse-arrow"></div>
                                </a>
                           </li>
                            <div class="sb-sidenav-menu-heading">Thống kê</div>
                           <li>
                            <a class="nav-link <?php echo isset($open) && $open =='doanhthu' ? 'active' : ''?> " href=" <?php echo modules("doanhthu.php")?>">
                                    <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                                    Doanh thu
                                    <div class="sb-sidenav-collapse-arrow"></div>
                                </a>
                           </li>
                          <li>
                            <a class="nav-link <?php echo isset($open) && $open =='sanphamsaphet' ? 'active' : ''?>" href=" <?php echo modules("san-pham-sap-het.php")?>" >
                                    <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                                    Mặt hàng sắp hết
                                    <div class="sb-sidenav-collapse-arrow"></div>
                            </a>
                          </li>
                        </div>
                    </div>
                  
                </nav>
            </div>
          