<?php
    require '../../model/modelClass.php';

    $model = new modelClass();
    
    if(isset($_GET['req'])){
        switch($_GET['req']){
            case 'add':
                $ten_hien_thi = $_POST['ten_hien_thi'];
                $ten_tai_khoan = $_POST['ten_tai_khoan'];
                $mat_khau = $_POST['mat_khau'];
               
                
                $res = $model->taikhoanDangKy($ten_hien_thi,$ten_tai_khoan,$mat_khau);
                if($res){
                    header('location: ../index.php?req=taikhoan&status=success');
                }else{
                    header('location: ../index.php?req=taikhoan&status=fail');
                }
                break;
            case 'update':
                echo $id_tai_khoan = $_POST['id_tai_khoan'];
                echo $ten_hien_thi = $_POST['ten_hien_thi'];
                echo $ten_tai_khoan = $_POST['ten_tai_khoan'];
                echo $mat_khau = $_POST['mat_khau'];
               

                $res = $model->taikhoanUpdate($id_tai_khoan, $ten_hien_thi,$ten_tai_khoan,$mat_khau);
                
                if($res){
                    header('location: ../index.php?req=taikhoan&status=success');
                }else{
                    header('location: ../index.php?req=taikhoan&status=fail');
                }                
                break;
            case 'delete':
                $id_tai_khoan = $_GET['id_tai_khoan'];
               
                $res = $model->taikhoanDelete($id_tai_khoan);
                if($res){
                    header('location: ../index.php?req=taikhoan&status=success');
                }else{
                    header('location: ../index.php?req=taikhoan&status=fail');
                }
                break;
                
        }
    }
?>