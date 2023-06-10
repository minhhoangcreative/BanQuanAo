<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../../css/info.css">
</head>

<body>
    <?php

    session_start();
    include('../../database/config.php');
    include("../components/admin_header.php");
    if (isset($_SESSION['taiKhoan']) && isset($_SESSION['id'])) {
        // echo 'Xin chào: '.'<span style="color:red">'.$_SESSION['dangky'].'</span>';
        $id = $_SESSION['id'];

        $sql_thongtin = "SELECT * FROM admins WHERE id='$id' LIMIT 1";
        $query_thongtin = mysqli_query($connect, $sql_thongtin);

        while ($row = mysqli_fetch_array($query_thongtin)) {
    ?>
            <br>

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
                                echo '' . '<span style="color:#fff">' . $row['id'] . '</span>';
                                ?>
                            </p>

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
                                <span class="infor-text-sql"><?php echo $row['taiKhoan'] ?></span>
                            </div>
                    </div>
                    </form>
                </div>
            </div>

    <?php
        }
    }

    ?>
</body>

</html>