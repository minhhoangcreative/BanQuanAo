<?php
require_once('../../database/dbhelper.php');

if (isset($_POST['update_payment'])) {
    $order_id = $_POST['order_id'];
    $payment_status = $_POST['payment_status'];

    $update_payment = "UPDATE `orders` SET payment_status = '$payment_status' WHERE id = '$order_id'";
    $update_payment = mysqli_query($connect, $update_payment);
    echo "<script>alert('trạng thái thanh toán được cập nhật!');</script>";
}

if (isset($_GET['delete'])) {
    $delete_id = $_GET['delete'];
    // $delete_order = $conn->prepare("DELETE FROM `orders` WHERE id = ?");
    $delete_order = "DELETE FROM `orders` WHERE id = '$delete_id'";
    $delete_order = mysqli_query($connect, $delete_order);
}
?>



<!DOCTYPE html>
<html>

<head>
    <title>Quản Lý Danh Mục</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../../css/admin_style.css">
</head>

<body>
    <?php include("../components/admin_header.php");  ?>
    <section class="orders">

        <h1 class="heading">placed orders</h1>
        <?php
        $dangChoThanhToan = 0;
        $select_dangChoThanhToan = "SELECT * FROM `orders`where payment_status = 'pending'";
        $result = mysqli_query($connect, $select_dangChoThanhToan);
        while ($row = mysqli_fetch_assoc($result)) {
            $dangChoThanhToan += $row['total_price'];
        }
        $Doanh_thu = 0;
        $select_Doanh_thu = "SELECT * FROM `orders`where payment_status = 'completed'";
        $result = mysqli_query($connect, $select_Doanh_thu);
        while ($row = mysqli_fetch_assoc($result)) {
            $Doanh_thu += $row['total_price'];
        }
        ?>
        <p class="revenue">Doanh thu :<span><?= $Doanh_thu; ?></span> VNĐ | Dang chờ thanh toán : <span><?= $dangChoThanhToan; ?></span> VNĐ</p>
        <div class="box-container">

            <?php
            $select_orders = "SELECT * FROM `orders`";
            $select_orders = mysqli_query($connect, $select_orders);
            if (mysqli_num_rows($select_orders) > 0) {
                while ($fetch_orders =  mysqli_fetch_assoc($select_orders)) {
            ?>
                    <div class="box">
                        <h5>id khách hàng : <?= $fetch_orders['user_id'] ?></h5>
                        <p> placed on : <span><?= $fetch_orders['placed_on']; ?></span> </p>
                        <p> name : <span><?= $fetch_orders['name']; ?></span> </p>
                        <p> number : <span><?= $fetch_orders['number']; ?></span> </p>
                        <p> address : <span><?= $fetch_orders['address']; ?></span> </p>
                        <p> total products : <span><?= $fetch_orders['total_products']; ?></span> </p>
                        <p> total price : <span>$<?= $fetch_orders['total_price']; ?>/-</span> </p>
                        <p> payment method : <span><?= $fetch_orders['method']; ?></span> </p>
                        <form action="" method="post">
                            <input type="hidden" name="order_id" value="<?= $fetch_orders['id']; ?>">
                            <select name="payment_status" class="select">
                                <option selected disabled><?= $fetch_orders['payment_status']; ?></option>
                                <option value="pending">pending</option>
                                <option value="completed">completed</option>
                            </select>
                            <div class="flex-btn">
                                <input type="submit" value="update" class="option-btn" name="update_payment">
                                <a href="placed_orders.php?delete=<?= $fetch_orders['id']; ?>" class="delete-btn" onclick="return confirm('delete this order?');">delete</a>
                            </div>
                        </form>
                    </div>
            <?php
                }
            } else {
                echo '<p class="empty">no orders placed yet!</p>';
            }
            ?>

        </div>

    </section>


</body>

</html>