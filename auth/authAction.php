<?php
    session_start();

    require '../model/cososanxuatClass.php';
    $cssx = new cososanxuatClass();

    if(isset($_GET['req'])){
        switch($_GET['req']){
            case 'addNew':
                $email = $_POST['email'];
                $mat_khau = $_POST['mat_khau'];
                $ten_cssx = $_POST['ten_cssx'];
                $so_dien_thoai = $_POST['so_dien_thoai'];
                $dia_chi = $_POST['dia_chi'];
                $mo_ta = $_POST['mo_ta'];
                $loai_hinh_sx = $_POST['loai_hinh_sx'];

                $res = $cssx->cososanxuatAdd($email, $mat_khau, $ten_cssx, $so_dien_thoai, $dia_chi, $mo_ta, $loai_hinh_sx);
                if($res){
                    header('location: dangnhap.php?status=success');
                }else{
                    header('location: dangky.php?status=fail');
                }
                break;

            case 'update':
                $id_cssx = $_POST['id_cssx'];
                $email = $_POST['email'];
                $mat_khau = $_POST['mat_khau'];
                $ten_cssx = $_POST['ten_cssx'];
                $so_dien_thoai = $_POST['so_dien_thoai'];
                $dia_chi = $_POST['dia_chi'];
                $mo_ta = $_POST['mo_ta'];
                $loai_hinh_sx = $_POST['loai_hinh_sx'];

                $res = $cssx->cososanxuatUpdate($id_cssx, $email, $mat_khau, $ten_cssx, $so_dien_thoai, $dia_chi, $mo_ta, $loai_hinh_sx);
                if($res){
                    header('location: dangnhap.php?status=success');
                }else{
                    header('location: dangky.php?status=fail');
                }
                break;

            case 'delete':
                $id_cssx = $_GET['id_cssx'];

                $res = $cssx->cososanxuatDelete($id_cssx);
                if($res){
                    header('location: dangnhap.php?status=success');
                }else{
                    header('location: dangky.php?status=fail');
                }
                break;

            case 'dangnhap':
                $email = $_POST['email'];
                $mat_khau = $_POST['mat_khau'];
    
                $res = $cssx->dangnhap($email, $mat_khau);
                if($res == 0){
                    header('location: dangnhap.php?status=fail');
                }else{
                    if($res->ten_cssx == 'admin'){
                        $_SESSION['admin'] = $res->ten_cssx;
                        header('location: ../admin');
                    }else{
                        $_SESSION['user'] = $res->ten_cssx;
                        header('location: ../user');
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