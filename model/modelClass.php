<?php

$s = "../connect/database.php";
if (file_exists($s)) {
    $f = $s;
} else {
    $f = "../../connect/database.php";
}
include_once($f);

class modelClass extends Database {
     
    //cososanxuat
     public function cososanxuatGetAll() {
        $getAll = $this->connect->prepare("select * from cososanxuat");
        $getAll->setFetchMode(PDO::FETCH_OBJ);
        $getAll->execute();

        return $getAll->fetchAll();
    }
    public function cososanxuatGetThis() {
        $getAll = $this->connect->prepare("select * from cososanxuat");
        $getAll->setFetchMode(PDO::FETCH_OBJ);
        $getAll->execute();

        return $getAll->fetch();
    }
    public function cososanxuatGetByTen($ten_csxs, $id_cssx) {
        $getAll = $this->connect->prepare("select * from cososanxuat where ten_cssx=? and id_cssx != ?");
        $getAll->setFetchMode(PDO::FETCH_OBJ);
        $getAll->execute(array($ten_csxs, $id_cssx));

        if($getAll->rowCount()){
            return $getAll->fetch()->id_cssx;
        }else{
            return 0;
        }
        
        }
    public function cososanxuatAdd($email,$chu_co_so,$ten_cssx,$so_dien_thoai,$dia_chi,$mo_ta) {
        $add = $this->connect->prepare("INSERT INTO cososanxuat(email,chu_co_so,ten_cssx,so_dien_thoai,dia_chi,mo_ta) VALUES (?,?,?,?,?,?)");
        $add->execute(array($email,$chu_co_so,$ten_cssx,$so_dien_thoai,$dia_chi,$mo_ta));
        if($add->rowCount()){
            return $this->connect->lastInsertId();
        }else{
            return 0;
        }
    }

    public function cososanxuatDelete($id_cssx) {
        $del = $this->connect->prepare("DELETE FROM cososanxuat WHERE id_cssx=?");

        $del->execute(array($id_cssx));

        return $del->rowCount();
    }

    public function cososanxuatUpdate($id_cssx, $email,$chu_co_so,$ten_cssx,$so_dien_thoai,$dia_chi,$mo_ta) {
        $update = $this->connect->prepare("UPDATE cososanxuat SET email=?,chu_co_so=?,ten_cssx=?,so_dien_thoai=?,dia_chi=?,mo_ta=? WHERE id_cssx=?");

        $update->execute(array($email,$chu_co_so,$ten_cssx,$so_dien_thoai,$dia_chi,$mo_ta, $id_cssx));

        return $update->rowCount();
    }

    public function cososanxuatGetById($id_cssx) {
        $gettd = $this->connect->prepare("SELECT * FROM cososanxuat WHERE id_cssx=?");
        $gettd->setFetchMode(PDO::FETCH_OBJ);
        $gettd->execute(array($id_cssx));

        return $gettd->fetch();
    }
    
    // nongthuysan
    public function nongthuysanGetAll() {
        $getAll = $this->connect->prepare("select * from nongthuysan");
        $getAll->setFetchMode(PDO::FETCH_OBJ);
        $getAll->execute();

        return $getAll->fetchAll();
    }

    public function nongthuysanAdd($ten_hang_hoa,$phan_loai,$mo_ta,$id_khu_vuc) {
        $add = $this->connect->prepare("INSERT INTO nongthuysan(ten_hang_hoa,phan_loai,mo_ta,id_khu_vuc) VALUES (?,?,?,?)");
        $add->execute(array($ten_hang_hoa,$phan_loai,$mo_ta,$id_khu_vuc));
        if($add->rowCount()){
            return $this->connect->lastInsertId();
        }else{
            return 0;
        }
    }

    public function nongthuysanAddHinhAnh($hinh_anh,$id_hang_hoa) {
        $update = $this->connect->prepare("UPDATE nongthuysan SET hinh_anh=? WHERE id_hang_hoa=?");
        $update->execute(array($hinh_anh,$id_hang_hoa));
        return $update->rowCount();
    }

    public function nongthuysanDelete($id_hang_hoa) {
        $del = $this->connect->prepare("DELETE FROM nongthuysan WHERE id_hang_hoa=?");

        $del->execute(array($id_hang_hoa));

        return $del->rowCount();
    }

    public function nongthuysanUpdate($id_hang_hoa, $ten_hang_hoa,$phan_loai,$mo_ta,$hinh_anh,$id_khu_vuc) {
        $update = $this->connect->prepare("UPDATE nongthuysan SET ten_hang_hoa=?, phan_loai=?, mo_ta=?, hinh_anh=?, id_khu_vuc=? WHERE id_hang_hoa=?");

        $update->execute(array($ten_hang_hoa,$phan_loai,$mo_ta,$hinh_anh,$id_khu_vuc, $id_hang_hoa));

        return $update->rowCount();
    }

