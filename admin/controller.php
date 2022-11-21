<?php 
    if(isset($_GET['req'])){
        switch($_GET['req']){
            case 'trangchu':
                require 'trangchu.php';
                break;
            case 'hanghoa':
                require 'hanghoa/hanghoaView.php';
                break;
            case 'cososanxuat':
                require 'cososanxuat/cososanxuatView.php';
                break;
            case 'loi':
                require 'loi.php';
                break;
            default:
                echo "<script>location.href = 'index.php?req=loi'</script>";
                break;
        }
    }else{
        echo "<script>location.href = 'index.php?req=trangchu'</script>";
    }
?>