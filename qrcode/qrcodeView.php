<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php  
        echo "ip nè: " . $localIP = getHostByName(getHostName());   
    ?>
    <div class="form">
        <form action="qrcode.php" method="post">
            <input type="text" name="qr_text" required="" placeholder="qr text">
            <button type="submit">Tạo</button>
        </form>
    </div>

    <?php 
    require 'model/qrcodeClass.php';
    require 'phpqrcode/qrlib.php';
    $qr = new qrcodeClass();
    $list_qr = $qr->qrcodeGetAll();

    if(isset($_GET['status'])&&$_GET['status']=="success"){
        echo "<script>alert('Thêm thành công!')</script>";
    }
    if(isset($_GET['status'])&&$_GET['status']=="fail"){
        echo "<script>alert('Thêm thất bại!')</script>";
    }
    ?>
    <br>

    <div class="container">
        <div class="table">
            <table border="1">
                <thead>
                    <tr>
                        <th>qr_id</th>
                        <th>qr_text</th>
                        <th>qr_image</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($list_qr as $item):?>
                    <tr>
                        <td><?=$item->qr_id?></td>
                        <td><?=$item->qr_text?></td>
                        <td><img src="image/<?= $item->qr_image?>" alt=""></td>
                    </tr>
                </tbody>
                <?php endforeach?>
            </table>
        </div>

    </div>
</body>

</html>