<?php 
   require_once __DIR__. "/autoload/autoload.php";

   $id = intval(getInput('id'));

  //lay thong tin san pham

   $product = $db->fetchID("product",$id);
   $_SESSION['id_product'] = $product['id'];
   $id_product = $_SESSION['id_product'];

   //lấy danh mục sp 
   $cateId = intval($product['category_id']);
	//san pham kem theo
   $sql = "SELECT * FROM product WHERE category_id = $cateId ORDER BY ID DESC LIMIT 4";
   $productSimilar = $db->fetchsql($sql);
   // lay comment
   $sql2 = "SELECT * FROM comments WHERE id_product = $id_product ORDER BY ID DESC ";
   $comments = $db->fetchsql($sql2);
?>

<?php require_once __DIR__. "/layouts/header.php"; ?>
    <div class="col-md-9 bor">
        <section class="box-main1" >
	         <div class="col-md-6 text-center">
	            <img src="<?php echo asset_uploads() ?>product/<?php echo $product['thunbar'] ?>" class="img-responsive bor" id="imgmain" width="100%" height="370" data-zoom-image="">
	                
	            <!-- <ul class="text-center bor clearfix" id="imgdetail">
	                <li>
	                    <img src="<?php echo base_url() ?>/asset/frontend/images/iphone-6s.jpg" class="img-responsive pull-left" width="80" height="80">
	                </li>
                    <li>
	                    <img src="<?php echo base_url() ?>/asset/frontend/images/iphone-6s.jpg" class="img-responsive pull-left" width="80" height="80">
	                </li>
                    <li>
	                    <img src="<?php echo base_url() ?>/asset/frontend/images/iphone-6s.jpg" class="img-responsive pull-left" width="80" height="80">
	                </li>
	            </ul> -->
	        </div>
	        <div class="col-md-6 bor" style="margin-top: 20px;padding: 30px;">
	            <ul id="right">
	                 <li><h3><?php echo $product['name']?></h3></li>

                    <?php if($product['sale'] >0) :?>
                        <li>
		                    <p><strike class="sale">Giá cũ: <?php echo formatPrice($product['price']) ?><br></strike></p>
		                    <b class="price">Giá mới: <?php echo formatPriceSale($product['price'],$product['sale']) ?></b>
		                </li>
                    <?php else : ?>
                        
		                <li>
		                    <b class="price"><?php echo $product['price'] ?></b>
		                </li>
	                  

                    <?php  endif?>
	                 

	                    <li><a href="add-cart.php?id=<?php echo $product['id'] ?>" class="btn btn-default"> <i class="fa fa-shopping-basket"></i>Thêm vào giỏ hàng</a></li>
	               </ul>
	        </div>

	    </section>
    </div>
    <div class="col-md-12 " id="tabdetail" style="margin-bottom:2%">
	            <div class="row">
	                    
	                <ul class="nav nav-tabs">
	                    <li class="active"><a data-toggle="tab" href="#home">Mô tả sản phẩm</a></li>
	                    <!-- <li><a data-toggle="tab" href="#menu1">Thông tin khác </a></li> -->
	                    <li><a data-toggle="tab" href="#menu2">Bình luận sản phẩm</a></li>
	                </ul>
	                <div class="tab-content">
	                    <div id="home" class="tab-pane fade in active"> 
	                        <p><?php echo $product['content'] ?></p>
	                    </div>
	                    <div id="menu2" class="tab-pane fade">
	                        <h3>Bình luận:</h3><br>
	                        <style>
							    .pb-cmnt-textarea {							    	
							    	font-family: sans-serif;
							        resize: none;
							        padding: 10px;
							        height: 80px;
							        border: 1px solid #E8E8E8;
							    }
							    .btn {
							    	margin-top: 10px;
							    }

							    .thumbnail {
								    padding:0px;
								}
								.panel {
									position:relative;
								}
								.panel>.panel-heading:after,.panel>.panel-heading:before{
									position:absolute;
									top:11px;left:-16px;
									right:100%;
									width:0;
									height:0;
									display:block;
									content:" ";
									border-color:transparent;
									border-style:solid solid outset;
									pointer-events:none;
								}
								.panel>.panel-heading:after{
									border-width:7px;
									border-right-color:#f7f7f7;
									margin-top:1px;
									margin-left:2px;
								}
								.panel>.panel-heading:before{
									border-right-color:#ddd;
									border-width:8px;
								}
							</style>
							<div class="container pb-cmnt-container col-md-12">
								<div class="panel panel-info">
									<div class="panel-body">
										<form class="form-inline" action="comment.php" method="POST">
											<input type="hidden" name="name" value="<?php echo $_SESSION['name_user']; ?>">
											<input type="hidden" name="id_user" value="<?php echo $_SESSION['name_id']; ?>">
											<input type="hidden" name="id_product" value="<?php echo $_SESSION['id_product']; ?>">
											<textarea style="width: 100%;" placeholder="Viết bình luận..." rows="3" class="form-control pb-cmnt-textarea" name="comment"></textarea>
											<div class="btn-group">
												<button class="btn" type="button"><span class="fa fa-picture-o fa-lg"></span></button>
												<button class="btn" type="button"><span class="fa fa-video-camera fa-lg"></span></button>
												<button class="btn" type="button"><span class="fa fa-microphone fa-lg"></span></button>
												<button class="btn" type="button"><span class="fa fa-music fa-lg"></span></button>
											</div>
											<input class="btn btn-primary pull-right" type="submit" value="Share"></input>
										</form>
									</div>
								</div>
							</div>
							<script type="text/javascript">
								function replybox(id){
									var x = document.getElementById(id);
									if (x.style.display == "block"){
										x.style.display = "none";
									} else {
										x.style.display = "block";
									}
								}
							</script>
							<?php $numcmt = 0; $repbox = 1; foreach ($comments as $item): ?>
							<div class="container pb-cmnt-container col-md-12" style="margin-top: 10px;">
								<div class="panel panel-default">
									<div class="panel-heading">
										<strong><?php echo $item['name']; ?></strong> <span class="text-muted pull-right"><?php echo $item['created_at']; ?></span>
									</div>
									<div class="panel-body">
									<?php echo $item['comment']; ?>
									 <br>
									<a class="btn btn-xs btn-default pull-right" onclick="replybox('<?php echo $repbox; ?>')"><i class="fa fa-comments-o"></i>&nbsp;Trả lời</a>
									<?php if (isset($_SESSION['name_user'])): ?>
										<?php if ($_SESSION['name_user'] == $item['name']): ?>
										<a class="btn btn-xs btn-default pull-right" href="delete-comment.php?id=<?php echo $item['id'] ?>"><i class="fa fa-trash"></i>&nbsp;Xóa</a>
										<?php endif; ?>
									<?php endif;?>
									
									</div>
								</div>
								<div style="display: none;" id="<?php echo $repbox; ?>" class="container pb-cmnt-container col-md-11 pull-right">
									<div class="panel panel-info">
										<div class="panel-body" style="padding: 12px;">
											<form style="display: flex; flex-direction: row;" class="form-inline" action="reply.php" method="POST">
												<input type="hidden" name="name" value="<?php echo $_SESSION['name_user']; ?>">
												<input type="hidden" name="user_id" value="<?php echo $_SESSION['name_id']; ?>">">
												<input type="hidden" name="id_product" value="<?php echo $_SESSION['id_product']; ?>">
												<input type="hidden" name="id_comment" value="<?php echo $item['id']; ?>">
												<textarea style="width: 100%;" placeholder="Viết bình luận..." class="form-control" name="comment"></textarea>					
												<input style="margin: auto; padding: 5px; margin-left: 8px;" class="btn btn-basic btn-sm pull-right" type="submit" value="Reply"></input>
											</form>
										</div>
									</div>							
								</div>
								<?php $id_comment = $item['id']; ?>
								<?php $sql3 = "SELECT * FROM reply WHERE id_comment = $id_comment ORDER BY id DESC";
    							$reply = $db->fetchsql($sql3); ?>
								<?php foreach ($reply as $items): ?>	
																
									<div class="container pb-cmnt-container col-md-11 pull-right" style="margin-top: 10px;">
										<div class="panel panel-default">
											<div class="panel-heading">
												<strong><?php echo $items['name']; ?></strong> <span class="text-muted pull-right"><?php echo $items['created_at']; ?></span>
											</div>
											<div class="panel-body"><?php echo $items['comment']; ?><br>
											<?php if (isset($_SESSION['name_user'])): ?>
													<?php if ($_SESSION['name_user'] == $items['name']): ?>
													<a class="btn btn-xs btn-default pull-right" href="delete-reply.php?id=<?php echo $items['id'] ?>"><i class="fa fa-trash"></i>&nbsp;Xóa</a>
													<?php endif; ?>
												<?php endif; ?>
											</div>
										</div>
									</div>
									<?php endforeach; ?>
							</div>
							<?php $numcmt++; $repbox++; endforeach; ?>
							<?php if($numcmt == 0): ?>
							<div class="container pb-cmnt-container col-md-12">
								<i style="font-size: 16px;">Không có bình luận nào...</i>
							</div>
							<?php endif;?>						
					</div> 
				</div>
			</div>
		</div>
        <div class="col-md-12 " style="margin-bottom:2%">
            <h4>Sản phẩm tương tự</h4>
        <div class="showitem clearfix">
                <?php foreach($productSimilar as $item): ?>
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
                        <!-- <p><a href=""><i class="fa fa-heart"></i></a></p> -->
                        <p><a href="add-cart.php?id=<?php echo $item['id'] ?>"><i class="fa fa-shopping-basket"></i></a></p>
                    </div>
                </div>
                <?php endforeach ?>
            
            </div>
        </div>

<?php require_once __DIR__. "/layouts/footer.php"; ?>