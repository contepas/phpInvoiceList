<?php
if(isset($_POST['magic'])) {
    $magic = $_POST['magic'];
    if ($magic){
        $delimitator = "-";
        $check = substr_count($magic, $delimitator);
        if($check > 1){
            echo "too mutch '-'";
        } else if($check < 1){
            echo "there is no '-'";
            } else {
                $data  = explode($delimitator , $magic);
                foreach($data as $value){
                echo $value;
            }
        }
    }
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
        <h2>Your simple, but powerful invoicing system</h2>
    </header>
    
    <div class="container">
        <div class="col-xs-12">
            <section class="form">
                <form id="magicForm" method="POST" onsubmit="handle">
                    <input name="magic" type="text" id="invInput" placeholder="Insert your invoice here...">
                </form>
            </section>
    
            <ul class="list">
                <?php 
                if(isset($data)) {
                    echo '<li class="task">' . $data[0] . ' - ' . $data[1] . ' <span>X</span></li>';
                }
                ?>
                <li class="task">cacca <span>X</span></li>
            </ul>
        </div>
    </div>
    
    <script type="text/javascript" src="app.js"></script>
</body>
</html>