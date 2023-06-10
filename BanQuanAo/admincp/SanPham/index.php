<?php
require_once('../../database/dbhelper.php');
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
    <?php include("../components/admin_header.php");  ?>


    <div class="container">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h2 class="text-center">Quản Lý Sản Phẩm</h2>
            </div>
            <div class="panel-body">
                <a href="add.php">
                    <button class="btn btn-success" style="margin-bottom:10px">
                        Thêm Sản Phẩm</button>
                </a>
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Hình Ảnh</th>
                            <th>Tên Sản Phẩm</th>
                            <th>Giá Bán</th>
                            <th>Danh Mục</th>
                            <th>Ngày cập nhật</th>
                            <th width="50px"></th>
                            <th width="50px"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql = 'select sanpham.id, sanpham.tieuDe, sanpham.price, sanpham.hinhAnh, sanpham.update_at, 
                        danhmuc.name danhmuc_name from sanpham left join danhmuc on sanpham.id_danhmuc = danhmuc.id';
                        $danhmuc_list = executeResult($sql);
                        $index = 1;
                        foreach ($danhmuc_list as $item) {
                            echo ' <tr>
                                <td>' . ($index++) . '</td>                       
                                 <td> <img src="' . $item['hinhAnh'] . '" style="max-width: 150px"></td>              
                                <td>' . $item['tieuDe'] . '</td>
                                <td>' . $item['price'] . '</td>
                                <td>' . $item['danhmuc_name'] . '</td>
                                <td>' . $item['update_at'] . '</td>
                                <td>                              
                                    <a href="add.php?id=' . $item['id'] . '">
                                    <button class="btn btn-warning">Sửa</button>
                                    </a>                                 
                                </td>
                                <td>
                                  <button class="btn btn-danger" onclick = "deleteDanhMuc(' . $item['id'] . ')">Xóa</button>                                   
                                </td>
                                </tr>';
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script>
        function deleteDanhMuc(id) {
            var option = confirm('Bạn có chắc muốn xóa không?');
            if (!option) {
                return;
            }
            console.log(id);
            $.post('ajax.php', {
                'id': id,
                'action': 'delete'
            }, function(data) {
                location.reload();
            })
        }
    </script>
</body>

</html>