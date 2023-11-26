<main style="background-color: white;">
    <div class="cart-content">
        <div class="modal-body" >
            <div class="cart-left">
                <div class="cart-row">
                    <span class="cart-item cart-header cart-column">Sản Phẩm</span>
                    <span class="cart-price cart-header cart-column">Giá</span>
                    <span class="cart-quantity cart-header cart-column">Size</span>
                    <span class="cart-quantity cart-header cart-column">Số Lượng</span>
                </div>
                <hr>
                <div class="cart-items">
                    <?php $tongtien = 0; if (isset($_SESSION['giohang']) && count($_SESSION['giohang']) > 0) : ?>


                        <?php foreach ($_SESSION['giohang'] as $sanpham) : ?>
                            <?php $tongtien += $sanpham['3'] * $sanpham['5']  ?>
                            <div class="cart-row">
                                <div class="cart-item cart-column">
                                    <img class="cart-item-image" src="images/<?=$sanpham['2'] ?>" width="100" height="100">
                                    <span class="cart-item-title"><?= $sanpham['1'] ?></span>
                                </div>
                                <span class="cart-price cart-column"><?= number_format($sanpham['3'])  ?>đ</span>
                                <span class="cart-price cart-column"><?=$sanpham['4']  ?></span>
                                <div class="cart-quantity cart-column">
                                <input class="cart-quantity-input" type="number" min="1" value="<?= $sanpham['5'] ?>" onchange="updateCartItem(this, <?= $sanpham['3'] ?>)">
                                    <!-- <input class="cart-quantity-input" type="number" value="<?= $sanpham['5'] ?>"> -->
                                    <a style="height:30px;text-align:center;line-height:30px" href="?act=delete_cart&idsp=<?=$sanpham['0']?>&sz=<?= $sanpham['4'] ?>" class="btn btn-danger">Xóa</a>
                                </div>
                            </div>
                            <hr>
                        <?php endforeach ?>
                        <?php else: ?>
                           
                            <p style="color:black">Chưa có sản phẩm nào </p>
                    <?php endif ?>
                </div>
                
            </div>
            <div class="cart-right">
                <strong class="cart-item cart-header cart-column">TỔNG HÓA ĐƠN</strong>
                <hr class="hr1">
                <div class="total-cart">
                    <div class="total-left">
                        <span class="cart-total">Tổng cộng: </span>
                        <br>
                        <!-- <hr>
                        <span class="cart-total">Giảm giá: </span>
                        <hr>
                        <span class="cart-total">Thành tiền: </span>
                        <hr> -->
                    </div>
                    <div class="total-right">
                        <span class="cart-total-price"><b><?= str_replace(',', '.', number_format($tongtien)) ?> &#8363;</b></span>
                        <br>
                        <!-- <hr>
                        <span class="cart-discount-price"><b>42424</b></span>
                        <hr>
                        <span class="cart-grand-total-price"><b><?=$tongtien?></b></span>
                        <br>
                        <hr> -->
                    </div>

                </div>
                <button class="btn-thanhtoan"><a href="?act=thanhtoan">TIẾN HÀNH THANH TOÁN</a></button>
                <button class="btn-viewmore"><a href="?act=trangchu">TIẾP TỤC XEM THÊM SẢN PHẨM</a></button>


            </div>
        </div>
    </div>
</main>

<script>
    function updateCartItem(input, price) {
    var newQuantity = input.value;
    var totalPrice = parseFloat(newQuantity) * price;

    // Cập nhật giá trị "Tổng cộng", "Giảm giá" và "Thành tiền"
    updateTotalPrice(totalPrice);
}

function updateTotalPrice(totalPrice) {
    // Cập nhật giá trị "Tổng cộng" ở total-right
    var totalElement = document.querySelector('.cart-total-price b');
    var newTotal = parseFloat(totalPrice);

    totalElement.innerText = formatCurrency(newTotal);
}

function formatCurrency(value) {
    return value.toLocaleString('vi-VN',{ style: 'currency', currency: 'VND' });
}
</script>