<?php 
function load_all_khachhang(){
    $sql = "SELECT * from khachhang order by id_user desc";
    $result = pdo_query($sql);
    return $result;
}
function dangnhap($email, $password){
    $sql = "Select * from khachhang where email = '$email' and password = '$password'";
    $result = pdo_query_one($sql);
    return $result;
}
function select_one_khachhang($id_khachhang){
    $sql = "Select * from khachhang where id_khachhang = '$id_khachhang'";
    $result = pdo_query_one($sql);
    return $result;
}
function delete_taikhoan($id_taikhoan){
    $sql = "DELETE from khachhang where id_user  = '$id_taikhoan'";
    pdo_execute($sql);
}

function add_taikhoan($ho,$ten,$email,$password){
    $sql = "INSERT into khachhang(ho,ten,email,password) VALUES ('$ho','$ten','$email','$password')";
    pdo_execute($sql);
}
function count_khachhang(){
    $sql = "SELECT count(*) as tong_khachhang from khachhang ";
    $result = pdo_query_one($sql);
    return $result;
}
?>