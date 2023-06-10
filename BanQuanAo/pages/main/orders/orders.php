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
?>

<section class="orders">

    <h1 class="heading">Đặt hàng</h1>

    <div class="box-container">

        <?php
        if ($user_id == '') {
            echo '<p class="empty">please login to see your orders</p>';
        } else {
            $select_orders = "SELECT * FROM `orders` WHERE user_id = '$user_id'";
            $select_orders = mysqli_query($connect, $select_orders);
            if (mysqli_num_rows($select_orders) > 0) {
                while ($fetch_orders = mysqli_fetch_assoc($select_orders)) {
        ?>
                    <div class="box">
                        <p>đặt vào : <span><?= $fetch_orders['placed_on']; ?></span></p>
                        <p>tên : <span><?= $fetch_orders['name']; ?></span></p>
                        <p>email : <span><?= $fetch_orders['email']; ?></span></p>
                        <p>số điện thoại : <span><?= $fetch_orders['number']; ?></span></p>
                        <p>địa chỉ : <span><?= $fetch_orders['address']; ?></span></p>
                        <p>phương thức thanh toán : <span><?= $fetch_orders['method']; ?></span></p>
                        <p>your orders : <span><?= $fetch_orders['total_products']; ?></span></p>
                        <p>tổng giá : <span>$<?= $fetch_orders['total_price']; ?>/-</span></p>
                        <p>tình trạng thanh toán: <span style="color:<?php if ($fetch_orders['payment_status'] == 'pending') {
                                                                            echo 'red';
                                                                        } else {
                                                                            echo 'green';
                                                                        }; ?>"><?= $fetch_orders['payment_status']; ?></span> </p>
                    </div>
                <?php
                }
            } else {
                ?>
                <h4 class="">Bạn chưa có đơn hàng nào</h4>
        <?php

            }
        }
        ?>