<?php 
function quanlydonhang(){
 $sql = "SELECT khachhang.email ,sanpham.ten_sanpham, bill.price , bill.ngay_tao, chitietbill.order_status,chitietbill.id_chitietbill from chitietbill JOIN khachhang on chitietbill.id_user = khachhang.id_user join bill on chitietbill.id_bill = bill.id_bill Join sanpham on sanpham.id_sanpham = bill.id_sanpham ";
 $listdonhang=pdo_query($sql);
    return $listdonhang;
}
function load_one_chitietbill($id_chitietbill){
    $sql = "SELECT * from chitietbill where id_chitietbill = '$id_chitietbill'";
    $one_chitietbill = pdo_query_one($sql);
    return $one_chitietbill ;
}
function edit_trangthai($order_status,$id_chitietbill){
    $sql = "UPDATE chitietbill set order_status  = '$order_status' where $id_chitietbill = '$id_chitietbill'";
    pdo_execute($sql);
};

?>