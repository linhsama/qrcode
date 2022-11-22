<?php
    session_start();

    require '../model/modelClass.php';
    $taikhoan = new modelClass();

    if(isset($_GET['req'])){
        switch($_GET['req']){
            case 'dangky':
                $ten_hien_thi = $_POST['ten_hien_thi'];
                $ten_tai_khoan = $_POST['ten_tai_khoan'];
                $mat_khau = $_POST['mat_khau'];
    
                $res = $taikhoan->taikhoanDangKy($ten_hien_thi, $ten_tai_khoan, $mat_khau);
                if($res == 0){
                    header('location: dangky.php?status=fail');
                }else{
                    header('location: dangnhap.php?status=success');
                }
                break;
            case 'dangnhap':
                
                $ten_tai_khoan = $_POST['ten_tai_khoan'];
                $mat_khau = $_POST['mat_khau'];
                
                $res = $taikhoan->taikhoanDangNhap($ten_tai_khoan, $mat_khau);

                if($res == 0){
                    header('location: dangnhap.php?status=fail');
                }else{
                    if($res->ten_tai_khoan == 'admin'){
                        echo $_SESSION['admin'] = $res->ten_hien_thi;
                        header('location: ../admin');
                    }else{
                        $_SESSION['user'] = $res->ten_hien_thi;
                        header('location: ../admin');
                    }
                }
                break;
            case 'dangxuat':
                if(isset($_SESSION['admin'])){
                    session_destroy();
                }
                if(isset($_SESSION['user'])){
                    session_destroy();
                }
                header('location: ../index.php');
                break;
        }
    }
?>