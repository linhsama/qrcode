<?php
    require '../model/modelClass.php';
    $model = new modelClass();
    $obj_cssx = $model->cososanxuatGetThis();

?>

<div id="form-data">
    <form class="row g-3" action="./cososanxuat/action.php?req=update" method="post">
        <div
            class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Thông tin cơ sở</h1>
            <div class="btn-toolbar mb-2 mb-md-0">
                <div class="btn-group me-2">
                    <button class="btn btn-sm btn-warning m-2">Lưu
                        thông tin</button>
                </div>
            </div>
        </div>
        <input type="hidden" class="form-control" value="<?=isset($obj_cssx->id_cssx)?$obj_cssx->id_cssx:""?>"
            name="id_cssx">
        <div class="col-md-8">
            <label for="ten_cssx" class="form-label">Tên cơ sở sản xuất</label>
            <input type="text" class="form-control" value="<?=isset($obj_cssx->ten_cssx)?$obj_cssx->ten_cssx:""?>"
                name="ten_cssx" required="" placeholder="Nhập tên cơ sở sản xuất/doanh nghiệp/công ty của bạn">
        </div>
        <div class="col-md-4">
            <label for="chu_co_so" class="form-label">Tên chủ cơ sở</label>
            <input type="text" class="form-control" value="<?=isset($obj_cssx->chu_co_so)?$obj_cssx->chu_co_so:""?>"
                name="chu_co_so" required="" placeholder="Nhập Tên chủ cơ sở">
        </div>
        <div class="col-md-6">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" value="<?=isset($obj_cssx->email)?$obj_cssx->email:""?>"
                name="email" required="" placeholder="Nhập email">
        </div>
        <div class="col-6">
            <label for="so_dien_thoai" class="form-label">Số điện thoại</label>
            <input type="tel" class="form-control"
                value="<?=isset($obj_cssx->so_dien_thoai)?$obj_cssx->so_dien_thoai:""?>" name="so_dien_thoai"
                maxlenght="10" pattern="[0]{1}[0-9]{9}" required="" placeholder="Nhập số điện thoại">
        </div>
        <div class="col-12">
            <label for="dia_chi" class="form-label">Địa chỉ</label>
            <input type="text" class="form-control" value="<?=isset($obj_cssx->dia_chi)?$obj_cssx->dia_chi :"" ?>"
                name="dia_chi" required="" placeholder="Nhập địa chỉ đăng ký kinh doanh">
        </div>
        <div class="col-md-12">
            <label for="mo_ta" class="form-label">Mô tả</label>
            <textarea type="text" class="form-control" name="mo_ta" id="mo_ta" required=""
                placeholder="Nhập mô tả ngắn để khách hàng hiểu thêm về bạn"><?=isset($obj_cssx->mo_ta)?$obj_cssx->mo_ta :"" ?></textarea>
        </div>
    </form>
</div>


<script src="../assets/vendor/jquery-3.6.1.min.js"></script>
<script src="../assets/vendor/ckeditor/ckeditor.js"></script>

<script>
CKEDITOR.replace('mo_ta');
</script>