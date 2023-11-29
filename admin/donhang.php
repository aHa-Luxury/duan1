<div class="content">
    <h1 style="color: rgb(90, 92, 105);">Danh sách đơn hàng</h1>
    <div class="row">
        <!-- <?php if (isset($_COOKIE['success'])) : ?>
            <span style="color:green"><?= $_COOKIE['success'] ?></span>

        <?php endif ?> -->

        <table class="table table-striped">
            <thead>
                <th>Mã đơn hàng</th>
                <th>Email khách hàng</th>
                <th>Sản phẩm</th>
                <th>Tổng tiền</th>
                <th>Ngày đặt</th>
                <th>Trạng thái</th>
                <th></th>

            </thead>
            <?php
            foreach ($listdonhang as $donhang) : ?>

                <tr>
                    <td><?= $donhang['id_chitietbill'] ?></td>
                    <td><?= $donhang['email']  ?></td>
                    <td><?= $donhang['ten_sanpham']  ?></td>
                    <td> <?= number_format($donhang['price'])?>VNĐ</td>
                    <td> <?= $donhang['ngay_tao'] ?></td>
                    <td><?php
                    if ($donhang['order_status'] == 0) {
                        echo 'Chờ xử lý';
                    }elseif ($donhang['order_status']==1){
                        echo 'Đang giao hàng';
                    }else{
                        echo 'Giao hàng thành công';
                    }
                     ?>

                    <td>

                        <a href="index.php?act=editdonhang&id_chitietbill=<?= $donhang['id_chitietbill'] ?>" class="btn btn-outline-secondary">Sửa trạng thái</a>


                        <a onclick="return confirm('Bạn có chắc chắn muốn xóa không')" href="?act=deletetk&id_user=<?= $donhang['id_chitietbill'] ?>" class="btn btn-outline-danger">Xóa</a>
                    </td>
                </tr>
            <?php
            endforeach; ?>



        </table>



    </div>

</div>
<style>
    thead th {
        text-align: center;
    }

    tbody tr td {
        text-align: center;

    }
</style>