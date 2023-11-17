<?php
session_start();
if (!isset($_SESSION["admin"])) {
    header("location:../index.php?act=trangchu");
};
include("../pdo/connection.php");
include "../pdo/khachhang.php";
include("../pdo/sanpham.php");
include("../pdo/danhmuc.php");

include "head_admin.php";
if (isset($_GET['act']) && $_GET['act'] != "") {
    $act = $_GET['act'];
    switch ($act) {
        case 'trangchu':
            include "trangchu.php";
            break;
        case 'sanpham':
            $all_sanpham = select_all_sanpham();
            include "sanpham.php";
            break;
        case 'danhmuc':
            $all_danhmuc = load_all_danhmuc();
            if (isset($_POST['them_danhmuc'])) {
                $name_danhmuc = $_POST['name_danhmuc'];
                if ($name_danhmuc != '') {
                    add_danhmuc($name_danhmuc);
                }
            }
            include "danhmuc.php";
            break;
        case "delete_dm":
            if (isset($_GET['id_dm']) && $_GET['id_dm'] > 0) {
                $id_danhmuc = $_GET['id_dm'];
                delete_danhmuc($id_danhmuc);
                setcookie("success", "Xóa danh mục thành công", time() + 1);
                header("location:index.php?act=danhmuc");
            }
            break;
        case "add_dm":
            
            if(isset($_POST['submit'])){
                $ten_danhmuc = $_POST['name_danhmuc'];
                if($ten_danhmuc == ""){
                    setcookie("message" , "Tên không được để trống", time()  + 1);
                    header("location:index.php?act=add_dm");
                }else{
                    add_danhmuc($ten_danhmuc);
                    setcookie("success" , "Thêm danh mục thành công", time()  + 1);
                    header("location:index.php?act=danhmuc");

                }
            }
            include "add_dm.php";
            break;
        case 'khachhang':
            $all_khachhang = load_all_khachhang();
            include "khachhang.php";
            break;

        case "delete_taikhoan":
        if(isset($_GET['id_tk']) && $_GET['id_tk'] > 0){
            $id_taikhoan = $_GET['id_tk'];
            delete_taikhoan($id_taikhoan);
            setcookie("success","Xóa tài khoản thành công", time() + 1);
            header("location:index.php?act=khachhang");

        }
        break;
        
        case "add_tk":
            



    }


} else {
    include "trangchu.php";
}
include "footer.php";
