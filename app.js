/*global $*/
$(document).ready(function(){
    // $.getJSON("", function(){
    // })
    
    //===============================================================
    //=== SHOW SENTENCE TO HELP USING THE APP =======================
    //===============================================================
    $(function () {
        var index = 0,
            arr   = [
                "Your simple, but powerful invoicing system",
                "Write 'hide' and press enter to hide paid invoices",
                "Write 'show' and press enter to show paid invoices",
                "Write 'transactions' to extract csv file"
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
            console.log(usrInput);
            if(usrInput === 'show' || usrInput === 'hide' || usrInput === 'transactions'){document.getElementById("magicForm").submit();}
        }
    })
    
    //===============================================================
    //=== PAY INVOICE ===============================================
    //===============================================================
    $('.list').on('click', 'li', function(){
        console.log($(this));
        payInvoice($(this));
    })
    
    //===============================================================
    //=== DOWNLOAD CUSTOMER REPORT ==================================
    //===============================================================
    $('.list').on('click', 'span', function(e){
        e.stopPropagation();
        //esport CSV
        
    })
})

function payInvoice(invoice){
    invoice.toggleClass('done');
    //change invoice_status in the database
}