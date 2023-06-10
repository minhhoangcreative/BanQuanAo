<?php
if (isset($_SESSION['dangky'])) {
    $id = $_SESSION['dangky'];
    $sql_thongtin = "SELECT * FROM users WHERE taiKhoan='$id' LIMIT 1";
    $query_thongtin = mysqli_query($connect, $sql_thongtin);

    while ($row = mysqli_fetch_array($query_thongtin)) {
        $user_id = $row['id'];
    }
} else {
    $user_id = '';
}

if (isset($_POST['update_qty'])) {
    $cart_id = $_POST['id'];
    $qty = $_POST['qty'];
    $update_qty = "update giohang set soluong = '$qty' where id='$cart_id'";
    mysqli_query($connect, $update_qty);
}
?>

<div class="container mt-3">
    <?php
    $sql = "select * from giohang where user_id = '$user_id'";

    $result = mysqli_query($connect, $sql);
    $sum = 0;
    $thanhtien = 0;
    if (mysqli_num_rows($result) > 0) {
    ?>
        <h1 class="text-center">Giỏ hàng</h1>
        <table class="table table-bordered table-striped text-center">
            <thead class="table-success">
                <tr>
                    <th>ID sản phẩm</th>
                    <th>Tên sản phẩm</th>
                    <th>Giá tiền</th>
                    <th>Số lượng</th>
                    <th>thành tiền</th>
                    <th></th>
                </tr>
            </thead>
            <?php

            while ($row = mysqli_fetch_assoc($result)) {
                echo "<form action='' method='post'>";
                $id_cart = $row['id'];
                echo "<input type='hidden' name='id' value='$id_cart'>";
                $thanhtien = $row['price'] * $row['soluong'];
                $sum += $thanhtien;
                echo "<tr>";
                echo "<td>" . $row['id_sanPham'] . "</td>";
                echo "<td>" . $row['tieuDe'] . "</td>";
                echo "<td>" . number_format($row['price'], 0, ',', '.') . "</td>";

                echo "<td >" . "<input type=\"number\" name=\"qty\"  min='1' value=" . $row['soluong'] . " style=\"width:2.5rem\">" . " <button class=\"fas fa-edit btn btn-warning\" name='update_qty'></button>" . "</td>";
                echo "<td>" . number_format($thanhtien, 2, ',', '.') . "</td>";
                echo "<td><a href='pages/main/giohang/xoasanpham.php?id=$id_cart' class='btn btn-danger' onclick='if(confirm(\"bạn có muốn xóa sản phẩm " . $row['tieuDe'] . " không ?\")){return true;}else{return false;}'>Xóa</a></td>";
                echo "</tr>";
                echo "</form>";
            }
            ?>
            <tfoot>
                <tr>
                    <td>Tổng</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td><?= number_format($sum, 2, ',', '.') ?> VNĐ</td>
                    <td><a href='pages/main/giohang/xoahetgiohang.php' class='btn btn-warning' onclick='return confirm("bạn có muốn xóa tất cả sản phẩm không ?");'>Xóa tất cả</a></td>

                </tr>
            </tfoot>

        </table>
        <td><a href='index.php?quanly=checkout' class='btn btn-primary' onclick='return confirm("bạn có muốn muốn thanh toán không ?");'>Thanh toán</a></td>

    <?php
    } else {
        echo "<h2 class='text-center'>Giỏ hàng trống!!!<h2>";
    }
    ?>

</div>