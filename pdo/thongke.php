<?php
    function thongke_binhluan(){
        $sql = "SELECT books.id_book as masach,books.tieude as tensach, COUNT(binhluan.id_binhluan) as countbl FROM binhluan left join books on binhluan.id_book = books.id_book GROUP BY books.id_book,books.tieude";
        $listthongke = pdo_query($sql);
        return $listthongke;
    }

    function thongke_doanhthu(){
        $sql = "SELECT DATE_FORMAT(date, '%m/%Y') AS month_year, SUM(total) AS total_amount
        FROM bill
        GROUP BY month_year";
        $listtk = pdo_query($sql);
        return $listtk;
    }


?>