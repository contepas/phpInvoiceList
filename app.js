/*global $*/
$(document).ready(function(){

    $.getJSON('data.php', function(data) {
        console.log(data);
    });
    
    $('#invInput').keypress(function(event){
        if(event.which == 13){
            event.preventDefault(); // Otherwise the form will be submitted
            var usrInput = $('#invInput').val();
            console.log(usrInput);
            if(1===1){document.getElementById("magicForm").submit();}
        }
    })
})