<div class="content">
    <h1 style="color: rgb(90, 92, 105);">Danh sách sản phẩm</h1>
    <button class="btn btn-success" style="margin-bottom: 10px;">Thêm mới</button>
    <div class="row">
        <table class="table table-striped">
            <thead>
                <th>#</th>
                <th>Tên sản phẩm</th>
                <th>Hình ảnh</th>
                <th>Giá</th>
                <th>Size</th>
                <th>Số lượng</th>
                <th>Chức năng</th>
            </thead>
            <?php $count = 1;
            foreach ($all_sanpham as $all_sp) : ?>
                <tr>
                    <td style="line-height:50px"><?= $count ?></td>
                    <td  style="line-height:50px">
                        <?php
                        $ten_sanpham = $all_sp['ten_sanpham'];
                        // Giới hạn chiều dài của chuỗi và thêm dấu "..." nếu cần
                        $ten_sanpham_display = strlen($ten_sanpham) > 70 ? substr($ten_sanpham, 0, 70) . "..." : $ten_sanpham;
                        echo $ten_sanpham_display;
                        ?>
                    </td>
                    <td style="line-height:50px"><img width="40px" src="../<?= $all_sp['img_sanpham'] ?>" alt=""></td>
                    <td style="line-height:50px"><?= $all_sp['price'] ?></td>
                    <td style="line-height:50px"><?= $all_sp['size'] ?></td>
                    <td style="line-height:50px"><?= $all_sp['soluong'] ?></td>
                    <td style="width:205px;line-height:50px">
                        <button type="button" class="btn btn-outline-secondary">Sửa</button>
                        <button type="button" class="btn btn-outline-danger">Xóa</button>
                        <button type="button" class="btn btn-outline-success">Chi tiết</button>
                    </td>
                </tr>

            <?php $count++;
            endforeach ?>



        </table>
    </div>
</div>