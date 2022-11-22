<?php
    require '../model/modelClass.php';
    $model = new modelClass();
    $list_taikhoan = $model->taikhoanGetAll();
?>
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Danh sách tài khoản</h1>
</div>
<div id="form-data">
    <form action="./taikhoan/action.php?req=add" method="post" enctype="multipart/form-data">
        <div class="row mb-3">
            <label for="ten_hien_thi" class="col-sm-2 col-form-label">Tên hiển thị</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="ten_hien_thi" required="">
            </div>
        </div>
        <div class="row mb-3">
            <label for="ten_tai_khoan" class="col-sm-2 col-form-label">Tên đăng nhập</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="ten_tai_khoan" required="">
            </div>
        </div>
        <div class="row mb-3">
            <label for="mat_khau" class="col-sm-2 col-form-label">Mật khẩu</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="mat_khau" required="">
            </div>
        </div>
        <button type="submit" class="btn btn-sm btn-primary">Thêm mới</button>
    </form>
</div>

<hr>

<h5>Danh sách tài khoản: <font color="red"><?=count($list_taikhoan)?> tài khoản</font>
</h5>
<div class="table-responsive">
    <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Tên hiển thị</th>
                <th scope="col">Tên tài khoản</th>
                <th scope="col">Mật khẩu</th>
                <th scope="col">Thao tác</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($list_taikhoan as $item):?>
            <tr>

                <td><?=$item->id_tai_khoan?></td>
                <td><?=$item->ten_hien_thi?></td>
                <td><?=$item->ten_tai_khoan?></td>
                <td><?=$item->mat_khau?></td>
                <td>
                    <button href="#" onclick="update(<?=$item->id_tai_khoan?>)" class="btn btn-sm btn-warning m-2">Cập
                        nhật</button>
                    <a href="./taikhoan/action.php?req=delete&id_tai_khoan=<?=$item->id_tai_khoan?>"
                        class="btn btn-sm btn-danger m-2" onclick="return confirm('Chắc chắn xóa')">Xóa</a>
                </td>
            </tr>
            <?php endforeach?>
        </tbody>
    </table>
</div>

<script src="../assets/vendor/jquery-3.6.1.min.js"></script>
<script>
function update(id_tai_khoan) {
    $.post("taikhoan/update.php", {
        id_tai_khoan: id_tai_khoan,
    }, function(data, status) {
        $("#form-data").html(data);
    });
};
</script>