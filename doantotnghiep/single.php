<?php 
   require_once __DIR__. "/autoload/autoload.php";

   $id = intval(getInput('id'));

   //lay thong tin bai viet
 
    $blog = $db->fetchID("news",$id);
?>
<style>
    #menucategory{
        display: none;
    }
    .form-inline{
        display: none; 
    }
</style>

<?php require_once __DIR__. "/layouts/header.php"; ?>
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v8.0" nonce="I8LXZuTB"></script>
    <div class="col-md-9 " style="margin-bottom:2%">
        <section class="banner" style="margin-top:10px ; margin-bottom:15px">
             <img src="<?php echo asset_uploads() ?>news/<?php echo $blog['thunbar'] ?>" alt="" width="100%" height="255px"">

        </section>
        <section class="box-main1" >
            <div class="page-wrapper">
            <!-- Content-->
            <div class="content clearfix">

            <!-- Main Content wrapper-->
            <div class="main-content-wrapper">
                <div class="main-content single">
                    <h1 class="post-title"><?php echo $blog['title'] ?></h1>
                    <div class="post-content ">
                        <p><?php echo $blog['summary'] ?></p>
                        <p><?php echo $blog['content'] ?></p>
                        
                </div>
            </div>

        </section>
         <li class="list-group" style="margin-top:20px ; margin-bottom:15px">             
            <a href="news.php" class="btn btn-success pull-right"> Trở về trang tin tức >> </a>
        </li>
    </div>
    <div class="col-md-3 ">
    <div class="diachi-lienhe text-center" style="margin-top:2%;margin-bottom:2%">
                      <div class="fb-page" data-href="https://www.facebook.com/Gia-Ph%C3%A1t-Mobile-113833441342937" data-tabs="timeline" data-width="300" data-height="400" data-small-header="false" data-adapt-container-width="true"
                       data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/Gia-Ph%C3%A1t-Mobile-113833441342937" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/Gia-Ph%C3%A1t-Mobile-113833441342937">Gia Phát Mobile</a></blockquote></div>
                      </div>
    </div>

<?php require_once __DIR__. "/layouts/footer.php"; ?>