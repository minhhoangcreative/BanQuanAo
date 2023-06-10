<?php
require_once('../../database/dbhelper.php');
$id = $tieuDe = $price = $id_danhmuc = $hinhAnh = $moTa = '';

if (!empty($_POST)) {
    if (isset($_POST['tieuDe'])) {
        $tieuDe = $_POST['tieuDe'];
    }
    if (isset($_POST['price'])) {
        $price = $_POST['price'];
    }
    if (isset($_POST['id'])) {
        $id = $_POST['id'];
    }
    if (isset($_POST['hinhAnh'])) {
        $hinhAnh = $_POST['hinhAnh'];
    }
    if (isset($_POST['moTa'])) {
        $moTa = $_POST['moTa'];
    }
    if (isset($_POST['id_danhmuc'])) {
        $id_danhmuc = $_POST['id_danhmuc'];
    }
    if (!empty($tieuDe)) {
        $create_at = $update_at = date('Y-m-d H:s:i');
        //luu vao database
        if ($id == '') {
            $sql = 'insert into sanpham(tieuDe, price,hinhAnh,id_danhmuc, moTa, create_at, update_at) 
            values("' . $tieuDe . '","' . $price . '","' . $hinhAnh . '","' . $id_danhmuc . '","' . $moTa . '","' . $create_at . '"
            ,"' . $update_at . '")';

        } else {
            $sql = 'update sanpham set tieuDe = "' . $tieuDe . '", price = "' . $price . '", hinhAnh = "' . $hinhAnh . '"
            ,id_danhmuc = "' . $id_danhmuc . '",moTa = "' . $moTa . '" where id  = ' . $id;
        }
        execute($sql);
        header('location: index.php');
        die();
    }
}
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = 'select *from sanpham where id = ' . $id;
    $sanpham = executeSingleResult($sql);
    if ($sanpham != null) {
        $tieuDe = $sanpham['tieuDe'];
        $hinhAnh = $sanpham['hinhAnh'];
        $price = $sanpham['price'];
        $id_danhmuc = $sanpham['id_danhmuc'];
        $moTa = $sanpham['moTa'];
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Quản Lý Sản Phẩm</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>

<body>
    <ul class="nav nav-tabs">
        <li class="nav-item">
            <a class="nav-link active" href="../DanhMuc">Quản Lý Danh Mục</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="index.php">Quản Lý Sản Phẩm</a>
        </li>
    </ul>
    <div class="container">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h2 class="text-center">Thêm Danh Mục Sản Phẩm</h2>
            </div>
            <div class="panel-body">
                <form method="post">
                    <div class="form-group">
                        <label for="name">Tên Sản Phẩm:</label>
                        <input type="text" name="id" value="<?= $id ?>" hidden="true">
                        <input required="true" type="text" class="form-control" id="tieuDe" name="tieuDe"
                            value="<?= $tieuDe ?>">
                    </div>
                    <div class="form-group">
                        <label for="name">Giá Bán:</label>
                        <input required="true" type="text" class="form-control" id="price" name="price"
                            value="<?= $price ?>">
                    </div>
                    <div class="form-group">
                        <label for="name">Hình Ảnh:</label>
                        <input required="true" type="text" class="form-control" id="hinhAnh" name="hinhAnh"
                            value="<?= $hinhAnh ?>" onchange="updateHinhAnh()">
                        <img src="<?= $hinhAnh ?>" style="max-width: 100px" id="img_hinhAnh" alt="">
                    </div>
                    <div class="form-group">
                        <label for="name">Chọn Danh Mục:</label>
                        <select class="form-control" name="id_danhmuc" id="id_danhmuc">
                            <?php
                            $sql = 'select * from DanhMuc';
                            $danhmuc_list = executeResult($sql);
                            foreach ($danhmuc_list as $item) {
                                echo '<option value= "' . $item['id'] . '">' . $item['name'] . '</option>';
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="name">Mô tả:</label>
                        <textarea class="form-control" row="5" name="moTa" id="moTa"></textarea>
                    </div>
                    <script>
                        function updateHinhAnh() {
                            $('#img_hinhAnh').attr('src', $('#hinhAnh').val())
                        }

                    </script>
                    <button class="btn btn-success">Lưu</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>