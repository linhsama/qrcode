<?php
    require '../../model/modelClass.php';
    $model = new modelClass();
    if(isset($_POST['id_quy_trinh'])){
        $id_quy_trinh = $_POST['id_quy_trinh'];
        $list_khuvuc = $model->khuvucnuoitrongGetAll();
        $obj_quytrinh = $model->quytrinhnuoitrongGetById($id_quy_trinh);
    }
?>

<form action="./quytrinhnuoitrong/action.php?req=update" method="post" enctype="multipart/form-data">
    <input type="hidden" class="form-control" name="id_quy_trinh" required="" value="<?=$id_quy_trinh?>">
    <div class="row mb-3">
        <label for="thoi_gian_bat_dau" class="col-sm-2 col-form-label">Thời gian bắt đầu nuôi</label>
        <div class="col-sm-10">
            <input type="date" class="form-control" name="thoi_gian_bat_dau" required=""
                value="<?=date('Y-m-d',strtotime($obj_quytrinh->thoi_gian_bat_dau))?>">
        </div>
    </div>
    <div class="row mb-3">
        <label for="thoi_gian_thu_hoach" class="col-sm-2 col-form-label">Thời gian thu hoạch</label>
        <div class="col-sm-10">
            <input type="date" class="form-control" name="thoi_gian_thu_hoach" required=""
                value="<?=date('Y-m-d',strtotime($obj_quytrinh->thoi_gian_thu_hoach))?>">
        </div>
    </div>
    <div class="row mb-3">
        <label for="so_luong_nuoi_trong" class="col-sm-2 col-form-label">Số lượng nuôi trồng</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="so_luong_nuoi_trong" required=""
                value="<?=$obj_quytrinh->so_luong_nuoi_trong?>">
        </div>
    </div>
    <div class="row mb-3">
        <label for="so_luong_thu_hoach" class="col-sm-2 col-form-label">Số lượng thu hoạch</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="so_luong_thu_hoach" required=""
                value="<?=$obj_quytrinh->so_luong_thu_hoach?>">
        </div>
    </div>
    <div class="row mb-3">
        <label for="han_su_dung" class="col-sm-2 col-form-label">Hạn sử dụng</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="han_su_dung" required=""
                value="<?=$obj_quytrinh->han_su_dung?>">
        </div>
    </div>
    <div class="row mb-3">
        <label for="noi_thu_mua" class="col-sm-2 col-form-label">Nơi thu mua</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="noi_thu_mua" required=""
                value="<?=$obj_quytrinh->noi_thu_mua?>">
        </div>
    </div>
    <div class="row mb-3">
        <label for="ghi_chu" class="col-sm-2 col-form-label">Ghi chú</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="ghi_chu" value="<?=$obj_quytrinh->ghi_chu?>">
        </div>
    </div>
    <fieldset class="row mb-3">
        <legend class="col-form-label col-sm-2 pt-0">Khu vực sản xuất</legend>
        <div class="col-sm-10">
            <select class="form-select" name="id_khu_vuc" required="">
                <option value="<?=$obj_quytrinh->id_khu_vuc?>">
                    <?=$model->khuvucnuoitrongGetById($obj_quytrinh->id_khu_vuc)->ten_khu_vuc?></option>
                <?php foreach($list_khuvuc as $item):?>
                <?php if($item->id_khu_vuc != $obj_quytrinh->id_khu_vuc):?>
                <option value="<?=$item->id_khu_vuc?>"><?=$item->ten_khu_vuc?></option>
                <?php endif?>
                <?php endforeach?>
            </select>
        </div>
    </fieldset>
    <button type="submit" class="btn btn-sm btn-warning">Cập nhật</button>
</form>