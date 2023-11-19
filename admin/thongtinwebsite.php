<div class="content" >
<h1 style="color: rgb(90, 92, 105);">Danh mục sản phẩm</h1>
                            <a href="?act=add_dm" class="btn btn-success" style="margin-bottom:10px">Thêm mới</a>
                            <div class="row">
                               
                                    <?= $_COOKIE['success'] ?? ""?>
                               <h1>Cam kết:</h1>
                               
                                <?=$thongtinwebsite['id']?><br>
                                <?=$thongtinwebsite['camket']?><br>
                                <?=$thongtinwebsite['diachi']?><br>
                                <?=$thongtinwebsite['hotline']?><br>
                                <?=$thongtinwebsite['baohanh']?><br>
                                <?=$thongtinwebsite['vanchuyen']?><br>
                                <?=$thongtinwebsite['description']?><br>
                                <?=$thongtinwebsite['email']?><br>
                                <?=$thongtinwebsite['vanchuyen']?><br>
                               
                                   

                            
                            </div>
                            
                        
                      </div>

                      <style>
                        tbody tr{
                            height: 150px;
                        }
                        tbody tr td{
                            text-align: center;
                          
                        }
                      </style>