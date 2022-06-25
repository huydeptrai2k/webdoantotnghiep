<?php 
   require_once __DIR__. "/autoload/autoload.php";

   $sqlHomecate = "SELECT name, id FROM category WHERE home = 1 ORDER BY updated_at LIMIT 3";
   $CategoryHome = $db->fetchsql($sqlHomecate);
   $data = [];
   foreach ($CategoryHome as $item)
   {
       $cateId = intval($item['id']);
       $sql = "SELECT * FROM product WHERE category_id = $cateId  LIMIT 3";
       $ProductHome = $db->fetchsql($sql);
       $data[$item['name']] = $ProductHome;
       
   }
   $sqlSlide = "SELECT * FROM slide WHERE home = 1 ORDER BY ID DESC ";
   $SlideHome = $db ->fetchsql($sqlSlide);

?>

<?php require_once __DIR__. "/layouts/header.php"; ?>
<div class="col-md-9 ">
    <section id="slide" class="text-center" >
        <div id="myCarousel" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->
            <style type="text/css">
                .carousel-indicators li {border-radius: 10px; border: 1px solid gray; height: 4px; width: 30px; margin-left: 3px; margin-right: 3px; text-indent: -999px; background-color: transparent;}
                .carousel-indicators .active {border-radius: 10px; height: 6px; width: 30px; margin-left: 3px; margin-right: 3px; text-indent: -999px; background-color: honeydew;}
                @keyframes zoom {
                from {
                transform: scale(1,1);
                }
                to {
                transform: scale(1.2,1.2);
                }
                }
                #imgslide {
                width: 100%;
                height: 40%;
                animation: zoom 3s infinite alternate;
                }
            </style>
            <ol class="carousel-indicators">
            <?php foreach($SlideHome as $key => $item): ?>
                <?php if($key ==0):?>
                <li data-target="#myCarousel" data-slide-to="<?php echo $key ?>" class="active"></li>
                <?php else :?>
                <li data-target="#myCarousel" data-slide-to="<?php echo $key ?>"></li>
                    <?php endif; ?>
                    <?php endforeach; ?>
            </ol>
            <!-- Wrapper for slides -->
            <div class="carousel-inner">
            <?php foreach($SlideHome as $key => $item): ?>
                <?php if($key ==0):?>
                <div class="item active">
                    <img id="imgslide" src="<?php  echo asset_uploads() ?>slide/<?php echo $item['thunbar']?>" alt="">
                    <div class="carousel-caption">
                        <h3 style="color:red"><?php echo $item['title'] ?></h3>
                        <p style="color:yellow"><?php echo $item['content'] ?></p>
                    </div>
                </div>
                <?php else :  ?>
                <div class="item">
                    <img id="imgslide" src="<?php  echo asset_uploads() ?>slide/<?php echo $item['thunbar']?>" alt="">
                    <div class="carousel-caption">
                    <h3 style="color:red"><?php echo $item['title'] ?></h3>
                        <p style="color:yellow"><?php echo $item['content'] ?></p>
                    </div>
                </div>
                <?php endif;?>
              <?php  endforeach ;?>
            </div>
            <!-- Left and right controls -->
            <a class="left carousel-control" href="#myCarousel" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left"></span>
            <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#myCarousel" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right"></span>
            <span class="sr-only">Next</span>
            </a>
        </div>
    </section>
