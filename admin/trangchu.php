<div class="content">
    <h1 style="color: rgb(90, 92, 105);">Thống kê</h1>
    <div class="boxes">
        <div class="box">
            <h6 style="color: rgb(90, 92, 105);">Tổng sản phẩm</h6>
            <p style="color:rgb(90, 92, 105)"><?= $count_sanpham['tong_sanpham'] ?></p>
        </div>
        <div class="box">
            <h6 style="color: rgb(90, 92, 105);">Tổng danh mục</h6>
            <p style="color:rgb(90, 92, 105)"><?= $count_danhmuc['tong_danhmuc'] ?></p>
        </div>
        <div class="box">
            <h6 style="color: rgb(90, 92, 105);">Tổng giá trị sản phẩm</h6>
            <p style="color:rgb(90, 92, 105)"><?= number_format($count_price_sanpham['tong_price_sanpham'])  ?>đ</p>
        </div>
        <div class="box">
            <h6 style="color: rgb(90, 92, 105);">Tổng số khách hàng</h6>
            <p style="color:rgb(90, 92, 105)"><?= $count_khachhang['tong_khachhang'] ?></p>
        </div>


    </div>
    <div class="chart">
        <div class="chart_left">
            <h1 style="color:#4e73df">Doanh thu theo tháng</h1>
            <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <canvas id="myChart" width="800px" height="380px" style="margin-top:30px"></canvas>
    <?php

    $doanhthu = [];
    $time = [];
    $thongke = thongke_doanhthu(); // return month_year , total_amount
    foreach ($thongke as $tk) {
        extract($tk);
        array_push($doanhthu, $total_amount);
        array_push($time, $month_year);
    }
    echo '<script>';
    echo 'const phpData = ' . json_encode($doanhthu) . ';';
    echo 'const phpLabels = ' . json_encode($time) . ';';
    echo '</script>';
    ?>

    <div class="container">

    </div>
        </div>
        <div class="chart_right">
            <h1 style="color:#4e73df">Revenue Sources</h1>
            <canvas id="dongHoChart" width="400" height="200"></canvas>
        </div>

    </div>
   
    <script>
        // Move data definition above the config object
        const labels = phpLabels;
        const data = {
            labels: labels,
            datasets: [{
                label: 'My First Dataset',
                data: phpData,
                fill: false,
                borderColor: 'rgb(75, 192, 192)',
                tension: 0.1
            }]
        };

        // Global Options
        const config = {
            type: 'line',
            data: data,
        };

        let myChart = document.getElementById('myChart').getContext('2d');
        new Chart(myChart, config);
    </script>
</div>

<script>
   var ctx = document.getElementById('dongHoChart').getContext('2d');
   
   var dongHoChart = new Chart(ctx, {
      type: 'bar', // Loại biểu đồ là bar (cột)
      data: {
         labels: ['Đồng hồ Thụy Sĩ', 'Đồng hồ Nhật Bản', 'Đồng hồ Thời Trang', 'Khác'],
         datasets: [{
            label: 'Số lượng',
            data: [30, 25, 20, 25], // Số liệu phân loại, có thể thay đổi dựa trên dữ liệu thực tế
            backgroundColor: ['#FF6384', '#36A2EB', '#FFCE56', '#4CAF50'] // Màu sắc của các cột
         }]
      },
      options: {
         responsive: true,
         scales: {
            y: {
               beginAtZero: true
            }
         }
      }
   });
</script>