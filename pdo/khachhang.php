<?php 
function load_all_khachhang(){
    $sql = "select * from khachhang ";
    $result = pdo_query($sql);
    return $result;
}
function load_one_khachhang($email, $password){
    $sql = "Select * from khachhang where email = '$email' and password = '$password'";
    $result = pdo_query($sql);
    return $result;
}
?>