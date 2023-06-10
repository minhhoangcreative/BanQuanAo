<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"> -->
<?php
if (isset($_SESSION['dangky'])) {
   $id = $_SESSION['dangky'];
   $sql_thongtin = "SELECT * FROM users WHERE taiKhoan='$id' LIMIT 1";
   $query_thongtin = mysqli_query($connect, $sql_thongtin);

   while ($row = mysqli_fetch_array($query_thongtin)) {
      $user_id = $row['id'];
   }
} else {
   $user_id = '';
}
?>


<?php
if (isset($_POST['add_to_cart'])) {
   if ($user_id == '') {
      header('Location: index.php?quanly=dangnhap');
   } else {
      $pid = $_POST['pid'];
      $name = $_POST['name'];
      $price = (float)($_POST['price']);
      $quantity = $_POST['quantity'];
      $insert_cart = "insert into giohang(id_sanPham, tieuDe, price, soluong, user_id) values('$pid', '$name', '$price', '$quantity', '$user_id')";
      $query = mysqli_query($connect, $insert_cart);
   }
}

?>

<?php
$sql_chitiet = "SELECT * FROM danhmuc,sanpham WHERE sanpham.id_danhmuc=danhmuc.id  AND sanpham.id='$_GET[id]' LIMIT 1";
$query_chitiet = mysqli_query($connect, $sql_chitiet);

