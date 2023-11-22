<div class="content" >
                        <h1 style="color: rgb(90, 92, 105);">Thống kê</h1>
                    <div class="boxes">
                        <div class="box"><h6 style="color: rgb(90, 92, 105);">Tổng sản phẩm</h6>
                            <p style="color:rgb(90, 92, 105)"><?= $count_sanpham['tong_sanpham'] ?></p></div>
                        <div class="box"><h6 style="color: rgb(90, 92, 105);">Tổng danh mục</h6>
                            <p style="color:rgb(90, 92, 105)"><?= $count_danhmuc['tong_danhmuc'] ?></p></div>
                        <div class="box"><h6 style="color: rgb(90, 92, 105);">Tổng giá trị sản phẩm</h6><p style="color:rgb(90, 92, 105)"><?= number_format($count_price_sanpham['tong_price_sanpham'])  ?>đ</p></div>
                        <div class="box"><h6 style="color: rgb(90, 92, 105);">Tổng số khách hàng</h6><p style="color:rgb(90, 92, 105)"><?= $count_khachhang['tong_khachhang'] ?></p></div>
                        
                                         
                </div>
                <div class="chart">
                    <div class="chart_left">
                        <h1 style="color:#4e73df">Earnings Overview</h1>
                    </div>
                    <div class="chart_right">
                        <h1 style="color:#4e73df">Revenue Sources</h1>
                    </div>

                </div>
                    </div>