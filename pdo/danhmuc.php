<?php
function load_all_danhmuc(){
    $sql = "Select * from danhmuc";
    $all_danhmuc = pdo_query($sql);
    return $all_danhmuc ;
}
function load_one_danhmuc($id_danhmuc){
    $sql = "Select * from danhmuc where id_danhmuc = '$id_danhmuc'";
    $one_danhmuc = pdo_query($sql);
    return $one_danhmuc ;
}
// function load_video_danhmuc($id_danhmuc){
//     $sql = "SELECT * from danhmuc where id_danhmuc = ''"
// }
?>
