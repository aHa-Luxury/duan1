<div class="content" >
    <h1 style="color: rgb(90, 92, 105);">Danh sách khách hàng</h1>
    <a href="?act=add_tk" class="btn btn-success" style="margin-bottom:10px">Thêm mới</a>
                                <div class="row">
                                  <?= $_COOKIE['success'] ?? "" ?>
                                    <table class="table table-striped">
                                        <thead>
                                            <th>#</th>
                                            <th>Họ</th>
                                            <th>Tên</th>
                                            <th>Email</th>
                                            <th>Password</th>
                                            <th>Vai trò</th>
                                            <th>Chức năng</th>

                                        </thead>
                                    <?php $count = 1 ; foreach($all_khachhang as $all_kh): ?>

                                        <tr>
                                            <td><?= $count  ?></td>
                                            <td><?= $all_kh['ho'] ?></td>
                                            <td><?= $all_kh['ten'] ?></td>
                                            <td > <?= $all_kh['email'] ?></td>
                                            <td><?= $all_kh['password'] ?></td>
                                            <td><?= ($all_kh['role'] == 1) ? 'admin' : 'user' ?>
                                        </td>
                                          
                                            <td >
                                                
                                                    <a href="?act=edit_tk&id_tk=<?= $all_kh['id_user'] ?>" class="btn btn-outline-secondary">Sửa</a>
                                                   
                                                    <?php if($all_kh['role'] != 1) : ?>
                                                <a onclick="return confirm('Bạn có chắc chắn muốn xóa không')" href="?act=delete_taikhoan&id_tk=<?= $all_kh['id_user'] ?>" class="btn btn-outline-danger">Xóa</a></td>
                                                <?php endif ?>
                                        </tr>
                                        <?php $count++; endforeach ;?>
                                        
                                        
                                      
                                      </table>
                                       
    
                                
                                </div>
                            
                          </div>
                          <style>
                            thead th{
                            text-align: center;
                        }
                        
                        tbody tr td{
                            text-align: center;
                          
                        }
                          </style>