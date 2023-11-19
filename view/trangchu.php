<div class="hr"></div>
        <div class="banner">
            <img src="images/BANNER_DONG_HO_CHUAN_PC.jpg" alt="">
        </div>
<main>
    <h3>XEM SẢN PHẨM THEO THƯƠNG HIỆU</h3>
    <div class="listbrand">
        <?php $count = 1; foreach ($all_danhmuc as $all_dm) : ?>
            <a href="index.php?act=category_products&id_dm=<?= $all_dm['id_danhmuc'] ?>"><img src="images/<?= $all_dm["img_danhmuc"] ?>" alt=""></a>
            <?php $count++; if($count ==6){
                break;
            } ?>
            
        <?php  endforeach ?>

    </div>



    <div class="brand">
    <?php foreach ($all_danhmuc as $all_dm) : ?>
        <!-- Danh sách 4 sản phẩm mới nhất -->
        <?php $four_sanpham = load_four_sanpham($all_dm['id_danhmuc']);
                $all_sanpham = select_all_sanpham()?>
        <div class="list">
            <?php $check = false; foreach($all_sanpham as $all_sp): ?>
                <?php if($all_dm['id_danhmuc'] == $all_sp['id_danhmuc']) :?>
                    <?php $check = true; ?>
                    <?php endif ?>
                <?php endforeach ?>

                <?php if($check == true): ?>
                    <!-- Tên hãng  -->
                    <h1><?= $all_dm['ten_danhmuc'] ?></h1>

            <?php foreach($four_sanpham as $four_sp) : ?>
                <!-- box của từng sản phẩm  -->
                    <div class="product">
                <a href="?act=chitietsanpham&id_sp=<?= $four_sp['id_sanpham'] ?>">
                    <img src="images/<?= $four_sp['img_sanpham'] ?>" alt="">
                    <h3><?= $four_sp['ten_sanpham'] ?></h3>
                    <p><?= number_format( $four_sp['price'])  ?>đ</p>
                </a>
            </div>
            <?php endforeach ?>
                <!-- Nút xem tất cả hãng -->
            <div class="btn-view-all-product">
            <a href="?act=category_products&id_dm=<?= $all_dm['id_danhmuc'] ?>">XEM TẤT CẢ ĐồNG Hồ <?= $all_dm['ten_danhmuc'] ?></a>
        </div>
                    <?php endif ?>
        </div>

            <!-- Button xem tất cả sản phẩm  -->
            
        <?php endforeach ?>
       


    </div>


    </div>
   
</main>