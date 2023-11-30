<div class="content">
    <h1 style="color: rgb(90, 92, 105);">Danh sách đơn hàng</h1>
   

    <?php if (isset($_COOKIE['success'])) :  ?>
        <span style="color:green"><?= $_COOKIE['success'] ?></span>
    <?php endif ?>
    <div class="row">
        <table class="table table-striped">
            <thead>
                <th>#</th>
                <th>Tên</th>
                <th>Địa chỉ</th>
                <th>Số điện thoại</th>
                <th>Email</th>       
                <th>Tổng tiền</th>
                <th>PTTT</th>
                <th>Trạng thái</th>
                <th>Chức năng</th>
            </thead>
            <?php if(empty($load_all_donhang)) : ?>
                <tr>
                    <td colspan="9">Chưa có đơn hàng nào</td>
                </tr>
                <?php else: ?>
            <?php $count = 1;
            foreach  ($load_all_donhang as $all_dh) : ?>
                <tr>
                    <td style="line-height:50px;width:40px"><?= $all_dh['id_bill'] ?></td>
                    <td style="text-align:left">
                        <?php
                        $ten_sanpham = $all_dh['name'];
                        // Giới hạn chiều dài của chuỗi và thêm dấu "..." nếu cần
                        $ten_sanpham_display = strlen($ten_sanpham) > 100 ? substr($ten_sanpham, 0, 100) . "..." : $ten_sanpham;
                        echo $ten_sanpham_display;
                        ?>
                    </td>
                    <td><?= $all_dh['address'] ?></td>
                    <td><?= $all_dh['tel'] ?></td>
                    <!-- <td style="line-height:50px"><?= $all_sp['size'] ?></td> -->
                    <td><?= $all_dh['email'] ?></td>
                    <td><?= number_format($all_dh['total']) ?><u>đ</u></td>
                    <td><?= $all_dh['pttt'] == 0 ? "Thanh toán khi nhận hàng" : "Chuyển khoản"   ?></td>
                    <td><?php if($all_dh['trangthai'] == 1):?>
                        <?= '<b style="color:orangered">Đang vận chuyển</b>' ?>
                        <?php elseif(($all_dh['trangthai']) == 2 ):?>
                            <?= '<b style="color:green">Đã giao</b>' ?>
                            <?php else :?>
                                <?= ' <b style="color:orange">Đang xác thực</b>' ?>
                              
                       
<?php endif ?>
                </td>
                    <td style="line-height:50px">
                        <a onclick="return confirm('Bạn có chắc chắn muốn xóa đơn hàng này không?')" href="?act=delete_bill&id_bill=<?= $all_dh['id_bill'] ?>" class="btn btn-outline-danger">Xóa</a>
                        <a href="?act=chitietdonhang&id_bill=<?= $all_dh['id_bill'] ?>" type="button" class="btn btn-outline-success">Chi tiết</a>
                    </td>
                </tr>

            <?php $count++;
            endforeach ?>
<?php endif ?>


        </table>
    </div>
    <div class="pagination" style="margin-top: 10px;">
        <button id="prevPage">Previous</button>
        <span id="currentPage">1</span>
        <button id="nextPage">Next</button>
    </div>

</div>

<style>
    thead th {
        text-align: center;
    }
    tbody tr td {
        
        text-align: center;

    }

    form label {
        display: block;
        margin: 10px 0 5px;
        color: #555;
    }

    form select {
        width: 20%;
        padding: 10px;
        margin-bottom: 15px;
        border: 1px solid #ccc;
        border-radius: 4px;
    }

    /* Submit Button */
    form input[type="submit"] {
        width: 20%;
        background-color: #4caf50;
        color: #fff;
        padding: 10px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    form input[type="submit"]:hover {
        background-color: #45a049;
    }
</style>