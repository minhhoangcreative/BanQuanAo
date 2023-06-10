<?php
// GET id là lấy id từ bên MENU.php 
$sql_show = "SELECT * FROM sanpham WHERE sanpham.id_danhmuc='$_GET[id]' ORDER BY id DESC Limit 5";
$query_show = mysqli_query($connect, $sql_show);

//get ten danh muc
$sql_cate = "SELECT * FROM danhmuc WHERE id='$_GET[id]' LIMIT 1";
$query_cate = mysqli_query($connect, $sql_cate);
$row_title = mysqli_fetch_array($query_cate);
?>
<p></p>
<h5> Danh mục |
    <?php
    if (isset($row_title['name'])) {
        echo $row_title['name'];
    } else {
        echo "lỗi không lấy được data";
    }
    ?>

</h5>
<ul class="product_list">
    <?php
    while ($row_pro = mysqli_fetch_array($query_show)) {
        ?>
        <li>
            <a href="index.php?quanly=sanpham&id=<?php echo $row_pro['id'] ?>">
                <img src="<?php echo $row_pro['hinhAnh'] ?>">
                <p></p>
                <h5 class="title_product">
                    <?php echo $row_pro['tieuDe'] ?>
                </h5>
                <h5 class="price_product">Giá:
                    <?php echo number_format($row_pro['price'], 0, ',', '.') . ' VNĐ' ?>
                </h5>
                <p style="text-align: center;">
                    <?php echo "Xem chi tiết" ?>
                </p>
            </a>
        </li>
        <?php
    }
    ?>

</ul>