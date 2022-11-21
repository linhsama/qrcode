<?php 
    require 'model/qrcodeClass.php';
    require 'phpqrcode/qrlib.php';
    
    $path = 'image/';
    if(!file_exists($path)){
        mkdir($path);
    }
    $qr_code = $path.time().".png";
    $qr_image = time().".png";

    if(isset($_POST['qr_text'])){
        $qr_text = $_POST['qr_text'];
        $qr_text1 = $_POST['qr_text1'];
        $qr_text2 = $_POST['qr_text2'];
        $qr_text3 = $_POST['qr_text3'];
        $qr = new qrcodeClass();
        $kq = $qr->qrcodeAdd($qr_text."<br/>".$qr_text1."<br/>".$qr_text2."<br/>".$qr_text3, $qr_image);
        if($kq){
            $image = QRcode::png($qr_text ,$qr_code,"h",4,4);
            header("location: index.php?status=success");
        }else{
            header("location: index.php?status=fail");
        }
    }
?>