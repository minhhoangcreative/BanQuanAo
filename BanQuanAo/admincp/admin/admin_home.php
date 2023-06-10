<?php
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['taiKhoan'])) {

?>
    <!DOCTYPE html>
    <html>

    <head>
        <title>HOME</title>
        <link rel="stylesheet" type="text/css" href="style.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    </head>

    <body>
        <?php
        include("../SanPham/index.php");
        ?>

    </body>

    </html>

<?php
} else {
    header("Location: index.php");
    exit();
}
?>