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
include("../pdo/binhluan.php");
include("../pdo/donhang.php");
include("../pdo/thongke.php");
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

            // Kiểm tra xem nút "Lọc" đã được nhấn hay chưa
            if (isset($_POST['listok'])) {
                // Lấy giá trị danh mục được chọn
                $selectedDanhMuc = isset($_POST['id_danhmuc']) ? $_POST['id_danhmuc'] : '';
                // Lấy giá trị khoảng giá được chọn
                $selectedPriceRange = isset($_POST['price']) ? $_POST['price'] : '';

                // Thực hiện truy vấn lọc sản phẩm
                if (!empty($selectedPriceRange)) {
                    // Nếu có giá trị khoảng giá được chọn, thực hiện lọc theo giá
                    $all_sanpham = locsp_theogia($selectedPriceRange);
                } elseif (!empty($selectedDanhMuc)) {
                    // Nếu chỉ có giá trị danh mục được chọn, thực hiện lọc theo danh mục
                    $all_sanpham = loc_sp_theodm($selectedDanhMuc);
                } else {
                    // Nếu không có giá trị nào được chọn, hiển thị tất cả sản phẩm
                    $all_sanpham = select_all_sanpham_byAdmin();
                }
            } else {
                // Nếu nút "Lọc" chưa được nhấn, hiển thị tất cả sản phẩm
                $all_sanpham = select_all_sanpham_byAdmin();
            }

            include "sanpham.php";
            break;
        case "add_sp":
            $all_danhmuc = load_all_danhmuc();
            $all_sanpham = select_all_sanpham();
            if (isset($_POST['submit'])) {
                $ten_sanpham = $_POST['ten_sanpham'];
                $price = $_POST['price'];
                $hinh = $_FILES['hinh']['name'];
                $soluong = $_POST['soluong'];
                $id_danhmuc = $_POST['id_danhmuc'];
                $check = true;
                move_uploaded_file($_FILES['hinh']['tmp_name'], "../images/" . $hinh);
                foreach ($all_sanpham as $all_sp) {
                    if ($ten_sanpham == $all_sp['ten_sanpham']) {
                        $check = false;
                        break;
                    }
                }
                if ($check == true) {
                    add_sanpham($ten_sanpham, $price, $hinh, $soluong, $id_danhmuc);
                    $last_sanpham = load_last_sanpham();
                    setcookie("success", "Thêm sản phẩm thành công", time() + 1);
                    header("location:index.php?act=sanpham");
                } else {
                    setcookie("message", "Tên này đã tồn tại", time() + 1);
                    header("location:index.php?act=add_sp");
                }
            }
            include "add_sp.php";
            break;
        case "edit_sp":
            if (isset($_GET['id_sp']) && $_GET['id_sp'] > 0) {
                $all_danhmuc = load_all_danhmuc();
                $id_sanpham = $_GET['id_sp'];
                // $all_sizesanpham = select_all_size_sanpham($id_sanpham);
                $one_sanpham = load_one_sanpham($id_sanpham);


                if (isset($_POST['submit'])) {
                    $id_sanpham = $_POST['id_sanpham'];
                    $ten_sanpham = $_POST['ten_sanpham'];
                    $price = $_POST['price'];
                    $soluong = $_POST['soluong'];
                    $hinh = $_FILES['hinh']['name'];
                    move_uploaded_file($_FILES['hinh']['tmp_name'], "../images/" . $hinh);
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

                    // $hinhanh1 = $_FILES['hinhanh1']['name'];
                    // move_uploaded_file($_FILES['hinhanh1']['tmp_name'],"../images/".$hinhanh1);

                    // $hinhanh2 = $_FILES['hinhanh2']['name'];
                    // move_uploaded_file($_FILES['hinhanh2']['tmp_name'],"../images/".$hinhanh2);

                    // $hinhanh3 = $_FILES['hinhanh3']['name'];
                    // move_uploaded_file($_FILES['hinhanh3']['tmp_name'],"../images/".$hinhanh3);
                    edit_sanpham(
                        $ten_sanpham,
                        $price,
                        $soluong,
                        $hinh,
                        $id_danhmuc,
                        $description,
                        $tinhtrang,
                        $thamnuoc,
                        $vanh,
                        $nangluong,
                        $chatlieuvo,
                        $daydeo,
                        $khoa,
                        $matkinh,
                        $noisanxuat,
                        $title1,
                        $title2,
                        $title3,
                        $noidung1,
                        $noidung2,
                        $noidung3,
                        $id_sanpham
                    );
                    setcookie("success", "Sửa sản phẩm thành công", time() + 1);
                    header("location:?act=sanpham");
                }
            }
            include "edit_sp.php";
            break;
        case "delete_sp":
            if (isset($_GET['id_sp']) && $_GET['id_sp'] > 0) {
                $id_sanpham = $_GET['id_sp'];
                $sanpham_delete = load_one_sanpham($id_sanpham);
                // $size_sanpham = $sanpham['size'];
                delete_sanpham($id_sanpham);
                // delete_sanpham($id_sanpham, $size_sanpham);
                setcookie("success", "Xóa sản phẩm thành công", time() + 1);
                header("location:index.php?act=sanpham");
            }
            break;

        // case "add_size":
        //     if (isset($_GET['id_sp']) && $_GET['id_sp'] > 0) {
        //         if (isset($_POST["submit"])) {
        //             $id_sanpham = $_POST['id_sanpham'];
        //             $size = $_POST['size'];
        //             $soluong = $_POST['soluong'];
        //             $all_sizesanpham = select_all_size_sanpham($id_sanpham);
        //             $check = true;
        //             foreach ($all_sizesanpham as $all_size_sp) {
        //                 if ($size == $all_size_sp['size']) {
        //                     $check = false;
        //                     break;
        //                 }
        //             }
        //             if ($check == true) {
        //                 add_size_sanpham($id_sanpham, $size, $soluong);
        //                 setcookie("success", "Thêm size thành công", time() + 1);
        //                 header("location:?act=edit_sp&id_sp=" . $id_sanpham);
        //             } else {
        //                 setcookie("message", "Size này đã tồn tại", time() + 1);
        //                 header("location:?act=add_size&id_sp=" . $id_sanpham);
        //             }
        //         }
        //     }
        //     include "add_size.php";
        //     break;
        // case "edit_size":
        //     if (isset($_GET['id_sp']) && $_GET['sz']) {
        //         $id_sanpham = $_GET['id_sp'];
        //         $size = $_GET['sz'];
        //         $one_size = select_one_size_sanpham($id_sanpham, $size);

        //         if (isset($_POST['submit'])) {
        //             $id_sp = $_POST['id_sanpham'];
        //             $new_soluong = $_POST['soluong'];
        //             edit_size($id_sanpham, $size,$new_soluong);
        //             setcookie("success", "Cập nhật size thành công", time() + 1);
        //             header("location:?act=edit_sp&id_sp=" . $id_sanpham);
        //         }
        //     }
        //     include "edit_size.php";
        //     break;
        // case "delete_size":
        //     if (isset($_GET['id_sp']) && isset($_GET['sz'])) {
        //         $id_sanpham = $_GET['id_sp'];
        //         $size = $_GET['sz'];
        //         delete_size($id_sanpham, $size);
        //         setcookie("success", "Xóa size thành công", time() + 1);
        //         header("location:?act=edit_sp&id_sp=" . $id_sanpham);
        //     }
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
            if (isset($_POST['submit'])) {
                $ten_danhmuc = $_POST['name_danhmuc'];
                $file = $_FILES['hinh'];
                $image = $file['name'];
                $check = true;

                $all_danhmuc = load_all_danhmuc();
                foreach ($all_danhmuc as $all_dm) {
                    if ($ten_danhmuc == $all_dm['ten_danhmuc']) {
                        $check = false;
                        break;
                    }
                }

                if ($check == false) {
                    setcookie("message", "Tên này đã tồn tại", time() + 1);
                    header("location:index.php?act=add_dm");
                    exit;
                } else {

                    if ($image != "") {
                        move_uploaded_file($file['tmp_name'], "../images/" . $image);
                        add_danhmuc($ten_danhmuc, $image);
                    } else {
                        add_danhmuc($ten_danhmuc, "");
                    }
                    setcookie("success", "Thêm danh mục thành công", time() + 1);
                    header("location:index.php?act=danhmuc");
                    exit;
                }
            } else {
                setcookie("message", "", time() - 3600);
            }
            include "add_dm.php";
            break;
        case "edit_dm":
            if (isset($_GET['id_dm']) && $_GET['id_dm'] > 0) {
                $id_danhmuc = $_GET['id_dm'];

                $one_danhmuc = load_one_danhmuc($id_danhmuc);

                if (isset($_POST['submit'])) {
                    $ten_danhmuc = $_POST['name_danhmuc'];
                    $hinh = $_FILES['hinh']['name'];
                    $id_danhmuc = $_POST['id_danhmuc'];
                    if ($hinh != null || $hinh != '') {
                        move_uploaded_file($_FILES['hinh']['tmp_name'], "../images/" . $hinh);
                    }

                    update_danhmuc($ten_danhmuc, $hinh, $id_danhmuc);
                    setcookie("success", "Sửa danh mục thành công", time() + 1);
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

            if (isset($_POST['submit'])) {
               
                $ten = $_POST['ten'];
                $email = $_POST['email'];
                $password = $_POST['password'];
                $check = true;
                $all_khachhang = load_all_khachhang();
                foreach ($all_khachhang as $all_kh) {
                    if ($email == $all_kh['email']) {
                        $check = false;
                        break;
                    }
                }

                if ($check == true) {
                    add_taikhoan($ten, $email, $password);
                    setcookie("success", "Thêm khách hàng thành công", time() + 1);
                    header("location:index.php?act=khachhang");
                } else {
                    setcookie("message", "Email đã tồn tại !", time() + 1);
                    header("location:index.php?act=add_tk");
                }
            }
            include "add_tk.php";
            break;
        case 'edittk':
            if (isset($_GET['id_user'])) {
                $khachhang  = select_one_khachhang($_GET['id_user']);
            }
            if (isset($_POST['capnhat']) && ($_POST['capnhat'])) {
                $id_user = $_POST['id_user'];
                $ten = $_POST['ten'];
                $email = $_POST['email'];
                $password = $_POST['password'];
                update_khachhang_admin($ten, $email, $password,$id_user,);
                setcookie("success", "Sửa thông tin thành công !", time() + 1);
                header('location:index.php?act=khachhang');
            }

            include 'taikhoan/update.php';
            break;
        case 'deletetk':
            if (isset($_GET['id_user']) && ($_GET['id_user'] > 0)) {
                delete_tk($_GET['id_user']);
            }
            header("Location:?act=khachhang");
            break;

        case 'binhluan':
            $listbinhluan = loadbl();
            include "binhluan/list.php";
            break;

        case 'deletebl':
            if (isset($_GET['id_binhluan']) && ($_GET['id_binhluan'] > 0)) {
                delete_bl($_GET['id_binhluan']);
            }
            $listbinhluan = loadbl();
            include "binhluan/list.php";
            break;
        case "thongtinwebsite":

            include "thongtinwebsite.php";
            break;
        case "donhang":
            $load_all_donhang = load_all_donhang();
            include "donhang.php";
            break;
        case "chitietdonhang":
            if(isset($_GET['id_bill']) && ($_GET['id_bill']) >0){
                $id_bill = $_GET['id_bill'];
                $load_one_donhang = load_one_donhang($id_bill);
                $load_chitietbill = load_chitietbill($id_bill);

                if(isset($_POST['update_bill']) ){
                    $id_bill = $_POST['id_bill'];
                    $trangthai = $_POST['trangthai'];
                    update_donhang($id_bill,$trangthai);
                    setcookie("success","Cập nhật trạng thái đơn hàng thành công", time() + 1);
                    header("location:?act=donhang");
                }
            }
            include "chitietdonhang.php";
            break;
        case "delete_bill":
            if(isset($_GET['id_bill']) && ($_GET['id_bill']) > 0){
                $id_bill = $_GET['id_bill'];
                huy_donhang($id_bill);
                setcookie("success","Hủy đơn hàng thành công", time() + 1);
                header("location:?act=donhang");
            }
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
