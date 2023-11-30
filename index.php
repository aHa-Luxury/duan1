<?php
session_start();
// if (!isset($_SESSION['giohang'])) {
//     $_SESSION['giohang'] = [];
// }

if (isset($_SESSION["user"])) {
    $user = $_SESSION["user"];
}
if (isset($_SESSION['admin'])) {
    $admin = $_SESSION['admin'];
}
include "pdo/connection.php";
include "pdo/danhmuc.php";
include "pdo/sanpham.php";
$all_danhmuc = load_all_danhmuc();
include "view/menu.php";
include "pdo/khachhang.php";
include("pdo/thongtinwebsite.php");
include("pdo/binhluan.php");
include "pdo/donhang.php";
$thongtinwebsite = load_all_thongtinwebsite(1);

if (isset($_GET['act'])) {
    $act = $_GET['act'];

    switch ($act) {
            // Trang chủ
        case "trangchu":
            include "view/trangchu.php";
            break;

            // Trang chi tiết sản phẩm
        case "chitietsanpham":
            if (isset($_GET['id_sp']) && $_GET['id_sp'] != 0) {
                $id_sanpham = $_GET['id_sp'];
                $one_sanpham = load_one_sanpham($id_sanpham);
                $all_sizesanpham = select_all_size_sanpham($id_sanpham);
                $four_sanphamlienquan = sanphamlienquan();
                // if (isset($_POST['addtocard'])) {
                //     $id_sanpham = $_POST['id_sanpham'];
                //     $ten_sanpham = $_POST['ten_sanpham'];
                //     $hinh = $_POST['hinh'];
                //     $price = $_POST['price'];
                //     $size = $_POST['size'];
                //     $soluong = $_POST['soluong'];
                //     $check = true;
                //     $i = 0;

                //     if ($size == '') {
                //         header("location:?act=chitietsanpham&id_sp=" . $_GET['id_sp']);
                //     } else {
                //         foreach ($_SESSION['giohang'] as $giohang) {
                //             if ($giohang['1'] == $ten_sanpham && $giohang['4'] == $size) {
                //                 $check = false;
                //                 $_SESSION['giohang'][$i][5] = $soluong + $giohang['5'];
                //                 $i++;
                //                 break;
                //             }
                //         }
                //         if ($check == true) {
                //             $item = array($id_sanpham, $ten_sanpham, $hinh, $price, $size, $soluong);
                //             $_SESSION['giohang'][] = $item;
                //         }
                //         header("location:?act=cart");
                //     }
                // }
                if(isset($_POST['addtocart'])){
                    header('location:index.php?act=cart');
                }
                if(isset($_POST['buy'])){
                    header('location:index.php?act=thanhtoan');
                }
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
              // Kiểm tra xem giỏ hàng có dữ liệu hay không
              if(!empty($_SESSION['cart'])){
                $cart = $_SESSION['cart'];

                // Tạo mảng chứa id các sản phẩm trong giỏ hàng
                $productId = array_column($cart, 'id');
                
                // Chuyển đổi mảng id thành 1 chuỗi để thực hiện truy vấn
                $idList = implode(',',$productId);
                // Lấy sản phẩm trong bảng sản phẩm theo id 
                $dataDb = load_one_sanpham_cart($idList);

            }
            include "view/cart.php";
            break;

        case "list_donhang":
            if(isset($_SESSION['user'])){
                $id_user = $_SESSION['user']['id_user'];
                $load_all_donhang =  load_all_donhang_user($id_user);
            }
            include "view/list_donhang_user.php";
            break;

        case "dlt_bill":
            if(isset($_GET['id_bill']) && ($_GET['id_bill']) > 0){
                $id_bill = $_GET['id_bill'];
                delete_donhang($id_bill);
                setcookie("xoa","Xóa đơn hàng thành công",time() + 1);
                header("location:index.php?act=list_donhang");
            }
            break;
        case "huy_bill":
            if(isset($_GET['id_bill']) && ($_GET['id_bill']) > 0){
                $id_bill = $_GET['id_bill'];
                delete_donhang($id_bill);
                setcookie("huy","Hủy đơn hàng thành công",time() + 1);
                header("location:index.php?act=list_donhang");
            }
            break;
            case "chitietdonhang":
                if(isset($_GET['id_bill']) && ($_GET['id_bill']) >0){
                    $id_bill = $_GET['id_bill'];
                    $load_one_donhang = load_one_donhang($id_bill);
                    $load_chitietbill = load_chitietbill($id_bill);
                }
                include "view/chitietdonhang.php";
                break;
        case "delete_cart":
            if (isset($_GET['idsp']) && isset($_GET['sz'])) {
                $id_sanpham = $_GET['idsp'];
                $size = $_GET['sz'];
                $indexToRemove = -1;
                foreach ($_SESSION['giohang'] as $index => $item) {
                    if ($item[0] == $id_sanpham && $item[4] == $size) {
                        $indexToRemove = $index;
                        break; // Dừng vòng lặp khi tìm thấy phần tử cần xóa
                    }
                }
                if ($indexToRemove != -1) {
                    unset($_SESSION['giohang'][$indexToRemove]);
                    // Sau đó, bạn có thể cần chỉnh lại các chỉ số mảng nếu cần
                    $_SESSION['giohang'] = array_values($_SESSION['giohang']);
                }
                header("location:?act=cart");
            }
            // Trang thanh toán
        case "thanhtoan":
            if(!empty($_SESSION['cart'])){
                $cart = $_SESSION['cart'];

                // Tạo mảng chứa id các sản phẩm trong giỏ hàng
                $productId = array_column($cart, 'id');
                
                // Chuyển đổi mảng id thành 1 chuỗi để thực hiện truy vấn
                $idList = implode(',',$productId);
                // Lấy sản phẩm trong bảng sản phẩm theo id 
                $dataDb = load_one_sanpham_cart($idList);


                if(isset($_POST['dathang']) && ($_POST['dathang'])){
                    $name = $_POST['hovaten'];
                    $address = $_POST['address'];
                    $sdt = $_POST['sdt'];
                    $email = $_POST['email'];
                  
                }
            }
            include "view/thanhtoan.php";
            break;
            // Trang tin tức
        case "tintuc":
            include "view/tintuc.php";
            break;

            // Trang đăng ký
        case "register":
            if (isset($_POST['submit'])) {
                $ten = $_POST['ten'];
                $email = $_POST['email'];
                $password = $_POST['password'];
                $all_khachhang = load_all_khachhang();
                $check = true;
                foreach ($all_khachhang as $all_kh) {
                    if ($all_kh['email'] == $email) {
                        $check = false;
                        break;
                    }
                }
                if ($ten == "" || $email == "" || $password == "") {
                    setcookie("message", "Bạn cần nhập đủ dữ liệu", time() + 1);
                    header("location:index.php?act=register");
                } else {
                    if ($check == true) {
                        add_taikhoan($ten, $email, $password);
                        $_SESSION['user'] = dangnhap($email, $password);
                        header("location:index.php?act=trangchu");
                    } else {
                        setcookie("message", "Email đã tồn tại!", time() + 1);
                        header("location:index.php?act=register");
                    }
                }
            }
            include "view/register.php";
            break;
            // Trang đăng nhập 
        case "login":
            if (isset($_POST['dangnhap'])) {
                $email = $_POST['email'];
                $password = $_POST['password'];
                $info = dangnhap($email, $password);

                if ($info !== false) {
                    if ($info['role'] == '1') {
                        $_SESSION['admin'] = $info;
                        header('location:admin');
                    } else {
                        $_SESSION['user'] = $info;
                        header('location:?act=user');
                    }
                } else {
                    setcookie("message", "Tài khoản không tồn tại", time() + 1);
                    header("location:?act=login");
                }
            }
            include "view/login.php";
            break;

            // trang user 
        case 'user':
            if (isset($_SESSION['user']) && !empty($_SESSION['user'])) {
                $one_khachhang = select_one_khachhang($_SESSION['user']['id_user'],);
                // Đăng xuất 
                if (isset($_POST['dangxuat'])) {
                    unset($_SESSION['user']);
                    header("location:?act=trangchu");
                }
                include "view/user.php";
            } else if (isset($_SESSION['admin']) && !empty($_SESSION['admin'])) {
                header('location:admin');
                exit;
            } else {
                header("location:?act=login");
                exit;
            }
            break;
            case 'updateinfor':
                if(isset($_SESSION['user'])){
                    $id_khachhang = $_SESSION['user']['id_user'];
                    $khachhang = select_one_khachhang($id_khachhang);
                if (isset($_POST['capnhat']) && ($_POST['capnhat'])) {
                    $ten = $_POST['ten'];
                    $email = $_POST['email'];
                    $address = $_POST['address'];
                    $tel = $_POST['tel'];
                    $id_user = $_POST['id_user'];
                    update_khachhang($ten, $email,$address,$tel,$id_user);
                    header("Location:index.php?act=user");
                }
            }
                include "view/taikhoan/update.php";
                break;
                case 'changepassword':
                    if (isset($_POST['capnhat']) && ($_POST['capnhat'])) {
                        $password = $_POST['password'];
                        $newpassword = $_POST['newpassword'];
                        $renewpassword = $_POST['renewpassword'];
                        $id_user = $_POST['id_user'];
                        $testpass = checkpass($password,$id_user);
                        if($password == "" || $newpassword == "" || $renewpassword == ""){
                            $thongbao = "Vui lòng nhập đủ thông tin !";
                        }else if(!$testpass){
                            $thongbao = "Thông tin không chính xác !";
    
                        }else if($newpassword != $renewpassword){
                            $thongbao = "Mật khẩu mới không trùng khớp !";
                        }else{
                            changepassword($newpassword,$id_user);
                            $success = "Đổi mật khẩu thành công !";
                        }
                    }
                    include "view/taikhoan/changepass.php";
                    break;
                case 'forget_mk':
                    if(isset($_POST['capnhat'])){
                        $email = $_POST['email'];
                        if($email == $_SESSION['user']['email']){
                            $khachhang = select_one_kh_forgettk($email);
                            setcookie("success","Mật khẩu của bạn là : $khachhang[password]", time() + 1);
                            header("location:index.php?act=forget_mk");
                        }else{
                            setcookie("message","Email không chính xác", time() + 1);
                            header("location:index.php?act=forget_mk");
                        }
                    }
                    include "view/taikhoan/forget_mk.php";
                    break;
            case 'quanlybinhluan':
             
                include "view/binhluan/quanlibinhluan.php";
                break;
            case 'deletebl':
                if(isset($_GET['id_binhluan']) && ($_GET['id_binhluan']) > 0){
                    $id_binhluan = $_GET['id_binhluan'];
                    delete_bl($id_binhluan);
                    header('location:index.php?act=quanlybinhluan');
                }
                break;
            case "listcart":
                // Kiểm tra xem giỏ hàng có dữ liệu hay không
                if(!empty($_SESSION['cart'])){
                    $cart = $_SESSION['cart'];

                    // Tạo mảng chứa id các sản phẩm trong giỏ hàng
                    $productId = array_column($cart, 'id');
                    
                    // Chuyển đổi mảng id thành 1 chuỗi để thực hiện truy vấn
                    $idList = implode(',',$productId);
                    // Lấy sản phẩm trong bảng sản phẩm theo id 
                    $dataDb = load_one_sanpham_cart($idList);

                }
                include "view/listcart.php";
                break;
    }
} else {
    include "view/trangchu.php";
}

include "view/footer.php";
