<?php if (isset($_SESSION['dangky'])) {
    $id = $_SESSION['dangky'];
    $sql_thongtin = "SELECT * FROM users WHERE taiKhoan='$id' LIMIT 1";
    $query_thongtin = mysqli_query($connect, $sql_thongtin);

    while ($row = mysqli_fetch_array($query_thongtin)) {
        $user_id = $row['id'];
    }
} else {
    $user_id = '';
}


if (isset($_POST['order'])) {
    $name = $_POST['name'];
    $number = $_POST['number'];
    $email = $_POST['email'];
    $method = $_POST['method'];
    $address = $_POST['flat'];
    $total_products = $_POST['total_products'];
    $total_price = $_POST['total_price'];
    $check_cart = "select * from giohang where user_id = '$user_id'";
    $check_cart = mysqli_query($connect, $check_cart);

    if (mysqli_num_rows($check_cart) > 0) {

        $insert_order = "INSERT INTO `orders`(user_id, name, number, email, method, address, total_products, total_price) VALUES('$user_id','$name','$number','$email','$method','$address','$total_products','$total_price')";
        $result_insert = mysqli_query($connect, $insert_order);
        $delete_cart = "DELETE FROM giohang WHERE user_id = '$user_id'";
        $result_delete = mysqli_query($connect, $delete_cart);
        echo "<script>alert('bạn đã đặt hàng thành công')</script>";
    } else {
        echo "<script>alert('bạn đã đặt hàng thất bại')</script>";
    }
}

?>

<section class=" checkout-orders">

    <form action="" method="POST">

        <h3>Đơn hàng của bạn</h3>
        <div class="display-orders">
            <?php
            $sum = 0;
            $thanhtien = 0;
            $cart_items[] = '';
            $total_products = '';
            $select_cart = "select * from giohang where user_id = '$user_id'";
            $result = mysqli_query($connect, $select_cart);
            if (mysqli_num_rows($result)) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $thanhtien = $row['price'] * $row['soluong'];
                    $sum += $thanhtien;
                    $cart_items[] = $row['tieuDe'] . ' (' . $row['price'] . ' x ' . $row['soluong'] . ') - ';
                    $total_products = implode($cart_items);
            ?>
                    <p> <?= $row['tieuDe']; ?> <span>(<?= '$' . $row['price'] . '/- x ' . $row['soluong']; ?>)</span> </p>
                <?php
                }
                ?>

                <p> Tổng cộng :<?= number_format($sum, 2, ',', '.') ?> VNĐ </p>
        </div>
    <?php
            }
    ?>
    <h3>Đặt hàng</h3>
    <?php
    $select_user = "select * from users where id = '$user_id'";
    $result_user = mysqli_query($connect, $select_user);
    $row_user = mysqli_fetch_assoc($result_user);
    ?>
    <div class="flex">
        <div class="inputBox">
            <span>Tên :</span>
            <input type="hidden" name="total_products" value="<?= $total_products; ?>">
            <input type="hidden" name="total_price" value="<?= $sum; ?>">
            <input type="text" name="name" value="<?= $row_user['hoTen']; ?>" class="box" maxlength="20" required>
        </div>
        <div class="inputBox">
            <span>Số điện thoại :</span>
            <input type="number" name="number" value="<?= $row_user['sdt']; ?>" placeholder="enter your number" class="box" min="0" max="9999999999" onkeypress="if(this.value.length == 10) return false;" required>
        </div>
        <div class="inputBox">
            <span>email :</span>
            <input type="email" name="email" value="<?= $row_user['email']; ?>" placeholder=" enter your email" class="box" maxlength="50" required>
        </div>
        <div class="inputBox">
            <span>phương thức thanh toán :</span>
            <select name="method" class="box" required>
                <option value="thu tiền khi nhận hàng">thu tiền khi nhận hàng</option>
                <option value="thẻ tín dụng">thẻ tín dụng</option>
                <option value="paytm">paytm</option>
                <option value="paypal">paypal</option>
            </select>
        </div>
        <div class="inputBox">
            <span>địa chỉ :</span>
            <input type="text" name="flat" value="<?= $row_user['diaChi'] ?>" placeholder="e.g. flat number" class="box" maxlength="50" required>
        </div>

    </div>

    <input type="submit" name="order" class="btn-1 <?= (mysqli_num_rows($result) > 1) ? '' : 'disabled'; ?>" value="place order">
    </form>

</section>