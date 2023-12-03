<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<canvas id="myChart" width="800px" height="200px"></canvas>
<?php

$doanhthu = [];
$time = [];
$thongke = thongke_doanhthu(); // return month_year , total_amount
foreach ($thongke as $tk) {
    extract($tk);
    array_push($doanhthu, $total_amount);
    array_push($time, $month_year);
}
print_r($doanhthu);
print_r($time);
echo '<script>';
echo 'const phpData = ' . json_encode($doanhthu) . ';';
echo 'const phpLabels = ' . json_encode($time) . ';';
echo '</script>';
?>

<div class="container">

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