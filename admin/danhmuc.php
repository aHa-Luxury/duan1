<div class="content" >
<h1 style="color: rgb(90, 92, 105);">Danh mục sản phẩm</h1>
                        <button class="btn btn-success" style="margin-bottom: 10px;">Thêm mới</button>
                            <div class="row">
                              
                                <table class="table table-striped">
                                    <thead >
                                        <th>#ID</th>
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
                                                <button type="button" class="btn btn-outline-secondary">Sửa</button>
                                                <button type="button" class="btn btn-outline-danger">Xóa</button>
                                    </td>
                                        </tr>
                                        <?php $count++; endforeach ?>
                                  
                                   
                                  
                                  </table>
                                   

                            
                            </div>
                        
                      </div>