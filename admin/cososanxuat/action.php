<?php
    require '../../model/modelClass.php';
    $model = new modelClass();
    
    if(isset($_GET['req'])){
        switch($_GET['req']){
            case 'update':
                echo $email = $_POST['email'];
                echo $chu_co_so = $_POST['chu_co_so'];
                echo $ten_cssx = $_POST['ten_cssx'];
                echo $so_dien_thoai = $_POST['so_dien_thoai'];
                echo $dia_chi = $_POST['dia_chi'];
                echo $mo_ta = $_POST['mo_ta'];
                echo $id_cssx = isset($_POST['id_cssx'])?$_POST['id_cssx']:0;

                if($id_cssx != 0){
                    $res = $model->cososanxuatUpdate($id_cssx, $email,$chu_co_so,$ten_cssx,$so_dien_thoai,$dia_chi,$mo_ta);
                    if($res == 0){
                        header('location: ../index.php?req=cososanxuat&status=success');

                    }else{
                        header('location: ../index.php?req=cososanxuat&status=success');
                    }
                }else {
                    $res = $model->cososanxuatAdd($email,$chu_co_so,$ten_cssx,$so_dien_thoai,$dia_chi,$mo_ta);
                    if($res == 0){
                        header('location: ../index.php?req=cososanxuat&status=success');

                    }else{
                        header('location: ../index.php?req=cososanxuat&status=success');
                    }                }
                break;
        
        }
    }
?>