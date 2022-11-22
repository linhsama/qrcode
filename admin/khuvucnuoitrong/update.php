<?php
    require '../../model/modelClass.php';
    $model = new modelClass();
    if(isset($_POST['id_khu_vuc'])){
        $id_khu_vuc = $_POST['id_khu_vuc'];
        $list_cssx = $model->cososanxuatGetAll();
        $obj_khu_vuc = $model->khuvucnuoitrongGetById($id_khu_vuc);
    }
?>

<form action="./khuvucnuoitrong/action.php?req=update" method="post" enctype="multipart/form-data">
    <input type="hidden" class="form-control" name="id_khu_vuc" required="" value="<?=$obj_khu_vuc->id_khu_vuc?>">
    <div class="row mb-3">
        <label for="ten_khu_vuc" class="col-sm-2 col-form-label">Tên khu vực</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="ten_khu_vuc" required=""
                value="<?=$obj_khu_vuc->ten_khu_vuc?>">
        </div>
    </div>
    <div class="row mb-3">
        <label for="dien_tich" class="col-sm-2 col-form-label">Diện tích</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="dien_tich" required="" value="<?=$obj_khu_vuc->dien_tich?>">
        </div>
    </div>
    <div class="row mb-3">
        <label for="dia_chi" class="col-sm-2 col-form-label">Địa chỉ</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="dia_chi" required="" value="<?=$obj_khu_vuc->dia_chi?>">
        </div>
    </div>
    <fieldset class="row mb-3">
        <legend class="col-form-label col-sm-2 pt-0">Cơ sở sản xuất</legend>
        <div class="col-sm-10">
            <select class="form-select" name="id_cssx" required="">
                <option value="<?=$obj_khu_vuc->id_cssx?>">
                    <?=$model->cososanxuatGetById($obj_khu_vuc->id_cssx)->ten_cssx?></option>
                <?php foreach($list_cssx as $item):?>
                <?php if($item->id_cssx != $obj_khu_vuc->id_cssx):?>
                <option value="<?=$item->id_cssx?>"><?=$item->ten_cssx?></option>
                <?php endif?>
                <?php endforeach?>
            </select>
        </div>
    </fieldset>
    <button type="submit" class="btn btn-sm btn-warning">Cập nhật</button>
</form>