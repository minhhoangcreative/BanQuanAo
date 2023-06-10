<?php
require_once('../../database/dbhelper.php');
$id = $name = '';

if (!empty($_POST)) {
    if (isset($_POST['name'])) {
        $name = $_POST['name'];
    }
    if (isset($_POST['id'])) {
        $id = $_POST['id'];
    }
    if (!empty($name)) {
        $create_at = $update_at = date('Y-m-d H:s:i');
        //luu vao database
        if ($id == '') {
            $sql = 'insert into danhmuc(name, create_at, update_at)
            values ("' . $name . '","' . $create_at . '","' . $update_at . '")';
        } else {
            $sql = 'update danhmuc set name = "' . $name . '", update_at = "' . $update_at . '"
            where id  = ' . $id;
        }
        execute($sql);
        header('location: index.php');
        die();
    }
}
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = 'select *from danhmuc where id = ' . $id;
    $danhmuc = executeSingleResult($sql);
    if ($danhmuc != null) {
        $name = $danhmuc['name'];
    }
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
</head>

<body>
    <ul class="nav nav-tabs">
        <li class="nav-item">
            <a class="nav-link active" href="index.php">Quản Lý Danh Mục</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="../SanPham/">Quản Lý Sản Phẩm</a>
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
                        <label for="name">Tên Danh Mục:</label>
                        <input type="text" name="id" value="<?= $id ?>" hidden="true">
                        <input required="true" type="text" class="form-control" id="name" name="name"
                            value="<?= $name ?>">
                    </div>
                    <button class="btn btn-success">Lưu</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>