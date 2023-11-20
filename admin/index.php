<?php
session_start();
if (!isset($_SESSION["admin"])) {
    
    header("location:../index.php?act=trangchu");
};
include("../pdo/connection.php");
include "../pdo/khachhang.php";
include("../pdo/sanpham.php");
include("../pdo/danhmuc.php");
include("../pdo/thongtinwebsite.php");
$thongtinwebsite = load_all_thongtinwebsite(1);
$count_danhmuc = count_danhmuc();
$count_sanpham = count_sanpham();
$count_khachhang = count_khachhang();
$count_price_sanpham = count_price_sanpham();
include "head_admin.php";
if (isset($_GET['act']) && $_GET['act'] != "") {
    $act = $_GET['act'];

    switch ($act) {

       
        case 'sanpham':
            $all_danhmuc = load_all_danhmuc();
            $all_sanpham = select_all_sanpham_byAdmin();
            include "sanpham.php";
            break;
        case "add_sp":
            $all_danhmuc = load_all_danhmuc();
            $all_sanpham = select_all_sanpham();
            if(isset($_POST['submit'])){
                $ten_sanpham = $_POST['ten_sanpham'];
                $price = $_POST['price'];
                $hinh = $_FILES['hinh']['name'];
                $id_danhmuc = $_POST['id_danhmuc'];
                $check = true;
                move_uploaded_file($_FILES['hinh']['tmp_name'],"../images/".$hinh);
                foreach($all_sanpham as $all_sp){
                    if($ten_sanpham == $all_sp['ten_sanpham']){
                        $check = false;
                        break;
                    }
                }
                if($check == true){
                    add_sanpham($ten_sanpham,$price,$hinh,$id_danhmuc);
                    setcookie("success","Thêm sản phẩm thành công", time() + 1);
                    header("location:index.php?act=sanpham");
                }else{
                    setcookie("message","Tên này đã tồn tại", time() + 1);
                    header("location:index.php?act=add_sp");
                }
            }
            include "add_sp.php";
            break;
        case "edit_sp":
            if(isset($_GET['id_sp']) && $_GET['id_sp'] > 0){
                $all_danhmuc = load_all_danhmuc();
                $id_sanpham = $_GET['id_sp'];
                $one_sanpham = load_one_sanpham($id_sanpham);
                

                if(isset($_POST['submit'])){
                    $id_sanpham = $_POST['id_sanpham'];
                    $ten_sanpham = $_POST['ten_sanpham'];
                    $price = $_POST['price'];
                    $hinh = $_FILES['hinh']['name'];
                    move_uploaded_file($_FILES['hinh']['tmp_name'], "../images/".$hinh);
                    $id_danhmuc = $_POST['id_danhmuc'];
                    $description = $_POST['description'];
                    $tinhtrang = $_POST['tinhtrang'];
                    $thamnuoc = $_POST['thamnuoc'];
                    $vanh = $_POST['vanh'];
                    $nangluong = $_POST['nangluong'];
                    $chatlieuvo = $_POST['chatlieuvo'];
                    $daydeo = $_POST['daydeo'];
                    $khoa = $_POST['khoa'];
                    $matkinh = $_POST['matkinh'];
                    $noisanxuat = $_POST['noisanxuat'];
                    $title1 = $_POST['title1'];
                    $title2 = $_POST['title2'];
                    $title3 = $_POST['title3'];
                    $noidung1 = $_POST['noidung1'];
                    $noidung2 = $_POST['noidung2'];
                    $noidung3 = $_POST['noidung3'];
                    // $hinhanh1 = $_POST['hinhanh1'];
                    // $hinhanh2 = $_POST['hinhanh2'];
                    // $hinhanh3 = $_POST['hinhanh3'];
                    // move_uploaded_file($_FILES['hinhanh1']['tmp_name'],"../images/".$hinhanh1);
                    // move_uploaded_file($_FILES['hinhanh2']['tmp_name'],"../images/".$hinhanh2);
                    // move_uploaded_file($_FILES['hinhanh3']['tmp_name'],"../images/".$hinhanh3);
                    edit_sanpham($ten_sanpham,$price,$hinh,$id_danhmuc,$description,
                    $tinhtrang,$thamnuoc,$vanh,$nangluong,$chatlieuvo,$daydeo,
                    $khoa,$matkinh,$noisanxuat,$title1, $title2, $title3,$noidung1,
                    $noidung2,$noidung3,$id_sanpham);
                    setcookie("success","Chỉnh sửa thành công", time() +1 );
                    header("location:index.php?act=sanpham");
                }

            }
            include "edit_sp.php";
        break;
        case "delete_sp":
            if(isset($_GET['id_sp']) && $_GET['id_sp'] > 0 ){
                $id_sanpham = $_GET['id_sp'];
                delete_sanpham($id_sanpham);
                setcookie("success", "Xóa sản phẩm thành công", time() + 1);
                header("location:index.php?act=sanpham");
            }
            break;
            // Danh mục 
        case 'danhmuc':
            $all_danhmuc = load_all_danhmuc_byAdmin();
            
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
                $file = $_FILES['hinh'];
                $image = $file['name'];
                $check = true;

                $all_danhmuc = load_all_danhmuc();
                foreach($all_danhmuc as $all_dm){
                    if($ten_danhmuc == $all_dm['ten_danhmuc']){
                        $check = false;
                        break;
                    }
                }

               if($check == false){
                   setcookie("message", "Tên này đã tồn tại", time() + 1);
                   header("location:index.php?act=add_dm");
                   exit;
               }else{

                    if($image !=""){
                        move_uploaded_file($file['tmp_name'], "../images/".$image);
                        add_danhmuc($ten_danhmuc, $image);
                    }else{
                        add_danhmuc($ten_danhmuc,"");
                    }
                    setcookie("success","Thêm danh mục thành công",time()+1);
                    header("location:index.php?act=danhmuc");
                    exit;
               }

            }else{
                setcookie("message", "", time() - 3600);
            }
            include "add_dm.php";
            break;
        case "edit_dm":
            if(isset($_GET['id_dm']) && $_GET['id_dm'] >0){
                $id_danhmuc = $_GET['id_dm'];
                
                $one_danhmuc = load_one_danhmuc($id_danhmuc);

                if(isset($_POST['submit'])){
                    $ten_danhmuc = $_POST['name_danhmuc'];
                    $hinh = $_FILES['hinh']['name'];
                    $id_danhmuc = $_POST['id_danhmuc'];
                    if($hinh != null || $hinh != ''){
                        move_uploaded_file($_FILES['hinh']['tmp_name'],"../images/".$hinh);
                    }

                     update_danhmuc($ten_danhmuc, $hinh, $id_danhmuc);
                     setcookie("success","Sửa danh mục thành công", time() +1);
                     header("location:index.php?act=danhmuc");

                }
            }
            include "edit_dm.php";
            break;

            // Tài khoản
        case 'khachhang':
            $all_khachhang = load_all_khachhang();
            include "khachhang.php";
            break;
        case "add_tk":

            if(isset($_POST['submit'])){
                $ho = $_POST['ho'];
                $ten = $_POST['ten'];
                $email = $_POST['email'];
                $password = $_POST['password'];
                $check = true;
                $all_khachhang = load_all_khachhang();
                foreach($all_khachhang as $all_kh){
                    if($email == $all_kh['email']){
                        $check = false;
                        break;
                    }
                }

                if($check == true){
                    add_taikhoan($ho,$ten,$email,$password);
                    setcookie("success","Thêm khách hàng thành công", time() +1);
                    header("location:index.php?act=khachhang");
                }
            }
            include "add_tk.php";
            break;
        case "edit_tk":

            if(isset($_GET['id_tk']) && $_GET['id_tk'] >0){
                $id_taikhoan = $_GET['id_tk'];
                select_one_khachhang($id_taikhoan);
            }
            include "edit_tk.php";
            break;
        case "delete_taikhoan":
        if(isset($_GET['id_tk']) && $_GET['id_tk'] > 0){
            $id_taikhoan = $_GET['id_tk'];
            delete_taikhoan($id_taikhoan);
            setcookie("success","Xóa tài khoản thành công", time() + 1);
            header("location:index.php?act=khachhang");

        }
        break;


        case "thongtinwebsite":
           
            include "thongtinwebsite.php";
            break;


            case "dangxuat":
                session_destroy();
                header("location:../index.php?act=trangchu");
                break;


    }


} else {
   
    include "trangchu.php";
    
}
include "footer.php";
