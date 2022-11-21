<?php

$s = "../connect/database.php";
if (file_exists($s)) {
    $f = $s;
} else {
    $f = "../../connect/database.php";
}
include_once($f);

class hanghoaClass extends Database {
     
    public function hanghoaGetAll() {
        $getAll = $this->connect->prepare("select * from hanghoa");
        $getAll->setFetchMode(PDO::FETCH_OBJ);
        $getAll->execute();

        return $getAll->fetchAll();
    }

    public function hanghoaAdd($ten_hang_hoa, $phan_loai, $mo_ta, $id_cssx) {
        $add = $this->connect->prepare("INSERT INTO hanghoa(ten_hang_hoa, phan_loai, mo_ta, id_cssx) VALUES (?,?,?,?)");
        $add->execute(array($ten_hang_hoa, $phan_loai, $mo_ta, $id_cssx));
        if($add->rowCount()){
            return $this->connect->lastInsertId();
        }else{
            return 0;
        }
    }

    public function hanghoaAddQr($id_hang_hoa, $qr_link, $qr_image, $hinh_anh) {
        $update = $this->connect->prepare("UPDATE hanghoa SET qr_link=?, qr_image=?, hinh_anh=? WHERE id_hang_hoa=?");

        $update->execute(array($qr_link, $qr_image, $hinh_anh, $id_hang_hoa));

        return $update->rowCount();
    }

    public function hanghoaDelete($id_hang_hoa) {
        $del = $this->connect->prepare("DELETE FROM hanghoa WHERE id_hang_hoa=?");

        $del->execute(array($id_hang_hoa));

        return $del->rowCount();
    }

    public function hanghoaUpdate($id_hang_hoa, $ten_hang_hoa, $phan_loai, $mo_ta, $hinh_anh) {
        $update = $this->connect->prepare("UPDATE hanghoa SET ten_hang_hoa=?, phan_loai=?, mo_ta=?, hinh_anh=? WHERE id_hang_hoa=?");

        $update->execute(array($ten_hang_hoa, $phan_loai, $mo_ta, $hinh_anh, $id_hang_hoa));

        return $update->rowCount();
    }

    public function hanghoaGetById($id_hang_hoa) {
        $gettd = $this->connect->prepare("SELECT * FROM hanghoa WHERE id_hang_hoa=?");
        $gettd->setFetchMode(PDO::FETCH_OBJ);
        $gettd->execute(array($id_hang_hoa));

        return $gettd->fetch();
    }
}

?>