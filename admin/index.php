<?php 
session_start();
if (!isset($_SESSION["admin"]) ){
    header("location:../index.php?act=trangchu");
};
include ("../pdo/connection.php");
include "../pdo/khachhang.php";
include ("../pdo/sanpham.php");
include ("../pdo/danhmuc.php");

include "head_admin.php";
if(isset($_GET['act']) && $_GET['act'] != ""){
    $act = $_GET['act'];
    switch($act){
        case 'trangchu':
            include "trangchu.php";
            break;
        case 'sanpham':
            $all_sanpham = select_all_sanpham();
            include "sanpham.php";
            break;
        case 'danhmuc':
            $all_danhmuc = load_all_danhmuc();
            include "danhmuc.php";
            break;
        case 'khachhang':
            $all_khachhang = load_all_khachhang();
            include "khachhang.php";
break;
}
}else{
    include "trangchu.php";
}
include "footer.php";
?>