<div class="hr"></div>
        <div class="banner">
          <?php $one_danhmuc =  load_one_danhmuc($one_sanpham['id_danhmuc'])  ?>
          <video src="images/<?= $one_danhmuc['video_danhmuc'] ?>" autoplay="autoplay" muted loop></video>
        </div>
<main>
        <div class="thongtin_sanpham">
          <div class="head_desc">
            <div class="head_left">
              <img src="images/<?=$one_sanpham['img_sanpham'] ?>" alt="" />
            </div>
            <div class="head_center">
              <h1><?= $one_sanpham['ten_sanpham'] ?></h1>
              <hr>
              <p>Vỏ bằng Titanium được hoàn thiện và đánh bóng bằng Satin dây đeo da, Chiếc đồng hồ là một thiết kế độc đáo của đồng hồ bấm giờ tự động Unico. 
                  Nó có thể dự trữ năng lượng lên tới 42 giờ.</p><br>
              <p>Mã SP : <?= $one_sanpham['id_sanpham'] ?></p><br>
              <h2>Giá : <span><?= number_format( $one_sanpham['price'] )?>đ</span></h2>
              <br>
              <p><?= $one_sanpham['tinhtrang'] ?></p><br>
              <h2>Thông tin thêm:</h2>
              <hr>
              <p><?= $thongtinwebsite['camket']  ?></p>
              
                   <div class="button">
                      <div class="buy">
                          <p>Mua hàng</p>
                      </div>
                      <div class="add">
                          <p>Thêm vào giỏ hàng</p>
                      </div>
                   </div>
            </div>
            <div class="head_right">
              <div class="box">
                  <h1 style="text-transform:uppercase">Địa chỉ mua hàng</h1>
                  <hr>
                  <p><?=$thongtinwebsite['diachi']?></i></p>
                  <p> Hotline : <?=$thongtinwebsite['hotline']?></p>
                  
              </div>
              <div class="box">
                  <p><?=$thongtinwebsite['vanchuyen']?></p>
              </div>
             
            </div>
            .
          </div>
          <div class="end_desc">
            <div class="end_left">
              <h2>Thông tin sản phẩm</h2>
              <h3>Đồng hồ <?= $one_sanpham['ten_sanpham']?></h3>
              
              <h2>Thiết kế của  <?= $one_sanpham['ten_sanpham']?></h2>
              <hr>
              <p>Đồng hồ  <?= $one_sanpham['ten_sanpham']?> có vẻ bề ngoài 
                khỏe khoắn, nam tính, thời thượng. Với vành đồng hồ làm từ chất liệu titanium 
                siêu nhẹ và siêu bền bỉ, chiếc đồng hồ có kích thước mặt 45mm này là người bạn 
                đồng hành hoàn hảo của các quý ông. Vành đồng hồ được chải xước dọc công phu và 
                đánh bóng với Satin làm nổi bật 6 đinh ốc cách điệu theo chữ H trứ danh của <span style="text-transform:uppercase"><?= $one_sanpham['ten_danhmuc'] ?></span>. 
                Chi tiết này tạo ra độ tương đồng hoàn hảo giữa mặt đồng hồ và càng nối dây.</p>
                <img src="images/hublot1.jpg" alt="">
                <p>Ngôn ngữ thiết kế đơn giản nhưng tinh tế của <span style="text-transform:uppercase"><?= $one_sanpham['ten_danhmuc'] ?></span> cho thấy độ tỉ mỉ của quá trình 
                  chế tác chiếc đồng hồ. Mặt kính sapphire sang trọng không những làm nổi bật vẻ đẹp thượng 
                  lưu của <?= $one_sanpham['ten_sanpham']?>, còn đảm bảo một khả năng chống phản 
                  chiếu hoàn hảo. Bên dưới lớp kính sapphire có thể thấy rõ độ chi tiết với mặt số chính xanh bắt 
                  cặp ăn ý với màu dây. Đặt cân đối giữa 2 bên là 2 mặt số phụ chronograph, ngoài ra còn có thêm một 
                  cửa sổ chỉ ngày tạo điểm nhấn, đem đến một tổng thể sang trọng đầy kì công. Các bộ kim được điều chỉnh 
                  dễ dàng qua 3 núm chỉnh kim nằm bên cạnh phải chiếc đồng hồ, núm chính được khắc nổi logo <span style="text-transform:uppercase"><?= $one_sanpham['ten_danhmuc'] ?></span>.</p>
                  <img src="images/hublot2.jpg" alt="">
                <p>Không thể không kể đến phần dây đeo đặc trưng của nhà <span style="text-transform:uppercase"><?= $one_sanpham['ten_danhmuc'] ?></span>. Dây đeo với phần lõi bằng cao su bọc da 
                  cá sấu cao cấp bên ngoài, vừa đảm bảo được đồ bền cực lớn, vừa cho thấy tính cao cấp và thời thượng vốn 
                  cố của chiếc đồng hồ. Dây đeo màu xanh thể hiện mức độ toàn vẹn lớn trong khả năng phối hợp các gam màu ổn 
                  định từ nhà thiết kế.</p>
                  <h2>Bên trong đồng hồ <?= $one_sanpham['ten_sanpham'] ?></h2>
                  <hr>
                  <p><?= $one_sanpham['ten_sanpham'] ?> hoạt động chính xác nhờ bộ máy tự động HUB1143. Chế tác 
                    thủ công bằng tay hoàn hảo cho một khả năng chống nước tuyệt vời, đạt mức 50m chiều sâu. Thời lượng cót 42 
                    giờ đồng hồ minh chứng cho độ chỉnh chu từ công nghệ làm đồng hồ cơ tiên tiến bật nhất của <span style="text-transform:uppercase"><?= $one_sanpham['ten_danhmuc'] ?></span>.</p>
                    <img src="images/hublot3.jpg" alt="">
  
                    <div class="binhluan">
                      
                    </div>
            </div>
            <div class="end_right">
             <ul class="thongsokithuat">
              <p class="name_table">THÔNG SỐ KĨ THUẬT</p>
              <li>
                <span>Dòng sản phẩm</span>
                <p>Classic fusion</p>
              </li>
              <li>
                <span>Thấm nước</span>
                <p>Chống thấm nước mức 50m hoặc 5 ATM</p>
              </li>
              <li>
                <span>Kích thước mặt</span>
                <p>45 mm</p>
              </li>
              <li>
                <span>Vành đồng hồ</span>
                <p>Titanium được hoàn thiện và đánh bóng bằng Satin với 6 ốc vít hình chữ H</p>
              </li>
              <li>
                <span>Năng lượng</span>
                <p>Máy cơ, tự lên dây HUB1143 Self-winding Chronograph Movement dự trữ năng lượng 42 giờ</p>
              </li>
              <li>
                <span>Chất liệu vỏ</span>
                <p>Vỏ bằng Titanium được hoàn thiện và đánh bóng bằng Satin</p>
              </li>
              <li>
                <span>Dây đeo</span>
                <p>Dây đeo cao su màu xanh và da cá sấu</p>
              </li>
              <li>
                <span>Khóa</span>
                <p>Khóa clasp bằng thép không gỉ</p>
              </li>
              <li>
                <span>Mặt kính</span>
                <p>Sapphire với khả năng chống phản chiếu</p>
              </li>
              <li>
                <span>Sản xuất tại</span>
                <p>Nhà máy đồng hồ Thụy Sĩ</p>
              </li>
             </ul>
              <p></p>
            </div>
          </div>
          
        </div>
        <h2 class="title_sanphamlienquan">Sản phẩm liên quan</h2>
        <div class="sanphamlienquan">
       <?php  foreach($four_sanphamlienquan as $four_splq):?>

        <div class="product">
          <a href="?act=chitietsanpham&id_sp=<?= $four_splq['id_sanpham'] ?>">
            <img src="images/<?= $four_splq['img_sanpham'] ?>" alt="">
                <h3><?= $four_splq['ten_sanpham'] ?></h3>
                <p><?= number_format($four_splq['price'])  ?> đ</p>
            </a>
        </div>
        <?php endforeach ;?>
        </div>
      </main>