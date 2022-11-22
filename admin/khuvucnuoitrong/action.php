<?php
    require '../../model/modelClass.php';

    $model = new modelClass();
    
    if(isset($_GET['req'])){
        switch($_GET['req']){
            case 'add':
                $ten_khu_vuc = $_POST['ten_khu_vuc'];
                $dien_tich = $_POST['dien_tich'];
                $dia_chi = $_POST['dia_chi'];
                $id_cssx = $_POST['id_cssx'];
                
                $res = $model->khuvucnuoitrongAdd($ten_khu_vuc, $dien_tich, $dia_chi, $id_cssx);
                if($res){
                    header('location: ../index.php?req=khuvucnuoitrong&status=success');
                }else{
                    header('location: ../index.php?req=khuvucnuoitrong&status=fail');
                }
                break;
            case 'update':
                echo $id_khu_vuc = $_POST['id_khu_vuc'];
                echo $ten_khu_vuc = $_POST['ten_khu_vuc'];
                echo $dien_tich = $_POST['dien_tich'];
                echo $dia_chi = $_POST['dia_chi'];
                echo $id_cssx = $_POST['id_cssx'];

                $res = $model->khuvucnuoitrongUpdate($id_khu_vuc, $ten_khu_vuc,$dien_tich,$dia_chi,$id_cssx);
                
                if($res){
                    header('location: ../index.php?req=khuvucnuoitrong&status=success');
                }else{
                    header('location: ../index.php?req=khuvucnuoitrong&status=fail');
                }                
                break;
            case 'delete':
                $id_khu_vuc = $_GET['id_khu_vuc'];
               
                $res = $model->khuvucnuoitrongDelete($id_khu_vuc);
                if($res){
                    header('location: ../index.php?req=khuvucnuoitrong&status=success');
                }else{
                    header('location: ../index.php?req=khuvucnuoitrong&status=fail');
                }
                break;
                
        }
    }
?>