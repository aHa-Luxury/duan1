<?php
function select_all_sanpham(){
    $sql = "SELECT * from sanpham ";
    $result = pdo_query($sql);
    return $result;
}
function select_all_sanpham_byAdmin(){
    $sql = "SELECT * from sanpham order by id_sanpham desc";
    $result = pdo_query($sql);
    return $result;
}
function load_all_sanpham($id_danhmuc){
    $sql = "SELECT * from sanpham where id_danhmuc = $id_danhmuc";
    $result = pdo_query($sql);
    return $result;
}
function load_four_sanpham($id_danhmuc){
    $sql = "SELECT * from sanpham  where id_danhmuc = $id_danhmuc order by id_sanpham desc LIMIT 0,4";
    $result = pdo_query($sql);
    return $result;
}
function sanphamlienquan(){
    $sql = "SELECT * from sanpham  order by id_sanpham desc LIMIT 0,4";
    $result = pdo_query($sql);
    return $result;
}
function load_one_sanpham($id_sanpham){
    $sql  = "SELECT * from sanpham sp inner join danhmuc dm on dm.id_danhmuc = sp.id_danhmuc  where sp.id_sanpham = '$id_sanpham'";
    $result = pdo_query_one($sql);
    return $result;

}

function add_sanpham($ten,$gia,$hinh,$id_danhmuc){
    $sql = "INSERT  into sanpham(ten_sanpham, price, img_sanpham,id_danhmuc) values ('$ten','$gia','$hinh','$id_danhmuc')";
    pdo_execute($sql);

}

function delete_sanpham($id_sanpham){
    $sql = "DELETE from sanpham where id_sanpham = '$id_sanpham'";
    pdo_execute($sql);
}

function count_sanpham(){
    $sql = "SELECT count(*) as tong_sanpham from sanpham";
    $count_sanpham = pdo_query_one($sql);
    return $count_sanpham;
}
function count_price_sanpham(){
    $sql = "SELECT sum(price) as tong_price_sanpham from sanpham";
    $count_price_sanpham = pdo_query_one($sql);
    return $count_price_sanpham;
}

?>