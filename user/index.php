<?php 
    session_start();
    if(!isset($_SESSION['user'])){
        header('location: ../auth/dangnhap.php');
    }else{
        echo $_SESSION['user'];
    }
?>
<?php  
        echo "ip nè: " . $localIP = getHostByName(getHostName());   
    ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
</body>

</html>