<?php 
include "view/menu.php";
include "view/banner.php";



if(isset($_GET['act'])){
    $act = $_GET['act'];

    switch($act){
        case "trangchu":
            include "view/trangchu.php";
            break;
        case "chitietsanpham":
            include "view/chitietsanpham.php";
            break;
        case "category_products":
            include "view/category_products.php";
            break;
        case "tintuc":
            include "view/tintuc.php";
            break;
        case "login": 
            include "view/login.php";
            break;
        case "register":
            include "view/register.php";
            break;
}

}else{
    include "view/trangchu.php";
}

include "view/footer.php";
?>