<?php

if (isset($_SESSION['dangnhaptk'])) {
    $admin = $_SESSION['dangnhaptk'];
}
?>
<header class="header">
    <ul class="nav nav-tabs nav-justified">
        <li class="nav-item">
            <a href="../admin/admin_home.php" class="nav-link active">Admin<span>Panel</span></a>
        </li>
        <li class="nav-item">
            <a href="../admin/placed_orders.php" class="nav-link">Đặt hàng</a>
        </li>
        <li class="nav-item">
            <a href="../admin/users_account.php" class="nav-link">User account</a>
        </li>
        <li class="nav-item">
            <a href="../DanhMuc/index.php" class="nav-link">Danh mục</a>
        </li>
        <li class="nav-item">
            <a href="../SanPham/index.php" class="nav-link">Sản phẩm</a>
        </li>
        <li class="nav-item">
            <a href="../admin/admin_info.php" class="nav-link">Thông tin</a>
        </li>
        <li class="nav-item">
            <a href="../admin/admin_logout.php" class="nav-link" onclick='return confirm("bạn có muốn đăng xuất không ?");'>Đăng xuất</a>
        </li>


    </ul>


</header>