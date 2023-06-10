<?php
if (isset($_POST['emailChange'])) {
    $id = $_POST['id'];
    $email = $_POST['email'];
    $update_email = "update users set email = '$email' where id='$id'";
    mysqli_query($connect, $update_email);
}

if (isset($_POST['diaChiChange'])) {
    $id = $_POST['id'];
    $diaChi = $_POST['diaChi'];
    $update_diaChi = "update users set diaChi = '$diaChi' where id='$id'";
    mysqli_query($connect, $update_diaChi);
}


if (isset($_POST['sdtChange'])) {
    $id = $_POST['id'];
    $sdt = $_POST['sdt'];
    $update_sdt = "update users set sdt = '$sdt' where id='$id'";
    mysqli_query($connect, $update_sdt);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/info.css">
</head>

<body>
    <p><?php
        if (isset($_SESSION['dangky'])) {
            // echo 'Xin chào: '.'<span style="color:red">'.$_SESSION['dangky'].'</span>';
            $id = $_SESSION['dangky'];

            $sql_thongtin = "SELECT * FROM users WHERE taiKhoan='$id' LIMIT 1";
            $query_thongtin = mysqli_query($connect, $sql_thongtin);

            while ($row = mysqli_fetch_array($query_thongtin)) {
        ?></p><br>
    <div class="container-info">
        <div class="container-info-left">
            <ul class="card-list">
                <li class="card-item">
                    <div class="card-item-img">
                        <img src="https://i.pinimg.com/564x/25/d3/12/25d312c1472518d09984003e4027b08e.jpg"></img>
                    </div>
                    <p class="card-item-name">
                        <?php
                        echo '' . '<span style="color:#fff">' . $row['taiKhoan'] . '</span><br>';
                        echo '' . '<span style="color:#fff"> #' . $row['id'] . '</span>';
                        ?>
                    </p>
                    <p class="card-item-duty"><?php
                                                echo '' . '<span >' . $row['hoTen'] . '</span>';
                                                ?></p>
                    <div class="social-media-list">
                        <a href="https://www.facebook.com/hoandz93/" class="social-media-item"><i class="fab fa-facebook facebook-icon"></i></a>
                        <a href="https://www.youtube.com/channel/UCnf-JhE6TgnZ4nWR-JElaiA" class="social-media-item"><i class="fab fa-youtube"></i></a>
                        <a href="https://www.instagram.com/tran.ngochoan24/" class="social-media-item"><i class="fab fa-instagram"></i></a>
                        <a href="https://github.com/HoanTiny" class="social-media-item"><i class="fab fa-github"></i></a>
                    </div>
                    <!-- <div class="contact"><a href="mailto: thedevil0903@gmail.com" class="card-item-contact">Contact me</a></div> -->
                </li>
            </ul>
        </div>
        <div class="wrapper-info">
            <div class="info-header">
                <h3>Hồ sơ của bạn</h3>
                <p>Quản lý thông tin cá nhân của bạn</p>
            </div>
            <div class="infor-main">
                <form method="post" action="">
                    <div class="infor-main-text">
                        <input type="hidden" name="id" value="<?= $row['id'] ?>">
                        <label for="">Tên Đăng Nhập: </label>
                        <span class="infor-text-sql"><?php echo $row['taiKhoan']  ?></span>
                    </div>
                    <div class="infor-main-text">
                        <label for="">Email: </label>
                        <span class="infor-text-sql"><input type="email" name="email" value="<?= $row['email'] ?>" size="<?= (strlen($row['email']) > 30) ? strlen($row['email']) : 30 ?>"> <button class="fas fa-edit btn btn-sm btn-warning" name="emailChange" onclick="return alert('bạn đã sửa email thành công')"></button></span>
                    </div>
                    <div class=" infor-main-text">
                        <label for="">Địa Chỉ: </label>
                        <span class="infor-text-sql"><input type="text" name="diaChi" value="<?= $row['diaChi'] ?>" size="<?= (strlen($row['diaChi']) > 30) ? strlen($row['diaChi']) : 30 ?>"> <button class="fas fa-edit btn btn-sm btn-warning" name="diaChiChange" onclick="return alert('bạn đã sửa địa chỉ thành công')"></button></span>
                    </div>
                    <div class="infor-main-text">
                        <label for="">Số Điện Thoại: </label>
                        <span class="infor-text-sql"><input type="text" name="sdt" value="<?= $row['sdt'] ?>" size="<?= (strlen($row['sdt']) > 30) ? strlen($row['sdt']) : 30 ?>"> <button class="fas fa-edit btn btn-sm btn-warning" name="sdtChange" onclick="return alert('bạn đã sửa sdt thành công')"></button></span>

                    </div>
                </form>
            </div>
        </div>
    </div>
<?php
            }
        }

?>
</body>

</html>