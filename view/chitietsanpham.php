<div class="hr"></div>
<div class="banner">
  <?php $one_danhmuc =  load_one_danhmuc($one_sanpham['id_danhmuc'])  ?>
  <?php if ($one_danhmuc['video_danhmuc'] != "") : ?>
    <video src="images/<?= $one_danhmuc['video_danhmuc'] ?>" autoplay="autoplay" muted loop></video>
  <?php else : ?>
    <img src="images/BANNER_DONG_HO_CHUAN_PC.jpg" alt="">
  <?php endif ?>
</div>
<div class="hr"></div>
<main>
  <div class="thongtin_sanpham">
    <div class="head_desc">
      <div class="head_left">
        <img src="images/<?= $one_sanpham['img_sanpham'] ?>" alt="" />
      </div>
      <div class="head_center">
        <h1><?= $one_sanpham['ten_sanpham'] ?></h1>
        <hr>
        <p><?= $one_sanpham['description'] ?></p><br>
        <p>Mã SP : <?= $one_sanpham['id_sanpham'] ?></p><br>
        <h2>Giá : <span><?= number_format($one_sanpham['price']) ?>đ</span></h2>
        <br>
        <p><?= $one_sanpham['tinhtrang'] ?></p><br>
        <h2>Thông tin thêm:</h2>
        <hr>
        <p><?= $thongtinwebsite['camket']  ?></p>

        <div class="button">
          <div class="buy">
            <p>Mua hàng</p>
          </div>
          <div class="add">
            <p>Thêm vào giỏ hàng</p>
          </div>
        </div>
      </div>
      <div class="head_right">
        <div class="box">
          <h1 style="text-transform:uppercase">Địa chỉ mua hàng</h1>
          <hr>
          <p><?= $thongtinwebsite['diachi'] ?></i></p>
          <p> Hotline : <?= $thongtinwebsite['hotline'] ?></p>

        </div>
        <div class="box">
          <p><?= $thongtinwebsite['vanchuyen'] ?></p>
        </div>
        <div class="box">
        <h1 style="text-transform:uppercase">ĐÁNH GIÁ CỦA KHÁCH HÀNG</h1>
        <hr>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <script>
            $(document).ready(function() {
                $("#binhluan").load("view/binhluan/binhluanform.php", {
                    id_sanpham: <?= $id_sanpham ?>
                });
            });
        </script>
        <div class="row" id="binhluan">

        </div>
        </div>

      </div>
      .
    </div>
    <div class="end_desc">
      <div class="end_left">
        <h2>Thông tin sản phẩm</h2>
        <h3><?= $one_sanpham['ten_sanpham'] ?></h3>
        <!-- Tiêu đề 1 -->
        <?php if ($one_sanpham['tieude1'] != "") : ?>
          <h2><?= $one_sanpham['tieude1'] ?></h2>
          <hr>
        <?php endif ?>

        <?php if ($one_sanpham['noidung1'] != "") : ?>
          <p><?= $one_sanpham['noidung1'] ?></p>
        <?php endif ?>
        <?php if ($one_sanpham['hinhanh1'] != "") : ?>
          <img src="<?= $one_sanpham['hinhanh1]'] ?>" alt="">
        <?php endif ?>

        <br><br>
        <!-- Tiêu đề 2 -->
        <?php if ($one_sanpham['tieude2'] != "") : ?>
          <h2><?= $one_sanpham['tieude2'] ?></h2>
          <hr>
        <?php endif ?>

        <?php if ($one_sanpham['noidung2'] != "") : ?>
          <p><?= $one_sanpham['noidung2'] ?></p>
        <?php endif ?>

        <?php if ($one_sanpham['hinhanh2'] != "") : ?>
          <img src="<?= $one_sanpham['hinhanh2]'] ?>" alt="">
        <?php endif ?>
        <br><br>
        <!-- Tiêu đề 3 -->
        <?php if ($one_sanpham['tieude3'] != "") : ?>
          <h2><?= $one_sanpham['tieude3'] ?></h2>
          <hr>
        <?php endif ?>

        <?php if ($one_sanpham['noidung3'] != "") : ?>
          <p><?= $one_sanpham['noidung3'] ?></p>
        <?php endif ?>
        <?php if ($one_sanpham['hinhanh3'] != "") : ?>
          <img src="<?= $one_sanpham['hinhanh3]'] ?>" alt="">
        <?php endif ?>

        <div class="binhluan">

        </div>
      </div>
      <div class="end_right">
        <ul class="thongsokithuat">
          <p class="name_table">THÔNG SỐ KĨ THUẬT</p>
          <li>
            <span>Dòng sản phẩm</span>
            <p style="text-transform:uppercase"><?= $one_sanpham['ten_danhmuc'] != '' ? $one_sanpham['ten_danhmuc'] : "Chưa có thông tin" ?></p>
          </li>
          <li>
            <span>Thấm nước</span>
            <p><?= $one_sanpham['thamnuoc'] != '' ? $one_sanpham['thamnuoc'] : "Chưa có thông tin" ?></p>
          </li>

          <li>
            <span>Vành đồng hồ</span>
            <p><?= $one_sanpham['vanhdongho'] != '' ? $one_sanpham['vanhdongho'] : "Chưa có thông tin" ?></p>
          </li>
          <li>
            <span>Năng lượng</span>
            <p><?= $one_sanpham['nangluong'] != '' ? $one_sanpham['nangluong'] : "Chưa có thông tin" ?></p>
          </li>
          <li>
            <span>Chất liệu vỏ</span>
            <p><?= $one_sanpham['chatlieuvo'] != '' ? $one_sanpham['chatlieuvo'] : "Chưa có thông tin" ?></p>
          </li>
          <li>
            <span>Dây đeo</span>
            <p><?= $one_sanpham['daydeo'] != '' ? $one_sanpham['daydeo'] : "Chưa có thông tin" ?></p>
          </li>
          <li>
            <span>Khóa</span>
            <p><?= $one_sanpham['khoa'] != '' ? $one_sanpham['khoa'] : "Chưa có thông tin" ?></p>
          </li>
          <li>
            <span>Mặt kính</span>
            <p><?= ($one_sanpham['matkinh']) != '' ? $one_sanpham['matkinh'] : "Chưa có thông tin"  ?></p>
          </li>
          <li>
            <span>Sản xuất tại</span>
            <p><?= $one_sanpham['sanxuattai'] != '' ? $one_sanpham['sanxuattai'] : "Chưa có thông tin" ?></p>
          </li>
        </ul>
        <p></p>
      </div>
    </div>

  </div>
  <h2 class="title_sanphamlienquan"> <img style="width:300px; text-align:center;" src="images/chan_logo.png" alt=""></h2>
  <h2 class="title_sanphamlienquan">XEM THÊM CÁC SẢN PHẨM KHÁC</h2>
  <div class="sanphamlienquan">
    <?php foreach ($four_sanphamlienquan as $four_splq) : ?>

      <div class="product">
        <a href="?act=chitietsanpham&id_sp=<?= $four_splq['id_sanpham'] ?>">
          <img src="images/<?= $four_splq['img_sanpham'] ?>" alt="">
          <h3><?= $four_splq['ten_sanpham'] ?></h3>
          <p><?= number_format($four_splq['price'])  ?> đ</p>
        </a>
      </div>
    <?php endforeach; ?>
  </div>
</main>