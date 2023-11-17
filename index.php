<?php
session_start();
if(isset($_SESSION["user"])){
    $user = $_SESSION["user"];
}
include "pdo/connection.php";
include "pdo/danhmuc.php";
include "pdo/sanpham.php";
$all_danhmuc = load_all_danhmuc();
include "view/menu.php";
include "pdo/khachhang.php";
// include "view/banner.php";


if (isset($_GET['act'])) {
    $act = $_GET['act'];

    switch ($act) {
        // Trang chủ
        case "trangchu":
            include "view/trangchu.php";
            break;

            // Trang chi tiết sản phẩm
        case "chitietsanpham":
            if (isset($_GET["id_sp"]) && $_GET['id_sp'] != 0) {
                $id_sanpham = $_GET['id_sp'];
                $one_sanpham = load_one_sanpham($id_sanpham);
                $four_sanphamlienquan = sanphamlienquan();
                include "view/chitietsanpham.php";
            } else {
                echo "Không có thông tin sản phẩm";
            }
            break;

            // Trang danh mục
        case "category_products":
            if (isset($_GET["id_dm"]) && $_GET['id_dm'] != 0) {
                $id_danhmuc = $_GET['id_dm'];
                $one_danhmuc = load_one_danhmuc($id_danhmuc);
                $all_sanpham =  load_all_sanpham($id_danhmuc);
                include "view/category_products.php";
            } else {
                echo "Không có thông tin danh mục";
            }
            break;

            // Trang giỏ hàng
        case "cart":
            include "view/cart.php";
            break;

            // Trang thanh toán
        case "thanhtoan":
            include "view/thanhtoan.php";
            break;

            // Trang tin tức
        case "tintuc":
            include "view/tintuc.php";
            break;

            // Trang đăng ký
      case "register":
        include "view/register.php";
        break;
            // Trang đăng nhập 
      case "login":
        if(isset($_POST['dangnhap'])){
            $email = $_POST['email'] ;
            $password = $_POST['password'] ;
            $info = load_one_khachhang($email, $password);

            if ($info !== false) {
                if($info['role'] == '1') {
                    $_SESSION['admin'] = $info;
                    header('location:admin');
            }else{
                $_SESSION['user'] = $info;
                header('location:index.php?act=user');
            }
        }
    }
        include "view/login.php";
        break;

        // trang user 
        case "user":
            if(!isset($_SESSION['user'])){
                header("location:index.php?act=login");
            }else{
                include "view/user.php";
            }
            if(isset($_POST["dangxuat"])){
                unset($_SESSION["user"]);
            }

            break;
        }
} else {
    include "view/trangchu.php";
}

include "view/footer.php";
