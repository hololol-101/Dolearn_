<?php
    include_once $_SERVER['DOCUMENT_ROOT']."/etc/DB_Class_mysql.php";
    $DBMY = new DB_mysql_class();
    $strSQL = "select * from lecture where idx in (".$oLidx.")";
    $strQue = $DBMY->sql_exec($strSQL);
    $oTotal = count($strQue);
    $DBMY->free();        
    $DBMY->db_close();
?>  