<main style="background-color: white;">
            <div class="cart-content" style="padding-bottom:10px;">
                <div class="modal-body">
                    
                    <div class="cart-left">
                        <hr>
                        <form action="view/bill.php" method="post">
                        <h2 style="color: black;">THÔNG TIN THANH TOÁN</h2>
                        <span class="paycart"  style="color: black;">Họ và Tên*</span>
                        <input class="input-pay" type="text" name="hovaten" id="" required>
                        <span class="paycart"  style="color: black;">Địa chỉ*</span>
                        <input class="input-pay" type="text" name="address" id="" required>
                        <span class="paycart"   style="color: black;">Số điện thoại*</span>
                        <input class="input-pay" type="text" name="phone" id="" required>
                        <span class="paycart"  style="color: black;">Địa chỉ email*</span>
                        <input class="input-pay" type="email" name="email" id="" required>
                        <span class="paycart" style="color: black;">Hình thức thanh toán*</span>
                        <select class="input-pay" name="pttt" id="" required>
                            <option value="" disabled selected>--Chọn hình thức thanh toán--</option>
                            <option value="0">Thanh toán khi nhận hàng</option>
                            <option value="1">Chuyển khoản</option>
                        </select>
                       
                       

                    </div>
                    <div class="cart-right" style="border: 2px solid black;">
                        <strong class="cart-item cart-header cart-column">ĐƠN HÀNG CỦA BẠN</strong>
                        <div class="total-pay">

                        <div class="head">
                            <div class="head_lf"><b>Sản phẩm</b></div>
                            <div class="head_rt"><b>Giá</b></div>
                        </div>
                        <div class="hr1"></div>
                        <div class="content">
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
                              
                            
                               <div class="row" style="display:flex;flex-direction:row;border-bottom:1px solid gray;padding:5px">
                               <div class="head_lf" ><?= $product['ten_sanpham']?> <b style="color:orangered">x<?= $quantityInCart ?></b></div>
                                <div class="head_rt" ><b ><?= number_format((int)$product['price'] * (int)$quantityInCart, 0, ",", ".") ?> <u>đ</u></b></div>
                               
                               </div>
                                <?php
                        // Tính tổng giá đơn hàng
                        $sum_total += ((int)$product['price'] * (int)$quantityInCart);

                        // Lưu tổng giá trị vào sesion
                        $_SESSION['resultTotal'] = $sum_total;
                    endforeach;
                    ?>

                        </div>
                        <div class="giaohang">
                            <div class="head_lf">Giao hàng</div>
                            <div class="head_rt">Giao hàng miễn phí</div>
                        </div>
                        
                        <div class="sum_all">
                            <div class="head_lf">Tổng cộng</div>
                            <div class="head_rt"><b style="color: orangered;"> <?= number_format((int)$sum_total, 0, ",", ".")  ?> <u>đ</u></b></div>
                        </div>
                        <button class="btn-thanhtoan" name="dathang">Đặt hàng</button>
                        </form>
                        </div>
                    </div>
                    
                </div>
            </div>
        </main>