<?php
    require '../model/hanghoaClass.php';
    require '../model/cososanxuatClass.php';
    $hh = new hanghoaClass();
    $cssx = new cososanxuatClass();
    if(isset($_GET['id_hang_hoa'])){
        $id_hang_hoa = $_GET['id_hang_hoa'];
        $list_cssx = $cssx->cososanxuatGetAll();
        $obj_hanghoa = $hh->hanghoaGetById($id_hang_hoa);
    }
  
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=$obj_hanghoa->ten_hang_hoa?></title>

    <link rel="stylesheet" href="../assets/vendor/bootstrap-5.1.3-dist/css/bootstrap.min.css" />
    <style>
    img.img-medium {
        width: 100%;
        max-width: 330px;
    }

    .card-container {
        display: flex;
        align-items: center;
        padding-top: 40px;
        padding-bottom: 40px;
        object-fit: fill;
        overflow-y: scroll;
    }

    .card-detail {
        width: 100%;
        max-width: 330px;
        padding: 15px;
        margin: auto;
        box-shadow: rgba(0, 0, 0, 0.16) 0px 3px 6px, rgba(0, 0, 0, 0.23) 0px 3px 6px;
    }

    .card-footer {
        text-align: center;
    }
    </style>
</head>

<body>
    <div class="card-container">
        <div class="card h-100 card-detail">
            <img src="../admin/hanghoa/<?=$obj_hanghoa->hinh_anh?>" class="card-img-top img-medium" alt="...">
            <div class="card-body">
                <h5 class="card-title">Thông tin <?=$obj_hanghoa->ten_hang_hoa?></h5>
                <li class="card-text">Loại: <?=$obj_hanghoa->phan_loai == "1" ? "Nông sản" : "Thủy sản"?></li>
                <li class="card-text">Cơ sở sản xuất: <?=$cssx->cososanxuatGetById($obj_hanghoa->id_cssx)->ten_cssx?>
                </li>
            </div>
            <div class="card-footer">
                <small class="text-muted"><img src="../admin/hanghoa/<?=$obj_hanghoa->qr_image?>" alt=""></small>
            </div>
        </div>
    </div>
</body>
<script src="../assets/vendor/bootstrap-5.1.3-dist/js/bootstrap.bundle.min.js"></script>
<script src="../assets/vendor/jquery-3.6.1.min.jss"></script>

</html>