// $sql_user = "select * from users where id=''";
// $query_user = mysqli_query($connect, $sql_user);
while ($row_chitiet = mysqli_fetch_array($query_chitiet)) {
?>
   <div class="container-xl sanpham">
      <div class="row">
         <div class="col-5 border ">
            <img src="<?php echo $row_chitiet["hinhAnh"] ?>" alt="">
         </div>
         <form action="" method="post">
            <div class="col-7 px-5 py-3">
               <div>
                  <div>
                     <h2>
                        <?php echo $row_chitiet["tieuDe"]; ?>
                     </h2>
                     <div id="rating">
                        <input type="radio" id="star5" name="rating" value="5" />
                        <label class="full" for="star5" title="Awesome - 5 stars"></label>

                        <input type="radio" id="star4half" name="rating" value="4 and a half" />
                        <label class="half" for="star4half" title="Pretty good - 4.5 stars"></label>
                        <input type="radio" id="star4" name="rating" value="4" />
                        <label class="full" for="star4" title="Pretty good - 4 stars"></label>

                        <input type="radio" id="star3half" name="rating" value="3 and a half" />
                        <label class="half" for="star3half" title="Meh - 3.5 stars"></label>

                        <input type="radio" id="star3" name="rating" value="3" />
                        <label class="full" for="star3" title="Meh - 3 stars"></label>

                        <input type="radio" id="star2half" name="rating" value="2 and a half" />
                        <label class="half" for="star2half" title="Kinda bad - 2.5 stars"></label>

                        <input type="radio" id="star2" name="rating" value="2" />
                        <label class="full" for="star2" title="Kinda bad - 2 stars"></label>

                        <input type="radio" id="star1half" name="rating" value="1 and a half" />
                        <label class="half" for="star1half" title="Meh - 1.5 stars"></label>

                        <input type="radio" id="star1" name="rating" value="1" />
                        <label class="full" for="star1" title="Sucks big time - 1 star"></label>

                        <input type="radio" id="starhalf" name="rating" value="half" />
                        <label class="half" for="starhalf" title="Sucks big time - 0.5 stars"></label>
                     </div>
                  </div>
                  <p class="write_rate">496 đánh giá</p>
                  <br>


                  <div class="gia py-3">
                     <h3 class="giamoi">
                        <?php echo $row_chitiet["price"] * 0.8 ?>VND
                     </h3>
                     <p class="giacu">
                        <?php echo $row_chitiet["price"] ?>VND
                     </p>
                  </div>
                  <input type="hidden" name="pid" value="<?= $row_chitiet['id'] ?>">
                  <input type="hidden" name="name" value="<?= $row_chitiet['tieuDe'] ?>">
                  <input type="hidden" name="price" value="<?= $row_chitiet['price'] * 0.8 ?>">

                  <div class="soluong py-3 d-flex align-items-center">
                     <span class="px-3">số lượng </span>
                     <input type="number" min="1" value="1" name="quantity" class="p-2 px-3 mx-3">
                     <!-- <a href=""><button type="button" class="btn btn-success  ms-3" onclick="addCart(<?php echo $row_chitiet['id']; ?>)"> <i class="bi bi-cart-check"></i> ADD
                           TO
                           CART</button></a> -->

                     <button class="btn btn-primary" name="add_to_cart" value="Add To Card" onclick="return <?= $user_id != '' ?> ? alert('bạn đã thêm thành công sản phẩm <?= $row_chitiet['tieuDe']; ?> vào giỏ hàng') : '';"><i class="fa fa-shopping-cart"></i> Add To Card</button>
                     <span class=" fs-3 heart_icon px-3"><i class="bi bi-chat-heart"></i></span>
                  </div>
                  <div class="coao py-3">
                     <i>SIZE</i>
                     <select>
                        <option value="option1">S</option>
                        <option value="option2">L</option>
                        <option value="option3">XL</option>
                     </select>
                  </div>
                  <p class="">
                     <?php echo $row_chitiet["name"] ?>
                  </p>
                  <p class="border-bottom border-top">
                     <?php echo $row_chitiet["moTa"] ?>
                  </p>
                  <div class="chonmau py-3">
                     <h3 class="fs-5">CHOOSE COLOR</h3>
                     <div class="cacmau">
                        <div class="mau maudo"></div>
                        <div class="mau mauvang"></div>
                        <div class="mau mauxanh"></div>
                        <div class="mau maughi"></div>
                     </div>
                  </div>
                  <div class="soItems">
                     <i class="px-4">299 item</i>
                     <button type="button" class="btn btn-dark">In stock</button>

                  </div>
                  <div class="linkchiase py-3">
                     <h4 class="d-inline-block">Share On : </h4>
                     <div class="iconshare d-inline-block px-3"><a href=""><i class="bi bi-tiktok"></i></a></div>
                     <div class="iconshare d-inline-block px-3"><a href=""><i class="bi bi-messenger"></i></a></div>
                     <div class="iconshare d-inline-block px-3"><a href="https://www.facebook.com/minhoang.upin"><i class="bi bi-facebook"></i></a></div>
                     <div class="iconshare d-inline-block px-3"><a href=""><i class="bi bi-instagram"></i></a></div>
                  </div>
               </div>
            </div>
      </div>
      </form>
   </div>
   <script>
      function calcRate(r) {
         const f = ~~r, //Tương tự Math.floor(r)
            id = 'star' + f + (r % f ? 'half' : '')
         id && (document.getElementById(id).checked = !0)
      }
   </script>
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css" integrity="sha384-b6lVK+yci+bfDmaY1u0zE8YYJt0TZxLEAFyYSLHId4xoVvsrQu3INevFKo+Xir8e" crossorigin="anonymous">
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
   <style>
      * {
         padding: 0;
         margin: 0;
         box-sizing: border-box;
      }

      html {
         letter-spacing: .5;
      }


      /* rating */
      /* @import url(//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css); */
      /*reset css*/
      div,
      label {
         margin: 0;
         padding: 0;
      }

      body {
         margin: 20px;
      }

      h1 {
         font-size: 1.5em;
         margin: 10px;
      }

      /****** Style Star Rating Widget *****/
      #rating {
         border: none;
         float: left;
      }

      #rating>input {
         display: none;
      }

      /*ẩn input radio - vì chúng ta đã có label là GUI*/
      #rating>label:before {
         margin: 5px;
         font-size: 1.25em;
         font-family: FontAwesome;
         display: inline-block;
         content: "\f005";
      }

      /*1 ngôi sao*/
      #rating>.half:before {
         content: "\f089";
         position: absolute;
      }

      /*0.5 ngôi sao*/
      #rating>label {
         color: #ddd;
         float: right;
      }

      /*float:right để lật ngược các ngôi sao lại đúng theo thứ tự trong thực tế*/
      /*thêm màu cho sao đã chọn và các ngôi sao phía trước*/
      #rating>input:checked~label,
      #rating:not(:checked)>label:hover,
      #rating:not(:checked)>label:hover~label {
         color: #FFD700;
      }

      /* Hover vào các sao phía trước ngôi sao đã chọn*/
      #rating>input:checked+label:hover,
      #rating>input:checked~label:hover,
      #rating>label:hover~input:checked~label,
      #rating>input:checked~label:hover~label {
         color: #FFED85;
      }


      .star-rating input[type="radio"] {
         display: none;
      }

      .star-rating label {
         display: inline-block;
         width: 20px;
         height: 20px;
         background-image: url("./image/sao.jfif");
         /* Đường dẫn tới hình ngôi sao */
      }

      .star-rating input[type="radio"]:checked+label {
         background-image: url("./image/sao.jfif");
         /* Đường dẫn tới hình ngôi sao đã được chọn */
      }

      /* rating */

      .heart_icon i {
         color: #fff;
         border-radius: 30%;
         background-color: greenyellow;
      }

      .write_rate {
         height: 40px;
         line-height: 40px;
      }

      .sanpham {
         max-width: 80%;
         margin: 20px auto;
      }

      .sanpham img {
         width: 100%;
         height: 100%;
         object-fit: cover;
         transition: transform .5s ease;
      }

      .sanpham img:hover {
         transform: scale(1.2);
      }

      .giamoi {
         color: red;
         display: inline-block;
      }

      .giacu {
         padding: 0 10px;
         text-decoration: line-through;
         display: inline-block;
      }

      .mau {
         display: inline-block;
         padding: 0 4px;
         border-radius: 50%;
         width: 20px;
         height: 20px;
      }

      .maudo {
         background-color: red;
      }

      .mauvang {
         background-color: yellow;
      }

      .mauxanh {
         background-color: blue;
      }

      .maughi {
         background-color: greenyellow;
      }

      .iconshare i {
         color: #070707;
      }
   </style>
<?php

}
?>

<script type="text/javascript">
   var soluong = document.querySelector('.soluong-sp-input');
   var demPlus = document.querySelector('.soluong-sp-dem-icon .fa-plus');
   var demMins = document.querySelector('.soluong-sp-dem-icon .fa-minus');
   var soluongMax = document.querySelector('.soluong-sp-cosan').innerHTML;
   console.log(soluongMax);

   demPlus.addEventListener('click', function() {
      // console.log("hi");
      // soluong.value++;
      if (soluong.value >= soluongMax) {
         alert("Số lượng sản phẩm còn lại chỉ còn: " + soluongMax);
         soluong.value = soluongMax;
      } else {
         soluong.value++;
      }
   })
   demMins.addEventListener('click', function() {
      if (soluong.value <= 1) {
         alert('Số lượng sản phẩm phải lớn hơn bằng 1');
         soluong.value = 1;
      } else {
         soluong.value--;
      }
   })
</script>