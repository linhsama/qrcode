<?php 
    if(isset($_GET['req'])){
        switch($_GET['req']){
            case 'trangchu':
                require 'trangchu/index.php';
                break;
            case 'cososanxuat':
                require 'cososanxuat/index.php';
                break;
            case 'nongthuysan':
                require 'nongthuysan/index.php';
                break;
            case 'khuvucnuoitrong':
                require 'khuvucnuoitrong/index.php';
                break;
            case 'quytrinhnuoitrong':
                require 'quytrinhnuoitrong/index.php';
                break;
            case 'taikhoan':
                require 'taikhoan/index.php';
                break;    
            case 'loi':
                require '../loi.php';
                break;
            default:
                echo "<script>location.href = 'index.php?req=loi'</script>";
                break;
        }
    }else{
        echo "<script>location.href = 'index.php?req=trangchu'</script>";
    }
?>