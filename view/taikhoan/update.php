<div>
    <div>
        <div>
            <div>CẬP NHẬT TÀI KHOẢN</div>
            <div>
                <?php
                
                    extract($_SESSION['user']);
                
                ?>
                <form  method="post">
                    <div class="">
                        Họ:
                        <input type="text" name="ho" value="<?= $ho ?>">
                    </div>
                    <div>
                        Tên:
                        <input type="text" name="ten" value="<?= $ten ?>">
                    </div>
                    <div class="">
                        Email:
                        <input type="email" name="email" value="<?= $email ?>">
                    </div>
                    <div class="">
                        Mật khẩu:
                        <input type="password" name="password" value="<?= $password ?>">
                    </div>
                    <div class="">
                        Địa chỉ:
                        <input type="text" name="address" value="<?= $address ?>">
                    </div>
                    <div class="">
                        Số điện thoại:
                        <input type="text" name="tel" value="<?= $tel ?>">
                    </div>
                    <div class="">
                        <input type="hidden" name="id_user" value="<?= $id_user ?>">
                        <input type="submit" value="Cập nhật" name="capnhat">
                        <input type="reset" value="Nhập lại">
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>