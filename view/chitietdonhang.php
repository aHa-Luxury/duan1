<style>

.main {
    padding: 20px;
}

h1 {
    color: #5a5c69;
    text-align: center;
}

.left, .right {
    padding: 20px;
    box-sizing: border-box;
}

.left h1, .right h1 {
    color: #333;
}

.left h2, .right h2 {
    margin: 10px 0;
}

select {
    padding: 8px;
    margin-top: 10px;
    width: 100%;
    box-sizing: border-box;
}

.product {
    margin-top: 20px;
    border-bottom: 1px solid #ccc;
    padding-bottom: 10px;
}

.img img {
    width: 100px;
    height: auto;
}

.right {
    background-color: black;
    color: #fff;
}

.ten {
    margin-left: 10px;
    flex: 1;
}

.price {
    flex-shrink: 0;
    margin-left: auto;
}
</style>
<main>
    <h1 style="color: rgb(90, 92, 105);">Chi tiết đơn hàng</h1>
<form action="" method="post">
  <div style="display:flex;flex-direction:row">
  <div class="left" style="width:50%">
        <h1>Thông tin nhận hàng</h1>
        <input type="hidden" value="<?= $load_one_donhang['id_bill'] ?>" name="id_bill">
        <h2>Tên khách hàng:<?= $load_one_donhang['name'] ?></h2>
        <h2>Địa chỉ:<?= $load_one_donhang['address'] ?></h2>
        <h2>Số điện thoại: <?= $load_one_donhang['tel'] ?></h2>
        <h2>Email:<?= $load_one_donhang['email'] ?></h2>
    </div>
    <div class="right" style="width:50%;">
    <h1>Danh sách đơn hàng</h1>
    <?php foreach($load_chitietbill as $ctbill): ?>
    <div class="product" style="display:flex;flex-direction:row">
    <div class="img"> 
        <img style="width:60px" src="../images/<?= $ctbill['hinh_sanpham']?>" alt="">
    </div>
    <div class="ten"><?= $ctbill['ten_sanpham']?> <b style="color:orange">x<?= $ctbill['soluong']?></b></div>
    <div class="price" style="color:orangered"><?= number_format($ctbill['thanhtien'])?><u>đ</u></div>
    </div>
    <?php endforeach ?>
<h1 style="color:orangered">Tổng tiền: <span><?= number_format($load_one_donhang['total'])?><u>đ</u></span></h1>
</div>
</div>
<a href="?act=donhang" style="border:1px solid white">Danh sách</a>
  </form>
                            
                            
                          </main>
                       