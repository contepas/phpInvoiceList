<?php

    include "Database.php";
    $id = $_POST['label'];
    $db = new Database();
    $queryRet = "select * from invoices where id = " . $id;
    $result = $db->db_query($queryRet);
    $row = $result->fetch_object();
    echo $row->id;
    if($row->invoice_status === 'paid')
        $queryUp = "update invoices set invoice_status='unpaid' where id = " . $id;
    else
        $queryUp = "update invoices set invoice_status='paid' where id = " . $id;
    $resUp = $db->db_query($queryUp);
    if ($resUp) {
        echo "Record updated successfully";
    }

?>