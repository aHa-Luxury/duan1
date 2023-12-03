<style>

.main {
    padding: 20px;
}

h1 {
    color: #5a5c69;
    text-align: center;
}
.bill{
 margin-bottom: 20px;
}
.left{
    padding: 40px;
    background-color: white;
    color: black;
    text-align: center;
}
.right {
    text-align: center;
    background-color: black;
   color:black;
}
.prd{
    width:70%;
    margin: 0 auto;
    display: flex;
    flex-direction: row;
    padding: 0 40px;
}

.prd .ten{
    font-size: 20px;
    color: orange;
}

.prd .price{
    width:20%;
    color:orangered;
    font-size: 20px;

}
select {
    padding: 8px;
    margin-top: 10px;
    width: 100%;
    box-sizing: border-box;
}


</style>
<main>
    <h1 style="color: rgb(90, 92, 105);">Chi tiết đơn hàng</h1>
<form action="" method="post">
  <div class="bill">
  <div class="left" >
        <h1>Thông tin nhận hàng</h1>
        <input type="hidden" value="<?= $load_one_donhang['id_bill'] ?>" name="id_bill">
        <h2>Tên khách hàng:<?= $load_one_donhang['name'] ?></h2>
        <h2>Địa chỉ:<?= $load_one_donhang['address'] ?></h2>
        <h2>Số điện thoại: <?= $load_one_donhang['tel'] ?></h2>
        <h2>Email:<?= $load_one_donhang['email'] ?></h2>
    </div>
    <div class="right">
    <h1>Đơn hàng</h1>
    <?php foreach($load_chitietbill as $ctbill): ?>
    <div class="prd" >

        <img style="width:60px" src="images/<?= $ctbill['hinh_sanpham']?>" alt="">
    <div class="ten"><?= $ctbill['ten_sanpham']?> <b style="color:orangered">x<?= $ctbill['soluong']?></b></div>

    <div class="price"><?= number_format($ctbill['thanhtien'])?><u>đ</u></div>
    </div>
    <?php endforeach ?>
<h1 >Tổng tiền: <span style="color:orangered"><?= number_format($load_one_donhang['total'])?><u>đ</u></span></h1>
</div>
</div>
  </form>
                            <a href=""></a>
                            
                          </main>
                       