<?php
    require '../../model/hanghoaClass.php';
    require '../../assets/vendor/phpqrcode/qrlib.php';
    require("../../assets/vendor/tfpdf/tfpdf.php");
    $localIP = getHostByName(getHostName());   

    $hh = new hanghoaClass();
    
    if(isset($_GET['req'])){
        switch($_GET['req']){
            case 'addNew':
                echo $ten_hang_hoa = $_POST['ten_hang_hoa'];
                $phan_loai = $_POST['phan_loai'];
                $mo_ta = $_POST['mo_ta'];
                $id_cssx = $_POST['id_cssx'];

                $path = 'qr_image/';
                if(!file_exists($path)){
                    mkdir($path);
                }

                $hinh_anh_path = 'image/';
                if(!file_exists($hinh_anh_path)){
                    mkdir($hinh_anh_path);
                }
                
                $res = $hh->hanghoaAdd($ten_hang_hoa, $phan_loai, $mo_ta, $id_cssx);
                if($res == 0){
                    header('location: ../index.php?req=hanghoa&status=fail');
                }else{
                    $hinh_anh = $hinh_anh_path.$res.".png";
                    move_uploaded_file($_FILES['file']['tmp_name'],$hinh_anh);
                    echo $qr_image = $path.$res.".png";
                    echo $qr_link = "http://$localIP/qrcode/hanghoa/hanghoaDetail.php?id_hang_hoa=$res";

                    QRcode::png($qr_link ,$qr_image,"h",3,3);
                    $hh->hanghoaAddQr($res, $qr_link, $qr_image, $hinh_anh);
                    header('location: ../index.php?req=hanghoa&status=success');
                }
                break;
            case 'update':
                echo $id_hang_hoa = $_POST['id_hang_hoa'];
                echo $ten_hang_hoa = $_POST['ten_hang_hoa'];
                echo $phan_loai = $_POST['phan_loai'];
                echo $mo_ta = $_POST['mo_ta'];
                echo $hinh_anh = $_POST['hinh_anh'];

                if(strlen($_FILES['file']['tmp_name'])>0){
                    $hinh_anh_path = "image/$id_hang_hoa.png";
                    if(file_exists($hinh_anh_path)){
                        unlink($hinh_anh_path);
                    }
                    $hinh_anh = "image/".$id_hang_hoa.".png";
                    move_uploaded_file($_FILES['file']['tmp_name'],$hinh_anh);
                }else{
                    $hinh_anh = $_POST['hinh_anh'];
                }
                $res = $hh->hanghoaUpdate($id_hang_hoa, $ten_hang_hoa, $phan_loai, $mo_ta, $hinh_anh);
                
                header('location: ../index.php?req=hanghoa&status=success');
                break;
            case 'delete':
                $id_hang_hoa = $_GET['id_hang_hoa'];
                $path = "./qr_image/$id_hang_hoa.png";
                if(file_exists($path)){
                    unlink($path);
                }
                $hinh_anh_path = "image/$id_hang_hoa.png";
                if(file_exists($hinh_anh_path)){
                    unlink($hinh_anh_path);
                }
               
                $res = $hh->hanghoaDelete($id_hang_hoa);
                if($res){
                    header('location: ../index.php?req=hanghoa&status=success');
                }else{
                    header('location: ../index.php?req=hanghoa&status=fail');
                }
                break;
                
            case 'inTatCa':
                $hh = new hanghoaClass();
                $list_qr = $hh->hanghoaGetAll();
                $pdf = new tFPDF();
                $pdf->AddPage();
                $pdf->AddFont('DejaVuSansCondensed-Bold', '', 'DejaVuSansCondensed-Bold.ttf', true);
                $pdf->SetFont('DejaVuSansCondensed-Bold', '', 14);
                $pdf->Cell(200,6,'Danh sách QR', 0,0,"C");
                $pdf->Ln();
                $pdf->AddFont('DejaVuSansCondensed', '', 'DejaVuSansCondensed.ttf', true);
                $pdf->SetFont('DejaVuSansCondensed', '', 10);
                $pdf->Cell(200,6,'Ngày in: '.Date('d-m-Y'), 0,1,"C");
                $pdf->Cell(200,6,'Số lượng in: '.count($list_qr), 0,1,"C");

                $pdf->AddFont('DejaVuSansCondensed-Bold', '', 'DejaVuSansCondensed-Bold.ttf', true);
                $pdf->SetFont('DejaVuSansCondensed-Bold', '', 12);
                $pdf->Cell(100,12,'Tên hàng hóa', 0,0);
                $pdf->Cell(115,12,'QR hàng hóa', 0,1,"C");
                $x = $pdf->GetX();
                $i=0;
                $j=-35;
                $pdf->AddFont('DejaVuSansCondensed', '', 'DejaVuSansCondensed.ttf', true);
                $pdf->SetFont('DejaVuSansCondensed', '', 11);
                foreach($list_qr as $item){
                    $pdf->SetX($x);
                    $pdf->Cell(55,$j+=60,$item->ten_hang_hoa, 0,0);
                    $pdf->Image('../hanghoa/'.$item->qr_image, 150, $i+=30,0,0,'PNG', $item->qr_link);
                }

                $pdf->Output();
                break;

            case 'in':
                $id_hang_hoa = $_GET['id_hang_hoa'];
                $hh = new hanghoaClass();
                $obj_qr = $hh->hanghoaGetById($id_hang_hoa);
                $pdf = new tFPDF();
                $pdf->AddPage();
                $pdf->AddFont('DejaVuSansCondensed-Bold', '', 'DejaVuSansCondensed-Bold.ttf', true);
                $pdf->SetFont('DejaVuSansCondensed-Bold', '', 14);
                $pdf->Cell(200,6,'Danh sách QR', 0,0,"C");
                $pdf->Ln();
                $pdf->AddFont('DejaVuSansCondensed', '', 'DejaVuSansCondensed.ttf', true);
                $pdf->SetFont('DejaVuSansCondensed', '', 10);
                $pdf->Cell(200,6,'Ngày in '.Date('d-m-Y'), 0,1,"C");

                $pdf->AddFont('DejaVuSansCondensed-Bold', '', 'DejaVuSansCondensed-Bold.ttf', true);
                $pdf->SetFont('DejaVuSansCondensed-Bold', '', 12);
                $pdf->Cell(100,12,'Tên hàng hóa', 0,0);
                $pdf->Cell(115,12,'QR hàng hóa', 0,1,"C");
                $x = $pdf->GetX();
                $i=0;
                $j=-35;
                $pdf->AddFont('DejaVuSansCondensed', '', 'DejaVuSansCondensed.ttf', true);
                $pdf->SetFont('DejaVuSansCondensed', '', 11);
                $pdf->SetX($x);
                $pdf->Cell(55,$j+=60,$obj_qr->ten_hang_hoa, 0,0);
                $pdf->Image('../hanghoa/'.$obj_qr->qr_image, 150, $i+=30,0,0,'PNG', $obj_qr->qr_link);
                $pdf->Output();
                break;
    
        }
    }
?>