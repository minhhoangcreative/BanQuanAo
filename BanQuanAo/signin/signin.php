<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="./sign_in.css" />
    <title>FORM</title>
</head>

<body>
    <div class="main">
        <form action="" method="POST" class="form" id="form-1">
            <h3 class="heading">Thành viên đăng ký</h3>
            <p class="desc">shoping ❤️</p>

            <div class="spacer"></div>

            <div class="form-group">
                <label for="fullname" class="form-label">Tên đầy đủ</label>
                <input id="fullname" name="hovaten" type="text" placeholder="VD: Hoan Tran" class="form-control" />
                <span class="form-message"></span>
            </div>
            <div class="form-group">
                <label for="fullname" class="form-label">Tên tài khoản</label>
                <input id="fullname" name="taikhoan" type="text" placeholder="VD: Hoan Tran" class="form-control" />
                <span class="form-message"></span>
            </div>

            <div class="form-group">
                <label for="email" class="form-label">Email</label>
                <input id="email" name="email" type="text" placeholder="VD: email@domain.com" class="form-control" />
                <span class="form-message"></span>
            </div>

            <div class="form-group">
                <label for="password" class="form-label">Mật khẩu</label>
                <input id="password" name="matkhau" type="password" placeholder="Nhập mật khẩu" class="form-control" />
                <span class="form-message"></span>
            </div>

            <div class="form-group">
                <label for="password_confirmation" class="form-label">Nhập lại mật khẩu</label>
                <input id="password_confirmation" name="rematkhau" placeholder="Nhập lại mật khẩu" type="password" class="form-control" />
                <span class="form-message"></span>
            </div>
            <div class="form-group">
                <label for="fullname" class="form-label">Số điện thoại</label>
                <input id="fullname" name="dienthoai" type="text" placeholder="Số điện thoại" class="form-control" />
                <span class="form-message"></span>
            </div>
            <div class="form-group">
                <label for="fullname" class="form-label">Địa chỉ</label>
                <input id="fullname" name="diachi" type="text" placeholder="Địa chỉ" class="form-control" />
                <span class="form-message"></span>
                <input class="form-submit" type="submit" name="dangky" value="Đăng ký">
                <!-- <button class="form-submit" name="dangky" >Đăng ký</button> -->
                <a style="margin-top:12px; font-size:14px;" href="../index.php?quanly=dangnhap">Đăng nhập nếu có tài khoản</a>
        </form>
        <div>
            <?php
            session_start();
            include('../database/config.php');
            if (isset($_POST['dangky'])) {
                $tenkhachhang = $_POST['hovaten'];
                $taikhoan = $_POST['taikhoan'];
                $matkhau = sha1($_POST['matkhau']);
                $rematkhau =  sha1($_POST['rematkhau']);
                $email = $_POST['email'];
                $dienthoai = $_POST['dienthoai'];
                $diachi = $_POST['diachi'];
                $sql = $connect->prepare("SELECT * FROM `users` WHERE taiKhoan = ? ");
                $sql->execute([$taikhoan]);
                $count = $sql->fetch();
                if ($count > 0) {
                    echo "<script>alert('tài khoản đã tồn tại')</script>";
                } else {
                    if (!$tenkhachhang || !$taikhoan || !$matkhau || !$rematkhau || !$email || !$dienthoai || !$diachi) {
                        echo "Vui lòng nhập đầy đủ thông tin.";
                    } elseif ($matkhau != $rematkhau) {
                        echo "mat khau chua trung";
                    } else {
                        $sql_dangky = "INSERT INTO users(hoTen,taiKhoan,matKhau,sdt,email,diaChi) VALUE('" . $tenkhachhang . "','" . $taikhoan . "','" . $matkhau . "','" . $dienthoai . "','" . $email . "','" . $diachi . "')";
                        $query_dangky = mysqli_query($connect, $sql_dangky);
                        if ($query_dangky) {
                            echo '<script>alert("Đăng ký thành công")</script>';
                            $_SESSION['dangky'] = $taikhoan;
                            $_SESSION['email'] = $email;
                            $_SESSION['id_khachhang'] = mysqli_insert_id($connect);
                            echo "<script>alert('Đăng ký thành công')</script>";
                            header("Location:../user/loginuser.php");
                        }
                    }
                }
            }

            ?>
        </div>
    </div>
</body>

</html>