    public function nongthuysanGetById($id_hang_hoa) {
        $gettd = $this->connect->prepare("SELECT * FROM nongthuysan WHERE id_hang_hoa=?");
        $gettd->setFetchMode(PDO::FETCH_OBJ);
        $gettd->execute(array($id_hang_hoa));

        return $gettd->fetch();
    }
    //khuvucnuoitrong
    public function khuvucnuoitrongGetAll() {
        $getAll = $this->connect->prepare("select * from khuvucnuoitrong");
        $getAll->setFetchMode(PDO::FETCH_OBJ);
        $getAll->execute();

        return $getAll->fetchAll();
    }

    public function khuvucnuoitrongGetChart() {
        $getAll = $this->connect->prepare("select count(*) as so_luong, ten_khu_vuc from khuvucnuoitrong inner join nongthuysan on khuvucnuoitrong.id_khu_vuc = nongthuysan.id_khu_vuc group by khuvucnuoitrong.id_khu_vuc");
        $getAll->setFetchMode(PDO::FETCH_OBJ);
        $getAll->execute();

        return $getAll->fetchAll();
    }

    public function khuvucnuoitrongAdd($ten_khu_vuc,$dien_tich,$dia_chi,$id_cssx) {
        $add = $this->connect->prepare("INSERT INTO khuvucnuoitrong(ten_khu_vuc,dien_tich,dia_chi,id_cssx) VALUES (?,?,?,?)");
        $add->execute(array($ten_khu_vuc,$dien_tich,$dia_chi,$id_cssx));
        if($add->rowCount()){
            return $this->connect->lastInsertId();
        }else{
            return 0;
        }
    }

    public function khuvucnuoitrongDelete($id_khu_vuc) {
        $del = $this->connect->prepare("DELETE FROM khuvucnuoitrong WHERE id_khu_vuc=?");

        $del->execute(array($id_khu_vuc));

        return $del->rowCount();
    }

    public function khuvucnuoitrongUpdate($id_khu_vuc, $ten_khu_vuc,$dien_tich,$dia_chi,$id_cssx) {
        $update = $this->connect->prepare("UPDATE khuvucnuoitrong SET ten_khu_vuc=?,dien_tich=?,dia_chi=?,id_cssx=? WHERE id_khu_vuc=?");

        $update->execute(array($ten_khu_vuc,$dien_tich,$dia_chi,$id_cssx, $id_khu_vuc));

        return $update->rowCount();
    }

    public function khuvucnuoitrongGetById($id_khu_vuc) {
        $gettd = $this->connect->prepare("SELECT * FROM khuvucnuoitrong WHERE id_khu_vuc=?");
        $gettd->setFetchMode(PDO::FETCH_OBJ);
        $gettd->execute(array($id_khu_vuc));

        return $gettd->fetch();
    }
    // qrcode
    public function qrcodeGetAll() {
        $getAll = $this->connect->prepare("select * from qrcode inner join nongthuysan on qrcode.id_hang_hoa = nongthuysan.id_hang_hoa");
        $getAll->setFetchMode(PDO::FETCH_OBJ);
        $getAll->execute();

        return $getAll->fetchAll();
    }

    public function qrcodeGetBynongthuysan($id_hang_hoa) {
        $getAll = $this->connect->prepare("select * from qrcode inner join nongthuysan on qrcode.id_hang_hoa = nongthuysan.id_hang_hoa where qrcode.id_hang_hoa=?");
        $getAll->setFetchMode(PDO::FETCH_OBJ);
        $getAll->execute(array($id_hang_hoa));

        return $getAll->fetch();
    }

    public function qrcodeAdd($qr_image,$qr_link,$id_hang_hoa) {
        $add = $this->connect->prepare("INSERT INTO qrcode(qr_image,qr_link,id_hang_hoa) VALUES (?,?,?)");
        $add->execute(array($qr_image,$qr_link,$id_hang_hoa));
        if($add->rowCount()){
            return $this->connect->lastInsertId();
        }else{
            return 0;
        }
    }

    public function qrcodeDelete($id_qr_code) {
        $del = $this->connect->prepare("DELETE FROM qrcode WHERE id_qr_code=?");

        $del->execute(array($id_qr_code));

        return $del->rowCount();
    }

    public function qrcodeUpdate($id_qr_code, $qr_image,$qr_link,$id_hang_hoa) {
        $update = $this->connect->prepare("UPDATE qrcode SET qr_image=?,qr_link=?,id_hang_hoa=? WHERE id_qr_code=?");

        $update->execute(array($qr_image,$qr_link,$id_hang_hoa, $id_qr_code));

        return $update->rowCount();
    }

    public function qrcodeGetById($id_qr_code) {
        $gettd = $this->connect->prepare("SELECT * FROM qrcode WHERE id_qr_code=?");
        $gettd->setFetchMode(PDO::FETCH_OBJ);
        $gettd->execute(array($id_qr_code));

        return $gettd->fetch();
    }

    //quytrinhnuoitrong

