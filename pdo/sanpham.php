<?php

function select_all_sanpham()
{
    // $sql = "SELECT * from sanpham sp inner join danhmuc dm on sp.id_danhmuc = dm.id_danhmuc left join sizesanpham szsp on sp.id_sanpham = szsp.id_sanpham";
    $sql = "SELECT * from sanpham sp inner join danhmuc dm on sp.id_danhmuc = dm.id_danhmuc ";
    $result = pdo_query($sql);
    return $result;
}
function select_all_sanpham_byAdmin()
{
    // $sql = "SELECT * from sanpham sp left join sizesanpham szsp on szsp.id_sanpham = sp.id_sanpham group by sp.id_sanpham order by sp.id_sanpham desc";
    // $sql = "SELECT sp.*, COUNT(szsp.size) as size, SUM(szsp.so_luong) as so_luong
    // FROM sanpham sp
    // LEFT JOIN sizesanpham szsp ON szsp.id_sanpham = sp.id_sanpham
    // GROUP BY sp.id_sanpham, sp.ten_sanpham
    // ORDER BY sp.id_sanpham DESC";
    $sql = "SELECT *
    FROM sanpham 
    ORDER BY id_sanpham DESC";
    $result = pdo_query($sql);
    return $result;
}
function select_all_size_sanpham($id_sanpham)
{
    $sql = "SELECT * from sizesanpham where id_sanpham = '$id_sanpham'";
    $result = pdo_query($sql);
    return $result;
}
function select_one_size_sanpham($id_sanpham, $size)
{
    $sql = "SELECT * from sizesanpham where id_sanpham = '$id_sanpham' and size = '$size'";
    $result = pdo_query_one($sql);
    return $result;
}


function load_all_sanpham($id_danhmuc)
{
    $sql = "SELECT * from sanpham sp inner join danhmuc dm on sp.id_danhmuc = dm.id_danhmuc where sp.id_danhmuc = $id_danhmuc";
    $result = pdo_query($sql);
    return $result;
}
function load_four_sanpham($id_danhmuc)
{
    $sql = "SELECT * from sanpham  where id_danhmuc = $id_danhmuc order by id_sanpham desc LIMIT 0,4";
    $result = pdo_query($sql);
    return $result;
}
function sanphamlienquan()
{
    $sql = "SELECT * from sanpham  order by id_sanpham desc LIMIT 0,4";
    $result = pdo_query($sql);
    return $result;
}
function load_one_sanpham($id_sanpham)
{
    // $sql  = "SELECT sp.* from sanpham sp left join danhmuc dm on dm.id_danhmuc = sp.id_danhmuc left join sizesanpham szsp on szsp.id_sanpham = sp.id_sanpham  where sp.id_sanpham = '$id_sanpham'";
    $sql  = "SELECT * from sanpham sp left join danhmuc dm on dm.id_danhmuc = sp.id_danhmuc where sp.id_sanpham = '$id_sanpham'";
    $result = pdo_query_one($sql);
    return $result;
}

function load_one_sanpham_cart($idList){
    $sql = 'SELECT * from sanpham where id_sanpham IN ('. $idList .')';
    $result = pdo_query($sql);
    return $result;
}
function load_last_sanpham()
{
    $sql = "SELECT * from sanpham order by id_sanpham desc limit 1";
    $result = pdo_query_one($sql);
    return $result;
}



function add_sanpham($ten, $gia, $hinh, $soluong, $id_danhmuc)
{
    $sql = "INSERT into sanpham(ten_sanpham, price, img_sanpham, soluong, id_danhmuc) values ('$ten','$gia','$hinh','$soluong','$id_danhmuc')";
    pdo_execute($sql);
}
// function add_size_sanpham($id_sanpham, $size, $soluong)
// {
//     $sql = "INSERT into sizesanpham(id_sanpham,size,so_luong) values ('$id_sanpham','$size','$soluong')";
//     pdo_execute($sql);
// }

function edit_sanpham(
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
) {
    if ($hinh != '') {

        $sql = "UPDATE sanpham set ten_sanpham = '$ten_sanpham' , price = '$price',soluong = '$soluong', img_sanpham = '$hinh',id_danhmuc = '$id_danhmuc',description = '$description', tinhtrang = '$tinhtrang', thamnuoc = '$thamnuoc', vanhdongho= '$vanh',
          nangluong = '$nangluong', chatlieuvo = '$chatlieuvo', daydeo = '$daydeo', khoa = '$khoa', matkinh = '$matkinh', sanxuattai = '$noisanxuat', tieude1 = '$title1', tieude2 = '$title2', tieude3 = '$title3', noidung1 = '$noidung1', noidung2 = '$noidung2', noidung3 = '$noidung3' where id_sanpham = '$id_sanpham' ";
        pdo_execute($sql);
    } else {

        $sql = "UPDATE sanpham set ten_sanpham = '$ten_sanpham' , price = '$price',soluong = '$soluong',id_danhmuc = '$id_danhmuc',description = '$description', tinhtrang = '$tinhtrang', thamnuoc = '$thamnuoc', vanhdongho= '$vanh',
          nangluong = '$nangluong', chatlieuvo = '$chatlieuvo', daydeo = '$daydeo', khoa = '$khoa', matkinh = '$matkinh', sanxuattai = '$noisanxuat', tieude1 = '$title1', tieude2 = '$title2', tieude3 = '$title3', noidung1 = '$noidung1', noidung2 = '$noidung2', noidung3 = '$noidung3' where id_sanpham = '$id_sanpham' ";
        pdo_execute($sql);
    }
}

