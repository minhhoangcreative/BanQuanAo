<?php
require_once('../../database/dbhelper.php');
$sql = "select * from users";
$result = mysqli_query($connect, $sql);


for ($i = 0; $i < mysqli_num_rows($result); $i++) {

    if (isset($_POST["update$i"])) {
        // xử lý khi người dùng nhấn vào nút submit thứ i
        $user = $_POST["user{$i}"];
        $new_password = sha1($_POST["password{$i}"]);

        if ($new_password == "da39a3ee5e6b4b0d3255bfef95601890afd80709") {
            echo "<script>alert('bạn chưa điền mật khẩu ?')</script>";
        } else {

            $update_password = "update users set matKhau = '$new_password' where id = '$user'";
            $result_update_password  = mysqli_query($connect, $update_password);
            echo "<script>alert('update thành công')</script>";
        }
    }
}
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $delete_orders = "delete from orders where user_id = '$id'";
    $result_delete_user = mysqli_query($connect, $delete_orders);

    $delete_cart = "delete from giohang where user_id = '$id'";
    $result_delete_cart = mysqli_query($connect, $delete_cart);

    $delete_user = "delete from users where id = '$id'";
    $result_delete_user = mysqli_query($connect, $delete_user);
    echo "<script>alert('Xóa tài khoản thành công')</script>";
}

?>



<!DOCTYPE html>
<html>

<head>
    <title>Quản Lý tài khoản</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

    <!-- jQuery library -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css" integrity="sha512-NhSC1YmyruXifcj/KFRWoC561YpHpc5Jtzgvbuzx5VozKpWvQ+4nXhPdFgmx8xqexRcpAglTj9sIBWINXa8x5w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-element-bundle.min.js"></script>
    <link rel="stylesheet" href="../../css/admin_style.css">
</head>

<body>
    <?php include("../components/admin_header.php");  ?>
    <section class="user_accout">

        <h1 class="heading">quản lý tài khoản</h1>
        <div class="table-responsive">
            <form action="" method="post">
                <table class="table table-bordered table-border table-striped text-center">
                    <th>ID khách hàng</th>
                    <th>Tên khách hàng</th>
                    <th>Tên tài khoản</th>
                    <th>Mật khẩu</th>
                    <th>Địa chỉ</th>
                    <th>số điện thoại</th>
                    <th>Email</th>
                    <th>cài lại mật khẩu</th>
                    <th>Chức năng </th>
                    </tr>

                    <?php

                    $sql = "select * from users";
                    $result = mysqli_query($connect, $sql);
                    $count = 0;
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {

                    ?>
                            <tr>
                                <td><?= $row['id'] ?></td>
                                <td><?= $row['hoTen'] ?></td>
                                <td><?= $row['taiKhoan'] ?></td>
                                <td>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <input type="password" size=5 value="<?= $row['matKhau']; ?>" id="<?= $row['id']; ?>" disabled><br><br>
                                        </div>
                                        <div class="col-sm-6">
                                            <input type="checkbox" onclick="myFunction('<?= $row['id']; ?>')">
                                        </div>
                                    </div>
                                </td>


                                <td><?= $row['diaChi'] ?></td>
                                <td><?= $row['sdt'] ?></td>
                                <td><?= $row['email'] ?></td>
                                <td>

                                    <?php
                                    $id = "user" . $count;
                                    $password = "password" . $count;
                                    ?>

                                    <input type="text" name="<?= $password ?>" value="">
                                    <input type="hidden" name="<?= $id ?>" value="<?= $row['id'] ?>">

                                    <?php

                                    echo "<input type=\"submit\" name=\"update$count\" value=\"Cập nhật mật khẩu\" class=\"option-btn\">";
                                    ?>


                                <td>
                                    <a href="users_account.php?delete=<?= $row['id']; ?>" class="delete-btn" onclick="return confirm('bạn có muốn xóa tài khoản này không ?');">xóa</a>
                                </td>

                            </tr>


                        <?php
                            $count++;
                        }
                    } else {
                        ?>
                        <p class="empty"> Danh sách tài khoản trống </p>
                    <?php
                    }
                    ?>
                </table>
            </form>

        </div>

    </section>


</body>
<script>
    function myFunction(id) {
        var x = document.getElementById(id);
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    }
</script>


</html>