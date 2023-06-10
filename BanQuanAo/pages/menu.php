<?php
$sql_danhmuc = "SELECT * FROM danhmuc ORDER BY id DESC";
$query_danhmuc = mysqli_query($connect, $sql_danhmuc);
?>
<?php
if (isset($_GET['dangxuat']) && $_GET['dangxuat'] == 1) {
    unset($_SESSION['dangky']);
}
?>
<div class="menu">
    <div class="menu_list">
        <ul class="menu_list-left">
            <li> <a style="text-decoration: none;" href="index.php">Home</a></li>
            <li> <a style="text-decoration: none;" href="index.php?quanly=contact">Liên hệ </a></li>
            <li> <a style="text-decoration: none;" href="index.php?quanly=giohang">Giỏ hàng</a></li>
            <li> <a style="text-decoration: none;" href="index.php?quanly=orders">Đơn hàng</a></li>
            <li><a style="text-decoration: none;" href="">Danh mục</a>
                <ul class="menu_danhmuc">
                    <?php
                    while ($row_danhmuc = mysqli_fetch_array($query_danhmuc)) {

                    ?>
                        <li> <a href="index.php?quanly=danhmuclist&id=<?php echo $row_danhmuc['id'] ?>"><?php echo $row_danhmuc['name'] ?></a></li>

                    <?php
                    }

                    ?>
                </ul>
            </li>
            <li>
                <Form method="POST" action="index.php?quanly=timkiem">
                    <input type="text" class="menu-input-text" placeholder="Tìm kiếm....." name="tukhoa">
                    <input type="submit" class="menu-input-submit" name="timkiem" value="Tìm Kiếm">
                </Form>
            </li>
        </ul>
        <ul class="menu_list-right">
            <?php
            if (isset($_SESSION['dangky'])) {
            ?>
                <li><a href="index.php?quanly=thongtin"> Thông tin</a></li>
                <li> <a href="index.php?dangxuat=1">Đăng xuất</a></li>
            <?php
            } else {
            ?>
                <li> <a href="index.php?quanly=dangnhap">Đăng nhập</a></li>
                <li> <a href="index.php?quanly=dangky">Đăng ký</a></li>
            <?php
            }
            ?>
        </ul>
    </div>
</div>