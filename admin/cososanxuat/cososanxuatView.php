<?php
    require '../model/hanghoaClass.php';
    require '../model/cososanxuatClass.php';
    $hh = new hanghoaClass();
    $cssx = new cososanxuatClass();
    $list_hanghoa = $hh->hanghoaGetAll();
    $list_cssx = $cssx->cososanxuatGetAll();
?>

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Danh sách nông sản/thủy sản cấp QR</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group me-2">
            <a href="./hanghoa/hanghoaAction.php?req=inTatCa" class="btn btn-sm btn-secondary m-2" target="_blank">In
                tất cả</a>
        </div>
    </div>
</div>
<div id="form-data">
    <form action="./hanghoa/hanghoaAction.php?req=addNew" method="post" enctype="multipart/form-data">
        <div class="row mb-3">
            <label for="ten_hang_hoa" class="col-sm-2 col-form-label">Tên hàng hóa</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="ten_hang_hoa" required="">
            </div>
        </div>
        <div class="row mb-3">
            <label for="mo_ta" class="col-sm-2 col-form-label">Mô tả</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="mo_ta" required="">
            </div>
        </div>
        <fieldset class="row mb-3">
            <legend class="col-form-label col-sm-2 pt-0">Phân loại</legend>
            <div class="col-sm-10">
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
            </div>
        </fieldset>
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
        <fieldset class="row mb-3">
            <legend class="col-form-label col-sm-2 pt-0">Chọn hình ảnh</legend>
            <div class="col-sm-10">
                <input type="file" name="file" id="file" required="">
                <img src="" alt="" id="img" class="img-small">
            </div>
        </fieldset>
        <button type="submit" class="btn btn-sm btn-primary">Thêm mới</button>
    </form>
</div>

<hr>

<h5>Danh sách hàng hóa: <font color="red"><?=count($list_hanghoa)?> hàng hóa</font>
</h5>
<div class="table-rehhonsive">
    <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">ID</th>
                <th scope="col">Tên hàng hóa</th>
                <th scope="col">Phân loại</th>
                <th scope="col">Mô tả</th>
                <th scope="col">QR hàng hóa</th>
                <th scope="col">Cơ sở sản xuất</th>
                <th scope="col">Thao tác</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($list_hanghoa as $item):?>
            <tr>
                <td><img src="./hanghoa/<?=$item->hinh_anh?>" alt="" class="img-small"></td>
                <td><?=$item->id_hang_hoa?></td>
                <td><?=$item->ten_hang_hoa?></td>
                <td><?=$item->phan_loai == "1" ? "Nông sản" : "Thủy sản"?></td>
                <td><?=$item->mo_ta?></td>
                <td><?=$cssx->cososanxuatGetById($item->id_cssx)->ten_cssx?></td>
                <td><img src="./hanghoa/<?=$item->qr_image?>" alt="" class="img-small"></td>
                <td><a target="_blank" href="./hanghoa/hanghoaAction.php?req=in&id_hang_hoa=<?=$item->id_hang_hoa?>"
                        class="btn btn-sm btn-primary m-2">In mã QR</a>
                    <a target="_blank" href="../hanghoa/hanghoaDetail.php?id_hang_hoa=<?=$item->id_hang_hoa?>"
                        class="btn btn-sm btn-success m-2">Xem chi tiết</a>
                    <button href="#" onclick="update(<?=$item->id_hang_hoa?>)" class="btn btn-sm btn-warning m-2">Cập
                        nhật</button>
                    <a href="./hanghoa/hanghoaAction.php?req=delete&id_hang_hoa=<?=$item->id_hang_hoa?>"
                        class="btn btn-sm btn-danger m-2" onclick="return confirm('Chắc chắn xóa')">Xóa</a>
                </td>
            </tr>
            <?php endforeach?>
        </tbody>
    </table>
</div>

<script src="../assets/vendor/jquery-3.6.1.min.js"></script>
<script>
function update(id_hang_hoa) {
    $.post("hanghoa/hanghoaUpdate.php", {
        id_hang_hoa: id_hang_hoa,
    }, function(data, status) {
        $("#form-data").html(data);
    });
};
const reader = new FileReader();
const fileInput = document.getElementById("file");
const img = document.getElementById("img");

fileInput.addEventListener('change', e => {
    const f = e.target.files[0];
    reader.readAsDataURL(f);
})

reader.onload = e => {
    img.src = e.target.result;
}
</script>