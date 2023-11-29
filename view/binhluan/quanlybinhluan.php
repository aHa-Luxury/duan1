<style>
/* Style for the content container */
.contentbl {
        margin: 5px;
    }

    /* Style for the heading */
    h1 {
        color: rgb(90, 92, 105);
    }

    /* Style for the table */
    .table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
        color: black;
    }

    /* Style for table headers */
    th {
        border: 1px solid #dddddd;
        padding: 8px;
        text-align: left;
    }

    /* Style for table cells */
    td {
        border: 1px solid #dddddd;
        padding: 8px;
        text-align: left;
    }
    th, td {
    width: 25%; /* Chia đều chiều rộng cho tất cả các cột */
}
</style>
<main>
<?php
                if (isset($_SESSION['user']) && (is_array($_SESSION['user']))) {
                    extract($_SESSION['user']);
                }
                ?>
<div class="contentbl">
    <h1 style="color: rgb(90, 92, 105);text-align:center;">Danh sách bình luận</h1>
    <div class="listbl-user">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Ten nguoi dung</th>
                    <th>Email</th>
                    <th style="width:300px">Nội dung bình luận</th>
                    <th>Tên sản phẩm</th>
                </tr>

            </thead>
            <?php
            foreach ($listbinhluan_user as $binhluan) : ?>
            
            <?php $deletebl = "index.php?act=deletebl&id_binhluan=" . $binhluan['ho']?>
                <tr>
                    <td><?=$binhluan['ten']?></td>
                    <td> <?= $binhluan['email']?></td>
                    <td><?=$binhluan['noidung']?></td>
                    <td><?=$binhluan['ten_sanpham']?></td>
                    <td> <a onclick="return confirm('Bạn chắc chắc muốn xóa không?')"  href="<?=$deletebl?>" . $id_binhluan>
                            <input class="btn btn-outline-danger" type="button" value="Xóa"></a></td>
                </tr>
            <?php
            endforeach ?>
        </table>
    </div>

</div>
</main>

