<?php
    require '../../model/modelClass.php';
    $model = new modelClass();
    if(isset($_POST['id_hang_hoa'])){
        $id_hang_hoa = $_POST['id_hang_hoa'];
        $list_khuvuc = $model->khuvucnuoitrongGetAll();
        $obj_hanghoa = $model->hanghoaGetById($id_hang_hoa);
    }
?>

<form action="./hanghoa/action.php?req=update" method="post" enctype="multipart/form-data">
    <input type="hidden" class="form-control" name="id_hang_hoa" required="" value="<?=$obj_hanghoa->id_hang_hoa?>">
    <input type="hidden" name="hinh_anh" value="<?=$obj_hanghoa->hinh_anh?>">
    <div class="row mb-3">
        <label for="ten_hang_hoa" class="col-sm-2 col-form-label">Tên hàng hóa</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="ten_hang_hoa" required=""
                value="<?=$obj_hanghoa->ten_hang_hoa?>">
        </div>
    </div>
    <div class="row mb-3">
        <label for="mo_ta" class="col-sm-2 col-form-label">Mô tả</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="mo_ta" required="" value="<?=$obj_hanghoa->mo_ta?>">
        </div>
    </div>
    <fieldset class="row mb-3">
        <legend class="col-form-label col-sm-2 pt-0">Phân loại</legend>
        <div class="col-sm-10">
            <?php if($obj_hanghoa->phan_loai == 1):?>
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
            <?php elseif($obj_hanghoa->phan_loai == 2):?>
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
                <option value="<?=$obj_hanghoa->id_khu_vuc?>">
                    <?=$model->khuvucnuoitrongGetById($obj_hanghoa->id_khu_vuc)->ten_khu_vuc?></option>
                <?php foreach($list_khuvuc as $item):?>
                <?php if($item->id_khu_vuc != $obj_hanghoa->id_khu_vuc):?>
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
            <img src="./hanghoa/<?=$obj_hanghoa->hinh_anh?>" alt="" class="img-small">
        </div>
    </fieldset>
    <button type="submit" class="btn btn-sm btn-warning">Cập nhật</button>
</form>