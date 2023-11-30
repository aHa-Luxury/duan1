<div class="content">
    <h1 style="color: rgb(90, 92, 105);">Danh sách bình luận</h1>
    <div class="row">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nội dung bình luận</th>
                    <th>Email</th>
                    <th>Tên sản phẩm</th>
                    <th>Chức năng</th>
                </tr>

            </thead>
            <?php if(empty($load_all_donhang)) : ?>
                <tr>
                    <td colspan="5">Chưa có bình luận nào</td>
                </tr>
                <?php else: ?>
            <?php
            foreach ($listbinhluan as $binhluan) : ?>
            
            <?php $deletebl = "index.php?act=deletebl&id_binhluan=" . $binhluan['id_binhluan']?>
                <tr>
                    <td><?=$binhluan['id_binhluan']?></td>
                    <td> <?= $binhluan['ten_sanpham']?></td>
                    <td><?=$binhluan['email']?></td>
                    <td><?=$binhluan['noidung']?></td>
                    <td> <a onclick="return confirm('Bạn chắc chắc muốn xóa không?')"  href="<?=$deletebl?>" . $id_binhluan>
                            <input class="btn btn-outline-danger" type="button" value="Xóa"></a></td>
                </tr>
            <?php
            endforeach; ?>
            <?php endif ?>
        </table>
    </div>

</div>
