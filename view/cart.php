<main style="background-color: white;">
    <div  id="order" class="cart-content">
        <div  class="modal-body">
            <div  class="cart-left">
                <div class="cart-row">
                    <span class="cart-item cart-header cart-column">Sản Phẩm</span>
                    <span class="cart-item cart-header cart-column">Tên</span>
                    <span class="cart-price cart-header cart-column">Giá</span>
                    <span class="cart-quantity cart-header cart-column">Số Lượng</span>
                    <span class="cart-quantity cart-header cart-column">Tổng</span>
                </div>
                <hr>
                <div class="cart-items">


                    <?php
                    $sum_total = 0;
                    foreach ($dataDb as $key => $product) :
                        // kiểm tra số lượng sản phẩm trong giỏ hàng
                        $quantityInCart = 0;
                        foreach ($_SESSION['cart'] as $item) {
                            if ($item['id'] == $product['id_sanpham']) {
                                $quantityInCart = $item['quantity'];
                                break;
                            }
                        }
                    ?>
                        <div class="cart-row">
                            <div class="cart-item cart-column">
                                <img class="cart-item-image" src="images/<?= $product['img_sanpham'] ?>" width="100" height="100">
                                <span class="cart-item-title"><?= $product['ten_sanpham'] ?></span>
                            </div>
                            <span class="cart-price cart-column"><?= number_format((int)$product['price'], 0, ",", ".")  ?> <u>đ</u></span>
                            <!-- <span class="cart-price cart-column"><?= $product['size']  ?></span> -->
                            <div class="cart-quantity cart-column" style="width:300px;">
                                < <input type="number" value="<?= $quantityInCart ?>" min="1" id="quantity_<?= $product['id_sanpham'] ?>" oninput="updateQuantity(<?= $product['id_sanpham'] ?>, <?= $key ?>)">
                                <?= number_format((int)$product['price'] * (int)$quantityInCart, 0, ",", ".") ?> <u>đ</u>
                            </div>
                            <div class="cart-quantity cart-column">
                            <b style="color:black"><?= number_format((int)$product['price'] * (int)$quantityInCart, 0, ",", ".") ?> <u>đ</u></b></div>
                            <div class="cart-quantity cart-column">
                            <button style="height:30px;text-align:center;line-height:30px" onclick="removeFormCart(<?= $product['id_sanpham'] ?>)" class="btn btn-danger">Xóa</button></div>
                        </div>
                        <hr>

                    <?php
                        // Tính tổng giá đơn hàng
                        $sum_total += ((int)$product['price'] * (int)$quantityInCart);

                        // Lưu tổng giá trị vào sesion
                        $_SESSION['resultTotal'] = $sum_total;
                    endforeach;
                    ?>




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
                        
                        <span class="cart-total-price"><?= number_format((int)$sum_total, 0, ",", ".")  ?> <u>đ</u></span>
                        <br>
                        <!-- <hr>
                        <span class="cart-discount-price"><b>42424</b></span>
                        <hr>
                        <span class="cart-grand-total-price"><b><?= $tongtien ?></b></span>
                        <br>
                        <hr> -->
                    </div>

                </div>
                <?php if ($sum_total > 0) : ?>
                    <button class="btn-thanhtoan"><a href="?act=thanhtoan">TIẾN HÀNH THANH TOÁN</a></button>

                <?php endif ?>
                <button class="btn-viewmore"><a href="?act=trangchu">TIẾP TỤC XEM THÊM SẢN PHẨM</a></button>


            </div>
        </div>
    </div>
</main>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script>
    // hàm cập nhật số lượng
    function updateQuantity(id, index) {
        // lấy giá trị của ô input
        let newQuantity = $('#quantity_' + id).val();
        if (newQuantity <= 0) {
            newQuantity = 1
        }

        // Gửi yêu cầu bằng ajax để cập nhật giỏ hàng
        $.ajax({
            type: 'POST',
            url: './view/updateQuantity.php',
            data: {
                id: id,
                quantity: newQuantity
            },
            success: function(response) {
                // Sau khi cập nhật thành công
                $.post('view/tableCart.php', function(data) {
                    $('#order').html(data);
                })
            },
            error: function(error) {
                console.log(error);
            },
        })
    }

    function removeFormCart(id) {
        if (confirm("Bạn có đồng ý xóa sản phẩm hay không?")) {
            // Gửi yêu cầu bằng ajax để cập nhật giỏ hàng
            $.ajax({
                type: 'POST',
                url: './view/deleteCart.php',
                data: {
                    id: id
                },
                success: function(response) {
                    // Sau khi cập nhật thành công
                    $.post('view/tableCart.php', function(data) {
                        $('#order').html(data);
                    })
                },
                error: function(error) {
                    console.log(error);
                },
            })
        }
    }

    
</script>