// function edit_size($id_sanpham, $size, $soluong)
// {
//     $sql = "UPDATE sizesanpham set so_luong  = '$soluong' where id_sanpham = '$id_sanpham' and size = '$size'";
//     pdo_execute($sql);
// }
function delete_sanpham($id_sanpham)
{
    // $sql = "DELETE from sizesanpham  where id_sanpham = '$id_sanpham' and size = '$size_sanpham'";
    // pdo_execute($sql);
    $sql = "DELETE from sanpham  where id_sanpham = '$id_sanpham'";
    pdo_execute($sql);
}
// function delete_sanpham($id_sanpham, $size_sanpham)
// {
//     // $sql = "DELETE from sizesanpham  where id_sanpham = '$id_sanpham' and size = '$size_sanpham'";
//     // pdo_execute($sql);
//     $sql = "DELETE from sanpham  where id_sanpham = '$id_sanpham'";
//     pdo_execute($sql);
// }
function delete_size($id_sanpham)
{
    $sql = "DELETE from sizesanpham where id_sanpham = '$id_sanpham'";
    pdo_execute($sql);
}
// function delete_size($id_sanpham, $size)
// {
//     $sql = "DELETE from sizesanpham where id_sanpham = '$id_sanpham' and size = '$size'";
//     pdo_execute($sql);
// }
function count_sanpham()
{
    $sql = "SELECT count(*) as tong_sanpham from sanpham";
    $count_sanpham = pdo_query_one($sql);
    return $count_sanpham;
}
function count_price_sanpham()
{
    $sql = "SELECT sum(price) as tong_price_sanpham from sanpham";
    $count_price_sanpham = pdo_query_one($sql);
    return $count_price_sanpham;
}
function loc_sp_theodm($id_danhmuc)
{
    $sql = "SELECT * 
    FROM sanpham sp
     where id_danhmuc = '$id_danhmuc'
    ";
    // $sql = "SELECT sp.*, COUNT(szsp.size) as size, SUM(szsp.so_luong) as so_luong
    // FROM sanpham sp
    // LEFT JOIN sizesanpham szsp ON szsp.id_sanpham = sp.id_sanpham where sp.id_danhmuc = '$id_danhmuc'
    // GROUP BY sp.id_sanpham, sp.ten_sanpham ";
    $result = pdo_query($sql);
    return $result;
}
function locsp_theogia($price)
{
    $where = "";
    $order_by = "";
    
    switch ($price) {
        case 'low_to_high':
            $order_by = " ORDER BY price ASC";
            // $order_by = " ORDER BY sp.price ASC";
            break;
        case 'high_to_low':
            $order_by = " ORDER BY price DESC";
            // $order_by = " ORDER BY sp.price DESC";
            break;
        case '100_to_500':
            // $where = " WHERE sp.price BETWEEN 100000000 AND 500000000 ";
            // $order_by = " ORDER BY sp.price ASC";
            $where = " WHERE price BETWEEN 100000000 AND 500000000 ";
            $order_by = " ORDER BY price ASC";
            break;
        case '500_to_700':
            $where = " WHERE price BETWEEN 500000000 AND 700000000 ";
            $order_by = " ORDER BY price ASC";
            // $where = " WHERE sp.price BETWEEN 500000000 AND 700000000 ";
            // $order_by = " ORDER BY sp.price ASC";
            break;
        case 'above_700':
            $where = " WHERE price > 700000000 ";
            $order_by = " ORDER BY price ASC";
            // $where = " WHERE sp.price > 700000000 ";
            // $order_by = " ORDER BY sp.price ASC";
            break;
        default:
            // Trong trường hợp không có giá trị nào khớp, hiển thị tất cả sản phẩm
            break;
    }
    
    // $sql = "SELECT sp.*, COUNT(szsp.size) as size, SUM(szsp.so_luong) as so_luong
    //     FROM sanpham sp
    //     left JOIN sizesanpham szsp ON szsp.id_sanpham = sp.id_sanpham " . $where . "
    //     GROUP BY sp.id_sanpham, sp.ten_sanpham " . $order_by;
    $sql = "SELECT *
        FROM sanpham 
      " . $where . "
       " . $order_by;
    
    $result = pdo_query($sql);
    return $result;
}


function locsp_theogia_danhmuc($price, $id_danhmuc)
{
    $where = "";
    $order_by = " ORDER BY price ASC";

    switch ($price) {
        case 'low_to_high':
            $order_by = " ORDER BY price ASC";
            break;
        case 'high_to_low':
            $order_by = " ORDER BY price DESC";
            break;
        case '100_to_500':
            $where = " AND price BETWEEN 100000000 AND 500000000 ";
            break;
        case '500_to_700':
            $where = " AND price BETWEEN 500000000 AND 700000000 ";
            break;
        case 'above_700':
            $where = " AND price > 700000000 ";
            break;

    }

    $sql = "SELECT * FROM sanpham WHERE id_danhmuc = '$id_danhmuc' $where $order_by";
    
    $result = pdo_query($sql);
    return $result;

}

function load_all_sp_theo_ten($kyw){
    $sql = "SELECT * FROM sanpham WHERE ten_sanpham LIKE '%" . $kyw . "%'";
    $result = pdo_query($sql);
    return $result;
}
?>