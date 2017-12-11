<?php

    session_start();
    header("Content-Type: text/csv; charset=utf-8");
    header("Content-Disposition: attachment; filename=customerReport.csv");
    readfile($_SESSION['CSV_CLIENT']);
    exit;

?>