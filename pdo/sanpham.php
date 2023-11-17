<?php
function select_all_sanpham(){
    $sql = "select * from sanpham";
    $result = pdo_query($sql);
    return $result;
}
function load_all_sanpham($id_danhmuc){
    $sql = "select * from sanpham where id_danhmuc = $id_danhmuc";
    $result = pdo_query($sql);
    return $result;
}
function load_four_sanpham($id_danhmuc){
    $sql = "Select * from sanpham  where id_danhmuc = $id_danhmuc order by id_sanpham desc LIMIT 0,4";
    $result = pdo_query($sql);
    return $result;
}
function sanphamlienquan(){
    $sql = "Select * from sanpham  order by id_sanpham desc LIMIT 0,4";
    $result = pdo_query($sql);
    return $result;
}
function load_one_sanpham($id_sanpham){
    $sql  = "select * from sanpham sp inner join danhmuc dm on dm.id_danhmuc = sp.id_danhmuc  where sp.id_sanpham = '$id_sanpham'";
    $result = pdo_query_one($sql);
    return $result;

}
?>