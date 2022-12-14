<?php session_start();
    require '../model/modelClass.php';
    $model = new modelClass();
    if(isset($_GET['id_nts'])){
        $id_nts = $_GET['id_nts'];
        $list_khu_vuc = $model->cososanxuatGetAll();
        $obj_nongthuysan = $model->nongthuysanGetAllById($id_nts);
    }
  
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=$obj_nongthuysan->ten_nts?></title>

    <link rel="stylesheet" href="../assets/vendor/bootstrap-5.1.3-dist/css/bootstrap.min.css" />
    <style>
    html {
        padding: 0;
        margin: 0;
        font-size: 14px;
    }

    img.img-medium {
        width: 100%;
        max-width: 500px;
    }

    .card-container {
        display: flex;
        align-items: center;
        padding-top: 40px;
        padding-bottom: 40px;
        object-fit: fill;
    }

    .card-detail {
        width: 100%;
        max-width: 500px;
        padding: 15px;
        margin: auto;
        box-shadow: rgba(0, 0, 0, 0.16) 0px 3px 6px, rgba(0, 0, 0, 0.23) 0px 3px 6px;
    }

    .card-footer {}

    img.img-card.img-small {
        position: absolute;
        text-align: flex;
        top: 20px;
        left: 20px;
        width: 100px;
        border-radius: 10px;
    }

    .card-title {
        color: #dc3545c9;
        font-size: 16px;
        font-weight: bold;
        text-transform: uppercase;
        text-align: center;
    }

    .card-text {
        color: black !important;
    }

    body {
        background-image: linear-gradient(180deg, #eee, #fff 100px, #fff);
    }

    .container {
        width: 100%;
        max-width: 500px;
    }

    .pricing-header {
        width: 100%;
        max-width: 500px;
    }


    img.img-logo {
        width: 50px;
        border-radius: 10px;
    }

    .site-header {
        -webkit-backdrop-filter: saturate(180%) blur(20px);
        backdrop-filter: saturate(180%) blur(20px);
        box-shadow: rgba(17, 17, 26, 0.1) 0px 1px 0px;
    }

    .text-white {
        color: black !important;
    }
    </style>

</head>

<body>

    <div class="container py-3">

        <header class="site-header sticky-top">
            <div class="d-flex flex-column flex-md-row align-items-center border-bottom">
                <a href="../" class="d-flex align-items-center text-white text-decoration-none m-2 ">
                    <img src="../assets/logo.png" class="img-logo" alt="">
                    <span class="text-white m-2 ">product's origin</span>
                </a>

                <nav class="d-inline-flex mt-2 mt-md-0 ms-md-auto">
                    <?php if(isset($_SESSION['admin'])):?>
                    <div class="text-decoration-none">
                        <div class="nav-item text-nowrap">
                            <a class="text-white nav-link px-3" href="../auth/action.php?req=dangxuat">Xin ch??o
                                <?=$_SESSION['admin']?> |
                                ????ng
                                xu???t</a>
                        </div>
                    </div>
                    <?php else:?>
                    <div class=" text-decoration-none">
                        <div class="nav-item text-nowrap">
                            <a class="text-white nav-link px-3" href="../auth/dangnhap.php">????ng nh???p</a>
                        </div>
                    </div>
                    <?php endif?>
                </nav>
            </div>
        </header>
        <div class="p-3 pb-md-4 mx-auto text-center">
            <h1 class="display-4 fw-normal">Website</h1>
            <p class="fs-5 text-muted"> Truy xu???t ngu???n g???c n??ng s???n v?? th???y s???n.
            </p>
            <hr>
        </div>
        <div class="card-container">
            <div class="card h-100 card-detail">
                <img class="img-card img-small"
                    src="../admin/nongthuysan/<?=$model->qrcodeGetBynongthuysan($id_nts)->qr_image?>" alt="">
                <img src="../admin/nongthuysan/<?=$obj_nongthuysan->hinh_anh?>" class="card-img-top img-medium"
                    alt="...">
                <div class="card-body">
                    <div class="card-title"><?=$obj_nongthuysan->ten_nts?></div>
                    <div class="card-text"><b>Ph??n lo???i: </b>
                        <?=$obj_nongthuysan->phan_loai == "1" ? "N??ng s???n" : "Th???y s???n"?></div>
                    <div class="card-text"> <b>Quy tr??nh s???n xu???t</b>
                        <ul>
                            <li class="card-text"><b>Khu v???c nu??i tr???ng:</b> <?=$obj_nongthuysan->ten_khu_vuc?> </li>
                            <li class="card-text"><b>Di???n t??ch nu??i tr???ng:</b> <?=$obj_nongthuysan->dien_tich?> </li>
                            <li class="card-text"><b>Th???i gian b???t ?????u:</b>
                                <?=date('d-m-Y',strtotime($obj_nongthuysan->thoi_gian_bat_dau))?></li>
                            <li class="card-text"><b>Th???i gian thu ho???ch:</b>
                                <?=date('d-m-Y',strtotime($obj_nongthuysan->thoi_gian_thu_hoach))?> </li>

                            <?php 
                                $date1 = new DateTime("$obj_nongthuysan->thoi_gian_bat_dau");
                                $date2 = new DateTime("$obj_nongthuysan->thoi_gian_thu_hoach");
                                $interval = $date1->diff($date2);
                                ?>
                            <li class="card-text"><b>Th???i gian nu??i tr???ng: </b> <?=$interval->days + 1?> ng??y</li>
                            <li class="card-text"><b>S??? l?????ng nu??i tr???ng:</b> <?=$obj_nongthuysan->so_luong_nuoi_trong?>
                            </li>
                            <li class="card-text"><b>S??? l?????ng thu ho???ch:</b> <?=$obj_nongthuysan->so_luong_thu_hoach?>
                            </li>
                            <li class="card-text"><b>H???n s??? d???ng (n???u c??):</b> <?=$obj_nongthuysan->han_su_dung?> </li>
                            <li class="card-text"><b>N??i thu mua ban ?????u:</b> <?=$obj_nongthuysan->noi_thu_mua?> </li>
                        </ul>
                    </div>


                </div>

                <div class="card-footer">
                    <small class="text-muted">
                        <div class="card-text"><b>Th??ng tin c?? s??? s???n xu???t</b>
                            <ul>
                                <li class="card-text"><b>T??n c?? s???:</b> <?=$obj_nongthuysan->ten_cssx?> </li>
                                <li class="card-text"><b>Ch??? s??? h???u:</b> <?=$obj_nongthuysan->chu_co_so?> </li>
                                <li class="card-text"><b>M?? t???:</b> <?=$obj_nongthuysan->mo_ta?> </li>
                                <li class="card-text"><b>?????a ch???:</b> <?=$obj_nongthuysan->dia_chi?> </li>
                                <li class="card-text"><b>S??? ??i???n tho???i:</b> <?=$obj_nongthuysan->so_dien_thoai?> </li>
                                <li class="card-text"><b>Email:</b> <?=$obj_nongthuysan->email?> </li>
                            </ul>
                        </div>
                    </small>
                </div>
            </div>
        </div>
    </div>
</body>
<script src="../assets/vendor/bootstrap-5.1.3-dist/js/bootstrap.bundle.min.js"></script>
<script src="../assets/vendor/jquery-3.6.1.min.jss"></script>

</html>