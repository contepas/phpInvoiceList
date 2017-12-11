<?php

    session_start();
    include "Database.php";
    $id = $_POST['label'];
    echo "Hello by customerReport" . $id . "\n";
    $db = new Database();
    $query   = "select * from invoices where id=" . $id;
    $rows    = $db->db_num_rows($query);
    echo "num rows = " . $rows;
    $results = $db->db_query($query);
    if($rows > 0) {
        $csv = '"Company Name","Total Invoice Amount","Total Amount Paid","Total Amount Outstading"'.PHP_EOL;
        $row = $results->fetch_object();
        if($row->invoice_status === 'paid'){
            $totalOut  = 0;
            $totalPaid = $row->invoice_amount_plus_vat;
        } else {
            $totalOut = $row->invoice_amount_plus_vat;
            $totalPaid = 0;
        }
        $csv.= '"' . $row->client . '",' . $row->invoice_amount_plus_vat . ',' . $totalPaid . ',' . $totalOut;
        $filename = 'lastCustomerReport.csv';
        file_put_contents($filename, $csv);
    }
    $_SESSION['CSV_CLIENT'] = $filename;
    
?>