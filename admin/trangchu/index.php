<?php
    require '../model/modelClass.php';
    $model = new modelClass();
    $list_nongthuysan = $model->nongthuysanGetAll();
    $list_khuvuc = $model->khuvucnuoitrongGetAll();
    $list_chart = $model->khuvucnuoitrongGetChart();
    $label_chart = [];
    $data_chart = [];
    foreach($list_chart as $item){
        $label_chart[] = $item->ten_khu_vuc;
        $data_chart[] = $item->so_luong;
    }
?>

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Thống kê</h1>

</div>

<div>
    <canvas id="myChart"></canvas>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
const ctx = document.getElementById('myChart');

new Chart(ctx, {
    type: 'bar',
    data: {
        labels: <?=json_encode($label_chart)?>,
        datasets: [{
            label: 'Số lượng nông thủy sản',
            data: <?=json_encode($data_chart)?>,
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});
</script>