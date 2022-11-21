<?php

$s = "../connect/database.php";
if (file_exists($s)) {
    $f = $s;
} else {
    $f = "../../connect/database.php";
}
include_once($f);

class cososanxuatClass extends Database {
     
    public function cososanxuatGetAll() {
        $getAll = $this->connect->prepare("select * from cososanxuat where email != 'admin@gmail.com'");
        $getAll->setFetchMode(PDO::FETCH_OBJ);
        $getAll->execute();

        return $getAll->fetchAll();
    }

    public function cososanxuatAdd($email, $mat_khau, $ten_cssx, $so_dien_thoai, $dia_chi, $mo_ta, $loai_hinh_sx) {
        if($ten_cssx != 'admin' || $email != 'admin@gmail.com'){
            $add = $this->connect->prepare("INSERT INTO cososanxuat(email, mat_khau, ten_cssx, so_dien_thoai, dia_chi, mo_ta, loai_hinh_sx) VALUES (?,?,?,?,?,?,?)");
            $add->execute(array($email, $mat_khau, $ten_cssx, $so_dien_thoai, $dia_chi, $mo_ta, $loai_hinh_sx));
            return $add->rowCount();
        }else{
            return 0;
        }

    }

    public function cososanxuatDelete($id_cssx) {
        $del = $this->connect->prepare("DELETE FROM cososanxuat WHERE id_cssx=? AND ten_cssx !=?");

        $del->execute(array($id_cssx,'admin'));

        return $del->rowCount();
    }

    public function cososanxuatUpdate($id_cssx, $email, $mat_khau, $ten_cssx, $so_dien_thoai, $dia_chi, $mo_ta, $loai_hinh_sx) {
        $update = $this->connect->prepare("UPDATE cososanxuat SET email=?, mat_khau=?, ten_cssx=?, so_dien_thoai=?, dia_chi=?, mo_ta=?, loai_hinh_sx=? WHERE id_cssx=?");

        $update->execute(array($email, $mat_khau, $ten_cssx, $so_dien_thoai, $dia_chi, $mo_ta, $loai_hinh_sx, $id_cssx));

        return $update->rowCount();
    }

    public function cososanxuatGetById($id_cssx) {
        $gettd = $this->connect->prepare("SELECT * FROM cososanxuat WHERE id_cssx=?");
        $gettd->setFetchMode(PDO::FETCH_OBJ);
        $gettd->execute(array($id_cssx));

        return $gettd->fetch();
    }

    public function dangnhap($email, $mat_khau) {
        $gettd = $this->connect->prepare("SELECT * FROM cososanxuat WHERE email=? AND mat_khau=?");
        $gettd->setFetchMode(PDO::FETCH_OBJ);
        $gettd->execute(array($email, $mat_khau));

        if($gettd->rowCount()>0){
            return $gettd->fetch();
        }else{
            return 0;
        }
    }
}

?>