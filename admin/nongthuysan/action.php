<?php
    require '../../model/modelClass.php';
    require '../../assets/vendor/phpqrcode/qrlib.php';
    require("../../assets/vendor/tfpdf/tfpdf.php");
    $localIP = getHostByName(getHostName());   

    $model = new modelClass();
    
    if(isset($_GET['req'])){
        switch($_GET['req']){
            case 'add':
                echo $ten_nts = $_POST['ten_nts'];
                $phan_loai = $_POST['phan_loai'];
                $mo_ta = $_POST['mo_ta'];
                $id_khu_vuc = $_POST['id_khu_vuc'];

                $path = 'qr_image/';
                if(!file_exists($path)){
                    mkdir($path);
                }

                $hinh_anh_path = 'image/';
                if(!file_exists($hinh_anh_path)){
                    mkdir($hinh_anh_path);
                }
                
                $res = $model->nongthuysanAdd($ten_nts, $phan_loai, $mo_ta, $id_khu_vuc);
                if($res == 0){
                    header('location: ../index.php?req=nongthuysan&status=fail');
                }else{
                    $hinh_anh = $hinh_anh_path.$res.".png";
                    move_uploaded_file($_FILES['file']['tmp_name'],$hinh_anh);
                    echo $qr_image = $path.$res.".png";
                    echo $qr_link = "http://$localIP/qrcode/nongthuysan/nongthuysanDetail.php?id_nts=$res";
                    QRcode::png($qr_link ,$qr_image,"h",3,3);
                    $model->nongthuysanAddHinhAnh($hinh_anh,$res);
                    $model->qrcodeAdd($qr_image,$qr_link,$res);
                    header('location: ../index.php?req=nongthuysan&status=success');
                }
                break;
            case 'update':
                echo $id_nts = $_POST['id_nts'];
                echo $ten_nts = $_POST['ten_nts'];
                echo $phan_loai = $_POST['phan_loai'];
                echo $mo_ta = $_POST['mo_ta'];
                echo $hinh_anh = $_POST['hinh_anh'];
                echo $id_khu_vuc = $_POST['id_khu_vuc'];

                if(strlen($_FILES['file']['tmp_name'])>0){
                    $hinh_anh_path = "image/$id_nts.png";
                    if(file_exists($hinh_anh_path)){
                        unlink($hinh_anh_path);
                    }
                    $hinh_anh = "image/".$id_nts.".png";
                    move_uploaded_file($_FILES['file']['tmp_name'],$hinh_anh);
                }else{
                    $hinh_anh = $_POST['hinh_anh'];
                }
                $res = $model->nongthuysanUpdate($id_nts, $ten_nts,$phan_loai,$mo_ta,$hinh_anh,$id_khu_vuc);
                
                header('location: ../index.php?req=nongthuysan&status=success');
                break;
            case 'delete':
                $id_nts = $_GET['id_nts'];
                $path = "./qr_image/$id_nts.png";
                if(file_exists($path)){
                    unlink($path);
                }
                $hinh_anh_path = "image/$id_nts.png";
                if(file_exists($hinh_anh_path)){
                    unlink($hinh_anh_path);
                }
               
                $res = $model->nongthuysanDelete($id_nts);
                if($res){
                    header('location: ../index.php?req=nongthuysan&status=success');
                }else{
                    header('location: ../index.php?req=nongthuysan&status=fail');
                }
                break;
                
            case 'inTatCa':
                $model = new modelClass();
                $list_qr = $model->qrcodeGetAll();
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
                    $pdf->Cell(55,$j+=60,$item->ten_nts, 0,0);
                    $pdf->Image('../nongthuysan/'.$item->qr_image, 150, $i+=30,0,0,'PNG', $item->qr_link);
                }

                $pdf->Output();
                break;

            case 'in':
                $id_nts = $_GET['id_nts'];
                $model = new modelClass();
                $obj_qr = $model->qrcodeGetBynongthuysan($id_nts);
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
                $pdf->Cell(55,$j+=60,$obj_qr->ten_nts, 0,0);
                $pdf->Image('../nongthuysan/'.$obj_qr->qr_image, 150, $i+=30,0,0,'PNG', $obj_qr->qr_link);
                $pdf->Output();
                break;
    
        }
    }
?>