/*global $*/
$(document).ready(function(){
    $.getJSON("", function(){
        
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
    //var isDone = !invoice.data('completed');
    //console.log(isDone);
    invoice.toggleClass('done');
    //invoice.data('completed', isDone);

}