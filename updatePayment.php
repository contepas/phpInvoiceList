<?php
    include "classes.php";
    if(isset($_POST['label'])){
        $id = $_POST['label'];
        echo "Hello by updatePayment\n";
        $db = new Database();
        if(isset($db)){
            echo "Database is ready\n";
        }
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
        exit;
    }

?>