</div>
<div class="col-md-12">
    <section class="box-main1">
            
            <h3 class="title-main">
                <a href="" style="text-decoration: none"> Sản phẩm mới </a>
                <p style="margin-bottom: -14px; margin-top: -3px" class="arrow">
            </h3>
            <div class="showitem clearfix">
                <?php foreach($productNew as $item): ?>
                <div class="col-md-2  item-product bor">
                    <a href="chi-tiet-san-pham.php?id=<?php echo $item['id']?>">
                    <img src="<?php echo asset_uploads() ?>product/<?php echo $item['thunbar']?>" class="" width="100%" height="180">
                    </a>
                    <div class="info-item">
                        <a href="chi-tiet-san-pham.php?id=<?php echo $item['id']?>"></a>
                        <?php echo $item['name']?>
                        <p> 
                            <strike class="sale">Giá gốc: <?php echo formatPrice($item['price'])?></strike> 
                            <br> 
                            <b class="price">Giá: <?php echo formatPriceSale($item['price'],$item['sale']) ?></b>
                        </p>
                    </div>
                    <div class="hidenitem">
                        <p><a href="chi-tiet-san-pham.php?id=<?php echo $item['id']?>"><i class="fa fa-search"></i></a></p>
                        <!-- <p><a href="heart.php?id=<?php echo $item['id']?> "><i class="fa fa-heart"></i></a></p> -->
                        <p><a href="add-cart.php?id=<?php echo $item['id'] ?>"><i class="fa fa-shopping-basket"></i></a></p>
                    </div>
                </div>
                <?php endforeach ?>
            
            </div>
        
    </section>
    <section class="banner" style="margin-top:10px ; margin-bottom:15px">
        <img src="asset/frontend/images/32.jpeg" alt="" width="100%" height="150">

    </section>
    <section class="box-main1">
            
            <h3 class="title-main">
                <a href="" style="text-decoration: none"> Sản phẩm bán chạy </a>
                <p style="margin-bottom: -14px; margin-top: -3px" class="arrow">
            </h3>
            <div class="showitem clearfix">
            <?php foreach($productPay as $item): ?>
                <div class="col-md-2  item-product bor">
                    <a href="chi-tiet-san-pham.php?id=<?php echo $item['id']?>">
                    <img src="<?php echo asset_uploads() ?>product/<?php echo $item['thunbar']?>" class="" width="100%" height="180">
                    </a>
                    <div class="info-item">
                        <a href="chi-tiet-san-pham.php?id=<?php echo $item['id']?>"></a>
                        <?php echo $item['name']?>
                        <p> 
                            <strike class="sale">Giá gốc: <?php echo formatPrice($item['price'])?></strike> 
                            <br> 
                            <b class="price">Giá: <?php echo formatPriceSale($item['price'],$item['sale']) ?></b>
                        </p>
                    </div>
                    <div class="hidenitem">
                        <p><a href="chi-tiet-san-pham.php?id=<?php echo $item['id']?>"><i class="fa fa-search"></i></a></p>
                        <!-- <p><a href="heart.php?id=<?php echo $item['id'] ?>"><i class="<?php echo $item['head'] !=0 ? 'fa fa-heart:hover' :'fa fa-heart' ?>"></i></a></p> -->
                        <p><a href="add-cart.php?id=<?php echo $item['id'] ?>"><i class="fa fa-shopping-basket"></i></a></p>
                    </div>
                </div>
                <?php endforeach ?>
            
            </div>
        
        </section>
        <section class="banner" style="margin-top:10px ; margin-bottom:15px">
            <img src="asset/frontend/images/vnvd.jpg" alt="" width="100%" height="150">

        </section>
        <section class="box-main1">
           <div class="row">
           <?php foreach($data as $key => $value): ?>
                <div class="category-product">
                <div class="col-sm-4">
                        <div class="box-left box-menu ">
                            <h3 class="title-main"><a style="text-decoration: none">
                            <?php echo $key?></a><p style="margin-bottom: -14px; margin-top: -3px" class="arrow"></h3>
                            <ul class="list-item-category" >
                               <?php  foreach($value as $item): ?>
                                <li class="clearfix">
                                    <a href="chi-tiet-san-pham.php?id=<?php echo $item['id']?>">
                                        <img src="<?php echo asset_uploads() ?>/product/<?php echo $item['thunbar'] ?>" class="img-responsive pull-left" width="40%" height="45px">
                                        <div class="info pull-right">
                                            <p class="name"><?php echo $item['name']?></p>
                                            <b class="sale">Giá gốc: <?php echo formatPrice($item['price'])?></b><br>
                                            <b class="price">Giá: <?php echo formatPriceSale($item['price'],$item['sale']) ?></b><br>
                                            <span class="view"><i class="fa fa-eye"></i> code : 1250 </span>
                                        </div>
                                    </a>
                                </li>
                               <?php endforeach; ?>
                            </ul>
                        </div>
                </div>
                </div>
                <?php endforeach ?>
           </div>
               
    </section>
   
   
</div>
<?php require_once __DIR__. "/layouts/footer.php"; ?>