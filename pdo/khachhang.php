<?php
function load_all_khachhang()
{
    $sql = "SELECT * from khachhang order by role";
    $result = pdo_query($sql);
    return $result;
}
function dangnhap($email, $password)
{
    $sql = "Select * from khachhang where email = '$email' and password = '$password'";
    $result = pdo_query_one($sql);
    return $result;
}
function select_one_khachhang($id_khachhang)
{
    $sql = "Select * from khachhang where id_user = '$id_khachhang'";
    $result = pdo_query_one($sql);
    return $result;
}
function delete_tk($id_user)
{
    $sql = "DELETE from khachhang where id_user=" . $id_user;
    pdo_execute($sql);
}
function update_khachhang($ho, $ten, $email, $password, $address, $tel,$id_user)
{
    $sql = "UPDATE khachhang set   password='" . $password . "',email='" . $email . "', ho='" . $ho . "',ten='" . $ten . "',address='" . $address . "',tel='" . $tel . "' where id_user=" . $id_user;
    pdo_execute($sql);
}

function add_taikhoan($ho, $ten, $email, $password)
{
    $sql = "INSERT into khachhang(ho,ten,email,password) VALUES ('$ho','$ten','$email','$password')";
    pdo_execute($sql);
}
function count_khachhang()
{
    $sql = "SELECT count(*) as tong_khachhang from khachhang where role = 0 ";
    $result = pdo_query_one($sql);
    return $result;
}
