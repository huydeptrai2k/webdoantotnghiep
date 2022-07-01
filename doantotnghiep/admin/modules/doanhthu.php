<?php include("../autoload/autoload.php") ?>
<?php
    $open = "doanhthu";
    if( $level[0]['level']=="1"){
        header("location: /doantotnghiep/admin/modules/news/");
    }
    if($_SERVER["REQUEST_METHOD"]=="POST" && isset($_POST['loc'])){
        $loc = postInput("loc");
    
        if($loc =="1"){
            $sql ="SELECT SUM(amount) as doanhthu , MONTHNAME(created_at) as monthname from transaction WHERE status =1 GROUP BY monthname  ORDER BY month(created_at) DESC LIMIT 12 ";
        }else if($loc =="2"){
            $sql = " SELECT SUM(amount) as doanhthu , YEAR(created_at) as monthname from transaction WHERE status =1  GROUP BY monthname ORDER BY YEAR(created_at) DESC LIMIT 12";
        }else{
            $sql =" SELECT SUM(amount) as doanhthu , DATE(created_at) as monthname from transaction WHERE status =1  GROUP BY monthname  ORDER BY DATE(created_at) DESC LIMIT 30";
        }
      
       }else{
        $sql =" SELECT SUM(amount) as doanhthu , DATE(created_at) as monthname from transaction WHERE status =1  GROUP BY monthname  ORDER BY DATE(created_at) DESC LIMIT 30 ";
       }
    //    SELECT SUM(amount) as doanhthu , DATE(created_at) as monthname from transaction WHERE status =1 and month(CURRENT_DATE)=month(created_at)  GROUP BY monthname  ORDER BY DATE(created_at) ASC 
   $dt = $db->fetchsql($sql);
   foreach($dt as $data){
       $month[] = $data['monthname'];
       $amount[] = $data['doanhthu'];
   }
?>
<?php include("../layouts/header.php") ?>
<div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                       <div class="nav-tittle">
                       <h2 class="mt-4">Doanh thu</h2>
                       </div>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="<?php echo base_url() ?>/admin">Bảng điều khiển</a></li>
                            <li class="breadcrumb-item active">Doanh thu</li>
                        </ol>
                        <form action="" method="POST">
                            <label for="">Hiển thị doanh thu</label>
                                    <select name="loc" id="loc"  style="padding:2px ;">
                                    <option value="0"> Ngày</option>
                                        <option value="1"> Tháng </option>
                                        <option value="2">Năm </option>
                                    
                                    </select>
                                    <button type="submit" class="btn btn-success" style="padding:2px ; margin-bottom:2.5px"  >Lọc</button>
                                </form>
                            
                        <div class="card mb-4 col-md-10">
                            <div class="card-header">    
                               Doanh thu
                            </div>
                            <div class="card-body"><canvas id="myBarChart" width="70%" height="30"></canvas></div>
                            <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
                       
                        </div>
                    </div>
                </main>
     
<?php require_once __DIR__. "/../layouts/footer.php"; ?>
<script>
     // Set new default font family and font color to mimic Bootstrap's default styling
    Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
    Chart.defaults.global.defaultFontColor = '#292b2c';

    // Bar Chart Example
    var ctx = document.getElementById("myBarChart");
    const lables = <?php echo json_encode($month) ?>;
    const datas = <?php echo json_encode($amount) ?>;
    var myLineChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: lables,
        datasets: [{
        label: "Doanh số",
        backgroundColor: "rgba(2,117,216,1)",
        borderColor: "rgba(2,117,216,1)",
        data: datas,
        }],
    },
    options: {
        scales: {
        xAxes: [{
            time: {
            unit: 'month'
            },
            gridLines: {
            display: false
            },
            ticks: {
            maxTicksLimit: 12
            }
        }],
        yAxes: [{
            ticks: {
            min: 0,
            max: 1000000000,
            maxTicksLimit: 10
            },
            gridLines: {
            display: true
            }
        }],
        },
        legend: {
        display: false
        }
    }
    });
 </script>