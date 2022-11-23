<?php
    require './model/modelClass.php';
    require './assets/vendor/phpqrcode/qrlib.php';

    $model = new modelClass();
    $list_nongsan = $model->nongthuysanGetBy(1);
    $list_thuysan = $model->nongthuysanGetBy(2);
    $list_nongthuysan = $model->nongthuysanGetAllTable();
    $localIP = getHostByName(getHostName());   
    
    $path = "qr_image/";
    foreach($list_nongthuysan as $item){
    $path_old = "./admin/nongthuysan/$item->qr_image";
        
        if(!file_exists($path_old)){
            unset($path_old);
        }
        $qr_image = "./admin/nongthuysan/qr_image/".$item->id_nts.".png";
        $qr_link = "http://$localIP/qrcode/nongthuysan/nongthuysan.php?id_nts=$item->id_nts";
        $res = $model->qrcodeUpdate($item->id_qr_code,"qr_image/$item->id_nts.png",$qr_link,$item->id_nts);
        if($res){
            QRcode::png($qr_link ,$qr_image,"h",3,3);
        }
    }

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>product's origin</title>
    <link rel="stylesheet" href="./assets/vendor/bootstrap-5.1.3-dist/css/bootstrap.min.css" />

    <style>
    a {
        text-decoration: none;
    }

    .btn-chitiet {
        display: flex;
        margin: auto;
        opacity: 0.8;

    }

    img.card-img-small {
        position: absolute;
        text-align: flex;
        top: 0;
        right: 0;
        border-radius: 10px;
        width: 100px;
    }

    .card-title {
        color: tomato;
        font-size: 16px;
        font-weight: bold;
        text-transform: uppercase
    }

    .card-text {
        color: black !important;
    }
    </style>
</head>

<body>

    <div class="container py-3">
        <?php require 'header.php'?>
        <div class="p-3 pb-md-4 mx-auto text-center">
            <h1 class="display-4 fw-normal">Website</h1>
            <p class="fs-5 text-muted"> Truy xuất nguồn gốc nông sản và thủy sản.
            </p>
            <hr>
        </div>
        <section class="text-center">
            <div class="container">
                <br>
                <h1 class="jumbotron-heading"><b>DANH SÁCH NÔNG SẢN</b></h1>
                <br>
            </div>
        </section>
        <section class="">
            <div class="danhsachsanpham py-5 bg-light">
                <div class="row" style=" margin-right: 20px; margin-left: 20px;">
                    <?php foreach ($list_nongsan as $item):?>
                    <div class="col-sm-3">
                        <div class="card ksanpham mb-4 shadow-sm">
                            <a href="./nongthuysan/nongthuysan.php?id_nts=<?= $item->id_nts ?>">
                                <img class="card-img-small" src="./admin/nongthuysan/<?=$item->qr_image?>">
                                <img class="bd-placeholder-img card-img-top"
                                    src="./admin/nongthuysan/<?=$item->hinh_anh?>">
                                <div class="card-body">
                                    <div class="card-title"><?= $item->ten_nts; ?></div>
                                    <div class="card-text"> <?= $item->mo_ta?> </div>
                                    <button class="btn btn-outline-danger btn-chitiet">
                                        Chi Tiết
                                    </button>
                                </div>
                            </a>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <section class="text-center">
                <div class="container">
                    <br>
                    <h1 class="jumbotron-heading"><b>DANH SÁCH THỦY SẢN</b></h1>
                    <br>
                </div>
            </section>
            <section class="">
                <div class="danhsachsanpham py-5 bg-light">
                    <div class="row" style=" margin-right: 20px; margin-left: 20px;">
                        <?php foreach ($list_thuysan as $item):?>
                        <div class="col-sm-3">
                            <div class="card ksanpham mb-4 shadow-sm">
                                <a href="./nongthuysan/nongthuysan.php?id_nts=<?= $item->id_nts ?>">
                                    <img class="bd-placeholder-img card-img-top"
                                        src="./admin/nongthuysan/<?=$item->hinh_anh?>">
                                    <div class="card-body">
                                        <h5 style="height: 20px;" class="card-title"><?= $item->ten_nts; ?></h5>
                                        <p style="height: 12px;" class="card-text">
                                            <?= $item->mo_ta?> </p>

                                        <button class="btn btn-outline-danger btn-chitiet">
                                            Chi Tiết
                                        </button>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>
    </div>
    <?php require 'footer.php'?>

</body>
<script src="./assets/vendor/bootstrap-5.1.3-dist/js/bootstrap.bundle.min.js"></script>
<script src="./assets/vendor/jquery-3.6.1.min.js"></script>

</html>