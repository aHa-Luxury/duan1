<?php 
function load_all_khachhang(){
    $sql = "select * from khachhang ";
    $result = pdo_query($sql);
    return $result;
}
function load_one_khachhang($email, $password){
    $sql = "Select * from khachhang where email = '$email' and password = '$password'";
    $result = pdo_query_one($sql);
    return $result;
}
function delete_taikhoan($id_taikhoan){
    $sql = "DELETE from khachhang where id_user  = '$id_taikhoan'";
    pdo_execute($sql);
}
?>