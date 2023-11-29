<div class="content">
    <h1 style="color: rgb(90, 92, 105);">Cập nhật trạng thái đơn hàng</h1>

    <div class="row">
        <?= $_COOKIE['message'] ?? "" ?>
        <form style="max-width: 100%;margin: 20px auto; padding: 20px; background-color: #f4f4f4;border-radius: 8px;box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);" action="" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id_chitietbill" value="<?= $one_chitietbill['id_chitietbill'] ?>"><br><br>
            Trạng thái đơn hàng :
            <select value="<?=$trangthai?>" name="order_status" id="order_status">
    <option value="0" <?php echo ($trangthai == 0) ? 'selected' : ''; ?>>Chờ xử lý</option>
    <option value="1" <?php echo ($trangthai == 1) ? 'selected' : ''; ?>>Đang giao hàng</option>
    <option value="2" <?php echo ($trangthai == 2) ? 'selected' : ''; ?>>Giao hàng thành công</option>
</select>
        <br>
        <br>
             <!-- <input type="text" name="order_status" value="<?= $one_chitietbill['order_status'] ?>"><br><br> -->
            <input type="submit" name="capnhat" value="Cập nhật">
            <a href="?act=quanlydonhang" style="background-color: #0d6efd;
    color: #fff;
    padding: 10px 15px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    text-decoration:none;">Danh sách</a>
        </form>



    </div>


</div>

<style>
    /* Style the form input fields */
    input[type="text"],
    input[type="file"],
    input[type='password'],
    input[type='email'] {
        width: 100%;
        padding: 10px;
        margin-bottom: 10px;
        box-sizing: border-box;
        border: 1px solid #ccc;
        border-radius: 4px;
    }

    /* Style the submit button */
    input[type="submit"] {
        background-color: #4caf50;
        color: #fff;
        padding: 10px 15px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    /* Change submit button color on hover */
    input[type="submit"]:hover {
        background-color: #45a049;
    }

    /* Add some spacing between elements */
    br {
        margin-bottom: 10px;
    }
</style>