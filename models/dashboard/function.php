<?php 
    include_once '../../../connect.php';

    function count_user(){
        global $conn;
        $sql = "SELECT * FROM account";
        $pre = $conn->prepare($sql);
        $pre->execute();
        $result = $pre->rowCount();
        return $result;
    }

    function tong_doanh_thu(){
        global $conn;
        $sql = "SELECT SUM(r.price) as 'tongdoanhthu' FROM booking bk
        JOIN room r ON bk.room_id = r.id";
        $pre = $conn->prepare($sql);
        $pre->execute();
        $result = $pre->fetch(PDO::FETCH_ASSOC);
        return $result;
    }
?>