     public function quytrinhnuoitrongGetAll() {
        $getAll = $this->connect->prepare("select * from quytrinhnuoitrong");
        $getAll->setFetchMode(PDO::FETCH_OBJ);
        $getAll->execute();

        return $getAll->fetchAll();
    }

    public function quytrinhnuoitrongAdd($thoi_gian_bat_dau,$thoi_gian_thu_hoach,$so_luong_nuoi_trong,$so_luong_thu_hoach,$han_su_dung,$noi_thu_mua,$ghi_chu,$id_khu_vuc) {
        $add = $this->connect->prepare("INSERT INTO quytrinhnuoitrong(thoi_gian_bat_dau,thoi_gian_thu_hoach,so_luong_nuoi_trong,so_luong_thu_hoach,han_su_dung,noi_thu_mua,ghi_chu,id_khu_vuc) VALUES (?,?,?,?,?,?,?,?)");
        $add->execute(array($thoi_gian_bat_dau,$thoi_gian_thu_hoach,$so_luong_nuoi_trong,$so_luong_thu_hoach,$han_su_dung,$noi_thu_mua,$ghi_chu,$id_khu_vuc));
        if($add->rowCount()){
            return $this->connect->lastInsertId();
        }else{
            return 0;
        }
    }

    public function quytrinhnuoitrongDelete($id_quy_trinh) {
        $del = $this->connect->prepare("DELETE FROM quytrinhnuoitrong WHERE id_quy_trinh=?");

        $del->execute(array($id_quy_trinh));

        return $del->rowCount();
    }

    public function quytrinhnuoitrongUpdate($id_quy_trinh, $thoi_gian_bat_dau,$thoi_gian_thu_hoach,$so_luong_nuoi_trong,$so_luong_thu_hoach,$han_su_dung,$noi_thu_mua,$ghi_chu,$id_khu_vuc) {
        $update = $this->connect->prepare("UPDATE quytrinhnuoitrong SET thoi_gian_bat_dau=?,thoi_gian_thu_hoach=?,so_luong_nuoi_trong=?,so_luong_thu_hoach=?,han_su_dung=?,noi_thu_mua=?,ghi_chu=?,id_khu_vuc=? WHERE id_quy_trinh=?");

        $update->execute(array($thoi_gian_bat_dau,$thoi_gian_thu_hoach,$so_luong_nuoi_trong,$so_luong_thu_hoach,$han_su_dung,$noi_thu_mua,$ghi_chu,$id_khu_vuc, $id_quy_trinh));

        return $update->rowCount();
    }

    public function quytrinhnuoitrongGetById($id_quy_trinh) {
        $gettd = $this->connect->prepare("SELECT * FROM quytrinhnuoitrong WHERE id_quy_trinh=?");
        $gettd->setFetchMode(PDO::FETCH_OBJ);
        $gettd->execute(array($id_quy_trinh));

        return $gettd->fetch();
    }
    // taikhoan
    public function taikhoanGetAll() {
        $getAll = $this->connect->prepare("select * from taikhoan");
        $getAll->setFetchMode(PDO::FETCH_OBJ);
        $getAll->execute();

        return $getAll->fetchAll();
    }


    public function taikhoanDelete($id_tai_khoan) {
        $del = $this->connect->prepare("DELETE FROM taikhoan WHERE id_tai_khoan=?");

        $del->execute(array($id_tai_khoan));

        return $del->rowCount();
    }

    public function taikhoanUpdate($id_tai_khoan, $ten_hien_thi,$ten_tai_khoan,$mat_khau) {
        $update = $this->connect->prepare("UPDATE taikhoan SET ten_hien_thi=?, ten_tai_khoan=?,mat_khau=? WHERE id_tai_khoan=?");

        $update->execute(array($ten_hien_thi, $ten_tai_khoan,$mat_khau, $id_tai_khoan));

        return $update->rowCount();
    }

    public function taikhoanGetById($id_tai_khoan) {
        $gettd = $this->connect->prepare("SELECT * FROM taikhoan WHERE id_tai_khoan=?");
        $gettd->setFetchMode(PDO::FETCH_OBJ);
        $gettd->execute(array($id_tai_khoan));

        return $gettd->fetch();
    }

    public function taikhoanDangNhap($ten_tai_khoan,$mat_khau) {
        $gettd = $this->connect->prepare("SELECT * FROM taikhoan WHERE ten_tai_khoan=? AND mat_khau=?");
        $gettd->setFetchMode(PDO::FETCH_OBJ);
        $gettd->execute(array($ten_tai_khoan,$mat_khau));

        if($gettd->rowCount()){
            return $gettd->fetch();
        }else{
            return 0;
        }
    }
    public function taikhoanDangKy($ten_hien_thi, $ten_tai_khoan,$mat_khau) {
        $gettd = $this->connect->prepare("INSERT INTO taikhoan (ten_hien_thi, ten_tai_khoan, mat_khau) VALUES(?,?,?)");

        $gettd->execute(array($ten_hien_thi, $ten_tai_khoan,$mat_khau));

        return $gettd->rowCount();

    }
}

?>