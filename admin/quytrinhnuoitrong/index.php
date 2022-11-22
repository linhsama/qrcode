<?php
    require '../model/modelClass.php';
    $model = new modelClass();
    $list_quytrinhnuoitrong = $model->quytrinhnuoitrongGetAll();
    $list_khuvuc = $model->khuvucnuoitrongGetAll()
?>
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Danh sách khu vực nuôi trồng</h1>
</div>
<div id="form-data">
    <form action="./quytrinhnuoitrong/action.php?req=add" method="post" enctype="multipart/form-data">
        <div class="row mb-3">
            <label for="thoi_gian_bat_dau" class="col-sm-2 col-form-label">Thời gian bắt đầu nuôi</label>
            <div class="col-sm-10">
                <input type="date" class="form-control" name="thoi_gian_bat_dau" required="">
            </div>
        </div>
        <div class="row mb-3">
            <label for="thoi_gian_thu_hoach" class="col-sm-2 col-form-label">Thời gian thu hoạch</label>
            <div class="col-sm-10">
                <input type="date" class="form-control" name="thoi_gian_thu_hoach" required="">
            </div>
        </div>
        <div class="row mb-3">
            <label for="so_luong_nuoi_trong" class="col-sm-2 col-form-label">Số lượng nuôi trồng</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="so_luong_nuoi_trong" required="">
            </div>
        </div>
        <div class="row mb-3">
            <label for="so_luong_thu_hoach" class="col-sm-2 col-form-label">Số lượng thu hoạch</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="so_luong_thu_hoach" required="">
            </div>
        </div>
        <div class="row mb-3">
            <label for="han_su_dung" class="col-sm-2 col-form-label">Hạn sử dụng</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="han_su_dung" required="">
            </div>
        </div>
        <div class="row mb-3">
            <label for="noi_thu_mua" class="col-sm-2 col-form-label">Nơi thu mua</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="noi_thu_mua" required="">
            </div>
        </div>
        <div class="row mb-3">
            <label for="ghi_chu" class="col-sm-2 col-form-label">Ghi chú</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="ghi_chu">
            </div>
        </div>
        <fieldset class="row mb-3">
            <legend class="col-form-label col-sm-2 pt-0">Khu vực sản xuất</legend>
            <div class="col-sm-10">
                <select class="form-select" name="id_khu_vuc" required="">
                    <option value="" selected>Chọn khu vực nuôi...</option>
                    <?php foreach($list_khuvuc as $item):?>
                    <option value="<?=$item->id_khu_vuc?>"><?=$item->ten_khu_vuc?></option>
                    <?php endforeach?>
                </select>
            </div>
        </fieldset>
        <button type="submit" class="btn btn-sm btn-primary">Thêm mới</button>
    </form>
</div>

<hr>

<h5>Danh sách quy trình: <font color="red"><?=count($list_quytrinhnuoitrong)?> quy trình</font>
</h5>
<div class="table-responsive">
    <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Thời gian bắt đầu</th>
                <th scope="col">Thời gian thu hoạch</th>
                <th scope="col">Số lượng thả nuôi</th>
                <th scope="col">Số lượng thu hoạch</th>
                <th scope="col">Hạn sử dụng</th>
                <th scope="col">Nơi thu mua</th>
                <th scope="col">Ghi chú</th>
                <th scope="col">Khu vực nuôi</th>
                <th scope="col">Thao tác</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($list_quytrinhnuoitrong as $item):?>
            <tr>

                <td><?=$item->id_quy_trinh?></td>
                <td><?=date('d-m-Y',strtotime($item->thoi_gian_bat_dau))?></td>
                <td><?=date('d-m-Y',strtotime($item->thoi_gian_thu_hoach))?></td>
                <td><?=$item->so_luong_nuoi_trong?></td>
                <td><?=$item->so_luong_thu_hoach?></td>
                <td><?=$item->han_su_dung?></td>
                <td><?=$item->noi_thu_mua?></td>
                <td><?=$item->ghi_chu?></td>
                <td><?=$model->khuvucnuoitrongGetById($item->id_khu_vuc)->ten_khu_vuc?></td>
                <td>
                    <button href="#" onclick="update(<?=$item->id_quy_trinh?>)" class="btn btn-sm btn-warning m-2">Cập
                        nhật</button>
                    <a href="./quytrinhnuoitrong/action.php?req=delete&id_quy_trinh=<?=$item->id_quy_trinh?>"
                        class="btn btn-sm btn-danger m-2" onclick="return confirm('Chắc chắn xóa')">Xóa</a>
                </td>
            </tr>
            <?php endforeach?>
        </tbody>
    </table>
</div>

<script src="../assets/vendor/jquery-3.6.1.min.js"></script>
<script>
function update(id_quy_trinh) {
    $.post("quytrinhnuoitrong/update.php", {
        id_quy_trinh: id_quy_trinh,
    }, function(data, status) {
        $("#form-data").html(data);
    });
};
</script>