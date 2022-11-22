<?php
    require '../../model/modelClass.php';
    $model = new modelClass();
    if(isset($_POST['id_tai_khoan'])){
        $id_tai_khoan = $_POST['id_tai_khoan'];
        $obj_taikhoan = $model->taikhoanGetById($id_tai_khoan);
    }
?>

<form action="./taikhoan/action.php?req=update" method="post" enctype="multipart/form-data">
    <input type="hidden" class="form-control" name="id_tai_khoan" required="" value="<?=$id_tai_khoan?>">
    <div class="row mb-3">
        <label for="ten_hien_thi" class="col-sm-2 col-form-label">Tên hiển thị</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="ten_hien_thi" required=""
                value="<?=$obj_taikhoan->ten_hien_thi?>">
        </div>
    </div>
    <div class=" row mb-3">
        <label for="ten_tai_khoan" class="col-sm-2 col-form-label">Tên đăng nhập</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="ten_tai_khoan" required=""
                value="<?=$obj_taikhoan->ten_tai_khoan?>">
        </div>
    </div>
    <div class=" row mb-3">
        <label for="mat_khau" class="col-sm-2 col-form-label">Mật khẩu</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="mat_khau" required="" value="<?=$obj_taikhoan->mat_khau?>">
        </div>
    </div>
    <button type=" submit" class="btn btn-sm btn-warning">Cập nhật</button>
</form>