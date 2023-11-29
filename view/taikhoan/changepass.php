<div>
    <style>
        .input_pass {
            width: 15%;
            height: 30px;
            padding: 10px;
            margin-bottom: 10px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .buttonchangepass {
            margin-bottom: 20px;
            height: 40px;
            width: 100px;
            background-color: #0d6efd;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            text-decoration: none;
        }
    </style>
    <div>
        <div>
            <h1 style="color: rgb(90, 92, 105);text-align:center;">Đổi mật khẩu</h1>
            <div>
                <?php

                extract($_SESSION['user']);
                ?>
                <h4 style="color: red;"><?= $thongbao ?? "" ?></h4>
                <form method="post" style="margin-left: 10px;">
                    <div class="">
                        Mật khẩu cũ: <br>
                        <input class="input_pass" type="password" name="password">
                    </div>
                    <div>
                        Mật khẩu mới: <br>
                        <input class="input_pass" type="password" name="newpassword">
                    </div>
                    <div class="">
                        Nhập lại mật khẩu mới:
                        <br>
                        <input class="input_pass" type="password" name="renewpassword">
                    </div>
                    <div class="">
                        <input type="hidden" name="id_user" value="<?= $id_user ?>">
                        <input class="buttonchangepass" type="submit" value="Đổi mật khẩu" name="capnhat">
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>