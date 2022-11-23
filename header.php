<?php session_start()?>

<style>
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

<header class="site-header sticky-top">
    <div class="d-flex flex-column flex-md-row align-items-center border-bottom">
        <a href="./" class="d-flex align-items-center text-white text-decoration-none m-2 ">
            <img src="./assets/logo.png" class="img-logo" alt="">
            <span class="text-white m-2 ">product's origin</span>
        </a>

        <nav class="d-inline-flex mt-2 mt-md-0 ms-md-auto">
            <?php if(isset($_SESSION['admin'])):?>
            <div class="text-decoration-none">
                <div class="nav-item text-nowrap">
                    <a class="text-white nav-link px-3" href="./auth/action.php?req=dangxuat">Xin chào
                        <?=$_SESSION['admin']?> |
                        Đăng
                        xuất</a>
                </div>
            </div>
            <?php else:?>
            <div class=" text-decoration-none">
                <div class="nav-item text-nowrap">
                    <a class="text-white nav-link px-3" href="./auth/dangnhap.php">Đăng nhập</a>
                </div>
            </div>
            <?php endif?>
        </nav>
    </div>
</header>