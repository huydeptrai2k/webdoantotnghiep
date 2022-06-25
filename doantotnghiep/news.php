<?php 
   require_once __DIR__. "/autoload/autoload.php";
?>
<style>
    #menucategory{
        display: none;
    }
    .form-inline{
        display: none; 
    }
</style>
<?php 
 $id = intval(getInput('id'));
    if(isset($_GET['p'])){
        $p = $_GET['p'];
    }else{
        $p = 1;
    }
  
    $sql = "SELECT news.* ,admin.name as namead FROM news 
    LEFT JOIN admin ON admin.id = news.author";
      $total = count($db->fetchsql($sql));
    $news = $db->fetchJones('news',$sql,$total,$p,4,true);

    if(isset($news['page'])){
        $sotrang = $news['page'];
        unset($news['page']);
        }
        $path = $_SERVER['SCRIPT_NAME'];
    
?>
<?php require_once __DIR__. "/layouts/header.php"; ?>
    <div class="col-md-12 ">
        <div class="row">
        <?php  foreach($news as $item): ?>
            <div class="post clearfix bor">
                <img src="<?php echo asset_uploads() ?>news/<?php echo $item['thunbar'] ?>" alt="" class="post-image">
                <div class="post-preview">

                    <h2 style="color:blue" class=" title-blog"><a href="single.php?id=<?php echo $item['id']?>"><?php echo $item['title'] ?></a> </h2>
                    <i class="fa fa-user"><?php echo $item['namead'] ?></i> &nbsp;
                     <i class="far fa-calendar"><?php echo $item['updated_at'] ?></i>
                    <p class="preview-text">
                    <?php echo $item['summary'] ?>
                    </p>
                    <a href="single.php?id=<?php echo $item['id']?>" class="btn read-more">Đọc tiếp</a>

                </div>
            </div>
            <?php endforeach; ?>
           
        </div>
        <nav class="text-center">
            <ul class="pagination">
                <?php for($i=1;$i<=$sotrang;$i++) : ?>
                    <li class="<?php echo isset($_GET['p']) && $_GET['p'] == $i ? 'page-item active' : '' ?>">
                        <a class="page-link" href="<?php echo $path ?> ?id=<?php echo $id ?> &&p=<?php echo $i?>"><?php echo $i ?></a></li>
                <?php endfor ?>
                
               
            </ul>
            </nav>
        
    </div>

<?php require_once __DIR__. "/layouts/footer.php"; ?>