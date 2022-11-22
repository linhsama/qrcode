<?php
    require '../../model/modelClass.php';

    $model = new modelClass();
    
    if(isset($_GET['req'])){
        switch($_GET['req']){
            case 'add':
                $thoi_gian_bat_dau = $_POST['thoi_gian_bat_dau'];
                $thoi_gian_thu_hoach = $_POST['thoi_gian_thu_hoach'];
                $so_luong_nuoi_trong = $_POST['so_luong_nuoi_trong'];
                $so_luong_thu_hoach = $_POST['so_luong_thu_hoach'];
                $han_su_dung = $_POST['han_su_dung'];
                $noi_thu_mua = $_POST['noi_thu_mua'];
                $ghi_chu = $_POST['ghi_chu'];
                $id_khu_vuc = $_POST['id_khu_vuc'];
                
                $res = $model->quytrinhnuoitrongAdd($thoi_gian_bat_dau,$thoi_gian_thu_hoach,$so_luong_nuoi_trong,$so_luong_thu_hoach,$han_su_dung,$noi_thu_mua,$ghi_chu,$id_khu_vuc);
                if($res){
                    header('location: ../index.php?req=quytrinhnuoitrong&status=success');
                }else{
                    header('location: ../index.php?req=quytrinhnuoitrong&status=fail');
                }
                break;
            case 'update':
                echo $id_quy_trinh = $_POST['id_quy_trinh'];
                echo $thoi_gian_bat_dau = $_POST['thoi_gian_bat_dau'];
                echo $thoi_gian_thu_hoach = $_POST['thoi_gian_thu_hoach'];
                echo $so_luong_nuoi_trong = $_POST['so_luong_nuoi_trong'];
                echo $so_luong_thu_hoach = $_POST['so_luong_thu_hoach'];
                echo $han_su_dung = $_POST['han_su_dung'];
                echo $noi_thu_mua = $_POST['noi_thu_mua'];
                echo $ghi_chu = $_POST['ghi_chu'];
                echo $id_khu_vuc = $_POST['id_khu_vuc'];

                $res = $model->quytrinhnuoitrongUpdate($id_quy_trinh, $thoi_gian_bat_dau,$thoi_gian_thu_hoach,$so_luong_nuoi_trong,$so_luong_thu_hoach,$han_su_dung,$noi_thu_mua,$ghi_chu,$id_khu_vuc);
                
                if($res){
                    header('location: ../index.php?req=quytrinhnuoitrong&status=success');
                }else{
                    header('location: ../index.php?req=quytrinhnuoitrong&status=fail');
                }                
                break;
            case 'delete':
                $id_quy_trinh = $_GET['id_quy_trinh'];
               
                $res = $model->quytrinhnuoitrongDelete($id_quy_trinh);
                if($res){
                    header('location: ../index.php?req=quytrinhnuoitrong&status=success');
                }else{
                    header('location: ../index.php?req=quytrinhnuoitrong&status=fail');
                }
                break;
                
        }
    }
?>