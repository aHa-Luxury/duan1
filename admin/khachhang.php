<div class="content" >
    <h1 style="color: rgb(90, 92, 105);">Danh sách khách hàng</h1>
                            <button class="btn btn-success" style="margin-bottom: 10px;">Thêm mới</button>
                                <div class="row">
                                  
                                    <table class="table table-striped">
                                        <thead>
                                            <th>#ID</th>
                                            <th>Họ</th>
                                            <th>Tên</th>
                                            <th>Email</th>
                                            <th>Password</th>
                                            <th>Chức năng</th>

                                        </thead>
                                    <?php $count = 1 ; foreach($all_khachhang as $all_kh): ?>

                                        <tr>
                                            <td><?= $count  ?></td>
                                            <td><?= $all_kh['ho'] ?></td>
                                            <td><?= $all_kh['ten'] ?></td>
                                            <td><?= $all_kh['email'] ?></td>
                                            <td><?= $all_kh['password'] ?></td>
                                          
                                            <td>
                                                <button type="button" class="btn btn-outline-secondary">Sửa</button>
                                                <button type="button" class="btn btn-outline-danger">Xóa</button></td>
                                        </tr>
                                        <?php $count++; endforeach ;?>
                                        
                                        
                                      
                                      </table>
                                       
    
                                
                                </div>
                            
                          </div>