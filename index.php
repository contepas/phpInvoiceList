<?php
include "classes.php";
if(isset($_POST['magic'])) {
    $magic = $_POST['magic'];
    
} else {
    $magic = 'show';
}
?>
<html>
<head>
    <title>Invoice list</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css" type="text/css" />
    <script
        src="https://code.jquery.com/jquery-3.2.1.min.js"
        integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
        crossorigin="anonymous">
    </script>
</head>
<body>
    <header>
        <h1>Invoices<span>list</span></h1>
        <h2 id="changeText">Your simple, but powerful invoicing system</h2>
    </header>
    
    <div class="container">
        <div class="col-xs-12">
            <section class="form">
                <form id="magicForm" method="POST" onsubmit="handle">
                    <input name="magic" type="text" id="invInput" placeholder="Tell me...">
                </form>
            </section>
    
            <ul class="list">
                <?php
                    //===============================================================
                    //=== LISTEN TO THE MAGIC =======================================
                    //===============================================================
                    $db      = new Database();
                    $query   = "select * from invoices";
                    $rows    = $db->db_num_rows($query);
                    $results = $db->db_query($query);
                    if($rows > 0 && $magic !== 'transactions'){//=== SHOW AND HIDE PAID INVOICE
                        while($row = $results->fetch_object()){
                            if($row->invoice_status === 'paid'){
                                $classes = 'class="task done"';
                            } else {
                                $classes = 'class="task"';
                            }
                            if($magic === 'show' || ($magic === 'hide' && $row->invoice_status === 'unpaid')){
                                echo '<li '. $classes . '>' . $row->client . '<span>-></span><span>' . (int)$row->invoice_amount . ' EUR</span> </li>';
                            }
                        }
                    }else if($rows > 0 && $magic === 'transactions') {//===EXPORT CSV TRANSACTIONS
                        header('Content-Type: text/csv; charset=utf-8');
                        header('Content-Disposition: attachment; filename=transactions.csv');
                        $output = fopen('php://output', 'w');
                        fputcsv($output, array('Invoice ID', 'Company Name', 'Invoice Amount'));
                        // loop over the rows, outputting them
                        while ($row = $results->fetch_object()){
                            fputcsv($output, [$row->id, $row->client, $row->invoice_amount], ',', '"');
                        }
                        fclose($output);
                    }
                ?>
            </ul>
        </div>
    </div>
    
    <script type="text/javascript" src="app.js"></script>
</body>
</html>