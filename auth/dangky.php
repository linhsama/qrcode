<?php 
    session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng ký - product's origin</title>
    <link rel="shortcut icon" href="../assets/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="../assets/vendor/bootstrap-5.1.3-dist/css/bootstrap.min.css" />
</head>

<body>
    <main class="form-register">
        <div class="logo-container">
            <img class="logo" src="../assets/logo.png" alt="">
            <div class="logo-title">
                <h3 class="fw-bold">ĐĂNG KÝ</h3>
                <p class="text-muted"><i>Đăng ký ngay 1 tài khoản để tạo QR cho sản phẩm của bạn</i></p>
            </div>
        </div>
        <br>
        <form class="row g-3" action="./authAction.php?req=addNew" method="post">
            <div class="col-md-6">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" required=""
                    placeholder="Nhập email (ten_mail@gmail.com)">
            </div>
            <div class="col-md-6">
                <label for="mat_khau" class="form-label">Mật khẩu</label>
                <input type="password" class="form-control" id="mat_khau" name="mat_khau" required="" minlenght="6"
                    placeholder="Nhập mật khẩu > 6 chữ số">
            </div>
            <div class="col-md-8">
                <label for="ten_cssx" class="form-label">Tên cơ sở sản xuất/ doanh nghiệp/ công ty</label>
                <input type="text" class="form-control" id="ten_cssx" name="ten_cssx" required=""
                    placeholder="Nhập tên cơ sở sản xuất/doanh nghiệp/công ty của bạn">
            </div>
            <div class="col-4">
                <label for="so_dien_thoai" class="form-label">Số điện thoại</label>
                <input type="tel" class="form-control" id="so_dien_thoai" name="so_dien_thoai" maxlenght="10"
                    pattern="[0]{1}[0-9]{9}" required="" placeholder="Nhập số điện thoại chính (10 số)">
            </div>
            <div class="col-md-3">
                <label for="loai_hinh_sx" class="form-label">Loại hình sản xuất chính</label>
                <select id="loai_hinh_sx" class="form-select" name="loai_hinh_sx" required="">
                    <option value="" selected>Chọn loại hình sản xuất chính</option>
                    <option value="1">Nông sản</option>
                    <option value="2">Thủy sản</option>
                </select>
            </div>
            <div class="col-9">
                <label for="dia_chi" class="form-label">Địa chỉ</label>
                <input type="text" class="form-control" id="dia_chi" name="dia_chi" required=""
                    placeholder="Nhập địa chỉ đăng ký kinh doanh">
            </div>
            <div class="col-md-12">
                <label for="mo_ta" name="mo_ta" class="form-label">Mô tả công ty</label>
                <input type="text" class="form-control" id="mo_ta" name="mo_ta" required=""
                    placeholder="Nhập mô tả ngắn để khách hàng hiểu thêm về bạn">
            </div>
            <div class="text-center mt-5">
                <button class="btn btn-md btn-success" type="submit">Đăng ký</button>
                <p class="mt-3 text-muted text-center">Đã có tài khoản? <a href="dangnhap.php"> Đăng nhập</a></p>
            </div>
        </form>
    </main>

    <script src="../assets/vendor/bootstrap-5.1.3-dist/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/vendor/jquery-3.6.1.min.jss"></script>

    <?php if (isset($_GET['status']) && $_GET['status'] == 'fail'):?>
    <script>
    alert('Tạo tài khoản không thành công');
    </script>
    <?php endif?>


</html>