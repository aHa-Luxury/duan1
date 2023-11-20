<?php
function select_all_sanpham(){
    $sql = "Select * from sanpham sp inner join danhmuc dm on sp.id_danhmuc = dm.id_danhmuc";
    $result = pdo_query($sql);
    return $result;
}
function select_all_sanpham_byAdmin(){
    $sql = "SELECT * from sanpham order by id_sanpham desc";
    $result = pdo_query($sql);
    return $result;
}
function load_all_sanpham($id_danhmuc){
    $sql = "SELECT * from sanpham sp inner join danhmuc dm on sp.id_danhmuc = dm.id_danhmuc where sp.id_danhmuc = $id_danhmuc";
    $result = pdo_query($sql);
    return $result;
}
function load_four_sanpham($id_danhmuc){
    $sql = "SELECT * from sanpham  where id_danhmuc = $id_danhmuc order by id_sanpham desc LIMIT 0,4";
    $result = pdo_query($sql);
    return $result;
}
function sanphamlienquan(){
    $sql = "SELECT * from sanpham  order by id_sanpham desc LIMIT 0,4";
    $result = pdo_query($sql);
    return $result;
}
function load_one_sanpham($id_sanpham){
    $sql  = "SELECT * from sanpham sp inner join danhmuc dm on dm.id_danhmuc = sp.id_danhmuc where sp.id_sanpham = '$id_sanpham'";
    $result = pdo_query_one($sql);
    return $result;

}

function add_sanpham($ten,$gia,$hinh,$id_danhmuc){
    $sql = "INSERT  into sanpham(ten_sanpham, price, img_sanpham,id_danhmuc) values ('$ten','$gia','$hinh','$id_danhmuc')";
    pdo_execute($sql);

}
 
function edit_sanpham($ten_sanpham,$price,$hinh,$id_danhmuc,$description,$tinhtrang,$thamnuoc,$vanh,$nangluong,$chatlieuvo,$daydeo,$khoa,$matkinh,$noisanxuat,$title1, $title2, $title3,$noidung1,$noidung2,$noidung3,$id_sanpham){
    if($hinh != ''){

        $sql = "UPDATE sanpham set ten_sanpham = '$ten_sanpham' , price = '$price', img_sanpham = '$hinh',id_danhmuc = '$id_danhmuc',description = '$description', tinhtrang = '$tinhtrang', thamnuoc = '$thamnuoc', vanhdongho= '$vanh',
          nangluong = '$nangluong', chatlieuvo = '$chatlieuvo', daydeo = '$daydeo', khoa = '$khoa', matkinh = '$matkinh', sanxuattai = '$noisanxuat', tieude1 = '$title1', tieude2 = '$title2', tieude3 = '$title3', noidung1 = '$noidung1', noidung2 = '$noidung2', noidung3 = '$noidung3', where id_sanpham = '$id_sanpham' ";
          pdo_execute($sql);
    }else{

        $sql = "UPDATE sanpham set ten_sanpham = '$ten_sanpham' , price = '$price',id_danhmuc = '$id_danhmuc',description = '$description', tinhtrang = '$tinhtrang', thamnuoc = '$thamnuoc', vanhdongho= '$vanh',
          nangluong = '$nangluong', chatlieuvo = '$chatlieuvo', daydeo = '$daydeo', khoa = '$khoa', matkinh = '$matkinh', sanxuattai = '$noisanxuat', tieude1 = '$title1', tieude2 = '$title2', tieude3 = '$title3', noidung1 = '$noidung1', noidung2 = '$noidung2', noidung3 = '$noidung3' where id_sanpham = '$id_sanpham' ";
          pdo_execute($sql);
    }
}
function delete_sanpham($id_sanpham){
    $sql = "DELETE from sanpham where id_sanpham = '$id_sanpham'";
    pdo_execute($sql);
}

function count_sanpham(){
    $sql = "SELECT count(*) as tong_sanpham from sanpham";
    $count_sanpham = pdo_query_one($sql);
    return $count_sanpham;
}
function count_price_sanpham(){
    $sql = "SELECT sum(price) as tong_price_sanpham from sanpham";
    $count_price_sanpham = pdo_query_one($sql);
    return $count_price_sanpham;
}

?>