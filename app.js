/*global $*/
$(document).ready(function(){
    
    //===============================================================
    //=== SHOW SENTENCE TO HELP USING THE APP =======================
    //===============================================================
    $(function () {
        var index = 0,
            arr   = [
                "Your simple, but powerful invoicing system",
                "Write 'hide' and press enter to hide paid invoices",
                "Write 'show' and press enter to show paid invoices",
                "Write 'transactions' to extract csv file",
                "Click on any invoice, to change the payment state",
                "Click on -> to download the customer report"
            ]
            setInterval(function(){
                index++;
                $("#changeText").fadeOut(900, function (){
                    $(this).text(arr[index % arr.length]).fadeIn(900);
                });
            }, 8000);
    })
    
    //===============================================================
    //=== SEND FORM ONLY ON MAGIC WORDS =============================
    //===============================================================
    $('#invInput').keypress(function(event){
        if(event.which == 13){
            event.preventDefault(); // Otherwise the form will be submitted
            var usrInput = $('#invInput').val();
            if(usrInput === 'show' || usrInput === 'hide' || usrInput === 'transactions'){
                document.getElementById("magicForm").submit();
            }
        }
    })
    
    //===============================================================
    //=== PAY INVOICE ===============================================
    //===============================================================
    $('.list').on('click', 'li', function(){
        payInvoice($(this));
    })
    
    //===============================================================
    //=== DOWNLOAD CUSTOMER REPORT ==================================
    //===============================================================
    $('.list').on('click', 'span', function(e){
        e.stopPropagation();
        customerReport($(this));
    })
})

function payInvoice(invoice){
    //change invoice_status in the database
    $.ajax({
        url: "updatePayment.php",
        data: { label: invoice[0].id },
        method: "POST",
        success: function(result){
            console.log(result);
        }
    })
    .then(function() {
        invoice.toggleClass('done');
    });
}

function customerReport(client){
    var id = $(client).closest("li").attr("id");
    console.log(id);
    $.ajax({
        url: "customerReport.php",
        data: { label: id },
        method: "POST",
        success: function(result){
            console.log(result);
            window.location = 'csvClient.php';
        }
    })
}