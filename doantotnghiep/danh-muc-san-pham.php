<?php 
   require_once __DIR__. "/autoload/autoload.php";

   $id = intval(getInput('id'));

   $EditCategory = $db->fetchID("category",$id);
       
   if(isset($_GET['p'])){
    $p = $_GET['p'];
    }else{
        $p = 1;
    }
      
   if($_SERVER["REQUEST_METHOD"]=="POST" && isset($_POST['loc'])){
    $loc = postInput("loc");

    if($loc =="1"){
        $sql = "SELECT * FROM product WHERE category_id = $id ORDER BY price DESC  ";
    }else if($loc =="2"){
        $sql = "SELECT * FROM product WHERE category_id = $id ORDER BY price ASC  ";
    }else{
        $sql = "SELECT * FROM product WHERE category_id = $id ";
    }
  
   }else{
    $sql = "SELECT * FROM product WHERE category_id = $id ";
   }
   
   
   $total = count($db->fetchsql($sql));
   $product = $db->fetchJones("product",$sql,$total,$p,8,true);
  
   if(isset($product['page'])){
    $sotrang = $product['page'];
    unset($product['page']);
    }
    $path = $_SERVER['SCRIPT_NAME'];
    //    $sql = "SELECT * FROM product WHERE category_id = $id ";
    ?>

  

<?php require_once __DIR__. "/layouts/header.php"; ?>
    <div class="col-md-9 " style="margin-bottom:2%">
    <section class="banner" style="margin-top:10px ; margin-bottom:15px">
            <img src="<?php echo asset_uploads() ?>category/<?php echo $EditCategory['banner']?>" alt="" width="100%" height="260px">
            <div class="pull-right " style="margin-top:1%">
                <form action="" method="POST">
                  <div><strong>Lọc sản phẩm theo giá</strong></div>
                    <select name="loc" id="loc" style="padding:3px ; margin-top:1%">
                    <option value="0"> Lựa chọn</option>
                        <option value="1"> Giảm dần</option>
                        <option value="2">Tăng dần</option>
                    
                    </select>
                    <button type="submit" class="btn btn-success" style="padding:4px ;margin-bottom:1%" >Lọc</button>
                </form>
            </div>
        
        </section>
       
        
    </div>
    <div class="col-md-12">
    <section class="box-main1">
            <h3 class="title-main">
                <a href="" style="text-decoration: none"> <?php echo $EditCategory['name'] ?> </a>
                <p style="margin-bottom: -14px; margin-top: -3px" class="arrow">
            </h3>
            <div class="showitem clearfix">
                <?php foreach($product as $item): ?>
                <div class="col-md-2  item-product bor" >
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
                        <!-- <p><a href="heart.php?id=<?php echo $item['id'] ?>"><i class="fa fa-heart"></i></a></p> -->
                        <p><a href="add-cart.php?id=<?php echo $item['id'] ?>"><i class="fa fa-shopping-basket"></i></a></p>
                    </div>
                </div>
                <?php endforeach ?>
            
            </div>
            <nav class="text-center">
            <ul class="pagination">
                <?php for($i=1;$i<=$sotrang;$i++) : ?>
                    <li class="<?php echo isset($_GET['p']) && $_GET['p'] == $i ? 'page-item active' : '' ?>">
                        <a class="page-link" href="<?php echo $path?>?id=<?php echo $id ?>&&p=<?php echo $i?>"><?php echo $i ?></a></li>
                <?php endfor; ?>
                
               
            </ul>
            </nav>
        
         </section>
    </div>

<?php require_once __DIR__. "/layouts/footer.php"; ?>