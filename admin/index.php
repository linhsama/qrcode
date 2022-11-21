<?php 
    session_start();
    if(!isset($_SESSION['admin'])){
        header('location: ../auth/dangnhap.php');
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - product's origin</title>
    <link rel="shortcut icon" href="../assets/favicon.ico" type="image/x-icon">

    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="../assets/vendor/bootstrap-5.1.3-dist/css/bootstrap.min.css" />

</head>

<body>
    <?php require 'header.php'?>
    <div class="container-fluid">
        <?php require 'siderbar.php'?>
    </div>
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <?php require 'controller.php'?>
    </main>

</body>
<script src="../assets/vendor/bootstrap-5.1.3-dist/js/bootstrap.bundle.min.js"></script>
<script src="../assets/vendor/jquery-3.6.1.min.js"></script>

<!-- <?php if (isset($_GET['status']) && $_GET['status'] == 'success'):?>
<script>
alert('Thao tác thành công');
</script>
<?php endif?>
<?php if (isset($_GET['status']) && $_GET['status'] == 'fail'):?>
<script>
alert('Thao tác thất bại');
</script>
<?php endif?> -->

</html>