<div class="content" >
<h1 style="color: rgb(90, 92, 105);">Danh mục sản phẩm</h1>
                            <a href="?act=add_dm" class="btn btn-success" style="margin-bottom:10px">Thêm mới</a>
                            <div class="row">
                               
                                    <?= $_COOKIE['success'] ?? ""?>
                                <table class="table table-striped">
                                    <thead >
                                        <th>#</th>
                                        <th>Tên danh mục</th>
                                        <th>Logo</th>
                                        <th>Chức năng</th>
                                    </thead>
                                    <?php $count = 1; foreach($all_danhmuc as $all_dm): ?>
                                        <tr>
                                            <td style="line-height:40px"><?= $count ?></td>
                                            <td style="text-transform:uppercase;line-height:40px"><?= $all_dm['ten_danhmuc'] ?></td>
                                            <td style="line-height:40px"><img width="50px;" src="../<?= $all_dm['img_danhmuc'] ?>" alt=""></td>
                                            <td style="line-height:40px">
                                                <a href="?act=sua_dm&id_dm=<?=$all_dm['id_danhmuc']?>"  class="btn btn-outline-secondary">Sửa</a>
                                                <a href="?act=delete_dm&id_dm=<?=$all_dm['id_danhmuc']?>" class="btn btn-outline-danger">Xóa</a>
                                    </td>
                                        </tr>
                                        <?php $count++; endforeach ?>     
                                  
                                  </table>
                                   

                            
                            </div>
                            <div id="overlay" class="overlay">
    <div id="popup" class="popup">
        <!-- Nội dung form nhập liệu -->
        <form>
            <!-- Đặt các trường nhập liệu của bạn ở đây -->
            <label for="fieldName">Tên:</label>
            <input type="text" id="fieldName" name="fieldName"><br><br>
            <input type="submit" value="Submit">
        </form>
        <!-- Đóng box khi nhấp vào nút đóng hoặc bên ngoài box -->
        <a href="#" onclick="closePopup()">Đóng</a>
    </div>
</div>
                        
                      </div>