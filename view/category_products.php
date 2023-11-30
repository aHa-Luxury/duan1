<div class="banner">
    <div class="hr"></div>
            <?php if($one_danhmuc['video_danhmuc'] != "") : ?>
    <video src="images/<?= $one_danhmuc['video_danhmuc'] ?>" autoplay="autoplay" muted loop></video>
    <?php else :?>
      <img src="images/BANNER_DONG_HO_CHUAN_PC.jpg" alt="">
    <?php endif ?>
    <div class="hr"></div>
        </div>
<main>
        <div class="bc_home">
            <div class="nav_detail breadcrumbs">
                <div class="h2"><a href="?act=trangchu">Trang chủ</a></div><span
                    style="float: left;margin-top: 2px;margin-right: 10px;width: 10px;">—</span>
                
                <div class="h3" style="text-transform:uppercase;width:200px"><?= $one_danhmuc['ten_danhmuc'] ?></div>
            </div>
        </div>
        <div class="name_category">
            <h2><?=$one_danhmuc['ten_danhmuc'] ?></h2>
            <div class="child_cat">
                <ul>

                    <li><a title="Day Date" href="##">Day Date</a></li>
                    <li><a title="Sky Dweller" href="/##">Sky Dweller</a></li>
                    <li><a title="Datejust" href="##">Datejust</a></li>
                    <li><a title="Lady Datejust" href="##">Lady Datejust</a></li>
                    <li><a title="Oyster Perpetual" href="##">Oyster Perpetual</a></li>
                    <li><a title="Cellini" href="##">Cellini</a></li>
                    <li><a title="Submariner" href="##">Submariner</a></li>
                    <li style="border-radius: 0px 20px 20px 0px;"><a title="Gmt Master" href="##">Gmt Master</a></li>
                </ul>
            </div>
        </div>
           <!-- <div class="regtangle">
               <div class="box1">
                <a href=""><?= $one_danhmuc['ten_danhmuc'] ?></a>
            </div>
           </div> -->
        <div class="brand">
           
          
            <div class="list">
                <?php foreach($all_sanpham as $all_sp): ?>
                    <div class="product">
                        <a href="?act=chitietsanpham&id_sp=<?= $all_sp['id_sanpham'] ?>">
                        <img src="images/<?= $all_sp['img_sanpham']?>" alt="">
                            <h3><?= $all_sp['ten_sanpham']?></h3>
                            <p><?=number_format( $all_sp['price'] )?>đ</p>
                        </a>
    
                    </div>
                    <?php endforeach; ?>
               
            </div>
         
        
         
         
        </div>
       </main>