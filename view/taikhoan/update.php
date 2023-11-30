<style>
    /* Reset some default styles */
h1,
h2,
h3,
p,
form,
input {
    margin: 0;
    padding: 0;
}

body {
    font-family: 'Arial', sans-serif;
}

main {
   text-align: center;
}

form {
    max-width: 400px;
    margin: auto;
    background-color: #fff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    margin-bottom: 10px;
    text-align: center;
}

h1 {
    color: #5a5c69;
    text-align: center;
    margin-bottom: 20px;
}

.inputchange {
    width: 100%;
    padding: 10px;
    margin-bottom: 10px;
    border: 1px solid #ced4da;
    border-radius: 4px;
}

.buttonchange {
    background-color: #007bff;
    color: #fff;
    padding: 10px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    margin-bottom: 10px;
}

.buttonchange:hover {
    background-color: #0056b3;
}
</style>
<main>
<div>

    <div>
        <div>
            <h1 style="color: rgb(90, 92, 105);text-align:center;">Cập nhật thông tin tài khoản</h1>

            <div style="text-align:center">
                <?php

                extract($_SESSION['user']);

                ?>
                <form method="post">
                    <div class="">
                        Họ: <br>
                        <input class="inputchange" type="text" name="ho" placeholder="Họ" value="<?= $ho ?>">
                    </div>
                    <div>
                        Tên: <br>
                        <input class="inputchange" type="text" name="ten" placeholder="Tên" value="<?= $ten ?>">
                    </div>
                    <div class="">
                        Email: <br>
                        <input class="inputchange" type="email" name="email" placeholder="Email" value="<?= $email ?>">
                    </div>
                    <div class="">
                        Địa chỉ: <br>
                        <input class="inputchange" type="text" name="address" placeholder="Địa chỉ" value="<?= $address ?? "" ?>">
                    </div>
                    <div class="">
                        Số điện thoại: <br>
                        <input class="inputchange" type="text" name="tel" placeholder="Số điện thoại" value="<?= $_SESSION['user']['tel']  ?>">
                    </div>
                    <div class="">
                        <input type="hidden" name="id_user" value="<?= $_SESSION['user']['id_user'] ?>">
                        <input class="buttonchange" type="submit" value="Cập nhật" name="capnhat">
                        <input class="buttonchange" type="reset" value="Nhập lại">
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
</main>