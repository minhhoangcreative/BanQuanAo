<?php
// GET id là lấy id từ bên MENU.php 
$sql_show_new = "SELECT * FROM danhmuc,sanpham WHERE sanpham.id_danhmuc=danhmuc.id ORDER BY sanpham.id DESC LIMIT 5";
$query_show_new = mysqli_query($connect, $sql_show_new);
?>

<ul class="product_list">
    <?php
    while ($row = mysqli_fetch_array($query_show_new)) {
        ?>
        <li>
            <a href="index.php?quanly=sanpham&id=<?php echo $row['id'] ?>">
                <div>
                    <img src="<?php echo $row['hinhAnh'] ?>">
                </div>
                <p></p>
                <h5 class="title_product">
                    <?php echo $row['tieuDe'] ?>
                </h5>
                <h5 class="price_product">Giá:
                    <?php echo number_format($row['price'], 0, ',', '.') . ' VNĐ' ?>
                </h5>
                <p style="text-align: center; color: #444;">
                    <?php
                    $randomNumber = rand(); // Số nguyên ngẫu nhiên
                    $randomNumberInRange = rand(50, 1000); // Số nguyên ngẫu nhiên trong khoảng từ 50 đến 1000
                    echo "đã bán " . $randomNumberInRange ?>
                </p>
            </a>
        </li>
        <?php
    }
    ?>
</ul>