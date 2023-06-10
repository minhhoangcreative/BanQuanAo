<?php
if (isset($_POST['timkiem'])) {
	$tukhoa = $_POST['tukhoa'];
}
$sql_pro = "SELECT * FROM danhmuc,sanpham WHERE sanpham.id_danhmuc=danhmuc.id 
	AND sanpham.tieuDe LIKE '%" . $tukhoa . "%'";
$query_pro = mysqli_query($connect, $sql_pro);

?>
<h3>Từ khoá tìm kiếm :
	<?php echo $_POST['tukhoa']; ?>
</h3>
<ul class="product_list">
	<?php
	while ($row = mysqli_fetch_array($query_pro)) {
		?>
		<li>
			<a href="index.php?quanly=sanpham&id=<?php echo $row['id'] ?>">
				<img src="<?php echo $row['hinhAnh'] ?>">
				<p class="title_product">Tên sản phẩm :
					<?php echo $row['tieuDe'] ?>
				</p>
				<p class="price_product">Giá :
					<?php echo number_format($row['price'], 0, ',', '.') . 'vnđ' ?>
				</p>
				<p style="text-align: center;color:#d1d1d1">
					<?php echo $row['name'] ?>
				</p>
			</a>
		</li>
		<?php
	}
	?>
</ul>