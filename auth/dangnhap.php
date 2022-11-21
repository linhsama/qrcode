<?php 
    session_start();
    if(isset($_SESSION['admin']) && isset($_SESSION['user'])){
        header('location: ../user');
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập - product's origin</title>
    <link rel="shortcut icon" href="../assets/favicon.ico" type="image/x-icon">

    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="../assets/vendor/bootstrap-5.1.3-dist/css/bootstrap.min.css" />
</head>

<body class="text-center">
    <main class="form-signin">
        <form action="./authAction.php?req=dangnhap" method="post">
            <img class="logo" src="../assets/logo.png" alt="">
            <h1 class="h3 m-3 fw-bold">ĐĂNG NHẬP</h1>

            <div class="form-floating">
                <input type="email" class="form-control" id="email" name="email" required="">
                <label for="email">Email</label>
            </div>
            <br>
            <div class="form-floating">
                <input type="mat_khau" class="form-control" id="mat_khau" name="mat_khau" required="">
                <label for="mat_khau">Mật khẩu</label>
            </div>

            <button class="w-100 btn btn-md btn-primary mt-2" type="submit">Đăng nhập</button>
            <p class="m-2 text-muted">Chưa có tài khoản? <a href="dangky.php"> Đăng ký ngay</a></p>

        </form>
    </main>
    <script src="../assets/vendor/bootstrap-5.1.3-dist/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/vendor/jquery-3.6.1.min.jss"></script>

    <?php if (isset($_GET['status']) && $_GET['status'] == 'success'):?>
    <script>
    alert('Tạo tài khoản thành công');
    </script>
    <?php endif?>
    <?php if (isset($_GET['status']) && $_GET['status'] == 'fail'):?>
    <script>
    alert('Tên đăng nhập hoặc mật khẩu không chính xác');
    </script>
    <?php endif?>

</html>