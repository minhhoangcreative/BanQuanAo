<div class="main">
    <?php
    #include ("sidebar/sidebar.php");
    ?>
    <div class="maincontent">

        <?php //lấy qiamly từ menu truyền vào bằng phuongư thức GET
        if (isset($_GET['quanly'])) {
            $bientam = $_GET['quanly'];
        } else {
            $bientam = "";
        }
        if ($bientam == 'danhmuclist') {
            include("main/danhmuc.php");
        } elseif ($bientam == 'giohang') {
            include("main/giohang/cart.php");
        } elseif ($bientam == 'dangky') {
            // include("main/dangky.php");
            header("Location:signin/signin.php");
        } elseif ($bientam == 'contact') {
            include("main/contact.php");
        } elseif ($bientam == 'sanpham') {
            include("main/sanpham.php");
        } elseif ($bientam == 'dangnhap') {
            // include("user/loginuser.php");
            header("Location:user/loginuser.php");
        } elseif ($bientam == 'thongtin') {
            include("main/info.php");
        } elseif ($bientam == 'timkiem') {
            include("main/timkiem.php");
        } elseif ($bientam == 'orders') {
            include("main/orders/orders.php");
        } elseif ($bientam == 'checkout') {
            include("main/giohang/checkout.php");
        } else { ?>
            <div class="slideshow-container">

                <div class="mySlides fade">
                    <div class="numbertext">1 / 3</div>
                    <img src="images/pexels-anastasiya-gepp-1462637.jpg" style="width:100%">
                </div>

                <div class="mySlides fade">
                    <div class="numbertext">2 / 3</div>
                    <img src="images/pexels-godisable-jacob-949670.jpg" style="width:100%">
                </div>

                <div class="mySlides fade">
                    <div class="numbertext">3 / 3</div>
                    <img src="images/pexels-r-fera-432059.jpg" style="width:100%">
                </div>
            </div>
            <br>

            <div style="text-align:center">
                <span class="dot"></span>
                <span class="dot"></span>
                <span class="dot"></span>
            </div>

            <script>
                let slideIndex = 0;
                showSlides();

                function showSlides() {
                    let i;
                    let slides = document.getElementsByClassName("mySlides");
                    let dots = document.getElementsByClassName("dot");
                    for (i = 0; i < slides.length; i++) {
                        slides[i].style.display = "none";
                    }
                    slideIndex++;
                    if (slideIndex > slides.length) {
                        slideIndex = 1
                    }
                    for (i = 0; i < dots.length; i++) {
                        dots[i].className = dots[i].className.replace(" active", "");
                    }
                    slides[slideIndex - 1].style.display = "block";
                    dots[slideIndex - 1].className += " active";
                    setTimeout(showSlides, 3000); // Change image every 2 seconds
                }
            </script>
        <?php

        }
        ?>

    </div>
</div>