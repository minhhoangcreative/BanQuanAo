 <?php
    define('HOST', 'localhost');
    define('USERNAME', 'root');
    define('PASSWORD', '');
    define('DATABASE', 'banquanao3');
    $connect = new mysqli(HOST, USERNAME, PASSWORD, DATABASE);
    if (mysqli_connect_errno()) {
        echo "loi ket noi" . mysqli_connect_error();
        exit();
    }
    ?>