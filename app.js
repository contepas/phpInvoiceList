/*global $*/
$(document).ready(function(){
    // $.getJSON("", function(){
        
    // })
    $(function () {
        var index = 0,
            arr   = [
                "Your simple, but powerful invoicing system",
                "Write 'hide' and press enter to hide paid invoices"
            ]
            setInterval(function(){
                index++;
                $("#changeText").fadeOut(900, function (){
                    $(this).text(arr[index % arr.length]).fadeIn(900);
                });
            }, 8000);
    })
    
    $('#invInput').keypress(function(event){
        if(event.which == 13){
            event.preventDefault(); // Otherwise the form will be submitted
            var usrInput = $('#invInput').val();
            console.log(usrInput);
            if(1===1){document.getElementById("magicForm").submit();}
        }
    })
    
    $('.list').on('click', 'li', function(){
        console.log($(this));
        payInvoice($(this));
    })
    
    $('.list').on('click', 'span', function(e){
        e.stopPropagation();
        //esport CSV
    })
})

function payInvoice(invoice){
    invoice.toggleClass('done');
    //change invoice_status in the database
}

function change(text, counter, elem) {
    elem.innerHTML = text[counter];
    counter++;
    if (counter >= text.length) {
        counter = 0;
    }
}