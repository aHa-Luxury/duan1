<div>
    <style>
        .inputchange {
            width: 15%;
            height: 30px;
            padding: 10px;
            margin-bottom: 10px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;

        }

        .buttonchange {
            margin: 10px 0 20px 0;
            width: 100px;
            background-color: #0d6efd;
            color: #fff;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            text-decoration: none;
           
        }
    </style>
    <div>
        <div>
            <h1 style="color: rgb(90, 92, 105);text-align:center;">Cập nhật thông tin tài khoản</h1>

            <div>
                <?php

                extract($_SESSION['user']);

                ?>
                <form method="post" style="margin-left:10px">
                    <div class="">
                        Họ: <br>
                        <input class="inputchange" type="text" name="ho" value="<?= $ho ?>">
                    </div>
                    <div>
                        Tên: <br>
                        <input class="inputchange" type="text" name="ten" value="<?= $ten ?>">
                    </div>
                    <div class="">
                        Email: <br>
                        <input class="inputchange" type="email" name="email" value="<?= $email ?>">
                    </div>
                    <div class="">
                        Địa chỉ: <br>
                        <input class="inputchange" type="text" name="address" value="<?= $address ?>">
                    </div>
                    <div class="">
                        Số điện thoại: <br>
                        <input class="inputchange" type="text" name="tel" value="<?= $tel ?>">
                    </div>
                    <div class="">
                        <input type="hidden" name="id_user" value="<?= $id_user ?>">
                        <input class="buttonchange" type="submit" value="Cập nhật" name="capnhat">
                        <input class="buttonchange" type="reset" value="Nhập lại">
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>