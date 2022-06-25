<?php include("../autoload/autoload.php") ?>
<?php
    $open = "category";
    // require_once __DIR__. "/../../autoload/autoload.php";
    $category = $db->fetchAll("category");
?>
<?php include("../layouts/header.php") ?>
<div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                       <div class="nav-tittle">
                       <h2 class="mt-4">Danh sách danh mục</h2>
                       </div>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="<?php echo base_url() ?>/admin">Dashboard</a></li>
                            <li class="breadcrumb-item active">Danh mục</li>
                        </ol>
                        <div class="card mb-4">
                           <?php var_dump($category) ?>
                        </div>
                    </div>
                </main>
      
<?php require_once __DIR__. "/../layouts/footer.php"; ?>