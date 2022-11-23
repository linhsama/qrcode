<?php
    require '../../model/modelClass.php';
    $model = new modelClass();
    if(isset($_POST['id_nts'])){
        $id_nts = $_POST['id_nts'];
        $list_khuvuc = $model->khuvucnuoitrongGetAll();
        $obj_nongthuysan = $model->nongthuysanGetById($id_nts);
    }
?>

<form action="./nongthuysan/action.php?req=update" method="post" enctype="multipart/form-data">
    <input type="hidden" class="form-control" name="id_nts" required="" value="<?=$obj_nongthuysan->id_nts?>">
    <input type="hidden" name="hinh_anh" value="<?=$obj_nongthuysan->hinh_anh?>">
    <div class="row mb-3">
        <label for="ten_nts" class="col-sm-2 col-form-label">Tên hàng hóa</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="ten_nts" required="" value="<?=$obj_nongthuysan->ten_nts?>">
        </div>
    </div>
    <div class="row mb-3">
        <label for="mo_ta" class="col-sm-2 col-form-label">Mô tả</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="mo_ta" required="" value="<?=$obj_nongthuysan->mo_ta?>">
        </div>
    </div>
    <fieldset class="row mb-3">
        <legend class="col-form-label col-sm-2 pt-0">Phân loại</legend>
        <div class="col-sm-10">
            <?php if($obj_nongthuysan->phan_loai == 1):?>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="phan_loai" value="1" checked>
                <label class="form-check-label" for="phan_loai">
                    Nông sản
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="phan_loai" value="2">
                <label class="form-check-label" for="phan_loai">
                    Thủy sản
                </label>
            </div>
            <?php elseif($obj_nongthuysan->phan_loai == 2):?>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="phan_loai" value="1">
                <label class="form-check-label" for="phan_loai">
                    Nông sản
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="phan_loai" value="2" checked>
                <label class="form-check-label" for="phan_loai">
                    Thủy sản
                </label>
            </div>
            <?php endif?>
        </div>
    </fieldset>
    <fieldset class="row mb-3">
        <legend class="col-form-label col-sm-2 pt-0">Khu vực sản xuất</legend>
        <div class="col-sm-10">
            <select class="form-select" name="id_khu_vuc" required="">
                <option value="<?=$obj_nongthuysan->id_khu_vuc?>">
                    <?=$model->khuvucnuoitrongGetById($obj_nongthuysan->id_khu_vuc)->ten_khu_vuc?></option>
                <?php foreach($list_khuvuc as $item):?>
                <?php if($item->id_khu_vuc != $obj_nongthuysan->id_khu_vuc):?>
                <option value="<?=$item->id_khu_vuc?>"><?=$item->ten_khu_vuc?></option>
                <?php endif?>
                <?php endforeach?>
            </select>
        </div>
    </fieldset>
    <fieldset class="row mb-3">
        <legend class="col-form-label col-sm-2 pt-0">Chọn hình ảnh</legend>
        <div class="col-sm-10">
            <input type="file" name="file" id="file">
            <img src="./nongthuysan/<?=$obj_nongthuysan->hinh_anh?>" alt="" class="img-small">
        </div>
    </fieldset>
    <button type="submit" class="btn btn-sm btn-warning">Cập nhật</button>
</form>