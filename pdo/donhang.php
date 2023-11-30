<?php
function load_all_donhang(){
    $sql = "SELECT * FROM bill bl inner join chitietbill btbl on bl.id_bill = btbl.id_bill";
    $result = pdo_query($sql);
    return $result;
}
function load_one_donhang($id_bill){
    $sql = "SELECT * FROM bill bl inner join chitietbill btbl on bl.id_bill = btbl.id_bill where bl.id_bill = '$id_bill'";
    $result = pdo_query_one($sql);
    return $result;
}
function load_chitietbill($id_bill){
    $sql = "SELECT * FROM chitietbill  where id_bill =  '$id_bill'";
    $result = pdo_query($sql);
    return $result;
}
function update_donhang($id_bill,$trangthai){
    $sql = "UPDATE bill set trangthai = '$trangthai' where id_bill = '$id_bill' ";
    pdo_execute($sql);
}

function delete_donhang($id_bill){
    $sql = "DELETE from chitietbill where id_bill = '$id_bill'";
    pdo_execute($sql);
    $sql = "DELETE from bill where id_bill = '$id_bill'";
    pdo_execute($sql);

}
?>
