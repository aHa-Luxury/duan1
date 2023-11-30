<!-- <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table thead tr th{
            color:black
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }
    </style> -->
    <style>
    /* body {
        font-family: 'Arial', sans-serif;
        background-color: #f4f4f4;
        color: #333;
    } */

    main {
        margin: 20px auto;
        padding: 20px;
        background-color: #fff;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    h1 {
        color: #333;
    }

    table {
        margin: 0 auto;
        width: 90%;
        border-collapse: collapse;
        margin-top: 20px;
    }

    table thead tr th {
        color: #000;
        font-weight: bold;
    }

    th, td {
        border: 1px solid #ddd;
        padding: 12px;
        text-align: left;
        color:black;
    }

    th {
        background-color: #f2f2f2;
    }

    tbody tr:nth-child(even) {
        background-color: #f9f9f9;
    }

    a {
        text-decoration: none;
        padding: 5px 10px;
        border-radius: 4px;
        color: #fff;
        margin-right: 5px;
    }

</style>
<main>
    <h1 style="margin-left:80px">Danh sách đơn hàng</h1>

    <?php  if(isset($_COOKIE['huy'])) :?>
        <h2 style="color:green;margin-left:80px"><?= $_COOKIE['huy'] ?></h2>
        <?php endif ?>
    <?php  if(isset($_COOKIE['xoa'])) :?>
        <h2 style="color:green;margin-left:80px"><?= $_COOKIE['xoa'] ?></h2>
        <?php endif ?>
    <table border="1">
        <thead>
            <tr>
                <th style="width:40px">#</th>
                <th style="width:80px">ID_bill</th>
                <th >Tên</th>
                <th style="width:100px">Địa chỉ</th>
                <th style="width:50px">Tổng tiền</th>
                <th style="width:50px">Ngày đặt</th>
                <th style="width:300px">Phương thức thanh toán</th>
                <th>Trạng thái</th>
                <th style="width:200px">Chức năng</th>
            </tr>
        </thead>
        <?php  if(isset($_SESSION['user'])) : ?>
        <tbody>
            <?php if(empty($load_all_donhang)):  ?>
                <tr>
                    <td colspan="9">Chưa có sản phẩm nào </td>
                </tr>
                <?php else :?>
            <?php $count = 1; foreach ($load_all_donhang as $all_donhang) : ?>
                <tr>
                    <td style="width:40px"><?= $count ?></td>
                    <td style="width:80px"><?= $all_donhang['id_bill']  ?></td>
                    <td ><?= $all_donhang['name']  ?></td>
                    <td style="width:100px"><?= $all_donhang['address']  ?></td>
                    <td style="width:50px"><?= number_format($all_donhang['total'])?><u>đ</u></td>
                    <td style="width:50px"><?= $all_donhang['date']  ?></td>
                    <td style="width:300px">
                    <?php if($all_donhang['pttt'] == 1):?>
                        <p> <?= "Chuyển khoản" ?></p>
                        <?php else :?>
                            <p> <?= "Thanh toán khi nhận hàng" ?></p>
                        <?php endif ?>
                   
                </td>
                    <td>
                        <?php if($all_donhang['trangthai'] == 1): ?>
                              <p style="color:blue">  <?= "Đang vận chuyển" ?></p>
                            <?php elseif($all_donhang['trangthai'] == 2): ?>
                              <p style="color:green">  <?= "Đã thanh toán" ?></p>
                                <?php else : ?>
                              <p style="color:orangered">  <?= "Đang xác thực" ?></p>
                            <?php endif?>
                        </td>
                    <td >
    <ul class="function-list" style="width:130px;display:flex;flex-direction:row">
    <?php if($all_donhang['trangthai'] ==2) :?>

        <li><a style="background-color:red" href="?act=dlt_bill&id_bill=<?= $all_donhang['id_bill'] ?>">Xóa</a></li>
        <?php else: ?>
            <li><a style="background-color:gray" href="?act=huy_bill&id_bill=<?= $all_donhang['id_bill'] ?>">Hủy</a></li>
<?php endif ?>
        <li><a style="background-color:green" href="?act=chitietdonhang&id_bill=<?=$all_donhang['id_bill']?>">Chi tiết</a></li>
    </ul>
</td>
                </tr>
            <?php $count++; endforeach; ?>
            <?php endif ?>
        </tbody>
        <?php endif ?>
    </table>
    <br>
</main>