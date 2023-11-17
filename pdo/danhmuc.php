<?php
function load_all_danhmuc(){
    $sql = "SELECT  * from danhmuc";
    $all_danhmuc = pdo_query($sql);
    return $all_danhmuc ;
}
function load_one_danhmuc($id_danhmuc){
    $sql = "SELECT * from danhmuc where id_danhmuc = '$id_danhmuc'";
    $one_danhmuc = pdo_query_one($sql);
    return $one_danhmuc ;
}
function add_danhmuc($ten_danhmuc){
    $sql = "INSERT into danhmuc(ten_danhmuc) Values ('$ten_danhmuc') ";
    pdo_execute($sql);
}
function delete_danhmuc($id_danhmuc){
    $sql = "DELETE from sanpham where id_danhmuc = '$id_danhmuc'";
    pdo_execute($sql);
    $sql = "DELETE from danhmuc where id_danhmuc = '$id_danhmuc' ";
    pdo_execute($sql);
}
?>