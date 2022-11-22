<?php
    require '../model/modelClass.php';
    $model = new modelClass();
    $list_khuvucnuoitrong = $model->khuvucnuoitrongGetAll();
    $list_cssx = $model->cososanxuatGetAll()
?>
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Danh sách khu vực nuôi trồng</h1>
</div>
<div id="form-data">
    <form action="./khuvucnuoitrong/action.php?req=add" method="post" enctype="multipart/form-data">
        <div class="row mb-3">
            <label for="ten_khu_vuc" class="col-sm-2 col-form-label">Tên khu vực</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="ten_khu_vuc" required="">
            </div>
        </div>
        <div class="row mb-3">
            <label for="dien_tich" class="col-sm-2 col-form-label">Diện tích</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="dien_tich" required="">
            </div>
        </div>
        <div class="row mb-3">
            <label for="dia_chi" class="col-sm-2 col-form-label">Địa chỉ</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="dia_chi" required="">
            </div>
        </div>
        <fieldset class="row mb-3">
            <legend class="col-form-label col-sm-2 pt-0">Cơ sở sản xuất</legend>
            <div class="col-sm-10">
                <select class="form-select" name="id_cssx" required="">
                    <option value="" selected>Chọn cơ sở...</option>
                    <?php foreach($list_cssx as $item):?>
                    <option value="<?=$item->id_cssx?>"><?=$item->ten_cssx?></option>
                    <?php endforeach?>
                </select>
            </div>
        </fieldset>

        <button type="submit" class="btn btn-sm btn-primary">Thêm mới</button>
    </form>
</div>

<hr>

<h5>Danh sách khu vực nuôi trồng: <font color="red"><?=count($list_khuvucnuoitrong)?> khu vực nuôi trồng</font>
</h5>
<div class="table-responsive">
    <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Tên khu vực nuôi trồng</th>
                <th scope="col">Diện tích</th>
                <th scope="col">Địa chỉ</th>
                <th scope="col">Cơ sở sản xuất</th>
                <th scope="col">Thao tác</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($list_khuvucnuoitrong as $item):?>
            <tr>
                <td><?=$item->id_khu_vuc?></td>
                <td><?=$item->ten_khu_vuc?></td>
                <td><?=$item->dien_tich?></td>
                <td><?=$item->dia_chi?></td>
                <td><?=$model->cososanxuatGetById($item->id_cssx)->ten_cssx?></td>
                <td>
                    <button href="#" onclick="update(<?=$item->id_khu_vuc?>)" class="btn btn-sm btn-warning m-2">Cập
                        nhật</button>
                    <a href="./khuvucnuoitrong/action.php?req=delete&id_khu_vuc=<?=$item->id_khu_vuc?>"
                        class="btn btn-sm btn-danger m-2" onclick="return confirm('Chắc chắn xóa')">Xóa</a>
                </td>
            </tr>
            <?php endforeach?>
        </tbody>
    </table>
</div>

<script src="../assets/vendor/jquery-3.6.1.min.js"></script>
<script>
function update(id_khu_vuc) {
    $.post("khuvucnuoitrong/update.php", {
        id_khu_vuc: id_khu_vuc,
    }, function(data, status) {
        $("#form-data").html(data);
    });
};
</script>