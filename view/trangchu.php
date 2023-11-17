<div class="hr"></div>
        <div class="banner">
            <!-- <div class="slideshow-container">
                    <div class="mySlides fade">
                      <img src="images/BANNER_DONG_HO_CHUAN_PC.jpg" style="width:100%">
                    </div>
                    <div class="mySlides fade">
                      <img src="images/BANNER2.jpg" style="width:100%">
                    </div>
                </div> -->

            <img src="images/BANNER_DONG_HO_CHUAN_PC.jpg" alt="">
        </div>
<main>
    <h3>XEM SẢN PHẨM THEO THƯƠNG HIỆU</h3>
    <div class="listbrand">
        <?php foreach ($all_danhmuc as $all_dm) : ?>
            <a href="index.php?act=category_products&id_dm=<?= $all_dm['id_danhmuc'] ?>"><img src="<?= $all_dm["img_danhmuc"] ?>" alt=""></a>
        <?php endforeach ?>

    </div>



    <div class="brand">
    <?php foreach ($all_danhmuc as $all_dm) : ?>
            <h1><?= $all_dm['ten_danhmuc'] ?></h1>


            <!-- Danh sách 4 sản phẩm mới nhất -->
            <?php $four_sanpham = load_four_sanpham($all_dm['id_danhmuc']);?>
            <div class="list">
            <?php foreach($four_sanpham as $four_sp) : ?>
                    <div class="product">
                <a href="?act=chitietsanpham&id_sp=<?= $four_sp['id_sanpham'] ?>">
                    <img src="<?= $four_sp['img_sanpham'] ?>" alt="">
                    <h3><?= $four_sp['ten_sanpham'] ?></h3>
                    <p><?= number_format( $four_sp['price'])  ?>đ</p>
                </a>
            </div>
            <?php endforeach ?>
        </div>

            <!-- Button xem tất cả sản phẩm  -->
            <div class="btn-view-all-product">
                <a href="?act=category_products&id_dm=<?= $all_dm['id_danhmuc'] ?>">XEM TẤT CẢ ĐồNG Hồ <?= $all_dm['ten_danhmuc'] ?></a>
            </div>
        <?php endforeach ?>
       


    </div>


    </div>
   
</main>