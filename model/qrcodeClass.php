<?php

$s = "./connect/database.php";
if (file_exists($s)) {
    $f = $s;
} else {
    $f = "../connect/database.php";
}
include_once($f);

class qrcodeClass extends Database {
     
    public function qrcodeGetAll() {
        $getAll = $this->connect->prepare("select * from qrcode");
        $getAll->setFetchMode(PDO::FETCH_OBJ);
        $getAll->execute();

        return $getAll->fetchAll();
    }

    public function qrcodeAdd($qr_text, $qr_image) {
        $add = $this->connect->prepare("INSERT INTO qrcode(qr_text, qr_image) VALUES (?,?)");

        $add->execute(array($qr_text, $qr_image));

        return $add->rowCount();
    }

    public function qrcodeDelete($qr_id) {
        $del = $this->connect->prepare("DELETE FROM qrcode WHERE qr_id=?");

        $del->execute(array($qr_id));

        return $del->rowCount();
    }

    public function qrcodeUpdate($qr_id, $qr_text, $qr_image) {
        $update = $this->connect->prepare("UPDATE qrcode SET qr_text=?, qr_image=? WHERE qr_id=?");

        $update->execute(array($qr_text, $qr_image));

        return $update->rowCount();
    }

     public function qrcodeGetById($qr_id) {
        $gettd = $this->connect->prepare("SELECT * FROM qrcode VALUES qr_id=?");
        $gettd->setFetchMode(PDO::FETCH_OBJ);
        $gettd->execute(array($qr_id));

        return $gettd->fetch();
    }
}

?>